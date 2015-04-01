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
		location.href = "index.php?com=tuvan&act=man&keyword="+keyword;
		loadPage(document.location);
			
}

</script>
<script language="javascript">
	function select_onchange()
	{
		var a=document.getElementById("id_list");
		window.location ="index.php?com=tuvan&act=man&id_list="+a.value;	
		return true;
	}
					
</script>
<?php
function get_main_list()
	{
		$sql="select ten,id from table_comment_list  order by stt asc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_list" name="id_list" onchange="select_onchange()" class="main_font">
			<option value="">Danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$_REQUEST['id_list'])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}

?>
Tìm kiếm: <input name="keyword" id="keyword" type="text" /> <input type="button" value=" Tìm "  onclick="onSearch(event)"/>
<table class="blue_table">
	<tr>
		<th style="width:5%;">Stt</th>		
      	<th style="width:25%; display:none"><?=get_main_list();?> </th> 
        <th style="width:50%;">Tên </th>  
        <!--<th style="width:5%;">SP mới</th>
        <th style="width:5%;">Nổi bật</th>-->
		<th style="width:5%;">Hiển thị</th>
        <th style="width:5%;">Tình trạng</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$items[$i]['stt']?></td>
		<td style="width:25%; display:none">
			  <?php
				$sql_danhmuc="select ten from table_comment_list where id='".$items[$i]['id_list']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>      
        </td>
        <td style="width:50%;"><a href="index.php?com=tuvan&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten']?></a></td>                                 
         <!--<td align="center" style="width:5%;">
      
      <?php
		//if($items[$i]['spbc']>0)
		//{
		?>
		<a href="index.php?com=tuvan&act=man&spbc=<?//=$items[$i]['id']?><?php// if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/yes-km.gif" border="0" /></a>
        <?php
		/*}
		else
		{*/
		?>
       <a href="index.php?com=tuvan&act=man&spbc=<?//=$items[$i]['id']?><?php //if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/no-km.gif" border="0" /></a>
       <?php //}
        ?>      </td> -->
        <!--<td align="center" style="width:5%;">
      
      <?php
      	/*
		if($items[$i]['noibat']>0)
		{*/
		?>
		<a href="index.php?com=tuvan&act=man&noibat=<?//=$items[$i]['id']?><?php //if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/yes-km.gif" border="0" /></a>
        <?php
		/*}
		else
		{*/
		?>
       <a href="index.php?com=tuvan&act=man&noibat=<?//=$items[$i]['id']?><?php //if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/no-km.gif" border="0" /></a>
       <?php // }
        ?>      </td>-->  
		<td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=tuvan&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=tuvan&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>      
        </td>
        <td style="width:5%;">
        <?php 
			if(@$items[$i]['daxem']==1){echo 'Đã xem';}
			else echo'Chưa xem';
		?>
        </td>
		<td style="width:5%;"><a href="index.php?com=tuvan&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>
		<td style="width:5%;"><a href="index.php?com=tuvan&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>


<div class="paging"><?=$paging['paging']?></div>