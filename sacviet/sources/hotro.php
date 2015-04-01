<?php	if(!defined('_source')) die("Error");



$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";



switch($act){

	case "man":

		get_items();

		$template = "hotro/lists";

		break;
		
		case "edit":		

		get_item();		

		$template = "hotro/list_edit";

		break;
		
		case "save_item":

		save_item();

		break;
		
		case "delete":

		delete_item();

		break;
		
	case "add":

		$template = "hotro/list_add";

		break;

	#===================================================	
	

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

	$sql = "select * from #_hotro ";
	$sql.=" order by id desc";

	

	$d->query($sql);

	$items = $d->result_array();

	

	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

	$url="index.php?com=hotro&act=man";

	$maxR=20;

	$maxP=4;

	$paging=paging($items, $url, $curPage, $maxR, $maxP);

	$items=$paging['source'];

}


function get_item(){

	global $d, $item;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	if(!$id)

		transfer("Không nhận được dữ liệu", "index.php?com=hotro&act=man");

	

	$sql = "select * from #_hotro where id='".$id."'";

	$d->query($sql);

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=hotro&act=man");

	$item = $d->fetch_array();

}


function save_item(){

	global $d;

	$file_name=fns_Rand_digit(0,9,8);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=news&act=man");

	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	if($id){

		$id =  themdau($_POST['id']);

		$data['ten_vi'] = magic_quote($_POST['ten_vi']);

		$data['ten_en'] = magic_quote($_POST['ten_en']);		

		$data['mota_vi'] = magic_quote($_POST['mota_vi']);

		$data['mota_en'] = magic_quote($_POST['mota_en']);		

		$data['stt'] = $_POST['stt'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		

		$d->setTable('hotro');

		$d->setWhere('id', $id);

		if($d->update($data))

				redirect("index.php?com=hotro&act=man");

		else

			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=hotro&act=man");

	}else{

		

		$data['ten_vi'] = magic_quote($_POST['ten_vi']);

		$data['ten_en'] = magic_quote($_POST['ten_en']);		

		$data['mota_vi'] = magic_quote($_POST['mota_vi']);

		$data['mota_en'] = magic_quote($_POST['mota_en']);		

		$data['stt'] = $_POST['stt'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;				

		$d->setTable('hotro');

		if($d->insert($data))

			redirect("index.php?com=hotro&act=man");

		else

			transfer("Lưu dữ liệu bị lỗi", "index.php?com=hotro&act=man");

	}

}


function delete_item(){

	global $d;

	

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);

		

		$d->reset();

		$sql = "delete from #_hotro where id='".$id."'";

		$d->query($sql);	

		if($d->query($sql))
			redirect("index.php?com=hotro&act=man");

		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=hotro&act=man");

	}else transfer("Không nhận được dữ liệu", "index.php?com=hotro&act=man");

}
?>

