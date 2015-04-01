<?php  if(!defined('_source')) die("Error");

			

		if(isset($_POST['keyword'])){

			$tukhoa =  $_POST['keyword'];

			$tukhoa = trim(strip_tags($tukhoa));    	

    		if (get_magic_quotes_gpc()==false) {

    			$tukhoa = mysql_real_escape_string($tukhoa);    			

    		}								

			// cac tin tuc

			$sql_tintuc = "select #_product.ten_$lang,#_product.tenkhongdau,#_product.id,#_product.thumb,#_product.photo,#_product.gia,#_product.hangmuc_$lang,#_product_list.tenkhongdau as tendm from #_product,#_product_list where ( #_product.ten_vi LIKE '%"."$tukhoa"."%' OR #_product.tenkhongdau LIKE '%"."$tukhoa"."%') and #_product.hienthi=1 and #_product.id_list=#_product_list.id order by #_product.stt,#_product.id desc";			

			$d->query($sql_tintuc);

			$tintuc = $d->result_array();							

		}									

?>