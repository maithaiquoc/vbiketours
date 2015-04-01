<script>
function onSubmit(){
var keyword = document.getElementById("noidung").value;		
if(keyword  == "") {alert("Hãy nhập nội dung trã lời."); document.getElementById("noidung").focus();} else document.frm.submit();
}
</script>
<h3>Quản lý comment</h3>
<form name="frm" method="post" action="index.php?com=bosuutap&idproduct=<?=$item['id_duan']?>&perentid=<?=$item['id']?>&act=save_reply" enctype="multipart/form-data" class="nhaplieu">	
<br />  
<b>Bộ siêu tập</b> <input type="text" value="<?=@$item['ten_vi']?>" class="input" />
<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Người đăng</b> <input type="text" value="<?=@$item['ten']?>" class="input" /><br /> 
<b>Email</b> <input type="text" value="<?=@$item['email']?>" class="input" />
<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngày đăng</b> <input type="text" value="<?=date('d-m-Y h:i:s A',$item['ngaytao'])?>" class="input" /><br /> 
<b>Nội dung</b> <textarea name="noidung_vi" id="noidung_vi" cols="100" rows="4"><?=@$item['noidung']?></textarea><br /> 
<br /> <b>Trã lời</b><br />
<b>Nội dung</b> <textarea name="noidung" id="noidung" cols="100" rows="4"></textarea><br /> 
<b>&nbsp;</b><input type="button" value="Lưu" onclick="onSubmit()" class="btn" /><input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=bosuutap&act=man_comments'" class="btn" />

<table class="blue_table">

	<tr>
		<th style="width:25%;">Tên</th>
		<th style="width:25%;">Email</th>
<th style="width:25%;">Ngày</th>
<th style="width:25%;">Nội Dung</th>
		<th style="width:5%;">Xóa</th>

	</tr>
<?php for($i=0, $count=count($items_comments); $i<$count; $i++){?>
<tr>
<td style="width:5%;"><?=$items_comments[$i]['ten']?></td>
<td style="width:5%;"><?=$items_comments[$i]['email']?></td>
<td style="width:5%;"><?=date('d-m-Y h:i:s A',$items_comments[$i]['ngaytao'])?></td>
<td style="width:5%;"><?=$items_comments[$i]['noidung']?></td>
<td style="width:5%;"><a href="index.php?com=bosuutap&act=delete_reply&perentid=<?=$items_comments[$i]['parentid']?>&id=<?=$items_comments[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
</tr>
<?php	}?>
</table>
</form>