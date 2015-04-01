<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung_vi, noidung_en",
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
</script>
<script language="javascript">
	function cblist_onchange()
	{
		var a=document.getElementById("id_list");
		window.location ="index.php?com=datnhahang&act=<?=@$_GET['act']?>&id_list="+a.value+"&id_cat=<?=@$_GET['id_cat']?>&id=<?=@$_GET['id']?>";	
		return true;
	}
					
</script>
<h3>Quản lý sản phẩm</h3>
<?php
function get_main_list()
	{
		$sql="select * from table_datnhahang_list order by stt";
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
		$sql="select * from table_datnhahang_cat";
		if(isset($_GET['id_list'])) $sql.=" where id_list='$_GET[id_list]'";
		$sql.=" order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat" class="main_font">
			<option value="0">Chọn danh mục cấp 2</option>			
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
<form name="frm" method="post" action="index.php?com=datnhahang&act=save&curPage=<?=@$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">	 
    <b>Danh mục cấp 1:</b><?=get_main_list();?><br /><br />  
    <b>Danh mục cấp 2:</b><?=get_main_cat();?><br /><br />
	<?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_datnhahang.$item['thumb']?>"  alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> Width:1280px&nbsp;Height:1024px&nbsp;<?=_datnhahang_type?><br />
    <br />
    	<b>Mã sản phẩm</b> <input type="text" name="masp" value="<?=@$item['masp']?>" class="input" /><br /> 
	<b>Tên</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /> 
    <b>Tên (english)</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /> 
    <b>Giá</b> <input type="text" name="gia" value="<?=@$item['gia']?>" class="input" /><br /> 
    <b>Mô tả</b><br/>
	<div>
	 <textarea name="mota_vi" cols="50" rows="8"><?=@$item['mota_vi']?></textarea></div>
    <br/> 
    <b>Mô tả (english)</b><br/>
	<div>
	 <textarea name="mota_en" cols="50" rows="8"><?=@$item['mota_en']?></textarea></div>
    <br/>         
    <b>Chi tiết</b><br/>
	<div>
	 <textarea name="noidung_vi" id="noidung_vi"><?=@$item['chitiet_vi']?></textarea></div>
    <br/> 
    <b>Chi tiết (english)</b><br/>
	<div>
	 <textarea name="noidung_en" id="noidung_en"><?=@$item['chitiet_en']?></textarea></div>
    <br/>     
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	<b>Hiển thị tin</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /><br />
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=datnhahang&act=man'" class="btn" />
</form>