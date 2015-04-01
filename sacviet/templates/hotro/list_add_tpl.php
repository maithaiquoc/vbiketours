<script type="text/javascript">



	tinyMCE.init({



		// General options



		mode : "exact",



        elements : "mota_en, mota_vi",



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



function js_submit(){



	if(document.getElementById("ten_vi").value == "" ||  document.getElementById("ten_vi").value == "ten_en")

	{

		alert("Tên menu hỗ trợ là bắt buộc.");

		return false;

	}	

}

</script>



<h3>Add Faq</h3>

<form name="frm" method="post" action="index.php?com=hotro&act=save_item" enctype="multipart/form-data" class="nhaplieu" onSubmit="return js_submit();">







    <b>Title</b> <input type="text" name="ten_vi" id="ten_vi" value="" class="input" /><br />



<?php /*?>    <b>Tên ( english )</b> <input type="text" name="ten_en" id="ten_en" value="" class="input" /><br /><?php */?>

	

	<b>Content</b><br/>



	<div>



	 <textarea name="mota_vi" id="mota_vi"></textarea></div>



    <br/> 



  <?php /*?>  <b>Chi tiết (english)</b><br/>



	<div>



	 <textarea name="mota_en" id="mota_en"></textarea></div>


<?php */?>
    <br/> 



    <b>No.</b> <input type="text" name="stt" value="1" style="width:30px"><br>



	<b>Show</b> <input type="checkbox" name="hienthi" checked="checked"><br />   	



	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />



	<input type="submit" value="Lưu" class="btn" />



	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=hotro&act=man'" class="btn" />



</form>