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
		$sql="INSERT INTO #_product_comment (id_product,ten,noidung,ngaytao,email) VALUES ('".$id_pro."', '".$ten."', '".$noidung."','".$ngaydang."','".$email."');";		
		$d->query($sql);
@$html = '<ul style="">
<li style="float:left;min-width:50px;text-align:left;font-weight:bold;color(113, 103, 94)">'.$ten.'</li>
<li style="float:left;min-width:50px;text-align:left;font-weight:bold;color(113, 103, 94)">'.$email.'</li>
<li style="float:left;width:150px;text-align:left;font-weight:bold;color: rgb(206,206,206);padding-left:10px">'.$ngaydang1.'</li>	
<li style="width:100%;text-align:left;padding-top:20px;float:left;color: rgb(206,206,206)">
'.$noidung.'
</li>
<li class="" onclick="javascript:$(\'#product_form_comment\').show();"><button class="de_blog_reply" style="" type="submit"> Reply </button>
</li>
</ul>';


			
			echo $html;		
?>