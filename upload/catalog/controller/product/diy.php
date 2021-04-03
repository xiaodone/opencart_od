<?php
class ControllerProductDiy extends Controller {
	public function index() {
		header('Location:/div-mobile/');
		return;
		$data = [];
		$this->load->model('account/customer');
		if ($this->customer->isLogged()) {
			$data['uid'] = $this->customer->getId();
		}
		else{
			$data['uid'] = 0;
		}

	//	$data['uid'] = $this->session->data['customer_id'];
		$data['productId'] = (int)$_GET['product_id'];

		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('product/diy', $data));
	}
}
