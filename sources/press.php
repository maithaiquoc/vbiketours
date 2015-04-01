<?php  if(!defined('_source')) die("Error");

		/*$d->reset();

		$d->setTable('about');

		$d->select("noidung_$lang");$d->select("noidung_end_$lang");*/



$d->reset();



		$sql_info = "select * from #_service where hienthi=1 order by stt,ngaytao desc";

		$d->query($sql_info);

		$gioithieu=$d->result_array();	
$title_bar='Press'.' - ';



	$title_tcat='Press';
?>