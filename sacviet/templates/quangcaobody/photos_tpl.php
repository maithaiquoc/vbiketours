<h3 style="display:none"><a href="index.php?com=quangcaobody&act=add_photo">Add Photo</a></h3>







<table class="blue_table">



	<tr>



		<th style="width:5%;">No.</th>		



      <!--  <th style="width:30%;">Vị trí</th>-->



        <th style="width:50%;">Photo</th>



      	<th style="width:5%;">Show</th>



		<th style="width:5%;">Edit</th>



		<th  style="width:5%;">Delete</th>



	</tr>



	<?php for($i=0, $count=count($items); $i<$count; $i++){?>



	<tr>



		<td style="width:5%;"><?=$items[$i]['stt']?></td>



       <!-- <td style="width:30%;">



			<?php if($items[$i]['vitri']==1) echo 'Chạy bên trái';?>



            <?php if($items[$i]['vitri']==2) echo 'Chạy bên phải';?>



            <?php if($items[$i]['vitri']==3) echo 'Cột bên trái';?>



        



        </td> -->    



		<td style="width:50%;">



   <?php

if (strpos($items[$i]['photo'],'swf') == true){

?>

<object width="100" height="100"  codebase="http://active.macromedia.com/flash4/cabs/swflash.cab#version=4,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">

              <param NAME="_cx" VALUE="13414">

              <param NAME="_cy" VALUE="6641">

              <param NAME="FlashVars" VALUE>

              <param NAME="Movie" VALUE="<?=_upload_hinhanh.$items[$i]['photo']?>">

              <param NAME="Src" VALUE="<?=_upload_hinhanh.$items[$i]['photo']?>">

              <param NAME="Quality" VALUE="High">

              <param NAME="AllowScriptAccess" VALUE>

              <param NAME="DeviceFont" VALUE="0">

              <param NAME="EmbedMovie" VALUE="0">

              <param NAME="SWRemote" VALUE>

              <param NAME="MovieData" VALUE>

              <param NAME="SeamlessTabbing" VALUE="1">

              <param NAME="Profile" VALUE="0">

              <param NAME="ProfileAddress" VALUE>

              <param NAME="ProfilePort" VALUE="0">

              <param NAME="AllowNetworking" VALUE="all">

              <param NAME="AllowFullScreen" VALUE="false">

              <param name="scale" value="ExactFit">

             <embed src="<?=_upload_hinhanh.$items[$i]['photo']?>" quality="High" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" width="250" height="150" scale="ExactFit"></embed>

            </object>

<?php

}else{

?>

       <img src="<?=_upload_hinhanh.$items[$i]['photo']?>" width="250" height="150" />



 <?php } ?>  



        </td>



       



        



		<td style="width:5%;"><?php if(@$items[$i]['hienthi']){?><img src="media/images/active_1.png" /><? }else {?><img src="media/images/active_0.png" /><? }?></td>



		<td style="width:5%;"><a href="index.php?com=quangcaobody&act=edit_photo&id=<?=$items[$i]['id']?>&idc=<?=$items[$i]['id_photo']?>"><img src="media/images/edit.png" border="0" /></a></td>



		<td style="width:5%;" ><a href="index.php?com=quangcaobody&act=delete_photo&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>



	</tr>



	<?php	}?>



</table>



<a href="index.php?com=quangcaobody&act=add_photo&idc=<?=$_REQUEST['idc'];?>"><img src="media/images/add.jpg" border="0"  /></a>



<div class="paging"><?=$paging['paging']?></div>		