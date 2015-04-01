<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "dichvu/items";
		break;
	case "add":
		$template = "dichvu/item_add";
		break;
	case "edit":		
		get_item();		
		$template = "dichvu/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_cat":
		get_cats();
		$template = "dichvu/cats";
		break;
	case "add_cat":
		$template = "dichvu/cat_add";
		break;
	case "edit_cat":
		get_cat();
		$template = "dichvu/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	default:
		$template = "index";

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


function get_items(){
	global $d, $items, $paging;
	
	if(@$_REQUEST['update']!='')
	{
	$id_up = @$_REQUEST['update'];
	
	$tinnoibat=time();
	
	$sql_sp = "SELECT id,tinnoibat FROM table_dichvu where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['tinnoibat'];
	//echo "id:". $spdc1;
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_dichvu SET tinnoibat ='".$tinnoibat."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_dichvu SET tinnoibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_dichvu where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_dichvu SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_dichvu SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	$sql = "select * from #_dichvu ";
	if(@(int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where  	idlt=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=dichvu&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man");
	
	$sql = "select * from #_dichvu where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=dichvu&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,8);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		
		if($photo = upload_image("file", 'jpg|png|gif',_upload_dichvu,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 120,80, _upload_dichvu,$file_name);
			$d->setTable('dichvu');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_dichvu.$row['photo']);
				delete_file(_upload_dichvu.$row['thumb']);
			}
		}				$data['id_item'] = $_POST['id_item'];
		$data['ten_vi'] = magic_quote($_POST['ten_vi']);
		$data['ten_en'] = magic_quote($_POST['ten_en']);
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['mota_vi'] = magic_quote($_POST['mota_vi']);
		$data['mota_en'] = magic_quote($_POST['mota_en']);
		$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
		$data['noidung_en'] = magic_quote($_POST['noidung_en']);
		$data['stt'] = $_POST['stt'];
		$data['meovat'] = isset($_POST['meovat']) ? 1 : 0;
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('dichvu');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=dichvu&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=dichvu&act=man");
	}else{
		
		if($photo = upload_image("file", 'jpg|png|gif',_upload_dichvu,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 120,80, _upload_dichvu,$file_name);
		}				$data['id_item'] = $_POST['id_item'];
		$data['ten_vi'] = magic_quote($_POST['ten_vi']);
		$data['ten_en'] = magic_quote($_POST['ten_en']);
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['mota_vi'] = magic_quote($_POST['mota_vi']);
		$data['mota_en'] = magic_quote($_POST['mota_en']);
		$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
		$data['noidung_en'] = magic_quote($_POST['noidung_en']);
		$data['stt'] = $_POST['stt'];
		$data['meovat'] = isset($_POST['meovat']) ? 1 : 0;
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('dichvu');
		if($d->insert($data))
			redirect("index.php?com=dichvu&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=dichvu&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_dichvu where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_dichvu.$row['photo']);
				delete_file(_upload_dichvu.$row['thumb']);
			}
			$sql = "delete from #_dichvu where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=dichvu&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=dichvu&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man");
}
//===========================================================
function get_cats(){
	global $d, $items, $paging;
	$sql = "select * from #_dichvu_item order by stt";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=dichvu&act=man_cat";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man_cat");
	
	$sql = "select * from #_dichvu_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=dichvu&act=man_cat");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$file_name_item=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		//$data['id_cat'] = (int)$_POST['id_cat'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		$data['ngaysua'] =time();	
		$d->setTable('dichvu_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=dichvu&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=dichvu&act=man_cat");
	}else{
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];	
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		$data['ngaytao'] =time();	
		
		$d->setTable('dichvu_item');
		if($d->insert($data))
			redirect("index.php?com=dichvu&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=dichvu&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();		
		$sql = "delete from #_dichvu_item where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=dichvu&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=dichvu&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=dichvu&act=man_cat");
}
?>