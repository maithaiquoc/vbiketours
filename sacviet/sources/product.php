<?php	if(!defined('_source')) die("Error");



$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

@$id=$_REQUEST['id'];

switch($act){

	case "man_comments":

		get_items_comments();

		$template = "product/items_comments";

		break;

	case "delete_item_comments":

		delete_command();

		break;

        case "reply":

		get_items_comment();

                $template = "product/item_reply";

		break;

 case "delete_reply":

		delete_reply();

                $template = "product/item_reply";

		break;

case "save_reply":

		save_reply();

		break;



	case "man":

		get_items();

		$template = "product/items";

		break;

	case "add":		

		$template = "product/item_add";

		break;

	case "edit":		

		get_item();

		$template = "product/item_add";

		break;

	case "save":

		save_item();

		break;

	case "delete":

		delete_item();

		break;

	#===================================================	

	case "man_item":

		get_loais();

		$template = "product/loais";

		break;

	case "add_item":		

		$template = "product/loai_add";

		break;

	case "edit_item":		

		get_loai();

		$template = "product/loai_add";

		break;

	case "save_item":

		save_loai();

		break;

	case "delete_item":

		delete_loai();

		break;

		

	#===================================================	

	case "man_cat":

		get_cats();

		$template = "product/cats";

		break;

	case "add_cat":		

		$template = "product/cat_add";

		break;

	case "edit_cat":		

		get_cat();

		$template = "product/cat_add";

		break;

	case "save_cat":

		save_cat();

		break;

	case "delete_cat":

		delete_cat();

		break;

	#===================================================	

	case "man_list":

		get_lists();

		$template = "product/lists";

		break;

	case "add_list":		

		$template = "product/list_add";

		break;

	case "edit_list":		

		get_list();

		$template = "product/list_add";

		break;

	case "save_list":

		save_list();

		break;

	case "delete_list":

		delete_list();

		break;

	#===================================================	

	case "man_photo":

		get_photos();

		$template = "product/photos";

		break;

	case "add_photo":

		$template = "product/photo_add";

		break;

	case "edit_photo":

		get_photo();

		$template = "product/photo_edit";

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



#====================================





function get_items_comments(){



	global $d, $items_comments, $paging;	



	$sql = "SELECT id_product,ten,email,noidung,PC.ngaytao,PC.id,parentid,byadmin,ten_vi,ten_en,

(SELECT count(*) FROM `table_product_comment` where parentid = PC.id ) as traloi,id_list,id_cat,id_item

FROM `table_product_comment` PC

left join table_product P on PC.id_product = P.id where parentid  is null

 order by id desc";



	$d->query($sql);



	$items_comments= $d->result_array();



	



	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;



	$url="index.php?com=product&act=man_comments";



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

	global $d, $items, $paging;	

	

	#----------------------------------------------------------------------------------------

	if(@$_REQUEST['hienthi']!='')

	{

	$id_up = $_REQUEST['hienthi'];

	$sql_sp = "SELECT id,hienthi FROM table_product where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$hienthi=$cats[0]['hienthi'];

	if($hienthi==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =1 WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =0  WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	

	}

	

	if(@$_REQUEST['spbc']!='')

	{

	$id_up = $_REQUEST['spbc'];

	$sql_sp = "SELECT id,spbc FROM table_product where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$spbc=$cats[0]['spbc'];

	if($spbc==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_product SET spbc =1 WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_product SET spbc =0  WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	

	}

	

	if(@$_REQUEST['noibat']!='')

	{

	$id_up = $_REQUEST['noibat'];

	$sql_sp = "SELECT id,noibat FROM table_product where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$noibat=$cats[0]['noibat'];

	if($noibat==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_product SET noibat =1 WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_product SET noibat =0  WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	

	}

	

	if(@$_REQUEST['spmoi']!='')

	{

	$id_up = $_REQUEST['spmoi'];

	$sql_sp = "SELECT id,spmoi FROM table_product where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$spmoi=$cats[0]['spmoi'];

	if($spmoi==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_product SET spmoi =1 WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_product SET spmoi =0  WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	

	}

	#-------------------------------------------------------------------------------

	$sql = "select * from #_product";	

	if(isset($_GET['keyword'])) $sql.=" where ten_vi like '%$_GET[keyword]%' or tenkhongdau like '%$_GET[keyword]%'";

	$sql.=" order by stt,id desc";

	

	if(isset($_GET['id_list']) and $_GET['id_list']!='0'){

		$sql="select * from #_product where id_list='$_GET[id_list]'";	

	}

	

	$d->query($sql);

	$items = $d->result_array();

	

	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

$keyword = isset($_GET['keyword']) ? "&keyword=".$_GET['keyword'] : "";

	$url="index.php?com=product&act=man".$keyword."";

	$maxR=20;

	$maxP=20;

	$paging=paging($items, $url, $curPage, $maxR, $maxP);

	$items=$paging['source'];

}



function get_item(){

	global $d, $item,$items_comments,$ds_tags;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	if(!$id)

		transfer("Không nhận được dữ liệu", "index.php?com=product&act=man");	

	$sql = "select * from #_product where id='".$id."'";

	$d->query($sql);

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man");

	$item = $d->fetch_array();	

}



function get_items_comment(){

	global $d, $item,$ds_tags,$items_comments;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	if(!$id)

		transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_comments");

$sql = "SELECT id_product,ten,email,noidung,PC.ngaytao,PC.id,parentid,byadmin,ten_vi,ten_en,

(SELECT count(*) FROM `table_product_comment` where parentid = PC.id ) as traloi,id_list,id_cat,id_item

FROM `table_product_comment` PC

left join table_product P on PC.id_product = P.id where PC.id='".$id."'";

	$d->query($sql);

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_comments");

	$item = $d->fetch_array();



$d->reset();



$sql = "SELECT id_product,ten,email,noidung,PC.ngaytao,PC.id,parentid

FROM `table_product_comment` PC

where parentid  = '".$id."' order by id";





	$d->query($sql);



	$items_comments= $d->result_array();



	



	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;



	$url="index.php?com=product&act=reply&id=".$id."";



	$maxR=10;



	$maxP=4;



	$paging=paging($items_comments, $url, $curPage, $maxR, $maxP);



	$items_comments=$paging['source'];	

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

$data['id_product'] = (int)$_GET['idproduct'];

$data['parentid'] = (int)$_GET['perentid'];

$data['ngaytao'] = date("Y-m-d");

		$d->setTable('product_comment');

		if($d->insert($data))

			redirect("index.php?com=product&act=reply&id=".$id."");

		else

			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=reply&id=".$id."");

}

else

transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_comment");

}



function save_item(){

	global $d;

	$file_name=fns_Rand_digit(0,9,12);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man");

	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	

	

	if($id){

		$id =  themdau($_POST['id']);

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|GIF', _upload_product,$file_name)){

			$data['photo'] = $photo;	

			$data['thumb'] = create_thumb($data['photo'], 300, 158, _upload_product,$file_name,1);		

			$d->setTable('product');

			$d->setWhere('id', $id);

			$d->select();

			if($d->num_rows()>0){

				$row = $d->fetch_array();

				delete_file(_upload_product.$row['photo']);	

				delete_file(_upload_product.$row['thumb']);				

			}

		}					if($photo1 = upload_image("file1", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name."1")){			$data['photo1'] = $photo1;						$d->setTable('product');			$d->setWhere('id', $id);			$d->select();			if($d->num_rows()>0){				$row = $d->fetch_array();				delete_file(_upload_product.$row['photo1']);				}		}			if($photo2 = upload_image("file2", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name."2")){			$data['photo2'] = $photo2;						$d->setTable('product');			$d->setWhere('id', $id);			$d->select();			if($d->num_rows()>0){				$row = $d->fetch_array();				delete_file(_upload_product.$row['photo2']);				}		}			if($photo3 = upload_image("file3", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name."3")){			$data['photo3'] = $photo3;						$d->setTable('product');			$d->setWhere('id', $id);			$d->select();			if($d->num_rows()>0){				$row = $d->fetch_array();				delete_file(_upload_product.$row['photo3']);				}		}	

										 	

		$data['id_list'] = (int)$_POST['id_list'];			

		$data['id_cat'] = (int)$_POST['id_cat'];	

		$data['masp'] =  magic_quote($_POST['masp']);		

		$data['ten_vi'] = magic_quote($_POST['ten_vi']);	
		$data['start'] = magic_quote($_POST['start']);
		$data['lenght'] = magic_quote($_POST['lenght']);	
		$data['link'] = magic_quote($_POST['link']);

		$data['ten_en'] = magic_quote($_POST['ten_en']);	

		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);			

		$data['mota_vi'] = magic_quote($_POST['mota_vi']);	

		$data['mota_en'] = magic_quote($_POST['mota_en']);

		$data['chitiet_vi'] = magic_quote($_POST['noidung_vi']);	

		$data['chitiet_en'] = magic_quote($_POST['noidung_en']);	

		$data['gia'] = magic_quote($_POST['gia']);

$data['giamgia'] = magic_quote($_POST['giamgia']);

		$data['size'] = magic_quote($_POST['size']);								

		$data['stt'] = magic_quote($_POST['stt']);				$data['thanhphan_en'] = magic_quote($_POST['thanhphan_en']);		$data['dksudung_en'] = magic_quote($_POST['dksudung_en']);				$data['thanhphan_vi'] = magic_quote($_POST['thanhphan_vi']);		$data['dksudung_vi'] = magic_quote($_POST['dksudung_vi']);

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

		$data['ngaysua'] = time();

		$d->setTable('product');

		$d->setWhere('id', $id);

		if($d->update($data))

			redirect("index.php?com=product&act=man&curPage=".@$_REQUEST['curPage']."");

		else

			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man");

	}else{

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){

			$data['photo'] = $photo;		

			$data['thumb'] = create_thumb($data['photo'], 300, 158, _upload_product,$file_name,1);		

		}			if($photo1 = upload_image("file1", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name."1")){			$data['photo1'] = $photo1;		}			if($photo2 = upload_image("file2", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name."2")){			$data['photo2'] = $photo2;		}			if($photo3 = upload_image("file3", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name."3")){			$data['photo3'] = $photo3;		}			

		$data['id_list'] = (int)$_POST['id_list'];			

		$data['id_cat'] = (int)$_POST['id_cat'];

		$data['masp'] =  magic_quote($_POST['masp']);				

		$data['ten_vi'] = magic_quote($_POST['ten_vi']);
		$data['start'] = magic_quote($_POST['start']);
		$data['lenght'] = magic_quote($_POST['lenght']);	
		$data['link'] = magic_quote($_POST['link']);
		$data['ten_en'] = magic_quote($_POST['ten_en']);	

		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);			

		$data['mota_vi'] = magic_quote($_POST['mota_vi']);	

		$data['mota_en'] = magic_quote($_POST['mota_en']);

		$data['chitiet_vi'] = magic_quote($_POST['noidung_vi']);	

		$data['chitiet_en'] = magic_quote($_POST['noidung_en']);

		$data['gia'] = magic_quote($_POST['gia']);

$data['giamgia'] = magic_quote($_POST['giamgia']);

		$data['size'] = magic_quote($_POST['size']);								

		$data['stt'] = magic_quote($_POST['stt']);

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

		$data['ngaytao'] = time();				$data['thanhphan_en'] = magic_quote($_POST['thanhphan_en']);		$data['dksudung_en'] = magic_quote($_POST['dksudung_en']);				$data['thanhphan_vi'] = magic_quote($_POST['thanhphan_vi']);		$data['dksudung_vi'] = magic_quote($_POST['dksudung_vi']);

		$d->setTable('product');

		if($d->insert($data))

		{			

			redirect("index.php?com=product&act=man");

		}

		else

			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man");

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

		$sql = "select id,thumb, photo from #_product where id='".$id."'";

		$d->query($sql);

		if($d->num_rows()>0){

			while($row = $d->fetch_array()){

				delete_file(_upload_product.$row['photo']);

				delete_file(_upload_product.$row['thumb']);							

			}

		$sql = "delete from #_product where id='".$id."'";

		$d->query($sql);

		}

		if($d->query($sql))

			redirect("index.php?com=product&act=man".$id_catt."");

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man");

	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man");

}



#====================================

function get_cats(){

	global $d, $items, $paging;

	

	#----------------------------------------------------------------------------------------

	if(@$_REQUEST['noibat']!='')

	{

	$id_up = $_REQUEST['noibat'];

	$sql_sp = "SELECT id,noibat FROM table_product_cat where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$time=time();

	$noibat=$cats[0]['noibat'];

	if($noibat==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_product_cat SET noibat =$time WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_product_cat SET noibat =0  WHERE  id = ".$id_up."";	

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	

	}

	

	#-------------------------------------------------------------------------------

	

	

	$sql = "select * from #_product_cat where 1 = 1 ";

		if(isset($_GET['keyword'])) $sql.=" and ten_vi like '%$_GET[keyword]%' or tenkhongdau like '%$_GET[keyword]%'";

	if(@(int)$_REQUEST['id_list']!='')

	{

	$sql.="  and id_list=".$_REQUEST['id_list']."";

	}

	$sql.=" order by stt";

	

	$d->query($sql);

	$items = $d->result_array();

	$keyword = isset($_GET['keyword']) ? "&keyword=".$_GET['keyword'] : "";

	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

	$url="index.php?com=product&act=man_cat".$keyword."";

	$maxR=20;

	$maxP=10;

	$paging=paging($items, $url, $curPage, $maxR, $maxP);

	$items=$paging['source'];

}



function get_cat(){

	global $d, $item;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	if(!$id)

	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat");

	

	$sql = "select * from #_product_cat where id='".$id."'";

	$d->query($sql);

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat");

	$item = $d->fetch_array();

}



function save_cat(){

	global $d;

	$file_name=fns_Rand_digit(0,9,12);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat");

	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	if($id){		

		

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){

			$data['photo'] = $photo;	

			$data['thumb'] = create_thumb($data['photo'], 220, 145, _upload_product,$file_name,1);		

			$d->setTable('product_cat');

			$d->setWhere('id', $id);

			$d->select();

			if($d->num_rows()>0){

				$row = $d->fetch_array();

				delete_file(_upload_product.$row['photo']);	

				delete_file(_upload_product.$row['thumb']);				

			}

		}		

		

		$data['ten_vi'] = $_POST['ten_vi'];

		$data['ten_en'] = $_POST['ten_en'];

		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);

		$data['mota_vi'] = $_POST['mota_vi'];

		$data['mota_en'] = $_POST['mota_en'];		

		$data['id_list'] = $_POST['id_list'];			

		$data['stt'] = $_POST['stt'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

		$data['ngaysua'] = time();

		

		$d->setTable('product_cat');

		$d->setWhere('id', $id);

		if($d->update($data))

			redirect("index.php?com=product&act=man_cat&curPage=".$_REQUEST['curPage']."");

		else

			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat");

	}else{		

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){

			$data['photo'] = $photo;	

			$data['thumb'] = create_thumb($data['photo'], 220, 145, _upload_product,$file_name,1);		

		}

		$data['id_list'] = $_POST['id_list'];

		$data['ten_vi'] = $_POST['ten_vi'];

		$data['ten_en'] = $_POST['ten_en'];

		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);

		$data['mota_vi'] = $_POST['mota_vi'];

		$data['mota_en'] = $_POST['mota_en'];	

		$data['stt'] = $_POST['stt'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

		$data['ngaytao'] = time();

		

		$d->setTable('product_cat');

		if($d->insert($data))

			redirect("index.php?com=product&act=man_cat");

		else

			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat");

	}

}



function delete_cat(){

	global $d;

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);		

		$d->reset();		

		$sql = "select id,thumb, photo from #_product_cat where id='".$id."'";

		$d->query($sql);

		if($d->num_rows()>0){

			while($row = $d->fetch_array()){

				delete_file(_upload_product.$row['photo']);

				delete_file(_upload_product.$row['thumb']);			

			}

		$sql = "delete from #_product_cat where id='".$id."'";

		$d->query($sql);

		}

								

		

		if($d->query($sql))

			redirect("index.php?com=product&act=man_cat");

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat");

	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat");

}

/*---------------------------------*/

function get_loais(){

	global $d, $items, $paging;

	#----------------------------------------------------------------------------------------

	if($_REQUEST['hienthi']!='')

	{

	$id_up = $_REQUEST['hienthi'];

	$sql_sp = "SELECT id,hienthi FROM table_product_item where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$hienthi=$cats[0]['hienthi'];

	if($hienthi==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =1 WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =0  WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	

	}

	

	$sql = "select * from #_product_item";

		

	if((int)$_REQUEST['id_list']!='')

	{

	$sql.=" where id_list=".$_REQUEST['id_list']."";

	}

	$sql.=" order by stt";

	

	$d->query($sql);

	$items = $d->result_array();

	

	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

	$url="index.php?com=product&act=man_item";

	$maxR=20;

	$maxP=10;

	$paging=paging($items, $url, $curPage, $maxR, $maxP);

	$items=$paging['source'];

}



function get_loai(){

	global $d, $item;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	if(!$id)

	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item");

	

	$sql = "select * from #_product_item where id='".$id."'";

	$d->query($sql);

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_item");

	$item = $d->fetch_array();

}



function save_loai(){

	global $d;

	$file_name=fns_Rand_digit(0,9,12);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item");

	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	if($id){		

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){

			$data['photo'] = $photo;	

			$data['thumb'] = create_thumb($data['photo'], 700, 248, _upload_product,$file_name,1);		

			$d->setTable('product_item');

			$d->setWhere('id', $id);

			$d->select();

			if($d->num_rows()>0){

				$row = $d->fetch_array();

				delete_file(_upload_product.$row['photo']);	

				delete_file(_upload_product.$row['thumb']);				

			}

		}							

		$data['ten_vi'] = $_POST['ten_vi'];

		$data['ten_en'] = $_POST['ten_en'];

		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);	

		$data['mota_vi'] = $_POST['mota_vi'];

		$data['mota_en'] = $_POST['mota_en'];		

		$data['id_list'] = $_POST['id_list'];	

		$data['id_cat']= $_POST['id_cat'];			

		$data['stt'] = $_POST['stt'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

		$data['ngaysua'] = time();

		

		$d->setTable('product_item');

		$d->setWhere('id', $id);

		if($d->update($data))

			redirect("index.php?com=product&act=man_item&curPage=".$_REQUEST['curPage']."");

		else

			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_item");

	}else{	

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){

			$data['photo'] = $photo;	

			$data['thumb'] = create_thumb($data['photo'], 700, 248, _upload_product,$file_name,1);		

		}

			

		$data['id_list'] = $_POST['id_list'];

		$data['id_cat']= $_POST['id_cat'];	

		$data['ten_vi'] = $_POST['ten_vi'];

		$data['ten_en'] = $_POST['ten_en'];

		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);

		$data['mota_vi'] = $_POST['mota_vi'];

		$data['mota_en'] = $_POST['mota_en'];	

		$data['stt'] = $_POST['stt'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

		$data['ngaytao'] = time();

		

		$d->setTable('product_item');

		if($d->insert($data))

			redirect("index.php?com=product&act=man_item");

		else

			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_item");

	}

}



function delete_loai(){

	global $d;

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);		

		$d->reset();		

		$sql = "select id,thumb, photo from #_product_item where id='".$id."'";

		$d->query($sql);

		if($d->num_rows()>0){

			while($row = $d->fetch_array()){

				delete_file(_upload_product.$row['photo']);

				delete_file(_upload_product.$row['thumb']);			

			}

		$sql = "delete from #_product_item where id='".$id."'";

		$d->query($sql);

		}						

		

		if($d->query($sql))

			redirect("index.php?com=product&act=man_item");

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_item");

	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_item");

}

/*---------------------------------*/

function get_lists(){

	global $d, $items, $paging;

	

	#----------------------------------------------------------------------------------------

	if(@$_REQUEST['hienthi']!='')

	{

	$id_up = $_REQUEST['hienthi'];

	$sql_sp = "SELECT id,hienthi FROM table_product_list where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$hienthi=$cats[0]['hienthi'];

	if($hienthi==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =1 WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_product_list SET hienthi =0  WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	

	}

	

	$sql = "select * from #_product_list";			

	$sql.=" order by stt,id desc";

	

	$d->query($sql);

	$items = $d->result_array();

	

	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

	$url="index.php?com=product&act=man_list";

	$maxR=20;

	$maxP=10;

	$paging=paging($items, $url, $curPage, $maxR, $maxP);

	$items=$paging['source'];

}



function get_list(){

	global $d, $item;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	if(!$id)

	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list");	

	$sql = "select * from #_product_list where id='".$id."'";

	$d->query($sql);

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_list");

	$item = $d->fetch_array();	

}



function save_list(){

	global $d;

	$file_name=fns_Rand_digit(0,9,12);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list");

	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	if($id){							

						

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){

			$data['photo'] = $photo;	

			$data['thumb'] = create_thumb($data['photo'], 700, 248, _upload_product,$file_name,1);		

			$d->setTable('product_list');

			$d->setWhere('id', $id);

			$d->select();

			if($d->num_rows()>0){

				$row = $d->fetch_array();

				delete_file(_upload_product.$row['photo']);	

				delete_file(_upload_product.$row['thumb']);				

			}

		}		

		

		$data['ten_vi'] = magic_quote($_POST['ten_vi']);

		$data['ten_en'] = magic_quote($_POST['ten_en']);

		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);

		

		$data['mota_vi'] = magic_quote(@$_POST['mota_vi']);

		$data['mota_en'] = magic_quote(@$_POST['mota_en']);

		$data['stt'] = $_POST['stt'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

		$data['ngaysua'] = time();

		

		$d->setTable('product_list');

		$d->setWhere('id', $id);

		if($d->update($data))

			redirect("index.php?com=product&act=man_list&curPage=".$_REQUEST['curPage']."");

		else

			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_list");

	}else{				

		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_product,$file_name)){

			$data['photo'] = $photo;	

			$data['thumb'] = create_thumb($data['photo'], 700, 248, _upload_product,$file_name,1);	

		}

		$data['ten_vi'] = magic_quote($_POST['ten_vi']);

		$data['ten_en'] = magic_quote($_POST['ten_en']);

		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);

		

		$data['mota_vi'] = magic_quote(@$_POST['mota_vi']);

		$data['mota_en'] = magic_quote(@$_POST['mota_en']);

		$data['stt'] = $_POST['stt'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

		$data['ngaytao'] = time();

		

		$d->setTable('product_list');

		if($d->insert($data))

			redirect("index.php?com=product&act=man_list");

		else

			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_list");

	}

}



function delete_list(){

	global $d;

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);		

		$d->reset();		

		$sql = "select id,thumb, photo from #_product_list where id='".$id."'";

		$d->query($sql);

		if($d->num_rows()>0){

			while($row = $d->fetch_array()){

				delete_file(_upload_product.$row['photo']);

				delete_file(_upload_product.$row['thumb']);			

			}

		$sql = "delete from #_product_list where id='".$id."'";

		$d->query($sql);

		}

									

		if($d->query($sql))

			redirect("index.php?com=product&act=man_list");

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_list");

	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list");

}

/*---------------------------------------------*/

function get_photos(){

	global $d, $items, $paging;	

	#----------------------------------------------------------------------------------------

	if($_REQUEST['hienthi']!='')

	{

	$id_up = $_REQUEST['hienthi'];

	$sql_sp = "SELECT id,hienthi FROM table_product_hinhanh where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$hienthi=$cats[0]['hienthi'];

	if($hienthi==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_product_hinhanh SET hienthi =1 WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_product_hinhanh SET hienthi =0  WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	

	}

	

	

	

	$sql = "select * from #_product_hinhanh where ( id_photo = '".$_REQUEST['idc']."' OR '".$_REQUEST['idc']."'=0  ) order by stt,id desc ";			

	$d->query($sql);

	$items = $d->result_array();

	

	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

	

	$url="index.php?com=product&act=man_photo&idc=".$_REQUEST['idc']."";

	$maxR=10;

	$maxP=4;

	$paging=paging($items, $url, $curPage, $maxR, $maxP);

	$items=$paging['source'];



}



function get_photo(){

	global $d, $item, $list_cat;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	if(!$id)

		transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_photo&idc=".$_REQUEST['idc']."");

	

	$d->setTable('product_hinhanh');

	$d->setWhere('com', 'product');

	$d->setWhere('id', $id);

	$d->select();

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_photo&idc=".$_REQUEST['idc']."");

	$item = $d->fetch_array();

	$d->reset();

}



function save_photo(){

	global $d;

	$file_name=fns_Rand_digit(0,9,10);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_photo&idc=".$_REQUEST['idc']."");

	

	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	if($id){ // cap nhat

		

			if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|Jpg|JPEG', _upload_product,$file_name)){

				$data['photo'] = $photo;

				$data['thumb'] = create_thumb($data['photo'], 135, 90, _upload_product,$file_name);

				$d->setTable('product_hinhanh');

				$d->setWhere('id', $id);

				$d->select();

				if($d->num_rows()>0){

					$row = $d->fetch_array();

					delete_file(_upload_product.$row['photo']);

					delete_file(_upload_product.$row['thumb']);

					delete_file(_upload_product.$row['thumb1']);

				}

			}

			$data['id'] = $_REQUEST['id'];

			$data['mota'] = $_POST['mota'];

			$data['stt'] = $_POST['stt'];

			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;

			$data['com'] = 'product';

			$d->reset();

			$d->setTable('product_hinhanh');

			$d->setWhere('id', $id);

			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_photo&idc=".$_REQUEST['idc']."");

			redirect("index.php?com=product&act=man_photo&idc=".$_REQUEST['idc']."");

			

	}{ // them moi

		

			for($i=0; $i<5; $i++){

				if($photo = upload_image("file".$i, 'jpg|png|gif|JPG|jpeg|Jpg|JPEG', _upload_product,$file_name.$i))

					{

						$data['photo'] = $photo;

						$data['thumb'] = create_thumb($data['photo'], 135, 90, _upload_product,$file_name.$i);

						

						$data['mota'] = "mota :".$i;

						

						$data['stt'] = $_POST['stt'.$i];

						$data['mota'] = $_POST['mota'.$i];

						

						$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;

						$data['com'] = 'product';

						

						$data['id_photo'] = $_REQUEST['idc'];

						

						$d->setTable('product_hinhanh');

						if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_photo&idc=".$_REQUEST['idc']."");

					}

			}

			redirect("index.php?com=product&act=man_photo&idc=".$_REQUEST['idc']."");

	}

}

function delete_command(){

	global $d;

	

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);

		$d->setTable('product_comment');

		$d->setWhere('id', $id);

		$d->select();

		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_comments");			

		if($d->delete()){

$d->reset();

$d->setTable('product_comment');

		$d->setWhere('parentid', $id);

				

		$d->delete();

redirect("index.php?com=product&act=man_comments");

}

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_comments");

	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_comments");

}



function delete_reply(){

	global $d;

	$perentid =  themdau($_GET['perentid']);

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);



		$d->setTable('product_comment');

		$d->setWhere('id', $id);

		$d->select();

		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_comments");			

		if($d->delete()){

redirect("index.php?com=product&act=reply&id=".$perentid."");

}

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=reply&id=".$perentid."");

	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=reply&id=".$perentid."");

}



function delete_photo(){

	global $d;

	

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);

		$d->setTable('product_hinhanh');

		$d->setWhere('id', $id);

		$d->select();

		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_photo&idc=".$_REQUEST['idc']."");

		$row = $d->fetch_array();

			delete_file(_upload_product.$row['photo']);

			delete_file(_upload_product.$row['thumb']);			

		if($d->delete())

		

			redirect("index.php?com=product&act=man_photo&idc=".$_REQUEST['idc']."");

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_photo&idc=".$_REQUEST['idc']."");

	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_photo&idc=".$_REQUEST['idc']."");

}





?>	