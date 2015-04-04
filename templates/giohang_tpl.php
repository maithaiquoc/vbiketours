<?php

if(@$_REQUEST['command']=='delete' && $_REQUEST['pid']>0){

		remove_product($_REQUEST['pid']);

	}

	else if(@$_REQUEST['command']=='clear'){

		unset($_SESSION['cart']);
echo "<script>window.location = '/';</script>";

	}

	else if(@$_REQUEST['command']=='update'){

		$max=count($_SESSION['cart']);

		for($i=0;$i<$max;$i++){

			$pid=$_SESSION['cart'][$i]['productid'];

			$q=intval($_REQUEST['product'.$pid]);

			if($q>0 && $q<=999){

				$_SESSION['cart'][$i]['qty']=$q;

			}

			else{

				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';

			}

		}

	}
	
	//var_dump($_SESSION[]);

?>

<script language="javascript">

	function del(pid){

		if(confirm('Do you really mean to delete this item')){

			document.form2.pid.value=pid;

			document.form2.command.value='delete';

			document.form2.submit();

		}

	}

	function clear_cart(){

		if(confirm('This will empty your shopping cart, continue?')){

			document.form2.command.value='clear';

			document.form2.submit();

		}

	}

	function update_cart(){

		document.form2.command.value='update';

		document.form2.submit();

	}

</script>



<div class="block_content">
<div class="thanhtoan" style=" width=100%;font-size: 20px; color: rgb(173, 213, 82); text-align:left; padding-bottom:13px; margin-left: 10px;">
						<?=_giohang?>  							 
					</div>
					
<p style="border-top: 2px solid #8AC007; float:left; width:98%; margin-left: 10px;">&ensp;</p>					
    

    <div class="clear"></div>

    <div class="show-pro">  

      <form name="form2" method="post">

        <input type="hidden" name="pid" />

        <input type="hidden" name="command" />

        <table class="data-table" border="0" cellpadding="5px" cellspacing="1px" style="font-family:Verdana, Geneva, sans-serif; font-size: 11px;" width="100%"> 
<tr style="font-weight:bold;color:#FFF;height: 25px;background-color: rgb(138,192,7);">
						<td align="center"><?=_stt?></td>
						<td align="center"><?=_giohangimage?></td>
						<td align="center"><?=_ten?></td>
						<td align="center"><?=_gia?></td>
						<td align="center"><?=_soluong?></td>
						<td align="center"><?=_thanhtien?></td>
						<td align="center"><?=_xoa?></td></tr>
			<?php

			if(is_array(@$_SESSION['cart'])){				

				$max=count($_SESSION['cart']);

				for($i=0;$i<$max;$i++){

					$pid=$_SESSION['cart'][$i]['productid'];

					$q=$_SESSION['cart'][$i]['qty'];				

					$pname=get_product_name($pid,$lang);

					if($q==0) continue;

			?>
				<tr bgcolor="#FFFFFF" style="text-align: center">
				<td align="center" style="height: 25px;"><?=$i+1?></td>
				<td>
					<img src="<?=_upload_product_l.get_photo($pid)?>" alt="banner" title=""  style="width:50px; height:50px;" />  
				</td>
				<td ><?=$pname?></td>
				<td align="center"><?=number_format(get_price($pid),0, ',', '.')?>
				  &nbsp;VNĐ</td>				
				<td align="center"><input type="text" name="product<?=$pid?>" value="<?=$q?>" maxlength="3" size="2" style="text-align:center; border:1px solid #F0F0F0" />
				  &nbsp;</td>
				<td align="center"><?=number_format((get_price($pid)*$q)-($q*get_price($pid)*get_price_km($pid)),0, ',', '.') ?>
				  &nbsp;VNĐ</td>
				<td align="center"><a href="javascript:del(<?=$pid?>)"><img src="images/giohang.png" border="0" /></a></td>
				</tr>
		  
			<?php	
				}
			?>
			<tr>
            <td colspan="7" style="background:#E6E6E6; height:20px; color: #666"><b><?=_tongdonhang?>:
              <span style="color: #F60;"><?=number_format(get_order_total(),0, ',', '.')?></span>
              &nbsp;VNĐ</b></td>
            </tr>

			<?php	
				}
			?>
					</table>
<div style="float:right;margin-top: 20px;">	
			<a class= "btn-continue" onclick="window.location='san-pham.html'" class="button"><?=_tieptucmuahang?></a>

            <?php
			if(!empty($_SESSION['cart']) and count($_SESSION['cart'])>0){
			?>
              <a class= "cart_delete" onclick="clear_cart()" class="button"><?=_xoatatca?></a>
              <a class= "btn-update"  onclick="update_cart()" class="button"><?=_capnhatgh?></a>
              <a class= "cart_btn-buy" onclick="window.location='thanh-toan.html'" class="button"><?=_datmua?></a>
            <?php
			}
			?>
		
	</div>	

      </form>

  </div>

</div>
