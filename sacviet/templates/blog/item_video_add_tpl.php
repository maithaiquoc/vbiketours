<script>

function submitform()

{

var ten =document.getElementById("ten_vi").value;

if(ten == null || ten == ""){

alert("Hãy nhập tên video");

return false;

}

else

{

var x = document.getElementById("bylink").checked;

if(x == true){

var _ten =document.getElementById("txtbylink").value;

if(_ten == ""){

alert("Hãy nhập đường dẫn video");

return false;

}

}



document.frm.submit();

}



}

function choosemode()

{

var x = document.getElementById("bylink").checked;

if(x == true){

document.getElementById("pnbylink").style.display = "none";

document.getElementById("pbylink").style.display = "block";

}else

{

document.getElementById("pbylink").style.display = "none";

document.getElementById("pnbylink").style.display = "block";

}

}

</script>



<h3>Video</h3>

<form name="frm" method="post" action="index.php?com=blog&act=save_video" enctype="multipart/form-data" class="nhaplieu">	

    <br />



    <b>Tiêu đề</b> <input type="text" name="ten_vi" id="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br />  



    <b>Tiêu đề ( english )</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br />   

   	

<?php if ($_REQUEST['act']==video)

	{?>

	<b>Video hiện tại:</b><?=$item['link']?><br />

	<?php }?> 

     





<div id="pnbylink" style="display:none;"><br /><b>Upload bằng link</b><input type="checkbox" onclick="choosemode();" id="bylink" name="bylink" checked="checked"><br />

<br /><b>Upload video:</b> <input type="file" name="filevideo" /> <?=_video_type?><br />

    <br /></div>



<b>Video link</b>  

<input type="text" name="txtbylink" id="txtbylink" value="<?=@$item['link']?>" class="input"/>



    <br />





	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>



	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />

	



	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />

	

	<input type="hidden" name="blogid" id="blogid" value="<?=$_GET['blogid']?>" />



	<input type="button" value="Lưu" class="btn" onclick="return submitform();" />



	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=blog&act=man_video&blogid=<?=$_GET['blogid']?>'" class="btn" />



</form>