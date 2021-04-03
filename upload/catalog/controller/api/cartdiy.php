<?php
class ControllerApiCartdiy extends Controller {
	public function index() {
		$this->load->language('api/cart');

		$json = array();

		$this->load->model('account/customer_token');
        $uid = $this->model_account_customer_token->checkToken($this->request->getParam('token'));
        if (!$uid){
            $this->response->addHeader('Content-Type: application/json');
            $result = ['status' => 403, 'msg'=>'权限不足'];
            $this->response->setOutput(json_encode($result));
            return;
		}
		$this->load->model('catalog/product');

		$product_options = $this->model_catalog_product->getProductOptions($this->request->post['product_id']);
		$options = [];
		foreach ($product_options as $key => $value) {//var_dump($value);die;
			foreach ($value['product_option_value']as $val) {
				$options[$value['product_option_id']] = $val['product_option_value_id'];
				break;
			}
			 
		}

		$this->cart->addDiy($uid, $this->request->post['product_id'], $this->request->post['quantity'], 0, $this->request->post['file'], $options);

		
		$json['message'] = $this->language->get('text_success');
		$result = ['status' => 200, 'data' => $json];


		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($result));
	}

	
}
