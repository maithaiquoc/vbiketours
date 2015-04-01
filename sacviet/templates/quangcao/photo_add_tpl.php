
<script type="text/javascript">



	tinyMCE.init({



		// General options



		mode : "exact",



        elements : "mota",



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
<h3>Photo</h3>
<form name="frm" method="post" action="index.php?com=quangcao&act=save_photo" enctype="multipart/form-data" class="nhaplieu">
<?php for($i=0; $i<1; $i++){?>	
    <b>Photo <?=$i+1?></b> <input type="file" name="file<?=$i?>" /> <strong>Width: 168px&nbsp;Height: 210px&nbsp;.jpg&nbsp;|&nbsp;.gif&nbsp;|&nbsp;png</strong><br />
    <br />
	<b>Content</b><br/>



	<div>



	 <textarea name="mota<?=$i?>" id="mota"><?=@$item['mota']?></textarea></div>



    <br/> 
<b>No. </b> <input type="text" name="stt<?=$i?>" value="1" style="width:30px" />	<br />
	<b>Show</b> <input type="checkbox" name="hienthi<?=$i?>" checked="checked" /> <br /><br />
	
<? }?>
	<input type="submit" value="Save" class="btn" />
	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=quangcao&act=man_photo'" class="btn" />
</form>