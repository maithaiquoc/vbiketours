<?php
include_once _lib."email_config.php";
		$shop  = "-=:: Mỹ Phẩm Sắc Việt ::=-";
		$shop_name_mail  = 'Admin Mỹ Phẩm Sắc Việt';
			// ALTER TABLE  `donhang` AUTO_INCREMENT =1
			// file 02-smtp.php
		include_once "phpmailer/class.pop3.php";
        include_once "phpmailer/class.smtp.php";
        include_once "phpmailer/class.phpmailer.php";
			//Khởi tạo đối tượng
		$mail = new PHPMailer();
			/*=====================================

			 * THIET LAP THONG TIN GUI MAIL

			 *=====================================*/
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = $mail_host; // tên SMTP server
		$mail->SMTPDebug  = 2; // enables SMTP debug information (for testing)
													   // 1 = errors and messages
													   // 2 = messages only 
		$mail->SMTPSecure = "SSL";   
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Host       = $mail_host;         // Thiết lập thông tin của SMPT
		$mail->Port       = $mail_port;// Thiết lập cổng gửi email của máy
		$mail->Username   = $mail_user;         // SMTP account username
		$mail->Password   = $mail_pass;                // SMTP account password
			//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom($mail_send,$shop_name_mail);			

			//Thiết lập thông tin người nhận
		$mail->AddAddress($guitoi,$guitoi_ten);
			//Thiết lập email nhận email hồi đáp
			//nếu người nhận nhấn nút Reply
		$mail->AddReplyTo($mail_send,$shop_name_mail);

			/*=====================================
			 * THIET LAP NOI DUNG EMAIL
			 *=====================================*/
			

			//Thiết lập tiêu đề
		$mail->Subject    =  $subject.$shop;		

			//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";

?>