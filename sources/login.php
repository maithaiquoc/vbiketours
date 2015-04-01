<?php	if(!defined('_source')) die("Error");

session_start();
	$username = $_POST['username'];

	$password = $_POST['password'];

	

	$sql = sprintf("select * from #_user where password='".$password."' and  username='".$username."'");
echo $sql;
	$user=mysql_query($sql);
	//$row_user=mysql_fetch_assoc($user);
	$totalRows=mysql_num_rows($user);
	if($totalRows==1)
	{
		$_SESSION['username']=$row_user['username'];
		$_SESSION['password']=$row_user['password'];
		if((isset($_SESSION['back'])==true)&&($_SESSION['back']!=''))
		{
			$back=$_SESSION['back'];
			unset($_SESSION['back']);
			//header("location:$back");
		}
		else
		header("thanh cong");
	}


?>