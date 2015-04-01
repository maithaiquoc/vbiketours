<h3>Quản lý tag</h3>
<form name="frm" method="post" action="" enctype="multipart/form-data" class="nhaplieu">	
<table class="blue_table">


	<tr>		
        <th style="width:25%;">Tên vi</th>

		<th style="width:25%;">Tên en</th>


		<th style="width:5%;">Xóa</th>


	</tr>


	<?php for($i=0, $count=count($items); $i<$count; $i++){?>


	<tr>


		<td style="width:5%;"><?=$items[$i]['ten_vi']?></td>      


       <td style="width:25%;"><?=$items[$i]['ten_en']?></td>

		<td style="width:5%;"><a href="index.php?com=news&amp;act=delete_tag&amp;id=<?=$items[$i]['id']?>&amp;new_id=<?= $_GET['id'] ?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>


	</tr>


	<?php	}?>


    </table>
<input type="button" value="Thêm tag" onclick="javascript:window.location='index.php?com=news&act=add_tag&id=<?= $_GET['id'] ?>'" class="btn">
<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=news&act=man'" class="btn">
</form>