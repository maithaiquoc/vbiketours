<h3>Photo</h3>



<form name="frm" method="post" action="index.php?com=hasp&act=save_photo&id=<?=$_REQUEST['id'];?>&idc=<?=$_REQUEST['idc']?>" enctype="multipart/form-data" class="nhaplieu">

	

	<b>&nbsp;</b> <img src="<?=_upload_duan.$item['photo']?>"  width="100" height="100"/><br />

	<b>Photo </b> <input type="file" name="file" /> <?=_product_type?><br />

	  <br />

<b>No. </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />

	<b>Show</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />

	

	<input type="hidden" name="id" value="<?=$item['id']?>" />

	<input type="submit" value="Save" class="btn" />

	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=hasp&act=man_photo'" class="btn" />

</form>