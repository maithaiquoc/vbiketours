<script type="text/javascript">

	tinyMCE.init({

		// General options

		mode : "exact",

        elements : "noidung_vi, noidung_en, mota_vi, thanhphan_vi, dksudung_vi",

		theme : "advanced",

		convert_urls : false,

		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

height:"500px",

    width:"100%",

	remove_script_host : false,



		// Theme options

		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",

		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",

		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",		

		theme_advanced_toolbar_location : "top",

		theme_advanced_toolbar_align : "left",

		theme_advanced_statusbar_location : "bottom",

		theme_advanced_resizing : true,



		// Example content CSS (should be your site CSS)

		content_css : "css/content.css",



		// Drop lists for link/image/media/template dialogs

		template_external_list_url : "lists/template_list.js",

		external_link_list_url : "lists/link_list.js",

		external_image_list_url : "lists/image_list.js",

		media_external_list_url : "lists/media_list.js",



		// Style formats

		style_formats : [

			{title : 'Bold text', inline : 'b'},

			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},

			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},

			{title : 'Example 1', inline : 'span', classes : 'example1'},

			{title : 'Example 2', inline : 'span', classes : 'example2'},

			{title : 'Table styles'},

			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}

		],



		// Replace values for the template plugin

		template_replace_values : {

			username : "Some User",

			staffid : "991234"

		}

	});

	tinyMCE.init({

		// General options

		mode : "exact",

        elements : "mota_vi,mota_en,thanhphan_vi,thanhphan_en, dksudung_vi, dksudung_en",

		theme : "advanced",

		convert_urls : false,		

height:"250px",

    width:"100%",

	remove_script_host : false,	

// Theme options

		theme_advanced_buttons1 : "bold,italic,underline,strikethrough",

		// Style formats

		style_formats : [

			{title : 'Bold text', inline : 'b'},

			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},

			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},

			{title : 'Example 1', inline : 'span', classes : 'example1'},

			{title : 'Example 2', inline : 'span', classes : 'example2'},

			{title : 'Table styles'},

			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}

		],

paste_text_linebreaktype : "br",

		// Replace values for the template plugin

		template_replace_values : {

			username : "Some User",

			staffid : "991234"

		}

	});

</script>

<script language="javascript">

	function cblist_onchange()

	{

		var a=document.getElementById("id_list");

		window.location ="index.php?com=product&act=<?=@$_GET['act']?>&id_list="+a.value+"&id_cat=<?=@$_GET['id_cat']?>&id=<?=@$_GET['id']?>";	

		return true;

	}

					

</script>

<h3>Management Tour</h3>

<?php

function get_main_list()

	{

		$sql="select * from table_product_list order by stt";

		$stmt=mysql_query($sql);

		$str='

			<select id="id_list" name="id_list" onchange="cblist_onchange()" class="main_font">	

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

	

function get_main_cat()

	{

		$sql="select * from table_product_cat";

		if(isset($_GET['id_list'])) $sql.=" where id_list='$_GET[id_list]'";

		$sql.=" order by stt";

		$stmt=mysql_query($sql);

		$str='

			<select id="id_cat" name="id_cat" class="main_font">

			<option value="0">Select Category management level 2</option>			

			';

		while ($row=@mysql_fetch_array($stmt)) 

		{

			if($row["id"]==(int)@$_REQUEST["id_cat"])

				$selected="selected";

			else 

				$selected="";

			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			

		}

		$str.='</select>';

		return $str;

	}			

?>

<form name="frm" method="post" action="index.php?com=product&act=save&curPage=<?=@$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">	 

    <b>Category  level 1:</b><?=get_main_list();?><br /><br />  

    <b>Category  level 2:</b><?=get_main_cat();?><br /><br />

	<?php if (@$_REQUEST['act']=='edit')

	{?>

	<b>Current Photo:</b><img src="<?=_upload_product.$item['thumb']?>"  alt="NO PHOTO" /><br />

	<?php }?>

	<b>Photo:</b> <input type="file" name="file" /> Width:1280px&nbsp;Height:1024px&nbsp;<?=_product_type?><br />		
<?php /*?>    <b>Hình ảnh 1:</b> <input type="file" name="file1" /> Width:1280px&nbsp;Height:1024px&nbsp;<?=_product_type?><br />	
    <b>Hình ảnh 2:</b> <input type="file" name="file2" /> Width:1280px&nbsp;Height:1024px&nbsp;<?=_product_type?><br />	
    <b>Hình ảnh 3:</b> <input type="file" name="file3" /> Width:1280px&nbsp;Height:1024px&nbsp;<?=_product_type?><br /><?php */?>

    <br />

    	<b>Code Tour</b> <input type="text" name="masp" value="<?=@$item['masp']?>" class="input" /><br /> 

	<b>Name</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /> 
	<b>Start Tour</b> <input type="text" name="start" value="<?=@$item['start']?>" class="input" /><br /> 
    <b>Lenght Tour</b> <input type="text" name="lenght" value="<?=@$item['lenght']?>" class="input" /><br /> 
     <b>Video Tour</b> <input type="text" name="link" value="<?=@$item['link']?>" class="input" /><br /> 
     Note: copy link from youtube. EX: https://www.youtube.com/watch?v=HS_toZK6MSY change https://www.youtube.com/v/HS_toZK6MSY
    <?php /*?><b>Tên (english)</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /> <?php */?>

    <b>Price</b> 

<?php if (isset($item['gia']))

	{?>

	<input type="text" name="gia" value="<?=@$item['gia']?>" class="input" /><br />

	<?php }else {?>

<input type="text" name="gia" value="0" class="input" /><br />

<?php }?>
<?php /*?>
<b>Giãm giá</b> 

<?php if (isset($item['giamgia']))

	{?>

	<input type="text" name="giamgia" value="<?=@$item['giamgia']?>" class="input" /><br />

	<?php }else{ ?>

<input type="text" name="giamgia" value="0" class="input" /><br />

<?php }?><?php */?>





    <div><b>Type of display</b> <input type="text" name="size" value="<?=@$item['size']?>" class="input" />
        
    </div>    <br/> 
   <b  style="width:400px">Type =1, width: 315px ; height: 492px</b> <br/> <br/> 
     <b  style="width:400px">Type =2, width :652px ; height:492px</b> <br/> <br/> 
       <b  style="width:400px">Type =3, width: 990px ;height:492px</b> <br/> <br/> 
         <b  style="width:400px">Type =4, width: 1400px ; height:492px</b> <br/> <br/> 
  
    <table>
        <tr>
            <div>
                <p><b>Content</b></p><br/>
                <textarea name="mota_vi" id="mota_vi"><?=@$item['mota_vi']?></textarea>
            </div>
        </tr>
        <tr>
            <div>
                <p><b>Part displayed in blue background</b></p><br/>
                <textarea name="thanhphan_vi" id="thanhphan_vi"><?=@$item['thanhphan_vi']?></textarea>
            </div>
        </tr>
        <tr>
            <div>
                <p><b>Part displayed in red background</b></p><br/>
                <textarea name="dksudung_vi" id="dksudung_vi"><?=@$item['dksudung_vi']?></textarea>
            </div>
        </tr>
                	<?php /*?><tr>			<td><b>Mô tả (english)</b></td>			<td><b>Thành phần (english)</b></td>			<td><b>Điều kiện sử dụng (english)</b></td>		</tr>		<tr>			<td><div> <textarea name="mota_en" cols="50" rows="8"><?=@$item['mota_en']?></textarea></div></td>			<td><div> <textarea name="thanhphan_en" cols="50" rows="8"><?=@$item['thanhphan_en']?></textarea></div></td>			<td><div> <textarea name="dksudung_en" cols="50" rows="8"><?=@$item['dksudung_en']?></textarea></div></td>		</tr><?php */?>	</table>	

            

    <p><b>Part displayed in white background</b></p><br/>

	<div>

	 <textarea name="noidung_vi" id="noidung_vi"><?=@$item['chitiet_vi']?></textarea></div>

    <br/> 
<?php /*?>
    <b>Chi tiết (english)</b><br/>

	<div>

	 <textarea name="noidung_en" id="noidung_en"><?=@$item['chitiet_en']?></textarea></div>

    <br/>   <?php */?>  

	<b>No.</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Show</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /><br />

	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />

	<input type="submit" value="Save" class="btn" />

	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=product&act=man'" class="btn" />

</form>