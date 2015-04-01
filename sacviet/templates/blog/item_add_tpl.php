<script type="text/javascript">

	tinyMCE.init({

		// General options

		mode : "exact",

        elements : "noidung_vi,noidung_en",

		theme : "advanced",

		convert_urls : false,

		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",

height:"300px",

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

</script>

<script language="javascript">				

	function select_onchange()

	{				

		var a=document.getElementById("id_cat");

		window.location ="index.php?com=blog&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_cat="+a.value;	

		return true;

	}

	

	

</script>



<script language="javascript">				

	function js_submit()

	{				

		var id_item = document.getElementById("id_item");

        if(id_item.value == "-1"){

			alert("select category before add.");

            id_item.focus();		

			return false;

	    }else

		{

			var item_ten = document.getElementById("ten_vi");

			if(item_ten.value == ""){

				alert("Title.");

				item_ten.focus();		

				return false;

			}else

			{

				document.getElementById("frm").submit();

			}

		}

	}

	

	

</script>

<?php



function get_main_category()

	{

		$sql_huyen="select * from table_blog_item order by id desc ";

		$result=mysql_query($sql_huyen);

		$str='

			<select id="id_item" name="id_item">

			<option value="-1">Select Category</option>			

			';

		while ($row_huyen=@mysql_fetch_array($result)) 

		{

			if($row_huyen["id"]==(int)@$_REQUEST["id_item"])

				$selected="selected";

			else 

				$selected="";

			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten_vi"].'</option>';			

		}

		$str.='</select>';

		return $str;

	}			

	

function get_main_item()

	{

		$sql_huyen="select * from table_blog_item where id_cat='".$_REQUEST["id_cat"]."' order by id desc ";

		$result=mysql_query($sql_huyen);

		$str='

			<select id="id_item" name="id_item"">

			<option>Select Category</option>			

			';

		while ($row_huyen=@mysql_fetch_array($result)) 

		{

			if($row_huyen["id"]==(int)@$_REQUEST["id_item"])

				$selected="selected";

			else 

				$selected="";

			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten_vi"].'</option>';			

		}

		$str.='</select>';

		return $str;

	}			

?>

<h3>Add News</h3>



<form name="frm" id="frm" method="post" action="index.php?com=blog&act=save" enctype="multipart/form-data" class="nhaplieu">   	<b>Danh mục</b> <?=get_main_category()?><br />	<br />

   <?php if (@$_REQUEST['act']=='edit')

	{?>

	<b>Current Photo:</b><img src="<?=_upload_blog.$item['photo']?>" alt="NO PHOTO"  width="150"/><br />

	<?php }?>

    <br />

	<b>Photo:</b> <input type="file" name="file" />Width: 120px - Height: 80px <?=_news_type?><br /><br />

	<b>Title</b> <input type="text" name="ten_vi" id="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br />

    <!--<b>Tiêu đề ( english )</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br />-->	

	<b>Description</b>

	

    

    <div>

    

    <textarea name="mota_vi" cols="50" rows="5" id="mota_vi"><?=@$item['mota_vi']?></textarea>

    

    

  </div>

  

 <?php /*?> <b>Mô tả ( english )</b>

	

    

    <div>

    

    <textarea name="mota_en" cols="50" rows="5" id="mota_en"><?=@$item['mota_en']?></textarea>

    

    

  </div><?php */?>

	

	 <b>Content</b><br/>

	<div>

	 <textarea name="noidung_vi" id="noidung_vi"><?=@$item['noidung_vi']?></textarea></div><br/>

     	<?php /*?> <b>Nội dung ( english )</b><br/>

	<div>

	 <textarea name="noidung_en" id="noidung_en"><?=@$item['noidung_en']?></textarea></div><br/>
<?php */?>
	

	<b>No.</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	

	<b>Show</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />

		<b>Tag</b><br />

<table class="blue_table" style="width:50%;">

<tr>

<th>Name</th>

<th>Select</th>

</tr>

<?php for($i=0, $count=count($items); $i<$count; $i++){?>

<tr>

<td style="width:5%;" align="center"><?=$items[$i]['ten_vi']?></td>

<td style="width:5%;" align="center"><input type="checkbox" name="check_list[]" value="<?=$items[$i]['id']?>" <?php if($items[$i]['blog_id'] != '') echo 'checked';  ?> /></td>

</tr>

<?php	}?>

</table>

	

<br /><br />

	

	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />

	<input type="button" value="Save" class="btn" onclick="js_submit();" />

	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=blog&act=man'" class="btn" />

</form>	