<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-module" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">

        <div id="buy-pro-modal" class="modal" tabindex="-1" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Product Color Option Images PRO</h4>
              </div>
              <div class="modal-body">
                  <p>Please consider buying <a href="https://www.opencart.com/index.php?route=marketplace/extension/info&extension_id=37198" target="new">Product Color Option Images PRO</a> to add more images.</p>
              </div>
              </div>
            </div>
          </div>
        </div>
		
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-module" class="form-horizontal">        
            <div class="col-sm-10">
              <input type="hidden" name="name" value="Product Color Option Images" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" readonly/><?php echo $error_name; ?>
              <?php if ($error_name) { ?>
              <div class="text-danger"><?php echo $error_name; ?></div>
              <?php } ?>
            </div>
         
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-color"><?php echo $entry_color; ?></label>
            <div class="col-sm-10">
              <select name="add_color" id="add_color" class="form-control">
               <option value="">
            ---Select---
            </option>
              <?php foreach ($option as $optn) { ?>
              <option value="<?php echo $optn['option_id'];?>" <?php echo $optn['sel']; //if ((isset($_POST["add_color"])) && $optn['option_id'] == $_POST["add_color"] ) echo 'selected' ; ?>>
            <?php echo $optn['option']; ?>
            </option>
          <?php } ?>
              </select>
              
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-filter"><?php echo $entry_filter; ?></label>
            <div class="col-sm-10">
            </div>
          </div>
          <?php for ($i=1; $i<=3; $i++) { ?>
           
          <div class="form-group">
                <label class="col-sm-2 control-label" for="input-map_filter_color_option"><?php echo $entry_map_color; ?></label>
                <div class="col-sm-4">
                  <select name='<?php echo "map_filter_color_option_".$i; ?>' id="input-map_filter_color_option" class="form-control">
                   <option value="" <?php  if(""==$result_color_f[$i])
	                  echo 'selected="selected"'; ?>> ---Select---</option>
                   <option value="black"<?php  if("black"==$result_color_f[$i])
	                  echo 'selected="selected"'; ?>>Black</option>
                   <option value="blue" <?php  if("blue"==$result_color_f[$i])
	                  echo 'selected="selected"'; ?>>Blue</option>
                   <option value="gray" <?php  if("gray"==$result_color_f[$i])
	                  echo 'selected="selected"'; ?>>Gray</option>
                   <option value="green" <?php  if("green"==$result_color_f[$i])
	                  echo 'selected="selected"'; ?>>Green</option>
                   <option value="maroon" <?php  if("maroon"==$result_color_f[$i])
	                  echo 'selected="selected"'; ?>>Maroon</option>
                   <option value="navy" <?php  if("navy"==$result_color_f[$i])
	                  echo 'selected="selected"'; ?>>Navy</option>
                   <option value="purple" <?php  if("purple"==$result_color_f[$i])
	                  echo 'selected="selected"'; ?>>Purple</option>
                   <option value="red" <?php  if("red"==$result_color_f[$i])
	                  echo 'selected="selected"'; ?>>Red</option>
                   <option value="white" <?php  if("white"==$result_color_f[$i])
	                  echo 'selected="selected"'; ?>>White</option>
                   <option value="yellow" <?php  if("yellow"==$result_color_f[$i])
	                  echo 'selected="selected"'; ?>>Yellow</option>
                  </select>
                </div>
            
                <label class="col-sm-2 control-label" for="input-map_filter_option"><?php echo $entry_map_filter; ?></label>
                <div class="col-sm-4">
                  <select name='<?php echo "map_filter_option_".$i; ?>' id="input-map_filter_option" class="form-control">
                   <option value="">
                ---Select---
                </option>
                 <?php foreach ($filter as $optn) { ?>
                 
                 <option value="<?php echo $optn['filter_id'];?>" <?php
                 if(isset($result_filter_opt_val_id[$i]))
                 {
	                  if($optn['filter_id']==$result_filter_opt_val_id[$i])
	                  echo $optn['sel'];
	             }
	               ?>>
                  
                <?php echo $optn['filter'];?>
                </option>
               
             <?php } ?>
                  </select>
                  
                </div>
                
                
            
          </div>
          <?php } ?>
          
          <div class="form-group">                                  
            <div class="text-right col-sm-11"><button type="button" id="add_fil_to_map" data-toggle="modal" data-target="#buy-pro-modal" title="{{ button_option_value_add }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></div>
            <div class="text-right col-sm-1"></div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-option_value_ids_to_color_mapping"><?php echo $entry_option_value_ids_to_color_mapping; ?></label>
            <div class="col-sm-10">
            </div>
          </div>
           <?php for ($i=1; $i<=3; $i++) { ?>
          <div class="form-group">
                <label class="col-sm-2 control-label" for="input-map_option_value_ids_color_option"><?php echo $entry_map_color; ?></label>
                <div class="col-sm-3">
                  <select name='<?php echo "map_option_value_ids_color_option_".$i; ?>' id="input-map_option_value_ids_color_option" class="form-control">
                   <option value="" <?php  if(""==$result_color[$i])
	                  echo 'selected="selected"'; ?>> ---Select---</option>
                   <option value="black" <?php  if("black"==$result_color[$i])
	                  echo 'selected="selected"'; ?>>Black</option>
                   <option value="blue" <?php  if("blue"==$result_color[$i])
	                  echo 'selected="selected"'; ?>>Blue</option>
                   <option value="gray" <?php  if("gray"==$result_color[$i])
	                  echo 'selected="selected"'; ?>>Gray</option>
                   <option value="green" <?php  if("green"==$result_color[$i])
	                  echo 'selected="selected"'; ?>>Green</option>
                   <option value="maroon" <?php  if("maroon"==$result_color[$i])
	                  echo 'selected="selected"'; ?>>Maroon</option>
                   <option value="navy" <?php  if("navy"==$result_color[$i])
	                  echo 'selected="selected"'; ?>>Navy</option>
                   <option value="purple" <?php  if("purple"==$result_color[$i])
	                  echo 'selected="selected"'; ?>>Purple</option>
                   <option value="red" <?php  if("red"==$result_color[$i])
	                  echo 'selected="selected"'; ?>>Red</option>
                   <option value="white" <?php  if("white"==$result_color[$i])
	                  echo 'selected="selected"'; ?>>White</option>
                   <option value="yellow" <?php  if("yellow"==$result_color[$i])
	                  echo 'selected="selected"'; ?>>Yellow</option>
                  </select>
                </div>
            
                <label class="col-sm-3 control-label" for="input-map_option_value_ids_option"><?php echo $entry_map_option_value_ids; ?></label>
                <div class="col-sm-4">
                  <select name='<?php echo"map_option_value_ids_option_".$i; ?>' id="input-option_value_ids_option" class="form-control">
                   <option value="">
                ---Select---
                </option>
                <?php foreach ($product_option_value as $optn_value_id) { ?>
                  
                  <option value="<?php echo $optn_value_id['option_value_id'];?>" <?php
                 
	                  if($optn_value_id['option_value_id']==$result_product_opt_val_id[$i])
	                  echo $optn_value_id['sel'];
	               ?>>
                <?php echo $optn_value_id['name'];?>
                </option>
               <?php } ?>
                  </select>
                </div>
                
                
            
          </div>
          <?php } ?>

          <div class="form-group">                        
            <div class="text-right col-sm-11"><button type="button" id="add_col_to_map" data-toggle="modal" data-target="#buy-pro-modal" title="{{ button_option_value_add }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></div>
            <div class="text-right col-sm-1"></div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-sort_order"><?php echo $entry_sort_order; ?></label>
            <div class="col-sm-10">
              <input type="text" name="sort_order" value="<?php echo $entry_sort_order; ?>" placeholder="<?php echo $entry_sort_order; ?>" id="input-module_code" class="form-control" />
              
            </div>
          </div>
          
        <div class="form-group">
            <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-10">
              <select name="module_productcolorbasedimages_status" id="input-status" class="form-control">
               
                <option value="1" <?php if(isset($db_status) && ("1"==$db_status)){
	                  echo 'selected="selected"'; } ?>><?php echo $text_enabled; ?></option>
                <option value="0" <?php if(isset($db_status) && ("0"==$db_status)){
	                  echo 'selected="selected"'; } ?>><?php echo $text_disabled; ?></option>
              
                
              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $footer; ?>
