<?php	if(!defined('_source')) die("Error");



$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

$urldanhmuc ="";

$urldanhmuc.= (isset($_REQUEST['id_list'])) ? "&id_list=".addslashes($_REQUEST['id_list']) : "";

$urldanhmuc.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";

$urldanhmuc.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";



$id=$_REQUEST['id'];

switch($act){

case "delete_reply":
		delete_reply();               
		break;

case "save_reply":
		save_reply();
		break;

case "man_comments":
		get_items_comments();
		$template = "duan/items_comments";
		break;
case "delete_item_comments":
		delete_command();
		break;
case "reply":
		get_items_comment();
                $template = "duan/item_reply";
		break;

	case "man":

		get_items();

		$template = "duan/items";

		break;

	case "add":		

		$template = "duan/item_add";

		break;

	case "edit":		

		get_item();

		$template = "duan/item_add";

		break;

	case "save":

		save_item();

		break;

	case "delete":

		delete_item();

		break;

}



#====================================




function delete_reply(){
	global $d;
	$perentid =  themdau($_GET['perentid']);
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);

		$d->setTable('duan_comment');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=bosuutap&act=man_comments");			
		if($d->delete()){
redirect("index.php?com=bosuutap&act=reply&id=".$perentid."");
}
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=bosuutap&act=reply&id=".$perentid."");
	}else transfer("Không nhận được dữ liệu", "index.php?com=bosuutap&act=reply&id=".$perentid."");
}

function save_reply(){
global $d,$item;

$id = isset($_GET['perentid']) ? themdau($_GET['perentid']) : "";

if($id){
$d->reset();
$sql = "select * from #_user where username='".$_SESSION['login']['username']."'";
$d->query($sql);
$item = $d->fetch_array();
$name = $item['ten'];
$email= $item['email'];

	
$d->reset();



$data['ten'] =$name;	
$data['email'] = $email;

$data['noidung'] = $_POST['noidung'];
$data['id_duan'] = (int)$_GET['idproduct'];
$data['parentid'] = (int)$_GET['perentid'];
$data['ngaytao'] = date("Y-m-d");
		$d->setTable('duan_comment');
		if($d->insert($data))
			redirect("index.php?com=bosuutap&act=reply&id=".$id."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bosuutap&act=reply&id=".$id."");
}
else
transfer("Lưu dữ liệu bị lỗi", "index.php?com=bosuutap&act=man_comment");
}

function get_items_comment(){
	global $d, $item,$ds_tags,$items_comments;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=bosuutap&act=man_comments");
$sql = "SELECT id_duan,ten,email,noidung,PC.ngaytao,PC.id,parentid,ten_vi,ten_en,
(SELECT count(*) FROM `table_duan_comment` where parentid = PC.id ) as traloi
FROM `table_duan_comment` PC
left join table_duan P on PC.id_duan = P.id where PC.id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=bosuutap&act=man_comments");
	$item = $d->fetch_array();

$d->reset();

$sql = "SELECT id_duan,ten,email,noidung,PC.ngaytao,PC.id,parentid
FROM `table_duan_comment` PC
where parentid  = '".$id."' order by id";


	$d->query($sql);

	$items_comments= $d->result_array();

	

	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

	$url="index.php?com=bosuutap&act=reply&id=".$id."";

	$maxR=10;

	$maxP=4;

	$paging=paging($items_comments, $url, $curPage, $maxR, $maxP);

	$items_comments=$paging['source'];	
}

function delete_command(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('duan_comment');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=bosuutap&act=man_comments&curPage=".@$_REQUEST['curPage']."");			
		if($d->delete()){
$d->reset();
$d->setTable('duan_comment');
		$d->setWhere('parentid', $id);
				
		$d->delete();
redirect("index.php?com=bosuutap&act=man_comments&curPage=".@$_REQUEST['curPage']."");
}
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=bosuutap&act=man_comments&curPage=".@$_REQUEST['curPage']."");
	}else transfer("Không nhận được dữ liệu", "index.php?com=bosuutap&act=man_comments&curPage=".@$_REQUEST['curPage']."");
}

function get_items_comments(){

	global $d, $items_comments, $paging;	

	$sql = "SELECT id_duan,ten,email,noidung,PC.ngaytao,PC.id,parentid,ten_vi,ten_en,
(SELECT count(*) FROM `table_duan_comment` where parentid = PC.id ) as traloi
FROM `table_duan_comment` PC
left join table_duan P on PC.id_duan = P.id where parentid  is null
 order by id desc";

	$d->query($sql);

	$items_comments= $d->result_array();

	

	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

	$url="index.php?com=bosuutap&act=man_comments";

	$maxR=20;

	$maxP=4;

	$paging=paging($items_comments, $url, $curPage, $maxR, $maxP);

	$items_comments=$paging['source'];

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

	global $d, $items, $paging,$urldanhmuc;

	#----------------------------------------------------------------------------------------

	if($_REQUEST['spbc']!='')

	{

	$id_up = $_REQUEST['spbc'];

	$sql_sp = "SELECT id,spbc FROM table_duan where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$time=time();

	$hienthi=$cats[0]['spbc'];

	if($hienthi==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_duan SET spbc ='$time' WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_duan SET spbc =0  WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	

	}

	#----------------------------------------------------------------------------------------

	if($_REQUEST['noibat']!='')

	{

	$id_up = $_REQUEST['noibat'];

	$sql_sp = "SELECT id,noibat FROM table_duan where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$time=time();

	$hienthi=$cats[0]['noibat'];

	if($hienthi==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_duan SET noibat ='1' WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_duan SET noibat =0  WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	

	}

	#-------------------------------------------------------------------------------

	

	#----------------------------------------------------------------------------------------

	if($_REQUEST['hienthi']!='')

	{

	$id_up = $_REQUEST['hienthi'];

	$sql_sp = "SELECT id,hienthi FROM table_duan where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$hienthi=$cats[0]['hienthi'];

	if($hienthi==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_duan SET hienthi =1 WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_duan SET hienthi =0  WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	

	}

	#-------------------------------------------------------------------------------

	$sql = "select * from #_duan";	

	if((int)$_REQUEST['id_list']!='')

	{

	$sql.=" where  	id_list=".$_REQUEST['id_list']."";

	}

	if((int)$_REQUEST['id_cat']!='')

	{

	$sql.=" and	id_cat=".$_REQUEST['id_cat']."";

	}

	if((int)$_REQUEST['id_item']!='')

	{

	$sql.=" and	id_item=".$_REQUEST['id_item']."";

	}

	

	if($_REQUEST['keyword']!='')

	{

	$keyword=addslashes($_REQUEST['keyword']);

	$sql.=" where ten LIKE '%$keyword%'";

	}

	$sql.=" order by stt,id desc";

	

	$d->query($sql);

	$items = $d->result_array();

	

	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

	$url="index.php?com=bosuutap&act=man".$urldanhmuc;

	$maxR=20;

	$maxP=20;

	$paging=paging($items, $url, $curPage, $maxR, $maxP);

	$items=$paging['source'];

}



function get_item(){

	global $d, $item,$ds_tags;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	if(!$id)

		transfer("Không nhận được dữ liệu", "index.php?com=bosuutap&act=man");	

	$sql = "select * from #_duan where id='".$id."'";

	$d->query($sql);

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=bosuutap&act=man");

	$item = $d->fetch_array();	

}



function save_item(){

	global $d;

	$file_name=fns_Rand_digit(0,9,12);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=bosuutap&act=man");

	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	

	

	if($id){

		$id =  themdau($_POST['id']);

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_duan,$file_name)){

			$data['photo'] = $photo;	

			$data['thumb'] = create_thumb($data['photo'], 200, 170, _upload_duan,$file_name,1);		

			$d->setTable('duan');

			$d->setWhere('id', $id);

			$d->select();

			if($d->num_rows()>0){

				$row = $d->fetch_array();

				delete_file(_upload_duan.$row['photo']);	

				delete_file(_upload_duan.$row['thumb']);				

			}

		}					 	

		$data['id_list'] = (int)$_POST['id_list'];			

		$data['id_cat'] = (int)$_POST['id_cat'];	

		$data['id_item'] = (int)$_POST['id_item'];		

		$data['ten_vi'] = $_POST['ten_vi'];	

		$data['ten_en'] = $_POST['ten_en'];	

		$data['masp'] = $_POST['masp'];	

		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	

		

		$data['gia'] = (int)$_POST['gia'];	

			

		

		$data['mota_vi'] = $_POST['mota_vi'];			

		$data['noidung_vi'] = $_POST['noidung_vi'];

		$data['mota_en'] = $_POST['mota_en'];			

		$data['noidung_en'] = $_POST['noidung_en'];									

		$data['stt'] = $_POST['stt'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

		$data['ngaysua'] = time();

		$d->setTable('duan');

		$d->setWhere('id', $id);

		if($d->update($data))

			redirect("index.php?com=bosuutap&act=man&curPage=".$_REQUEST['curPage']."");

		else

			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bosuutap&act=man");

	}else{

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_duan,$file_name)){

			$data['photo'] = $photo;		

			$data['thumb'] = create_thumb($data['photo'], 200, 170, _upload_duan,$file_name,1);		

		}		

		

		$data['id_list'] = (int)$_POST['id_list'];			

		$data['id_cat'] = (int)$_POST['id_cat'];	

		$data['id_item'] = (int)$_POST['id_item'];		

		$data['ten_vi'] = $_POST['ten_vi'];	

		$data['ten_en'] = $_POST['ten_en'];	

		$data['masp'] = $_POST['masp'];	

		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);

		

		$data['gia'] = (int)$_POST['gia'];

			

		$data['mota_vi'] = $_POST['mota_vi'];			

		$data['noidung_vi'] = $_POST['noidung_vi'];

		$data['mota_en'] = $_POST['mota_en'];			

		$data['noidung_en'] = $_POST['noidung_en'];			

		

		$data['stt'] = $_POST['stt'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

		$data['ngaytao'] = time();

		$d->setTable('duan');

		if($d->insert($data))

		{			

			redirect("index.php?com=bosuutap&act=man");

		}

		else

			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bosuutap&act=man");

	}

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

		$sql = "select id,thumb, photo from #_duan where id='".$id."'";

		$d->query($sql);

		if($d->num_rows()>0){

			while($row = $d->fetch_array()){

				delete_file(_upload_duan.$row['photo']);

				delete_file(_upload_duan.$row['thumb']);			

			}

		$sql = "delete from #_duan where id='".$id."'";

		$d->query($sql);

		}

		if($d->query($sql))

			redirect("index.php?com=bosuutap&act=man".$id_catt."");

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=bosuutap&act=man");

	}else transfer("Không nhận được dữ liệu", "index.php?com=bosuutap&act=man");

}





?>