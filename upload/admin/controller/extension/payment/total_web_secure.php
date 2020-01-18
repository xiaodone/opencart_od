<?php
class ControllerExtensionPaymentTotalWebSecure extends controller {
	private $error = array();
	/**
	 * ControllerPaymentTotalWebSecure::index()
	 *
	 * default route for form load/update
	 */
	function index() {

		// Load language file and settings model
		$this->load->language('extension/payment/total_web_secure');
		$this->load->model('setting/setting');

		// Set page title
		$this->document->setTitle($this->language->get('heading_title'));


		// Process settings if form submitted
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {			
			$this->model_setting_setting->editSetting('payment_total_web_secure', $this->request->post);
			
			$this->session->data['success'] = $this->language->get('text_success');
			
			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true));
		}


		// Set errors if fields not correct
 		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

 		if (isset($this->error['customer_id'])) {
			$data['error_customer_id'] = $this->error['customer_id'];
		} else {
			$data['error_customer_id'] = '';
		}

 		if (isset($this->error['secret_key'])) {
			$data['error_secret_key'] = $this->error['secret_key'];
		} else {
			$data['error_secret_key'] = '';
		}

		// Set breadcrumbs
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/payment/total_web_secure', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/payment/total_web_secure', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=payment', true);
 
		// Load values for fields
		if (isset($this->request->post['payment_total_web_secure_customer_id'])) {
			$data['payment_total_web_secure_customer_id'] = $this->request->post['payment_total_web_secure_customer_id'];
		} else {
			$data['payment_total_web_secure_customer_id'] = $this->config->get('payment_total_web_secure_customer_id');
		}

		if (isset($this->request->post['payment_total_web_secure_test'])) {
			$data['payment_total_web_secure_test'] = $this->request->post['payment_total_web_secure_test'];
		} else {
			$data['payment_total_web_secure_test'] = $this->config->get('payment_total_web_secure_test');
		}

		if (isset($this->request->post['payment_total_web_secure_geo_zone_id'])) {
			$data['payment_total_web_secure_geo_zone_id'] = $this->request->post['payment_total_web_secure_geo_zone_id'];
		} else {
			$data['payment_total_web_secure_geo_zone_id'] = $this->config->get('payment_total_web_secure_geo_zone_id');
		}

		$this->load->model('localisation/geo_zone');

		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post['payment_total_web_secure_status'])) {
			$data['payment_total_web_secure_status'] = $this->request->post['payment_total_web_secure_status'];
		} else {
			$data['payment_total_web_secure_status'] = $this->config->get('payment_total_web_secure_status');
		}

		if (isset($this->request->post['payment_total_web_secure_secret_key'])) {
			$data['payment_total_web_secure_secret_key'] = $this->request->post['payment_total_web_secure_secret_key'];
		} else {
			$data['payment_total_web_secure_secret_key'] = $this->config->get('payment_total_web_secure_secret_key');
		}

		if (isset($this->request->post['payment_total_web_secure_sort_order'])) {
			$data['payment_total_web_secure_sort_order'] = $this->request->post['payment_total_web_secure_sort_order'];
		} else {
			$data['payment_total_web_secure_sort_order'] = $this->config->get('payment_total_web_secure_sort_order');
		}

		if (isset($this->request->post['payment_total_web_secure_order_status_id'])) {
			$data['payment_total_web_secure_order_status_id'] = $this->request->post['payment_total_web_secure_order_status_id'];
		} else {
			$data['payment_total_web_secure_order_status_id'] = $this->config->get('payment_total_web_secure_order_status_id');
		}

		// Load a list of order status values
		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		// Render template
		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/payment/total_web_secure', $data));
	}


	/**
	 * ControllerPaymentTotalWebSecure::validate()
	 *
	 * Validation code for form
	 */
	private function validate() {
		if (!$this->user->hasPermission('modify', 'extension/payment/total_web_secure')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['payment_total_web_secure_customer_id']) {
			$this->error['customer_id'] = $this->language->get('error_customer_id');
		}

		if (!$this->request->post['payment_total_web_secure_secret_key']) {
			$this->error['secret_key'] = $this->language->get('error_secret_key');
		}

		return !$this->error;
	}
}