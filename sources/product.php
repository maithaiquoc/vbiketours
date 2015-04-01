<?php  if(!defined('_source')) die("Error");







		@$idl =  addslashes($_GET['idl']);



		@$idc =  addslashes($_GET['idc']);



		@$idi =  addslashes($_GET['idi']);



		@$id=  addslashes($_GET['id']);				



		



		



		if($id!=''){



		#chi tiết sp======================



		$sql_lanxem = "UPDATE #_product SET luotxem=luotxem+1  WHERE id ='".$id."'";



			$d->query($sql_lanxem);



		



		$d->reset();



		$sql_detail = "select IFNULL((SELECT avg( raty ) FROM table_product_raty WHERE product_id = p.id),0) as rate,id_list,id_cat,id_item,id,photo,photo1,photo2,photo3,thanhphan_$lang,dksudung_$lang, size, ten_$lang,tenkhongdau,gia,link,start,lenght,masp,mota_$lang,ngaytao,chitiet_$lang,luotxem,(SELECT count(*) FROM `table_product_comment` WHERE id_product='".$id."') as totalcomment from #_product p where hienthi=1 and id='".$id."'";



		$d->query($sql_detail);



		$row_detail = $d->fetch_array();



		#ALBUM HÌNH======================	

		/*$d->reset();

		$sql_detail = "select id,thumb,photo from #_hasp where hienthi=1 and id_photo='".$row_detail['id']."'";

		$d->query($sql_detail);

		$album_hinh = $d->result_array();

		echo $sql_detail;*/



		#các sản phẩm khác======================	



		$d->reset();					



		$sql_sanphamkhac = "select id,thumb, photo, ten_$lang,tenkhongdau,gia,spmoi,mota_$lang from #_product where hienthi=1 and id <>'".$id."' and id_list=".$row_detail['id_list']." and id_cat=".$row_detail['id_cat']." order by RAND() limit 0,4";



		$d->query($sql_sanphamkhac);



		$sanpham_khac = $d->result_array();				



		}else{



			



			$title_bar=' Sản phẩm - ';	



			$title_tcat='Sản phẩm';



	



	$sql_tintuc = "select id,thumb, ten_$lang, mota_$lang,tenkhongdau,gia,spmoi,photo,ngaytao,start,lenght from #_product where hienthi=1";



	

/*

	if(isset($_GET['idl'])){



		$idl =  addslashes($_GET['idl']);



		$d->reset();



		$sql_title="select ten_$lang,tenkhongdau,id from #_product_list where id='$idl'";



		$d->query($sql_title);



		$title_car = $d->fetch_array();	



		$title_bar=$title_car['ten_'.$lang].' - ';	



		$title_tcat=$title_car['ten_'.$lang];



		$cat1=$title_car['id'].'-'.$title_car['tenkhongdau'].'/';



		$sql_tintuc.=" and id_cat='$idl'";



	}

*/

if(isset($_GET['idl'])){



		$idl =  addslashes($_GET['idl']);



		$d->reset();



		$sql_title="select ten_$lang,tenkhongdau,id from #_product_list where id='$idl'";



		$d->query($sql_title);



		$title_car = $d->fetch_array();	



		$title_bar=$title_car['ten_'.$lang].' - ';	



		$title_tcat=$title_car['ten_'.$lang];



		$cat2.=$title_car['id'].'-'.$title_car['tenkhongdau'].'/';



		$sql_tintuc.=" and id_list='$idl'";



	}



	if(isset($_GET['idcat'])){



		$idcat =  addslashes($_GET['idcat']);



		$d->reset();



		$sql_title="select ten_$lang,tenkhongdau,id from #_product_cat where id='$idcat'";



		$d->query($sql_title);



		$title_car = $d->fetch_array();	



		$title_bar=$title_car['ten_'.$lang].' - ';	



		$title_tcat=$title_car['ten_'.$lang];



		$cat2.=$title_car['id'].'-'.$title_car['tenkhongdau'].'/';



		$sql_tintuc.=" and id_cat='$idcat'";



	}	



	$sql_tintuc.=' order by stt,ngaytao desc'; 



	$d->query($sql_tintuc);



	$product = $d->result_array();



	$tongsanpham=count($product);



	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;



	if(isset($_GET['idl']) || isset($_GET['idcat'])){



	$url='san-pham/'.@$cat1.@$cat2;	



	}



	else{



		$url='san-pham.html/';



	}



	$maxR=16;



	$maxP=5;



	$paging=paging_home($product, $url, $curPage, $maxR, $maxP);



	$product=$paging['source'];	



			



		}



		



		



			



?>