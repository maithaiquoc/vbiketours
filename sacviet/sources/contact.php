<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "contact/items";
		break;
	case "add":
get_item();
		$template = "contact/item_add";
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
	$sql = "select * from #_contact ";
        if(isset($_GET['keyword'])) $sql.=" where ten like '%$_GET[keyword]%' or email like '%$_GET[keyword]%' or noidung like '%$_GET[keyword]%'";
        $sql .= " order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=contact&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=contact&act=man");
	
	$sql = "select * from #_contact where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=contact&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;

$d->reset();

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=contact&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
$email =  themdau($_POST['email']);
$ten =  themdau($_POST['ten']);
$data_send = $_POST['traloi'];
		$data['noidungtraloi'] = $_POST['traloi'];	
		$data['traloi'] = 1;	
		$d->setTable('contact');
		$d->setWhere('id', $id);
		if($d->update($data)){

$body = '<table><tr align="left"><th>Họ tên :</th><td>'.$_POST['ten'].'</td></tr><tr align="left"><th>Email :</th><td>'.$_POST['email'].'</td></tr><tr align="left"><th>Thông tin liên quan :</th><td>'.$_POST['lienquan'].'</td></tr><tr align="left"><th>Nội dung :</th><td>'.$_POST['noidung'].'</td></tr><tr align="left"><th>Trã lời :</th><td>'.$_POST['traloi'].'</td></tr></table>';
$subject = "THÔNG TIN PHẢN HỒI";
$guitoi = $email;
$guitoi_ten = $ten;
include_once _lib."content_mail.php";
$mail->MsgHTML($body);
$mail->Send();
	


				redirect("index.php?com=contact&act=man");
}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=contact&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "delete from #_contact where id='".$id."'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=contact&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=contact&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=contact&act=man");
}
?>

	