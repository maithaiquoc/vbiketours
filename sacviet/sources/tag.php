<?php	if(!defined('_source')) die("Error");







$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";







switch($act){



	case "man":



		get_items();



		$template = "tag/items";



		break;



	case "add":



		$template = "tag/item_add";



		break;



	case "edit":



		get_item();



		$template = "tag/item_add";



		break;



	case "save":



		save_item();



		break;



	case "delete":



		delete_item();



		break;	



	default:



		$template = "index";



}









function get_items(){



	global $d, $items, $paging;



	



	$sql = "select * from #_tags";	



if(isset($_GET['keyword'])) $sql.=" where ten_vi like '%$_GET[keyword]%' or ten_en like '%$_GET[keyword]%'";



	$sql.=" order by id desc";

	

	$d->query($sql);

	

	$items = $d->result_array();	



	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;



	$url="index.php?com=tag&act=man";



	$maxR=10;



	$maxP=4;



	$paging=paging($items, $url, $curPage, $maxR, $maxP);



	$items=$paging['source'];







}



function get_item(){



	global $d, $item, $list_cat;



	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";



	if(!$id)



		transfer("Không nhận được dữ liệu", "index.php?com=tag&act=man");



	



	$d->setTable('tags');	



	$d->setWhere('id', $id);



	$d->select();



	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tag&act=man");



	$item = $d->fetch_array();



	$d->reset();



}



function save_item(){



	global $d;

	



	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tag&act=man");

	



	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";



	if($id){ // cap nhat


$id =  themdau($_POST['id']);


			$data['ten_vi'] = $_POST['ten_vi'];			

            $data['ten_en'] = $_POST['ten_en'];



			$d->reset();



			$d->setTable('tags');



			$d->setWhere('id', $id);



			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tag&act=man");



			header("Location:index.php?com=tag&act=man");



	}else{ // them moi

	



			$data['ten_vi'] = $_POST['ten_vi'];			

            $data['ten_en'] = $_POST['ten_en'];

						$d->setTable('tags');



						if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=tag&act=man");



			header("Location:index.php?com=tag&act=man");



		



	}



}











function delete_item(){



	global $d;



	



	if(isset($_GET['id'])){



		$id =  themdau($_GET['id']);



		$d->setTable('tags');



		$d->setWhere('id', $id);



		$d->select();



		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tag&act=man");



		$row = $d->fetch_array();		



		if($d->delete())



			header("Location:index.php?com=tag&act=man");



		else



			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tag&act=man");



	}else transfer("Không nhận được dữ liệu", "index.php?com=tag&act=man");



}







?>







	



