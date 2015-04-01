<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
@$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "datphong/items";
		break;
	case "add":		
		$template = "datphong/item_add";
		break;
	case "edit":		
		get_item();
		$template = "datphong/item_add";
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

function get_items(){
	global $d, $items, $paging;	
		
	#-------------------------------------------------------------------------------
	$sql = "select * from #_datphong where loaiphong>0 ";	
	if(isset($_GET['keyword'])) $sql.=" and ten_vi like '%$_GET[keyword]%' or tenkhongdau like '%$_GET[keyword]%'";
	$sql.=" order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=datphong&act=man";
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item,$ds_tags;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=datphong&act=man");	
	$sql = "select * from #_datphong where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=datphong&act=man");
	$item = $d->fetch_array();	
}


function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "delete from #_datphong where id='".$id."'";
		$d->query($sql);
		if($d->query($sql))
			redirect("index.php?com=datphong&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=datphong&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=datphong&act=man");
}


?>