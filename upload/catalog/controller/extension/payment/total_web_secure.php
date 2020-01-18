<?php
class ControllerExtensionPaymentTotalWebSecure extends Controller {

	private $error;

	public function index() {

		// Load testmode text
		$this->load->language('extension/payment/total_web_secure');
		$data['text_testmode'] = $this->language->get('text_testmode');


		// Set up confirm/back button text
    	$data['button_confirm'] = $this->language->get('button_confirm');
		$data['button_back'] = $this->language->get('button_back');

		// Check if we are in test mode or not
		if (!$this->config->get('payment_total_web_secure_test')) {
    		$data['action'] = 'https://secure.totalwebsecure.com/paypage/clear.asp';
    		$data['testmode'] = false;
  		} else {
			$data['action'] = 'https://testsecure.totalwebsecure.com/paypage/clear.asp';
			$data['testmode'] = true;
		}

		// Check if payment was a failure
		if(!empty($_GET['fail'])) $data['error'] = 'Previous Payment FAILED, please try again';

		// Load model for checkout page
		$this->load->model('checkout/order');

		// Load order into memory
		$order_info = $this->model_checkout_order->getOrder($this->session->data['order_id']);
		
		$currencies = array(
			'AUD'	=> '036',
			'CAD'	=> '124',
			'DKK'	=> '208',
			'HKD'	=> '344',
			'ILS'	=> '376',
			'JPY'	=> '392',
			'KRW'	=> '410',
			'NOK'	=> '578',
			'GBP'	=> '826',
			'SAR'	=> '682',
			'SEK'	=> '752',
			'CHF'	=> '756',
			'USD'	=> '840',
			'EUR'	=> '978',
		);

		$this->load->model('localisation/currency');
		
		$currency_infos = $this->model_localisation_currency->getCurrencies();

		// Currency set to GBP
		$currency = 'GBP';
		$currency_info = $currency_infos[$currency];
		
		$data['currency_iso'] = '826';
		
		$order_currency_code = strtoupper($order_info['currency_code']);
		
		if(isset($currencies[$order_currency_code]) && isset($currency_infos[$order_currency_code])) {
			$currency = $order_currency_code;
			$currency_info = $currency_infos[$currency];
			$data['currency_iso'] = $currencies[$order_currency_code];
		}
		
		if (!isset($currency_infos[$currency])) {
			$data['error'] = 'No suitable currency available. Please try again!';
		}

		$total = $this->currency->format($order_info['total'], $currency, '', false);
		$total  = number_format($total, (int)$currency_info['decimal_place'], $this->language->get('decimal_point'), '');
		
		$data['total'] = $total;

		// Other params for payment page
		$data['customer_id'] = $this->config->get('payment_total_web_secure_customer_id');
		$data['zip'] = html_entity_decode($order_info['payment_postcode'], ENT_QUOTES, 'UTF-8');
		$data['email'] = $order_info['email'];
		$data['order_id'] = $this->session->data['order_id'];

		$enc = strtr(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, hash('sha256', $this->config->get('config_encryption'), true), $this->session->data['order_id'], MCRYPT_MODE_ECB)), '+/=', '-_,');

		$route = $_GET['route'];

		// Set success/fail urls
		$data['redirector_success'] = $this->url->link('extension/payment/total_web_secure/success', 'e=' . urlencode($enc) . '&', true);
		$data['redirector_failure'] = $this->url->link('extension/payment/total_web_secure/failure', '' . '&', true);

		// Render page template
		$this->id = 'payment';
		
		return $this->load->view('extension/payment/total_web_secure', $data);
	}

	function file_get_contents_curl($url) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
		curl_setopt($ch, CURLOPT_URL, $url);

		$data = curl_exec($ch);

		curl_close($ch);

		return $data;
	}
	
	public function failure() {
		
		$this->load->language('extension/payment/total_web_secure');
 		
		$this->session->data['error'] = $this->language->get('message_fail');
		
		$this->response->redirect($this->url->link('checkout/failure', 'fail=1'));
	}

	public function success() {

		// Assign $_GET to easier var
		$g = &$this->request->get;

		// e is the encrypted order ID
		$e = $g['e'];

		// Check we gota Success message back
		if(!$g['Status'] == 'Success') die('ERROR - STATUS INVALID');

		// List of vars from reply
		$transaction = $g['TransID'];	// Transaction ID
		$amount = $g['Amount'];			// Order Amount
		$crypt = $g['Crypt'];			// Crypt of vars

		if ($e) {
			$order_id = trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, hash('sha256', $this->config->get('config_encryption'), true), base64_decode(strtr($e, '-_,', '+/=')), MCRYPT_MODE_ECB));
		} else {
			$order_id = 0;
		}

		// Hack detection
		if(!$order_id) die('ERROR - Hack attempt detected');
		
		// Load model for checkout page
		$this->load->model('checkout/order');

		// Load order, and verify the order has not been processed before, if it has, go to success page
		$order_info = $this->model_checkout_order->getOrder($order_id);

		if ($order_info) {
			if ($order_info['order_status_id'] != 0) {
				$this->response->redirect($this->url->link('checkout/success'));
			}
		}

		// Check payment has really been made in TWS
		if (!$this->config->get('payment_total_web_secure_test')) {
    		$url = 'https://secure.totalwebsecure.com/paypage/confirm.asp';
  		} else {
			$url = 'https://testsecure.totalwebsecure.com/paypage/confirm.asp';
		}

		$request = 'CustomerID='.$this->config->get('payment_total_web_secure_customer_id').'&Notes=ORDER:'.$order_id;

		if (ini_get('allow_url_fopen')) {
			$response = file_get_contents($url . '?' . $request);
		} else {
			$response = file_get_contents_curl($url . '?' . $request);
		}

		preg_match_all('%<strong>([^<]+)</strong>%', $response, $result, PREG_PATTERN_ORDER);

		if(!empty($result[1])) {
			$result = $result[1];
			if($result[0] == 'SUCCESS') {
				if ($order_info['order_status_id'] == '0') {
					$this->model_checkout_order->addOrderHistory($order_id, $this->config->get('payment_total_web_secure_order_status_id'), 'TWS TRANSACTION ID: ' . $transaction);
				} else {
					$this->model_checkout_order->addOrderHistory($order_id, $this->config->get('payment_total_web_secure_order_status_id'), 'TWS TRANSACTION ID: ' . $transaction, FALSE);
				}
				$this->response->redirect($this->url->link('checkout/success'));
			}
		}
		$this->response->redirect($this->url->link('checkout/failure', 'fail=1'));
	}
}