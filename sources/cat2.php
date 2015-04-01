<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id'])){
	
	$id =  addslashes($_GET['id']);
	$sql="select tenkhongdau,ten_$lang,id,id_list from #_product_cat where id='$id' limit 0,1 ";
	$d->query($sql);
	$loaitin=$d->result_array();
	$title_bar=$loaitin[0]["ten_$lang"].' - ';	
	$title_tcat=$loaitin[0]["ten_$lang"];
	
	
	$sql_cap1="select ten_$lang,tenkhongdau,id from #_product_list where id='".$loaitin[0]['id_list']."'";
	$d->query($sql_cap1);
	$result_cat1=$d->fetch_array();
	
	$sql_tintuc = "select id,thumb,ten_$lang,tenkhongdau,gia,mota_$lang,photo,ngaytao from #_product where hienthi=1 and id_cat='".$loaitin[0]['id']."'";
	
	if(isset($_SESSION['filter'])){
		if($_SESSION['filter']==1) $sql_tintuc.=' order by gia';
		elseif($_SESSION['filter']==2) $sql_tintuc.=' order by gia desc';
		elseif($_SESSION['filter']==3) $sql_tintuc.=' order by ngaytao desc';
		else $sql_tintuc.=' order by stt,ngaytao desc';
	}else{ $sql_tintuc.=' order by stt,ngaytao desc';}
	$d->query($sql_tintuc);	
	$product = $d->result_array();
	$tongsanpham=count($product);
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();	
	$maxR=4;
	$maxP=5;
	$paging=paging_home($product, $url, $curPage, $maxR, $maxP);
	$product=$paging['source'];	
}
?>