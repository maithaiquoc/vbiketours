

<h3>Tag</h3>





<form name="frm" method="post" action="index.php?com=tag&amp;act=save&amp;curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">	 


  


	<b>Name</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br />





    <?php /*?><b>Tên_EN</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /> 
<?php */?>




	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />





	<input type="submit" value="Save" class="btn" />





	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=tag&act=man'" class="btn" />





</form>