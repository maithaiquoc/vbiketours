<?php


function get_main_category()


	{


		$sql="select * from table_product_list order by stt";


		$stmt=mysql_query($sql);


		$str='


			<select id="id_list" name="id_list" onchange="select_onchange1()" class="main_font">


			<option>Select Category</option>			


			';


		while ($row=@mysql_fetch_array($stmt)) 


		{


			if($row["id"]==(int)@$_REQUEST["id_list"])


				$selected="selected";


			else 


				$selected="";


			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			


		}


		$str.='</select>';


		return $str;


	}


	


	?>


<h3>Add Category</h3>


<form name="frm" method="post" action="index.php?com=product&act=save_cat" enctype="multipart/form-data" class="nhaplieu">	


    <b>Category:</b><?=get_main_category();?><br />  


    <?php /*if ($_REQUEST['act']=='edit_cat')


	{?>


	<b>Hình hiện tại:</b><img src="<?=_upload_product.$item['thumb']?>"  alt="NO PHOTO" /><br /><br />


	<?php }*/?>


	<!--<b>Hình ảnh:</b> <input type="file" name="file" /><br />-->


    <br />        


    <b>Name</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>


  <?php /*?>  <b>Tên ( english )</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br> <?php */?>  


    <b>No.</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>





	<b>Show</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	<?php /*?><b>Current photo:</b><img src="<?=_upload_product.$item['photo']?>"  alt="NO PHOTO" width="200" height="200" /><br />

	<b>Photo:</b> <input type="file" name="file" /> Width:1280px&nbsp;Height:1024px&nbsp;<?=_product_type?><br /><?php */?>


	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />


	<input type="submit" value="Save" class="btn" />


	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=product&act=man_cat'" class="btn" />


</form>