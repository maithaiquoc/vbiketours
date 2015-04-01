<?php
	session_start();
	if(empty($_POST))
	{
		echo 'error1';
		exit();
	}
	if($_POST['noidung']==NULL || $_POST['noidung']==''){
		echo 'error_empty';
		exit();	
	}
	if($_SESSION['captcha_code']!= strtoupper($_POST['capcha']))
	{
		echo 'error_cc';
		exit();
	}
	@define ( '_lib' , '../admin/lib/');
	include_once _lib."config.php";
	include_once _lib."class.database.php";
	include_once _lib."functions.php";
	$d = new database($config['database']);
	
	@$ten = addslashes(mysql_escape_string($_POST['ten']));
	@$email =  addslashes(mysql_escape_string($_POST['email']));
	@$noidung =  addslashes(mysql_escape_string($_POST['noidung']));
	@$id_pro = intval($_POST['id_pro']);
	@$ngaydang = time();
	
	$d->reset();
	$sql= "select id from #_product where id = $id_pro";
	$d->query($sql);
	$product=$d->fetch_array();
	if(!empty($product))
	{
		$d->reset();
		$sql="INSERT INTO #_binhluan (id_pro, ten, email, noidung, ngaydang, hienthi) VALUES ('".$product['id']."', '".$ten."', '".$email."', '".$noidung."', '".$ngaydang."', '1');";
		
		$d->query($sql);
		echo '<div class="line_cmt"><div class="date">'.make_date($ngaydang).'</div>
			<a class="cmt_name">'.$ten.'</a>: '.$noidung.'</div>';	
	}
	else
		echo 'error2';
	unset($_SESSION['captcha_code']);