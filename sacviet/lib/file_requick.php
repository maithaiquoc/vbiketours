<?php







	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";







	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";







	$d = new database($config['database']);







	switch($com){







		case 'langs':







			if(isset($_GET['lang'])){







				switch($_GET['lang']){







					case 'vi':







						$_SESSION['lang']='vi';







						break;







					case 'en':







						$_SESSION['lang']='en';







						break;







					default :







						$_SESSION['lang']='vi';







						break;







					}







				}else{







					$_SESSION['lang']='vi';







				}







				if(@$_GET['loai']=='intro'){







					echo '<script type="text/javascript">







							window.location = "index.html";







						</script>';







				}else{







						echo '<script type="text/javascript">history.go(-1)</script>';







				}







			break;







		case 'khach-san':

			$source = "khachsan";

			$template =isset($_GET['id']) ? "khachsan_detail" : "khachsan";

			break;

			case 'email':
			$source = "Email";
			$template = "Email";
			break;
			case 'testimonials':
			$source = "testimonials";
			$template = "testimonials";
			break;			
			case 'link':
			$source = "link";
			$template = "link";
			break;			
			case 'press':
			$source = "press";
			$template = "press";
			break;



case 'tag':







			$source = "timkiemtag";







			$template = "timkiemtag";







			break;







		case 'hoi-dap':
			$source = "hoidap";
			$template ="hoidap";
			break;

		case 'booking-now':
			$source = "booking";
			$template ="booking";
			break;


			case 'orders':

			$template ="orders";

			break;



			case 'faq':







			$source = "hotro";







			$template ="hotro";







			break;

case 'news':







			$source = "blog";







			$template =isset($_GET['id']) ? "blog_detail" : "blog";







			break;



		case 'thong-tin':







			$source = "thongtin";







			$template ="thongtin";







			break;

case 'thay-doi-thong-tin':

			$template ="thaydoithongtin";

			break;



			case 'doi-mat-khau':







			$source = "doimatkhau";







			$template ="doimatkhau";







			break;



		



			case 'don-hang-user':







			$source = "donhanguser";







			$template ="donhanguser";







			break;



			case 'ky-gui':



			$source = "kygui";



			$template = "kygui";



			break;







		case 'gio-hang':







			$source = "giohang";







			$template = "giohang";







			break;	



			



			



			case 'login':







			$source = "login";







			$template = "login";







			break;	











		case 'thanh-toan':







			$source = "thanhtoan";







			$template = "thanhtoan";







			break;	



			



			



			



			case 'thanhvien':







			$source = "register";







			$template ="register";







			break;



			







		case 'khuyen-mai':







			$source = "khuyenmai";







			$template = isset($_GET['id']) ? "khuyenmai_detail" : "khuyenmai";







			break;







		case 'tour':







			$source = "product";







			$template = isset($_GET['id']) ? "product_detail" : "product";







			break;







			







		case 'photos':







			$source = "duan";







			$template = isset($_GET['id']) ? "duan_detail" : "duan";







			break;







	







		case 'cat1':







			$source = "cat1";







			$template ="cat1";







			break;







		case 'cat2':







			$source = "cat2";







			$template ="cat2";







			break;







		case 'cat3':







			$source = "cat3";







			$template ="cat3";







			break;







			







		case 'about-us':







			$source = "about";







			$template = "about";







			break;







		







		case 'ban-do':







			$source = "map";







			$template = "map";







			break;







		







		case 'tin':







			$source = "news";







			$template =isset($_GET['id']) ? "news_detail" : "news";







			break;







		







		case 'mau-thiet-ke':







			$source = "news";







			$template =isset($_GET['id']) ? "news_detail" : "news";







			break;







								







		case 'contact':







			$source = "contact";







			$template = "contact";







			break;







		







		case 'tim-kiem':







			$source = "timkiem";







			$template = "timkiem";







			break;







		case 'dich-vu':







			$source = "dichvu";







			$template =isset($_GET['id']) ? "dichvu_detail" : "dichvu";







			break;







		case 'gallery':







			$source = "video";







			$template = "video";







			break;	







		case 'chinh-sach':







			$source = "tuyendung";







			$template ="tuyendung";







			break;	



	case 'thanh-toan-hoan-tat':







			$source = "successbuy";







			$template ="successbuy";







			break;	

case 'saleoff':

			$source = "index";

			$template ="saleoff";

			break;	






		default: 
			$source = "index";
			$template = "index";
			break;







	}







	







	if($source!="") include _source.$source.".php";







	







	if(@$_REQUEST['com']=='logout')







	{







	session_unregister($login_name);







	header("Location:index.php");







	}













?>