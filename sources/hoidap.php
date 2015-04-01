<?php  if(!defined('_source')) die("Error");

	$d->reset();
	$sql_cauhoi = "select id,noidung,traloi, ten  from #_comment where hienthi=1 order by id desc";
	$d->query($sql_cauhoi);	
	$rows_cauhoi=$d->result_array();
		
		$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
		$url='hoi-dap.html/';
		$maxR=5;
		$maxP=5;
		$paging=paging($rows_cauhoi, $url, $curPage, $maxR, $maxP);
		$rows_cauhoi=$paging['source'];
	
	if(!empty($_POST)){						
			$data['ten'] = $_POST['ten'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['email'] = $_POST['email'];
			$data['diachi'] = $_POST['diachi'];
			$data['noidung'] = $_POST['noidung'];
			$data['ngaytao'] = time();			
					
		$d->setTable('comment');
		if($d->insert($data))
			transfer("Thông tin câu hỏi đã được gửi", "hoi-dap.html");
		else
			transfer("Lưu dữ liệu bị lỗi", "hoi-dap.html");
		}
		

?>