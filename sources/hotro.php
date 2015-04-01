<?php  if(!defined('_source')) die("Error");

		$d->reset();

		@$id=  addslashes($_GET['idl']);			
	

	$sql = "select * from #_hotro where id='".$id."'";

	$d->query($sql);	

	$gioithieu= $d->fetch_array();

?>