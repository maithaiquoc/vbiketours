<?php

	session_start();

	error_reporting(0);

	@define ( '_template' , './templates/');

	@define ( '_source' , './sources/');

	@define ( '_lib' , './lib/');



	include_once _lib."config.php";

	include_once _lib."constant.php";

	include_once _lib."functions.php";

	include_once _lib."library.php";

	include_once _lib."class.database.php";	

	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";

	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

	$login_name = 'AMTECOL';

	

	$d = new database($config['database']);

	

	switch($com){

case 'tag':

			$source = "tag";

			break;

		case 'order':

			$source = "donhang";

			break;

case 'kygoi':

			$source = "kygoi";

			break;

		case 'tuvan':

			$source = "tuvan";

			break;

		case 'download':

			$source = "download";

			break;

		case 'datphong':

			$source = "datphong";

			break;

		case 'khachsan':

			$source = "khachsan";

			break;

		case 'nhahang':

			$source = "nhahang";

			break;

		case 'bosuutap':

			$source = "duan";

			break;

		case 'hasp':

			$source = "hasp";

			break;

		case 'tour':

			$source = "tour";

			break;

		case 'about':

			$source = "about";

			break;

		case 'dichvu':

			$source = "dichvu";

			break;

		case 'blog':

			$source = "blog";

			break;

		case 'khuyenmai':

			$source = "khuyenmai";

			break;

		case 'aboutlist':

			$source = "aboutlist";

			break;	

		case 'nhansu':

			$source = "nhansu";

			break;

		case 'khachhang':

			$source = "khachhang";

			break;

		case 'chinhsach':

			$source = "tuyendung";

			break;

		case 'hoso':

			$source = "hoso";

			break;

		

		case 'user':

			$source = "user";

			break;

		case 'careers':

			$source = "careers";

			break;

		

		case 'slider':

			$source = "slider";

			break;	

		case 'footer':

			$source = "footer";

			break;		

		case 'video':

			$source = "video";

			break;

		case 'title':

			$source = "title";

			break;

			

		case 'news':

			$source = "tintuc";

			break;

			

		case 'meta':

			$source = "meta";

			break;



		case 'company':

			$source = "company";

			break;

		case 'lkweb':

			$source = "lkweb";

			break;

		case 'bannerqc':

			$source = "bannerqc";

			break;

		case 'img':

			$source = "hinhanh";

			break;

	

		case 'careers':

			$source = "Careers";

			break;

		case 'khuyenmai':

			$source = "khuyenmai";

			break;

		case 'quangcao':

			$source = "quangcao";

			break;

			

		case 'quangcaobody':

			$source = "quangcaobody";

			break;

			

		case 'lienket':

			$source = "lienket";

			break;

		case 'product':

			$source = "product";

			break;

		case 'product1':

			$source = "product1";

			break;

			

		case 'yahoo':

			$source = "yahoo";

			break;

			case 'hotro':

			$source = "hotro";

			break;

		case 'doitac':

			$source = "doitac";

			break;



		case 'contact':

			$source = "contact";

			break;

		

		case 'hotline':

			$source = "hotline";

			break;

		case 'service':

			$source = "service";

			break;

		case 'setting':

			$source = "setting";

			break;

		case 'lienhe':

			$source = "lienhe";

			break;

			

		default: 

			$source = "";

			$template = "index";

			break;

	}

	

	if((!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false) && $act!="login"){

		redirect("index.php?com=user&act=login");

	}

	

	if($source!="") include _source.$source.".php";

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"

"http://www.w3.org/TR/html4/DTD/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Website Administration</title>

<link href="media/css/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>

<!-- TinyMCE -->

<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>

<!-- /TinyMCE -->

</head>



<body>



<?php if(isset($_SESSION[$login_name]) && ($_SESSION[$login_name] == true)){?>  

<div id="wrapper">

	<?php include _template."header_tpl.php"?>

    

    <div id="main"> 

		 

        <!-- Right col -->

        <div id="contentwrapper">

        <div id="content">

          <?php include _template.$template."_tpl.php"?>

        </div>

        </div>

        <!-- End right col -->

        

        <!-- Left col -->

        <div id="leftcol">

          <div class="innertube">

           <?php include _template."menu_tpl.php";?>

          </div>

        </div>

        <!-- End Left col -->

		

			<div class="clr"></div>

    </div>

  <div id="footer">

		<?php include _template."footer_tpl.php"?>

	</div>

</div>

<?php }else{?>   

				<?php include _template.$template."_tpl.php"?>

		<?php }?>

</body>

</html>

