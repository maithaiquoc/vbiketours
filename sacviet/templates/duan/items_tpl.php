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



		location.href = "index.php?com=bosuutap&act=man&keyword="+keyword;



		loadPage(document.location);



			



}







</script>



<h3><a href="index.php?com=bosuutap&amp;act=add">Add catalogue</a></h3>



Search: <input name="keyword" id="keyword" type="text" /> <input type="button" value=" Find "  onclick="onSearch(event)"/>

<!--<a href="index.php?com=bosuutap&act=man_comments">Quản lý comments</a>-->

<table class="blue_table">



	<tr>



		<th style="width:5%;">No.</th>		



        <th style="width:25%;">Name</th>



          <!--<th style="width:5%;">Hot</th>   -->



        <th style="width:15%;">Photo</th>    



		<th style="width:5%;">Show</th>



		<th style="width:5%;">Edit</th>



		<th style="width:5%;">Delete</th>



	</tr>



	<?php for($i=0, $count=count($items); $i<$count; $i++){?>



	<tr>



		<td style="width:5%;"><?=$items[$i]['stt']?></td>      



       <td style="width:25%;"><?=$items[$i]['ten_vi']?></td>



       



       <?php /*?> <td align="center" style="width:5%;">



      



      <?php



		if($items[$i]['noibat']>0)



		{



		?>



		<a href="index.php?com=bosuutap&act=man&noibat=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/yes-km.gif" border="0" /></a>



        <?php



		}



		else



		{



		?>



       <a href="index.php?com=bosuutap&act=man&noibat=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/no-km.gif" border="0" /></a>



       <?php }



        ?>      </td> 
<?php */?>


       



        <td align="center" style="width:15%;">



         <a href="index.php?com=hasp&amp;act=man_photo&amp;idc=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:underline;">



          Add photo



          </a>      



      </td> 



      



		<td style="width:5%;">



		<?php 



		if(@$items[$i]['hienthi']==1)



		{



		?>



        



        <a href="index.php?com=bosuutap&amp;act=man&amp;hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>



		<? 



		}



		else



		{



		?>



         <a href="index.php?com=bosuutap&amp;act=man&amp;hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>



         <?php



		 }?>      



        </td>



		<td style="width:5%;"><a href="index.php?com=bosuutap&amp;act=edit&amp;id_list=<?=$items[$i]['id_list']?>&amp;id_cat=<?=$items[$i]['id_cat']?>&amp;id_item=<?=$items[$i]['id_item']?>&amp;id=<?=$items[$i]['id']?>"><img src="media/images/edit.png" /></a></td>



		<td style="width:5%;"><a href="index.php?com=bosuutap&amp;act=delete&amp;id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>



	</tr>



	<?php	}?>



    </table>



<a href="index.php?com=bosuutap&amp;act=add"><img src="media/images/add.jpg" border="0"  /></a>







<div class="paging"><?=$paging['paging']?></div>