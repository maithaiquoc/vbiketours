<h3>Contact info</h3>

<table class="blue_table">

	<tr>		

        <th style="width:15%;">Name</th>

<th style="width:15%;">Email</th>

      <th width="6%" style="width:6%;">Subject</th> 

<th style="width:15%;">Content</th>

<th style="width:15%;">Date send</th>

		<th width="6%" style="width:6%;">Reply</th>

		<th width="6%" style="width:6%;">Delete</th>

	</tr>

	<?php for($i=0, $count=count($items); $i<$count; $i++){?>

	<tr>

		

		<td align="center" style="width:20%;"><?=$items[$i]['ten']?></td>

<td align="center" style="width:20%;"><?=$items[$i]['email']?></td>

<td align="center" style="width:20%;"><?=$items[$i]['subject']?></td>		

<td align="center" style="width:20%;"><?=catchuoi(strip_tags($items[$i]['noidung'],""),200)?></td>

		<td align="center" style="width:15%;"><?=make_date($items[$i]['ngaytao'])?></td>

		<td style="width:6%;">

		<?php 

		if(@$items[$i]['traloi']==1)

		{

		?>

        <a href="index.php?com=contact&act=add&id=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>

		<? 

		}

		else

		{

		?>

         <a href="index.php?com=contact&act=add&id=<?=$items[$i]['id']?>">Reply</a>

         <?php

		 }?>        </td>



		<td style="width:6%;"><a href="index.php?com=contact&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>

	</tr>

	<?php	}?>

</table>



<div class="paging"><?=$paging['paging']?></div>