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



<script language="javascript">



	function select_onchange()



	{



		var a=document.getElementById("id_list");



		window.location ="index.php?com=blog&act=man&id_list="+a.value;	



		return true;



	}



					



</script>



<h3><a href="javascript:;">News - Comments</a></h3>

<table class="blue_table">



	<tr>

        <th style="width:25%;">News</th> 

		<th style="width:25%;">Name</th>    

		<th style="width:25%;">Email</th>    

		<th style="width:25%;">Content</th>    

		<th style="width:25%;">Date up</th>  

		<th style="width:5%;">Delete</th>

	</tr>



	<?php   for($i=0, $count=count($items_comments); $i<$count; $i++){?>



	<tr>

		

<td style="width:5%;"><a href="index.php?com=blog&act=edit&id_cat=<?=$items_comments[$i]['id_cat']?>&id_item=<?=$items_comments[$i]['id_item']?>&id=<?=$items_comments[$i]['id_blog']?>" style="text-decoration:none;"><?=$items_comments[$i]['ten_vi']?></a></td>

<td style="width:5%;"><?=$items_comments[$i]['ten']?></td>

<td style="width:5%;"><?=$items_comments[$i]['email']?></td>

<td style="width:5%;"><a href="index.php?com=blog&act=reply&id=<?=$items_comments[$i]['id']?>"><?=$items_comments[$i]['noidung']?></a></td>

<td style="width:5%;"><?=date('M D,Y',$items_comments[$i]['ngaytao'])?></td>

<td style="width:5%;"><a href="index.php?com=blog&act=delete_item_comments&id=<?=$items_comments[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>

	</tr>



	<?php	 }?>



    </table>

<div class="paging"><?=$paging['paging']?></div>