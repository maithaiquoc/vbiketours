<h3>Photo Edit</h3>







<form name="frm" method="post" action="index.php?com=slider&act=save_photo&id=<?=$_REQUEST['id'];?>&idc=<?=$_REQUEST['idc']?>" enctype="multipart/form-data" class="nhaplieu">	



	<b>&nbsp;</b> 



    

<?php

if (strpos($item['photo'],'swf') == true){

?>

<object width="100" height="100"  codebase="http://active.macromedia.com/flash4/cabs/swflash.cab#version=4,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">

              <param NAME="_cx" VALUE="13414">

              <param NAME="_cy" VALUE="6641">

              <param NAME="FlashVars" VALUE>

              <param NAME="Movie" VALUE="<?=_upload_hinhanh.$item['photo']?>">

              <param NAME="Src" VALUE="<?=_upload_hinhanh.$item['photo']?>">

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

             <embed src="<?=_upload_hinhanh.$item['photo']?>" quality="High" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" width="250" height="150" scale="ExactFit"></embed>

            </object>

<?php

}else{

?>

       <img src="<?=_upload_hinhanh.$item['photo']?>" width="250" height="150" />



 <?php } ?>  

    



    <br />



	<b>Photo </b> <input type="file" name="file" /> <strong>Width: 1140px/ Height: 600px - Dạng:swf|jpg|gif|png|SWF|JPG|GIF|PNG</strong><br />



	


<!--
    <br />



	<b>Text: </b> <input name="link" value="<?=$item['link']?>" type="text" size="40"   />	

-->

	<br />



	<br />

<!--

     <b>Vị trí:</b> <select name="vitri" id="vitri">    	



        <option value="1" <?php if($item['vitri']==1) echo selected ?>>Chạy bên trái</option>



        <option value="2" <?php if($item['vitri']==2) echo selected ?>>Chạy bên phải</option>       



    </select><br/><br/>

-->





    



	<b>Link </b> <input type="text" name="link" value="<?=$item['link']?>" style="width: 250px;" />	<br /> <br/>

    <b>No. </b> <input type="text" name="stt" value="<?=$item['stt']?>" style="width:30px" />	<br />

	<b>Show</b> <input type="checkbox" name="hienthi" <?=$item['hienthi'] ? 'checked="checked"' : ""?> /> <br /><br />



	



	<input type="hidden" name="id" value="<?=$item['id']?>" />



	<input type="submit" value="Save" class="btn" />



	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=slider&act=man_photo'" class="btn" />



</form>