<h3><a href="index.php?com=yahoo&act=add">Add headline</a></h3>

<table class="blue_table">
	<tr>
		<th style="width:5%;">No.</th>
		<th style="width:20%;">Title </th>
		<!--<th style="width:20%;">Nick name</th>  
        <th style="width:20%; display:none">Skype</th> 
        <th style="width:20%;">Điện thoại</th>     -->
		<th style="width:5%;">Show</th>
		<th style="width:5%;">Edit</th>
		<th style="width:5%;">Delete</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
		<td style="width:20%;"><?=$items[$i]['ten_vi']?></td>
	<?php /*?>	<td style="width:20%;"><?=$items[$i]['yahoo']?></td>  
        <td style="width:20%; display:none"><?=$items[$i]['skype']?></td>
        <td style="width:20%;"><?=$items[$i]['dienthoai_vi']?></td> <?php */?>    
		<td style="width:5%;"><?php 
		if(@$items[$i]['hienthi'])
		{
		?>
        <img src="media/images/active_1.png" />
		<? 
		}
		else
		{
		?>
        <img src="media/images/active_0.png" />
        <?
		}?>        </td>
		<td style="width:5%;"><a href="index.php?com=yahoo&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>
		<td style="width:5%;"><a href="index.php?com=yahoo&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
<div class="paging"><?=$paging['paging']?></div>