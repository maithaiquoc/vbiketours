<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){

		
	case "man":
		get_items();
		$template = "service/item";
		break;
	case "add":
		$template = "service/item_add";
		break;
	case "edit":
		get_item();
		$template = "service/item_add";
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

#====================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}
#====================================
function get_items(){
	global $d, $items, $paging;
	
	$sql = "select * from #_service order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=service&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=service&act=man");
	
	$sql = "select * from #_service where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=service&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,8);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=service&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		
		if($photo = upload_image("file", 'jpg|png|gif',_upload_tintuc,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 120, 80, _upload_tintuc,$file_name);
			$d->setTable('service');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tintuc.$row['photo']);
				delete_file(_upload_tintuc.$row['thumb']);
			}
		}	
		if($filepdf = upload_image("filepdf", 'pdf|PDF|rar|RAR|zip|Zip|doc|docx', _upload_download,$file_name)){
			$data['file'] = $filepdf;				
			$d->setTable('service');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_download.$row['file']);					
			}
		}	
			
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['link'] = $_POST['link'];
		$data['mota_en'] = $_POST['mota_en'];
		$data['noidung_vi'] = $_POST['noidung_vi'];
		$data['noidung_en'] = $_POST['noidung_en'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('service');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=service&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=service&act=man");
	}else{
		
		if($photo = upload_image("file", 'jpg|png|gif',_upload_tintuc,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 120, 80, _upload_tintuc,$file_name);
		}
		if($filepdf = upload_image("filepdf", 'pdf|PDF|rar|RAR|zip|Zip|doc|docx', _upload_download,$file_name)){
			$data['file'] = $filepdf;							
		}			
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['mota_vi'] = magic_quote($_POST['mota_vi']);
		$data['link'] = magic_quote($_POST['link']);
		$data['mota_en'] = $_POST['mota_en'];
		$data['noidung_vi'] = $_POST['noidung_vi'];
		$data['noidung_en'] = $_POST['noidung_en'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('service');
		if($d->insert($data))
			redirect("index.php?com=service&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=service&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_service where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_tintuc.$row['photo']);
				delete_file(_upload_tintuc.$row['thumb']);
			}
			$sql = "delete from #_service where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=service&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=service&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=service&act=man");
}


?>