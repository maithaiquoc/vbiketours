<?php  if(!defined('_source')) die("Error");
		$title_bar=_tintuc.' - ';
		$d->reset();
		$d->setTable('tintuc');
		$d->select("noidung_$lang");
		$gioithieu=$d->fetch_array();	
?>