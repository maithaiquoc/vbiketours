<table class="blue_table">

	<tr>
		<th style="width:5%;">ID</th>      
        <th style="width:60%;">Tên</th>
        <th style="width:10%;">File CV</th>		
	  	<th style="width:10%;">Ngày gửi</th>		
        <th style="width:10%;">Đã duyệt</th>		
		<th style="width:5%;">Xóa</th>
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;" align="center"><?=$items[$i]['id']?></td>       		
        <td style="width:60%;" align="left">
			<b>Họ tên:</b> <?=$items[$i]['hoten']?><br/>
            <b>Địa chỉ:</b> <?=$items[$i]['diachi']?><br/>
            <b>Điện thoại:</b> <?=$items[$i]['dienthoai']?><br/>
            <b>Email:</b> <?=$items[$i]['email']?><br/>
            <b>Vị trí:</b> <?=$items[$i]['vitri']?><br/>
            <b>Ghi chú:</b> <?=$items[$i]['ghichu']?><br/>
            
        
        
        </td>
		<td style="width:10%;"><a href="<?=_upload_cv.$items[$i]['file']?>">Download</a></td>
        <td style="width:10%;"><?=date('d-m-Y',$items[$i]['ngaytao'])?></td>
        <td style="width:10%;">
        
        
		
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=hoso&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=hoso&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>        </td>		
		<td style="width:5%;"><a href="index.php?com=hoso&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<div class="paging"><?=$paging['paging']?></div>