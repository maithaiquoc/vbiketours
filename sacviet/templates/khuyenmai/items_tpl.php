<h3><a href="index.php?com=khuyenmai&act=add">Thêm chương trình khuyến mãi</a></h3>

<table class="blue_table">

	<tr>
		<th style="width:5%;">Stt</th>
        <th style="width:50%;">Tên</th>		<th style="width:5%;">Thêm sản phẩm</th>
		<th style="width:5%;">Thông báo</th>
	  <th style="width:5%;">Áp dụng</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>		
	</tr>
    
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;" align="center"><?= $i + 1 ?></td>
        <td style="width:50%;" align="center"><a href="index.php?com=khuyenmai&act=edit&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?></a></td>
		        
        <td style="width:5%;">
<a href="index.php?com=khuyenmai&act=product&id=<?=$items[$i]['id']?>">Thêm sản phẩm</a></td>
		<td style="width:5%;">

<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
<a href="index.php?com=khuyenmai&act=notify&id=<?=$items[$i]['id']?>">Thông báo</a>
		<?php 
		}
		?>
</td>
<td style="width:5%;">		
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=khuyenmai&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>
		<?php 
		}
		else
		{
		?>
         <a href="index.php?com=khuyenmai&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>
         <?php
		 }?>        </td>
		<td style="width:5%;" align="center"><a href="index.php?com=khuyenmai&act=edit&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:5%;"><a href="index.php?com=khuyenmai&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>		
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=khuyenmai&act=add"><img src="media/images/add.jpg" border="0"  /></a>

<div class="paging"><?=$paging['paging']?></div>