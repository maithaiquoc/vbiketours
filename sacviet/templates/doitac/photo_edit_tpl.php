<h3>Hình ảnh</h3>

<form name="frm" method="post" action="index.php?com=doitac&act=save_photo&id=<?=$_REQUEST['id'];?>" enctype="multipart/form-data" class="nhaplieu">	
	<b>&nbsp;</b>     
        <img src="<?=_upload_doitac.$item['photo']?>" width="100" />    
    <br />
	<b>Hình ảnh </b> <input type="file" name="file" /> <strong>Width: px&nbsp;Height: px&nbsp;.jpg|.gif|png</strong><br />	
    <br />
    
    <b>Link</b> <input type="text" name="mota" value="<?=@$item['link']?>" class="input" /><br /> <br />
	
   
	<b>Số thứ tự </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />
	
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=doitac&act=man_photo'" class="btn" />
</form>