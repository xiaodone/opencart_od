<?php
// ENVIRONMENT
//1=development
//2=staging
//3=production


define('H_ENV', 1);

if( H_ENV < 3 )
{
    error_reporting(E_ALL);
    ini_set("display_errors" , 1);
}

/**
 * 
 */
define("IS_DYO_LOADED", TRUE);

/**
 *
 */
define("IS_PBCI_LOADED", TRUE);

/**
 * localhost IP
 */
define("LOCALHOST_IP", "192.168.1.102");

/**
 * protocol
 */
define("IS_HTTPS", FALSE);

/**
 * 
 */
define("DYO_BASE_DIR", str_replace( "/admin/", "/catalog/", DIR_APPLICATION ));

function loadDesignYourOwnCommons()
{
	require_once DYO_BASE_DIR.'controller/extension/module/productcolorbasedimages/helpers/common_helper.php';
	require_once DYO_BASE_DIR.'controller/extension/module/productcolorbasedimages/helpers/open_cart_helper.php';
	require_once DYO_BASE_DIR.'controller/extension/module/productcolorbasedimages/helpers/cart_checkout_helper.php';
}

function dyo_cnf_mountSettingMainCategoryId()
{
	if( isLocalHost() )
	{
	    
		//return 20;
	    return 18;
	}
	else 
	{
	    return 18; ///Laptops & Notebooks
	}
}

function dyo_cnf_diamondMainCategoryId()
{
	if( isLocalHost() )
	{
		//return 57;
	    return 34; //MP3 Players
	}
	else
	{
	    return 34; //MP3 Players
	}
}

function is_place_your_order()
{
    return true;
}

function can_be_set_with_filter_ids() 
{
	if( isLocalHost() )
	{
		//return array();
	    return array(5);
	}
	else
	{
		return array(5);
	}
}



function pcbi_option_value_ids_to_color_mapping($__this)
{
    $res = array();
    for($i=1; $i<=10; $i++)
    {
        $map_option_value_id= $__this->db->query("SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_PROD_OPT_VAL_ID_$i' AND hc_module_code='pcbi' ");
        $map_color = $__this->db->query("SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_PROD_OPT_VAL_ID_COLOR_$i' AND hc_module_code='pcbi' ");
        //echo "<pre>";print_r($map_option_value_id);echo "</pre>";die;
        if( $map_option_value_id->num_rows > 0 )
        {
           // echo "<pre>";print_r($map_option_value_id->rows[0]);echo "</pre>";die;
            foreach($map_option_value_id->rows[0] as $k=>$row)
            {
                //$res[$map_filter["hc_value"]] = $res[$map_color["hc_value"]];
                 $res[$map_option_value_id->rows[0]["hc_value"]] = $map_color->rows[0]["hc_value"];
            }
        }
    }
    return $res;
}

function pcbi_filter_value_ids_to_color_mapping($__this)
{
    
    $res = array();
    for($i=1; $i<=10; $i++)
    {
        $map_filter = $__this->db->query("SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_FILTER_OPTION_$i' AND hc_module_code='pcbi' ");
        $map_color = $__this->db->query("SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_FILTER_COLOR_OPTION_$i' AND hc_module_code='pcbi' ");
        if( $map_filter->num_rows > 0 )
        {
            foreach($map_filter->rows[0] as $k=>$row)
            {                
                $res[$map_filter->rows[0]["hc_value"]] = $map_color->rows[0]["hc_value"];
            }
        }
    }
    return $res;
}

function pcbi_is_color_option_id($id,$__this)
{
   // $sql = "SELECT * FROM " . DB_PREFIX . "hsquare_config";
    $option = $__this->db->query("SELECT * FROM " . DB_PREFIX . "hsquare_config where hc_key = 'OPTION_COLOR'");
    //echo "<pre>";print_r($option->rows[0]["hc_value"]);echo "</pre>";die;
    if($option->num_rows){
    	foreach($option->rows as $k=>$row)
	    {	    	
	       $id = $row["hc_value"];
	    }

	    return ( $id==$option->rows[0]["hc_value"] );
    }
    else{
    	return;
    }
    
}
// define( "SETTING_URL" , "route=product/category&is_dyo=1&dyo_bfs=S&path=".dyo_cnf_mountSettingMainCategoryId() );

// define( "DIAMOND_URL", "route=product/category&is_dyo=1&dyo_bfs=D&path=".dyo_cnf_diamondMainCategoryId() );
