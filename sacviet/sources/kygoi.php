<?php	if(!defined('_source')) die("Error");



$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";



switch($act){

	case "man":
		get_items();
		$template = "kygoi/items";
		break;
case "edit":
		get_item();
		$template = "kygoi/item_add";
		break;
case "approve_edit":
		approve_edit_item();
		break;
	case "approve":
		approve_item();
		break;
	case "delete":
		delete_item();
		break;	
	default:
		$template = "index";

}

function approve_item(){
global $d;	
	$id = isset($_REQUEST['id']) ? themdau($_REQUEST['id']) : "";	
	if($id){
		$id =  themdau($_REQUEST['id']);
		$data['duyet'] = 1;
		$d->setTable('kygui');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=kygoi&act=man&curPage=".@$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=kygoi&act=man");

	}
}
function approve_edit_item() {
global $d;	
	$id = isset($_REQUEST['id']) ? themdau($_REQUEST['id']) : "";	
	if($id){
		$id =  themdau($_REQUEST['id']);
		$data['duyet'] = 1;
		$d->setTable('kygui');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=kygoi&act=edit&id=".$id."&curPage=".@$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=kygoi&act=man");

	}
}


function delete_item(){
global $d;

	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
$d->reset();
$sql = "select id from #_kygui where id='".$id."'";
$d->query($sql);
		if($d->num_rows()>0){
$sql = "delete from #_kygui where id='".$id."'";
$d->reset();
$d->query($sql);
if($d->query($sql))
			redirect("index.php?com=kygoi&act=man&curPage=".@$_REQUEST['curPage']."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=kygoi&act=man&curPage=".@$_REQUEST['curPage']."");
}
else
transfer("Không nhận được dữ liệu", "index.php?com=kygoi&act=man");
	}
}

function get_item(){
global $d, $item,$ds_tags;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=kygoi&act=man&curPage=".@$_REQUEST['curPage']."");	

	$sql = "select * from #_kygui where id='".$id."'";

	$d->query($sql);

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=kygoi&act=man&curPage=".@$_REQUEST['curPage']."");

	$item = $d->fetch_array();	
}


function get_items(){

	global $d, $items, $paging;

	$sql = "select * from #_kygui ";

	if(isset($_GET['keyword'])) $sql.=" where ten like '%$_GET[keyword]%' or tensp like '%$_GET[keyword]%'";

	$sql.=" order by id desc";

	

	$d->query($sql);

	$items = $d->result_array();

	

	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

	$url="index.php?com=kygoi&act=man";

	$maxR=5;

	$maxP=20;

	$paging=paging($items, $url, $curPage, $maxR, $maxP);

	$items=$paging['source'];

}



?>



	