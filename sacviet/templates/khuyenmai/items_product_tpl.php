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
		location.href = "index.php?com=khuyenmai&id=<?= $_GET['id'] ?>&act=product&keyword="+keyword;
		loadPage(document.location);
}
</script>

<script language="javascript">

	function select_onchange()
	{
		var a=document.getElementById("id_list");
		window.location ="index.php?com=khuyenmai&act=product&id=<?= $_GET['id'] ?>&id_list="+a.value;	
		return true;		}
</script>

<?php
function get_main_list()
	{
		$sql="select ten_vi,id from table_product_list  order by stt asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange()" class="main_font">
			<option value="0">Danh mục cấp 1</option>	
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{		if($row["id"]==@$_REQUEST['id_list'])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';	
		}
		$str.='</select>';
		return $str;
	}
?>

<h3>Thêm sản phẩm</h3>
Tìm kiếm: <input name="keyword" id="keyword" type="text" /> <input type="button" value=" Tìm "  onclick="onSearch(event)"/><input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=khuyenmai&act=man'" class="btn" /> <br /><input type="button" value="Áp dụng cho tất cả sản phẩm" onclick="javascript:window.location='index.php?com=khuyenmai&act=product&id=<?= $_GET['id'] ?>&applyall=1'" class="btn" /> <input type="button" value="Hũy áp dụng cho tất cả sản phẩm" onclick="javascript:window.location='index.php?com=khuyenmai&act=product&id=<?= $_GET['id'] ?>&applyall=0'" class="btn" /> <br /><input type="button" value="Áp dụng cho tất cả sản phẩm trong danh mục hiện tại" onclick="javascript:window.location='index.php?com=khuyenmai&act=product&id=<?= $_GET['id'] ?>&id_list=<?= $_GET['id_list'] ?>&applycall=1'" class="btn" /> <input type="button" value="Hũy áp dụng cho tất cả sản phẩm trong danh mục hiện tại" onclick="javascript:window.location='index.php?com=khuyenmai&act=product&id=<?= $_GET['id'] ?>&id_list=<?= $_GET['id_list'] ?>&applycall=0'" class="btn" /> 
<table class="blue_table">
	<tr>
		<th style="width:5%;">Stt</th>		
        <th style="width:25%;"><?=get_main_list();?></th>  
        <th style="width:30%;">Tên</th>  
        <th style="width:10%;">Áp dụng</th>
	</tr>

	<?php for($i=0, $count=count($items); $i<$count; $i++){?>

	<tr>

		<td style="width:5%;"><?=$i+1?></td>

		<td style="width:25%;">

			  <?php

				$sql_danhmuc="select ten_vi from table_product_list where id='".$items[$i]['id_list']."'";

				$result=mysql_query($sql_danhmuc);

				$item_danhmuc =mysql_fetch_array($result);

				echo @$item_danhmuc['ten_vi']

			?>      

        </td>        

        <td style="width:30%;"><a href="index.php?com=product&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?></a></td>        
        <td align="center" style="width:10%;">   
      <?php
		if($items[$i]['ht']>0)
		{
		?>				<a href="index.php?com=khuyenmai&act=product&id=<?= $_GET['id'] ?><?php if(@$_REQUEST['keyword']!='') echo'&keyword='. $_REQUEST['keyword']; ?><?php if(@$_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list']; ?>&reapply=<?=$items[$i]['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/yes-km.gif" border="0" /></a>        <?php		}		else		{
		?>
       <a href="index.php?com=khuyenmai&act=product&id=<?= $_GET['id'] ?><?php if(@$_REQUEST['keyword']!='') echo'&keyword='. $_REQUEST['keyword']; ?>&apply=<?=$items[$i]['id']?><?php if(@$_REQUEST['id_list']!='') echo'&id_list='. $_REQUEST['id_list'];?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/no-km.gif" border="0" /></a>       <?php }        ?>      </td>  
	</tr>

	<?php	}?>

    </table>
<div class="paging"><?=$paging['paging']?></div><input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=khuyenmai&act=man'" class="btn" />