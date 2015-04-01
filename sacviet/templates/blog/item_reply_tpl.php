<script>

function onSubmit(){

var keyword = document.getElementById("noidung").value;		

if(keyword  == "") {alert("Please enter the text replies."); document.getElementById("noidung").focus();} else document.frm.submit();

}

</script>

<h3>Manegerment comment</h3>

<form name="frm" method="post" action="index.php?com=blog&idproduct=<?=$item['id_blog']?>&perentid=<?=$item['id']?>&act=save_reply" enctype="multipart/form-data" class="nhaplieu">	

<br />  

<b>News</b> <input type="text" value="<?=@$item['ten_vi']?>" class="input" />

<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;User</b> <input type="text" value="<?=@$item['ten']?>" class="input" /><br /> 

<b>Email</b> <input type="text" value="<?=@$item['email']?>" class="input" />

<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date</b> <input type="text" value="<?=date('M D,Y',$item['ngaytao'])?>" class="input" /><br /> 

<b>Content</b> <textarea name="noidung_vi" id="noidung_vi" cols="100" rows="4"><?=@$item['noidung']?></textarea><br /> 

<br /> <b>Reply</b><br />

<b>Content</b> <textarea name="noidung" id="noidung" cols="100" rows="4"></textarea><br /> 

<b>&nbsp;</b><input type="button" value="Save" onclick="onSubmit()" class="btn" /><input type="button" value="Exit" onclick="javascript:window.location='index.php?com=blog&act=man_comments'" class="btn" />



<table class="blue_table">



	<tr>

		<th style="width:25%;">Name</th>

		<th style="width:25%;">Email</th>

<th style="width:25%;">Date</th>

<th style="width:25%;">Content</th>

		<th style="width:5%;">Delete</th>



	</tr>

<?php for($i=0, $count=count($items_comments); $i<$count; $i++){?>

<tr>

<td style="width:5%;"><?=$items_comments[$i]['ten']?></td>

<td style="width:5%;"><?=$items_comments[$i]['email']?></td>

<td style="width:5%;"><?=date('M D,Y',$items_comments[$i]['ngaytao'])?></td>

<td style="width:5%;"><?=$items_comments[$i]['noidung']?></td>

<td style="width:5%;"><a href="index.php?com=blog&act=delete_reply&perentid=<?=$items_comments[$i]['parentid']?>&id=<?=$items_comments[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>

</tr>

<?php	}?>

</table>

</form>