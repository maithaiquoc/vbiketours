
<h3>Thêm danh mục</h3>
<form name="frm" method="post" action="index.php?com=img&act=save_cat" enctype="multipart/form-data" class="nhaplieu">		  
     <?php if ($_REQUEST['act']=='edit_cat')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_hinhanh.$item['thumb']?>"  width="120" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_product_type?><br />
    <br />
    <b>Tên</b> <input type="text" name="ten_vi" value="<?=$item['ten_vi']?>" class="input" /><br /><br>      
    <b>Tên ( english )</b> <input type="text" name="ten_en" value="<?=$item['ten_en']?>" class="input" /><br /><br>      
     <b>Mô tả</b>	
        <div>    
    <textarea name="mota_vi" cols="50" rows="5" id="mota_vi"><?=@$item['mota_vi']?></textarea>        
  </div>  
  <b>Mô tả ( english )</b>	    
    <div>    
    <textarea name="mota_en" cols="50" rows="5" id="mota_en"><?=@$item['mota_en']?></textarea>        
  </div>
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=img&act=man_cat'" class="btn" />
</form>