<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung_vi,noidung_en,gioithieu_vi,gioithieu_en,quydinh_vi,quydinh_en",
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
		window.location ="index.php?com=khachsan&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_cat="+a.value;	
		return true;
	}
	
	
</script>
<?php

function get_main_category()
	{
		$sql_huyen="select * from table_khachsan_cat order by id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_cat" name="id_cat" onchange="select_onchange()">
			<option>Chọn danh mục</option>			
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_cat"])
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
		$sql_huyen="select * from table_khachsan_item where id_cat='".$_REQUEST["id_cat"]."' order by id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_item" name="id_item"">
			<option>Chọn danh mục</option>			
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
<h3>Thêm khách sạn</h3>

<form name="frm" method="post" action="index.php?com=khachsan&act=save" enctype="multipart/form-data" class="nhaplieu">   
   <?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_khachsan.$item['photo']?>" alt="NO PHOTO"  width="150"/><br />
	<?php }?>
    <br />
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_news_type?><br /><br />
	<b>Tiêu đề</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br />
    <b>Tiêu đề ( english )</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br />	
	<b>Mô tả</b>
	
    
    <div>
    
    <textarea name="mota_vi" cols="50" rows="5" id="mota_vi"><?=@$item['mota_vi']?></textarea>
    
    
  </div>
  
  <b>Mô tả ( english )</b>
	
    
    <div>
    
    <textarea name="mota_en" cols="50" rows="5" id="mota_en"><?=@$item['mota_en']?></textarea>
    
    
  </div>
	
	 <b>Giới thiệu</b><br/>
	<div>
	 <textarea name="gioithieu_vi" id="gioithieu_vi"><?=@$item['gioithieu_vi']?></textarea></div><br/>
     	 <b>Giới thiệu ( english )</b><br/>
	<div>
	 <textarea name="gioithieu_en" id="gioithieu_en"><?=@$item['gioithieu_en']?></textarea></div><br/>
     
     <b>Quy định</b><br/>
	<div>
	 <textarea name="quydinh_vi" id="quydinh_vi"><?=@$item['quydinh_vi']?></textarea></div><br/>
     	 <b>Quy định ( english )</b><br/>
	<div>
	 <textarea name="quydinh_en" id="quydinh_en"><?=@$item['quydinh_en']?></textarea></div><br/>
     
     
     
	
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=khachsan&act=man'" class="btn" />
</form>