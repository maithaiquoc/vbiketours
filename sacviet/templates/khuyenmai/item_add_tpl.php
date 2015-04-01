<link href="../css/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" language="javascript">

$(document).ready(function(){
$("#datepickerfrom").datepicker({ dateFormat: 'yy-mm-dd'  });
$("#datepickerfrom").val('<?=@$item['ngaybatdau']?>');
$("#datepickerto").datepicker({ dateFormat: 'yy-mm-dd'  });
$("#datepickerto").val('<?=@$item['ngayketthuc']?>');
});


function submitform(){
	var ten_vi = $('#ten_vi').val();
	var phantram = $('#phantram').val();
	var giokt = $('#giokt').val();
	var giobt = $('#giobt').val();
	var datepickerto = $('#datepickerto').val();
	var datepickerfrom = $('#datepickerfrom').val();
	
	
	if(ten_vi != ''){
		if(datepickerfrom != '' && datepickerto != ''){
			if( $('#datepickerto').datepicker('getDate').getTime() >= $('#datepickerfrom').datepicker('getDate').getTime()){	
				if( $('#datepickerto').datepicker('getDate').getTime() == $('#datepickerfrom').datepicker('getDate').getTime()){
					if((giokt*1) <= (giobt*1)){
						alert('Giờ kết thúc phải lớn hơn giờ bắt đầu.');
						return;
					}
				}				
				// submit
				$('#frm').submit();
			}else{
				alert('Ngày kết thúc phải bằng hoặc lớn hơn ngày hiên tại!');
			}
		}else{
			alert('Hãy thiết lập thời gian khuyến mãi!');
		}
	}else{
		alert('Hãy nhập tên chương trình khuyến mãi!');
	}
}

</script>

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
		window.location ="index.php?com=khuyenmai&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_cat="+a.value;	
		return true;
	}
	
	
</script>
<?php

function get_main_category()
	{
		$sql_huyen="select * from table_khuyenmai_cat order by id desc ";
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
		$sql_huyen="select * from table_khuyenmai_item where id_cat='".$_REQUEST["id_cat"]."' order by id desc ";
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

<h3>Chương trình khuyến mãi</h3>

<form name="frm" id="frm" method="post" action="index.php?com=khuyenmai&act=save" enctype="multipart/form-data" class="nhaplieu">   
   <?php if (@$_REQUEST['act']=='edit')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_khuyenmai.$item['photo']?>" alt="NO PHOTO"  width="150"/><br />
	<?php }?>
    <br />
	<b>Hình ảnh:</b> <input type="file" name="file" /> <?=_news_type?><br /><br />
	<b>Tiêu đề</b> <input type="text" id="ten_vi" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br />
    <b>Tiêu đề ( english )</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br />	
		    

<b>Ngày bắt đầu</b> <input type="text" id="datepickerfrom" name="datepickerfrom"/>
<br />
<b>Giờ bắt đầu</b> 
<select name="giobt", id="giobt">
<?php
for($i=0;$i<24;$i++){
?>

<?php
	if(@$item['giobatdau'] == $i){
?>
<option value="<?= $i ?>" selected><?= $i ?></option>
<?php
	}else{
?>
<option value="<?= $i ?>"><?= $i ?></option>
<?php
	}
?>

<?php
}
?>
</select>

<br/>



<b>Ngày kết thúc</b>  <input type="text" id="datepickerto" name="datepickerto" /><br />
<b>Giờ kết thúc</b>

<select name="giokt" id="giokt">
<?php
for($i=0;$i<24;$i++){
?>

<?php
	if(@$item['gioketthuc'] == $i){
?>
<option value="<?= $i ?>" selected><?= $i ?></option>
<?php
	}else{
?>
<option value="<?= $i ?>"><?= $i ?></option>
<?php
	}
?>

<?php
}
?>
</select>

<br/>
<b>Giảm giá (%)</b> 
<select name="phantram" id="phantram">
<?php
for($i=1;$i<101;$i++){
?>
<?php
	if(@$item['tylegiam'] == $i){
?>
<option value="<?= $i ?>" selected><?= $i ?></option>
<?php
	}else{
?>
<option value="<?= $i ?>"><?= $i ?></option>
<?php
	}
?>
<?php
}
?>
</select>
<br />
   
	 <b>Nội dung</b><br/>
	<div>
	 <textarea name="noidung_vi" id="noidung_vi"><?=@$item['noidung_vi']?></textarea></div><br/>
     	 <b>Nội dung ( english )</b><br/>
	<div>
	 <textarea name="noidung_en" id="noidung_en"><?=@$item['noidung_en']?></textarea></div><br/>
	<div style="display:none;">
	<b>Số thứ tự</b> <input type="text" name="stt" value="1" style="width:30px">
	</div>
	
	<b>Áp dụng</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="button" value="Lưu" class="btn" onclick="submitform();" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=khuyenmai&act=man'" class="btn" />
</form>