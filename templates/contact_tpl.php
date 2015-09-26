<script src="http://maps.google.com/maps/api/js?sensor=false"  type="text/javascript"></script>

<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>

<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4_patch.js"></script>

<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />





<script>

$(document).ready(function(){

$('#txtname').attr("placeholder","Name");

$('#txtEmail').attr("placeholder","Email");
$('#txtsub').attr("placeholder","Subject");

$("#txtNoidung").replaceWith('<textarea id="txtNoidung" name="noidung" style="width:450px; height: 230px;"></textarea>');

$('#txtNoidung').attr("placeholder","Details");

$('#btnSend').click(function(){

if($('#txtname').val() == '' || $('#txtEmail').val() == '' || $('#txtNoidung').val() == ''){

alert('Tên, Email & Nội dung là thông tin bắt buộc.');

}else{

if(!IsEmail($('#txtEmail').val()))

			{

				alert('<?=_emailError1?>');

			}

			else

			{

$('#form2').submit();

}

}

});





$('#content img').each(function() {

      var url =  $(this).attr("src");

      $(this).wrap('<a rel="downslider" href="' + url + '" />');

   });



$("a[rel=downslider]").fancybox({

				'transitionIn'		: 'none',

				'transitionOut'		: 'none',

				'titlePosition' 	: 'over',

				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {

					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';

				}

			});



});





function IsEmail(email) {

	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	  return regex.test(email);

	}



</script>





<?php /*?>   <form name="form2" id="form2" method="post">

<div style="width:100%;">



<div id="proce_container" style="height: 1709px;margin-bottom: 50px;">

				<ul style="float: left; width: 60%;">
<li style="float: left; width: 100%; text-align: left; color: #cecece;"></li>
<li style="float: left; width: 100%; text-align: left; color: #cecece;"><br /><br /></li>
<li style="float: left; text-align: left; width: 100%; padding-bottom: 15px;">

<input id="txtname" style="width: 38%; height: 27px; float: left;" title="" type="text" name="name" value="" /></li>
<li style="float: left; text-align: left; width: 100%; padding-bottom: 15px;">

<input id="txtEmail" style="width: 38%; height: 27px; float: left;" title="" type="text" name="email" value="" /></li>
<li style="float: left; text-align: left; width: 38%; padding-bottom: 15px;">
<select style="font-family: Cursive; width: 100%; height: 27px;" name="lienquan">
<option>Sản Phẩm</option>
<option>Tin Tức</option>
<option>Blog</option>
<option>Kh&aacute;c</option>
</select></li>
<li style="width: 40%;"><input id="txtNoidung" style="vertical-align: text-top;" type="text" name="noidung" /></li>
<li style="width: 100%; float: left; padding-bottom: 10px; padding-top: 20px; text-align: left;"><button id="btnSend" style="background: #b8d56a; color: #ffffff; height: 30px; width: 100px; cursor: pointer;" name="btnSend" type="button"> Send </button></li>
</ul>
</div>
</div>
</form><?php */?>

<?php
$d->reset();

$sql_contact = "select * from #_setting ";

$d->query($sql_contact);

$row_setting = $d->fetch_array();
?>

<div id="ja-container" class="wrap ">
	<div class="main clearfix">

		<div id="ja-mainbody" style="width:100%">
            <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href="/<?=$com?>.html"><?=ucfirst($com)?></a></li>
            </ul>
			<!-- CONTENT -->
<div id="ja-main" style="width:100%">
<div class="inner clearfix">
	
	

	
	<div id="ja-contentwrap" class="">
				<div id="ja-content" class="column" style="width:100%">

			<div id="ja-current-content" class="column" style="width:100%">
								
								<div class="ja-content-main clearfix">
								<div class="componentheading"><?=$row_setting['kygoi_en']?></div>
	 <form name="form2" id="form2" method="post"><!-- Do not remove this ID, it is used to identify the page so that the pagination script can work correctly -->
<div class="contact-container" id="rsform_12_page_0">
	<div><div id="rsform_error_12" style="display: none;"><p class="formRed">Please complete all required fields!</p></div></div>
	<div class="contact-main">
		<div class="contact-inner contact-left">
			<div class="formField rsform-block rsform-block-description"><?=$row_setting['kygoi_vi']?></div>
			<div class="formField rsform-block rsform-block-socialicons">
            <p class="social-icons-zone">
            <a href="<?=$row_setting['facebook_link'] ?>" target="_blank"><img width="128" height="48" src="./upload/contact_facebook48.png" alt="vbiketours on Facebook"></a>&nbsp;&nbsp;<a href="<?= $row_setting['googleplus_link'] ?>" target="_blank"><img width="48" height="48" src="./upload/contact_gplus48.png" alt="vbiketours on Google plus"></a>&nbsp;&nbsp;<a href="<?= $row_setting['twitter_link'] ?>" target="_blank"><img width="48" height="48" src="./upload/contact_twitter48.png" alt="vbiketours on Twitter"></a>
            <a href="<?= $row_setting['linkedin_link'] ?>" target="_blank">

<img src="images/linkedin_32.png" alt="linkedin"  style="width:50px !important;;height:50px !important;"  />

</a>
</p></div>
		</div>
		<div class="contact-inner contact-right">
			<div class="formField rsform-block rsform-block-name">
			Your Name (*)<br>
			<input type="text" value="" size="20" name="name" id="txtname" class="rsform-input-box">
     
            <br>
			
			</div>
			<div class="formField rsform-block rsform-block-email">
			Your Email (*)<br>
			<input type="text" value="" size="20" name="email" id="txtEmail" class="rsform-input-box">
           
            <br>
			
			
			</div>
			<div class="formField rsform-block rsform-block-subject">
			Subject (*)<br>
			<input type="text" value="" size="20" name="subject" id="txtsub" class="rsform-input-box"><br>
			
			<br>
			</div>
			<div class="formField rsform-block rsform-block-message">
			Message (*)<br>
			<textarea cols="32" rows="5" name="noidung" id="txtNoidung" style="width: 90%" class="rsform-text-box"></textarea><br/>
			</div>
			<div class="formField rsform-block rsform-block-message text-center">
                <button id="btnSend" class="btn" style="background: #e2227c; color: #ffffff !important; height: 30px; width: 100px; cursor: pointer;" name="btnSend" type="button"> Send </button>
			</div>
			<!--<div class="formField rsform-block"><input type="submit" value="SEND" name="form[Send]" id="Send" class="submit-booking-form-button stdButton regular gayblue rsform-submit-button" style="font-weight: bold;"></div>
			<div class="formField rsform-block rsform-block-send"></div>-->
		</div>
	</div>
</div></form>
				
								
				
			</div>

			
		</div>
		
			</div>

	
</div>
</div>
<!-- //CONTENT -->					</div>

			
	</div>
	</div>






		