<?php	if(!defined('_source')) die("Error");



$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";



switch($act){

 case "delete_reply":

		delete_reply();               

		break;

case "delete_tag":

		delete_tag();               

		break;

case "add_tag":

		get_tag();  

$template = "tintuc/items_tag_add";             

		break;



case "save_reply":

		save_reply();

		break;



case "man_comments":

		get_items_comments();

		$template = "tintuc/items_comments";

		break;

case "delete_item_comments":

		delete_command();

		break;

case "reply":

		get_items_comment();

                $template = "tintuc/item_reply";

		break;

       



	case "man":



		get_items();



		$template = "tintuc/items";



		break;

case "man_tag":



		get_items_tag();



		$template = "tintuc/items_tag";



		break;



	case "add":

get_all_tag();

		$template = "tintuc/item_add";



		break;



	case "edit":		



		get_item();		



		$template = "tintuc/item_add";



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



		$template = "tintuc/cats";



		break;



	case "add_cat":



		$template = "tintuc/cat_add";



		break;



	case "edit_cat":



		get_cat();



		$template = "tintuc/cat_add";



		break;



	case "save_cat":



		save_cat();



		break;



	case "delete_cat":



		delete_cat();



		break;

#===============================================

case "man_item":

		get_cats3();

		$template = "tintuc/lists";

		break;

	case "add_item":		

		$template = "tintuc/list_add";

		break;

	case "edit_item":		

		get_cat3();

		$template = "tintuc/list_add";

		break;

	case "save_item":

		save_cat3();

		break;

	case "delete_item":

		delete_cat3();

		break;

#=============================================

	default:



		$template = "index";







	default:



		$template = "index";



}





function delete_reply(){

	global $d;

	$perentid =  themdau($_GET['perentid']);

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);



		$d->setTable('new_comment');

		$d->setWhere('id', $id);

		$d->select();

		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=news&act=man_comments");			

		if($d->delete()){

redirect("index.php?com=news&act=reply&id=".$perentid."");

}

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=news&act=reply&id=".$perentid."");

	}else transfer("Không nhận được dữ liệu", "index.php?com=news&act=reply&id=".$perentid."");

}





function delete_tag(){

	global $d;

	$new_id =  themdau($_GET['new_id']);

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);



		$d->setTable('news_tags');

		$d->setWhere('id', $id);

		$d->select();

		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=news&act=man_tag&id=".$new_id."");			

		if($d->delete()){

redirect("index.php?com=news&act=man_tag&id=".$new_id."");

}

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=news&act=man_tag&id=".$new_id."");

	}else transfer("Không nhận được dữ liệu", "index.php?com=news&act=man_tag&id=".$new_id."");

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

$data['id_new'] = (int)$_GET['idproduct'];

$data['parentid'] = (int)$_GET['perentid'];

$data['ngaytao'] = date("Y-m-d");

		$d->setTable('new_comment');

		if($d->insert($data))

			redirect("index.php?com=news&act=reply&id=".$id."");

		else

			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=news&act=reply&id=".$id."");

}

else

transfer("Lưu dữ liệu bị lỗi", "index.php?com=news&act=man_comment");

}



function get_items_comment(){

	global $d, $item,$ds_tags,$items_comments;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	if(!$id)

		transfer("Không nhận được dữ liệu", "index.php?com=news&act=man_comments");

$sql = "SELECT id_new,ten,email,noidung,PC.ngaytao,PC.id,parentid,ten_vi,ten_en,

(SELECT count(*) FROM `table_new_comment` where parentid = PC.id ) as traloi,id_cat,id_item

FROM `table_new_comment` PC

left join table_news P on PC.id_new = P.id where PC.id='".$id."'";

	$d->query($sql);

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=news&act=man_comments");

	$item = $d->fetch_array();



$d->reset();



$sql = "SELECT id_new,ten,email,noidung,PC.ngaytao,PC.id,parentid

FROM `table_new_comment` PC

where parentid  = '".$id."' order by id";





	$d->query($sql);



	$items_comments= $d->result_array();



	



	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;



	$url="index.php?com=news&act=reply&id=".$id."";



	$maxR=10;



	$maxP=4;



	$paging=paging($items_comments, $url, $curPage, $maxR, $maxP);



	$items_comments=$paging['source'];	

}



function delete_command(){

	global $d;

	

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);

		$d->setTable('new_comment');

		$d->setWhere('id', $id);

		$d->select();

		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=news&act=man_comments&curPage=".@$_REQUEST['curPage']."");			

		if($d->delete()){

$d->reset();

$d->setTable('new_comment');

		$d->setWhere('parentid', $id);

				

		$d->delete();

redirect("index.php?com=news&act=man_comments&curPage=".@$_REQUEST['curPage']."");

}

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=news&act=man_comments&curPage=".@$_REQUEST['curPage']."");

	}else transfer("Không nhận được dữ liệu", "index.php?com=news&act=man_comments&curPage=".@$_REQUEST['curPage']."");

}



function get_items_comments(){



	global $d, $items_comments, $paging;	



	$sql = "SELECT id_new,ten,email,noidung,PC.ngaytao,PC.id,parentid,ten_vi,ten_en,

(SELECT count(*) FROM `table_new_comment` where parentid = PC.id ) as traloi,id_cat,id_item

FROM `table_new_comment` PC

left join table_news P on PC.id_new = P.id where parentid  is null

 order by id desc";



	$d->query($sql);



	$items_comments= $d->result_array();



	



	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;



	$url="index.php?com=news&act=man_comments";



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



	



	if(@$_REQUEST['update']!='')



	{



	$id_up = @$_REQUEST['update'];



	



	$tinnoibat=time();



	



	$sql_sp = "SELECT id,tinnoibat FROM table_news where id='".$id_up."' ";



	$d->query($sql_sp);



	$cats= $d->result_array();



	$spdc1=$cats[0]['tinnoibat'];



	//echo "id:". $spdc1;



	if($spdc1==0)



	{



	$sqlUPDATE_ORDER = "UPDATE table_news SET tinnoibat ='".$tinnoibat."' WHERE  id = ".$id_up."";



	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");



	}



	else



	{



	$sqlUPDATE_ORDER = "UPDATE table_news SET tinnoibat =0  WHERE  id = ".$id_up."";



	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");







	}	



	}



	



	if(@$_REQUEST['hienthi']!='')



	{



	$id_up = @$_REQUEST['hienthi'];



	$sql_sp = "SELECT id,hienthi FROM table_news where id='".$id_up."' ";



	$d->query($sql_sp);



	$cats= $d->result_array();



	$hienthi=$cats[0]['hienthi'];



	//echo "id:". $spdc1;



	if($hienthi==0)



	{



	$sqlUPDATE_ORDER = "UPDATE table_news SET hienthi =1 WHERE  id = ".$id_up."";



	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");



	}



	else



	{



	$sqlUPDATE_ORDER = "UPDATE table_news SET hienthi =0  WHERE  id = ".$id_up."";



	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");







	}	



	}



	



	$sql = "select * from #_news where 1 = 1 ";

    if(isset($_GET['keyword'])) $sql.=" And ten_vi like '%$_GET[keyword]%' or tenkhongdau like '%$_GET[keyword]%'";

	if(@(int)$_REQUEST['id_cat']!='')



	{



	$sql.=" And  	idlt=".$_REQUEST['id_cat']."";



	}



	$sql.=" order by id desc";



	



	$d->query($sql);



	$items = $d->result_array();



	



	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

$keyword = isset($_GET['keyword']) ? "&keyword=".$_GET['keyword'] : "";

	$url="index.php?com=news&act=man".$keyword."";



	$maxR=20;



	$maxP=4;



	$paging=paging($items, $url, $curPage, $maxR, $maxP);



	$items=$paging['source'];



}



function get_all_tag(){

global $d,  $items;

$sql = "SELECT distinct t.id,t.ten_vi,'' as new_id FROM  table_tags t ";	



	$d->query($sql);



	$items = $d->result_array();

}



function get_item(){



	global $d, $item, $items;



	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";



	if(!$id)



		transfer("Không nhận được dữ liệu", "index.php?com=news&act=man");



	



	$sql = "select * from #_news where id='".$id."'";



	$d->query($sql);



	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=news&act=man");



	$item = $d->fetch_array();





	$sql = "SELECT distinct t.id,t.ten_vi,nt.new_id FROM  table_tags t left join ( select * from table_news_tags where new_id = '".$id."') nt on nt.tag_id = t.id";	



	$d->query($sql);



	$items = $d->result_array();





}



function get_items_tag(){



	global $d, $items;



	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	$sql = "select NT.id,ten_vi,ten_en from #_news_tags NT inner join #_tags T on NT.tag_id = T.id  where new_id = '$id'";	



	$sql.=" order by NT.id desc";



	



	$d->query($sql);



	$items = $d->result_array();



}



function get_tag()

{

global $d, $items, $paging;

$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

$sql = "select * from #_tags T where id not in ( select tag_id as id from #_news_tags NT where new_id = '$id')";	



	$sql.=" order by id desc";



	



	$d->query($sql);



	$items = $d->result_array();



}



function IsChecked($chkname,$value)

    {

        if(!empty($_POST[$chkname]))

        {

            foreach($_POST[$chkname] as $chkval)

            {

                if($chkval == $value)

                {

                    return true;

                }

            }

        }

        return false;

    }



function save_item(){



	global $d;



	$file_name=fns_Rand_digit(0,9,8); 



	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=news&act=man");



	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";



	if($id){



		$id =  themdau($_POST['id']);



		



		if($photo = upload_image("file", 'jpg|png|gif',_upload_tintuc,$file_name)){



			$data['photo'] = $photo;



			$data['thumb'] = create_thumb($data['photo'], 120,80, _upload_tintuc,$file_name);



			$d->setTable('news');



			$d->setWhere('id', $id);



			$d->select();



			if($d->num_rows()>0){



				$row = $d->fetch_array();



				delete_file(_upload_tintuc.$row['photo']);



				delete_file(_upload_tintuc.$row['thumb']);



			}



		}

		$data['id_cat'] = magic_quote($_POST['id_cat']);

		$data['id_item'] = magic_quote($_POST['id_item']);

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



		



		$d->setTable('news');



		$d->setWhere('id', $id);



		if($d->update($data))

{

$d->reset();

$d->setTable('news_tags');

$d->setWhere('new_id', $id);				

$d->delete();

foreach($_POST['check_list'] as $check) {

            if(IsChecked('check_list',$check))

            {

               $d->reset();

               $sql = "insert into #_news_tags(new_id,tag_id) values ('".$id."','".$check."')";

	       $d->query($sql);

            }

    }



				redirect("index.php?com=news&act=man");}



		else



			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=news&act=man");



	}else{



	
		if($photo = upload_image("file", 'jpg|png|gif',_upload_tintuc,$file_name)){



			$data['photo'] = $photo;



			$data['thumb'] = create_thumb($data['photo'], 120,80, _upload_tintuc,$file_name);



		}


		$data['id_cat'] = magic_quote($_POST['id_cat']);

		$data['id_item'] = magic_quote($_POST['id_item']);

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

$data['nguoitao'] = $_SESSION['login']['username'];

		



		$d->setTable('news');



		if($d->insert($data))

{



$d->setTable('news');

$d->setWhere('id_cat', $data['id_cat']);

$d->setWhere('id_item', $data['id_item']);

$d->setWhere('ten_vi', $data['ten_vi']);

$d->setWhere('tenkhongdau', $data['tenkhongdau']);

$d->select();

if($d->num_rows()>0){

$row = $d->fetch_array();

foreach($_POST['check_list'] as $check) {

            if(IsChecked('check_list',$check))

            {

               $d->reset();

               $sql = "insert into #_news_tags(new_id,tag_id) values ('".$row['id']."','".$check."')";

	       $d->query($sql);

            }

    }

}



			redirect("index.php?com=news&act=man");

}

		else



			transfer("Lưu dữ liệu bị lỗi", "index.php?com=news&act=man");



	}



}







function delete_item(){



	global $d;



	



	if(isset($_GET['id'])){



		$id =  themdau($_GET['id']);



		



		$d->reset();



		$sql = "select * from #_news where id='".$id."'";



		$d->query($sql);



		if($d->num_rows()>0){



			while($row = $d->fetch_array()){



				delete_file(_upload_tintuc.$row['photo']);



				delete_file(_upload_tintuc.$row['thumb']);



			}



			$sql = "delete from #_news where id='".$id."'";



			$d->query($sql);



		}



		



		if($d->query($sql))



			redirect("index.php?com=news&act=man");



		else



			transfer("Xóa dữ liệu bị lỗi", "index.php?com=news&act=man");



	}else transfer("Không nhận được dữ liệu", "index.php?com=news&act=man");



}



//===========================================================



function get_cats3(){



	global $d, $items, $paging;



	$sql = "select * from #_news_cat order by stt";



	$d->query($sql);



	$items = $d->result_array();



	



	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;



	$url="index.php?com=news&act=man_item";



	$maxR=20;



	$maxP=4;



	$paging=paging($items, $url, $curPage, $maxR, $maxP);



	$items=$paging['source'];



}







function get_cat3(){



	global $d, $item;



	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";



	if(!$id)



	transfer("Không nhận được dữ liệu", "index.php?com=news&act=man_item");



	



	$sql = "select * from #_news_cat where id='".$id."'";



	$d->query($sql);



	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=news&act=man_item");



	$item = $d->fetch_array();



}







function save_cat3(){



	global $d;



	$file_name_item=fns_Rand_digit(0,9,5);



	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=news&act=man_item");



	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";



	if($id){



		



		$data['ten_vi'] = $_POST['ten_vi'];



		$data['ten_en'] = $_POST['ten_en'];



		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);



		$data['stt'] = $_POST['stt'];		



		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		



		$data['ngaysua'] =time();	



		$d->setTable('news_cat');



		$d->setWhere('id', $id);



		if($d->update($data))



			redirect("index.php?com=news&act=man_item&curPage=".$_REQUEST['curPage']."");



		else



			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=news&act=man_item");



	}else{





		$data['ten_vi'] = $_POST['ten_vi'];



		$data['ten_en'] = $_POST['ten_en'];



		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);



		$data['stt'] = $_POST['stt'];	



		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		



		$data['ngaytao'] =time();	



		



		$d->setTable('news_cat');



		if($d->insert($data))



			redirect("index.php?com=news&act=man_item");



		else



			transfer("Lưu dữ liệu bị lỗi", "index.php?com=news&act=man_item");



	}



}







function delete_cat3(){



	global $d;



	if(isset($_GET['id'])){



		$id =  themdau($_GET['id']);



		$d->reset();		



		$sql = "delete from #_news_cat where id='".$id."'";



		if($d->query($sql))



			redirect("index.php?com=news&act=man_item");



		else



			transfer("Xóa dữ liệu bị lỗi", "index.php?com=news&act=man_item");



	}else transfer("Không nhận được dữ liệu", "index.php?com=news&act=man_item");

	



}



#============================

#===========================================================



function get_cats(){



	global $d, $items, $paging;



	$sql = "select * from #_news_item order by stt";



	$d->query($sql);



	$items = $d->result_array();



	



	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;



	$url="index.php?com=news&act=man_cat";



	$maxR=20;



	$maxP=4;



	$paging=paging($items, $url, $curPage, $maxR, $maxP);



	$items=$paging['source'];



}







function get_cat(){



	global $d, $item;



	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";



	if(!$id)



	transfer("Không nhận được dữ liệu", "index.php?com=news&act=man_cat");



	



	$sql = "select * from #_news_item where id='".$id."'";



	$d->query($sql);



	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=news&act=man_cat");



	$item = $d->fetch_array();



}









function save_cat(){



	global $d;



	$file_name_item=fns_Rand_digit(0,9,5);



	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=news&act=man_cat");



	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";



	if($id){

		

		if($photo = upload_image("file", 'jpg|png|gif',_upload_tintuc,$file_name_item)){



			$data['photo'] = $photo;



			$data['thumb'] = create_thumb($data['photo'], 120,80, _upload_tintuc,$file_name_item);



			$d->setTable('news_item');



			$d->setWhere('id', $id);



			$d->select();



			if($d->num_rows()>0){



				$row = $d->fetch_array();



				delete_file(_upload_tintuc.$row['photo']);



				delete_file(_upload_tintuc.$row['thumb']);



			}



		}

		

		$data['id_cat'] = (int)$_POST['id_cat'];



		$data['ten_vi'] = $_POST['ten_vi'];



		$data['ten_en'] = $_POST['ten_en'];



		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);



		$data['stt'] = $_POST['stt'];		



		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		



		$data['ngaysua'] =time();	



		$d->setTable('news_item');



		$d->setWhere('id', $id);



		if($d->update($data))



			redirect("index.php?com=news&act=man_cat&curPage=".$_REQUEST['curPage']."");



		else



			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=news&act=man_cat");



	}else{

if($photo = upload_image("file", 'jpg|png|gif',_upload_tintuc,$file_name_item)){



			$data['photo'] = $photo;



			$data['thumb'] = create_thumb($data['photo'], 120,80, _upload_tintuc,$file_name_item);



		}

		$data['id_cat'] = (int)$_POST['id_cat'];



		$data['ten_vi'] = $_POST['ten_vi'];



		$data['ten_en'] = $_POST['ten_en'];



		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);



		$data['stt'] = $_POST['stt'];	



		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		



		$data['ngaytao'] =time();	



		



		$d->setTable('news_item');



		if($d->insert($data))



			redirect("index.php?com=news&act=man_cat");



		else



			transfer("Lưu dữ liệu bị lỗi", "index.php?com=news&act=man_cat");



	}



}



function delete_cat(){



	global $d;



	if(isset($_GET['id'])){



		$id =  themdau($_GET['id']);



		$d->reset();		



		$sql = "delete from #_news_item where id='".$id."'";



		if($d->query($sql))



			redirect("index.php?com=news&act=man_cat");



		else



			transfer("Xóa dữ liệu bị lỗi", "index.php?com=news&act=man_cat");



	}else transfer("Không nhận được dữ liệu", "index.php?com=news&act=man_cat");

}



?>