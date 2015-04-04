<script type="text/javascript" src="./js/avim.js"></script>
<script type="text/javascript" src="./js/validation.js"></script>
<style>
/*=======================form đăng ký=================*/
input[type="text"], input[type="password"], textarea, select, .scroll-y {
	border: 1px solid rgb(221, 221, 221);
     font-style: italic;
 }
.pull-right[class*="span"], .row-fluid1 .pull-right[class*="span"] {
    float: left;
}
.signin .signin-box {
    width: 350px;
}
.row-fluid1{
    width: 100%;
}
form {
    margin: 0px 0px 20px;
}
.signin-box form .row-fluid1 {
    margin-bottom: 0.5em;
}
#vnalpha .vnalpha-arrow {
    border-bottom-color: transparent;
    border-left: medium none;
    border-right-style: solid;
    border-top-color: transparent;
    left: 0px;
    margin-top: -5px;
    top: 50%;
}
.vnalpha-arrow {
    border: 5px dashed rgb(251, 238, 213);
    height: 0px;
    line-height: 0;
    position: absolute;
    width: 0px;
}
.vnalpha-inner {
    background-color: rgb(252, 248, 227);
    border: 1px solid rgb(251, 238, 213);
    color: rgb(192, 152, 83);
    padding: 5px 4px;
    text-align: center;
    font-weight: bold;
}
.row-fluid1 [class*="span"]:first-child {
    margin-left: 0px;
}
.row-fluid1 .span5 {
    width: 40.4255%;
}
.signin-button button {
    background: none repeat scroll 0% 0% rgb(190,219,79);
    border: medium none;
    border-radius: 2px;
    padding: 0px 6px;
    line-height: 40px;
    width: 130px;
    color: rgb(255,255,255);
    font-weight: bold;
	cursor: pointer;
}
.row-fluid1 .span12 {
    width: 100%;
}
#vnalpha {
    font-size: 11px;
    padding: 5px;
    position: absolute;
    z-index: 100000;
    top: 0px;
    left: 100%;
    width: 53%;
}
.row-fluid1{
 text-align:left;
}
.tensp1{
padding-bottom:5px;width: 100%;text-align:left;float: left;font-size: 23px;

}
</style>
<script type="text/javascript">
	
	function createaccount(){			
		var fullname = $('#accfullname').val();
		var email = $('#accemail').val();
		var phone = $('#accphone').val();
		var address = $('#accaddress').val();
		var account = $('#accusername').val();
		var password = $('#accpass').val();
		var passwordconfirm = $('#accpasscf').val();
		
		if(fullname.replace(/\s/g, "") == '' || email.replace(/\s/g, "") == '' || 
		phone.replace(/\s/g, "") == '' || address.replace(/\s/g, "") == '' || 
		password.replace(/\s/g, "") == '' || account.replace(/\s/g, "") == '' || passwordconfirm.replace(/\s/g, "") == '')
		{
			alert('<?=_nhapdaydutt?>');
		}
		else
		{
			if(!IsEmail(email))
			{
				alert('<?=_emailError1?>');
			}
			else
			{
				if(password != passwordconfirm)
				{
					alert('<?=_matkhaukhongdung?>');
				}
				else
				{
					$('#btn_CreateAccount').click();
				}
			}
		}
	}
	
	function IsEmail(email) {
	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
	 
</script>

<?php	
	$accusername = isset($_POST['accusername']) ? trim($_POST['accusername']) : "";
	$accfullname = isset($_POST['accfullname']) ? trim($_POST['accfullname']) : "";
	$accaddress = isset($_POST['accaddress']) ? trim($_POST['accaddress']) : "";
	$accphone = isset($_POST['accphone']) ? trim($_POST['accphone']) : "";
	$accemail = isset($_POST['accemail']) ? trim($_POST['accemail']) : "";
	$accpass = isset($_POST['accpass']) ? trim($_POST['accpass']) : "";
	$accpasscf = isset($_POST['accpasscf']) ? trim($_POST['accpasscf']) : "";
	
	if (isset($_POST['btn_CreateAccount'])){		
		
		$d->reset();
		$sql_account_query = "select * from table_user where username='".$accusername."'";
		$d->query($sql_account_query);
		$row_detail_account = $d->fetch_array();
		
		if(!empty($row_detail_account) )
		{
			
echo "<script>alert('"._usedname."');</script>";

		}
		else
		{
			$d->reset();
			$sql_user_query = "select (max(id)+1) as countuser from table_user";
			$d->query($sql_user_query);
			$row_detail_user = $d->fetch_array();
			$iduid = $row_detail_user["countuser"];
			$d->reset();
			$data['id'] = $iduid;
			$data['username'] = $accusername;
			$data['password'] = md5($accpass);
			$data['ten'] = $accfullname;
			$data['dienthoai'] = $accphone;
			$data['email'] = $accemail;
			$data['diachi'] = accaddress;
			$d->setTable('user');

			if($d->insert($data))
				{
					//echo "<script>alert('"._themthanhcong."');</script>";
echo "<script>window.location.assign('"._successdayky."');</script>";
				}
			else
				{
					echo "<script>alert('"._themkhongduoc."');</script>";
				}
		}
	}
	
	if (isset($_POST['btnSignIn'])){
$url = $_SERVER['REQUEST_URI'];
$query_str = parse_url($url, PHP_URL_QUERY);
parse_str($query_str, $query_params);

		$uid = isset($_POST['SignInFormusername']) ? trim($_POST['SignInFormusername']) : "";
		$pwd = isset($_POST['SignInFormpassword']) ? trim($_POST['SignInFormpassword']) : "";
		$d->reset();
		$sql_login_query = "select * from table_user where password=md5('".$pwd."') and  md5(username)=md5('".$uid."')";
		$d->query($sql_login_query);
		$row_detail_login = $d->fetch_array();
		
		if(!empty($row_detail_login))
		{
			$_SESSION['username']= $uid;	
			$curURL = curPageURL();	
			if($_SESSION['usernameurl'] != null && $_SESSION['usernameurl'] != "" && $_SESSION['usernameurl'] != $curURL){	
				$curURL = $_SESSION['usernameurl'];
				$_SESSION['usernameurl']= "";
				echo "<script>window.location.assign('".$curURL."');</script>";
			}			
			else echo "<script>window.location.assign('"._successdangnhap."?url=".$query_params['url']."');</script>";
				//echo "<script>window.location.assign('./');</script>";
		}	
		else
		{		
			echo "<script>alert('"._errorlogin."');</script>";
		}
	}
?>
<div id="container"><!-------load sp-->
 	<div id="regis_bg_center">
       		<img src="images/banner_content.jpg" alt="banner" title=""  />
    </div>
    <div id="regis_body_spct" style="height:auto;padding-top:30px;">
			<div class="row signin row-fluid1" style=" border-color: rgb(190,219,79); width:95%;height:auto;float:left; border-style: solid; border-width: 1px 1px 1px 1px;margin-left:25px;">

			  
			<div class="span5 pull-right signin-box">   


				<div class="signin-form" style="width:300px;float:left;padding-left:90px;padding-top:30px;">
							<div class="tensp1" style="padding-bottom:10px;">
											<?=_login?>
									 
							</div>
							<div class="txttaotaikhoan" style="padding-bottom:20px;">

										<?=_textlogin?>
									
							</div>
						
					<form class="form-login-vatgia form-vertical" id="acc-form" action="" method="post">	
						
							<div style="padding-bottom:10px">
							<input id="SignInForm_username" placeholder="<?=_username?>" class="span12 error" type="text" name="SignInFormusername" maxlength="255" style="padding:10px"></input>
							</div>
							 
							 <div style="padding-bottom:10px">
							 <input id="SignInFormpassword" placeholder="<?=_password?>" class="span12 error" type="password" name="SignInFormpassword" maxlength="255" style="padding:10px"></input>
							 </div>
							 
							<div class="row-fluid1" style="margin-bottom: -20px;">
								<div class="span5 signin-button">
									<button type="submit" id="btnSignIn" name="btnSignIn" class="ga-event _vatgia" data-ga-event-category="sign-in" data-ga-event-action="click-signin-button" data-ga-event-value="vatgia">Send</button>
								</div>							  
							</div>
					</form>   
				</div>			
			</div> 
			<div class="signing-right" style="float:right;width:300px; padding:30px;padding-right:100px;height:auto">
			<div class="signin-form" style="float:right;">
							<div class="tensp1" style="">
												<?=_taotaikhoan?>  
									 
							</div>
							<div class="txttaotaikhoan" style="padding-bottom:10px;padding-top:10px">

										<?=_textlogin?>
									
							</div>
							<div class="tensp1" style="">
												<?=_thongtincanhan?>
									 
							</div>
							<form class="form-login-vatgia form-vertical" name="accform" id="accform" action="" method="post">	
						
							<div style="padding-bottom:10px">
								<input id="accfullname" class="span12 error" value="<?=$accfullname?>" type="text" name="accfullname" placeholder="Full Name" maxlength="255" style="padding:10px"></input>
							</div>
							
							<div style="padding-bottom:10px">
								<input id="accemail" class="span12 error" value="<?=$accemail?>" type="text" name="accemail" placeholder="Email" maxlength="255" style="padding:10px"></input>
							</div>
							
							
							<div style="padding-bottom:10px">
								<input id="accaddress" class="span12 error" value="<?=$accaddress?>" type="text" name="accaddress" placeholder="Address" maxlength="255" style="padding:10px"></input>
							 </div>
							
							<div style="padding-bottom:10px">
								<input id="accphone" class="span12 error" value="<?=$accphone?>" type="text" name="accphone" placeholder="Phone Number" maxlength="255" style="padding:10px"></input>
							 </div>
							
							
					</div>
					<div class="sign-form1" style="width:269px;float:right; padding-top:50px;">
							 <div class="tensp1" style="padding-bottom:3px;">
												<?=_thongtindangnhap?>
									 
							</div>
							 <div style="padding-bottom:10px">
								<input id="accusername" class="span12 error" value="<?=$accusername?>" type="text" name="accusername" placeholder="User Name" maxlength="255" style="padding:10px"></input>
							 </div>
							
							<div style="padding-bottom:10px">
								<input id="accpass" class="span12 error" type="password" value="<?=$accpass?>" name="accpass" placeholder="Password" maxlength="255" style="padding:10px"></input>
							</div>
							<div style="padding-bottom:10px">
								<input id="accpasscf" class="span12 error" type="password" value="<?=$accpasscf?>" name="accpasscf" placeholder="Confirm Password" maxlength="255" style="padding:10px"></input>
							</div>
							 
							<div class="row-fluid1" style="margin-bottom: -20px;">
								<div class="span5 signin-button">
									<button type="button" id="btnCreateAccount" name="btnCreateAccount" class="ga-event _vatgia" onclick="createaccount();"><?=_taoaccount?></button>
									<button type="submit" id="btn_CreateAccount" name="btn_CreateAccount" class="ga-event _vatgia" style="display:none;"><?=_taoaccount?></button>
								</div>
							  
							</div>
					</form>   
				</div>
				</div>
		</div>
 </div>
</div>
    <div class="clear"></div>