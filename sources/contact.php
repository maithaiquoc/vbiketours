<?php if(!defined('_source')) die("Error");

		$title_bar = 'Contact'." - ";

		if(!empty($_POST)){	

			$ten = $_POST['name'];	
			$subject = $_POST['subject'];	

			$email = $_POST['email'];

			$noidung = $_POST['noidung'];



			

	$d->reset();

$data['ten'] = $ten;			

$data['subject'] = $subject;		
$data['email'] = $email;		

$data['lienquan'] = $_POST['lienquan'];			

$data['noidung'] = $noidung;

$data['ngaytao'] = date("Y-m-d");

$d->setTable('contact');

$d->insert($data);



echo "<script>window.location='"._successlienhe."';</script>";



		}

				$d->reset();

			$sql_contact = "select noidung_vi,noidung_en from #_lienhe ";

			$d->query($sql_contact);

			$company_contact = $d->fetch_array();

	

?>