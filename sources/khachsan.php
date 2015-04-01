<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id'])){
	#tin tuc chi tiet
	$id =  addslashes($_GET['id']);

	$sql_lanxem = "UPDATE #_khachsan SET luotxem=luotxem+1  WHERE id ='".$id."'";
	$d->query($sql_lanxem);
			
	$sql = "select ten_$lang,mota_$lang,noidung_$lang,quydinh_$lang,gioithieu_$lang,thumb from #_khachsan where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$tintuc_detail = $d->result_array();
	$title_bar=$tintuc_detail[0]["ten_$lang"].' - ';
	$title_tcat=$tintuc_detail[0]["ten_$lang"];
	#các tin cu hon
	$sql_khac = "select ten_$lang,tenkhongdau,ngaytao,id from #_khachsan where hienthi=1 and id <>'".$id."' order by stt,ngaytao desc limit 0,5";
	$d->query($sql_khac);
	$tintuc_khac = $d->result_array();
}else{
	$title_bar=_khachsan.' - ';		
	$title_tcat=_khachsan;	
	
	$sql_tintuc = "select ten_$lang,tenkhongdau,mota_$lang,thumb,id,ngaytao,luotxem from #_khachsan where hienthi=1 order by stt,ngaytao desc limit 0,1";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	
	$sql_tintuc = "select ten_$lang,tenkhongdau,mota_$lang,thumb,id,ngaytao,luotxem from #_khachsan where hienthi=1 order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url='nha-hang.html/';
	$maxR=8;
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
}
?>