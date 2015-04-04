090 3 378 266<style>
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
thead {
    display: inline-block;
    width: 100%;float: left;
}
thead th {
    padding: 10px;
}
.data-table tbody {
    height: 500px;
    display: inline-block;  
    overflow: auto;
float: left;
}
.thongtin_main {
height: 600px;
}
</style>

<?php	
		$d->reset();
		$sql_info = "select * from #_donhang where username='".$_SESSION['username']."'";
		$d->query($sql_info);
		$row_detail = $d->result_array();

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
		<form action="" method="post" style="float:left;width:99%;margin-left:10px" id="info-form">
			<div class="thongtin_text" style="float:left;width: 81%;margin-top: 10px;">				
<table class="data-table" style="">
<thead>
<tr style="font-weight: bold;color: rgb(255, 255, 255);height: 45px;background-color: rgb(138, 192, 7);text-align: center;">
<th style="text-align: center;" width="50"><?=_stt?></th>
<th style="text-align: center;"  width="200"><?=_madonhang?></th>
<th style="text-align: center;"  width="150"><?=_nguoidathang?></th>
<th style="text-align: center;"  width="200"><?=_ngaydathang?></th>
<th style="text-align: center;"  width="100"><?=_trangthai?></th>
</tr>
</thead>
<tbody>
<?php
if(!empty($row_detail)){
$index = 1;
foreach($row_detail as $item){
?>
<tr style="border-bottom: 1px solid rgb(221, 221, 221); border-left: 1px solid rgb(221, 221, 221);">
<td width="50"><?= $index ?></td>
<td width="200"><?= $item['madonhang'] ?></td>
<td width="150"><?= $item['hoten'] ?></td>
<td width="200"><?=date('d-m-Y h:i:s A',$item['ngaytao'])?></td>
<td width="100">
<?php 
		   		$sql="select trangthai from #_tinhtrang where id= '".$item['trangthai']."' ";
				$d->query($sql);
				$result=$d->fetch_array();
				echo $result['trangthai'];
		   ?>
</td>
</tr>
<?php $index ++ ;} } ?></tbody>
</table>
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
