<?php
class ControllerApiBackground extends Controller {

	public function index() {
// var_export((int)$this->config->get('config_language_id'));
		$data = array();
		$this->load->model('tool/diy_upload');
		$this->load->model('tool/image');

		$data = $this->model_tool_diy_upload->getList();
		foreach ($data as $key => $value) {
			$inthumb = (Array)json_decode($value['inthumb']);
			foreach ($inthumb as $k => $val) {
				if(empty($val)) continue;
				$inthumb[$k] = urldecode($this->model_tool_image->imageUrl($val));
			}
			$data[$key]['file'] = urldecode($this->model_tool_image->imageUrl($value['file']));
			$data[$key]['background'] = urldecode($this->model_tool_image->imageUrl($value['background']));
			$data[$key]['inthumb'] = $inthumb;
		}

		$this->response->addHeader('Content-Type: application/json');
		$result = ['status' => 200, 'data' => $data];
		$this->response->setOutput(json_encode($result));
	}
}
