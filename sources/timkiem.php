<?php  if(!defined('_source')) die("Error");



		if(isset($_GET['keyword'])){



			$tukhoa = trim(strip_tags($_GET['keyword']));    	



			if (get_magic_quotes_gpc()==false) {



				$tukhoa = mysql_real_escape_string($tukhoa);    			



			}



											



			$sql = "select * from ( (select id,ten_$lang,tenkhongdau,thumb,masp,photo,gia,mota_$lang,0 as mode, 0 as ngaytao, 0 as nguoitao from #_product where hienthi=1  and ten_$lang like'%$tukhoa%')";	

			$sql .= " UNION  (select id,ten_$lang,tenkhongdau,thumb,0 as masp,photo,0 as gia,mota_$lang,1 as mode,ngaytao,nguoitao from #_news where hienthi=1  and ten_$lang like'%$tukhoa%')";	

			$sql .= " UNION (select id,ten_$lang,tenkhongdau,thumb,0 as masp,photo,0 as gia,mota_$lang,2 as mode,ngaytao,nguoitao from #_blog where hienthi=1  and ten_$lang like'%$tukhoa%')";	

$sql .= " ) searchs order by id desc";

			$d->query($sql);



			$product = $d->result_array();	

			$title_abc = "Tìm thấy <b style='color: #F00; font-weight: bold;'>".count($product)."</b> kết quả";			



			$curPage = isset($_GET['p']) ? $_GET['p'] : '1';



			$search = isset($_GET['keyword']) ? 'keyword='.$_GET['keyword'] : '';



			$url = 'tim-kiem/'.$search.'/';



			$maxR=5;



			$maxP=10;



			$paging=paging_home($product, $url, $curPage, $maxR, $maxP);



			$product=$paging['source'];



			



		}else{



			header('index.html');	



		}



?>