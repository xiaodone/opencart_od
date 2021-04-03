<?php
class ControllerApiProduct extends Controller {

	public function index() {

		$this->load->model('catalog/product');

		$this->load->model('tool/image');
		
		if (isset($this->request->get['product_id'])) {
			$product_id = (int)$this->request->get['product_id'];
		} else {
			$product_id = 0;
		}



		$data = array();
		

		$product_info = $this->model_catalog_product->getProduct($product_id);
		$data['product_id'] = $product_info['product_id'];
		$data['name'] = $product_info['name'];
		$data['model'] = $product_info['model'];
		$data['price'] = $this->currency->format($product_info['price'], $this->session->data['currency']);
		$data['special'] = $product_info['special'];
// var_export($data['price']);
		if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
			$data['price'] = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'],'',false);
		} else {
			$data['price'] = 0;
		}//var_dump($this->session->data);
		$data['price'] = $this->currency->format($data['price'], $this->session->data['currency']);

		if ((float)$product_info['special']) {
			$data['special'] = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'],'',false);
		} else {
			$data['special'] = false;
		}

		if ($this->config->get('config_tax')) {
			$data['tax'] = $this->currency->format((float)$product_info['special'] ? $product_info['special'] : $product_info['price'], $this->session->data['currency']);
		} else {
			$data['tax'] = false;
		}
			foreach ($this->model_catalog_product->getProductOptions($this->request->get['product_id']) as $option) {
				$product_option_value_data = array();

				foreach ($option['product_option_value'] as $option_value) {
					if (!$option_value['subtract'] || ($option_value['quantity'] > 0)) {
						if ((($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) && (float)$option_value['price']) {
							$price = $this->currency->format($this->tax->calculate($option_value['price'], $product_info['tax_class_id'], $this->config->get('config_tax') ? 'P' : false), $this->session->data['currency']);
						} else {
							$price = 0;
						}

						$product_option_value_data[] = array(
							'product_option_value_id' => $option_value['product_option_value_id'],
							'option_value_id'         => $option_value['option_value_id'],
							'name'                    => $option_value['name'],
							'image'                   => $this->model_tool_image->resize($option_value['image'], 50, 50),
							'price'                   => $option_value['price'],//$price,
							'price_prefix'            => $option_value['price_prefix']
						);
					}
				}

				$data['options'][] = array(
					'product_option_id'    => $option['product_option_id'],
					'product_option_value' => $product_option_value_data,
					'option_id'            => $option['option_id'],
					'name'                 => $option['name'],
					'type'                 => $option['type'],
					'value'                => $option['value'],
					'required'             => $option['required']
				);
			}
		
		//获取颜色规格图片
		$data['diy'] = [];
		$diys = $this->model_catalog_product->getProductDiys($this->request->get['product_id']);
		foreach ($diys as $key => $value) {
			$value['src_url'] = $this->model_tool_image->imageUrl($value['src_url']);
			$value['src_overlay_url'] = $this->model_tool_image->imageUrl($value['src_overlay_url']);
			$data['diy'][$key] = $value;
		}

//		var_dump($data);exit;
		
		$this->response->addHeader('Content-Type: application/json');
		$result = ['status' => 200, 'data' => $data];
		$this->response->setOutput(json_encode($result));
	}

	public function list(){
		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		if (isset($this->request->get['category'])) {
			$category_id = (int)$this->request->get['category'];

		} else{
			$category_id = 0;
		}


		$products = $this->model_catalog_product->getProducts(['filter_category_id' => $category_id]);

		$data = [];
		if(!empty($products) && is_array($products)){
			foreach($products as $product){//var_export($product);die;
				$tmpproduct = [];
				$tmpproduct['id'] = $product['product_id'];
				$tmpproduct['name'] = $product['name'];
				$tmpproduct['desc'] = $product['meta_description'];
				$tmpproduct['thumb'] = $this->model_tool_image->resize($product['image'], 100, 100);
				// var_export($tmpproduct['image']);die;
				$tmpproduct['model'] = $product['model'];
				$data[] = $tmpproduct;
			}
		}
		$this->response->addHeader('Content-Type: application/json');
		$result = ['status' => 200, 'data' => $data];
		$this->response->setOutput(json_encode($result));

	}
}
