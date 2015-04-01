<?php  if(!defined('_source')) die("Error");

	$title_bar='Gallery - ';		
	$title_tcat='Gallery';		
	$sql_tintuc = "select ten_vi,ten_en,photo,link from #_video where hienthi=1 and noibat=0  order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=10;
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];

?>