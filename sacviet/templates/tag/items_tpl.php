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





		location.href = "index.php?com=tag&act=man&keyword="+keyword;





		loadPage(document.location);





			





}











</script>





<h3><a href="index.php?com=tag&amp;act=add">Add tag</a></h3>





Search: <input name="keyword" id="keyword" type="text" /> <input type="button" value=" Find "  onclick="onSearch(event)"/>





<table class="blue_table">





	<tr>		

        <th style="width:25%;">Name</th>



		<!--<th style="width:25%;">Tên (english)</th>
-->
		

		<th style="width:5%;">Edit</th>





		<th style="width:5%;">Delete</th>





	</tr>





	<?php for($i=0, $count=count($items); $i<$count; $i++){?>





	<tr>





		<td style="width:5%;"><?=$items[$i]['ten_vi']?></td>      





<!--       <td style="width:25%;"><?=$items[$i]['ten_en']?></td>-->







		<td style="width:5%;"><a href="index.php?com=tag&amp;act=edit&amp;id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>





		<td style="width:5%;"><a href="index.php?com=tag&amp;act=delete&amp;id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>





	</tr>





	<?php	}?>





    </table>





<a href="index.php?com=tag&amp;act=add"><img src="media/images/add.jpg" border="0"  /></a>











<div class="paging"><?=$paging['paging']?></div>