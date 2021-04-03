<?php
class ControllerApiType extends Controller {

	public function index() {
// var_export((int)$this->config->get('config_language_id'));
		$data = array();
		$this->load->model('catalog/diytype');
		$language_id = (int)$this->config->get('config_language_id');
		$product_id = (int)$this->request->get['product_id'];
		$data = $this->model_catalog_diytype->getList($product_id);
		$this->load->model('tool/image');
		foreach ($data as $key => $value) {
			if($language_id == 5) {
				$value['name'] = $value['title'];
				$value['desc'] = $value['text'];
			}else{
				$value['name'] = $value['entitle'];
				$value['desc'] = $value['entext'];
			}
			$data[$key] = $value;
			$data[$key]['thumb'] = $this->model_tool_image->imageUrl($value['thumb']);
		}

		$this->response->addHeader('Content-Type: application/json');
		$result = ['status' => 200, 'data' => $data];
		$this->response->setOutput(json_encode($result));
	}
}
