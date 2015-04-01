<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id'])){
	
	$id =  addslashes($_GET['id']);
	$sql="select tenkhongdau,ten_vi,ten_en,id,id_list,id_cat,mota_vi,mota_en,thumb from #_product_item where id='$id' limit 0,1 ";
	$d->query($sql);
	$loaitin=$d->result_array();
	$title_bar=$loaitin[0]['ten_'.$lang].' - ';	
	$title_tcat=$loaitin[0]['ten_'.$lang];
	
	
	$sql_pro1="select ten_vi,ten_en,tenkhongdau,id from #_product_list where id='".$loaitin[0]['id_list']."'";
	$d->query($sql_pro1);
	$result_pro1=$d->fetch_array();
	
	$sql_pro2="select ten_vi,ten_en,tenkhongdau,id from #_product_cat where id='".$loaitin[0]['id_cat']."'";
	$d->query($sql_pro2);
	$result_pro2=$d->fetch_array();
	
	$sql_tintuc = "select id,thumb,ten_vi,ten_en,tenkhongdau from #_product where hienthi=1 and id_item='".$loaitin[0]['id']."' order by stt,id desc";
		
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();	
}
?>