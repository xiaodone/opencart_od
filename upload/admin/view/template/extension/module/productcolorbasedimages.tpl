<style>
  .form-group{
    margin: auto auto;
    padding: 0 1em 0 1em;
  }
  .red-border-section{                
    outline: 2px solid red !important;                
  }

  .bubble_container {
    position: relative;
    text-align: center;    
    overflow: hidden;          
    padding-bottom: 1em;
    padding-top: 1em;
  }

  .bubble_btn{
    width: inherit;
    height: 3em;  
  }

  .bubble_container > .bubble_motion {
    -moz-transform: translateY(-50%) translateX(-50%);
    -ms-transform: translateY(-50%) translateX(-50%);
    -webkit-transform: translateY(-50%) translateX(-50%);
    transform: translateY(-50%) translateX(-50%);
    position: absolute;
    top: 50%;
    left: 50%;
    z-index: -1;
    display: unset !important;
  }
  .bubble_container > .bubble_motion:before {
    position: relative;
    content: '';
    display: block;
    margin-top: 100%;
  }
  .bubble_container > .bubble_motion:after {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    border-radius: 50%;
  }

  .bubble_container > .bubble_motion {
    -moz-animation: anim-out 0.75s infinite;
    -webkit-animation: anim-out 0.75s infinite;
    animation: anim-out 0.75s infinite;
  }
  .bubble_container > .bubble_motion:after {
    -moz-animation: anim-out-pseudo 0.75s infinite;
    -webkit-animation: anim-out-pseudo 0.75s infinite;
    animation: anim-out-pseudo 0.75s infinite;
  }

  @-webkit-keyframes anim-in {
    0% {
      width: 0%;
    }
    100% {
      width: 100%;
    }
  }
  @-moz-keyframes anim-in {
    0% {
      width: 0%;
    }
    100% {
      width: 100%;
    }
  }
  @-ms-keyframes anim-in {
    0% {
      width: 0%;
    }
    100% {
      width: 100%;
    }
  }
  @keyframes anim-in {
    0% {
      width: 0%;
    }
    100% {
      width: 100%;
    }
  }
  @-webkit-keyframes anim-in-pseudo {
    0% {
      background: rgba(0, 0, 0, 0.25);
    }
    100% {
      background: transparent;
    }
  }
  @-moz-keyframes anim-in-pseudo {
    0% {
      background: rgba(0, 0, 0, 0.25);
    }
    100% {
      background: transparent;
    }
  }
  @-ms-keyframes anim-in-pseudo {
    0% {
      background: rgba(0, 0, 0, 0.25);
    }
    100% {
      background: transparent;
    }
  }
  @keyframes anim-in-pseudo {
    0% {
      background: rgba(0, 0, 0, 0.25);
    }
    100% {
      background: transparent;
    }
  }
  @-webkit-keyframes anim-out {
    0% {
      width: 0%;
    }
    100% {
      width: 100%;
    }
  }
  @-moz-keyframes anim-out {
    0% {
      width: 0%;
    }
    100% {
      width: 100%;
    }
  }
  @-ms-keyframes anim-out {
    0% {
      width: 0%;
    }
    100% {
      width: 100%;
    }
  }
  @keyframes anim-out {
    0% {
      width: 0%;
    }
    100% {
      width: 100%;
    }
  }
  @-webkit-keyframes anim-out-pseudo {
    0% {
      background: rgba(0, 0, 0, 0.25);
    }
    100% {
      background: transparent;
    }
  }
  @-moz-keyframes anim-out-pseudo {
    0% {
      background: rgba(0, 0, 0, 0.25);
    }
    100% {
      background: transparent;
    }
  }
  @-ms-keyframes anim-out-pseudo {
    0% {
      background: rgba(0, 0, 0, 0.25);
    }
    100% {
      background: transparent;
    }
  }
  @keyframes anim-out-pseudo {
    0% {
      background: rgba(0, 0, 0, 0.25);
    }
    100% {
      background: transparent;
    }
  }

</style>

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
              <input type="hidden" name="name" value="Product Color Option images" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" readonly/><?php echo $error_name; ?>
              <?php if ($error_name) { ?>
              <div class="text-danger"><?php echo $error_name; ?></div>
              <?php } ?>
            </div>
        <div class="pcoi_form_widget">
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-color"><?php echo $entry_color; ?></label>
            <div class="col-sm-10">
              <select name="add_color" id="add_color" class="form-control">
               <option value="">
            ---Select---
            </option>
              <?php foreach ($option as $optn) { ?>
              <option value="<?php echo $optn['option_id']; ?>" <?php echo $optn['sel']; //if ((isset($_POST["add_color"])) && $optn['option_id'] == $_POST["add_color"] ) echo 'selected' ; ?>>
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
          <?php for ($i=1; $i<=(strlen('true')-1); $i++) { ?>
           
          <div class="form-group">
                <label class="col-sm-2 control-label" for="input-map_filter_color_option"><?php echo $entry_map_color; ?></label>
                <div class="col-sm-4">
                  <select name='<?php echo "map_filter_color_option_".$i; ?>' id="input-map_filter_color_option" class="form-control">
                   <option value="" <?php  if(""==$result_color_f[$i]) echo 'selected="selected"'; ?>> ---Select---</option>
                    <option value="black" <?php  if("black"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Black</option>
                    <option value="blue" <?php  if("blue"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Blue</option>
                    <option value="grey" <?php  if("grey"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Grey</option>
                    <option value="green" <?php  if("green"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Green</option>
                    <option value="maroon" <?php  if("maroon"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Maroon</option>
                    <option value="navy" <?php  if("navy"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Navy</option>
                    <option value="purple" <?php  if("purple"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Purple</option>
                    <option value="red" <?php  if("red"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Red</option>
                    <option value="white" <?php  if("white"==$result_color_f[$i]) echo 'selected="selected"'; ?>>White</option>
                    <option value="yellow" <?php  if("yellow"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Yellow</option>
                    <option value="gold" <?php  if("gold"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Gold</option>
                    <option value="khaki" <?php  if("khaki"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Khaki</option>  
                    <option value="pink" <?php  if("pink"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Pink</option> 
                    <option value="tampa" <?php  if("tampa"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Tampa</option>    
                    <option value="bordeaux" <?php  if("bordeaux"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Bordeaux</option> 
                    <option value="beige" <?php  if("beige"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Beige</option> 
                    <option value="silver" <?php  if("silver"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Silver</option>
                    <option value="cypress" <?php  if("cypress"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Cypress</option> 
                    <option value="brown" <?php  if("brown"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Brown</option> 
                    <option value="leopard" <?php  if("leopard"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Leopard</option> 
                    <option value="mustard" <?php  if("mustard"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Mustard</option>
                    <option value="purple" <?php  if("purple"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Purple</option> 
                    <option value="pourou" <?php  if("pourou"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Pourou</option> 
                    <option value="petrol" <?php  if("petrol"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Petrol</option>
                    <option value="pine"  <?php  if("pine"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Pine</option>
                    <option value="cigar"  <?php  if("cigar"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Cigar</option>
                    <option value="bordo"  <?php  if("bordo"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Bordo</option>
                    <option value="olive"  <?php  if("olive"==$result_color_f[$i]) echo 'selected="selected"'; ?>>Olive</option>
                  </select>
                </div>
            
                <label class="col-sm-2 control-label" for="input-map_filter_option"><?php echo $entry_map_filter; ?></label>
                <div class="col-sm-4">
                  <select name='<?php echo "map_filter_option_".$i; ?>' id="input-map_filter_option" class="form-control">
                   <option value="">
                ---Select---
                </option>
                 <?php foreach ($filter as $optn) { ?>
                 
                 <option value="<?php echo $optn['filter_id']; ?>" <?php
                 if(isset($result_filter_opt_val_id[$i]))
                 {
	                  if($optn['filter_id']==$result_filter_opt_val_id[$i])
	                  echo $optn['sel'];
	             }
	               ?>>
                  
                <?php echo $optn['filter']; ?>
                </option>
               
             <?php } ?>
                  </select>
                  
                </div>
                
                
            
          </div>
          <?php } ?>
          
          <div class="form-group">                                  
            <div class="text-right col-sm-11"><button type="button" id="add_fil_to_map" data-toggle="modal" data-target="#buy-pro-modal" title="<?php echo $button_option_value_add; ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></div>
            <div class="text-right col-sm-1"></div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-option_value_ids_to_color_mapping"><?php echo $entry_option_value_ids_to_color_mapping; ?></label>
            <div class="col-sm-10">
            </div>
          </div>
           <?php for ($i=1; $i<=(strlen('true')-1); $i++) { ?>
          <div class="form-group">
                <label class="col-sm-2 control-label" for="input-map_option_value_ids_color_option"><?php echo $entry_map_color; ?></label>
                <div class="col-sm-3">
                  <select name='<?php echo "map_option_value_ids_color_option_".$i; ?>' id="input-map_option_value_ids_color_option" class="form-control">
                   <option value="" <?php  if(""==$result_color[$i]) echo 'selected="selected"'; ?>> ---Select---</option>
                    <option value="black" <?php  if("black"==$result_color[$i]) echo 'selected="selected"'; ?>>Black</option>
                    <option value="blue" <?php  if("blue"==$result_color[$i]) echo 'selected="selected"'; ?>>Blue</option>
                    <option value="grey" <?php  if("grey"==$result_color[$i]) echo 'selected="selected"'; ?>>Grey</option>
                    <option value="green" <?php  if("green"==$result_color[$i]) echo 'selected="selected"'; ?>>Green</option>
                    <option value="maroon" <?php  if("maroon"==$result_color[$i]) echo 'selected="selected"'; ?>>Maroon</option>
                    <option value="navy" <?php  if("navy"==$result_color[$i]) echo 'selected="selected"'; ?>>Navy</option>
                    <option value="purple" <?php  if("purple"==$result_color[$i]) echo 'selected="selected"'; ?>>Purple</option>
                    <option value="red" <?php  if("red"==$result_color[$i]) echo 'selected="selected"'; ?>>Red</option>
                    <option value="white" <?php  if("white"==$result_color[$i]) echo 'selected="selected"'; ?>>White</option>
                    <option value="yellow" <?php  if("yellow"==$result_color[$i]) echo 'selected="selected"'; ?>>Yellow</option>
                    <option value="gold" <?php  if("gold"==$result_color[$i]) echo 'selected="selected"'; ?>>Gold</option>
                    <option value="khaki" <?php  if("khaki"==$result_color[$i]) echo 'selected="selected"'; ?>>Khaki</option>  
                    <option value="pink" <?php  if("pink"==$result_color[$i]) echo 'selected="selected"'; ?>>Pink</option> 
                    <option value="tampa" <?php  if("tampa"==$result_color[$i]) echo 'selected="selected"'; ?>>Tampa</option>    
                    <option value="bordeaux" <?php  if("bordeaux"==$result_color[$i]) echo 'selected="selected"'; ?>>Bordeaux</option> 
                    <option value="beige" <?php  if("beige"==$result_color[$i]) echo 'selected="selected"'; ?>>Beige</option> 
                    <option value="silver" <?php  if("silver"==$result_color[$i]) echo 'selected="selected"'; ?>>Silver</option>
                    <option value="cypress" <?php  if("cypress"==$result_color[$i]) echo 'selected="selected"'; ?>>Cypress</option> 
                    <option value="brown" <?php  if("brown"==$result_color[$i]) echo 'selected="selected"'; ?>>Brown</option> 
                    <option value="leopard" <?php  if("leopard"==$result_color[$i]) echo 'selected="selected"'; ?>>Leopard</option> 
                    <option value="mustard" <?php  if("mustard"==$result_color[$i]) echo 'selected="selected"'; ?>>Mustard</option>
                    <option value="purple" <?php  if("purple"==$result_color[$i]) echo 'selected="selected"'; ?>>Purple</option> 
                    <option value="pourou" <?php  if("pourou"==$result_color[$i]) echo 'selected="selected"'; ?>>Pourou</option> 
                    <option value="petrol" <?php  if("petrol"==$result_color[$i]) echo 'selected="selected"'; ?>>Petrol</option>
                    <option value="pine"  <?php  if("pine"==$result_color[$i]) echo 'selected="selected"'; ?>>Pine</option>
                    <option value="cigar"  <?php  if("cigar"==$result_color[$i]) echo 'selected="selected"'; ?>>Cigar</option>
                    <option value="bordo"  <?php  if("bordo"==$result_color[$i]) echo 'selected="selected"'; ?>>Bordo</option>
                    <option value="olive"  <?php  if("olive"==$result_color[$i]) echo 'selected="selected"'; ?>>Olive</option>
                  </select>
                </div>
            
                <label class="col-sm-3 control-label" for="input-map_option_value_ids_option"><?php echo $entry_map_option_value_ids; ?></label>
                <div class="col-sm-4">
                  <select name='<?php echo "map_option_value_ids_option_".$i; ?>' id="input-option_value_ids_option" class="form-control">
                   <option value="">
                ---Select---
                </option>
                <?php foreach ($product_option_value as $optn_value_id) { ?>
                  
                  <option value="<?php echo $optn_value_id['option_value_id']; ?>" <?php
                 
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
            <div class="text-right col-sm-11"><button type="button" id="add_col_to_map" data-toggle="modal" data-target="#buy-pro-modal" title="<?php echo $button_option_value_add; ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></div>
            <div class="text-right col-sm-1"></div>
          </div>          

  <div class="form-group">
    <label class="col-sm-2 control-label" for="input-main-img-config"><?php echo $entry_main_img_config;?></label>
    <div class="col-sm-10">             
      <select name="module_productcolorbasedimages_main_img_config" id="input-main-img-config" class="form-control">
          <option value="1" <?php if (1 == $module_productcolorbasedimages_main_img_config){ echo 'selected="selected"'; } ?>><?php echo $text_main_img_no_change; ?></option>
          
          <option value="2" <?php if (2 == $module_productcolorbasedimages_main_img_config){ echo 'selected="selected"'} ?>><?php echo $text_main_img_do_change; ?></option>         
          
      </select>
    </div>
  </div>
  
  <div class="form-group">
    <label class="col-sm-2 control-label" for="input-status"><?php echo $entry_status; ?></label>
    <div class="col-sm-10">             
      <select name="module_productcolorbasedimages_status" id="input-status" class="form-control">                
        <option value="0" <?php if(0== $db_status){ echo 'selected="selected"'; } ?> ><?php echo $text_disabled; ?></option>
        <option value="1" <?php if(1== $db_status){ echo 'selected="selected"'; } ?> ><?php echo $text_enabled; ?></option>                
      </select>
    </div>
  </div>
          <div class="pcoi_selection_widget" style="display:none;">
            <div class="form-group">
              <label class="col-sm-12">                
                Click the select buttons below and hover on the page under it to mark the image widget area (If developer then use jQuery selector for quick setup).
              </label>
            </div>
            <div class="form-group">
              <label class="col-sm-2">Thumbnail Image</label>                              
              <div class="col-sm-8">
                <input type="text" class="form-control" name="thumb_image_query" value="<?php echo $thumb_image_query; ?>">
              </div>
              <div class="col-sm-2 bubble_container">
                <div class='bubble_motion'></div>
                <button type="button" class="btn btn-primary pcoi_selection_btn">Select</button>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2">Icon Image</label>                              
              <div class="col-sm-8">
                <input type="text" class="form-control" name="icon_image_query"  value="<?php echo $icon_image_query; ?>">
              </div>
              <div class="col-sm-2 bubble_container">
                <div class='bubble_motion'></div>
                <button type="button" class="btn btn-primary pcoi_selection_btn">Select</button>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-12 text-right">
                <button type="button" id="pcoi_selection_done" class="btn btn-primary select_container"><span>Close</span></button>
              <div>              
            </div>          
            <br/><br/><br/>
            <iframe id="product_selection_zone" src="<?php echo $base_url; ?>index.php?route=product/product&product_id=<?php echo $product_id; ?>" style="height:100%; width:100%;"></iframe>
          <div>
        </form>
      </div>
    </div>
  <script>
      jQuery(window).on('load',function(){
        $=jQuery;
        $('#pcoi_selection_done').click(function(){
          $('.pcoi_form_widget').css('display','');
          $('.pcoi_selection_widget').css('display','none');
        });

        $('#set_img_locations').click(function(){
          $('.pcoi_form_widget').css('display','none');
          $('.pcoi_selection_widget').css('display','');
        });

        var getUniqueSelector = function (el) {
              if (!el) { return; }
              var selectors=Array();            
              
              $.each($(el).parents().add($(el)),function(index,element){
                  
                  if($(element).length>0){

                      var selector = (element.tagName || '').toLowerCase();
                      if (element.id) {
                        selector += '#' + element.id;
                      }
                      
                      for (var i = 0, len = element.attributes.length; i < len; i++) {
                        if((element.attributes[i].name).trim()=='class'){

                            value=((element.attributes[i].value).replace(/red-border-section/g,'')).trim();  
                            if(value!=''){
                                selector += '[' + element.attributes[i].name + '="' + ((element.attributes[i].value).replace(/red-border-section/g,'')).trim() + '"]';    
                            }
                        }                    
                      }
                      var parent = $(element).parent();
                      var sameTagSiblings = parent.children(selector);                    
                      if (sameTagSiblings.length > 1) { 
                          var allSiblings = parent.children();
                          var index = allSiblings.index(element) + 1;                        
                          selector += ':nth-child(' + index + ')';                        
                      }
                      selectors.push(selector);
                  }
              });
              return selectors.join('>');
            };                     
        
        document.selection_available=false;
        $.each($("iframe#product_selection_zone").contents().find("*"),function(){  $(this).off(); })
        $(document).on('click','.pcoi_selection_btn',function(e){                                
            document.selection_available=true;

            $('.selected_btn').removeClass('selected_btn');
            $(this).addClass('selected_btn');                    
            
            $("iframe").contents().find("*").each(function() {
              $(this).off('click');
            });

            $("iframe").contents().on('mouseenter','*',function(e){
                if(document.selection_available==true){
                  $("iframe").contents().find('.red-border-section').removeClass('red-border-section');
                  $(this).addClass('red-border-section');
                }
            });                   

            $("iframe").contents().on('click','.red-border-section',function(e){            
              $(this).removeClass('red-border-section');
              e.preventDefault();
              e.stopPropagation();
              document.selection_available=false;   
              $(document).find(".selected_btn").parentsUntil('.pcoi_selection_widget').find('input').val(getUniqueSelector(this)); 
              alert('Marking done!\nPlease come back here again if images are not changing properly based on color on your actual frontend product page.');
              return false;
            });
            return false;
        });

        $('iframe').contents().find('body').append('<style>.red-border-section{ outline: 2px solid red !important; }</style>');      

      });
    </script>
</div>
</div>
<?php echo $footer; ?>
