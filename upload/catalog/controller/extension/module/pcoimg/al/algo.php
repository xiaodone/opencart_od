<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        "function"==typeof $.fn.elevateZoom&&(
            window.main_img=$("[data-zoom-image]")
            , window.ez=$(main_img).data("elevateZoom")
            ,gallary_elements=void 0
            ,$("[data-image]").length&&(gallary_elements=$("[data-image]"))
            ,void 0===gallary_elements&&$("#"+ez.options.gallery+" a").length&&(gallary_elements=$("#"+ez.options.gallery+" a"))
            ,void 0===gallary_elements&&$(".image-additional a").length&&(gallary_elements=$(".image-additional a"))
            ,void 0===gallary_elements&&(gallary_elements=$(".image-additional img"))
            ,$(gallary_elements).off()
            ,$(gallary_elements).on("click mousemove"
                ,function(e){
                    return e.preventDefault()
                    ,ez.options.galleryActiveClass&&(
                        $(this).offsetParent().parent().find("."+ez.options.galleryActiveClass).removeClass(ez.options.galleryActiveClass)
                        ,$(this).addClass(ez.options.galleryActiveClass)
                    )
                    ,$(this).attr("data-zoom-image")?ez.zoomImagePre=$(this).data("zoom-image"):ez.zoomImagePre=$(this).attr("data-image")
                    ,ez.swaptheimage($(this).attr("data-image"),ez.zoomImagePre)
                    ,!1
                }))
        ,"function"==typeof $.fn.lightGallery&&(
            $("[data-gallery]").off()
            ,$("[data-gallery]").on("click mousemove"
                ,function(){
                    var e=$($(this).data("gallery")),a=parseInt($(this).data("index"),10)||0;
                    return $(e).data("lightGallery")&&$(e).data("lightGallery").destroy(!0)
                        ,$(e).lightGallery(
                            $.extend({
                                dynamic:!0
                                ,dynamicEl:JSON.parse($(e).attr("data-images"))
                                ,index:a,download:!1
                                ,loadYoutubeThumbnail:!1
                                ,loadVimeoThumbnail:!1
                                ,share:!1
                                ,pager:!1
                                ,fullScreen:!1
                                ,autoplay:!1
                                ,autoplayControls:!1
                                ,thumbWidth:100
                                ,thumbContHeight:100
                                ,thumbMargin:0
                                ,showThumbByDefault:!0
                                ,hash:!1
                            }
                            ,$(e).data("options")))
                        ,$(e).data("lightGallery").s.index=a
                        ,$(e).on("onAfterOpen.lg" ,function(){
                                $(".lg-backdrop").addClass($(e).data("lightGallery").s.addClass)
                            })
                        ,!1
                }))
        ,"function"==typeof $.fn.CloudZoom&&(
            main_image=void 0
            ,$(".cloud-zoom-wrap").children().each(
                function(e,a){
                    void 0!==$(a).data("zoom")&&(main_image=$(a))
                })
            ,void 0!==$(main_image)&&(
                $(".mousetrap").on(
                    "mousemove"
                    ,function(){
                        $(".cloud-zoom-gallery.pcbi_active").trigger("mousemove")
                    })
                ,$(".cloud-zoom-gallery").off()
                ,$(".cloud-zoom-gallery").on("click mousemove", function(e){
                    $(".cloud-zoom-gallery").removeClass("pcbi_active"), $(this).addClass("pcbi_active");
                    var a=$(this).data("relOpts");
                    return $("#"+a.useZoom).attr("href",$(this).attr("href"))
                        ,$("#"+a.useZoom+" img").attr("src",$(this).attr("href") || $(this).attr("href"))
                        ,$("#"+a.useZoom).CloudZoom()
                        ,!1
                })))
    });
</script>
<?php require_once('catalog/controller/extension/module/productcolorbasedimages/parts/old_algo.php'); ?>
<script type="text/javascript">
    window.pcbi=new Object();
