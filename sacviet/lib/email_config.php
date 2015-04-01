<?php if(!@defined('_lib')) die("Error");
$dom = new DOMDocument();
$dom->load(_lib."mail.xml");

	$mails = $dom->getElementsByTagName("item");
	foreach($mails as $mail)
	{
		$host = $mail->getElementsByTagName("host")->item(0);
		$mail_host = $host->nodeValue;		

		$port = $mail->getElementsByTagName("port")->item(0);
		$mail_port = $port->nodeValue;
		

		$user = $mail->getElementsByTagName("user")->item(0);
		$mail_user = $user->nodeValue;
		

		$pass = $mail->getElementsByTagName("pass")->item(0);
		$mail_pass = $pass->nodeValue;	
		

		$send = $mail->getElementsByTagName("send")->item(0);
		$mail_send = $send->nodeValue;	
	}
	
?>