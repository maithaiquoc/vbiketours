<script language="javascript">
function js_lost_pw(){
	window.location = '<?=@$lost_password_url?>';
}
</script>



<div align="center">




<form action="index.php?com=user&act=login" method="post" class="nhaplieu" id="login">
<table width="500" cellpadding="0" cellspacing="0" border="0" style="background: url(../images/sv.png) no-repeat rgb(138,192,7);" align="center">
<tr>
<td align="center" valign="middle" height="35" style="color: #FFF; font-weight: bold; font-size: 27px; margin-top: 2px; float: right; margin-right:10px;">ĐĂNG NHẬP HỆ THỐNG</td>
</tr>
<tr>
<td style="padding:10px;" colspan="2">
<table width="100%" cellpadding="0" cellspacing="0" border="0"  bgcolor="#FFFFFF">
<tr>
<tr>
<td style="padding:10px;" colspan="2"></td>
<tr>
<td width="33%" align="right">

	<strong>Tên đăng nhập</strong></td>
<td width="37%" height="30" align="left">
	<input type="text" name="username" class="input" style="width:150px;" /></td>
<td width="30%" rowspan="3" align="left"><img src="media/images/j_login_lock.jpg" /></td>
</tr>
<tr><td align="right">	
 	<strong>Mật khẩu</strong>
    </td>
<td align="left">
	<input type="password" name="password" class="input" style="width:150px;" /></td>
</tr>

<!--	<b>Nhớ mật khẩu</b>
	<input type="checkbox" name="remember"/><br> -->	
<tr><td colspan="2" align="center">
	<input type="submit" value="Đăng nhập" style="background: none repeat scroll 0% 0% rgb(138,192,7); overflow: visible; width: auto; padding: 10px; cursor: pointer; color: #fff; height: 40px; font-size: 11px; font-weight: bold;"/></td>
  </tr>
</table></td>
</tr>
</table>
<!--	<input type="button" value="Quên mật khẩu" class="btn" onclick="js_lost_pw()" /> -->

</form>

</div>

