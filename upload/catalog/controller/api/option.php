<?php
class ControllerApiOption extends Controller {

	public function index() {

		if (isset($this->request->get['model'])) {
            $category_id = (int)$this->request->get['model'];
        } else {
            $category_id = 0;
        }

		$data = array();
		$this->load->model('catalog/category');
		$this->load->model('catalog/product');
		$this->load->model('tool/image');

		$category = $this->model_catalog_category->getCategory($category_id);
		$data = [];
		$products = $this->model_catalog_product->getProducts(['filter_category_id' => $category['category_id']]);
		if(!empty($products) && is_array($products)){
			foreach($products as $product){
				var_dump($product);exit;
				$tmpproduct = [];
				$tmpproduct['id'] = $product['product_id'];
				$tmpproduct['name'] = $product['name'];
				$tmpproduct['image'] = $this->model_tool_image->resize($product['image'], 50, 50);
				$tmpproduct['model'] = $product['model'];
				$data[] = $tmpproduct;
			}
		}


		$this->response->addHeader('Content-Type: application/json');
		$result = ['status' => 200, 'data' => $data];
		$this->response->setOutput(json_encode($result));
	}
}
