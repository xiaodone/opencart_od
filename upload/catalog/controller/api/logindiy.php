<?php
class ControllerApiLogindiy extends Controller {
	public function index() {
		$this->load->language('api/login');

		$json = array();
		$result = ['status' => 200, 'data' => []];
		
		$this->load->model('account/customer');
		$token = '';
		if(isset($this->request->post['type']) && $this->request->post['type'] == 'register') {//注册
			$data = [];
			if (isset($this->request->post['firstname'])) {
				$data['firstname'] = $this->request->post['firstname'];
			} else {
				$data['firstname'] = '';
			}

			if (isset($this->request->post['lastname'])) {
				$data['lastname'] = $this->request->post['lastname'];
			} else {
				$data['lastname'] = '';
			}

			if (isset($this->request->post['email'])) {
				$data['email'] = $this->request->post['email'];
			} else {
				$data['email'] = '';
			}

			if (isset($this->request->post['telephone'])) {
				$data['telephone'] = $this->request->post['telephone'];
			} else {
				$data['telephone'] = '';
			}


			if (isset($this->request->post['password'])) {
				$data['password'] = $this->request->post['password'];
			} else {
				$data['password'] = '';
			}
		}
		// Login with API Key
		if(isset($this->request->post['username']) && isset($this->request->post['passowrd'])) {
			$customer_info = $this->model_account_customer->getCustomerByEmail($this->request->post['username']);

			if ($customer_info && !$customer_info['status']) {
				$result['message'] = $this->language->get('error_approved');
				$result['status'] = 401;
			}else{
				//比对密码
				if (!$this->customer->login($this->request->post['username'], $this->request->post['passowrd'])) {

					$this->model_account_customer->addLoginAttempt($this->request->post['username']);
					$result['message'] = $this->language->get('error_login');
					$result['status'] = 401;
				} else {
					$this->model_account_customer->deleteLoginAttempts($this->request->post['username']);
					//增加token
					$this->load->model('account/customer_token');
					$token = $this->model_account_customer_token->addUserToken($customer_info['customer_id']);
					setcookie('u_token',$token, time()+86400,'/');
					$result['data'] = ['token'=> $token];
				}
			}
			
		} else {
			$result['message'] = '请输入用户名和密码';
			$result['status'] = 400;
		}
		
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($result));
	}
}
