<html>
<head>
<meta charset="UTF-8">
<title>Confirmation about booking on vbiketours.com</title>
</head>
<body>

<?php

//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once('../class.phpmailer.php');
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

$mail             = new PHPMailer();

$body             = '<div class="container-fluid">
                        <div class="row" style="margin: 5px;">
                            <p class="btn btn-info">Announce about booking successfully!</p>
                        </div>
                        <div class="row" style="margin: 5px;">
                            <img src="http://vbiketours.com/images/logo.png">
                            <p>Hello '. $_POST["title"].' '.$_POST["firstName"] .' ,</p>
                            <p>Congratulate your booking was done successfully on VBIKETOURS system.</p><br/>
                            <p style="text-decoration: underline;">Details of your booking:</p><br/>
                        </div>
                        <div class="row" style="margin: 5px; padding: 5px; border: 1px solid #e2227c">
                            <p>Full name: <b>'.$_POST["title"].' '.$_POST["firstName"].' '.$_POST["lastName"].'</b></p>
                            <p>Nationality: <b>'.strtoupper($_POST["nationality"]).'</b></p>
                            <p>Phone number: <b>'.$_POST["phoneNumber"].'</b></p>
                            <p>Hotel: <b>'.$_POST["hotelName"].' - '.$_POST["hotelAddress"].' - Room '.$_POST["roomNumber"].'</b></p>
                            <p>Tours: <b>'.$_POST["tours"].'</b></p>
                            <p>Total: <b>'.$_POST["total"].' $</b></p>
                            <p>Check out: <b>'.$_POST["method"].'</b></p>
                            <p>Notes: <b>'.$_POST["additional-comments"].'</b></p>
                        </div>
                        <p>Thank you very much.</p>
                        <p><a href="http://vbiketours.com/">Vbiketours</a></p>
                    </div>';

$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = "ssl://smtp.googlemail.com"; // SMTP server
$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Host       = "ssl://smtp.googlemail.com"; // sets the SMTP server
$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
$mail->Username   = "vbiketours2015@gmail.com"; // SMTP account username
$mail->Password   = "Go01042015";        // SMTP account password

$mail->SetFrom('vbiketours2015@gmail.com', 'Vbiketours');

$mail->AddCC("maithaiquoc@gmail.com", 'Quoc Mai');

$mail->Subject    = "Confirmation about booking on vbiketours.com";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$address = $_POST['emailAddress'];
$mail->AddAddress($address, $_POST['firstName'].' '.$_POST['lastName']);

//$mail->AddAttachment("images/phpmailer.gif");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}

?>

</body>
</html>
