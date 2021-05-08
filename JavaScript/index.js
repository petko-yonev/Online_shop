
jQuery(document).ready(function () {

    
    $(".links").mouseenter(function(){
        var container_id = $(this).parent().attr("id");
        var child_count = $("#".concat(container_id)).children().length;
        
        for (var i = 1; i <= child_count; i++) {
            $(this).parent().find(".links").removeClass("hovered");
            $(this).parent().find(".image").removeClass("image_hovered");
            $(this).parent().find(".description").removeClass("description_show");
        }
        $(this).toggleClass("hovered");
        //$(this).css("background-image", "url('../Images/"+ $(this).attr("id") +".jpg')");
        $(this).parent().find(".description").css("background-image", "url('../Images/"+ $(this).attr("id") +".jpg')");
        $(this).find(".image").toggleClass("image_hovered");
        $(this).find(".description").toggleClass("description_show");
    })
    $(".links").mouseleave(function(){
        var container_id = $(this).parent().attr("id");
        var child_count = $("#".concat(container_id)).children().length;
        //$(this).css("background-image", "");
        $(this).parent().find(".description").css("background-image", "");
        for (var i = 1; i <= child_count; i++) {
            $(this).parent().find(".links").removeClass("hovered");
            $(this).parent().find(".image").removeClass("image_hovered");
            $(this).parent().find(".description").removeClass("description_show");
        }
    })
});
