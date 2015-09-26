<script>

function submitform()

{

var ten =document.getElementById("ten_vi").value;

if(ten == ""){

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



<h3>Add video</h3>



<form name="frm" method="post" action="index.php?com=video&act=save" enctype="multipart/form-data" class="nhaplieu">		

	<?php if (@$_REQUEST['act']=='edit')

	{?>

	<b>Current Photo:</b><img src="<?=_upload_hinhanh.$item['thumb']?>"  alt="NO PHOTO" /><br />

	<?php }?>

	<b>Photo:</b> <input type="file" name="file" /> Width:1349px&nbsp;Height:600px&nbsp;(index), W: 430px;H:365px(Video clip)<?=_product_type?><br />

    <b>Title</b> <input type="text" name="ten_vi" id="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br />  
   

	

    <?php /*?><b>Tiêu đề ( english )</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /> <?php */?>

<?php if ($_REQUEST['act']==edit)

	{?>

	<b>Current Video:</b><?=$item['link']?><br />

	<?php }?> 

    

<div id="pnbylink" style="display:none;">

<input type="checkbox" onclick="choosemode();" id="bylink" name="bylink" <?=$item['bylink']=="1"? 'checked="checked"':''?>><br />
<br /><b>Upload video:</b> <input type="file" name="filevideo" /> <?=_video_type?><br />

    <br /></div>



<b>Video link</b>  

<input type="text" name="txtbylink" id="txtbylink" value="<?=@$item['link']?>" class="input"/><br />


<b>No.</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	

	<b>Show</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />

	

	

	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />

	<input type="button" value="Save" class="btn" onclick="return submitform();" />

	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=video&act=man'" class="btn" />

</form>