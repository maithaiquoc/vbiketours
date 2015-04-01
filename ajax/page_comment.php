<?php 
	@define ( '_template' , '../templates/');
	@define ( '_source' , '../sources/');
	@define ( '_lib' , '../admin/lib/');
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	if($_POST['page']) 
	{
		$page = intval($_POST['page']);
		$id_pro=  intval($_POST['id_product']);
		if(empty($page)) exit();
		$sodong = 4;
		$sql ="select ngaydang, ten, noidung from #_binhluan where id_pro = $id_pro order by ngaydang DESC limit ".(($page*$sodong)-$sodong).", $sodong";
		$d->query($sql);
		$list_comment = $d->result_array();
		if(!empty($list_comment)){
			foreach($list_comment as $row)
				echo '<div class="line_cmt"><div class="date">'.((!empty($row['ngaydang']))? make_date($row['ngaydang']):'').'</div>
				<a class="cmt_name">'.@$row['ten'].'</a>: '.@$row['noidung'].'</div>';
		}
	}
	else
	{
		
	}