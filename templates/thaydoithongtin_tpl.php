<style>
.thongtin_group1
{
	width:100%;
}

.thongtin_group1 .thongtinfix1
{
	width:100%; float:left;margin: 5px;
}

.thongtin_group1 .thongtinfix
{
 float:left; padding:10px 5px 5px 5px;width:100%;
}

.thongtin_main {
height: 600px;
}
</style>
<script>
	function changeuserinfo()
	{
		var fullname = $('#txtFullName').val();
		var email = $('#txtEmail').val();
		var phone = $('#txtPhone').val();
		var address = $('#txtAddress').val();
		var mbm = $('#captcha').val();
		if(fullname == '' || email == '' || phone == '' || address == '' || mbm  == ''){
			alert('Hãy nhập đủ thông tin.');
		}
		else
		{
			$( "#btnSaveInfo" ).click();
		}
	}

 $(document).ready(function(){
 $('#txtngaysinh').datepicker({ dateFormat: "dd/mm/yy"});
});
</script>
<?php		
	if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){	
	
	if (isset($_POST['btnSaveInfo'])){

if($_POST['txtngaysinh'] != ""){
list($day, $month, $year) = explode('/', $_POST['txtngaysinh']);
$date = sprintf('%s-%s-%s', $year, $month,$day);

		$d->reset();
		$sql_update_info = "UPDATE #_user SET ngaysinh='".$date."',city='".$_POST['txtcity']."',quan='".$_POST['txtquan']."',sex='".$_POST['txtsex']."',ten='".$_POST['txtFullName']."', dienthoai='".$_POST['txtPhone']."', email='".$_POST['txtEmail']."', diachi='".$_POST['txtAddress']."'  WHERE username ='".$_SESSION['username']."'";

		$d->query($sql_update_info);}
else{
$d->reset();
		$sql_update_info = "UPDATE #_user SET city='".$_POST['txtcity']."',quan='".$_POST['txtquan']."',sex='".$_POST['txtsex']."',ten='".$_POST['txtFullName']."', dienthoai='".$_POST['txtPhone']."', email='".$_POST['txtEmail']."', diachi='".$_POST['txtAddress']."'  WHERE username ='".$_SESSION['username']."'";

		$d->query($sql_update_info);
}
		alert('Thay đổi thông tin thành công');	
	}
	
		$d->reset();
		$sql_info = "select * from #_user where username='".$_SESSION['username']."'";
		$d->query($sql_info);
		$row_detail_info = $d->fetch_array();
		
		
?>
<div id="container"><!-------load sp-->
 	<div id="info_bg_center" style="padding-top:50px;">
       		<img src="images/banner_content.jpg" alt="banner" title="">
    </div>
    <div id="body_spct" style="height:auto;padding-top:50px; width:95%;">
		<div class="" style="padding-left:3px;padding-bottom:10px;text-align:left;">
			<!--Trang chủ &gt;&gt; Thông tin tài khoản &gt;&gt; <?=$_SESSION['username']?>	-->	
<?=_trangchu?> &gt;&gt; <?=_thaydoithongtin?> &gt;&gt; <?=$row_detail_info['ten']?>	    						
		</div>				
		<div class="thongtin_main">
		<form action="" method="post" style="float:left;" id="info-form">
			<div class="thongtin_text" style="float:left;width:50%;">				
				<ul class="thongtin_group1">
					<li class="thongtinfix" style="width:100%;"><?=_hovaten?>:</li>
					<li> 
						<input id="txtFullName" value="<?=$row_detail_info['ten']?>" class="span12 error" type="text" name="txtFullName" maxlength="255" style="padding: 10px 0 0 10px; width: 280px;margin-left:5px" />
					</li>
<li class="thongtinfix" style="width:38%;"><?=_gioitinh?>:</li>					
<li class="thongtinfix" style="width:50%;"><?=_ngaysinh?>:</li>
<li  style="width:38%; float:left;margin-left:5px">
<input type="radio" style="margin-right:5px "name="txtsex" value="0" <?php if($row_detail_info['sex'] == "0") echo 'checked'; ?>><?=_nam?>
<input type="radio" style="margin-right:5px;margin-left:10px;"name="txtsex" value="1" <?php if($row_detail_info['sex'] == "1") echo 'checked'; ?>><?=_nu?>
 </li>			
<li  style="width:50%; float:left;">
<?php

list($year,$month,$day) = explode('-', $row_detail_info['ngaysinh']);
$date_brith = sprintf('%s/%s/%s', $day, $month, $year);

?>
<input id="txtngaysinh" value="<?= $date_brith?>" class="span12 error" type="text" 
name="txtngaysinh" maxlength="255" style="padding: 10px 0 0 10px; width: 100px;" />
</li>



<li class="thongtinfix" style="width:38%;"><?=_thanhpho?>:</li>					
<li class="thongtinfix" style="width:50%;"><?=_quan?>:</li>
<li  style="width:38%; float:left;">
<input id="txtcity" value="<?=$row_detail_info['city']?>" class="span12 error" type="text" 
name="txtcity" maxlength="255" style="padding: 10px 0 0 10px; width: 150px;margin-left:5px;" />
 </li>
<li  style="width:50%; float:left;">
<input id="txtquan" value="<?=$row_detail_info['quan']?>" class="span12 error" type="text" 
name="txtquan" maxlength="255" style="padding: 10px 0 0 10px; width: 103px;" />
</li>				

<li class="thongtinfix">Email:</li>
					<li class="thongtinfix1"><input id="txtEmail" value="<?=$row_detail_info['email']?>" class="span12 error" type="text" name="txtEmail" maxlength="255" style="padding: 10px 0 0 10px; width: 280px;" /></li>
					<li class="thongtinfix"><?=_dienthoai?>:</li>
					<li class="thongtinfix1"> <input id="txtPhone" value="<?=$row_detail_info['dienthoai']?>" class="span12 error" type="text" name="txtPhone" maxlength="255" style="padding: 10px 0 0 10px; width: 280px;" /></li>
					<li class="thongtinfix"><?=_diachi?> :</li>
					<li class="thongtinfix1"> <input id="txtAddress" value="<?=$row_detail_info['diachi']?>" class="span12 error" type="text" name="txtAddress" maxlength="255" style="padding: 10px 0 0 10px; width: 280px;" /></li>


<li class="thongtinfix" style="width:100%;"><?=_maxn?>:</li>
</li>
<li style="width:100%;">
<input type="text" id="captcha" name="captcha" style="width: 140px; height:34px;margin-right:20px; margin-left:5px;float:left;" /> 
<div style="float:left;">
<img src="./captcha_image.php" name="vimg" id="vimg" style="height:27px;" /> 
<img src="images/reload.png" alt="Reload" onclick="nv_change_captcha('vimg','fcode_iavim');" style="cursor: pointer;width:30px" />

</div>
</li>
<li style="width:100%; float: left; margin-top: 20px;">
			<button class="thongtin_button" type="button" name="btnSaveInfo1" id="btnSaveInfo1" onclick="changeuserinfo();" style="width:141px;margin-left:5px"> <?=_thaydoi?></button>
<button class="thongtin_button" type="submit" style="display:none;" name="btnSaveInfo" id="btnSaveInfo"> Thay đổi thông tin</button>
</li>
				</ul>
			</div>

<ul class="thongtin_group2">

<li class="thongtin_button">
					<button class="thongtin_button" type="button" onclick="javascript:window.location.assign('thong-tin.html');"><?=_thongtin?></button>
				</li>			
				<li class="thongtin_button">
					<button class="thongtin_button" type="button" onclick="javascript:window.location.assign('thay-doi-thong-tin.html');"><?=_thaydoithongtin?></button>
				</li>
				<li class="thongtin_button">					
					<button class="thongtin_button" type="button" onclick="javascript:window.location.assign('doi-mat-khau.html');"><?=_thaydoimatkhau?> </button>
				</li>
<li class="thongtin_button">					
					<button class="thongtin_button" type="button" onclick="javascript:window.location.assign('orders.html');"><?=_giohang?> </button>
				</li>				
			</ul>
		</form>
			
		
		</div>	
					
	</div>
</div>
<?php		
}
?>