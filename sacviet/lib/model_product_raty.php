<?php

	@define ( '_lib' , '../admin/lib/');
	include_once "config.php";
	include_once "class.database.php";
	include_once "functions.php";
	$d = new database($config['database']);
	
	@$ip = $_POST['ip'];
	@$rate =  $_POST['rate'];
	@$id_pro = $_POST['id'];
		$d->reset();
		$sql="INSERT INTO #_product_raty (product_id,ip,raty) VALUES ('".$id_pro."', '".$ip."', '".$rate."');";		
		$d->query($sql);			
        echo 0;
?>