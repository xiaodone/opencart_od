<?php
class ControllerApiDiyimages extends Controller {

	public function index() {

		$data = array();
		$this->load->model('tool/image');
		$this->load->model('tool/diy_upload');

		$groupid = (int)$this->request->get['groupid'];
		if($groupid < 1){
			echo 'failed';exit;
		}
		$piclist = $this->model_tool_diy_upload->getList($groupid);

		$urlPre = $this->config->get('config_url') . 'image/';
		if ($this->request->server['HTTPS']) {
			$urlPre = $this->config->get('config_ssl') . 'image/';
		}

		if(!empty($piclist)){
			foreach($piclist as $item){
				if(file_exists(DIR_IMAGE . $item['file'])){
					$data[] = $urlPre . $item['file'];
				}
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
}
