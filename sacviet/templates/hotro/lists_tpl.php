<h3><a href="index.php?com=news&act=add_item">Add Category Faq</a></h3>







<table class="blue_table">



	<tr>



		<th style="width:5%;">No.</th>



		<!--<th style="width:20%;">Danh mục</th>-->



        <th style="width:60%;">Title</th>



		<th style="width:5%;">Show</th>



		<th style="width:5%;">Edit</th>



		<th style="width:5%;">Delete</th>



	</tr>



	<?php for($i=0, $count=count($items); $i<$count; $i++){?>



	<tr>



		<td style="width:5%;"><?=$items[$i]['stt']?></td>

       



		<td style="width:60%;"><a href="index.php?com=hotro&act=edit&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?> </a></td>



		<td style="width:5%;">



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



		<td style="width:5%;"><a href="index.php?com=hotro&act=edit&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" border="0" /></a></td>



		<td style="width:5%;"><a href="index.php?com=hotro&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>



	</tr>



	<?php	}?>



</table>



<a href="index.php?com=hotro&act=add"><img src="media/images/add.jpg" border="0"  /></a>







<div class="paging"><?=$paging['paging']?></div>