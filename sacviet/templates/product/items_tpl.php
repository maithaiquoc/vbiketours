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



<?php



function get_main_list()



	{



		$sql="select ten_vi,id from table_product_list  order by stt asc";



		$stmt=mysql_query($sql);



		$str='



			<select id="id_list" name="id_list" onchange="select_onchange()" class="main_font">



			<option value="0">Category management level 1</option>			



			';



		while ($row=@mysql_fetch_array($stmt)) 



		{



			if($row["id"]==@$_REQUEST['id_list'])



				$selected="selected";



			else 



				$selected="";



			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			



		}



		$str.='</select>';



		return $str;



	}



?>



<h3><a href="index.php?com=product&act=add">Add Tour</a></h3>



Search: <input name="keyword" id="keyword" type="text" /> <input type="button" value=" Search "  onclick="onSearch(event)"/>   <?php /*?>  <a href="index.php?com=product&act=man_comments">Quản lý comments</a><?php */?>



<table class="blue_table">



	<tr>



		<th style="width:5%;">No.</th>		



        <th style="width:25%;"><?=get_main_list();?></th>       



        <th style="width:30%;">Name</th>  



        <th style="width:10%; display:none">Tour new</th>



        <th style="width:10%; display:none">Highlights</th>



        <th style="width:10%;">New tour</th>



		<th style="width:5%;">Show</th>



		<th style="width:5%;">Edit</th>



		<th style="width:5%;">Delete</th>



	</tr>



	<?php for($i=0, $count=count($items); $i<$count; $i++){?>



	<tr>



		<td style="width:5%;"><?=$items[$i]['stt']?></td>



		<td style="width:25%;">



			  <?php



				$sql_danhmuc="select ten_vi from table_product_list where id='".$items[$i]['id_list']."'";



				$result=mysql_query($sql_danhmuc);



				$item_danhmuc =mysql_fetch_array($result);



				echo @$item_danhmuc['ten_vi']



			?>      



        </td>        



        <td style="width:30%;"><a href="index.php?com=product&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?></a></td>        



        <td align="center" style="width:10%; display:none">



      



      <?php



		if($items[$i]['spmoi']>0)



		{



		?>



		<a href="index.php?com=product&act=man&spmoi=<?=$items[$i]['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/yes-km.gif" border="0" /></a>



        <?php



		}



		else



		{



		?>



       <a href="index.php?com=product&act=man&spmoi=<?=$items[$i]['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/no-km.gif" border="0" /></a>



       <?php }



        ?>      </td> 



                            



        <td align="center" style="width:10%; display:none">



      



      <?php



		if($items[$i]['spbc']>0)



		{



		?>



		<a href="index.php?com=product&act=man&spbc=<?=$items[$i]['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/yes-km.gif" border="0" /></a>



        <?php



		}



		else



		{



		?>



       <a href="index.php?com=product&act=man&spbc=<?=$items[$i]['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/no-km.gif" border="0" /></a>



       <?php }



        ?>      </td> 



        <td align="center" style="width:10%;">



      



      <?php



		if($items[$i]['noibat']>0)



		{



		?>



		<a href="index.php?com=product&act=man&noibat=<?=$items[$i]['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/yes-km.gif" border="0" /></a>



        <?php



		}



		else



		{



		?>



       <a href="index.php?com=product&act=man&noibat=<?=$items[$i]['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/no-km.gif" border="0" /></a>



       <?php }



        ?>      </td>  



		<td style="width:5%;">



		<?php 



		if(@$items[$i]['hienthi']==1)



		{



		?>



        



        <a href="index.php?com=product&act=man&hienthi=<?=$items[$i]['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>



		<? 



		}



		else



		{



		?>



         <a href="index.php?com=product&act=man&hienthi=<?=$items[$i]['id']?><?php if(@$_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>



         <?php



		 }?>      



        </td>



		<td style="width:5%;"><a href="index.php?com=product&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>



		<td style="width:5%;"><a href="index.php?com=product&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>



	</tr>



	<?php	}?>



    </table>



<a href="index.php?com=product&act=add"><img src="media/images/add.jpg" border="0"  /></a>







<div class="paging"><?=$paging['paging']?></div>