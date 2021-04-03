<?php
class ControllerToolUpload64 extends Controller {
	public function index() {
		$this->load->language('tool/upload');

		$json = array();
		$this->load->model('account/customer_token');
		$uid = $this->model_account_customer_token->checkToken($this->request->getParam('token'));
        if (!$uid){
            $this->response->addHeader('Content-Type: application/json');
            $result = ['status' => 403, 'msg'=>'权限不足'];
            $this->response->setOutput(json_encode($result));
            return;
		}
		$image = $this->request->post['image64'];

		if (!$json) {
			$file = $uid . "_".date("His",time())."_".rand(1111,9999).'.png';

			$path = DIR_IMAGE . 'userimages/'. date('His').'/';
			if(!file_exists($path)){
				if(!mkdir($path, 0755)){
					echo 'mkdir failed';exit;
				}
			}
			if (strstr($image,",")){
			    $image = explode(',',$image);
			    $image = $image[1];
			}
			// var_dump(base64_decode($image));die;
			$r = file_put_contents($path . '/' . $file, base64_decode($image));

// var_dump($path . '/' . $file);die;
			// Hide the uploaded file name so people can not link to it directly.
			$this->load->model('tool/userupload');

			$res  = $this->model_tool_userupload->addUpload($uid, $file);
			if($res){
				$urlPre = $this->config->get('config_url') . 'image/userimages/'. date('His').'/';
				if ($this->request->server['HTTPS']) {
					$urlPre = $this->config->get('config_ssl') . 'image/userimages/'. date('His').'/';
				}
				$json['success'] = $this->language->get('text_upload');
				$json['image']  = $urlPre . $file;
			}
			else{
				$json['error'] = 'save failed';
			}
		}
		$json = [
            'title'=> '',
            'extension'=> '',
            'file'=> $urlPre . $file,
            'created_at'=> date('Y-m-d H:i:s')
        ];
        $result = ['status' => 200, 'data' => $json];


		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($result));
	}
}
