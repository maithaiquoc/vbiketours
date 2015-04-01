<h3>Add Category</h3><form name="frm" method="post" action="index.php?com=product&act=save_list" enctype="multipart/form-data" class="nhaplieu">	    	      
    <b>Name</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>
    <?php /*?> <b>Tên ( english )</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br><?php */?>
    <b>No.</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Show</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man_list'" class="btn" />
</form>