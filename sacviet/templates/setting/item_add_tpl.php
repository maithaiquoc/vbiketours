<script type="text/javascript">



    tinyMCE.init({

        // General options

        mode : "exact",

        elements : "kygoiEN, kygoiVN",

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

<h3>Setting System</h3>



<form name="frm" method="post" action="index.php?com=setting&act=save" enctype="multipart/form-data" class="nhaplieu">



	<b>Title:</b> <input type="text" name="title_vi" value="<?=@$item['title_vi']?>" class="input" /><br /><br>

  <?php /*?>  <b>Title EN:</b> <input type="text" name="title_en" value="<?=@$item['title_en']?>" class="input" /><br /><br><?php */?>

	<b>Keywords</b> 

        <textarea name="keywords" id="keywords" cols="45" rows="5"><?=@$item['keywords']?></textarea>

     <br><br />

	<b>Description</b> 

        <textarea name="description" id="description" cols="45" rows="5"><?=@$item['description']?></textarea>

     <br><br />	

    <b>Company:</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br>

    <?php /*?><b>Tên công ty EN:</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br><?php */?>

    <b>Email:</b> <input type="text" name="email" value="<?=@$item['email']?>" class="input" /><br /><br>

    <b>Website:</b> <input type="text" name="website" value="<?=@$item['website']?>" class="input" /><br /><br>

   <!-- <b>Điện thoại:</b> <input type="text" name="dienthoai" value="<?=@$item['dienthoai']?>" class="input" /><br /><br>-->

    <b>Address:</b> <input type="text" name="diachi_vi" value="<?=@$item['diachi_vi']?>" class="input" /><br /><br>

    <b>Slider text index:</b> <input type="text" name="diachi_en" value="<?=@$item['diachi_en']?>" class="input" /><br /><br>

    <b>Hotline:</b> <input type="text" name="hotline" value="<?=@$item['hotline']?>" class="input" /><br /><br>

<?php /*?><b>Phí vận chuyễn:</b> <input type="text" name="phivanchuyen" value="<?=@$item['phivanchuyen']?>" class="input" /><br /><br><?php */?>

    <!-- <b>Tọa độ:</b> <input type="text" name="toado" value="<?=@$item['toado']?>" class="input" /><br /><br> -->



<b>Facebook link:</b> <input type="text" name="facebook_link" value="<?=@$item['facebook_link']?>" class="input" /><br /><br>

<b>Twitter link:</b> <input type="text" name="twitter_link" value="<?=@$item['twitter_link']?>" class="input" /><br /><br>

<b>Linkedin link:</b> <input type="text" name="linkedin_link" value="<?=@$item['linkedin_link']?>" class="input" /><br /><br>

<b>Googleplus link:</b> <input type="text" name="googleplus_link" value="<?=@$item['googleplus_link']?>" class="input" /><br /><br>


<b>Contact title:</b>

<textarea name="kygoiEN" id="kygoiEN" cols="45" rows="5"><?=@$item['kygoi_en']?></textarea>

<br><br />


 <b>Contact content:</b>

        <textarea name="kygoiVN" id="kygoiVN" cols="45" rows="5"><?=@$item['kygoi_vi']?></textarea>

     <br><br />

<?php /*?> <b>Ký gởi EN:</b>

        <textarea name="kygoiEN" id="kygoiEN" cols="45" rows="5"><?=@$item['kygoi_en']?></textarea>

     <br><br />	<?php */?>

	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />

	<input type="submit" value="Save" class="btn" />

	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=setting&act=capnhat'" class="btn" />

</form>