<h3><a href="index.php?com=service&act=add">Add</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:6%;">No.</th>
		<th style="width:76%;">Name <br /></th>
		<th style="width:6%;">Show</th>
		<th style="width:6%;">Edit</th>
		<th style="width:6%;">Delete</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:6%;"><?=$items[$i]['stt']?></td>
		<td style="width:76%;" align="center"><?=$items[$i]['ten_vi']?></td>
		<td style="width:6%;">
		<?php
		 if(@$items[$i]['hienthi']==1)
		 {
		 ?>
         <img src="media/images/active_1.png" />
		 <? 
		 }
		 else
		 {
		 ?>
          <img src="media/images/active_0.png" />
          <?php
		  }?>
         </td>
		<td style="width:6%;"><a href="index.php?com=service&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:6%;"><a href="index.php?com=service&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<a href="index.php?com=service&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>