<?php	if(!defined('_source')) die("Error");

	$title_bar = "Ký gửi | ";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	if($_REQUEST['act']=='ketqua'){
	
		
		$d->reset();
		$d->setTable('dangky');
		$d->setWhere('email', $_POST['email']);
		$d->select();
		if($d->num_rows()>0) transfer("Tên đăng nhập này đã có.<br>Xin chọn tên khác.", "thanhvien.html");
		
		
		$data['username'] = $_POST['nick'];
		$data['password'] = md5($_POST['pass']);
		$data['ten'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$data['dienthoai'] = $_POST['phone'];
		$data['sex'] = $_POST['sex'];
		$data['ngaysinh'] = $_POST['dd']." - ".$_POST['mm']." - ".$_POST['yyyy'];
		$data['noidung'] = $_POST['info'];
		$data['role'] = 1;
		$data['hienthi'] = 1;
		$data['com'] = "user";
		
		$d->setTable('dangky');
		
		
		if($d->insert($data))
			transfer("Bạn đã đăng ký thành công!", "index.html");	
		else
			 transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "thanhvien.html");
		
			
	}
	global $d, $login_name;
	if($_REQUEST['act']=='login'){
		if(!empty($_POST)) 	
		$email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql = "select * from #_dangky where email='".$email."'";
	
	
	$d->query($sql);
	if($d->num_rows() == 1){
		$row = $d->fetch_array();
		if(($row['password'] == md5($password))){
			$_SESSION[$login_name] = true;
			$_SESSION['login']['email'] = $username;
			transfer("Đăng nhập thành công","thanh-toan.html");
		}
	}
	 transfer("Xin lỗi quý khách.<br>email hoặc pass của bạn bị sai, xin quý khách thử lại.", "thanhvien.html");
		
		
	}


?>