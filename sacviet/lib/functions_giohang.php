<?php

	function get_product_name($pid, $lang){

		global $d, $row;

		$sql = "select ten_$lang from #_product where id=$pid";

		$d->query($sql);

		$row = $d->fetch_array();

		return $row["ten_$lang"];

	}

function get_product_code($pid){

		global $d, $row;

		$sql = "select * from #_product where id=$pid";

		$d->query($sql);

		$row = $d->fetch_array();

		return $row["masp"];

	}


function get_product_name_khongdau($pid){

		global $d, $row;

		$sql = "select * from #_product where id=$pid";

		$d->query($sql);

		$row = $d->fetch_array();

		return $row["tenkhongdau"];

	}


	function get_price($pid){

		global $d, $row;

		$sql = "select gia from table_product where id='$pid'";

		$d->query($sql);

		$row = $d->fetch_array();
		
		return $row['gia'];
		return 0;

	}
	
	function get_photo($pid){

		global $d, $row;

		$sql = "select photo from table_product where id=$pid";

		$d->query($sql);

		$row = $d->fetch_array();

		return $row['photo'];
		return 0;

	}

	function get_price_km($pid){

		global $d, $row;

		$sql = "select giamgia from table_product where id=$pid";

		$d->query($sql);

		$row = $d->fetch_array();

		return ($row['giamgia']/100);

	}

	function remove_product($pid){

		$pid=intval($pid);

		$max=count($_SESSION['cart']);

		for($i=0;$i<$max;$i++){

			if($pid==$_SESSION['cart'][$i]['productid']){

				unset($_SESSION['cart'][$i]);

				break;

			}

		}

		$_SESSION['cart']=array_values($_SESSION['cart']);

	}

	function get_order_total(){

		$max=count($_SESSION['cart']);

		$sum=0;

		for($i=0;$i<$max;$i++){

			$pid=$_SESSION['cart'][$i]['productid'];

			$q=$_SESSION['cart'][$i]['qty'];

			$price=(get_price($pid))-(get_price($pid)*get_price_km($pid));

			$sum+=$price*$q;



		}

		return $sum;

	}

	

	function get_total(){

		$max=count($_SESSION['cart']);

		$sum=0;

		for($i=0;$i<$max;$i++){				

			$sum++;

		}

		return $sum;

	}

	function addtocart($pid,$q){
		if($pid<1 or $q<1) return;
		
		
		if(isset($_SESSION['cart'])){	
			$i=product_exists($pid);	
			if($i!=-1) {
				$_SESSION['cart'][$i]['qty']=$q+$_SESSION['cart'][$i]['qty'];
echo count(@$_SESSION['cart']);
				
				}
			else{
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['productid']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
echo count(@$_SESSION['cart']);
			}
			
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
			
			echo count(@$_SESSION['cart']);
		}		
	}

	function product_exists($pid){

		$pid=intval($pid);

		$max=count($_SESSION['cart']);

		$flag=-1;

		

		for($i=0;$i<$max;$i++){

			if($pid==$_SESSION['cart'][$i]['productid']){

				$flag=$i;

				break;

			}

		}

		return $flag;

	}



?>	