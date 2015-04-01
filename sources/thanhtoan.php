<?php  if(!defined('_source')) die("Error");	

$d->reset();

			$sql_contact = "select * from #_setting ";

			$d->query($sql_contact);

			$row_setting = $d->fetch_array();



$phivanchuyen = $row_setting['phivanchuyen'];

			

include_once _lib."functions_giohang.php";

if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){	

	

	if (!empty($_POST)){		

		$type_buy = isset($_POST['type_buy']) ? trim($_POST['type_buy']) : "1";

		$httt = $type_buy;

		$logo = "http://".$config_url."/images/sv.png";

		$ten_kh = isset($_POST['name_kh']) ? trim($_POST['name_kh']) : "";

		$user_name = $_SESSION['username'];

		$email_kh = isset($_POST['email_kh']) ? trim($_POST['email_kh']) : "";

		$phone_kh = isset($_POST['phone_kh']) ? trim($_POST['phone_kh']) : "";

		$address_kd_1 = isset($_POST['address_kd1']) ? trim($_POST['address_kd1']) : "";

		$address_kd_2 = isset($_POST['address_kd2']) ? trim($_POST['address_kd2']) : "";

                $address_kd = $address_kd_1.', '.$address_kd_2;

		$details_kh = isset($_POST['details_kh']) ? trim($_POST['details_kh']) : "";





$tbody = "";

		$tonggia=get_order_total() + $phivanchuyen;

		 $body='<img src="http://'.$config_url.'/images/sv.png" /><table border="0" cellpadding="5px" cellspacing="1px" style="border: 1px solid #8ebf3e; margin-left:10px; margin-top: -14px; font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1;" width="100%">';



			if(isset($_SESSION['cart']))



			{



            	$body.='<tr style="background-color: rgb(138,192,7);"><td align="center" style="font-weight:bold;color:#FFF; ">STT</td><td style="font-weight:bold;color:#FFF">Tên</td><td align="center" style="font-weight:bold;color:#FFF">Giá</td><td align="center" style="font-weight:bold;color:#FFF;display:none">Giảm giá</td><td align="center" style="font-weight:bold;color:#FFF">Số lượng</td><td align="center" style="font-weight:bold;color:#FFF">Tổng giá</td></tr>';



				$max=count($_SESSION['cart']);



				for($i=0;$i<$max;$i++){



					$pid=$_SESSION['cart'][$i]['productid'];



					$q=$_SESSION['cart'][$i]['qty'];

					

					$pname=get_product_name($pid,$lang);		



					if($q==0) continue;



            		$body.='<tr bgcolor="#FFFFFF"><td width="10%" align="center">'.($i+1).'</td>';



            		$body.='<td width="29%">'.$pname;				



					$body.='</td>';



                    $body.='<td width="20%">'.number_format(get_price($pid),0, ',', '.').'&nbsp;VNĐ</td>';



					$body.='<td style="display:none">'.number_format(get_price($pid)*get_price_km($pid),0, ',', '.').'&nbsp;VNĐ</td>';



                    $body.='<td width="14%">'.$q.'</td>';                 



                    $body.='<td>'.number_format((get_price($pid)*$q)-($q*get_price($pid)*get_price_km($pid)),0, ',', '.') .'&nbsp;VNĐ</td>



                    </tr><br/>';


$tbody.= "<tr>

<td style=\"border-left:1px solid #e1e1e1;border-bottom:1px solid #e1e1e1\"><a href=\"http://".$config_url."/san-pham/".$pid."-".get_product_name_khongdau($pid).".html\" target=\"_blank\">".$pname."</a></td>

<td align=\"center\" style=\"border-left:1px solid #e1e1e1;border-bottom:1px solid #e1e1e1\"><img src=\"http://".$config_url."/"._upload_product_l.get_photo($pid)."\" width=\"110\" height=\"120\" /></td>

<td style=\"border-left:1px solid #e1e1e1;border-bottom:1px solid #e1e1e1\"><a href=\"http://".$config_url."/san-pham/".$pid."-".get_product_name_khongdau($pid).".html\" target=\"_blank\">".get_product_code($pid)."</a></td>

<td align=\"right\" style=\"border-left:1px solid #e1e1e1;border-bottom:1px solid #e1e1e1\">".$q."</td>

<td align=\"right\" style=\"border-left:1px solid #e1e1e1;border-bottom:1px solid #e1e1e1\">".number_format(get_price($pid),0, ',', '.').".000</td>

<td align=\"right\" style=\"border-left:1px solid #e1e1e1;border-right:1px solid #e1e1e1;border-bottom:1px solid #e1e1e1\">".number_format((get_price($pid)*$q)-($q*get_price($pid)*get_price_km($pid)),0, ',', '.').".000</td></tr>";

				}



				$body.='<tr><td colspan="5"><b>Phí vận chuyễn :&nbsp;&nbsp;'.$phivanchuyen.'&nbsp;VNĐ</b></td></tr><tr style="background-color: rgb(138,192,7); color:#fff"><td colspan="5">'; 



               $body.=' <strong>Tổng giá bán: '. number_format($tonggia,0, ',', '.') .' &nbsp;VNĐ</strong></td>

</tr>';




            }



			else{



				$body.='<tr bgColor="#FFFFFF"><td>There are no items in your shopping cart!</td>';



			}



       $body.='</table>';

	   

		$mahoadon=strtoupper (ChuoiNgauNhien(6));



			$ngaydangky=time();



			

/*

	

$body1='<table border="0" cellpadding="5px" cellspacing="1px" style="border: 1px solid #8ebf3e; margin-left:10px; margin-top: -14px; font-family:Verdana, Geneva, sans-serif; font-size:11px; background-color:#E1E1E1;" width="100%">';

$body1.='<tr bgcolor="#FFFFFF"><td width="150"><b>Mã đơn hàng:</b> <strong></td><td colspan="4">'.$mahoadon.'</td></tr>';

$body1.='<tr bgcolor="#FFFFFF"><td width="150"><b>Khách hàng:</b> <strong></td><td colspan="4">'.$ten_kh.'</td></tr>';

$body1.='<tr bgcolor="#FFFFFF"><td width="150"><b>Điện thoại:</b> <strong></td><td colspan="4">'.$phone_kh.'</td></tr>';

$body1.='<tr bgcolor="#FFFFFF"><td width="150"><b>Email:</b> <strong></td><td colspan="4">'.$email_kh.'</td></tr>';

$body1.='<tr bgcolor="#FFFFFF"><td width="150"><b>Địa chỉ:</b> <strong></td><td colspan="4">'.$address_kd.'</td></tr>';

$body1.='<tr bgcolor="#FFFFFF"><td width="150"><b>Ghi chú:</b> <strong></td><td colspan="4">'.$details_kh.'</td></tr>';

$body1.='</table><br />';*/





		

		 $body1='<b>Mã đơn hàng:</b> <strong>'.$mahoadon.'</strong><br />		    



    			<b>Họ tên: </b><strong>'.$ten_kh.'</strong><br />		  



        		<b>Điện thoại: </b><strong>'.$phone_kh.'</strong><br />		  



        		<b>Email: </b><strong>'.$email_kh.'</strong><br />		  



           		<b>Địa chỉ: </b><strong>'.$address_kd.'</strong><br />

<b>Ghi chú: </b><strong>'.$details_kh.'</strong><br />';

		

$data_send=$body.$body1;		 

$output = file_get_contents(_lib."send_vi.php");



$output = preg_replace("/{PTitle}/",$row_setting['ten_vi'],$output);

$output = preg_replace("/{Addr}/",$row_setting['diachi_vi'],$output);

$output = preg_replace("/{PPhone}/",$row_setting['hotline'],$output);



$output = preg_replace("/{Name}/",$ten_kh,$output);

$output = preg_replace("/{Code}/",$mahoadon,$output);

$output = preg_replace("/{Address}/",$address_kd,$output);

$output = preg_replace("/{Phone}/",$phone_kh,$output);

$output = preg_replace("/{Email}/",$email_kh,$output);

$output = preg_replace("/{Note}/",$details_kh,$output);

$output = preg_replace("/{Note}/",$details_kh,$output);

$output = preg_replace("/{PLogo}/",$logo,$output);

$output = preg_replace("/{PFPhone}/",$row_setting['dienthoai'].",".$row_setting['hotline'],$output);

$output = preg_replace("/{PhiVanChuyen}/",number_format($phivanchuyen,0, ',', '.'),$output);

$output = preg_replace("/{TongTien}/",number_format(get_order_total(),0, ',', '.'),$output);

$output = preg_replace("/{TongCongTien}/",number_format((get_order_total() + $phivanchuyen),0, ',', '.'),$output);

$output = preg_replace("/{DanhSach}/",$tbody,$output);





			$sql = "INSERT INTO  table_donhang (bodyemail,madonhang,hoten,dienthoai,diachi,email,httt,tonggia,noidung,donhang,ngaytao,trangthai,username ) 

					VALUES ('$output','$mahoadon','$ten_kh','$phone_kh','$address_kd','$email_kh','$httt','$tonggia','$details_kh','$body','$ngaydangky','1','$user_name')";	

mysql_query($sql) or die(mysql_error());

			unset($_SESSION['cart']);

		if($httt == 1){

			





$subject = "Thông Tin Giỏ Hàng";

$guitoi = $email_kh;

$guitoi_ten = $ten_kh;



include_once _lib."content_mail.php";

$mail->AddAddress($mail_send,$shop_name_mail);

$mail->MsgHTML($output);

$mail->Send();





			echo "<script>window.location.assign('"._successthanhtoan."');</script>";

		}

		else

		{

			include_once _lib."nganluong.php";

			

			$receiver="sacviet@myphamsacviet.com.vn";

			$return_url="http://".$config_url."/Email.html";

			$price=$tonggia;

			$order_code=$mahoadon;

			$transaction_info="Hãy lập trình thông tin giao dịch của bạn vào đây";

			

			$nl= new NL_Checkout();

			

			$url= $nl->buildCheckoutUrl($return_url, $receiver, $transaction_info,  $order_code, $price);

			redirect($url);

		}

		

		

			

	}

	else

	{

		$d->reset();

		$sql_info = "select * from #_user where username='".$_SESSION['username']."'";

		$d->query($sql_info);

		$row_detail_info = $d->fetch_array();

		$ten_kh = $row_detail_info['ten'];

		$email_kh = $row_detail_info['email'];

		$phone_kh = $row_detail_info['dienthoai'];

		$address_kd = $row_detail_info['diachi'];

		$httt =1;

		$type_buy = $httt;

	}

}

	

?>