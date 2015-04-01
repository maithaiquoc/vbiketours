<h3>Photo</h3>



<form name="frm" method="post" action="index.php?com=hasp&act=save_photo&idc=<?=$_REQUEST['idc']?>" enctype="multipart/form-data" class="nhaplieu">



<?php for($i=0; $i<5; $i++){?>

	

	<b>Photo <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> <?=_product_type?><br />

    <br />

    

<b>No.</b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />

	<b>Show</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />

	

<?php }?>

	

	<input type="submit" value="Save" class="btn" />

	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=hasp&act=man_photo'" class="btn" />

</form>