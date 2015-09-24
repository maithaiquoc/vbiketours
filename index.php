<?php

session_start();

error_reporting(0);

@define ( '_template' , './templates/');

@define ( '_source' , './sources/');

@define ( '_lib' , './sacviet/lib/');

@define ( _upload_folder , './media/upload/' );



//Lưu ngôn ngữ chọn vào $_SESSION



$lang_arr=array("vi","en");

if (isset($_GET['lang']) == true){

    if (in_array($_GET['lang'], $lang_arr)==true){

        $lang = $_GET['lang'];

        $_SESSION['lang']=$lang;

    }

}

if(isset($_SESSION['lang'])){

    $lang= $_SESSION['lang'];

}else{

    $lang="vi";

}

require_once _source."lang_$lang.php";

include_once "config.php";

include_once _lib."constant.php";

include_once _lib."functions.php";

include_once _lib."class.database.php";

include_once _lib."library.php";

include_once _lib."upload.php";

include_once _lib."file_requick.php";

@include_once _source."counter.php";

@include_once _source."useronline.php";

include_once _lib."functions_giohang.php";

if(@$_REQUEST['command']=='add' && @$_REQUEST['productid']>0){

    $pid=$_REQUEST['productid'];

    $q=isset($_GET['quality']) ? ($_GET['quality']) : "1";

    addtocart($pid,$q);

    redirect("gio-hang.html");

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<base href="http://<?=$config_url?>/"  />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta itemprop="image" content="images/favorite.png"><link rel="shortcut icon" href="images/favorite.png">
<?php
$d->reset();

$sql_contact = "select * from #_setting ";

$d->query($sql_contact);

$row_setting = $d->fetch_array();
?>
<title><?=@$title_bar?><?=$row_setting['title_'.$lang]?></title>

<meta name="keywords" content="<?=$row_setting['keywords']?>" />

<meta name="description" content="<?=$row_setting['description']?>" />

<meta name="author" content="vbiketours@gmail.com - Landline: (08) 66 85 23 66 - Hotline: 090 3 378 266" />

<meta name="copyright" content="www.vbiketours.com" />

<link href="css/reset.css" rel="stylesheet" type="text/css" />

<!--<link href="css/style.css" rel="stylesheet" type="text/css" />

<link href="css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="css/preview.css"/>

<link rel="stylesheet" type="text/css" href="css/wt-rotator.css"/>

<script type="text/javascript" src="js/jquery-1.9.1.js"></script>

<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>

<script type="text/javascript" src="js/jquery.wt-rotator.min.js"></script>

<script type="text/javascript" src="js/preview.js"></script>

<script type="text/javascript" src="js/flowplayer-3.2.13.min.js"></script>-->

<!--<script type="text/javascript" language="javascript">

    $(document).ready(function(){



		$('#tab-container div.tab-container-details').hide();

		$('#tab-container div.tab-container-details:first').show();

		$('#tab-container ul li:first').addClass('active');

		$('#tab-container ul li a').click(function(){ 

			$('#tab-container ul li').removeClass('active');

$('#tab-container ul li a').css({'color':'#000'});

			$(this).parent().addClass('active'); 

$(this).css({'color':'#fff'});

			var currentTab = $(this).attr('href'); 

			$('#tab-container div.tab-container-details').hide();

			$(currentTab).show();

			return false;

		});

InitDialoge();









$('#tab-container ul li a:first').css({'color':'#fff'});

		

    });

	function InitDialoge(){

		$("#MessageDialog").dialog({

		  modal: true,

autoOpen: false

		});

	}

	function applyNewImage(path,id)

	{

var image_id = '#new_image' + id;

		$(image_id).attr("src", path);		

	}



function applyProductImage(path)

	{

		$('#product_image').attr("src", path);		

	}

	

	function applyqtycount(mode)

	{	

		var value = $('#product-qty_count').val();

		if(mode == 1)

		{

			$('#product-qty_count').val((value*1) + 1);

		}

		else

		{

			if(value > 0)

				$('#product-qty_count').val((value*1) - 1);

		}		

	}

	

	function applyProductImage(path)

	{

		$('#product_image').attr("src", path);

	}

	

	function inputFocus(i){

		if(i.value==i.defaultValue){ i.value=""; i.style.color="#000"; }

	}

	

	function inputBlur(i){

		if(i.value==""){ i.value=i.defaultValue; i.style.color="#888"; }

	}

	

	function addtocart(pid){



		document.form1.productid.value=pid;



		document.form1.command.value='add';



		document.form1.submit();



	}

	

	function addtocartonline(pid){

var value = $('#product-qty_count').val();

if(value != "0" && value != "")

{

$.ajax (  {

type: "POST",

url: "sacviet/lib/init_giohang.php",

data: { func : "add" , id : pid, qty : value},

success: function(html){ 

if(html != "")

{ 

var _back = '<?= _successgiohang ?>';

var _url = window.location.href;

window.location = _back+'?url='+_url +'';

}

else

{ 



$('#MessageDialogDetail').html('khong them duoc'); 

$("#MessageDialog").dialog("open");

}

} 

} ); 

} 

}

	function applyCategoryImage(path)

{

$('#CategoryImage').attr("src", path); 

}

</script>-->




<link rel="stylesheet" type="text/css" href="./css/body.css">
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/header_footer.css">
<script src="js/jquery.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/triip.js"></script>
<script src="js/body.js"></script>
<script src="Scripts/scrolltopcontrol.js"></script>

<link href="css/bootstrap.min.css" rel="stylesheet" />
<link href="css/common_o2.css" media="all" rel="stylesheet" type="text/css">
<link href="css/main.css" media="screen" rel="stylesheet" type="text/css">

<link rel="alternate" media="only screen and (max-width: 640px)" href="#">
<!--button our tour-->
<link rel="stylesheet" href="css/allinone.css" type="text/css">
<link rel="stylesheet" href="css/css.css" type="text/css">
<link rel="stylesheet" href="./css/white.css" type="text/css">
<link rel="image_src" href="http://vbiketours.com/<?=_upload_product_l,$row_detail['photo']?>" />
<meta name="description" content="Motorbike tours in Viet Nam">
<meta property="fb:app_id" content="138566025676">
<meta property="og:site_name" content="Vbiketours">
<meta property="og:type" content="image/jpeg image/png">
<meta property="og:url" content="#">
<meta property="og:title" id="metaTitle" content="<?php echo $row_detail['ten_vi']; ?>">
<meta property="og:description" content="Motorbike tours in Viet Nam">
<meta property="og:image" content="http://vbiketours.com/<?=_upload_product_l,$row_detail['photo']?>">
<meta property="og:locale" content="en_US">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="./css/style.css" media="all" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="./css/styles.css" type="text/css">
<script type="text/javascript" src="./js/mootools.js"></script>
<script language="javascript" type="text/javascript" src="./js/combined.js"></script>
<script type="text/javascript">
    window.addEvent('domready', function(){ new Accordion($$('.panel h3.jpane-toggler'), $$('.panel div.jpane-slider'), {onActive: function(toggler, i) { toggler.addClass('jpane-toggler-down vienminhquang'); toggler.removeClass('jpane-toggler vienminhquang'); },onBackground: function(toggler, i) { toggler.addClass('jpane-toggler vienminhquang'); toggler.removeClass('jpane-toggler-down vienminhquang'); },duration: 300,show: -1,opacity: false,alwaysHide: true}); });
</script>

<!--Width of template -->
<style type="text/css">
    .main {
        width: 996px;
        margin: 0 auto;
    }
    #ja-wrapper {
        min-width: 997px;
    }
</style>
<script type="text/javascript">

    function nocontext(e) {
        var clickedTag = (e==null) ? event.srcElement.tagName : e.target.tagName;
        if (clickedTag == "IMG") {
            //alert(alertMsg);
            return false;
        }
    }
    //var alertMsg = "Image context menu is disabled";
    document.oncontextmenu = nocontext;
    //]]>
</script>

</head>

<body class="home_view v2 simple-header p1" >
<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=359340147575210&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>-->
<meta content="{&quot;inspectlet_on_guest&quot;:{&quot;subject&quot;:&quot;bev&quot;,&quot;buckets&quot;:2,&quot;percent_exposed&quot;:1,&quot;treatments&quot;:[{&quot;name&quot;:&quot;control&quot;,&quot;buckets&quot;:null},{&quot;name&quot;:&quot;inspectlet_active&quot;,&quot;buckets&quot;:null}]},&quot;p1_saved_search_widget&quot;:{&quot;subject&quot;:&quot;bev&quot;,&quot;buckets&quot;:2,&quot;percent_exposed&quot;:100,&quot;treatments&quot;:[{&quot;name&quot;:&quot;control&quot;,&quot;buckets&quot;:null},{&quot;name&quot;:&quot;use_saved_search_widget&quot;,&quot;buckets&quot;:null}]}}" id="_bootstrap-erf">
<?php include _template."layout/mob.php"; ?>
<div id="header" class="airbnb-header shift-with-hiw">
    <div class="header--sm show-sm">
        <ul id="menu1">
            <li> <a href="index.html"> Home </a> </li>
            <li> <a href="testimonials.html"> Testimonials </a> </li>
            <!--      <li id="sign_up" class="pull-left medium-right-margin"> <a data-signup-modal="" data-header-view="true" href="press.html" class="link-reset" rel="nofollow" onmouseover="this.style.backgroundColor = '#e2227c';" onmouseout="this.style.backgroundColor = 'inherit';"> Press </a> </li>-->
            <li> <a href="link.html"> Link </a> </li>
            <li> <a href="about-us.html"> About Us </a> </li>
            <li> <a href="faq.html"> Faq </a> </li>

            <li> <a href="gallery.html" >Gallery</a> </li>
            <li> <a href="news.html">News</a> </li>
            <li> <a href="contact.html">Contact</a> </li>
        </ul>

        <div class="modal" role="dialog" aria-hidden="true" id="search-modal--sm">
            <div class="modal-table">
                <div class="modal-cell">
                    <div class="modal-content">
                        <?php include _template."layout/mob_menu_btn.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="regular-header clearfix hide-sm">
        <a href="http://<?=$config_url?>/" class="header-belo pull-left">
            <img class="header-belo-logo" src="images/logo.png" alt=""/>
        </a>

        <ul class="nav pull-right help-menu list-unstyled">

            <li class="list-your-space pull-left"> <a id="list-your-space" class="btn btn-special" href="contact.html"><?=$row_setting['hotline']?></a> </li>
        </ul>
        <?php include _template."layout/top_menu.php"; ?>

    </div>
</div>
<!--<script src="./index_files/header_cookie-ef612d1504fde35476fd3baf189d868b.js" type="text/javascript"></script>-->
<div class="span12 flash-container"> </div>

<div id="transition_helper" class="shift-with-hiw"></div>

<div class="hide show-md show-lg">
    <div class="how-it-works-section panel-babu-muted panel-contrast page-container-responsive overlay" style="top: -663px;">
        <a href="https://www.airbnb.com/?mr=f#" class="panel-close"></a>
        <div class="page-container-responsive">
            <div class="row row-space-top-2">
                <div class="col-sm-12 col-md-4 text-center text-contrast">
                    <div class="panel-body">
                        <div class="responsive-hiw-step-wrapper">
                            <div class="responsive-hiw-step step1"></div>
                        </div>
                        <h3> Discover Amazing Places </h3>
                        <p> Find hosts with extra rooms, entire homes, and unique accommodations like castles and igloos. </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 text-center text-contrast">
                    <div class="panel-body">
                        <div class="responsive-hiw-step-wrapper">
                            <div class="responsive-hiw-step step2"></div>
                        </div>
                        <h3> Book a Stay </h3>
                        <p> Connect with hosts, confirm travel dates, and pay — all through Airbnb's trusted services. </p>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 text-center text-contrast">
                    <div class="panel-body">
                        <div class="responsive-hiw-step-wrapper">
                            <div class="responsive-hiw-step step3"></div>
                        </div>
                        <h3> Travel </h3>
                        <p> Feel at home, anywhere you go in the world. <a href="#">Learn more</a> about how to travel on Airbnb. </p>
                    </div>
                </div>
            </div>
            <div class="row row-space-top-4 row-space-4 text-center text-contrast">
                <div class="col-12">
                    <p><a href="#">Learn more</a> about hosting on Airbnb and show your guests they're right where they belong. </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="p1-hero-wrapper shift-with-hiw" id="p1Slider" onclick="if($('#hiddenActiveSlide').val() == 0){window.open($('#hiddenUrlSlide').val());}">
    <div id="hero" data-native-currency="USD">
        <!--<ul class="list-unstyled" id="slideshow">
          <li class="active"> <img alt="" src="./images/slider.png" width="100%"> </li>
        </ul>-->
        <input type="hidden" id="hiddenActiveSlide" value="0"/>
        <input type="hidden" id="hiddenUrlSlide"/>
        <?php include _template."layout/slideranh.php"; ?>
        <!-- Jssor Slider End -->
    </div>

    <div class="row show-sm"><a class="btn btn-special btn-right" href="contact.html"><?=$row_setting['hotline']?></a></div>

    <div class="search-area text-center page-container-responsive">
        <div class="va-container">
            <div class="intro-area va-middle">
                <?php include _template."layout/menu_top.php"; ?>
                <?php include _template."layout/menu_button.php"; ?>
            </div>
        </div>
    </div>
</div>

<div class="arrow_left" id="divPrevSlider"></div>
<div class="arrow_right" id="divNextSlider"></div>

<div class="panel panel-dark">
    <div id="discovery-container">

        <div class="discovery-section hide page-container-responsive" id="upcoming-trips">
            <div class="section-intro text-center row-space-5 row-space-top-8">
                <h2 class="row-space-1 strong"> Your Upcoming Trip </h2>
            </div>
            <div class="discovery-tiles row-space-top-6 row-space-6">
                <div class="homepage-module"></div>
            </div>
        </div>
        <div class="discovery-section hide page-container-responsive" id="discovery-saved-searches">
            <div class="section-intro text-center row-space-5 row-space-top-8">
                <h2 class="row-space-1 strong"> Start Your Next Adventure </h2>
            </div>
            <div class="discovery-tiles row-space-top-6 row-space-6">
                <div class="homepage-module"></div>
            </div>
        </div>
        <div class="discovery-section hide page-container-responsive" id="weekend-recommendations">
            <div class="section-intro text-center row-space-5 row-space-top-8">
                <h2 class="row-space-1 strong"> Just for the Weekend </h2>
                <p class="text-lead"> Discover new, inspiring places close to home. </p>
            </div>
            <div class="discovery-tiles row-space-top-6 row-space-6">
                <div class="homepage-module"></div>
            </div>
        </div>

    </div>
</div>
<div class="row-space-4" id="community-wrapper">
    <?php include _template.$template."_tpl.php"; ?>
</div>
<?php  if(($_GET['com']=='index') ||($_GET['com']=='')){?>
    <?php include _template."layout/video.php"; ?>
<?php }?>
<div class="trust hide-sm"> </div>

<!--phan footer-->
<div id="footer" class="container-brand-dark footer-surround footer-container">
    <?php include _template."layout/footer.php"; ?>
</div>

<meta content="{&quot;data&quot;:{&quot;country&quot;:&quot;VN&quot;,&quot;tld_country&quot;:&quot;US&quot;,&quot;currencies&quot;:{&quot;ARS&quot;:{&quot;symbol&quot;:&quot;$&quot;,&quot;code_required&quot;:true,&quot;options&quot;:null},&quot;AUD&quot;:{&quot;symbol&quot;:&quot;$&quot;,&quot;code_required&quot;:true,&quot;options&quot;:null},&quot;BRL&quot;:{&quot;symbol&quot;:&quot;R$&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;space_between_price_and_symbol&quot;:true}},&quot;CAD&quot;:{&quot;symbol&quot;:&quot;$&quot;,&quot;code_required&quot;:true,&quot;options&quot;:null},&quot;CHF&quot;:{&quot;symbol&quot;:&quot;CHF&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;position&quot;:&quot;after&quot;,&quot;space_between_price_and_symbol&quot;:true}},&quot;CNY&quot;:{&quot;symbol&quot;:&quot;&amp;yen;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;¥&quot;}},&quot;CZK&quot;:{&quot;symbol&quot;:&quot;&amp;#75;&amp;#269;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;Kč&quot;}},&quot;DKK&quot;:{&quot;symbol&quot;:&quot;kr&quot;,&quot;code_required&quot;:true,&quot;options&quot;:{&quot;position&quot;:&quot;after&quot;,&quot;space_between_price_and_symbol&quot;:true,&quot;explicit_currency_not_aesthetic&quot;:true}},&quot;EUR&quot;:{&quot;symbol&quot;:&quot;&amp;euro;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;€&quot;,&quot;position&quot;:&quot;special&quot;}},&quot;GBP&quot;:{&quot;symbol&quot;:&quot;&amp;pound;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;£&quot;}},&quot;HKD&quot;:{&quot;symbol&quot;:&quot;$&quot;,&quot;code_required&quot;:true,&quot;options&quot;:null},&quot;HUF&quot;:{&quot;symbol&quot;:&quot;Ft&quot;,&quot;code_required&quot;:false,&quot;options&quot;:null},&quot;IDR&quot;:{&quot;symbol&quot;:&quot;Rp&quot;,&quot;code_required&quot;:false,&quot;options&quot;:null},&quot;ILS&quot;:{&quot;symbol&quot;:&quot;&amp;#8362;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;₪&quot;,&quot;space_between_price_and_symbol&quot;:true}},&quot;INR&quot;:{&quot;symbol&quot;:&quot;&amp;#8377;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;₹&quot;}},&quot;JPY&quot;:{&quot;symbol&quot;:&quot;&amp;yen;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;¥&quot;,&quot;space_between_price_and_symbol&quot;:true}},&quot;KRW&quot;:{&quot;symbol&quot;:&quot;&amp;#8361;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;₩&quot;}},&quot;MYR&quot;:{&quot;symbol&quot;:&quot;&amp;#82;&amp;#77;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;RM&quot;}},&quot;MXN&quot;:{&quot;symbol&quot;:&quot;$&quot;,&quot;code_required&quot;:true,&quot;options&quot;:null},&quot;NOK&quot;:{&quot;symbol&quot;:&quot;kr&quot;,&quot;code_required&quot;:true,&quot;options&quot;:{&quot;position&quot;:&quot;after&quot;,&quot;space_between_price_and_symbol&quot;:true,&quot;explicit_currency_not_aesthetic&quot;:true}},&quot;NZD&quot;:{&quot;symbol&quot;:&quot;$&quot;,&quot;code_required&quot;:true,&quot;options&quot;:null},&quot;PHP&quot;:{&quot;symbol&quot;:&quot;&amp;#8369;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;₱&quot;}},&quot;PLN&quot;:{&quot;symbol&quot;:&quot;z&amp;#22;&amp;#322;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;zł&quot;,&quot;position&quot;:&quot;after&quot;,&quot;space_between_price_and_symbol&quot;:true}},&quot;RUB&quot;:{&quot;symbol&quot;:&quot;&amp;#1088;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;р&quot;,&quot;position&quot;:&quot;after&quot;}},&quot;SEK&quot;:{&quot;symbol&quot;:&quot;kr&quot;,&quot;code_required&quot;:true,&quot;options&quot;:{&quot;position&quot;:&quot;after&quot;,&quot;space_between_price_and_symbol&quot;:true,&quot;explicit_currency_not_aesthetic&quot;:true}},&quot;SGD&quot;:{&quot;symbol&quot;:&quot;$&quot;,&quot;code_required&quot;:true,&quot;options&quot;:null},&quot;THB&quot;:{&quot;symbol&quot;:&quot;&amp;#3647;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;฿&quot;}},&quot;TRY&quot;:{&quot;symbol&quot;:&quot;&amp;#84;&amp;#76;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;TL&quot;,&quot;position&quot;:&quot;after&quot;,&quot;space_between_price_and_symbol&quot;:true}},&quot;TWD&quot;:{&quot;symbol&quot;:&quot;$&quot;,&quot;code_required&quot;:true,&quot;options&quot;:null},&quot;USD&quot;:{&quot;symbol&quot;:&quot;$&quot;,&quot;code_required&quot;:false,&quot;options&quot;:null},&quot;VND&quot;:{&quot;symbol&quot;:&quot;&amp;#8363;&quot;,&quot;code_required&quot;:false,&quot;options&quot;:{&quot;unicode_symbol&quot;:&quot;₫&quot;}},&quot;ZAR&quot;:{&quot;symbol&quot;:&quot;R&quot;,&quot;code_required&quot;:true,&quot;options&quot;:null}},&quot;current_locale_name&quot;:&quot;English&quot;,&quot;languages&quot;:[{&quot;locale_name&quot;:&quot;Bahasa Indonesia&quot;,&quot;locale&quot;:&quot;id&quot;},{&quot;locale_name&quot;:&quot;Bahasa Melayu&quot;,&quot;locale&quot;:&quot;ms&quot;},{&quot;locale_name&quot;:&quot;Català&quot;,&quot;locale&quot;:&quot;ca&quot;},{&quot;locale_name&quot;:&quot;Dansk&quot;,&quot;locale&quot;:&quot;da&quot;},{&quot;locale_name&quot;:&quot;Deutsch&quot;,&quot;locale&quot;:&quot;de&quot;},{&quot;locale_name&quot;:&quot;English&quot;,&quot;locale&quot;:&quot;en&quot;},{&quot;locale_name&quot;:&quot;Español&quot;,&quot;locale&quot;:&quot;es&quot;},{&quot;locale_name&quot;:&quot;Eλληνικά&quot;,&quot;locale&quot;:&quot;el&quot;},{&quot;locale_name&quot;:&quot;Français&quot;,&quot;locale&quot;:&quot;fr&quot;},{&quot;locale_name&quot;:&quot;Italiano&quot;,&quot;locale&quot;:&quot;it&quot;},{&quot;locale_name&quot;:&quot;Magyar&quot;,&quot;locale&quot;:&quot;hu&quot;},{&quot;locale_name&quot;:&quot;Nederlands&quot;,&quot;locale&quot;:&quot;nl&quot;},{&quot;locale_name&quot;:&quot;Norsk&quot;,&quot;locale&quot;:&quot;no&quot;},{&quot;locale_name&quot;:&quot;Polski&quot;,&quot;locale&quot;:&quot;pl&quot;},{&quot;locale_name&quot;:&quot;Português&quot;,&quot;locale&quot;:&quot;pt&quot;},{&quot;locale_name&quot;:&quot;Suomi&quot;,&quot;locale&quot;:&quot;fi&quot;},{&quot;locale_name&quot;:&quot;Svenska&quot;,&quot;locale&quot;:&quot;sv&quot;},{&quot;locale_name&quot;:&quot;Türkçe&quot;,&quot;locale&quot;:&quot;tr&quot;},{&quot;locale_name&quot;:&quot;Íslenska&quot;,&quot;locale&quot;:&quot;is&quot;},{&quot;locale_name&quot;:&quot;Čeština&quot;,&quot;locale&quot;:&quot;cs&quot;},{&quot;locale_name&quot;:&quot;Русский&quot;,&quot;locale&quot;:&quot;ru&quot;},{&quot;locale_name&quot;:&quot;ภาษาไทย&quot;,&quot;locale&quot;:&quot;th&quot;},{&quot;locale_name&quot;:&quot;中文 (简体)&quot;,&quot;locale&quot;:&quot;zh&quot;},{&quot;locale_name&quot;:&quot;中文 (繁體)&quot;,&quot;locale&quot;:&quot;zh-TW&quot;},{&quot;locale_name&quot;:&quot;日本語&quot;,&quot;locale&quot;:&quot;ja&quot;},{&quot;locale_name&quot;:&quot;한국어&quot;,&quot;locale&quot;:&quot;ko&quot;}]}}" id="_bootstrap-i18n-init">




<div id="gmap-preload" class="hide" style="position: relative; overflow: hidden; -webkit-transform: translateZ(0px); background-color: rgb(229, 227, 223);">
    <div class="gm-style" style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0;">
        <div style="position: absolute; left: 0px; top: 0px; overflow: hidden; width: 100%; height: 100%; z-index: 0; cursor: url(https://maps.gstatic.com/mapfiles/openhand_8_8.cur) 8 8, default;">
            <div style="position: absolute; left: 0px; top: 0px; z-index: 1; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);">
                <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                    <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                        <div style="position: absolute; left: 0px; top: 0px; z-index: 1;"></div>
                    </div>
                </div>
                <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div>
                <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div>
                <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"></div>
                <div style="position: absolute; z-index: 0;">
                    <div style="overflow: hidden;"></div>
                </div>
            </div>
            <div style="position: absolute; left: 0px; top: 0px; z-index: 2; width: 100%; height: 100%;"></div>
            <div style="position: absolute; left: 0px; top: 0px; z-index: 3; width: 100%; transform-origin: 0px 0px 0px; transform: matrix(1, 0, 0, 1, 0, 0);">
                <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div>
                <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div>
                <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"></div>
                <div style="-webkit-transform: translateZ(0px); position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>

<ul role="tooltip" class="tooltip tooltip-top-left dropdown-menu list-unstyled" data-trigger="#header-browse-trigger" aria-hidden="true" data-sticky="true">
    <li><a href="https://www.airbnb.com/wishlists/popular" class="link-reset menu-item">Popular</a></li>
    <li><a href="https://www.airbnb.com/wishlists/friends" class="link-reset menu-item">Friends</a></li>
    <li><a href="https://www.airbnb.com/locations" class="link-reset menu-item">Neighborhoods</a></li>
    <li class="groups hide"><a href="https://www.airbnb.com/groups" rel="nofollow" class="link-reset menu-item">Groups</a></li>
</ul>
<ul role="tooltip" class="tooltip tooltip-top-right dropdown-menu list-unstyled header-dropdown" data-trigger="#header-avatar-trigger" aria-hidden="true" data-sticky="true">
    <li><a href="https://www.airbnb.com/home/dashboard" rel="nofollow" class="link-reset menu-item">Dashboard</a></li>
    <li class="listings"> <a href="https://www.airbnb.com/rooms" rel="nofollow" class="link-reset menu-item"> <span class="singular" style="display: none;">Your Listing</span> <span class="plural">Your Listings</span> </a> </li>
    <li class="reservations" style="display: none;">
        <a href="https://www.airbnb.com/my_listings" rel="nofollow" class="link-reset menu-item">Your Reservations</a> </li>
    <li><a href="https://www.airbnb.com/trips/upcoming" rel="nofollow" class="link-reset menu-item">Your Trips</a></li>
    <li><a href="https://www.airbnb.com/wishlists/my" id="wishlists" class="link-reset menu-item">Wish Lists</a></li>
    <li class="groups"> <a href="https://www.airbnb.com/groups" rel="nofollow" class="link-reset menu-item">Groups</a> </li>
    <li> <a href="https://www.airbnb.com/invite?r=3" class="link-reset menu-item"> Invite Friends <span class="label label-pink label-new">New</span> </a> </li>
    <li><a href="https://www.airbnb.com/users/edit" rel="nofollow" class="link-reset menu-item">Edit Profile</a></li>
    <li><a href="https://www.airbnb.com/account" rel="nofollow" class="link-reset menu-item">Account</a></li>
    <li><a href="https://www.airbnb.com/logout" rel="nofollow" class="link-reset menu-item" id="header-logout">Log Out</a></li>
</ul>
<div role="tooltip" class="tooltip tooltip-top-right dropdown-menu help-dropdown" aria-hidden="true" data-trigger="#header-help-trigger" data-sticky="true">
    <ul class="list-layout">
        <li> <a href="https://www.airbnb.com/help?ref=help-dropdown" class="help-center-link menu-item"> Visit the Help Center » </a> </li>
        <li class="loading"></li>
        <li class="all_faqs hide"> <a href="https://www.airbnb.com/help?ref=help-dropdown" class="link-reset menu-item"> See all FAQs </a> </li>
    </ul>
</div>
<div id="fb-root" class=" fb_reset">
    <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
        <div></div>
    </div>

</div>

<div class="tooltip tooltip-top-middle" role="tooltip" aria-hidden="true">
    <p class="panel-body">Invite your friends to Airbnb and earn travel credit when they book a trip or host a guest.</p>
</div>
<div class="pac-container" style="display: none; width: 218px; position: absolute; left: 144px; top: 570px;"></div>
<span style="position: absolute; left: -999px; top: -999px; visibility: hidden; font-size: 300px; width: auto; height: auto; margin: 0px; padding: 0px; font-family: Roboto, Arial, sans-serif;">BESbewy</span>

<link rel="stylesheet" href="css/SlickNav/slicknav.css" media="screen and (max-width: 991px)"/>
<script type="text/javascript" src="css/SlickNav/jquery.slicknav.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jssor.slider.mini.js"></script>
<script src="js/resolve.js"></script>
</body>
</html>	