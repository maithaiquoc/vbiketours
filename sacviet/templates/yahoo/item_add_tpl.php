<h3>Add headline</h3>

<form name="frm" method="post" action="index.php?com=yahoo&act=save" enctype="multipart/form-data" class="nhaplieu">
	<b>Title</b> 
	<input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" style="width:600px" /><br />	
   <?php /*?> <b>Tên tiếng anh</b> 
	<input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br />	
	<b>Yahoo</b>
	<input type="text" name="yahoo" value="<?=@$item['yahoo']?>" class="input" /><br /> 
    	<!--<b>Skype</b>
	<input type="text" name="skype" value="<? //=@$item['skype']?>" class="input" /><br /> -->
   	<b>Điện thoại 1</b>
	<input type="text" name="dienthoai" value="<?=@$item['dienthoai_vi']?>" class="input" /><br /> 		<b>Điện thoại 2</b>	<input type="text" name="dienthoai1" value="<?=@$item['dienthoai1']?>" class="input" /><br /> 		<b>Điện thoại 3</b>	<input type="text" name="dienthoai2" value="<?=@$item['dienthoai2']?>" class="input" /><br /> <?php */?>
    <!--<b>Điện thoại tiếng việt</b>
	<input type="text" name="dienthoai_vi" value="<?//=@$item['dienthoai_vi']?>" class="input" /><br />     	
     <b>Điện thoại tiếng anh</b>
	<input type="text" name="dienthoai_en" value="<?//=@$item['dienthoai_en']?>" class="input" /><br />     	-->
	<b>No.</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>	
	<b>Show</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />		
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Save" class="btn" />
	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=yahoo&act=man'" class="btn" />
</form>