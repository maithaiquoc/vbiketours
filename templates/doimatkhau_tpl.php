<script type="text/javascript">
function dcv_random(a){
	for(var b="",c=0;c<a;c++)b+="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890".charAt(Math.floor(Math.random()*62));
	return b
}
function nv_change_captcha(a,b){
	var c=document.getElementById(a);
	nocache=dcv_random(10);
	c.src="captcha_image.php?&nocache="+nocache;	
	document.getElementById(b).value="";return!1
}
function isNumberKey(evt)
 {
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
 return false;
 return true;
 }

</script>

<script>
	function changepassword()
	{
		var curpass = $('#curpass').val();
var mbm= $('#captcha').val();
		var newpass = $('#newpass').val();
		var newpassconfirm = $('#newpassconfirm').val();
		
		if(curpass == '' || newpass == '' || newpassconfirm == '' || mbm == ''){
		
alert ('<?=_nhapdaydutt?>');
		}
		else
		{
			if(newpass != newpassconfirm){
				alert('<?=_newpass?>');
			}
			else
				$( "#btnChangePassword" ).click();
		}
	}
	</script>
	<?php		
	if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){	
	
	$curpass = isset($_POST['curpass']) ? trim($_POST['curpass']) : "";
	$newpass = isset($_POST['newpass']) ? trim($_POST['newpass']) : "";
	$newpassconfirm = isset($_POST['newpassconfirm']) ? trim($_POST['newpassconfirm']) : "";
	if (isset($_POST['btnChangePassword'])){
$captcha = $_POST['captcha'];

		if($_SESSION['captcha_code'] != $captcha ){
			transfer(_mabaove, "doi-mat-khau.html");
		}

	$d->reset();
		$sql_login_query = "select * from table_user where password=md5('".$curpass."') and  md5(username)=md5('".$_SESSION['username']."')";
		$d->query($sql_login_query);
		$row_detail_login = $d->fetch_array();
		
		if(!empty($row_detail_login))
		{
			$d->reset();
			$sql_update_pass_info = "UPDATE #_user SET password=md5('".$newpass."') WHERE username ='".$_SESSION['username']."'";
			
			$d->query($sql_update_pass_info);
			echo "<script>alert('"._doimatkhauthanhcong."');window.location.assign('thong-tin.html');</script>";			
		}	
		else
		{		
			alert(_matkhaukhongdung);
		}	


	}

$d->reset();
		$sql_info = "select * from #_user where username='".$_SESSION['username']."'";
		$d->query($sql_info);
		$row_detail_info = $d->fetch_array();	
?>

<div id="container">
 	<div id="bg_center1"style="margin-top:40px">
       		<img src="images/banner_content.jpg" alt="banner" title="">
    </div>
    <div id="body_spct" style="height:auto;padding-top:80px; width:95%;">
		<div class="" style="padding-left:3px;padding-bottom:10px;text-align:left;">
			<?=_trangchu?> &gt;&gt; <?=_thaydoimatkhau?> &gt;&gt;<?=$row_detail_info['ten']?>		    	    						
		</div>				
		<div class="row signin row-fluid" style=" ">
			<div class="" style="">
			<form class="form-vertical" id="acc-pass-form" action="" method="post">	
				<ul class="matkhauleft" style="margin-left: 20px;">
				<li style=""><?=_matkhaucu?></li>
				<li style="">
				    <input id="curpass" name="curpass" value="<?=$curpass?>" class="" type="password" placeholder="<?=_password?>" title="" style="" />
				</li>
				<li style=""><?=_matkhaumoi?></li>
				<li style="">
				    <input class="" id="newpass" name="newpass" value="<?=$newpass?>" type="password" placeholder="<?=_matkhaumoi?>" title="" style="" />
				</li>	
				<li style=""><?=_confirmpass?></li>
				<li style="">
				    <input class="" id="newpassconfirm" name="newpassconfirm" value="<?=$newpassconfirm?>" type="password" placeholder="<?=_confirmpass?>" title="" style="" />
<input type="submit" id="btnChangePassword" name="btnChangePassword" style="display:none;" />
				</li>	
<li style=""><?=_maxn?></li>
</li>
<li style="">
<input type="text" id="captcha" name="captcha" style="width: 140px; height:34px;margin-right:20px; float:left;" /> 
<div style="float:left;">
<img src="./captcha_image.php" name="vimg" id="vimg" style="height:27px;" /> 
<img src="images/reload.png" alt="Reload" onclick="nv_change_captcha('vimg','fcode_iavim');" style="cursor: pointer;width:30px" />

</div>
</li>

				<li style="width:100%; float: left;">
<button class="thongtin_button" type="button" style="width:150px;" onclick="changepassword();"> <?=_thaydoi?></button>

</li>
				</ul>
<ul class="thongtin_group2">	
<li class="thongtin_button">
					<button class="thongtin_button" type="button" onclick="javascript:window.location.assign('thong-tin.html');"><?=_thongtin?></button>
				</li>			
				<li class="thongtin_button">
					<button class="thongtin_button" type="button" onclick="javascript:window.location.assign('thay-doi-thong-tin.html');"><?=_thaydoithongtin?></button>
				</li>
				<li class="thongtin_button">					
					<button class="thongtin_button" type="button" onclick="javascript:window.location.assign('doi-mat-khau.html');"><?=_thaydoimatkhau?></button>
				</li>
<li class="thongtin_button">					
					<button class="thongtin_button" type="button" onclick="javascript:window.location.assign('orders.html');"><?=_giohang?></button>
				</li>				
			</ul>

				
			</form>
			
			</div>			
		</div>	
					
	</div>
</div>

<?php		
}
?>