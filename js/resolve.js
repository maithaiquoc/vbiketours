$(function(){
    $('#menu1').slicknav({
        label: '',
        beforeOpen: function(){
            $(".slicknav_menu").attr("style", "background-color: #2b2d2e !important;");
            $(".arrow_left, .arrow_right").css("top", 258 + 90);
        },
        beforeClose: function(){
            $(".slicknav_menu").attr("style", "background-color: transparent !important;");
            $(".arrow_left, .arrow_right").css("top", 90);
        }
    });
});

var jssor_slider1;
jQuery(document).ready(function ($) {

    var options = {
        $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
        $SlideDuration: 800,                               //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500

        $ArrowNavigatorOptions: {                           //[Optional] Options to specify and enable arrow navigator or not
            $Class: $JssorArrowNavigator$,                  //[Requried] Class to create arrow navigator instance
            $ChanceToShow: 1,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
            $AutoCenter: 2,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
            $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
        }
    };

    //Make the element 'slider1_container' visible before initialize jssor slider.
    $("#slider1_container").css("display", "block");
    jssor_slider1 = new $JssorSlider$("slider1_container", options);

    //responsive code begin
    //you can remove responsive code if you don't want the slider scales while window resizes
    function ScaleSlider() {
        var bodyWidth = document.body.clientWidth;
        if (bodyWidth)
            jssor_slider1.$ScaleWidth(Math.min(bodyWidth, 1920));
        else
            window.setTimeout(ScaleSlider, 30);
    }
    ScaleSlider();

    $(window).bind("load", ScaleSlider);
    $(window).bind("resize", ScaleSlider);
    $(window).bind("orientationchange", ScaleSlider);
    //responsive code end

    function SlideParkEventHandler(slideIndex, fromIndex) {
        var url = $("#image_" + slideIndex).attr('value');
        $("#hiddenUrlSlide").val(url);
        //do something here
    }

    jssor_slider1.$On($JssorSlider$.$EVT_PARK, SlideParkEventHandler);
});

$(".location-wrapper").hover(
    function(){
        $("#hiddenActiveSlide").val('1');
    },
    function(){
        $("#hiddenActiveSlide").val('0');
    });

$("#keyword, .fake-search-field").focus(function(){
    $("#hiddenActiveSlide").val('1');
});

$("#keyword, .fake-search-field").blur(function(){
    $("#hiddenActiveSlide").val('0');
});

$("#btnSearch").click(function(){
    $("#hiddenActiveSlide").val('1');
});

$("#iSearch").click(function(){
    $("#hiddenActiveSlide").val('1');
    window.location.href = "/tim-kiem/keyword=" + $("#iText").val();
});

$("#divPrevSlider").click(function(){
    jssor_slider1.$Prev();
});

$("#divNextSlider").click(function(){
    jssor_slider1.$Next();
});