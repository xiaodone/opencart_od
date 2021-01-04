<?php
class ControllerApiCategory extends Controller {

	public function index() {

		$data = array();
		$this->load->model('catalog/category');
		$this->load->model('catalog/product');
		$this->load->model('tool/image');

		$categorys = $this->model_catalog_category->getCategories();
		$data = [];
		if(!empty($categorys) && is_array($categorys)){
			foreach($categorys as $category){
				$tmpdata = [];
				$tmpdata['name'] = $category['name'];
				$tmpdata['id'] = $category['category_id'];
				$tmpdata['products'] = [];
				$products = $this->model_catalog_product->getProducts(['filter_category_id' => $category['category_id']]);
				if(!empty($products) && is_array($products)){
					foreach($products as $product){
						$tmpproduct = [];
						$tmpproduct['id'] = $product['product_id'];
						$tmpproduct['name'] = $product['name'];
						$tmpproduct['image'] = $this->model_tool_image->resize($product['image'], 50, 50);
						$tmpproduct['model'] = $product['model'];
						$tmpdata['products'][] = $tmpproduct;
					}
				}

				$data[] = $tmpdata;
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($data));
	}
}
