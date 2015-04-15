<?php  if(!defined('_source')) die("Error");



$url = $_SERVER['REQUEST_URI'];

$query_str = parse_url($url, PHP_URL_QUERY);

parse_str($query_str, $query_params);





		@$idl =  addslashes($_GET['idl']);



		@$idc =  addslashes($_GET['idc']);



		@$idi =  addslashes($_GET['idi']);



		@$id=  addslashes($_GET['id']);				



		



		



		if($id!=''){



		#các sản phẩm khác======================



		$sql_lanxem = "UPDATE #_duan SET luotxem=luotxem+1  WHERE id ='".$id."'";



			$d->query($sql_lanxem);



		



		$d->reset();



		$sql_detail = "select id_list,id_cat,id_item,id,photo,thumb, masp, gia, ten_$lang,tenkhongdau,ngaytao,noidung_$lang,luotxem from #_duan where hienthi=1 and id='".$id."'";



		$d->query($sql_detail);



		$row_detail = $d->fetch_array();



		



		$d->reset();



		$sql_detail = "select id,thumb,photo from #_hasp where hienthi=1 and id_photo='".$id."'";



		$d->query($sql_detail);



		$album_hinh = $d->result_array();



		$tongsanpham=count($album_hinh);



	$curPage = isset($query_params['p']) ? $query_params['p'] : 1;



$url='hinh-anh/'.$id.'-'.$row_detail["tenkhongdau"].'.html?';



	$maxR=20;



	$maxP=5;



	$paging=paging_home($album_hinh, $url, $curPage, $maxR, $maxP);



	$album_hinh=$paging['source'];



				



		$d->reset();					



		$sql_sanphamkhac = "select id,thumb,ten_$lang,photo,gia,masp,tenkhongdau from #_duan where hienthi=1 and id <>'".$id."' order by stt,ngaytao desc limit 0,9";



		$d->query($sql_sanphamkhac);



		$sanpham_khac = $d->result_array();				



		}else{



			



			$title_bar=_hinhanh.' - ';	



			$title_tcat='Dự án tiêu biểu';



	



	$sql_tintuc = "select id,thumb,ten_$lang,tenkhongdau,masp,gia,photo,ngaytao,mota_$lang from #_duan where hienthi=1";



	



	/*if(isset($_GET['idl'])){



		$idl =  addslashes($_GET['idl']);



		$d->reset();



		$sql_title="select ten,tenkhongdau,id from #_duan_list where id='$idl'";



		$d->query($sql_title);



		$title_car = $d->fetch_array();	



		$title_bar=$title_car['ten'].' - ';	



		$title_tcat=$title_car['ten'];



		$cat1=$title_car['tenkhongdau'].'-'.$title_car['id'].'/';



		$sql_tintuc.=" and id_list='$idl'";



	}



	if(isset($_GET['idcat'])){



		$idcat =  addslashes($_GET['idcat']);



		$d->reset();



		$sql_title="select ten,tenkhongdau,id from #_duan_cat where id='$idcat'";



		$d->query($sql_title);



		$title_car = $d->fetch_array();	



		$title_bar=$title_car['ten'].' - ';	



		$title_tcat=$title_car['ten'];



		$cat2=$title_car['tenkhongdau'].'-'.$title_car['id'].'/';



		$sql_tintuc.=" and id_cat='$idcat'";



	}



	*/



	



	$sql_tintuc.=' order by stt,ngaytao desc';



	



	$d->query($sql_tintuc);



	$duan = $d->result_array();



	$tongsanpham=count($duan);



	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;



	$url='hinh-anh.html/';



	$maxR=6;



	$maxP=5;



	$paging=paging_home($duan, $url, $curPage, $maxR, $maxP);



	$duan=$paging['source'];	







		}



		



		



			



?>