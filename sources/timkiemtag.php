<?php  if(!defined('_source')) die("Error");

		if(isset($_GET['keyword'])){
$tukhoatag = $_GET['keyword'];
			$tukhoa = trim(strip_tags($_GET['keyword']));    	

			if (get_magic_quotes_gpc()==false) {

				$tukhoa = mysql_real_escape_string($tukhoa);    			

			}
$d->reset();		
$sql = "select * from #_tags where ten_vi='".$tukhoatag."'";
$d->query($sql);


if($d->num_rows()>0)	{$item = $d->fetch_array();							


			$sql = " select * from ((select n.id,ten_$lang,tenkhongdau,thumb,0 as masp,photo,0 as gia,mota_$lang,1 as mode,ngaytao,nguoitao from #_news n inner join #_news_tags t on t.new_id = n.id where t.tag_id = '".$item['id']."') ";	
			$sql .= " UNION (select n.id,ten_$lang,tenkhongdau,thumb,0 as masp,photo,0 as gia,mota_$lang,2 as mode,ngaytao,nguoitao from #_blog n  inner join #_blogs_tags t on t.blog_id = n.id where t.tag_id = '".$item['id']."')";	
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

			}

		}else{

			header('index.html');	

		}

?>