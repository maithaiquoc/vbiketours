<h3>Thêm file</h3>
<form name="frm" method="post" action="index.php?com=download&act=save" enctype="multipart/form-data" class="nhaplieu">
   <?php if (@$_REQUEST['act']=='edit'){
	   if($item['link']==''){
	?>
		<b>File hiện tại:</b><a href="<?=_upload_download.$item['file']?>" >Download file</a><br />
	<?php
		}else{
	?>
    	<b>File hiện tại:</b><a href="<?=$item['link']?>" target="_blank" >Download file</a><br />
    <?php	
		}
   	}
	?>
    <br />
	<b>Upload:</b> <input type="file" name="file" /> <strong>pdf|doc|docx|rar|zip</strong><br /><br />
    <b>Link</b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br /><br />
	<b>Link</b> <input type="text" name="link" value="<?=@$item['link']?>" class="input" />&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;<em>Nhập link download file nếu không tải file trực tiếp lên server</em><br />	
	<div style="display:none"><b>Mô tả</b>	
    <div>    
    	<textarea name="mota" cols="50" rows="5" id="mota"><?=@$item['mota']?></textarea>        
  	</div></div>	
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=download&act=man'" class="btn" />
</form>