<script type="text/javascript">

	tinyMCE.init({

		// General options

		mode : "exact",

        elements : "noidung_vi,noidung_en,noidung_end_vi,noidung_end_en",

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

<h3>Management About Us</h3>


<?php /*?>
<table class="blue_table">







	<tr>



		<th style="width:5%;">No.</th>		



        <th style="width:80%;">Name</th>



	    <th style="width:5%;">Show</th>



		<th style="width:5%;">Edit</th>



		<th style="width:5%;">Delete</th>



	</tr>



    



	<?php for($i=0, $count=count($items); $i<$count; $i++){?>



	<tr>



		<td style="width:5%;" align="center"><?=$items[$i]['stt']?></td>		        



        <td style="width:80%;" align="center"><a href="index.php?com=about&act=video&id=<?=$items[$i]['id']?>" style="text-decoration:none;"><?=$items[$i]['ten_vi']?></a></td>



		<td style="width:5%;">    



		<?php 



		if(@$items[$i]['hienthi']==1)



		{



		?>



        <a href="index.php?com=about&act=capnhat&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_1.png"  border="0"/></a>



		<? 



		}



		else



		{



		?>



         <a href="index.php?com=about&act=capnhat&hienthi=<?=$items[$i]['id']?>"><img src="media/images/active_0.png" border="0" /></a>



         <?php



		 }?>        </td>



		<td style="width:5%;" align="center"><a href="index.php?com=about&act=video&id=<?=$items[$i]['id']?>"><img src="media/images/edit.png"  border="0"/></a></td>



		<td style="width:5%;"><a href="index.php?com=about&act=delete_video&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>



	</tr>



	<?php	}?>



</table>

<div class="paging"><?=$paging['paging']?></div>

<a href="index.php?com=about&act=add"><img src="media/images/add.jpg" border="0"  /></a>



<br /><br /><?php */?>





<form name="frm" method="post" action="index.php?com=about&act=save" enctype="multipart/form-data" class="nhaplieu">       		
	<?php if (@$_REQUEST['act']=='capnhat')

	{?>

	<b>Current Photo:</b><img src="<?=_upload_about.$item['thumb']?>"  alt="NO PHOTO" /><br />

	<?php }?>

	<b>Photo:</b> <input type="file" name="file" /> Width:220px&nbsp;Height:220px&nbsp;<?=_product_type?><br />
	 <b>Content before</b><br/>

	<div>

	 <textarea name="noidung_vi" id="noidung_vi"><?=$item['noidung_vi']?></textarea></div><br/>

 <b>Content after</b><br/>

	<div>

	 <textarea name="noidung_end_vi" id="noidung_end_vi"><?=$item['noidung_end_vi']?></textarea></div><br/>


<?php /*?>
     	 <b style="width:300px;">Nội dung trước( english )</b><br/>

	<div>

	 <textarea name="noidung_en" id="noidung_en"><?=$item['noidung_en']?></textarea></div><br/>

 <b style="width:300px;">Nội dung sau( english )</b><br/>

	<div>

	 <textarea name="noidung_end_en" id="noidung_end_en"><?=$item['noidung_end_en']?></textarea></div><br/>
<?php */?>


	<div style="display:none">

	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />

	</div>

	



	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />

	<input type="submit" value="Save" class="btn" />

	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=about&act=man'" class="btn" />

</form>