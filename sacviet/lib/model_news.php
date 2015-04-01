<?php
	
	@define ( '_lib' , '../admin/lib/');
	include_once "config.php";
	include_once "class.database.php";
	include_once "functions.php";
	
	$d = new database($config['database']);
	@$email= $_POST['email'];
	@$ten = $_POST['name'];
	@$noidung =  $_POST['comment'];
	@$id_pro = $_POST['id'];
	@$ngaydang = date("Y-m-d");
	@$ngaydang1 = date("d-m-Y h:i:s A");
		$d->reset();
		$sql="INSERT INTO #_new_comment (id_new,ten,noidung,ngaytao,email) VALUES ('".$id_pro."', '".$ten."', '".$noidung."', '".$ngaydang."', '".$email."');";		
		$d->query($sql);	
		

@$html = '<ul class="deblog_load_comemt">
<li class="deblog_comm" style=""><p class="photo_comm_name">'.$ten.' </p>
<p class="photo_comm_email">'.$email.' </p>
<p class="photo_com_date">'.$ngaydang1.'</p></li>											
<li class="deblog_comm"style="">'.$noidung.'</li>
<li class="" onclick="javascript:$(\'#product_form_comment\').show();"><button class="de_blog_reply" style="" type="submit"> Reply </button></li>
</ul>';
			
			echo $html;
?>
