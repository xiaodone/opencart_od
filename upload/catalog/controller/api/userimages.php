<?php
class ControllerApiUserimages extends Controller {

	public function index() {

		$data = array();
		$this->load->model('tool/image');
		$this->load->model('tool/userupload');

		$uid = (int)$this->request->get['uid'];
		if($uid < 1){
			echo 'failed';exit;
		}
		$piclist = $this->model_tool_userupload->getUserImages($uid);

		$urlPre = $this->config->get('config_url') . 'image/userimages/' . $uid . '/';
		if ($this->request->server['HTTPS']) {
			$urlPre = $this->config->get('config_ssl') . 'image/userimages/' . $uid . '/';
		}

		if(!empty($piclist)){
			foreach($piclist as $item){
				if(file_exists(DIR_IMAGE .'userimages/' . $uid . '/' . $item['file'])){
					$data[] = $urlPre . $item['file'];
				}
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
}
