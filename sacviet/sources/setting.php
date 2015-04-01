<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "setting/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}

function get_gioithieu(){
	global $d, $item;

	$sql = "select * from #_setting limit 0,1";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_gioithieu(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
		
	$data['title_vi'] = $_POST['title_vi'];
	$data['title_en'] = $_POST['title_en'];
	$data['keywords'] = $_POST['keywords'];
	$data['description'] = $_POST['description'];
	$data['hotline'] = $_POST['hotline'];
	$data['website'] = $_POST['website'];
	/*$data['hotline1'] = $_POST['hotline1'];
	$data['hotline2'] = $_POST['hotline2'];
	$data['tennv'] = $_POST['tennv'];
	$data['tennv1'] = $_POST['tennv1'];
	$data['tennv2'] = $_POST['tennv2'];*/
	$data['ten_vi'] = $_POST['ten_vi'];
	$data['ten_en'] = $_POST['ten_en'];
	$data['dienthoai'] = $_POST['dienthoai'];
	$data['diachi_vi'] = $_POST['diachi_vi'];
	$data['diachi_en'] = $_POST['diachi_en'];
$data['phivanchuyen'] = $_POST['phivanchuyen'];
	//$data['toado'] = $_POST['toado'];
	$data['email'] = $_POST['email'];
	$data['kygoi_vi'] = $_POST['kygoiVN'];
	$data['kygoi_en'] = $_POST['kygoiEN'];

$data['facebook_link'] = $_POST['facebook_link'];
	$data['twitter_link'] = $_POST['twitter_link'];
	$data['linkedin_link'] = $_POST['linkedin_link'];
	$data['googleplus_link'] = $_POST['googleplus_link'];
	$d->reset();
	$d->setTable('setting');
	if($d->update($data))
		header("Location:index.php?com=setting&act=capnhat");
	else
		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=setting&act=capnhat");
}

?>