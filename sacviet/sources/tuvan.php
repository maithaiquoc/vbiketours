<?php	if(!defined('_source')) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$urldanhmuc ="";
$urldanhmuc.= (isset($_REQUEST['id_list'])) ? "&id_list=".addslashes($_REQUEST['id_list']) : "";
$urldanhmuc.= (isset($_REQUEST['id_cat'])) ? "&id_cat=".addslashes($_REQUEST['id_cat']) : "";
$urldanhmuc.= (isset($_REQUEST['id_item'])) ? "&id_item=".addslashes($_REQUEST['id_item']) : "";

$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "tuvan/items";
		break;
	case "add":		
		$template = "tuvan/item_add";
		break;
	case "edit":		
		get_item();
		$template = "tuvan/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
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
	global $d, $items, $paging,$urldanhmuc;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_tuvan where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tuvan SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tuvan SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_comment";	
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
	$sql.=" order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=tuvan&act=man".$urldanhmuc;
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item,$ds_tags;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=tuvan&act=man");	
	$sql = "select * from #_comment where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tuvan&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tuvan&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_tuvan,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 210, 170, _upload_tuvan,$file_name,1);		
			$d->setTable('comment');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tuvan.$row['photo']);	
				delete_file(_upload_tuvan.$row['thumb']);				
			}
		}					 	
		
		
		//$data['id_item'] = (int)$_POST['id_item'];		
		$data['ten'] = $_POST['ten'];	
		
		//$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['diachi'] = $_POST['diachi'];	
		$data['dienthoai'] = $_POST['dienthoai'];				
		$data['email'] = $_POST['email'];	
		$data['noidung'] = $_POST['noidung'];	
		$data['traloi'] = $_POST['traloi'];									
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('comment');
		$d->setWhere('id', $id);
		if($d->update($data)){
			$sql1="update table_comment set daxem='1' where id='$id'";
			mysql_query($sql1);
				
	
				/*	$subject = "Thư trả lời hỏi đáp từ ".$row_setting['title'];
					$body = '<table>';
					$body .= '
						<tr>
							<th colspan="2">&nbsp;</th>
						</tr>
						<tr>
							<th colspan="2">Thư liên hệ từ website Minh Cát</th>
						</tr>
						<tr>
							<th colspan="2">&nbsp;</th>
						</tr>
						<tr>
							<th>Họ tên :</th><td>'.$_POST['ten'].'</td>
						</tr>
						<tr>
							<th>Địa chỉ :</th><td>'.$_POST['diachi'].'</td>
						</tr>
						<tr>
							<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
						</tr>
						<tr>
							<th>Email :</th><td>'.$_POST['email'].'</td>
						</tr>
						<tr>
							<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
						</tr>
						<tr>
							<th>Trả lời:</th><td>'.$_POST['traloi'].'</td>
						</tr>';
					$body .= '</table>';
					
							include_once "../phpmailer/class.phpmailer.php";
				//Khởi tạo đối tượng
				$mail = new PHPMailer();
				//Thiet lap thong tin nguoi gui va email nguoi gui
				$mail->IsSMTP(); // Gọi đến class xử lý SMTP
				$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
				$mail->Host       = "116.193.76.22";     // Thiết lập thông tin của SMPT
				$mail->Username   = 'daitayduong@dtdvn.com'; // SMTP account username
				$mail->Password   = 'MSD7Ap6j';            // SMTP account password
				$mail->SetFrom($row_setting['email'],$row_setting['ten']);
				
				//Thiết lập thông tin người nhận
				$mail->AddAddress($_POST['email'],$_POST['ten']);
				
				//Thiết lập email nhận email hồi đáp
				//nếu người nhận nhấn nút Reply
				$mail->AddReplyTo($row_setting['email'],$row_setting['ten']);
				
				/*=====================================
				 * THIET LAP NOI DUNG EMAIL
				 *=====================================*/
				
				//Thiết lập tiêu đề
				/*$mail->Subject    = "Thông tin tư vấn";
				
				//Thiết lập định dạng font chữ
				/*$mail->CharSet = "utf-8";
				
				$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
				
				//Thiết lập nội dung chính của email
				/*$mail->MsgHTML($body);
				
				if(!$mail->Send()) {
							 transfer( "Có lỗi xảy ra!","index.php?com=tuvan&act=man&curPage=".$_REQUEST['curPage']."");
				} else {
							 
							transfer("Gửi trả lời thành công!<br/>", "index.php?com=tuvan&act=man&curPage=".$_REQUEST['curPage']."");	
				}	
		*/
			
			
			//redirect("index.php?com=tuvan&act=man&curPage=".$_REQUEST['curPage']."");*/
			transfer( "Lưu dữ liệu thành công!","index.php?com=tuvan&act=man&curPage=".$_REQUEST['curPage']."");
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tuvan&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_tuvan,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 210, 170, _upload_tuvan,$file_name,1);		
		}		
		
		
	
		$data['id_item'] = (int)$_POST['id_item'];		
		$data['ten'] = $_POST['ten'];	
	
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['diachi'] = $_POST['diachi'];	
		$data['dienthoai'] = $_POST['dienthoai'];				
		$data['email'] = $_POST['email'];	
		
		$data['mota'] = $_POST['mota'];	
	
		$data['noidung'] = $_POST['noidung'];			
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('comment');
		if($d->insert($data))
		{		
			
		
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tuvan&act=man");
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
		
			$sql = "delete from #_comment where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=tuvan&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tuvan&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=tuvan&act=man");
}


?>