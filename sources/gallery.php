<?php  if(!defined('_source')) die("Error");

	
		
		if(isset($_GET['id'])){
		
		$id =  addslashes($_GET['id']);
		$sql="select ten_vi,ten_en,id,tenkhongdau,mota_vi,mota_en from #_hinhanh_item where id='$id' limit 0,1 ";
		$d->query($sql);
		$loaitin=$d->result_array();
		$title_bar=$loaitin[0]['ten_'.$lang].' - ';
		$title_tcat=$loaitin[0]['ten_'.$lang];
	
		$sql_hinhanh="select ten_vi,ten_en,thumb,photo from #_hinhanh where hienthi =1 and id_item='".$loaitin[0]['id']."' order by stt,id desc";
		$d->query($sql_hinhanh);
		$hinhanh=$d->result_array();				
		
	}
	else{
		$title_bar=_bosuutap.' - ';		
		$title_tcat=_bosuutap;	
		$sql="select ten_vi,ten_en,tenkhongdau,id,thumb,mota_vi,mota_en from #_hinhanh_item where hienthi=1 order by stt,id desc";	
		$d->query($sql);
		$tintuc = $d->result_array();				
	
	}		
				
?>