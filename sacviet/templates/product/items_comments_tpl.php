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

		location.href = "index.php?com=product&act=man&keyword="+keyword;

		loadPage(document.location);

			

}



</script>

<script language="javascript">

	function select_onchange()

	{

		var a=document.getElementById("id_list");

		window.location ="index.php?com=product&act=man&id_list="+a.value;	

		return true;

	}

					

</script>

<h3><a href="index.php?com=product&act=add">Sản phẩm - Comments</a></h3>

Tìm kiếm: <input name="keyword" id="keyword" type="text" /> <input type="button" value=" Tìm "  onclick="onSearch(event)"/>

<table class="blue_table">

	<tr>
        <th style="width:25%;">Sản phẩm</th> 
		<th style="width:25%;">Tên</th>    
		<th style="width:25%;">Email</th>    
		<th style="width:25%;">Nội dung</th>    
		<th style="width:25%;">Ngày viết</th>  
		<th style="width:5%;">Xóa</th>
	</tr>

	<?php   for($i=0, $count=count($items_comments); $i<$count; $i++){?>

	<tr>
		
<td style="width:5%;"><a href="index.php?com=product&act=edit&id_list=<?=$items_comments[$i]['id_list']?>&id_cat=<?=$items_comments[$i]['id_cat']?>&id_item=<?=$items_comments[$i]['id_item']?>&id=<?=$items_comments[$i]['id_product']?>" style="text-decoration:none;"><?=$items_comments[$i]['ten_vi']?></a></td>
<td style="width:5%;"><?=$items_comments[$i]['ten']?></td>
<td style="width:5%;"><?=$items_comments[$i]['email']?></td>
<td style="width:5%;"><a href="index.php?com=product&act=reply&id=<?=$items_comments[$i]['id']?>"><?=$items_comments[$i]['noidung']?></a></td>
<td style="width:5%;"><?=date('d-m-Y h:i:s A',$items_comments[$i]['ngaytao'])?></td>
<td style="width:5%;"><a href="index.php?com=product&act=delete_item_comments&id=<?=$items_comments[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>

	<?php	 }?>

    </table>
<div class="paging"><?=$paging['paging']?></div>