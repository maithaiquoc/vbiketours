<script type="text/javascript">



function doEnter(evt){



	// IE					// Netscape/Firefox/Opera



	var key;



	if(evt.keyCode == 13 || evt.which == 13){



		onSearch(evt);



	}



}



function onSearch(evt) {	



		var keyword = document.getElementById("keyword").value;		



		//var encoded = Base64.encode(keyword);



		location.href = "index.php?com=blog&act=man&keyword="+keyword;



		loadPage(document.location);



			



}







</script>

<h3><a href="index.php?com=blog&act=add">Add news</a></h3>

Search: <input name="keyword" id="keyword" type="text" /> <input type="button" value=" Find "  onclick="onSearch(event)"/>

<a href="index.php?com=blog&amp;act=man_comments">Managerment comments</a>

<table class="blue_table">



	<tr>

		<th style="width:5%;">No.</th>		

<th style="width:10%;">Category</th>

        <th style="width:50%;">Name</th>

<!--<th style="width:5%;">Video</th>-->

	  <th style="width:5%;">Show</th>

		<th style="width:5%;">Edit</th>

		<th style="width:5%;">Delete</th>

	</tr>

    

	<?php for($i=0, $count=count($items); $i<$count; $i++){?>

	<tr>

		<td style="width:5%;" align="center"><?=$items[$i]['stt']?></td>				

<td style="width:10%;">	

<?php				

$sql_danhmuc="select ten_vi from table_blog_item where id='".$items[$i]['id_item']."'";				

$result=mysql_query($sql_danhmuc);				

$item_danhmuc =mysql_fetch_array($result);

				

echo @$item_danhmuc['ten_vi']	;		

?> 

</td>

        

<td style="width:50%;" align="center"><a href="index.php?com=blog&act=edit&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?></a></td>

<!--<td style="width:5%;"><a href="index.php?com=blog&act=man_video&blogid=<?=$items[$i]['id']?>">Quản lý video</a></td>-->

<td style="width:5%;">

        

        

		

		<?php 

		if(@$items[$i]['hienthi']==1)

		{

		?>

        <a href="index.php?com=blog&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>

		<? 

		}

		else

		{

		?>

         <a href="index.php?com=blog&act=man&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>

         <?php

		 }?>        </td>

		<td style="width:5%;" align="center"><a href="index.php?com=blog&act=edit&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>

		<td style="width:5%;"><a href="index.php?com=blog&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>

	</tr>

	<?php	}?>

</table>

<a href="index.php?com=blog&act=add"><img src="media/images/add.jpg" border="0"  /></a>



<div class="paging"><?=$paging['paging']?></div>