<?php
/**
 * @package he_: oc_hlp 
 * @author hsquare Tech Dev Team
 * @version 1.0
 */

function oc_hlp_getModuleSetting($controller, $module_key)
{
	return $controller->model_setting_module->getModule(133);
}

function oc_hlp_isDYOAction()
{
	return (
				( isset($_GET["is_dyo"]) && $_GET["is_dyo"] == 1 )
				||
				( isset($_GET["is_dyo"]) && $_GET["is_dyo"] == 1 )
		   );
}

function oc_hlp_getCartIndexReferenceForMappingKey($controller, $cartArr, $key, &$diamond_product_index, &$setting_product_index, $from)
{
	$tmpA = explode("_", $key);
	
	//echo $from." ".$key."<br>"; pr($cartArr['products']);
	if( sizeof($tmpA) < 5 )
	{
		return;
	}
	
	$keys = array_keys($cartArr['products']);
	$size = sizeof($keys);
	for ( $rTmp=0; $rTmp<$size;$rTmp++ )
	{
		$r = $keys[$rTmp];
		
		$product_id = 0; 
		if( $from == "account_order_info" )
		{
			$product_id = fetchSubStr($cartArr['products'][$r]['return'], "product_id=", "&"); 
		}
// 		else if( $from == "admin_order_info" )
// 		{
// 			$product_id = $cartArr['products'][$r]['product_id'];
// 		}
		else 
		{
			$product_id = $cartArr['products'][$r]['product_id']; 
		}
		//echo "p id ".$product_id."<br>";
		
		if( $setting_product_index == -1 && $product_id == $tmpA[3] ) 
		{
			$setting_product_index = $r;
		}
		else if( $diamond_product_index == -1 && $product_id== $tmpA[4] )
		{
			$diamond_product_index = $r;
		}
	}
}

function oc_hlp_doMappingAndMergeCartItem($controller, &$cartArr, $from="cart", $order_id=0)
{
	$productArr = array();
	$k = 0;
	
	
	//set false as images not displayed in checkout
	if( false && $from == "checkout" )
	{
		$controller->load->model('catalog/product');
		$controller->load->model('tool/image');
		
		for ( $r=0; $r<COUNT( $cartArr['products'] );$r++ )
		{
			$product = $controller->model_catalog_product->getProduct($cartArr['products'][$r]['product_id']);
			$cartArr['products'][$r]['thumb'] = $controller->model_tool_image->resize($product['image'], $controller->config->get('theme_' . $controller->config->get('config_theme') . '_image_cart_width'), $controller->config->get('theme_' . $controller->config->get('config_theme') . '_image_cart_height'));
		}
	}
// 	if( isset($_GET["is_test"]) && $_GET["is_test"] == 1 )
// 	{
//  		pr($cartArr["products"]); //die;
// 	}
	
	
	$dyo_maps = null;
	if( $from == "account_order_info" || $from == "admin_order_info" )
	{
		$query = $controller->db->query("	SELECT * FROM dyo_order_items_map WHERE order_id=".(int)$order_id." ");
		$dyo_maps= array();
		foreach($query->rows as $result){
			$dyo_maps[] = $result;
		}
	}
	else 
	{
		if( isset($controller->session->data["dyo_maps"]) )
		{
			$dyo_maps = $controller->session->data["dyo_maps"];
		}
	}
	
	
	if( !isEmptyArr($dyo_maps) )
	{
		foreach ($dyo_maps as $key=>$val)
		{
			//if( $val != 1 )	continue;
			if( $from == "account_order_info" || $from == "admin_order_info" )
			{
				$key = $val["oim_key"]; 
			}

			$diamond_product_index = -1; 
			$setting_product_index = -1; 
			oc_hlp_getCartIndexReferenceForMappingKey($controller, $cartArr, $key, $diamond_product_index, $setting_product_index, $from);
			
			if( $diamond_product_index == -1 || $setting_product_index == -1 )	continue;	
			
			if( $from == "account_order_info" )
			{
				$productArr[$k] = $cartArr['products'][$setting_product_index];
				$productArr[$k]['name_d'] = $cartArr['products'][$diamond_product_index]['name'];
				$productArr[$k]['model_d'] = $cartArr['products'][$diamond_product_index]['model'];
				$productArr[$k]['option_d'] = $cartArr['products'][$diamond_product_index]['option'];
				$productArr[$k]['quantity_d'] = $cartArr['products'][$diamond_product_index]['quantity'];
				$productArr[$k]['price_d'] = $cartArr['products'][$diamond_product_index]['price'];
				$productArr[$k]['total_d'] = $cartArr['products'][$diamond_product_index]['total'];
				$productArr[$k]['reorder_d'] = $cartArr['products'][$diamond_product_index]['reorder'];
				$productArr[$k]['return_d'] = $cartArr['products'][$diamond_product_index]['return'];
			}
			else if( $from == "admin_order_info" )
			{
				$productArr[$k] = $cartArr['products'][$setting_product_index];
				$productArr[$k]['order_product_id_d'] = $cartArr['products'][$diamond_product_index]['order_product_id'];
				$productArr[$k]['product_id_d'] = $cartArr['products'][$diamond_product_index]['product_id'];
				$productArr[$k]['name_d'] = $cartArr['products'][$diamond_product_index]['name'];
				$productArr[$k]['model_d'] = $cartArr['products'][$diamond_product_index]['model'];
				$productArr[$k]['option_d'] = $cartArr['products'][$diamond_product_index]['option'];
				$productArr[$k]['quantity_d'] = $cartArr['products'][$diamond_product_index]['quantity'];
				$productArr[$k]['price_d'] = $cartArr['products'][$diamond_product_index]['price'];
				$productArr[$k]['total_d'] = $cartArr['products'][$diamond_product_index]['total'];
				$productArr[$k]['href_d'] = $cartArr['products'][$diamond_product_index]['href'];
			}
			else if( $from == "cart_popup" )
			{
				$productArr[$k] = $cartArr['products'][$setting_product_index];
				$productArr[$k]['cart_id_d'] = $cartArr['products'][$diamond_product_index]['cart_id'];
				$productArr[$k]['product_id_d'] = $cartArr['products'][$diamond_product_index]['product_id'];
				$productArr[$k]['thumb_d'] = $cartArr['products'][$diamond_product_index]['thumb'];
				$productArr[$k]['name_d'] = $cartArr['products'][$diamond_product_index]['name'];
				$productArr[$k]['model_d'] = $cartArr['products'][$diamond_product_index]['model'];
				$productArr[$k]['option_d'] = $cartArr['products'][$diamond_product_index]['option'];
				$productArr[$k]['recurring_d'] = $cartArr['products'][$diamond_product_index]['recurring'];
				$productArr[$k]['quantity_d'] = $cartArr['products'][$diamond_product_index]['quantity'];
				$productArr[$k]['price_d'] = $cartArr['products'][$diamond_product_index]['price'];
				$productArr[$k]['total_d'] = $cartArr['products'][$diamond_product_index]['total'];
				$productArr[$k]['href_d'] = $cartArr['products'][$diamond_product_index]['href'];
			}
			else 
			{
				$productArr[$k]['setting']['cart_id'] = $cartArr['products'][$setting_product_index]['cart_id'];
				$productArr[$k]['setting']['product_id'] = $cartArr['products'][$setting_product_index]['product_id'];
				$productArr[$k]['setting']['thumb'] = isset( $cartArr['products'][$setting_product_index]['thumb'] ) ? $cartArr['products'][$setting_product_index]['thumb']: "";
				$productArr[$k]['setting']['name'] = $cartArr['products'][$setting_product_index]['name'];
				$productArr[$k]['setting']['model'] = $cartArr['products'][$setting_product_index]['model'];
				$productArr[$k]['setting']['option'] = $cartArr['products'][$setting_product_index]['option'];
				$productArr[$k]['setting']['recurring'] = $cartArr['products'][$setting_product_index]['recurring'];
				$productArr[$k]['setting']['quantity'] = $cartArr['products'][$setting_product_index]['quantity'];
				$productArr[$k]['setting']['price'] = $cartArr['products'][$setting_product_index]['price'];
				$productArr[$k]['setting']['total'] = $cartArr['products'][$setting_product_index]['total'];
				$productArr[$k]['setting']['href'] = $cartArr['products'][$setting_product_index]['href'];
				
				$productArr[$k]['diamond']['cart_id'] = $cartArr['products'][$diamond_product_index]['cart_id'];
				$productArr[$k]['diamond']['product_id'] = $cartArr['products'][$diamond_product_index]['product_id'];
				$productArr[$k]['diamond']['thumb'] = isset( $cartArr['products'][$diamond_product_index]['thumb'] ) ? $cartArr['products'][$diamond_product_index]['thumb'] : "";
				$productArr[$k]['diamond']['name'] = $cartArr['products'][$diamond_product_index]['name'];
				$productArr[$k]['diamond']['model'] = $cartArr['products'][$diamond_product_index]['model'];
				$productArr[$k]['diamond']['option'] = $cartArr['products'][$diamond_product_index]['option'];
				$productArr[$k]['diamond']['recurring'] = $cartArr['products'][$diamond_product_index]['recurring'];
				$productArr[$k]['diamond']['quantity'] = $cartArr['products'][$diamond_product_index]['quantity'];
				$productArr[$k]['diamond']['price'] = $cartArr['products'][$diamond_product_index]['price'];
				$productArr[$k]['diamond']['total'] = $cartArr['products'][$diamond_product_index]['total'];
				$productArr[$k]['diamond']['href'] = $cartArr['products'][$diamond_product_index]['href'];
			}
			
			//
			$productArr[$k]["is_dyo"] = true; 
			
			//
			unset($cartArr['products'][$setting_product_index]); 
			unset($cartArr['products'][$diamond_product_index]);
		    
		    $k += 1;
		}
	}
	
	
	//copy non dyo products 
	foreach ($cartArr['products'] as $k=>$ar)
	{
		$ar["is_dyo"] = false; 
		$productArr[] = $ar;
	}
	
	
	$cartArr['products'] = $productArr;
// 	if( isset($_GET["is_test"]) && $_GET["is_test"] == 1 )
// 	{
// 		pr($cartArr["products"]);	die;
// 	}
	
	
	return $cartArr;
}

function oc_hlp_removeMapping($controller, $setting_cart_id, $diamond_cart_id)
{
	//delete mapping from session
	if( isset($controller->session->data["dyo_maps"]) )
	{
		unset($controller->session->data["dyo_maps"][$diamond_cart_id."_".$diamond_cart_id]);
		return true;
	}
	else 
	{
		return false;
	}
}

function oc_pcbi_hlp_updateCartImagesAsPerColor($controller, &$cartArr)
{
	$controller->load->model('catalog/product');
	$controller->load->model('tool/image');
	
	$size = COUNT( $cartArr['products'] );
	for ( $r=0; $r<$size;$r++ )
	{
		$images = $controller->model_catalog_product->getProductImages1($cartArr['products'][$r]['product_id'], $cartArr['products'][$r], true);
		if( isset($images[0]) )
		{
			$thumb = $controller->model_tool_image->resize($images[0]["image"], $controller->config->get('theme_' . $controller->config->get('config_theme') . '_image_cart_width'), $controller->config->get('theme_' . $controller->config->get('config_theme') . '_image_cart_height'));
			if( !empty($thumb) )
			{
				$cartArr['products'][$r]['thumb'] = $thumb;
			}
		}
	}
}

function oc_pcbi_hlp_imagesColorKeyBasedOnOptions($controller, $options=null)
{
	$key = "";
	//$__this=0;
	if( !isEmptyArr($options) )
	{
	    $pcbi_option_value_ids_to_color_mapping = pcbi_option_value_ids_to_color_mapping($controller);
		$keys = array_keys($pcbi_option_value_ids_to_color_mapping);
		
		foreach ($options as $k=>$opt)
		{
			if(empty($opt["pcbi_extras"]))	continue;	
			
			if( isset($opt["pcbi_extras"]["option_value_id"]) && in_array($opt["pcbi_extras"]["option_value_id"], $keys) )
			{
				$key = $pcbi_option_value_ids_to_color_mapping[$opt["pcbi_extras"]["option_value_id"]];
			}
		}
	}
	else 
	{
		$applicable_ids = array(); 	
		$applicable_mapping = array();
		
		if( !empty($controller->request->get["pbci_filter"]) && is_string($controller->request->get["pbci_filter"]))
		{
			$applicable_ids = explode(",", $controller->request->get["pbci_filter"]);
			$applicable_mapping = pcbi_filter_value_ids_to_color_mapping();
		}
		else if( !empty($controller->request->get["filter"]) && is_string($controller->request->get["filter"]))
		{
			$applicable_ids = explode(",", $controller->request->get["filter"]);
			$applicable_mapping = pcbi_filter_value_ids_to_color_mapping();
		}
		else if( !empty($controller->request->get["pbci_option"]) && is_string($controller->request->get["pbci_option"]))
		{
			$applicable_ids = explode(",", $controller->request->get["pbci_option"]);
			$applicable_mapping = pcbi_option_value_ids_to_color_mapping($controller);
		}
		else if( !empty($_GET["pbci_option"]) && is_string($_GET["pbci_option"]))
		{
			$applicable_ids = explode(",", $_GET["pbci_option"]);
			$applicable_mapping = pcbi_option_value_ids_to_color_mapping($controller);
		}
		else if( !empty($controller->request->get["option"]) && is_string($controller->request->get["option"]))
		{
			$applicable_ids = explode(",", $controller->request->get["option"]);
			$applicable_mapping = pcbi_option_value_ids_to_color_mapping($controller);
		}
		
		
// 		pr($applicable_ids);
		$keys = array_keys($applicable_mapping);
		foreach ($applicable_ids as $id)
		{
			if( !empty($id) && in_array($id, $keys) )
			{
// 				echo "0.1 ".$applicable_mapping[$id]."<br>";
				$key = $applicable_mapping[$id];
			}
		}
	}
	
	return $key;
}

function oc_pcbi_hlp_getImages($controller, $product_id, $pcbi_context=array(), $is_return_scalar_array=false, $is_return_all=false)
{
	$where = "";
	
	if( !$is_return_all )
	{
		//
		if( !empty($pcbi_context["pi_pcbi_color"]) )
		{
			$where = " AND pi_pcbi_color='".$pcbi_context["pi_pcbi_color"]."' ";
		}
		else 
		{
			$pi_pcbi_color = oc_pcbi_hlp_imagesColorKeyBasedOnOptions($controller, isset($pcbi_context["option"]) ? $pcbi_context["option"] : null);
			
			if( !empty($pi_pcbi_color) )
			{
				$where = " AND pi_pcbi_color='".$pi_pcbi_color."' ";
			}
		}
		
		
		//
		if( empty($where) )
		{
			$where = " AND ( pi_pcbi_color='' OR pi_pcbi_color='white' ) "; 
		}
	}
	
// 	echo "here 1"."SELECT * FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "' ".$where." ORDER BY sort_order ASC"."<br>"; 
	$query = $controller->db->query("SELECT * FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "' ".$where." ORDER BY sort_order ASC");
	
	if($is_return_scalar_array)
	{
// 		echo "here 2<br>";
		
		$images = array();
		foreach($query->rows as $result){
// 			echo "here 3<br>";
			$images[] = $result;
		}

// 		//
// 		if( isset($_GET["is_test"]) && $_GET["is_test"] == 1 )
// 		{
// 			echo "here oc_pcbi_hlp_getImages";
// 			pr($images);//die;
// 		}
// 		die;
		return $images;
	}
	else 
	{
// 		echo "here 4<br>";	die;
		return $query->rows; 
	}
}

function oc_pcbi_hlp_setSettingColorParams($controller, $option_value_id)
{
	$controller->session->data["dyo_setting_pbci_option"] = $option_value_id;
}

function oc_pcbi_hlp_getSettingColorParams($controller)
{
	return $controller->session->data["dyo_setting_pbci_option"]; 
}
