<h3>Quản lý ký gởi</h3>
<form name="frm" enctype="multipart/form-data" class="nhaplieu">	 

    <b>Tên doanh nghiệp : </b><input type="text" name="ten_vi" value="<?=@$item['ten']?>" class="input" /><br /><br />

    <b>Địa chỉ : </b><input type="text" name="ten_vi" value="<?=@$item['diachi']?>" class="input" /><br /><br />

    <b>Email :</b> <input type="text" name="ten_vi" value="<?=@$item['email']?>" class="input" /><br /> <br />

	<b>Điện thoại : </b><input type="text" name="ten_vi" value="<?=@$item['dienthoai']?>" class="input" /> <br />   <br /> 
<b>Phone : </b><input type="text" name="ten_vi" value="<?=@$item['phone']?>" class="input" /> <br />   <br /> 

    <b>Tên sản phẩm : </b> <input type="text" name="ten_vi" value="<?=@$item['tensp']?>" class="input" /><br /><br />

	<b>Hình sản phẩm : <br /><br /></b> <img src="<?=_upload_product.$item['photo']?>" style="width:250px; height:250px;" border="0"/><br /><br />
	
	<b>Mô tả sản phẩm : </b><textarea name="noidung_vi" id="noidung_vi" cols="50" rows="5"><?=@$item['noidung_vi']?></textarea>
<br /><br />

    <b>ĐK thanh toán : </b> <input type="text" name="ten_vi" value="<?=@$item['dieukien']?>" class="input" /><br /><br />

    <b>Giá thị trường : </b> <input type="text" name="ten_vi" value="<?=@$item['gia']?>" class="input" /><br /><br />

	<b>Chiết khấu : </b><input type="text" name="ten_vi" value="<?=@$item['chietkhau']?>" class="input" /> <br /><br />

    <b>Ghi chú : </b><textarea name="noidung_vi" id="noidung_vi" cols="50" rows="5"><?=@$item['ghichu']?></textarea><br /><br />
	

	<b>Duyệt : </b> <?php if(@$item['duyet']==1)
		{
		?>
		<img src="media/images/active_1.png" border="0" />
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=kygoi&act=approve_edit&id=<?=$item['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" class="btn">Duyệt</a>
         <?php
		 }?> <br /><br />
<a class="btn" href="index.php?com=kygoi&act=delete&id=<?=$item['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;">Xóa</a>

	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=kygoi&act=man<?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>'" class="btn" />
</form>		

