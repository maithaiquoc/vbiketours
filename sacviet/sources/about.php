<?php	if(!defined('_source')) die("Error");



$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";



switch($act){

case "delete_video":



		delete_item();



		break;

	case "capnhat":



		get_gioithieu();



		$template = "about/item_add";



		break;

case "video":



		get_video();



		$template = "about/item_video_add";



		break;

case "add":		



		$template = "about/item_video_add";



		break;

case "save_item":



		save_item();



		break;

	case "save":



		save_gioithieu();



		break;







		



	default:



		$template = "index";



}





function save_item(){



	global $d;	

	$file_name=fns_Rand_digit(0,9,8);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=about&act=capnhat");

	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";



if($_POST['ten_vi'] == ''){

transfer("Hãy nhập tên video.", "index.php?com=about&act=add");

}



	if($id){



		$id =  themdau($_POST['id']);		
$_POST['bylink'] = "on";
		if($_POST['bylink'] != "on"){

		if($photo = upload_image("filevideo", 'flv|mp4|avi', _upload_video,$file_name)){



			$data['link'] = _upload_video_l.$photo;		$data['bylink'] = 0;	



			$d->setTable('video_gioithieu');



			$d->setWhere('id', $id);



			$d->select();



			if($d->num_rows()>0){



				$row = $d->fetch_array();



				delete_file(_upload_video.$row['link']);	



			}



		}	

}

else

{

$d->setTable('video_gioithieu');

			$d->setWhere('id', $id);

			$d->select();

			if($d->num_rows()>0){

				$row = $d->fetch_array();

				delete_file(_upload_video.$row['link']);	

			}

$data['link'] = $_POST['txtbylink'];

$data['bylink'] = 1;	

}

				



		$data['ten_vi'] = $_POST['ten_vi'];



		$data['ten_en'] = $_POST['ten_en'];



		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);		



		$data['stt'] = $_POST['stt'];



		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;



		$data['ngaysua'] = time();		



		$d->setTable('video_gioithieu');



		$d->setWhere('id', $id);



		if($d->update($data))				



				redirect("index.php?com=about&act=capnhat");



		else



			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=about&act=capnhat");



	}else{
$_POST['bylink'] = "on";
if($_POST['bylink'] != "on"){$data['bylink'] = 0;	

		if($photo = upload_image("filevideo", 'flv|mp4|avi', _upload_video,$file_name)){



			$data['link'] = _upload_video_l.$photo;					



		}}

else{

$data['link'] = $_POST['txtbylink'];

$data['bylink'] = 1;

}



		$data['ten_vi'] = $_POST['ten_vi'];



		$data['ten_en'] = $_POST['ten_en'];



		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);		



		$data['stt'] = $_POST['stt'];



		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;



		$data['ngaytao'] = time();



		



		$d->setTable('video_gioithieu');



		if($d->insert($data))



			redirect("index.php?com=about&act=capnhat");



		else



			transfer("Lưu dữ liệu bị lỗi", "index.php?com=about&act=capnhat");



	}



}



function get_video()

{

global $d, $item;



	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";



	if(!$id)



		transfer("Không nhận được dữ liệu", "index.php?com=about&act=capnhat");



	



	$sql = "select * from #_video_gioithieu where id='".$id."'";



	$d->query($sql);



	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=about&act=capnhat");



	$item = $d->fetch_array();

}



function fns_Rand_digit($min,$max,$num)



	{



		$result='';



		for($i=0;$i<$num;$i++){



			$result.=rand($min,$max);



		}



		return $result;	



	}







function get_gioithieu(){



	global $d, $item,$items;





if(@$_REQUEST['hienthi']!='')



	{



	$id_up = @$_REQUEST['hienthi'];



	$sql_sp = "SELECT id,hienthi FROM table_video_gioithieu where id='".$id_up."' ";



	$d->query($sql_sp);



	$cats= $d->result_array();



	$hienthi=$cats[0]['hienthi'];



	//echo "id:". $spdc1;



	if($hienthi==0)



	{



	$sqlUPDATE_ORDER = "UPDATE table_video_gioithieu SET hienthi =1 WHERE  id = ".$id_up."";



	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");



	}



	else



	{



	$sqlUPDATE_ORDER = "UPDATE table_video_gioithieu SET hienthi =0  WHERE  id = ".$id_up."";



	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");







	}	



	}





	$sql = "select * from #_about limit 0,1";



	$d->query($sql);



	if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");



	$item = $d->fetch_array();







$sql_video = "select * from #_video_gioithieu";

$sql_video.=" order by id desc";

$d->query($sql_video);

$items = $d->result_array();

$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

$url="index.php?com=about&act=capnhat";

$maxR=5;



	$maxP=4;



	$paging=paging($items, $url, $curPage, $maxR, $maxP);



	$items=$paging['source'];



}







function save_gioithieu(){



	global $d;



	$file_name=fns_Rand_digit(0,9,5);



	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=about&act=capnhat");			



		$id =  themdau($_POST['id']);

		

		if($photo = upload_image("file", 'jpg|png|gif',_upload_about,$file_name)){

			$data['photo'] = $photo;

			$data['thumb'] = create_thumb($data['photo'], 120,80, _upload_about,$file_name);

			$d->setTable('about');

			$d->setWhere('id', $id);

			$d->select();

			if($d->num_rows()>0){

				$row = $d->fetch_array();

				delete_file(_upload_about.$row['photo']);

				delete_file(_upload_about.$row['thumb']);

			}

		}	

	$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);



	$data['noidung_en'] = magic_quote($_POST['noidung_en']);

$data['noidung_end_vi'] = magic_quote($_POST['noidung_end_vi']);



	$data['noidung_end_en'] = magic_quote($_POST['noidung_end_en']);

	$d->reset();



	$d->setTable('about');



	if($d->update($data))



		transfer("Dữ liệu được cập nhật", "index.php?com=about&act=capnhat");



	else



		transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=about&act=capnhat");



}





function delete_item(){



	global $d;



	if(isset($_GET['id'])){



		$id =  themdau($_GET['id']);		



		$d->reset();		



		$d->reset();



		$sql = "select * from #_video_gioithieu where id='".$id."'";



		$d->query($sql);



		if($d->num_rows()>0){



			while($row = $d->fetch_array()){

				delete_file(_upload_video.$row['link']);

			}



			$sql = "delete from #_video_gioithieu where id='".$id."'";



			$d->query($sql);



		}	



		if($d->query($sql))



			redirect("index.php?com=about&act=capnhat");



		else



			transfer("Xóa dữ liệu bị lỗi", "index.php?com=about&act=capnhat");



	}else transfer("Không nhận được dữ liệu", "index.php?com=about&act=capnhat");



}



?>