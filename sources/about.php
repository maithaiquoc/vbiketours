<?php  if(!defined('_source')) die("Error");
		/*$d->reset();
		$d->setTable('about');
		$d->select("noidung_$lang");$d->select("noidung_end_$lang");*/

$d->reset();

		$sql_info = "select * from #_about";
		$d->query($sql_info);
		$gioithieu=$d->fetch_array();	
?>