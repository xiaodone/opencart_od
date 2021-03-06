<?php
//use Symfony\Component\Validator\Constraints\Null;

//admin/model/pcbi/pcbi.php

class ModelExtensionPcbi extends Model {
    
    public function deleteHsquare_configTable() {
        $this->db->query("DELETE FROM " . DB_PREFIX . "hsquare_config");
    }
    
    public function getoption() {
        $data['option'] = array();
        $sql = "SELECT * FROM " . DB_PREFIX . "option_description where language_id=5";
        $option=$this->db->query($sql);
        
        return $option;
        
    }
    public function getFilter_value() {
        $data['option'] = array();
        $sql = "SELECT * FROM " . DB_PREFIX . "filter_description";
        $filter_value=$this->db->query($sql);
        //echo"<pre>";print_r($filter_value);echo"<pre>";die;
        return $filter_value;
        
    }
    public function getProduct_option_value_id() {
        $data['option'] = array();
        $product_option_value=$this->db->query("SELECT * FROM " . DB_PREFIX . "option_value_description where language_id=5 and option_id=5");
        
        return $product_option_value;
        
    }
    public function getoptionFromhsquare_config() {
        $data['option'] = array();
        $sql = "SELECT * FROM " . DB_PREFIX . "hsquare_config";
        $option=$this->db->query($sql);
        
        return $option;
        
    }
    public function getMapColor() {
        if(!empty($this->request->post["map_filter_color_option_$i"])){
            for($i=1; $i<=10; $i++)
            {
                $map_color= $this->db->query("SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_FILTER_COLOR_OPTION_$i' AND hc_module_code='pcbi' AND hc_value = '" .$this->request->post["map_filter_color_option_$i"]. "'");
                
            }
        }        
    }
    
    public function getMapFilter() {
        if(!empty($this->request->post["map_filter_option_$i"])){
            for($i=1; $i<=10; $i++)
            {
                $map_filter= $this->db->query("SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_FILTER_OPTION_$i' AND hc_module_code='pcbi' AND hc_value = '" .$this->request->post["map_filter_option_$i"]. "'");
                
            }
        }
        
    }
    
    public function alterTableproduct_image() {
        
        $hasModelChoiceField = FALSE;
        $result = $this->db->query( "DESCRIBE `".DB_PREFIX."product_image`;" );
        
        foreach ($result->rows as $row) {
            if ($row['Field'] == 'pi_pcbi_color') {
                $hasModelChoiceField = TRUE;
                break;
            }
        }
        if (!$hasModelChoiceField) {
            $sql = "ALTER TABLE `".DB_PREFIX."product_image` ADD pi_pcbi_color varchar(10)";
            $this->db->query( $sql );
        } else {
            $sql = "ALTER TABLE `".DB_PREFIX."product_image` MODIFY pi_pcbi_color varchar(255)";
            $this->db->query( $sql );
        }
        
    }
    
    public function CreateHsquare_configTable() {
        $query = $this->db->query("CREATE TABLE IF NOT EXISTS
                                                             `" . DB_PREFIX . "hsquare_config` (
                                                            `hsquare_config_id` int(11) NOT NULL AUTO_INCREMENT,
                                                            `hc_module_id` varchar(255) NOT NULL,
                                                            `hc_module_code` varchar(255) NOT NULL,
                                                            `hc_key` varchar(30) NOT NULL,
                                                            `hc_value` varchar(2048) NOT NULL,
                                                            `hc_status` tinyint(4) NOT NULL,
                                                            `hc_sort_order` int(11) NOT NULL,
                                                            `hc_date_added` date NOT NULL,
                                                            `hc_date_modified` datetime NOT NULL,
                                                            PRIMARY KEY (`hsquare_config_id`))
                                                             ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0");
    }
    
    public function insertQuery()
    {
        
        $i=1;
        
        while (TRUE) {           

            if(empty($this->request->post["map_filter_color_option_{$i}"]) AND empty($this->request->post["map_filter_option_{$i}"])) break;

            $result_filter_id = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_FILTER_COLOR_OPTION_$i' AND hc_module_code='pcbi' ");           

            $result_filter_option = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_FILTER_OPTION_$i' AND hc_module_code='pcbi' ");            

            if( !$result_filter_id->num_rows ) {
                
                $this->db->query("INSERT INTO `" . DB_PREFIX . "hsquare_config`
                                                    SET
                                                        hc_module_id ='' ,
                                                        hc_module_code = 'pcbi',
                                                        hc_key = 'MP_FILTER_COLOR_OPTION_$i',
                                                        hc_value = '" .$this->request->post["map_filter_color_option_$i"]. "',
                                                        hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?$this->request->post['module_productcolorbasedimages_status']:false) . "',
                                                        hc_sort_order = 0,
                                                        hc_date_added = NOW()");
            } else {
                
                $this->db->query("UPDATE `" . DB_PREFIX . "hsquare_config`
                                            SET
                                                hc_module_id ='' ,
                                                hc_module_code = 'pcbi',
                                                hc_key = 'MP_FILTER_COLOR_OPTION_$i',
                                                hc_value = '" .$this->request->post["map_filter_color_option_$i"]. "',
                                                hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?$this->request->post['module_productcolorbasedimages_status']:false) . "',
                                                hc_sort_order = 0,
                                                hc_date_modified = NOW() where hc_key = 'MP_FILTER_COLOR_OPTION_$i' AND hc_module_code='pcbi'");
            }            

            if( !$result_filter_option->num_rows ){
                
                $this->db->query("INSERT INTO `" . DB_PREFIX . "hsquare_config`
                                                    SET
                                                        hc_module_id ='' ,
                                                        hc_module_code = 'pcbi',
                                                        hc_key = 'MP_FILTER_OPTION_$i',
                                                        hc_value = '" .$this->request->post["map_filter_option_$i"]. "',
                                                        hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?$this->request->post['module_productcolorbasedimages_status']:false) . "',
                                                        hc_sort_order = 0,
                                                        hc_date_added = NOW()");
            } else {

                $this->db->query("UPDATE `" . DB_PREFIX . "hsquare_config`
                                            SET
                                                hc_module_id ='' ,
                                                hc_module_code = 'pcbi',
                                                hc_key = 'MP_FILTER_OPTION_$i',
                                                hc_value = '" .$this->request->post["map_filter_option_$i"]. "',
                                                hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?$this->request->post['module_productcolorbasedimages_status']:false) . "',
                                                hc_sort_order = 0,
                                                hc_date_modified = NOW() where hc_key = 'MP_FILTER_OPTION_$i' AND hc_module_code='pcbi'");
            }
            
            $i++;
        }

        $i=1;

        while (TRUE) {  
            
            if(empty($this->request->post["map_option_value_ids_color_option_${i}"]) AND empty($this->request->post["map_option_value_ids_option_${i}"])) break;

            $result_color_id = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_PROD_OPT_VAL_ID_COLOR_${i}' AND hc_module_code='pcbi' ");
            $result_color_option = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'MP_PROD_OPT_VAL_ID_${i}' AND hc_module_code='pcbi' ");

            if( !$result_color_id->num_rows ) {
                
                $this->db->query("INSERT INTO `" . DB_PREFIX . "hsquare_config`
                                                    SET
                                                        hc_module_id ='' ,
                                                        hc_module_code = 'pcbi',
                                                        hc_key = 'MP_PROD_OPT_VAL_ID_COLOR_${i}',
                                                        hc_value = '" .$this->request->post["map_option_value_ids_color_option_${i}"]. "',
                                                        hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?$this->request->post['module_productcolorbasedimages_status']:false) . "',
                                                        hc_sort_order = 0,
                                                        hc_date_added = NOW()");
            } else {

                $this->db->query("UPDATE `" . DB_PREFIX . "hsquare_config`
                                            SET
                                                hc_module_id ='' ,
                                                hc_module_code = 'pcbi',
                                                hc_key = 'MP_PROD_OPT_VAL_ID_COLOR_${i}',
                                                hc_value = '" .$this->request->post["map_option_value_ids_color_option_${i}"]. "',
                                                hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?$this->request->post['module_productcolorbasedimages_status']:false) . "',
                                                hc_sort_order = 0,
                                                hc_date_modified = NOW() where hc_key = 'MP_PROD_OPT_VAL_ID_COLOR_${i}' AND hc_module_code='pcbi'");
            }
            
            if( !$result_color_option->num_rows ) {

                $this->db->query("INSERT INTO `" . DB_PREFIX . "hsquare_config`
                                                    SET
                                                        hc_module_id ='' ,
                                                        hc_module_code = 'pcbi',
                                                        hc_key = 'MP_PROD_OPT_VAL_ID_${i}',
                                                        hc_value = '" .$this->request->post["map_option_value_ids_option_${i}"]. "',
                                                        hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?$this->request->post['module_productcolorbasedimages_status']:false) . "',
                                                        hc_sort_order = 0,
                                                        hc_date_added = NOW()");
            } else {

                $this->db->query("UPDATE `" . DB_PREFIX . "hsquare_config`
                                            SET
                                                hc_module_id ='' ,
                                                hc_module_code = 'pcbi',
                                                hc_key = 'MP_PROD_OPT_VAL_ID_${i}',
                                                hc_value = '" .$this->request->post["map_option_value_ids_option_${i}"]. "',
                                                hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?$this->request->post['module_productcolorbasedimages_status']:false) . "',
                                                hc_sort_order = 0,
                                                hc_date_modified = NOW() where hc_key = 'MP_PROD_OPT_VAL_ID_${i}' AND hc_module_code='pcbi'");
            }
            
            $i++;
        }
    }
    
    public function insertHsquare_configTable() {
        
        if(!empty($this->request->post["thumb_image_query"])) {
            $q=$this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'THUMB_IMAGE_QUERY' AND hc_module_code='pcbi'");
            if($q->num_rows===0) {

                $this->db->query("INSERT INTO `" . DB_PREFIX . "hsquare_config`
                                         SET
                                             hc_module_id ='' ,
                                             hc_module_code = 'pcbi',
                                             hc_key = 'THUMB_IMAGE_QUERY',
                                             hc_value = '" .$this->request->post["thumb_image_query"]. "',
                                             hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?1:0) . "',
                                             hc_sort_order = 0,
                                             hc_date_modified = NOW()");
            } else {

                $this->db->query("UPDATE `" . DB_PREFIX . "hsquare_config`
                                         SET
                                             hc_module_id ='' ,
                                             hc_module_code = 'pcbi',
                                             hc_key = 'THUMB_IMAGE_QUERY',
                                             hc_value = '" .$this->request->post["thumb_image_query"]. "',
                                             hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?1:0) . "',
                                             hc_sort_order = 0,
                                             hc_date_modified = NOW() where hc_key = 'THUMB_IMAGE_QUERY' AND hc_module_code='pcbi' ");
            }
        }

        if(!empty($this->request->post["icon_image_query"])) {
            

            $q=$this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'ICON_IMAGE_QUERY' AND hc_module_code='pcbi'");
            if($q->num_rows===0){

                $this->db->query("INSERT INTO `" . DB_PREFIX . "hsquare_config`
                                         SET
                                             hc_module_id ='' ,
                                             hc_module_code = 'pcbi',
                                             hc_key = 'ICON_IMAGE_QUERY',
                                             hc_value = '" .$this->request->post["icon_image_query"]. "',
                                             hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?1:0) . "',
                                             hc_sort_order = 0,
                                             hc_date_modified = NOW()");

            } else {

                $this->db->query("UPDATE `" . DB_PREFIX . "hsquare_config`
                                         SET
                                             hc_module_id ='' ,
                                             hc_module_code = 'pcbi',
                                             hc_key = 'ICON_IMAGE_QUERY',
                                             hc_value = '" .$this->request->post["icon_image_query"]. "',
                                             hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?1:0) . "',
                                             hc_sort_order = 0,
                                             hc_date_modified = NOW() where hc_key = 'ICON_IMAGE_QUERY' AND hc_module_code='pcbi' ");
            }
        }        
        
        if( !empty($this->request->post["add_color"]) ) {
            
            $result = $this->db->query( "SELECT * FROM `" . DB_PREFIX . "hsquare_config` where hc_key = 'OPTION_COLOR' AND hc_module_code='pcbi'");

            $numrows = $result->num_rows;
            
            if ($numrows==0)
            {            
                $this->db->query("INSERT INTO `" . DB_PREFIX . "hsquare_config`
                                             SET
                                                 hc_module_id ='' ,
                                                 hc_module_code = 'pcbi',
                                                 hc_key = 'OPTION_COLOR',
                                                 hc_value = '" .$this->request->post["add_color"]. "',
                                                 hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?1:0) . "',
                                                 hc_sort_order = 0,
                                                 hc_date_modified = NOW()");            
            } else {         

                $this->db->query("UPDATE `" . DB_PREFIX . "hsquare_config`
                                             SET
                                                 hc_module_id ='' ,
                                                 hc_module_code = 'pcbi',
                                                 hc_key = 'OPTION_COLOR',
                                                 hc_value = '" .$this->request->post["add_color"]. "',
                                                 hc_status = '" . (!empty($this->request->post['module_productcolorbasedimages_status'])?1:0) . "',
                                                 hc_sort_order = 0,
                                                 hc_date_modified = NOW()where hc_key = 'OPTION_COLOR' AND hc_module_code='pcbi' ");
            }
            $this->insertQuery();
        }
    }
    
}
