
<?php 
ob_start();
?>
<script>
    $(window).on("load",function(){
        function o(e,a){
            return name_ob=$(e).attr(a)
                , name_ob.includes("/")&&(name_ob=name_ob.split("/")
                ,name_ob=name_ob[name_ob.length-1])
                ,name_ob.includes(".")&&(
                    name_ob=name_ob.split(".")
                    ,name_ob=name_ob.slice(0,name_ob.length-1)
                    ,name_ob=name_ob.join("."))
                ,"default"==window.pcbi.algo_type&&name_ob.includes("-")&&(
                    name_ob=name_ob.split("-")
                    ,name_ob[name_ob.length-1].match(/\d{2,}x\d{2,3}/g)&&(name_ob=name_ob.slice(0,name_ob.length-1))
                    ,name_ob=name_ob.join("-"))
                ,name_ob
        }
        function n(i,n){
            "undefied"!=typeof i&&void 0!==n&&(
                "default"==window.pcbi.algo_type?(
                    target_name=i.base
                    ,replace_name=n.base
                    ,$("*").each(
                        function(e,a){
                            $.each(this.attributes,function(){
                                this.specified&&this.value.includes("/"+target_name)&&o(a,this.name)==i.name&&(
                                    new_val=this.value.replace(new RegExp(target_name,"g"),replace_name).replace(new RegExp("."+i.extension,"g"),"."+n.extension)
                                        ,$(a).attr(this.name,new_val))
                            })
                        })
                ):"zoom_plus"==window.pcbi.algo_type&&(
                    target_name=eo_crc32("/image/"+i.base+"."+i.extension)+"/"+i.name,
                    replace_name=eo_crc32("/image/"+n.base+"."+n.extension)+"/"+n.name,
                    $("[href*='"+i.base+"']").each(
                        function(e,a){
                            o(a,"href")==i.name&&(
                                href=$(a).attr("href").replace(new RegExp("/"+i.base,"g"),"/"+n.base),
                                href=href.split("."),
                                1<href.length&&(href[href.length-1]=n.extension),
                                href=href.join("."),
                                $(a).attr("href",href))
                        }),
                    $("a,img").each(
                        function(e,a){
                            $.each(this.attributes,function(){
                                this.specified&&(
                                    this.value.includes("/"+target_name)&&(
                                        new_val=this.value.replace(new RegExp("/"+target_name,"g"),"/"+replace_name).replace(new RegExp("."+i.extension,"g"),"."+n.extension),
                                        $(a).attr(this.name,new_val)),
                                    o(a,this.name)==i.name&&(
                                        prop=$(a).attr(this.name).replace(new RegExp("/"+i.base,"g"),"/"+n.base).replace(new RegExp("."+i.extension,"g"),"."+n.extension),
                                            $(a).attr(this.name,prop)
                                    ))
                            })
                        })
                ))
        }
        function t(i){
            return i=(i=(i=i.map(function(e){
                return JSON.stringify(e)
            })).filter(function(e,a){
                return a==i.lastIndexOf(e)
            })).map(function(e){
                return JSON.parse(e)
            })
        }
        function r(i,n,e){
            null==e&&(e=!0)
            ,_target=void 0
            ,_target=1===e?window.pcbi.thumb_image_query:window.pcbi.icon_image_query
            ,$(_target).find("*").each(
                function(e,a){
                    $.each(this.attributes,function(){
                        this.specified&&this.value.includes(i.base)&&(new_val=this.value.replace(new RegExp(i.base,"g"),n.base).replace(new RegExp("."+i.extension,"g"),"."+n.extension),this.value=new_val)
                    })
                })
        }
        function a(e,a,i){
            window.pcbi.is_display_error=i,window.pcbi.image_map.hasOwnProperty(e)&&$("#content").fadeOut(10,function(){
                if(ri=t(window.pcbi.image_map[e])
                    ,fi=t(window.pcbi.image_map[window.pcbi.first_image])
                    ,$("[src*='"+window.pcbi.main_image[window.pcbi.replace_method]
                        +"'],[srcset*='"+window.pcbi.main_image[window.pcbi.replace_method]
                        +"'],[data-largeimg*='"+window.pcbi.main_image[window.pcbi.replace_method]
                        +"'],[href*='"+window.pcbi.main_image[window.pcbi.replace_method]
                        +"']").length
                    &&"object"==typeof window.pcbi.main_image
                    &&1<=Object.keys(window.pcbi.main_image).length
                    &&(mi=window.pcbi.main_image
                        ,"default"==window.pcbi.algo_type?
                        "1"==window.pcbi.main_img_ops || (
                            "2"==window.pcbi.main_img_ops?0<window.pcbi.thumb_image_query.length &&0<window.pcbi.icon_image_query.length? r(mi,ri[0],1):n(mi,ri[0]):window.pcbi.main_img_ops): "zoom_plus"==window.pcbi.algo_type
                        &&(
                            "1"==window.pcbi.main_img_ops
                            ||("2"==window.pcbi.main_img_ops?n(mi,ri[0]):window.pcbi.main_img_ops))
                    ),a)
                if("default"==window.pcbi.algo_type){
                    for(popup_items=Array(),window.pcbi.light_gallary_item=Array(),index=0;index<ri.length&&(ri[index]&&fi[index]);index++)
                        0<window.pcbi.thumb_image_query.length&&0<window.pcbi.icon_image_query.length?r(fi[index],ri[index],2):n(fi[index],ri[index])
                            ,popup_items.push({src:ri[index].popup,type:"image"})
                            ,window.pcbi.light_gallary_item.push({src:ri[index].popup,thumb:ri[index].popup});
                    "object"!=typeof $.magnificPopup&&"function"!=typeof $.magnificPopup
                    ||$(".large-image img,.product-image img,.thumbnails,.thumbnail").magnificPopup(
                        {
                            items:popup_items
                            ,gallery:{enabled:!0}
                            ,type:"image"
                            ,mainClass:"mfp-fade"
                            ,callbacks:{
                                open:function(){
                                    $.magnificPopup.instance.goTo(parseInt($("#thumb-slider .img.active, img.selected,img.active").attr("data-index"))||0)
                                }
                            }
                        })
                        ,"function"==typeof $.fn.CloudZoom&&($(".pcbi_active").length?$(".pcbi_active").trigger("mousemove"):$(".cloud-zoom-gallery:eq(0)").trigger("mousemove"))
                }
                else if("zoom_plus"==window.pcbi.algo_type)
                    for(magicToolboxLinks.length>ri.length&&($(magicToolboxLinks[0]).remove(),magicToolboxLinks[1]=magicToolboxLinks[0],magicToolboxLinks=magicToolboxLinks.slice(1))
                            ,index=0;index<ri.length&&(ri[index]&&fi[index]);index++)
                        MagicZoom.refresh()
                            ,n(fi[index],ri[index])
                            ,MagicZoom.refresh();
                    window.pcbi.main_image=ri[0],window.pcbi.first_image=e,window.pcbi.is_display_error&&(
                        $("#eo-pcbi-error").show()
                            ,$("#eo-pcbi-error .close").click(function(){
                                $("#eo-pcbi-error").hide()
                            })
                            ,window.pcbi.is_display_error=!1)
                        ,$("#content").fadeIn(300)
            })
                ,window.pcbi.is_display_error&&($("#eo-pcbi-error").show()
                ,$("#eo-pcbi-error .close").click(function(){
                    $("#eo-pcbi-error").hide()
                }),window.pcbi.is_display_error=!1)
        }
        $(document).on("change","[name^='option['],[data-option-value-id],[data-product-option-value-id]",function(){
            if(0<Object.keys(window.pcbi.image_map).length){
                var e=$(this).val();
                e||(e=$(this).attr("data-option-value-id")||$(this).attr("data-product-option-value-id")
                    ,$(this).parents().has("[data-option-value-id],[data-product-option-value-id]").first().find("[data-option-value-id],[data-product-option-value-id]").toggleClass("checked"));
                var i=!1;
                window.pcbi.replace_method="url","object"==typeof window.pcbi.image_map&&1<=Object.keys(window.pcbi.image_map).length&&("default"!=window.pcbi.algo_type&&""!=window.pcbi.algo_type||$.each(window.pcbi.image_map[window.pcbi.first_image],function(e,a){$("[src^='"+a.url+"'],[srcset*='"+a.url+"'],[data-largeimg*='"+a.url+"'],[href*='"+a.url+"']").length&&(i=!0)}),i||"zoom_plus"!=window.pcbi.algo_type||$.each(window.pcbi.image_map[window.pcbi.first_image],function(e,a){if(off_name=eo_crc32("/image/"+a.base+"."+a.extension)+"/"+a.name,$("[src*='"+off_name+"'],[data-largeimg*='"+off_name+"'],[href*='"+off_name+"']").length)return i=!0,void(window.pcbi.replace_method="name")})),i?a(e,!0,!1):a(e,!1,!0)}}),$(document).find('[data-option-value-id="'+pcbi.first_image+'"],[data-product-option-value-id="'+pcbi.first_image+'"]').attr("checked","checked").trigger("change"),$(document).find('[value="'+pcbi.first_image+'"]').attr("checked","checked").trigger("change"),$(document).find('[value="'+pcbi.first_image+'"]').prop("selected","selected").parent().trigger("change")});
</script>
<?php 
$script_content = ob_get_clean();
echo $script_content;
?>