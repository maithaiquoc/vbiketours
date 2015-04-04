<div class="submenu-content">
    <span class="name-sub"><?=_tuyendung?></span>
    <ul class="sub-item">
        <li><a href="<?=$lang?>/tuyen-dung.html"><?=_thongtinchung?></a></li>
         <?php			  
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>
        <li><a href="<?=$lang?>/tuyen-dung/<?=$tintuc[$i]['id']?>-<?=$tintuc[$i]['tenkhongdau']?>.html"><?=$tintuc[$i]['ten_'.$lang]?></a></li>
         <?php } ?>
         <li><a href="<?=$lang?>/nop-don-tuyen-dung.html"><?=_nopdontructuyen?></a></li>
    </ul>
    <div class="clear"></div>
</div>
   <div class="box_content">
               	         
           <table border="0" cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td width="710" valign="top" align="right" style="border-top:0px solid #dbdbdb;">
			<div class="height1"></div>
				<script language="JavaScript" type="text/javascript">
												function show(id)
{
	if(document.contact.other.checked == true)
		document.getElementById('txtOther').style.display="inline";
	else	
		document.getElementById('txtOther').style.display="none";

}

												function check_form(theF){
													if (theF.name.value==""){
														alert ("Bạn chưa nhập họ tên");
														theF.name.focus();
														return (false);
													}
													if (theF.address.value==""){
														alert ("Bạn chưa nhập địa chỉ");
														theF.address.focus();
														return (false);
													}
													if (theF.tel.value==""){
														alert ("Bạn chưa nhập số điện thoại");
														theF.tel.focus();
														return (false);
													}
													if (theF.email.value==""){
														alert ("Bạn chưa nhập địa chỉ E-mail");
														theF.email.focus();
														return (false);
													}
													if (theF.email.value.indexOf('@',0)==-1 || theF.email.value.indexOf('.')==-1){
														alert ("Bạn nhập sai địa chỉ Email.");
														theF.email.focus();
														return (false);
													}
													if (theF.message.value.length>4000){
														alert ("Ý kiến tối đa 4000 ký tự.");
														theF.message.focus();
														return (false);
													}
													return (true);
												}
												</script>
										<form name="contact" enctype="multipart/form-data" onSubmit="javascript:return check_form(this)" method="post" action="">
											<table border="0" cellpadding="5" cellspacing="10" style="margin:auto;" bordercolor="#0099FF" width="100%" align="center" style="margin:auto;color:#ffffff;" class="tbcontact">
											<tr><td colspan="2" height="8"></td></tr>											
											<!--<tr><td colspan="2" height="10"></td></tr>-->
											  <tr>
												<td colspan="2"></td>
											  </tr>
											   <tr>
												<td colspan="2" height="10"></td>
											  </tr>
											  <tr>
												<td width="30%" align="left" style="padding-left:70px;"><?=_hovaten?>: <font color="#FFffff">*</font></td>
												<td width="70%" align="left"><input name="name" class="inputCommand" id="name" tabindex="1"  onkeyup="telexingVietUC(this,event);" size="53" /></td>
											  </tr>
											  <tr>
												<td align="left" style="padding-left:70px;"><?=_diachi?>: <font color="#FFffff">*</font></td>
												<td align="left"><input class="inputCommand" onKeyUp="telexingVietUC(this,event);" name="address" size="53" tabindex="2" /></td>
											  </tr>
											  <tr>
												<td align="left" style="padding-left:70px;"><?=_sodienthoai?>: <font color="#FFffff">*</font></td>
												<td align="left"><input class="inputCommand" onKeyUp="inputMask(this,'0123456789.')" name="tel" size="53" tabindex="3" maxlength="20" /></td>
											  </tr>
											  <tr>
												<td align="left" style="padding-left:70px;">E-mail: <font color="#FFffff">*</font></td>
												<td align="left"><input class="inputCommand" onKeyUp="telexingVietUC(this,event);" name="email" size="53" tabindex="4" /></td>
											  </tr>
											  <tr>
												<td align="left" style="padding-left:70px;">CV: <font color="#FFffff">*</font></td>
												<td align="left"><input type="file" name="txtfile" size="22"/></td>
											  </tr>
											  <tr>
												<td align="left" valign="top" style="padding-left:70px;"><?=_vitriungtuyen?>: </td>
												<td align="left" valign="top" style="line-height:25px;">
                                                <input type="checkbox" value="<?=_quanly?>" name="check0" /> &nbsp; <?=_quanly?><br/>
                                                <input type="checkbox" value="<?=_truongphong?>" name="check1" /> &nbsp; <?=_truongphong?><br/><input type="checkbox" value="<?=_nhanvien?>" name="check2" /> &nbsp; <?=_nhanvien?><br/>
													<input type="checkbox" name="other"  onclick="show()" /> &nbsp; <?=_khac?> &nbsp; <input type="text" name="txtOther" id="txtOther"  style="display:none;"/>
												</td>
											  </tr>
											  <tr>
												<td align="left" valign="top" style="padding-left:70px;"><?=_ghichuthem?>: </td>
												<td align="left"><textarea name="message" cols="40"  rows="8" class="inputCommand" id="message" tabindex="6" onKeyUp="telexingVietUC(this,event);"></textarea></td>
											  </tr>
											  <tr>
												<td colspan="2" height="7" align="left" valign="top"></td>
											  </tr>
											  <tr>
												<td></td><td align="left">
													<input type="submit" value="  &nbsp;  " name="submit" tabindex="11" style=" background:url(http://ozcorporation.com/oz/images/guidi.jpg) center no-repeat; width:93px; height:21px; border:0px;" /> &nbsp; 
													<!--<input  type="reset" value=" &nbsp; " name="reset" tabindex="12" style=" background:url(http://ozcorporation.com/oz/images/lamlai.jpg) center no-repeat; width:65px; height:26px; border:0px;" />-->
												</td>
											  </tr>
											  <tr><td colspan="2" height="10"></td></tr>
										  </table>
										  </form>
			</td>
			<!--<td valign="top">
				<div class="height1"></div>
				<div class="title_info">liên hệ</div>
				<div class="rightMenu"><ul><li><a href="http://ozcorporation.com/oz/tuyen-dung/thong-tin-chung/27/">thông tin chung</a></li><li><a href="http://ozcorporation.com/oz/tuyen-dung/co-hoi-nghe-nghiep/29/">cơ hội nghề nghiệp</a></li><li><a href="http://ozcorporation.com/oz/tuyen-dung/huong-dan-nop-ho-so/28/">hướng dẫn nộp hồ sơ</a></li><li><a href="http://ozcorporation.com/oz/tuyen-dung/nop-don-truc-tuyen/30/">nộp đơn trực tuyến</a></li></ul></div>
			</td>-->
		</tr>
		
		</table>
          </div>