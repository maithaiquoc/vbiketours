<style>

.thongtin_group1

{

	width:100%;

}



.thongtin_group1 .thongtinfix1

{

	width:70%; float:left;padding: 5px;

}



.thongtin_group1 .thongtinfix

{

	width:25%; float:left; padding:10px 5px 5px 5px;

}



.thongtin_main {

height: 280px;

}

</style>



<?php		

	if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){	

	

	if (isset($_POST['btnSaveInfo'])){

		$d->reset();

		$sql_update_info = "UPDATE #_user SET ten='".$_POST['txtFullName']."', dienthoai='".$_POST['txtPhone']."', email='".$_POST['txtEmail']."', diachi='".$_POST['txtAddress']."'  WHERE username ='".$_SESSION['username']."'";

		$d->query($sql_update_info);

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

<?=_trangchu?> &gt;&gt; <?=_taikhoan?> &gt;&gt; <?=$row_detail_info['ten']?>	    						

		</div>				

		<div class="thongtin_main">

		<form action="" method="post" style="float:left;" id="info-form">

			<div class="thongtin_text" style="float:left;width:50%;">				

				<ul class="thongtin_group1">

					<li class="thongtinfix" style="width:100%;"><label style="width:25%; color: rgb(167,203,70); font-weight: bold; float:left;"><?=_hovaten?>:</label>

					

                                        <label style="width:70%; color: #000; float:left;"><?=$row_detail_info['ten']?></label></li>

					</li>	

                                        <li class="thongtinfix" style="width:100%;"><label style="width:25%; color: rgb(167,203,70); font-weight: bold; float:left;"><?=_gioitinh?>:</label>

                                        <label style="width:70%; color: #000; float:left;"><?php if($row_detail_info['sex'] == "0") echo _nam; else echo _nu; ?></label></li>

					</li>	

                                        <li class="thongtinfix" style="width:100%;"><label style="width:25%; color: rgb(167,203,70); font-weight: bold; float:left;"><?=_ngaysinh?>:</label>

                                        <?php



list($year,$month,$day) = explode('-', $row_detail_info['ngaysinh']);

$date_brith = sprintf('%s/%s/%s', $day, $month, $year);



?>

<label style="width:70%; color: #000; float:left;"><?=$date_brith?></label>

                                        </li>

					</li>			

					<li class="thongtinfix" style="width:100%;"><label style="width:25%; color: rgb(167,203,70); font-weight: bold; float:left;"><?=_email?>:</label>

                                        <label style="width:70%; color: #000; float:left;"><?=$row_detail_info['email']?></label></li>

					<li class="thongtinfix" style="width:100%;"><label style="width:25%; color: rgb(167,203,70); font-weight: bold; float:left;"><?=_dienthoai?>:</label>

                                        <label style="width:70%; color: #000; float:left;"><?=$row_detail_info['dienthoai']?></label></li>

					<li class="thongtinfix" style="width:100%;"><label style="width:25%; color: rgb(167,203,70); font-weight: bold; float:left;"><?=_diachi?>: </label>

                                        <label style="width:70%; color: #000; float:left;"><?=$row_detail_info['diachi']?></label></li>

				</ul>

			</div>

			<button class="thongtin_button" type="submit" style="display:none;" name="btnSaveInfo" id="btnSaveInfo"> Thay đổi thông tin</button>

<ul class="thongtin_group2">	

<li class="thongtin_button">

					<button class="thongtin_button" type="button" onclick="javascript:window.location.assign('thong-tin.html');"> <?=_thongtin?></button>

				</li>			

				<li class="thongtin_button">

					<button class="thongtin_button" type="button" onclick="javascript:window.location.assign('thay-doi-thong-tin.html');"><?=_thaydoithongtin?></button>

				</li>

				<li class="thongtin_button">					

					<button class="thongtin_button" type="button" onclick="javascript:window.location.assign('doi-mat-khau.html');"><?=_thaydoimatkhau?> </button>

				</li>

<li class="thongtin_button">					

					<button class="thongtin_button" type="button" onclick="javascript:window.location.assign('orders.html');"><?=_giohang?></button>

				</li>				

			</ul>

		</form>

			

		

		</div>	

					

	</div>

</div>

<?php		

}

?>