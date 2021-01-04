<?php
class ControllerApiCategory extends Controller {

	public function index() {

        //校验token
        $this->load->model('account/customer_token');
        $uid = $this->model_account_customer_token->checkToken($this->request->getParam('token'));
        if (!$uid){
            $this->response->addHeader('Content-Type: application/json');
            $result = ['status' => 403, 'msg'=>'权限不足'];
            $this->response->setOutput(json_encode($result));
            return;
        }

		$this->load->model('catalog/category');
		$this->load->model('catalog/product');
		$this->load->model('tool/image');

		$categorys = $this->model_catalog_category->getCategories();
		$data = [];
		if(!empty($categorys) && is_array($categorys)){
			foreach($categorys as $category){
				$tmpdata = [];
				$tmpdata['id'] = $category['category_id'];
				$tmpdata['name'] = $category['name'];
				$tmpdata['icon'] = $category['image'];
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
