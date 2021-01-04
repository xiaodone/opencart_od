<?php
class ControllerApiModel extends Controller {

	public function index() {

		if (isset($this->request->get['brand'])) {
            $category_id = (int)$this->request->get['brand'];
        } else {
            $category_id = 0;
        }

		$data = array();
		$this->load->model('catalog/category');
		$this->load->model('catalog/product');
		$this->load->model('tool/image');

		$categorys = $this->model_catalog_category->getCategories($category_id);
		$data = [];
		if(!empty($categorys) && is_array($categorys)){
			foreach($categorys as $category){
				$tmpdata = [];
				$tmpdata['id'] = $category['category_id'];
				$tmpdata['name'] = $category['name'];
				//$tmpdata['icon'] = $category['image'];
				/*$tmpdata['products'] = [];
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
				}*/

				$data[] = $tmpdata;
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$result = ['status' => 200, 'data' => $data];
		$this->response->setOutput(json_encode($result));
	}
}
