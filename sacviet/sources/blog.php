<?php	if(!defined('_source')) die("Error");



$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";



switch($act){

case "delete_video":



		delete_video();



		break;

case "save_video":

		save_video();

		break;



case "add_video":		

		$template = "blog/item_video_add";

		break;

case "video":

		get_item_video();

		$template = "blog/item_video_add";

		break;

case "delete_tag":

		delete_tag();               

		break;

case "add_tag":

		get_tag();  

$template = "blog/items_tag_add";             

		break;

case "man_video":

		get_items_video();

		$template = "blog/items_video";

		break;

case "man_tag":

		get_items_tag();

		$template = "blog/items_tag";

		break;

 case "delete_reply":

		delete_reply();               

		break;



case "save_reply":

		save_reply();

		break;



case "man_comments":

		get_items_comments();

		$template = "blog/items_comments";

		break;

case "delete_item_comments":

		delete_command();

		break;

case "reply":

		get_items_comment();

                $template = "blog/item_reply";

		break;



	case "man":

		get_items();

		$template = "blog/items";

		break;

	case "add":

get_all_tag();

		$template = "blog/item_add";

		break;

	case "edit":		

		get_item();		

		$template = "blog/item_add";

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

		$template = "blog/cats";

		break;

	case "add_cat":

		$template = "blog/cat_add";

		break;

	case "edit_cat":

		get_cat();

		$template = "blog/cat_add";

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





function save_video(){



	global $d;

$blogid=  isset($_POST['blogid']) ? themdau($_POST['blogid']) : ""; 

	$file_name=fns_Rand_digit(0,9,8);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=blog&act=man_video&blogid=".$blogid."");

	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";



if($_POST['ten_vi'] == ''){

transfer("Hãy nhập tên video.", "index.php?com=blog&act=add_video&blogid=".$blogid."");

}



	if($id){



		$id =  themdau($_POST['id']);		
$_POST['bylink'] = "on";
		if($_POST['bylink'] != "on"){

		if($photo = upload_image("filevideo", 'flv|mp4|avi', _upload_video,$file_name)){



			$data['link'] = _upload_video_l.$photo;		$data['bylink'] = 0;	



			$d->setTable('video_blog');



			$d->setWhere('id', $id);



			$d->select();



			if($d->num_rows()>0){



				$row = $d->fetch_array();



				delete_file(_upload_video.$row['link']);	



			}



		}	

}

else

{

$d->setTable('video_blog');

			$d->setWhere('id', $id);

			$d->select();

			if($d->num_rows()>0){

				$row = $d->fetch_array();

				delete_file(_upload_video.$row['link']);	

			}

$data['link'] = $_POST['txtbylink'];

$data['bylink'] = 1;	

}

				



		$data['ten_vi'] = $_POST['ten_vi'];



		$data['ten_en'] = $_POST['ten_en'];



		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);		



		$data['stt'] = $_POST['stt'];



		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;



		$data['ngaysua'] = time();		



		$d->setTable('video_blog');



		$d->setWhere('id', $id);



		if($d->update($data))			



				redirect("index.php?com=blog&act=man_video&blogid=".$blogid."");



		else



			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=blog&act=man_video&blogid=".$blogid."");



	}else{
$_POST['bylink'] = "on";
if($_POST['bylink'] != "on"){$data['bylink'] = 0;	

		if($photo = upload_image("filevideo", 'flv|mp4|avi', _upload_video,$file_name)){



			$data['link'] = _upload_video_l.$photo;					



		}}

else{

$data['link'] = $_POST['txtbylink'];

$data['bylink'] = 1;

}



		$data['ten_vi'] = $_POST['ten_vi'];



		$data['ten_en'] = $_POST['ten_en'];



		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);		



		$data['stt'] = $_POST['stt'];

$data['id_blog'] = $blogid;

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;



		$data['ngaytao'] = time();



		



		$d->setTable('video_blog');



		if($d->insert($data))



			redirect("index.php?com=blog&act=man_video&blogid=".$blogid."");



		else



			transfer("Lưu dữ liệu bị lỗi", "index.php?com=blog&act=man_video&blogid=".$blogid."");



	}



}





function get_all_tag(){

global $d,  $items;

$sql = "SELECT distinct t.id,t.ten_vi,'' as blog_id FROM  table_tags t ";	



	$d->query($sql);



	$items = $d->result_array();

}



function fns_Rand_digit($min,$max,$num)

	{

		$result='';

		for($i=0;$i<$num;$i++){

			$result.=rand($min,$max);

		}

		return $result;	

	}



function get_item_video(){



global $d, $item;



	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

$blogid = isset($_GET['blogid']) ? themdau($_GET['blogid']) : "";

	if(!$id)



		transfer("Không nhận được dữ liệu", "index.php?com=blog&act=man_video&blogid=".$blogid."");



	



	$sql = "select * from #_video_blog where id='".$id."'";



	$d->query($sql);



	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=blog&act=man_video&blogid=".$blogid.""); 



	$item = $d->fetch_array();

}





function get_items_video()

{

global $d, $id,$items;

$id = isset($_GET['blogid']) ? themdau($_GET['blogid']) : "";



if(@$_REQUEST['hienthi']!='')



	{



	$id_up = @$_REQUEST['hienthi'];



	$sql_sp = "SELECT id,hienthi FROM table_video_blog where id='".$id_up."' ";



	$d->query($sql_sp);



	$cats= $d->result_array();



	$hienthi=$cats[0]['hienthi'];	



	if($hienthi==0)



	{



	$sqlUPDATE_ORDER = "UPDATE table_video_blog SET hienthi =1 WHERE  id = ".$id_up."";



	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");



	}



	else



	{



	$sqlUPDATE_ORDER = "UPDATE table_video_blog SET hienthi =0  WHERE  id = ".$id_up."";



	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");







	}	



	}









$sql_video = "select * from #_video_blog where id_blog='".$id."'";

$sql_video.=" order by id desc";

$d->query($sql_video);

$items = $d->result_array();

$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

$url="index.php?com=blog&act=man_video";

$maxR=5;



	$maxP=4;



	$paging=paging($items, $url, $curPage, $maxR, $maxP);



	$items=$paging['source'];

}



function delete_reply(){

	global $d;

	$perentid =  themdau($_GET['perentid']);

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);



		$d->setTable('blog_comment');

		$d->setWhere('id', $id);

		$d->select();

		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=blog&act=man_comments");			

		if($d->delete()){

redirect("index.php?com=blog&act=reply&id=".$perentid."");

}

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=blog&act=reply&id=".$perentid."");

	}else transfer("Không nhận được dữ liệu", "index.php?com=blog&act=reply&id=".$perentid."");

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

$data['id_blog'] = (int)$_GET['idproduct'];

$data['parentid'] = (int)$_GET['perentid'];

$data['ngaytao'] = date("Y-m-d");

		$d->setTable('blog_comment');

		if($d->insert($data))

			redirect("index.php?com=blog&act=reply&id=".$id."");

		else

			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=blog&act=reply&id=".$id."");

}

else

transfer("Lưu dữ liệu bị lỗi", "index.php?com=blog&act=man_comment");

}



function get_items_comment(){

	global $d, $item,$ds_tags,$items_comments,$items_video;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	if(!$id)

		transfer("Không nhận được dữ liệu", "index.php?com=blog&act=man_comments");

$sql = "SELECT id_blog,ten,email,noidung,PC.ngaytao,PC.id,parentid,ten_vi,ten_en,

(SELECT count(*) FROM `table_blog_comment` where parentid = PC.id ) as traloi,id_cat,id_item

FROM `table_blog_comment` PC

left join table_blog P on PC.id_blog = P.id where PC.id='".$id."'";

	$d->query($sql);

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=blog&act=man_comments");

	$item = $d->fetch_array();



$d->reset();



$sql = "SELECT id_blog,ten,email,noidung,PC.ngaytao,PC.id,parentid

FROM `table_blog_comment` PC

where parentid  = '".$id."' order by id";





	$d->query($sql);



	$items_comments= $d->result_array();



	



	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;



	$url="index.php?com=blog&act=reply&id=".$id."";



	$maxR=10;



	$maxP=4;



	$paging=paging($items_comments, $url, $curPage, $maxR, $maxP);



	$items_comments=$paging['source'];

	

}



function delete_command(){

	global $d;

	

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);

		$d->setTable('blog_comment');

		$d->setWhere('id', $id);

		$d->select();

		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=blog&act=man_comments&curPage=".@$_REQUEST['curPage']."");			

		if($d->delete()){

$d->reset();

$d->setTable('blog_comment');

		$d->setWhere('parentid', $id);

				

		$d->delete();

redirect("index.php?com=blog&act=man_comments&curPage=".@$_REQUEST['curPage']."");

}

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=blog&act=man_comments&curPage=".@$_REQUEST['curPage']."");

	}else transfer("Không nhận được dữ liệu", "index.php?com=blog&act=man_comments&curPage=".@$_REQUEST['curPage']."");

}



function get_items_comments(){



	global $d, $items_comments, $paging;	



	$sql = "SELECT id_blog,ten,email,noidung,PC.ngaytao,PC.id,parentid,ten_vi,ten_en,

(SELECT count(*) FROM `table_blog_comment` where parentid = PC.id ) as traloi,id_cat,id_item

FROM `table_blog_comment` PC

left join table_blog P on PC.id_blog = P.id where parentid  is null

 order by id desc";



	$d->query($sql);



	$items_comments= $d->result_array();



	



	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;



	$url="index.php?com=blog&act=man_comments";



	$maxR=20;



	$maxP=4;



	$paging=paging($items_comments, $url, $curPage, $maxR, $maxP);



	$items_comments=$paging['source'];



}



function get_items(){

	global $d, $items, $paging;

	

	if(@$_REQUEST['update']!='')

	{

	$id_up = @$_REQUEST['update'];

	

	$tinnoibat=time();

	

	$sql_sp = "SELECT id,tinnoibat FROM table_blog where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$spdc1=$cats[0]['tinnoibat'];

	//echo "id:". $spdc1;

	if($spdc1==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_blog SET tinnoibat ='".$tinnoibat."' WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_blog SET tinnoibat =0  WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");



	}	

	}

	

	if(@$_REQUEST['hienthi']!='')

	{

	$id_up = @$_REQUEST['hienthi'];

	$sql_sp = "SELECT id,hienthi FROM table_blog where id='".$id_up."' ";

	$d->query($sql_sp);

	$cats= $d->result_array();

	$hienthi=$cats[0]['hienthi'];

	//echo "id:". $spdc1;

	if($hienthi==0)

	{

	$sqlUPDATE_ORDER = "UPDATE table_blog SET hienthi =1 WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}

	else

	{

	$sqlUPDATE_ORDER = "UPDATE table_blog SET hienthi =0  WHERE  id = ".$id_up."";

	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");



	}	

	}

	

	$sql = "select * from #_blog where 1 = 1  ";

	if(isset($_GET['keyword'])) $sql.=" And ten_vi like '%$_GET[keyword]%' or tenkhongdau like '%$_GET[keyword]%'";

	if(@(int)$_REQUEST['id_cat']!='')

	{

	$sql.=" and  	idlt=".$_REQUEST['id_cat']."";

	}

	$sql.=" order by id desc";

	

	$d->query($sql);

	$items = $d->result_array();

	

	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

	$keyword = isset($_GET['keyword']) ? "&keyword=".$_GET['keyword'] : "";

	$url="index.php?com=blog&act=man".$keyword."";

	$maxR=20;

	$maxP=4;

	$paging=paging($items, $url, $curPage, $maxR, $maxP);

	$items=$paging['source'];

}



function get_item(){

	global $d, $item,$items;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	if(!$id)

		transfer("Không nhận được dữ liệu", "index.php?com=blog&act=man");

	

	$sql = "select * from #_blog where id='".$id."'";

	$d->query($sql);

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=blog&act=man");

	$item = $d->fetch_array();



$sql = "SELECT distinct t.id,t.ten_vi,nt.blog_id FROM  table_tags t left join ( select * from table_blogs_tags where blog_id = '".$id."') nt on nt.tag_id = t.id";	



$d->query($sql);



	$items = $d->result_array();

}



function save_item(){

	global $d;

	$file_name=fns_Rand_digit(0,9,8);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=blog&act=man");

	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	if($id){

		$id =  themdau($_POST['id']);

		

		if($photo = upload_image("file", 'jpg|png|gif',_upload_blog,$file_name)){

			$data['photo'] = $photo;

			$data['thumb'] = create_thumb($data['photo'], 150,85, _upload_blog,$file_name);

			$d->setTable('blog');

			$d->setWhere('id', $id);

			$d->select();

			if($d->num_rows()>0){

				$row = $d->fetch_array();

				delete_file(_upload_blog.$row['photo']);

				delete_file(_upload_blog.$row['thumb']);

			}

		}				

                $data['id_item'] = $_POST['id_item'];

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

		

		$d->setTable('blog');

		$d->setWhere('id', $id);

		if($d->update($data))

				{

$d->reset();

$d->setTable('blogs_tags');

$d->setWhere('blog_id', $id);				

$d->delete();

foreach($_POST['check_list'] as $check) {

            if(IsChecked('check_list',$check))

            {

               $d->reset();

               $sql = "insert into #_blogs_tags(blog_id,tag_id) values ('".$id."','".$check."')";

	       $d->query($sql);

            }

    }

redirect("index.php?com=blog&act=man");

}

		else

			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=blog&act=man");

	}else{

		

		if($photo = upload_image("file", 'jpg|png|gif',_upload_blog,$file_name)){

			$data['photo'] = $photo;

			$data['thumb'] = create_thumb($data['photo'], 120,80, _upload_blog,$file_name);

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

		$data['nguoitao'] = $_SESSION['login']['username'];

		$d->setTable('blog');

		if($d->insert($data)){

$d->setTable('blog');

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

               $sql = "insert into #_blogs_tags(blog_id,tag_id) values ('".$row['id']."','".$check."')";

	       $d->query($sql);

            }

    }

}



			redirect("index.php?com=blog&act=man");



}

		else

			transfer("Lưu dữ liệu bị lỗi", "index.php?com=blog&act=man");

	}

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

function delete_item(){

	global $d;

	

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);

		

		$d->reset();

		$sql = "select * from #_blog where id='".$id."'";

		$d->query($sql);

		if($d->num_rows()>0){

			while($row = $d->fetch_array()){

				delete_file(_upload_blog.$row['photo']);

				delete_file(_upload_blog.$row['thumb']);

			}

			$sql = "delete from #_blog where id='".$id."'";

			$d->query($sql);

		}

		

		if($d->query($sql))

			redirect("index.php?com=blog&act=man");

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=blog&act=man");

	}else transfer("Không nhận được dữ liệu", "index.php?com=blog&act=man");

}

//===========================================================

function get_cats(){

	global $d, $items, $paging;

	$sql = "select * from #_blog_item order by stt";

	$d->query($sql);

	$items = $d->result_array();

	

	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;

	$url="index.php?com=blog&act=man_cat";

	$maxR=20;

	$maxP=4;

	$paging=paging($items, $url, $curPage, $maxR, $maxP);

	$items=$paging['source'];

}



function get_cat(){

	global $d, $item;

	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	if(!$id)

	transfer("Không nhận được dữ liệu", "index.php?com=blog&act=man_cat");

	

	$sql = "select * from #_blog_item where id='".$id."'";

	$d->query($sql);

	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=blog&act=man_cat");

	$item = $d->fetch_array();

}



function save_cat(){

	global $d;

	$file_name_item=fns_Rand_digit(0,9,5);

	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=blog&act=man_cat");

	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	if($id){

		//$data['id_cat'] = (int)$_POST['id_cat'];

		$data['ten_vi'] = $_POST['ten_vi'];

		$data['ten_en'] = $_POST['ten_en'];

		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);

		$data['stt'] = $_POST['stt'];		

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		

		$data['ngaysua'] =time();	

		$d->setTable('blog_item');

		$d->setWhere('id', $id);

		if($d->update($data))

			redirect("index.php?com=blog&act=man_cat&curPage=".$_REQUEST['curPage']."");

		else

			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=blog&act=man_cat");

	}else{

		$data['id_cat'] = (int)$_POST['id_cat'];

		$data['ten_vi'] = $_POST['ten_vi'];

		$data['ten_en'] = $_POST['ten_en'];

		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);

		$data['stt'] = $_POST['stt'];	

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		

		$data['ngaytao'] =time();	

		

		$d->setTable('blog_item');

		if($d->insert($data))

			redirect("index.php?com=blog&act=man_cat");

		else

			transfer("Lưu dữ liệu bị lỗi", "index.php?com=blog&act=man_cat");

	}

}





function get_items_tag(){



	global $d, $items;



	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

	$sql = "select NT.id,ten_vi,ten_en from #_blogs_tags NT inner join #_tags T on NT.tag_id = T.id  where blog_id = '$id'";	



	$sql.=" order by NT.id desc";



	



	$d->query($sql);



	$items = $d->result_array();



}





function delete_tag(){

	global $d;

	$new_id =  themdau($_GET['new_id']);

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);



		$d->setTable('blogs_tags');

		$d->setWhere('id', $id);

		$d->select();

		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=blog&act=man_tag&id=".$new_id."");			

		if($d->delete()){

redirect("index.php?com=blog&act=man_tag&id=".$new_id."");

}

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=blog&act=man_tag&id=".$new_id."");

	}else transfer("Không nhận được dữ liệu", "index.php?com=blog&act=man_tag&id=".$new_id."");

}



function get_tag()

{

global $d, $items, $paging;

$id = isset($_GET['id']) ? themdau($_GET['id']) : "";

$sql = "select * from #_tags T where id not in ( select tag_id as id from #_blogs_tags NT where blog_id = '$id')";	



	$sql.=" order by id desc";



	



	$d->query($sql);



	$items = $d->result_array();



}



function delete_cat(){

	global $d;

	if(isset($_GET['id'])){

		$id =  themdau($_GET['id']);

		$d->reset();		

		$sql = "delete from #_blog_item where id='".$id."'";

		if($d->query($sql))

			redirect("index.php?com=blog&act=man_cat");

		else

			transfer("Xóa dữ liệu bị lỗi", "index.php?com=blog&act=man_cat");

	}else transfer("Không nhận được dữ liệu", "index.php?com=blog&act=man_cat");

}





function delete_video(){



	global $d;



	if(isset($_GET['id'])){



		$id =  themdau($_GET['id']);	



			$blogid =  themdau($_GET['blogid']);	



		$d->reset();



		$sql = "select * from #_video_blog where id='".$id."'";



		$d->query($sql);



		if($d->num_rows()>0){



			while($row = $d->fetch_array()){

				delete_file(_upload_video.$row['link']);

			}



			$sql = "delete from #_video_blog where id='".$id."'";



			$d->query($sql);



		}	



		if($d->query($sql))



			redirect("index.php?com=blog&act=man_video&blogid=".$blogid."");



		else



			transfer("Xóa dữ liệu bị lỗi", "index.php?com=blog&act=man_video&blogid=".$blogid."");



	}else transfer("Không nhận được dữ liệu", "index.php?com=blog&act=man_video&blogid=".$blogid."");



}



?>