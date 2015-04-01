<?php

	$title_bar = "Đăng ký | ";
	if(!empty($_POST)){
		$file_name=fns_Rand_digit(0,9,10);
		$captcha = $_POST['captcha'];

		if($_SESSION['captcha_code'] != $captcha ){
			transfer("Mã bảo vệ không đúng", "ky-gui.html");
		}
		
		$d->reset();
/*
		$d->setTable('kygui');
		$d->setWhere('email', $_POST['email']);
		$d->select();
		if($d->num_rows()>0) transfer("Tên đăng nhập này đã có.<br>Xin chọn tên khác.", "kygui.html");*/

		if($photo = load_file("file", 'jpg|png|gif|JPG|jpeg|Jpg|JPEG', _upload_product_l,$file_name)){
				$data['photo'] = $photo;				
			}

		$data['username'] = $_POST['nick'];
		$data['password'] = md5($_POST['pass']);
		$data['ten'] = $_POST['name'];
		$data['tensp'] = $_POST['tensp'];
		$data['link'] = $_POST['link'];	
		$data['diachi'] = $_POST['diachi'];
		$data['email'] = $_POST['email'];
		$data['dienthoai'] = $_POST['dienthoai'];
$data['phone'] = $_POST['phone'];
		$data['noidung_vi'] = $_POST['noidung'];
		$data['dieukien'] = $_POST['dieukien'];
		$data['ghichu'] = $_POST['ghichu'];
		$data['gia'] = $_POST['gia'];
$data['ngaytao'] = date('Y-m-d H:i:s');
		$data['chietkhau'] = $_POST['chietkhau'];
		
		//$data['dienthoai'] = $_POST['phone'];
		//$data['sex'] = $_POST['sex'];
		//$data['ngaysinh'] = $_POST['dd']." - ".$_POST['mm']." - ".$_POST['yyyy'];
		//$data['noidung'] = $_POST['info'];
		//$data['role'] = 1;
		$data['hienthi'] = 1;
		//$data['com'] = "user";
		
		$d->setTable('kygui');
		
		
		if($d->insert($data))
			echo "<script>window.location.assign('"._successkygoi."');</script>"; //transfer("Bạn đã đăng ký thành công!", "index.html");	
		else
			echo "<script>window.location.assign('"._unsuccess."');</script>"; 
		
			
	}



function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function load_file($file, $extension, $folder, $newname=''){
if(isset($_FILES[$file]) && !$_FILES[$file]['error']){

		

		$ext = end(explode('.',$_FILES[$file]['name']));

		$name = basename($_FILES[$file]['name'], '.'.$ext);

		

		if(strpos($extension, $ext)===false){

			alert('Chỉ hỗ trợ upload file dạng '.$extension);

			return false; // không hỗ trợ

		}

		

		if($newname=='' && file_exists($folder.$_FILES[$file]['name']))

			for($i=0; $i<100; $i++){

				if(!file_exists($folder.$name.$i.'.'.$ext)){

					$_FILES[$file]['name'] = $name.$i.'.'.$ext;

					break;

				}

			}

		else{

			$_FILES[$file]['name'] = $newname.'.'.$ext;

		}

		

		if (!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{

			if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{

				return false;

			}

		}

		return $_FILES[$file]['name'];

	}

	return false;
}
?>