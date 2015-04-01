<h3>Quản lý video</h3>



<table class="blue_table">







	<tr>



		<th style="width:5%;">Stt</th>		



        <th style="width:80%;">Tên</th>



	    <th style="width:5%;">Hiển thị</th>



		<th style="width:5%;">Sửa</th>



		<th style="width:5%;">Xóa</th>



	</tr>



    



	<?php for($i=0, $count=count($items); $i<$count; $i++){?>



	<tr>



		<td style="width:5%;" align="center"><?=$items[$i]['stt']?></td>		        



        <td style="width:80%;" align="center"><a href="index.php?com=blog&act=video&blogid=<?= $_GET['blogid'] ?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?></a></td>



		<td style="width:5%;">    



		<?php 



		if(@$items[$i]['hienthi']==1)



		{



		?>



        <a href="index.php?com=blog&act=man_video&hienthi=<?=$items[$i]['id']?>&blogid=<?= $_GET['blogid'] ?>"><img src="media/images/active_1.png"  border="0"/></a>



		<? 



		}



		else



		{



		?>



         <a href="index.php?com=blog&act=man_video&hienthi=<?=$items[$i]['id']?>&blogid=<?= $_GET['blogid'] ?>"><img src="media/images/active_0.png" border="0" /></a>



         <?php



		 }?>        </td>



		<td style="width:5%;" align="center"><a href="index.php?com=blog&act=video&blogid=<?= $_GET['blogid'] ?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>



		<td style="width:5%;"><a href="index.php?com=blog&act=delete_video&blogid=<?= $_GET['blogid'] ?>&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>



	</tr>



	<?php	}?>



</table>

<div class="paging"><?=$paging['paging']?></div>

<a href="index.php?com=blog&act=add_video&blogid=<?= $_GET['blogid'] ?>"><img src="media/images/add.jpg" border="0"  /></a>

<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=blog&act=man'" class="btn" />