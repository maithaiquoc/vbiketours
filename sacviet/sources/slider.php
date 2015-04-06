<?php	if(!defined('_source')) die("Error");







$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";







switch($act){



	case "man_photo":



		get_photos();



		$template = "slider/photos";



		break;



	case "add_photo":



		$template = "slider/photo_add";



		break;



	case "edit_photo":



		get_photo();



		$template = "slider/photo_edit";



		break;



	case "save_photo":



		save_photo();



		break;



	case "delete_photo":



		delete_photo();



		break;



		



	default:



		$template = "index";



}







function fns_Rand_digit($min,$max,$num)



	{



		$result='';



		for($i=0;$i<$num;$i++){



			$result.=rand($min,$max);



		}



		return $result;	



	}



function get_photos(){



	global $d, $items, $paging;



	



	$d->setTable('slider');



	$d->setWhere('com', 'slider');



	$d->setOrder('stt,id desc');



	$d->select('*');



	$d->query();



	$items = $d->result_array();



	



	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;



	$url="index.php?com=slider&act=man_photo";



	$maxR=10;



	$maxP=4;



	$paging=paging($items, $url, $curPage, $maxR, $maxP);



	$items=$paging['source'];







}



function get_photo(){



	global $d, $item, $list_cat;



	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";



	if(!$id)



		transfer("Không nhận được dữ liệu", "index.php?com=slider&act=man_photo");



	



	$d->setTable('slider');



	$d->setWhere('com', 'slider');



	$d->setWhere('id', $id);



	$d->select();



	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=slider&act=man_photo");



	$item = $d->fetch_array();



	$d->reset();



}



function save_photo(){



	global $d;



	$file_name=fns_Rand_digit(0,9,6);



	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=slider&act=man_photo");



	



	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";



	if($id){ // cap nhat



		



			if($photo = upload_image("file", 'swf|jpg|gif|png|SWF|JPG|GIF|PNG', _upload_hinhanh,$file_name)){



				$data['photo'] = $photo;				



				$d->setTable('slider');



				$d->setWhere('id', $id);



				$d->select();



				if($d->num_rows()>0){



					$row = $d->fetch_array();



					delete_file(_upload_hinhanh.$row['photo']);				



				}



			}



			$data['id'] = $_REQUEST['id'];



			$data['stt'] = $_POST['stt'];



			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;



			//$data['com'] = 'slider';



			$data['link'] = $_POST['link'];



			$data['vitri'] = $_POST['stt'];







			$d->reset();



			$d->setTable('slider');



			$d->setWhere('id', $id);



			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=slider&act=man_photo");



			header("Location:index.php?com=slider&act=man_photo");



	}{ // them moi



		



			for($i=0; $i<5; $i++){



				if($photo = upload_image("file".$i, 'swf|jpg|gif|png|SWF|JPG|GIF|PNG', _upload_hinhanh,$file_name.$i))



					{



						$data['photo'] = $photo;					



							



						$data['link'] = "link :".$i;



						$data['stt'] = $_POST['stt'.$i];



						$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;



						$data['com'] = 'slider';



						$data['link'] = $_POST['link'.$i];



						$data['vitri'] = $_POST['stt'.$i];







						//$data['id_photo'] = $_REQUEST['idc'];



						



						$d->setTable('slider');



						if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=slider&act=man_photo");



					}



			}



			header("Location:index.php?com=slider&act=man_photo");



		



	}



}











function delete_photo(){



	global $d;



	



	if(isset($_GET['id'])){



		$id =  themdau($_GET['id']);



		//$d->setTable('slider');

$d->setTable('slider');

		$d->setWhere('id', $id);



		$d->select();



		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=slider&act=man_photo");



		$row = $d->fetch_array();



		delete_file(_upload_hinhanh.$row['photo']);	



		if($d->delete())



		



			header("Location:index.php?com=slider&act=man_photo");



		else



			transfer("Xóa dữ liệu bị lỗi", "index.php?com=slider&act=man_photo");



	}else transfer("Không nhận được dữ liệu", "index.php?com=slider&act=man_photo");



}







?>







	
