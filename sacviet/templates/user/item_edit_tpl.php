<script language="javascript" src="media/scripts/my_script.js"></script>


<script language="javascript">


function js_submit(){


	if(isEmpty(document.frm.username, "Chưa nhập tên đăng nhập.")){

		return false;

	}




	if(!isEmpty(document.frm.email) && !check_email(document.frm.email.value)){


		alert('Email không hợp lệ.');


		document.frm.email.focus();


		return false;


	}


}


</script>


<h3>Member</h3>





<form name="frm" method="post" action="index.php?com=user&act=save" enctype="multipart/form-data" class="nhaplieu" onSubmit="return js_submit();">





	<b>User name</b> <input type="text" name="username" id="username" value="<?=$item['username']?>" class="input" /><span class="require">*</span><br />
	

	<b>Email</b> <input type="text" name="email" id="email" value="<?=$item['email']?>" class="input" /><br />


	<b>Fullname</b> <input type="text" name="ten" id="ten" value="<?=$item['ten']?>" class="input" /><br />
	

	<br />


	<b>Yahoo nickname</b> <input type="text" name="nick_yahoo" value="<?=$item['nick_yahoo']?>" class="input" /><br />


	<b>Skype nickname</b> <input type="text" name="nick_skype" value="<?=$item['nick_skype']?>" class="input" /><br />


	<b>Fullname</b> <input type="text" name="dienthoai" value="<?=$item['dienthoai']?>" class="input" /><br />


	<b>Address</b> <input type="text" name="diachi" id="diachi" value="<?=$item['diachi']?>" class="input" /><br />
	
	<b>role</b> 
	<?=get_role_cat($item['role']);?><br />

	<!--<b>Công ty</b> <input type="text" name="congty" id="congty" value="<?=$item['congty']?>" class="input" /><br />


	<b>Quốc gia</b> <input type="text" name="country" id="country" value="<?=$item['country']?>" class="input" /><br />


	<b>Tỉnh</b> <input type="text" name="city" id="city" value="<?=$item['city']?>" class="input" /><br />





	


	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>


	
-->

	<b>Show</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />


	


	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />


	<input type="submit" value="Save" class="btn" />


	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=user&act=man'" class="btn" />


</form>

<?php


function get_role_cat($role)

	{
		
		$str='

			<select id="id_list_role" name="id_list_role" class="main_font">
			<option value="0">select role</option>
			';
			
		if((int)$role == 3)
			$str.='<option value="3" selected>Admin</option>';
		else
			$str.='<option value="3">Admin</option>';	
			
		if((int)$role == 2 || (int)$role === 1)
			$str.='<option value="1" selected>User</option>';
		else
			$str.='<option value="1">User</option>';
		

		$str.='</select>';

		return $str;

	}			

?>