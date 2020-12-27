/* Available Variables */
/*window.pcbi=new Object();                        
window.pcbi.image_map=JSON.parse('{{eo_image_map}}'); 
window.pcbi.main_image=JSON.parse('{{eo_main_image}}');
window.pcbi.first_image='{{eo_first_image}}'; 
window.pcbi.main_img_ops='{{eo_main_img_operation}}';
window.pcbi.algo_type='{{eo_algo_type}}'; 
window.pcbi.thumb_image_query='{{thumb_image_query}}'; 
window.pcbi.icon_image_query='{{icon_image_query}}';*/

if(window.pcbi.main_img_ops==''){
  window.pcbi.main_img_ops='0';
}

window.eo_crc32=function(r){for(var a,o=[],c=0;c<256;c++){a=c;for(var f=0;f<8;f++)a=1&a?3988292384^a>>>1:a>>>1;o[c]=a}for(var n=-1,t=0;t<r.length;t++)n=n>>>8^o[255&(n^r.charCodeAt(t))];return(-1^n)>>>0};

if(window.pcbi.first_image==''){
  if(typeof(window.pcbi.image_map)=='object' && (Object.keys(window.pcbi.image_map)).length>=1){
    window.pcbi.first_image=Object.keys(window.pcbi.image_map)[0];                
  }              
}

$(document).ready(function(){    
  
  if(typeof($.fn.elevateZoom)=='function'){
    window.main_img=$("[data-zoom-image]");
    window.ez =   $(main_img).data('elevateZoom');
    
    /** Changes from here... **/    
    gallary_elements=undefined;
    if($("[data-image]").length){
      gallary_elements=$("[data-image]");
    }

    if( gallary_elements===undefined && $("#"+ez.options.gallery+" a").length){
      gallary_elements=$("#"+ez.options.gallery+" a");
    }

    if( gallary_elements===undefined && $(".image-additional a").length ){
      gallary_elements=$(".image-additional a");
    }

    if( gallary_elements===undefined ){
      gallary_elements=$(".image-additional img");
    }

    $(gallary_elements).off();
    $(gallary_elements).on('click mousemove',function(e){

        e.preventDefault();
        //Set a class on the currently active gallery image
        if(ez.options.galleryActiveClass){
          $(this).offsetParent().parent().find("."+ez.options.galleryActiveClass).removeClass(ez.options.galleryActiveClass);          
          $(this).addClass(ez.options.galleryActiveClass);
        } 
        //call the swap image function
        if($(this).attr("data-zoom-image")){
          ez.zoomImagePre = $(this).data("zoom-image")
        }
        else{
          ez.zoomImagePre = $(this).attr("data-image");
        }      

        ez.swaptheimage($(this).attr("data-image"),ez.zoomImagePre);
        return false;
    });
    /** Changes ends here... **/
  }

  /* lightGallery fixup */
  if(typeof($.fn.lightGallery)=="function"){

    $("[data-gallery]").off();
    $("[data-gallery]").on('click mousemove',function(){

      var gallery = $($(this).data('gallery'));
      var index = parseInt($(this).data('index'), 10) || 0;
      if ($(gallery).data('lightGallery')) {
        $(gallery).data('lightGallery').destroy(true);
      }
      $(gallery).lightGallery($.extend({
        dynamic: true,
        dynamicEl: JSON.parse($(gallery).attr('data-images')),
        index: index,
        download: false,
        loadYoutubeThumbnail: false,
        loadVimeoThumbnail: false,
        share: false,
        pager: false,
        fullScreen: false,
        autoplay: false,
        autoplayControls: false,
        thumbWidth: 100,
        thumbContHeight: 100,
        thumbMargin: 0,
        showThumbByDefault: true,
        hash: false
      }, $(gallery).data('options')));
      $(gallery).data('lightGallery').s.index = index;
      $(gallery).on('onAfterOpen.lg', function() {
        $('.lg-backdrop').addClass($(gallery).data('lightGallery').s.addClass);
      });
      return false;
    });
  }

  /* cloud-zoom fixup */
  if(typeof($.fn.CloudZoom)==="function"){

    main_image=undefined;
    $(".cloud-zoom-wrap").children().each(function(i,e){
      if(undefined!== $(e).data('zoom')){
        main_image=$(e);
      }
    });

    if(undefined!==$(main_image)){

      $(".mousetrap").on('mousemove',function(){
        $(".cloud-zoom-gallery.pcbi_active").trigger('mousemove');
      });

      $(".cloud-zoom-gallery").off();
      $(".cloud-zoom-gallery").on("click mousemove",function(evt){

          $(".cloud-zoom-gallery").removeClass('pcbi_active');
          $(this).addClass('pcbi_active');
          var data = $(this).data('relOpts');          
          // Destroy the previous zoom
          //$('#' + data.useZoom).data('zoom').destroy();
          // Change the biglink to point to the new big image.
          $('#' + data.useZoom).attr('href', $(this).attr('href'));
          // Change the small image to point to the new small image.
          $('#' + data.useZoom + ' img').attr('src', $(this).attr('href') || $(this).attr('href'));
          // Init a new zoom with the new images.
          $('#' + data.useZoom).CloudZoom();
          return false;
      });
    }
  }
  
});

$(window).on('load',function(){

  function pcbi_img_name(elem,attr){

      name_ob=$(elem).attr(attr);

      /* if name includes / in url extract only last offset as image name. */
      if(name_ob.includes('/')){
        name_ob=name_ob.split('/');
        name_ob=name_ob[name_ob.length-1];
      }                                            

      /* remove extension : it's causing problem as in case there is no dimension set to image. */        
      if(name_ob.includes('.')){
          name_ob=name_ob.split('.');
          name_ob=name_ob.slice(0,name_ob.length-1);                          
          name_ob=name_ob.join('.');                       
      }           

      if(window.pcbi.algo_type=='default'){                                               

          if(name_ob.includes('-')){
              name_ob=name_ob.split('-');
              if( name_ob[name_ob.length-1].match(/\d{2,}x\d{2,3}/g) ){                                
                  name_ob=name_ob.slice(0,name_ob.length-1);                                       
              }   
              name_ob=name_ob.join('-');                  
          }                    
      }
      return name_ob;
  }

  function pcbi_search_replace(_img,ri){
      
    if(typeof(_img)!='undefied' && typeof(ri)!='undefined') {                        
      
      if(window.pcbi.algo_type=='default'){                    

        target_name=_img['base'];
        replace_name=ri['base'];                       

        $("*").each(function(index,elem){   

          $.each(this.attributes,function(){                                

              if(this.specified){            

                if(this.value.includes('/'+target_name)){                    
                  
                  if(pcbi_img_name(elem,this.name)==_img['name']){

                    new_val=this.value.replace(new RegExp(target_name,'g'),replace_name).replace(new RegExp('.'+_img['extension'],'g'),'.'+ri['extension']);
                    
                    /*if(this.name.includes('data-')){
                      $(elem).data(this.name.replace(new RegExp('data-','g'),''),new_val);
                    } else {
                        $(elem).attr(this.name,new_val);             
                    }*/
                    $(elem).attr(this.name,new_val);
                  }                                   
                } 
              }                             
            });
        });        
      }
    
      else if(window.pcbi.algo_type=='zoom_plus'){

        target_name=eo_crc32('/image/'+_img['base']+'.'+_img['extension'])+"/"+_img['name'];
        replace_name=eo_crc32('/image/'+ri['base']+'.'+ri['extension'])+"/"+ri['name'];

        //normal mod href
        $("[href*='"+_img['base']+"']").each(function(indx,elem){

            if(pcbi_img_name(elem,'href')==_img['name']){

                href=$(elem).attr('href').replace(new RegExp('/'+_img['base'],'g'),'/'+ri['base']);
                href=href.split('.');
                
                if(href.length>1){
                    href[href.length-1]=ri['extension'];
                }
                href=href.join('.');

                $(elem).attr('href',href);
            }
        });

        $("a,img").each(function(index,elem){    
            $.each(this.attributes,function(){                                

                if(this.specified){            
                    if(this.value.includes('/'+target_name)){
                    
                        new_val=this.value.replace(new RegExp('/'+target_name,'g'),'/'+replace_name).replace(new RegExp('.'+_img['extension'],'g'),'.'+ri['extension']);
                        
                        $(elem).attr(this.name,new_val);
                    }

                    if(pcbi_img_name(elem,this.name)==_img['name']){

                        prop=$(elem).attr(this.name).replace(new RegExp('/'+_img['base'],'g'),'/'+ri['base']).replace(new RegExp('.'+_img['extension'],'g'),'.'+ri['extension']);
                        
                        $(elem).attr(this.name,prop);
                    }
                }                              

            });
        });                                                
      }
    }                    
    /*///////////////////////////////////////////////////*/
  }
  function pcbi_unique_images(ob){
    ob=ob.map(function(e){ return JSON.stringify(e) });
    ob=ob.filter(function(e,i){ return i==ob.lastIndexOf(e) });
    ob=ob.map(function(e){ return JSON.parse(e) });
    return ob;
  }
  /*
    mi: main_image
    ri: replace_image
    is_swap_thumb = 1 : swap the thumb image
                    2 : swap the icon images
  */
  function pcbi_simple_swap(mi,ri,is_swap_thumb=1){    
    _target=undefined
    if(is_swap_thumb===1){
      _target=window.pcbi.thumb_image_query;
    } else {
      _target=window.pcbi.icon_image_query;      
    }
    $(_target).find('*').each(function(index,elem){   
      $.each(this.attributes,function(){
        if(this.specified) {
          if(this.value.includes(mi.base)){
            new_val=this.value.replace(new RegExp(mi.base,'g'),ri.base).replace(new RegExp('.'+mi.extension,'g'),'.'+ri.extension);
            this.value=new_val;
          }
        }
      });
    });
  }

  function pcbi_search_swap(opt_value,is_swap_thumb,is_display_error){

      window.pcbi.is_display_error=is_display_error; /* declaring in global object */
      if(window.pcbi.image_map.hasOwnProperty(opt_value)){                                    
          $("#content").fadeOut(10,function(){                            
              ri=pcbi_unique_images(window.pcbi.image_map[opt_value]); /* Replaceable Image */
              fi=pcbi_unique_images(window.pcbi.image_map[window.pcbi.first_image]); /* main image */                           

              /* //For main image...*/                            
              /*////////////////////////////////////////////////////*/
              if(($("[src*='"+window.pcbi.main_image[window.pcbi.replace_method]+"'],[srcset*='"+window.pcbi.main_image[window.pcbi.replace_method]+"'],[data-largeimg*='"+window.pcbi.main_image[window.pcbi.replace_method]+"'],[href*='"+window.pcbi.main_image[window.pcbi.replace_method]+"']").length) && typeof(window.pcbi.main_image)=='object' && (Object.keys(window.pcbi.main_image)).length>=1){                                
                  
                  mi=window.pcbi.main_image;                                            
                  if(window.pcbi.algo_type=='default'){
                    
                    if(window.pcbi.main_img_ops=='1'){
                      /*Do Nothing*/
                    } else if(window.pcbi.main_img_ops=='2'){
                      if(window.pcbi.thumb_image_query.length>0 && window.pcbi.icon_image_query.length>0){
                        pcbi_simple_swap(mi,ri[0],1);
                      } else {
                        pcbi_search_replace(mi,ri[0]); 
                      }
                    } else if(window.pcbi.main_img_ops=='3'){
                      /*Remove main image*/
                    }  
                  }
                  else{
                    /* If its based on zoomplus plugin */                              
                        
                    if(window.pcbi.algo_type=='zoom_plus'){                                    
                      if(window.pcbi.main_img_ops=='1'){
                        /*Do Nothing*/
                      } else if(window.pcbi.main_img_ops=='2'){
                        pcbi_search_replace(mi,ri[0]);
                      } else if(window.pcbi.main_img_ops=='3'){
                        /*Remove main image*/
                      }
                    }
                  }
              }
              
              
              /*//For thumbnail image...*/
              /*////////////////////////////////////////////////////*/                
              if(is_swap_thumb){     

                  if(window.pcbi.algo_type=='default'){

                      popup_items=Array();
                      window.pcbi.light_gallary_item=Array();
                      for(index=0;index<ri.length;index++){                                    
                          //make changes
                          if(!ri[index] || !fi[index]) break;
                          if(window.pcbi.thumb_image_query.length>0 && window.pcbi.icon_image_query.length>0){
                            pcbi_simple_swap(fi[index],ri[index],2);
                          } else {
                            pcbi_search_replace(fi[index],ri[index]);                               
                          }
                          popup_items.push({src:ri[index]['popup'],type : 'image'});
                          window.pcbi.light_gallary_item.push({src:ri[index]['popup'],thumb:ri[index]['popup']});
                      }                          

                      if(typeof($.magnificPopup)==='object' || typeof($.magnificPopup)==='function'){

                          $(".large-image img,.product-image img,.thumbnails,.thumbnail").magnificPopup({
                              'items':popup_items,
                              'gallery': {
                                  'enabled': true
                                },
                              'type': 'image',
                              'mainClass': 'mfp-fade',
                              'callbacks': {
                                'open': function() {
                                  $.magnificPopup.instance.goTo(parseInt($('#thumb-slider .img.active, img.selected,img.active').attr('data-index') )  || 0 );
                                }
                              }
                          }); 
                      }

                      if(typeof($.fn.CloudZoom)==="function"){
                        if($(".pcbi_active").length){
                          $(".pcbi_active").trigger('mousemove');  
                        } else {
                          $(".cloud-zoom-gallery:eq(0)").trigger('mousemove')
                        }                        
                      }                        
                  }
                  else{

                      /* If its based on zoomplus plugin */
                      if(window.pcbi.algo_type=='zoom_plus'){                                    

                          if(magicToolboxLinks.length > ri.length){

                              $(magicToolboxLinks[0]).remove();
                              magicToolboxLinks[1]=magicToolboxLinks[0];
                              magicToolboxLinks=magicToolboxLinks.slice(1);                             
                          }

                          for(index=0;index<ri.length;index++){                                    
                              
                              if(!ri[index] || !fi[index]) break;

                              //refresh before modification                              
                              MagicZoom.refresh();
                              //make changes
                              pcbi_search_replace(fi[index],ri[index]);                               
                              //refresh after changes
                              MagicZoom.refresh();
                          }                                 
                      }
                  }                                
              }

              window.pcbi.main_image=ri[0];
              window.pcbi.first_image=opt_value;  

               /* Display error modal if there exists thumbnail but not main image.*/                                                
              if(window.pcbi.is_display_error){                                
                  $('#eo-pcbi-error').show();
                  $('#eo-pcbi-error .close').click(function(){ $('#eo-pcbi-error').hide(); });
                  window.pcbi.is_display_error=false;
              }                         
              $("#content").fadeIn(300);
          });
      }
      
      /* Display error modal if there is no thumbnail so we can't swap thumbnail nor main image. */
      if(window.pcbi.is_display_error){
          $('#eo-pcbi-error').show();
          $('#eo-pcbi-error .close').click(function(){ $('#eo-pcbi-error').hide(); });
          window.pcbi.is_display_error=false;
      }                         
  }               


  /* trigger event when an option changes for color of products. */
  $(document).on('change click', '[name^=\'option[\'],[data-option-value-id],[data-product-option-value-id]', function () {

    if(Object.keys(window.pcbi.image_map).length>0){
      var opt_value=$(this).val();
      /* For non select option and radio buttons */
      if(!opt_value){          
        opt_value=$(this).attr('data-option-value-id') || $(this).attr('data-product-option-value-id');
        $(this).parents().has('[data-option-value-id],[data-product-option-value-id]').first().find('[data-option-value-id],[data-product-option-value-id]').toggleClass('checked');
      }

      /* Check if images are detectable and main image thumbnail. */
      /*//////////////////////////////////////////////////////////*/
      var images_exists=false;                     
      window.pcbi.replace_method='url';      

      if(typeof(window.pcbi.image_map)=='object' && (Object.keys(window.pcbi.image_map)).length>=1){
          if(window.pcbi.algo_type=='default' || window.pcbi.algo_type==''){
              $.each(window.pcbi.image_map[window.pcbi.first_image],function(img_index,image){
                  
                  if($("[src^='"+image['url']+"'],[srcset*='"+image['url']+"'],[data-largeimg*='"+image['url']+"'],[href*='"+image['url']+"']").length){
                      images_exists=true;                            
                      return;
                  }
              });                                                                               
          }
          /* If images not found due to some reason reattemptiong to find with name only */
          if(!images_exists && window.pcbi.algo_type=='zoom_plus'){

              $.each(window.pcbi.image_map[window.pcbi.first_image],function(img_index,image){
                  
                  off_name=eo_crc32('/image/'+image['base']+'.'+image['extension'])+"/"+image['name'];  
                  
                  if($("[src*='"+off_name+"'],[data-largeimg*='"+off_name+"'],[href*='"+off_name+"']").length){
                      images_exists=true;                            
                      window.pcbi.replace_method='name';                                    
                      return;
                  }
              });
          }
      } 

      /* If no images found and no thumbnail means theam integration is needed, so show warning modal.  */
      if(!images_exists){
          
          /* Swap only main image as there is no thumbnail image. */
          /* Init swap images - @param : option_id,is_swap_thumb,is_display_error */
          pcbi_search_swap(opt_value,false,true);        
      }
      else {
          /* Everything is good to go for normal operation. */
          /* Init swap images - @param : option_id,is_swap_thumb,is_display_error*/            

          pcbi_search_swap(opt_value,true,false);
      }
      /*//////////////////////////////////////////////////////////*/
    }
  });

  $(document).find('[data-option-value-id="'+pcbi.first_image+'"],[data-product-option-value-id="'+pcbi.first_image+'"]').attr('checked','checked').trigger('change');

  $(document).find('[value="'+pcbi.first_image+'"]').attr('checked','checked').trigger('change');
  $(document).find('[value="'+pcbi.first_image+'"]').prop('selected','selected').parent().trigger('change');                
});       