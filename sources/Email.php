<?php  if(!defined('_source')) die("Error");

include_once _lib."nganluong.php";
$url = $_SERVER['REQUEST_URI'];
$query_str = parse_url($url, PHP_URL_QUERY);
parse_str($query_str, $query_params);
//print_r($query_params);

$nl = new NL_Checkout();
	$transaction_info = $query_params['transaction_info'];//@$_GET['transaction_info'];
	$order_code = $query_params['order_code'];//@$_GET['order_code'];
	$price = $query_params['price'];//@$_GET['price'];
	$payment_id = $query_params['payment_id'];//@$_GET['payment_id'];
	$payment_type = $query_params['payment_type'];//@$_GET['payment_type'];
	$error_text = $query_params['error_text'];//@$_GET['error_text'];
	$secure_code = $query_params['secure_code'];//$_SERVER['secure_code'] ;//$_GET['secure_code'];





$validate = $nl->verifyPaymentUrl($transaction_info, $order_code, $price, $payment_id, $payment_type, $error_text, $secure_code);
if($validate==true)
{
$d->reset();
$sql_contact = "select * from #_donhang where madonhang = '".$order_code."'";
$d->query($sql_contact);
$row_setting = $d->fetch_array();

if(isset($row_setting))
{

$d->reset();
$data['trangthai'] = 2;
$d->setTable('donhang');
$d->setWhere('madonhang', $order_code);
$d->update($data);



$subject = "Thông Tin Giỏ Hàng";
$guitoi = $row_setting['email'];
$guitoi_ten = $row_setting['hoten'];
$body=$row_setting['bodyemail'];

$data_send=$body;
include_once _lib."content_mail.php";
$mail->AddAddress($mail_send,$shop_name_mail);
$mail->MsgHTML($data_send);
$mail->Send();

echo "<script>window.location.assign('"._successthanhtoan."');</script>";
}
}else
{

}




?>