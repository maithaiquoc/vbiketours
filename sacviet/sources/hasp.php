<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_photo":
		get_photos();
		$template = "hasp/photos";
		break;
	case "add_photo":
		$template = "hasp/photo_add";
		break;
	case "edit_photo":
		get_photo();
		$template = "hasp/photo_edit";
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
	
	$d->setTable('hasp');
	$d->setWhere('com', 'hasp');
	$d->setWhere('id_photo', $_REQUEST['idc']);
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=hasp&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}

function get_photo(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=hasp&act=man_photo");
	
	$d->setTable('hasp');
	$d->setWhere('com', 'hasp');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=hasp&act=man_photo");
	$item = $d->fetch_array();
	$d->reset();
}

function save_photo(){
	global $d;
	$file_name=fns_Rand_digit(0,9,10);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=hasp&act=man_photo");
	
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'jpg|png|gif|JPG|GIF|PNG|JPEG', _upload_duan,$file_name)){
				$data['photo'] = $photo;	
				$data['thumb'] = create_thumb($data['photo'], 200, 170, _upload_duan,$file_name,1);	
				$d->setTable('hasp');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_duan.$row['photo']);
					delete_file(_upload_duan.$row['thumb']);	
				}
			}
			$data['id'] = $_REQUEST['id'];
			$data['mota'] = $_POST['mota'];
			$data['stt'] = $_POST['stt'];
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['com'] = 'hasp';
			$d->reset();
			$d->setTable('hasp');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=hasp&act=man_photo");
			redirect("index.php?com=hasp&act=man_photo&idc=".$_REQUEST['idc']."");
			
	}{ // them moi
		
			for($i=0; $i<5; $i++){
				if($data['photo'] = upload_image("file".$i, 'jpg|png|gif|JPG|GIF|PNG|JPEG', _upload_duan,$file_name.$i))
					{
						
					$data['thumb'] = create_thumb($data['photo'], 200, 170, _upload_duan,$file_name.$i,1);		
			
						$data['mota'] = "mota :".$i;
						$data['stt'] = $_POST['stt'.$i];
						$data['mota'] = $_POST['mota'.$i];
						$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
						$data['com'] = 'hasp';
						$data['id_photo'] = $_REQUEST['idc'];
						$d->setTable('hasp');
						if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=hasp&act=man_photo");
					}
			}
			redirect("index.php?com=hasp&act=man_photo&idc=".$_REQUEST['idc']."");
	}
}

function delete_photo(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('hasp');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=hasp&act=man_photo");
		$row = $d->fetch_array();
		delete_file(_upload_duan.$row['photo']);
		delete_file(_upload_duan.$row['thumb']);
		if($d->delete())
		
			redirect("index.php?com=hasp&act=man_photo&idc=".$_REQUEST['idc']."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=hasp&act=man_photo");
	}else transfer("Không nhận được dữ liệu", "index.php?com=hasp&act=man_photo");
}

?>

	
