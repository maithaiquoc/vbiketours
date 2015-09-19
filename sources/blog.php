<?php  if(!defined('_source')) die("Error");



if(isset($_GET['id'])){
	#tin tuc chi tiet
	$id =  addslashes($_GET['id']);
	$sql_lanxem = "UPDATE #_blog SET luotxem=luotxem+1  WHERE id ='".$id."'";
	$d->query($sql_lanxem);			
	$sql = "select id,ten_$lang,mota_$lang,noidung_$lang,ngaytao,photo,nguoitao,tenkhongdau,id_item from #_blog where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$tintuc_detail = $d->fetch_array();
	$title_bar=$tintuc_detail["ten_$lang"].' - ';
	$title_tcat=$tintuc_detail["ten_$lang"];
	#các tin cu hon
	$sql_khac = "select ten_$lang,tenkhongdau,ngaytao,id,nguoitao from #_blog where hienthi=1 and id <>'".$id."' order by stt,ngaytao desc limit 0,5";
	$d->query($sql_khac);
	$tintuc_khac = $d->result_array();
}else{
	$title_bar='News'.' - ';	
	$title_tcat='News';
	
	$sql_tintuc = "select ten_$lang,tenkhongdau,mota_$lang,thumb,id,ngaytao,luotxem,nguoitao from #_blog where hienthi=1 ";
	
	if(isset($_GET['idl'])){
		$idcat =  addslashes($_GET['idl']);
		$d->reset();
		$sql_title="select ten_$lang,tenkhongdau,id from #_blog_item where id='$idcat'";
		$d->query($sql_title);
		$title_car = $d->fetch_array();	
		$title_bar=$title_car['ten_'.$lang].' - ';	
		$title_tcat=$title_car['ten_'.$lang];
		$cat2=$title_car['id'].'-'.$title_car['tenkhongdau'].'/';
		$sql_tintuc.=" and id_item='$idcat'";
	}	
	
	$sql_tintuc .= " order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	
	if(isset($_GET['idl']) || isset($_GET['idcat'])){
	$url='news/'.@$cat1.@$cat2;
	}
	else{
		$url='news.html/';
	}	
	
	$maxR=8;
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
}



?>