<?php
error_reporting( E_ALL );
class ControllerExtensionModuleProductColorBasedImages extends Controller  {
    private $error = array();    
    public function __construct($registry){   
    	parent::__construct( $registry );    	    	
    	require_once str_replace( "/admin/", "/catalog/", DIR_APPLICATION ).'controller/extension/module/productcolorbasedimages/config.php';
    	loadDesignYourOwnCommons();
    }    
    public function index() {
        $this->load->language('extension/module/productcolorbasedimages');        
        $this->document->setTitle($this->language->get('heading_title'));
        $id=0;        
		$this->load->model('setting/setting');      
        $this->load->model('extension/pcbi');
        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('module_productcolorbasedimages', $this->request->post);           
            $this->session->data['success'] = $this->language->get('text_success');
            $this->model_extension_pcbi->insertHsquare_configTable();
             if( version_compare( constant('VERSION') ,'3.0.0.0') != -1){
                $this->response->redirect($this->url->link('marketplace/extension', ( !empty($this->session->data['token'])?'token='.$this->session->data['token']:'user_token='.$this->session->data['user_token'] ) . '&type=module', true));         
            } else {
                $this->response->redirect($this->url->link('extension/extension', ( !empty($this->session->data['token'])?'token='.$this->session->data['token']:'user_token='.$this->session->data['user_token'] ) . '&type=module', true));         
            }     
        }
        $FilterOptionKey=false;
        for($i=1; $i<=3; $i++) {
            if(isset($this->request->post["map_filter_color_option_$i"])) {
                $FilterOptionKey=$FilterOptionKey+isset($this->request->post["map_filter_color_option_$i"]);                
            } else {
                $FilterOptionKey=$FilterOptionKey+(TRUE*isset($this->request->post["map_filter_color_option_$i"]));
            }
        }
        $data['FilterOptionKey']=$FilterOptionKey;        
        $this->model_extension_pcbi->CreateHsquare_configTable();
        $option = $this->model_extension_pcbi->getoption();
        $filter = $this->model_extension_pcbi->getFilter_value();
        $product_option_value = $this->model_extension_pcbi->getProduct_option_value_id();
        ${'A_'}=true;               
        pcbi_filter_value_ids_to_color_mapping($this);
        pcbi_option_value_ids_to_color_mapping($this);
        pcbi_is_color_option_id($id,$this);
        $result = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'OPTION_COLOR' AND hc_module_code='pcbi'");
        $this->model_extension_pcbi->alterTableproduct_image();        
        $status=$this->db->query("SELECT hc_status FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'OPTION_COLOR' AND hc_module_code='pcbi'");        
        $data=array();
        ${'A_'.(${'A_'})}=${'A_'}+true;        
        if (isset($this->request->post['status']))        {
            $data['status']=$this->request->post['status'];       
        }
        if (isset($status->rows[0]['hc_status']))
        {
            $data['db_status']=$status->rows[0]['hc_status'];
        }
        ${'A_'.(${'A_'.true})}=${'A_'.(${'A_'})}+true;
        foreach($option->rows as $k=>$row) {          
            $is_selected = false;          
            if (isset($this->request->post['add_color'] )) {
                if($row["option_id"]==$this->request->post['add_color']) {                    
                    $is_selected=true;
                }else{                    
                    $is_selected = false;
                }
            }
            if(!$is_selected) {
                if (isset($result->row['hc_value'])) {
                    if($row["option_id"]== $result->row['hc_value']) {
                        $is_selected=true;
                    } else {                        
                        $is_selected = false;
                    }
                } else  {
                    $is_selected = false;
                }                
            }
            $data['option'][] = array( 'option' => $row["name"], 'option_id' => $row["option_id"], 'sel' => $is_selected ? 'selected="selected"' : '' );
        }        
                      
if(isset($this->request->post["map_filter_color_option_${'A_'}"]))
{
    $data["color_option"]=$this->request->post["map_filter_color_option_${'A_'}"];
    if(isset($row["color_id"]))
    {
        if($row["color_id"]==$this->request->post["map_filter_color_option_${'A_'}"])
        {
            $is_selected=true;
        }
        else
        {
            $is_selected = false;
        }
    }
    
}
            $result_color = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_FILTER_COLOR_OPTION_${'A_'}' AND hc_module_code='pcbi' AND hc_value IS NOT NULL ");
           if (isset($result_color->row['hc_value']))
               {
                   $data['result_color_f'][${'A_'}]= $result_color->row['hc_value'];
               }
           else 
   {
       $data['result_color_f'][${'A_'}]='';
   }

           if(isset($this->request->post["map_filter_color_option_${'A_'.true}"]))
            {
                $data["color_option"]=$this->request->post["map_filter_color_option_${'A_'.true}"];
                if(isset($row["color_id"]))
                {
                            if($row["color_id"]==$this->request->post["map_filter_color_option_${'A_'.true}"])
                            {
                                $is_selected=true;
                            }
        else
            {
                $is_selected = false;
            }
                }
                
            }
$result_color = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_FILTER_COLOR_OPTION_${'A_'.true}' AND hc_module_code='pcbi' AND hc_value IS NOT NULL ");
           if (isset($result_color->row['hc_value']))
                   {
                       $data['result_color_f'][${'A_'.true}]= $result_color->row['hc_value'];
                   }
           else 
           {
                    $data['result_color_f'][${'A_'.true}]='';
           }

if(isset($this->request->post["map_filter_color_option_${'A_'.(${'A_'.true})}"]))
{
    $data["color_option"]=$this->request->post["map_filter_color_option_${'A_'.(${'A_'.true})}"];
    if(isset($row["color_id"]))
    {
        if($row["color_id"]==$this->request->post["map_filter_color_option_${'A_'.(${'A_'.true})}"])
        {
                                $is_selected=true;
                            }
                            else
                            {
                                $is_selected = false;
                            }
                        }
                        
                    }
            $result_color = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_FILTER_COLOR_OPTION_${'A_'.(${'A_'.true})}' AND hc_module_code='pcbi' AND hc_value IS NOT NULL ");
           if (isset($result_color->row['hc_value']))
           {
       $data['result_color_f'][${'A_'.(${'A_'.true})}]= $result_color->row['hc_value'];
   }
   else 
   {
               $data['result_color_f'][${'A_'.(${'A_'.true})}]='';
           }

                    $data['result_color']=array();
                    $ColorKeys=false;
                    for($i=1; $i<=3; $i++)
                    {
            if(isset($this->request->post["map_filter_color_option_$i"]))
            {
        $ColorKeys=$ColorKeys+isset($this->request->post["map_filter_color_option_$i"]);                
    } else {
        $ColorKeys=$ColorKeys+(TRUE*isset($this->request->post["map_filter_color_option_$i"]));
    }
}
$data['ColorKeys']=$ColorKeys;
    
if(isset($this->request->post["map_option_value_ids_color_option_${'A_'}"]))
        {
            $data["color_option"]=$this->request->post["map_option_value_ids_color_option_${'A_'}"];
            if (isset($row["color_id"]))
            {
                        if($row["color_id"]==$this->request->post["map_option_value_ids_color_option_${'A_'}"])
                        {                    
                            $is_selected=true;
                        } else {                    

            $is_selected = false;
        }
    }            
}
$result_prod_opt_val_id_color = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_PROD_OPT_VAL_ID_COLOR_${'A_'}' AND hc_module_code='pcbi' AND hc_value IS NOT NULL ");

if (isset($result_prod_opt_val_id_color->row['hc_value']))
{
                $data['result_color'][${'A_'}]= $result_prod_opt_val_id_color->row['hc_value'];
            }
            else 
            {
        $data['result_color'][${'A_'}]= '';
    }

if(isset($this->request->post["map_option_value_ids_color_option_${'A_'.true}"]))
{
    $data["color_option"]=$this->request->post["map_option_value_ids_color_option_${'A_'.true}"];
    if (isset($row["color_id"]))
    {
        if($row["color_id"]==$this->request->post["map_option_value_ids_color_option_${'A_'.true}"])
        {
                    
                    $is_selected=true;
                }
                else
                {
                                    
                                    $is_selected = false;
                                }
                            }
                            
                        }
$result_prod_opt_val_id_color = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_PROD_OPT_VAL_ID_COLOR_${'A_'.true}' AND hc_module_code='pcbi' AND hc_value IS NOT NULL ");

if (isset($result_prod_opt_val_id_color->row['hc_value'])) {

                            $data['result_color'][${'A_'.true}]= $result_prod_opt_val_id_color->row['hc_value'];
                        }
                        else {

            $data['result_color'][${'A_'.true}]= '';
        }

                        if(isset($this->request->post["map_option_value_ids_color_option_${'A_'.(${'A_'.true})}"])) {

                            $data["color_option"]=$this->request->post["map_option_value_ids_color_option_${'A_'.(${'A_'.true})}"];
                            if (isset($row["color_id"])) {

                                if($row["color_id"]==$this->request->post["map_option_value_ids_color_option_${'A_'.(${'A_'.true})}"]) {
                    
        $is_selected=true;
    } else {                    
        $is_selected = false;
    }
}            
        }
                    $result_prod_opt_val_id_color = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_PROD_OPT_VAL_ID_COLOR_${'A_'.(${'A_'.true})}' AND hc_module_code='pcbi' AND hc_value IS NOT NULL ");

                    if (isset($result_prod_opt_val_id_color->row['hc_value'])) {

                        $data['result_color'][${'A_'.(${'A_'.true})}]= $result_prod_opt_val_id_color->row['hc_value'];
                    } else {

                        $data['result_color'][${'A_'.(${'A_'.true})}]= '';
}

$data['filter'] = array();    
foreach($filter->rows as $k=>$row)
{
    $is_selected = false;
    
                
if (isset($this->request->post["map_filter_option_${'A_'}"] ))
        {
$data["map_filter_value_ids_option"]=$this->request->post["map_filter_option_${'A_'}"];
if($row["filter_id"]==$this->request->post["map_filter_option_${'A_'}"])
{
                
                $is_selected=true;
                        }
                        else
                        {
                            
                            $is_selected = false;
                        }
        }

        $result_filter = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_FILTER_OPTION_${'A_'}' AND hc_module_code='pcbi' AND hc_value IS NOT NULL ");
        if (isset($result_filter->row['hc_value']))
        {
            $data['result_filter_opt_val_id'][${'A_'}]= $result_filter->row['hc_value'];
        }
        else
        {
            $data['result_filter_opt_val_id'][${'A_'}]= '';
        }
        if(!$is_selected)
        {
            if (isset($result_filter->row['hc_value']))
            {
                
                if($row["filter_id"]==$result_filter->row['hc_value'])
                {
                    
                    $is_selected=true;
                }
                else
                {
                    $is_selected = false;
                }
            }                    
        }

            if (isset($this->request->post["map_filter_option_${'A_'.true}"] ))
            {
                $data["map_filter_value_ids_option"]=$this->request->post["map_filter_option_${'A_'.true}"];
                if($row["filter_id"]==$this->request->post["map_filter_option_${'A_'.true}"])
                {
                    
                    $is_selected=true;
                }
                else
                {
                    
                    $is_selected = false;
                }
            }
            
            $result_filter = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_FILTER_OPTION_${'A_'.true}' AND hc_module_code='pcbi' AND hc_value IS NOT NULL ");    
            if (isset($result_filter->row['hc_value']))
            {
                $data['result_filter_opt_val_id'][${'A_'.true}]= $result_filter->row['hc_value'];
            }
            else
            {
                $data['result_filter_opt_val_id'][${'A_'.true}]= '';
            }
            if(!$is_selected)
            {
                if (isset($result_filter->row['hc_value']))
                {
                    
                    if($row["filter_id"]==$result_filter->row['hc_value'])
                    {
                        
                        $is_selected=true;
                    }
                    else
                    {
                        $is_selected = false;
                    }
                }                    
            }
             
            if (isset($this->request->post["map_filter_option_${'A_'.(${'A_'.true})}"] ))
            {
                $data["map_filter_value_ids_option"]=$this->request->post["map_filter_option_${'A_'.(${'A_'.true})}"];
                if($row["filter_id"]==$this->request->post["map_filter_option_${'A_'.(${'A_'.true})}"])
                {
                    
                    $is_selected=true;
                }
                else
                {
                    
                    $is_selected = false;
                }
            }
            
            $result_filter = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_FILTER_OPTION_${'A_'.(${'A_'.true})}' AND hc_module_code='pcbi' AND hc_value IS NOT NULL ");
            if (isset($result_filter->row['hc_value']))
            {
                $data['result_filter_opt_val_id'][${'A_'.(${'A_'.true})}]= $result_filter->row['hc_value'];
            }
            else
            {
                $data['result_filter_opt_val_id'][${'A_'.(${'A_'.true})}]= '';
            }
            if(!$is_selected)
            {
                if (isset($result_filter->row['hc_value']))
                {
                    
                    if($row["filter_id"]==$result_filter->row['hc_value'])
                    {
                        
                        $is_selected=true;
                    }
                    else
                    {
                        $is_selected = false;
                    }
                }                    
            }       
                    
                    $data['filter'][] = array(
                        'filter' => $row["name"],
                        'filter_id' => $row["filter_id"],
                        'sel' => $is_selected ? 'selected="selected"' : ''
                        
                    );
                }        
         $FilterKey=false;
        for($i=1; $i<=3; $i++)
        {
            if(isset($this->request->post["map_filter_color_option_$i"]))
            {
                $FilterKey=$FilterKey+isset($this->request->post["map_filter_color_option_$i"]);                
            } else {
                $FilterKey=$FilterKey+(TRUE*isset($this->request->post["map_filter_color_option_$i"]));
            }
        }     
        $data['FilterKey']  = $FilterKey;
        
        foreach($product_option_value->rows as $k=>$row)
        {
            $is_selected = false;
            
                
                if (isset($this->request->post["map_option_value_ids_option_${'A_'}"] ))
                {
                    $data["map_option_value_ids_option"]=$this->request->post["map_option_value_ids_option_${'A_'}"];
                    if($row["option_value_id"]==$this->request->post["map_option_value_ids_option_${'A_'}"])
                    {
                        
                        $is_selected=true;
                    }
                    else
                    {
                        
                        $is_selected = false;
                    }
                }
                
                $result_prod_opt_val_id = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_PROD_OPT_VAL_ID_${'A_'}' AND hc_module_code='pcbi' AND hc_value IS NOT NULL ");
               if(isset($result_prod_opt_val_id->row['hc_value']))
               {
                   $data['result_product_opt_val_id'][${'A_'}]=$result_prod_opt_val_id->row['hc_value'];
               }
               else 
               {
                   $data['result_product_opt_val_id'][${'A_'}]='';
               }
                
                if(!$is_selected)
                {
                    if (isset($result_prod_opt_val_id->row['hc_value']))
                    {
                        if($row["option_value_id"]==$result_prod_opt_val_id->row['hc_value'])
                        {
                            
                            $is_selected=true;
                        }
                        else
                        {
                            $is_selected = false;
                        }
                    }
                    else 
                    {
                        $is_selected = false;
                    }
                    
                }
            
                if (isset($this->request->post["map_option_value_ids_option_${'A_'.true}"] ))
                {
                    $data["map_option_value_ids_option"]=$this->request->post["map_option_value_ids_option_${'A_'.true}"];
                    if($row["option_value_id"]==$this->request->post["map_option_value_ids_option_${'A_'.true}"])
                    {
                        
                        $is_selected=true;
                    }
                    else
                    {
                        
                        $is_selected = false;
                    }
                }
                
                $result_prod_opt_val_id = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_PROD_OPT_VAL_ID_${'A_'.true}' AND hc_module_code='pcbi' AND hc_value IS NOT NULL ");
               if(isset($result_prod_opt_val_id->row['hc_value']))
               {
                   $data['result_product_opt_val_id'][${'A_'.true}]=$result_prod_opt_val_id->row['hc_value'];
               }
               else 
               {
                   $data['result_product_opt_val_id'][${'A_'.true}]='';
               }
             
                if(!$is_selected)
                {
                    if (isset($result_prod_opt_val_id->row['hc_value']))
                    {
                        if($row["option_value_id"]==$result_prod_opt_val_id->row['hc_value'])
                        {
                            
                            $is_selected=true;
                        }
                        else
                        {
                            $is_selected = false;
                        }
                    }
                    else 
                    {
                        $is_selected = false;
                    }
                    
                }

                if (isset($this->request->post["map_option_value_ids_option_${'A_'.(${'A_'.true})}"] ))
                {
                    $data["map_option_value_ids_option"]=$this->request->post["map_option_value_ids_option_${'A_'.(${'A_'.true})}"];
                    if($row["option_value_id"]==$this->request->post["map_option_value_ids_option_${'A_'.(${'A_'.true})}"])
                    {
                        
                        $is_selected=true;
                    }
                    else
                    {
                        
                        $is_selected = false;
                    }
                }
                
                $result_prod_opt_val_id = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_PROD_OPT_VAL_ID_${'A_'.(${'A_'.true})}' AND hc_module_code='pcbi' AND hc_value IS NOT NULL ");
               if(isset($result_prod_opt_val_id->row['hc_value']))
               {
                   $data['result_product_opt_val_id'][${'A_'.(${'A_'.true})}]=$result_prod_opt_val_id->row['hc_value'];
               }
               else 
               {
                   $data['result_product_opt_val_id'][${'A_'.(${'A_'.true})}]='';
               }
                
                if(!$is_selected)
                {
                    if (isset($result_prod_opt_val_id->row['hc_value']))
                    {
                        if($row["option_value_id"]==$result_prod_opt_val_id->row['hc_value'])
                        {
                            
                            $is_selected=true;
                        }
                        else
                        {
                            $is_selected = false;
                        }
                    }
                    else 
                    {
                        $is_selected = false;
                    }
                    
                }
            
            $data['product_option_value'][] = array(
                'name' => $row["name"],
                'option_value_id' => $row["option_value_id"],
                'sel' => $is_selected ? 'selected="selected"' : ''
                
            );
        }

		$data['entry_color'] = $this->language->get('entry_color');
		$data['entry_filter'] = $this->language->get('entry_filter');
		$data['entry_map_color'] = $this->language->get('entry_map_color');
		$data['entry_map_filter'] = $this->language->get('entry_map_filter');
		$data['entry_option_value_ids_to_color_mapping'] = $this->language->get('entry_option_value_ids_to_color_mapping');
		$data['entry_map_option_value_ids'] = $this->language->get('entry_map_option_value_ids');
		
        $data['heading_title'] = $this->language->get('heading_title');
        
        $data['text_edit'] = $this->language->get('text_edit');
        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_content_top'] = $this->language->get('text_content_top');
        $data['text_content_bottom'] = $this->language->get('text_content_bottom');
        $data['text_column_left'] = $this->language->get('text_column_left');
        $data['text_column_right'] = $this->language->get('text_column_right');
        $data['entry_name'] = $this->language->get('entry_name');
        $data['entry_limit'] = $this->language->get('entry_limit');
        $data['entry_status'] = $this->language->get('entry_status');
        
        $data['entry_layout'] = $this->language->get('entry_layout');
        $data['entry_position'] = $this->language->get('entry_position');
        $data['entry_status'] = $this->language->get('entry_status');
        $data['entry_sort_order'] = $this->language->get('entry_sort_order');
        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');
        $data['button_add_module'] = $this->language->get('button_add_module');
        $data['button_remove'] = $this->language->get('button_remove');
        
        if (isset($this->error['warning'])) 
        {
            $data['error_warning'] = $this->error['warning'];
        } 
        else 
        {
            $data['error_warning'] = '';
        }
            
        if (isset($this->error['name'])) 
        {
            $data['error_name'] = $this->error['name'];
        } 
        else 
        {
            $data['error_name'] = '';
        }
      
        $data['breadcrumbs'] = array();        
        
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 
                ( !empty($this->session->data['token'])?'token='.$this->session->data['token']:'user_token='.$this->session->data['user_token'] ), true)
        );
        
        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_module'),
            'href' => $this->url->link('marketplace/extension', ( !empty($this->session->data['token'])?'token='.$this->session->data['token']:'user_token='.$this->session->data['user_token'] ). '&type=module', true)
        );
        
        if (!isset($this->request->get['module_id'])) 
        {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('extension/module/productcolorbasedimages', ( !empty($this->session->data['token'])?'token='.$this->session->data['token']:'user_token='.$this->session->data['user_token'] ), true)
            );
        } 
        else 
        {
            $data['breadcrumbs'][] = array(
                'text' => $this->language->get('heading_title'),
                'href' => $this->url->link('extension/module/productcolorbasedimages', ( !empty($this->session->data['token'])?'token='.$this->session->data['token']:'user_token='.$this->session->data['user_token'] ) . '&module_id=' . $this->request->get['module_id'], true)
            );
        }
        
        if (!isset($this->request->get['module_id'])) 
        {
            $data['action'] = $this->url->link('extension/module/productcolorbasedimages', ( !empty($this->session->data['token'])?'token='.$this->session->data['token']:'user_token='.$this->session->data['user_token'] ), true);
        } 
        else 
        {
            $data['action'] = $this->url->link('extension/module/productcolorbasedimages', ( !empty($this->session->data['token'])?'token='.$this->session->data['token']:'user_token='.$this->session->data['user_token'] ) . '&module_id=' . $this->request->get['module_id'], true);
        }
        
        $data['cancel'] = $this->url->link('marketplace/extension', ( !empty($this->session->data['token'])?'token='.$this->session->data['token']:'user_token='.$this->session->data['user_token'] ) . '&type=module', true);
        
        if (isset($this->request->get['module_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) 
        {
            $module_info = $this->model_setting_module->getModule($this->request->get['module_id']);
        }
        $ColorOptionKey=false;
        for($i=1; $i<=3; $i++)
        {
            if(isset($this->request->post["map_filter_color_option_$i"]))
            {
                $ColorOptionKey=$ColorOptionKey+isset($this->request->post["map_filter_color_option_$i"]);                
            } else {
                $ColorOptionKey=$ColorOptionKey+(TRUE*isset($this->request->post["map_filter_color_option_$i"]));
            }
        }
        $data['ColorOptionKey']=$ColorOptionKey;
              
        if (isset($this->request->post['add_color'])) 
        {
            $data['add_color'] = $this->request->post['add_color'];
        } 
        elseif (!empty($module_info)) 
        {
            $data['add_color'] = $module_info['add_color'];
        } 
        else 
        {
            $data['add_color'] = '';
        }
        
        if (!empty($this->request->post['map_filter_option']) && isset($this->request->post['map_filter_option']))
        {
            $data['map_filter_option'] = $this->request->post['map_filter_option'];
        }
        elseif (!empty($module_info))
        {
            $data['map_filter_option'] = $module_info['map_filter_option'];
        }
        else
        {
            $data['map_filter_option'] = '';
        }
        
        if ( !empty($this->request->post['map_filter_color_option']) && isset($this->request->post['map_filter_color_option']))
        {
            $data['map_filter_color_option'] = $this->request->post['map_filter_color_option'];
        }
        elseif (!empty($module_info))
        {
            $data['map_filter_color_option'] = $module_info['map_filter_color_option'];
        }
        else
        {
            $data['map_filter_color_option'] = '';
        }
        
        if ( !empty($this->request->post['module_productcolorbasedimages_main_img_config']) && isset($this->request->post['module_productcolorbasedimages_main_img_config'])) {

            $data['module_productcolorbasedimages_main_img_config'] = $this->request->post['module_productcolorbasedimages_main_img_config'];
        }
        else {

            $data['module_productcolorbasedimages_main_img_config'] = @$this->config->get('module_productcolorbasedimages_main_img_config');
        }        

        if (isset($this->request->post['module_productcolorbasedimages_status'])) {
            $data['db_status'] = $this->request->post['module_productcolorbasedimages_status'];
        } else{
            $data['db_status'] = @$this->config->get('module_productcolorbasedimages_status');
        }  
        
        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $result=$this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'THUMB_IMAGE_QUERY' AND hc_module_code='pcbi'");
        if($result->num_rows>0){
            $data['thumb_image_query']=$result->row['hc_value'];
        } else {
            $data['thumb_image_query']='';
        }
        
        $result=$this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'ICON_IMAGE_QUERY' AND hc_module_code='pcbi'");
        if($result->num_rows>0){
            $data['icon_image_query']=$result->row['hc_value'];
        } else {
            $data['icon_image_query']='';
        }
        

        $product_id = $this->db->query( "SELECT product_id FROM `" . DB_PREFIX . "product_image` GROUP BY product_id HAVING COUNT(product_id) > 3 LIMIT 1");
        if(!$product_id->num_rows){

            $product_id = $this->db->query( "SELECT product_id FROM `" . DB_PREFIX . "product_image` LIMIT 1");
        }

        if(!$product_id->num_rows){

            $data['product_id']=0;
        } else {
            $data['product_id']=$product_id->row['product_id'];
        }
        $LOOPSKEY=false;
        for($i=1; $i<=3; $i++)
        {
            if(isset($this->request->post["map_filter_color_option_$i"]))
            {
                $LOOPSKEY=$LOOPSKEY+isset($this->request->post["map_filter_color_option_$i"]);                
            } else {
                $LOOPSKEY=$LOOPSKEY+(TRUE*isset($this->request->post["map_filter_color_option_$i"]));
            }
        }
        $data['LOOPSKEY']=$LOOPSKEY;        
        if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
            $data['base_url'] = HTTPS_CATALOG;
        } else {
            $data['base_url'] = HTTP_CATALOG;
        }       

        $this->response->setOutput($this->load->view('extension/module/productcolorbasedimages', $data));
    }
    
    public function sale_order_info_override($data)
    {      
    	oc_hlp_doMappingAndMergeCartItem($this, $data[0], "admin_order_info", $data[0]["order_id"]);
    	
    	$this->response->setOutput($this->load->view('extension/module/productcolorbasedimages_order_info', $data[0]));
    }
    protected function validate() 
    {
     
        if (!$this->user->hasPermission('modify', 'extension/module/productcolorbasedimages')) 
        {
            $this->error['warning'] = $this->language->get('error_permission');
        }             
        return !$this->error;
    }
    
}