<?php  if(!defined('_source')) die("Error");

		@$idl =  addslashes($_GET['idl']);
		@$idc =  addslashes($_GET['idc']);
		@$idi =  addslashes($_GET['idi']);
		@$id=  addslashes($_GET['id']);				
		
if(isset($_GET['id'])){
		
		$sql_lanxem = "UPDATE #_catalogue SET luotxem=luotxem+1  WHERE id ='".$id."'";
			$d->query($sql_lanxem);
		
		$d->reset();
		$sql_detail = "select id_list,id_cat,id_item,id,photo,thumb,ten_$lang,tenkhongdau,gia,masp,ngaytao,chitiet_$lang,luotxem from #_catalogue where hienthi=1 and id='".$id."'";
		$d->query($sql_detail);
		$row_detail = $d->fetch_array();
		
		#hinh cua catalogue======================
		$d->reset();
		$sql_detail = "select id,thumb,photo from #_hasp where hienthi=1 and id_photo='".$id."'";
		$d->query($sql_detail);
		$album_hinh = $d->result_array();
		
		#các sản phẩm khác======================		
		$d->reset();					
		$sql_sanphamkhac = "select id,thumb,ten_$lang,photo,tenkhongdau,gia,masp from #_product where hienthi=1 and id <>'".$id."' order by stt,ngaytao desc limit 0,6";
		$d->query($sql_sanphamkhac);
		$sanpham_khac = $d->result_array();				
		}else{
			
			$title_bar=_catalogue.' - ';	
			$title_tcat=_catalogue;
	
	$sql_tintuc = "select id,thumb,ten_$lang,tenkhongdau,gia,masp,photo,ngaytao from #_catalogue where hienthi=1 order by stt,ngaytao desc";
	
	$d->query($sql_tintuc);
	$catalogue = $d->result_array();
	$tongsanpham=count($catalogue);
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();	
	$maxR=9;
	$maxP=3;
	$paging=paging_home($catalogue, $url, $curPage, $maxR, $maxP);
	$catalogue=$paging['source'];	
			
		}
		
		
			
?>