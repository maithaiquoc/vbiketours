<h3>Photo Ads</h3>



<form name="frm" method="post" action="index.php?com=slider&act=save_photo" enctype="multipart/form-data" class="nhaplieu">



<?php for($i=0; $i<5; $i++){?>	



    <b>Photo <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> <strong> swf|jpg|gif|png|SWF|JPG|GIF|PNG - Width: 1349px/ Height: 600px</strong><br />



 <!--   <br />



	<b>Text: </b> <input name="link<?=$i?>" type="text" size="40"   />	



	<br />
-->


    <br />



   <!-- <b>Vị trí:</b> <select name="vitri<?=$i?>" id="vitri<?=$i?>">

    	



        <option value="1">Chạy bên trái body</option>



        <option value="2">Chạy bên phải body</option>



        <option value="3">Quảng cáo cột phải</option>



    </select><br/><br/>-->





<b>Link.</b> <input type="text" name="link<?=$i?>" style="width:250px" />	<br /><br/>

    <b>No.</b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />

	<b>Show</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />



	



<? }?>



	<input type="submit" value="Save" class="btn" />



	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=slider&act=man_photo'" class="btn" />



</form>