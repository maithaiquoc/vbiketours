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

		location.href = "index.php?com=kygoi&act=man&keyword="+keyword;

		loadPage(document.location);

			

}



</script>
<h3><a href="javascript:;">Ký gởi</a></h3>

Tìm kiếm: <input name="keyword" id="keyword" type="text" /> <input type="button" value=" Tìm "  onclick="onSearch(event)"/>

<table class="blue_table">

	<tr>

        <th style="width:25%;">Doanh nghiệp</th> 
        <th style="width:30%;">Sản phẩm</th>  
        <th style="width:10%;">Hình</th>
        <th style="width:10%;">Giá</th>
        <th style="width:10%;">Chiếc khấu</th>
		<th style="width:10%;">Ngày đăng</th>
		<th style="width:5%;">Duyệt</th>
		<th style="width:5%;">Xóa</th>
	</tr>

	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>

		<td style="width:5%;"><?=$items[$i]['ten']?></td>
<td style="width:5%;">
<a href="index.php?com=kygoi&act=edit&id=<?=$items[$i]['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>">
<?=$items[$i]['tensp']?>
</a>
</td>
<td style="width:5%;">
<img src="<?=_upload_product.$items[$i]['photo']?>" style="width:100px; height:100px;" border="0"/>
</td>
<td style="width:5%;"><?=$items[$i]['gia']?></td>
<td style="width:5%;"><?=$items[$i]['chietkhau']?></td>
<td style="width:5%;"><?=$items[$i]['ngaytao']?></td>

<td style="width:5%;">
<?php 
		if(@$items[$i]['duyet']==1)
		{
		?>
		<img src="media/images/active_1.png" border="0" />
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=kygoi&act=approve&id=<?=$items[$i]['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>  
</td>
		<td style="width:5%;"><a href="index.php?com=kygoi&act=delete&id=<?=$items[$i]['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>

	</tr>

	<?php	}?>

    </table>
<div class="paging"><?=$paging['paging']?></div>