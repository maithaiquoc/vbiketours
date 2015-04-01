<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "khuyenmai/items";
		break;
	case "add":
		$template = "khuyenmai/item_add";
		break;
	case "edit":		
		get_item();		
		$template = "khuyenmai/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "product":
		get_products();
		$template = "khuyenmai/items_product";
		break;
	case "add_cat":
		$template = "khuyenmai/cat_add";
		break;
	case "edit_cat":
		get_cat();
		$template = "khuyenmai/cat_add";
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
	
	$sql_sp = "SELECT id,tinnoibat FROM table_khuyenmai where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['tinnoibat'];
	//echo "id:". $spdc1;
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_khuyenmai SET tinnoibat ='".$tinnoibat."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_khuyenmai SET tinnoibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_khuyenmai where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_khuyenmai SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_khuyenmai SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	$sql = "select * from #_khuyenmai ";
	if(@(int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where  	idlt=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=khuyenmai&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=khuyenmai&act=man");
	
	$sql = "select photo,thumb,id,ten_vi,ten_en,tenkhongdau,mota_vi,mota_en,noidung_vi,noidung_en,tylegiam,stt,hienthi,DATE(ngayketthuc) as ngayketthuc,DATE(ngaybatdau) as ngaybatdau,hour(ngayketthuc) as gioketthuc,hour(ngaybatdau) as giobatdau from #_khuyenmai where id='".$id."'";
	$d->query($sql);
	
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=khuyenmai&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,8);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=khuyenmai&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		
		if($photo = upload_image("file", 'jpg|png|gif',_upload_khuyenmai,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 100,100, _upload_khuyenmai,$file_name);
			$d->setTable('khuyenmai');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_khuyenmai.$row['photo']);
				delete_file(_upload_khuyenmai.$row['thumb']);
			}
		}
		$data['ten_vi'] = magic_quote($_POST['ten_vi']);
		$data['ten_en'] = magic_quote($_POST['ten_en']);
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['mota_vi'] = magic_quote($_POST['mota_vi']);
		$data['mota_en'] = magic_quote($_POST['mota_en']);
		$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
		$data['noidung_en'] = magic_quote($_POST['noidung_en']);
		$data['tylegiam'] = $_POST['phantram'];
		/*$data['gioketthuc'] = $_POST['giokt'];
		$data['giobatdau'] = $_POST['giobt'];*/
		$data['ngayketthuc'] = $_POST['datepickerto'].' '.$_POST['giokt'].':00:00';
		$data['ngaybatdau'] = $_POST['datepickerfrom'].' '.$_POST['giobt'].':00:00';
		$data['stt'] = $_POST['stt'];
		$data['meovat'] = isset($_POST['meovat']) ? 1 : 0;
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('khuyenmai');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=khuyenmai&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=khuyenmai&act=man");
	}else{
		
		if($photo = upload_image("file", 'jpg|png|gif',_upload_khuyenmai,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 100,100, _upload_khuyenmai,$file_name);
		}
		$data['ten_vi'] = magic_quote($_POST['ten_vi']);
		$data['ten_en'] = magic_quote($_POST['ten_en']);
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['mota_vi'] = magic_quote($_POST['mota_vi']);
		$data['mota_en'] = magic_quote($_POST['mota_en']);
		$data['noidung_vi'] = magic_quote($_POST['noidung_vi']);
		$data['noidung_en'] = magic_quote($_POST['noidung_en']);
		
		$data['tylegiam'] = $_POST['phantram'];
		/*$data['gioketthuc'] = $_POST['giokt'];
		$data['giobatdau'] = $_POST['giobt'];*/
		$data['ngayketthuc'] = $_POST['datepickerto'].' '.$_POST['giokt'].':00:00';
		$data['ngaybatdau'] = $_POST['datepickerfrom'].' '.$_POST['giobt'].':00:00';
		
		$data['stt'] = $_POST['stt'];
		$data['meovat'] = isset($_POST['meovat']) ? 1 : 0;
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('khuyenmai');
		if($d->insert($data))
			redirect("index.php?com=khuyenmai&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=khuyenmai&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_khuyenmai where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_khuyenmai.$row['photo']);
				delete_file(_upload_khuyenmai.$row['thumb']);
			}
			$sql = "delete from #_khuyenmai where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=khuyenmai&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=khuyenmai&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=khuyenmai&act=man");
}
//===========================================================
function get_cats(){
	global $d, $items, $paging;
	$sql = "select * from #_khuyenmai_item order by stt";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=khuyenmai&act=man_cat";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=khuyenmai&act=man_cat");
	
	$sql = "select * from #_khuyenmai_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=khuyenmai&act=man_cat");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$file_name_item=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=khuyenmai&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		$data['ngaysua'] =time();	
		$d->setTable('khuyenmai_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=khuyenmai&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=khuyenmai&act=man_cat");
	}else{
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['stt'] = $_POST['stt'];	
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		$data['ngaytao'] =time();	
		
		$d->setTable('khuyenmai_item');
		if($d->insert($data))
			redirect("index.php?com=khuyenmai&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=khuyenmai&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();		
		$sql = "delete from #_khuyenmai_item where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=khuyenmai&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=khuyenmai&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=khuyenmai&act=man_cat");
}

function get_products()
{
	global $d,$item, $items, $paging;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();	
		$sql = "select * from #_khuyenmai where id='".$id."'";
		$d->query($sql);
		$item = $d->result_array();
		if(count($item)>0){
			
		}
		else{
			transfer("Không nhận được dữ liệu", "index.php?com=khuyenmai&act=man");
		}
		
		if(@$_REQUEST['apply']!='')
		{
			$sqlUPDATE_ORDER = "INSERT INTO  table_product_discounts(id,product_id,discount_id) VALUES (NULL ,'".$_GET['apply']."',  '".$id."')";

			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		
		if(@$_REQUEST['reapply']!='')
		{
			$sqlUPDATE_ORDER = "DELETE FROM table_product_discounts WHERE product_id='".$_GET['reapply']."' and  discount_id= '".$id."'";
			
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		
		if(@$_REQUEST['applyall']!='')
		{
			if(@$_REQUEST['applyall']=='1')
			{
				$sqlUPDATE_ORDER = "INSERT INTO  table_product_discounts(id,product_id,discount_id) select distinct NULL, tp.id ,'$id' from table_product tp left join table_product_discounts tbd on tp.id = tbd.product_id where tp.id not in (select distinct product_id from (select * from table_product_discounts where  discount_id = '".$id."') tbd where discount_id in (select id from table_khuyenmai kms where hienthi <> 0 and discount_id <> '".$id."' and (ngaybatdau < Now() or ngaybatdau = Now()) and (ngayketthuc > Now() or ngayketthuc = Now()) )) ";
				
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "DELETE FROM table_product_discounts WHERE discount_id= '".$id."'";
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
		}
		
		if(@$_REQUEST['applycall']!='' && isset($_GET['id_list']) and $_GET['id_list']!='0')
		{
			if(@$_REQUEST['applycall']=='1')
			{
				$sqlUPDATE_ORDER = "INSERT INTO  table_product_discounts(id,product_id,discount_id) select NULL, id ,'$id' from table_product where id_list='$_GET[id_list]' ";
				//echo $sqlUPDATE_ORDER;
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
				$sqlUPDATE_ORDER = "DELETE FROM table_product_discounts WHERE discount_id= '".$id."' and product_id in ( select id from  table_product where id_list='$_GET[id_list]')";			
				
				$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
		}
		
		$d->reset();
		$sql = "select distinct (discount_id = '$id') as ht,tp.id,id_list,id_item,id_cat,id_cat,ten_vi,ten_en,tenkhongdau,mota_vi,mota_en,chitiet_vi,chitiet_en from table_product tp left join (select * from table_product_discounts where  discount_id = '".$id."') tbd on tp.id = tbd.product_id where tp.id not in (select distinct product_id from table_product_discounts tbd where discount_id in (select id from table_khuyenmai kms where hienthi <> 0 and discount_id <> '".$id."' and (ngaybatdau < Now() or ngaybatdau = Now()) and (ngayketthuc > Now() or ngayketthuc = Now()) )) ";
		if(isset($_GET['keyword'])) $sql.=" and ten_vi like '%$_GET[keyword]%' or tenkhongdau like '%$_GET[keyword]%'";
		if(isset($_GET['id_list']) and $_GET['id_list']!='0'){
			$sql.=" and id_list='$_GET[id_list]'";	
		}
		
		$d->query($sql);

		$items = $d->result_array();
		
		
		$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
		$keyword = isset($_GET['keyword']) ? "&keyword=".$_GET['keyword'] : "";
		$id_list = isset($_GET['id_list']) ? "&id_list=".$_GET['id_list'] : "";
		
		$url="index.php?com=khuyenmai&act=product&id=".$_GET['id'].$keyword.$id_list;
		$maxR=20;
		$maxP=4;
		$paging=paging($items, $url, $curPage, $maxR, $maxP);
		$items=$paging['source'];
	}else transfer("Không nhận được dữ liệu", "index.php?com=khuyenmai&act=man");
}


?>