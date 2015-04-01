<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id'])){
	
	$id =  addslashes($_GET['id']);
	$sql="select tenkhongdau,ten_$lang,id from #_product_list where id='$id' limit 0,1 ";
	$d->query($sql);
	$loaitin=$d->result_array();
	$title_bar=$loaitin[0]["ten_$lang"].' - ';	
	$title_tcat=$loaitin[0]["ten_$lang"];
	
	$sql_tintuc = "select id,thumb,ten_$lang,tenkhongdau,gia,masp,photo,ngaytao from #_product where hienthi=1 and id_list='".$id."'";
	
	if(isset($_SESSION['filter'])){
		if($_SESSION['filter']==1) $sql_tintuc.=' order by gia';
		elseif($_SESSION['filter']==2) $sql_tintuc.=' order by gia desc';
		elseif($_SESSION['filter']==3) $sql_tintuc.=' order by ngaytao desc';
		else $sql_tintuc.=' order by stt,ngaytao desc';
	}else{ $sql_tintuc.=' order by stt,ngaytao desc';}
	$d->query($sql_tintuc);
	$product = $d->result_array();
	$tongsanpham=count($tintuc);
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();	
	$maxR=4;
	$maxP=3;
	$paging=paging_home($product, $url, $curPage, $maxR, $maxP);
	$product=$paging['source'];	
}
?>