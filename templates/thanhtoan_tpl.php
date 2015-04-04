<script type="text/javascript">



function fn_switch_checkout_type(status)

			{

		if (status == true) {

			$('#step_one_register').show();

			

		} else {

			$('#step_one_anonymous_checkout').show();			

		}

		$('#step_one_login').hide();

		

	}





function fn_show_checkout_buttons(type)

{

	if (type == 'register') {

		$('#register_checkout').show();

		$('#checkout_type_guest').prop('checked', false);

		$('#anonymous_checkout').hide();

		//$('#btnnl').hide();

		//$('#btthanhtoankygoi').show();	

		$('#type_buy').val(1);			

	} else {

		$('#register_checkout').hide();

		$('#checkout_type_register').prop('checked', false);

		$('#anonymous_checkout').show();

		//$('#btnnl').show();

		//$('#btthanhtoankygoi').hide();

		$('#type_buy').val(2);	

	}

}



function exceCheckOut(){

	

	var name = $('#name').val();

	var email = $('#email').val();

	var phone = $('#phone').val();

	var city1 = $('#city1').val();

	var city2 = $('#city2').val();

	if(name != '' && email != '' && phone != '' && city1 !='' && city2 !='')

	{

		$('#formthanhtoan').submit();		

	}

	else

	{

		alert('<?=_thanhtoandd?>');}



}





</script>	

<form id="formthanhtoan" name="formthanhtoan" method="post">

   <div id="thanhtoanmanchinh">



		 <div id="container"><!-------load sp-->

 	<div id="bg_center1" style="margin-top:44px;">

       		<img src="images/banner_content.jpg" alt="banner" title=""  />

    </div>

    <div id="body_spct" style="height:auto;">

								

				

				<?php		

				if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){	

				?>

				

				<div style="width=97%; height:auto; float:left;padding-left:5px;">

					<div style=" float:left; width:300px; height:100%; border-color: rgb(221, 221, 221);	border-style: solid; border-width: 0px 1px 0px 0px;">

						<ul id="thongtinnguoinhan" style=" float:left; width:97%;">

							

							<li style="float:left;padding-bottom:2px; padding-top:10px; text-align:left; width:98%;border-color:rgb(173,213,82);	border-style: solid; border-width: 0px 0px 1px 0px; font-size:16px;font-weight:bold	"><?=_thongtinnguoinhan?></li>

							<li style="width:97%; float:right; padding-bottom:12px; margin-top:10px;" >

									<div>

									<div style="float:left;padding-right:10px;padding-top:5px;font-weight: bold;"><?=_hoten?> </div>

									<input class="textfe" id="name" name="name_kh" type="text" style="width:70%; height:26px; float:right" title="đăng nhập" value="<?=$ten_kh?>"></input>

									</div>

							</li>

							<li style="width:97%; float:right; padding-bottom:12px;" >

									<div>

									<div style="float:left; padding-right:10px;padding-top:5px;">Email</div>

									<input class="textfe" type="text" id="email" name="email_kh"  style="width:70%; height:26px;float:right;" title="đăng nhập" value="<?=$email_kh?>"></input>

									</div>

							</li>

							<li style="width:97%; float:right;padding-bottom:12px;" >

									<div>

									<div style="float:left; padding-right:10px;padding-top:5px;"><?=_dienthoai?></div>

									<input class="textfe" id="phone" name="phone_kh" type="text" style="width:70%; height:26px;float:right;" title="name" value="<?=$phone_kh?>"></input>

									</div>

							</li>							

							<li style="float:left;padding-bottom:1px; padding-top:5px; text-align:left; width:100%;border-color:rgb(173,213,82);	border-style: solid; border-width: 0px 0px 1px 0px; font-size:16px;	padding-left:5px;"><?=_diachigiaohang?> </li>

							<li style="width:97%; float:right; padding-bottom:2px;" >

									<div style="padding-bottom:12px; padding-top:10px; width:100%;">

										

<a style="width:100%;float:left;text-align:left;margin-bottom:5px;"><?=_thanhpho?></a>

										<input class="textfe" id="city1" name="address_kd1" type="text" style="width:100%; height:26px; float:right;" title="tỉnh" value="<?=$thanhpho?>"></input>

<a style="width:100%;float:left;text-align:left;margin-bottom:5px;"><?=_quan?>	</a>									<input class="textfe" id="city2" name="address_kd2" type="text" style="width:100%; height:26px; float:right;" title="Quận" value="<?=$quan?>"></input>

									</div>

							</li>							

							<li style="width:97%; float:right; padding-bottom:2px; heigh:auto;" >

									<div style="padding-bottom:12px; padding-top:10px; ">

		<a style="float:left; width:100%; text-align:left;"><?=_ghichutt?></a>

										<textarea rows="2" cols="20" style="width:100%;float:right;text-align:left;min-height:150px" id="details" name="details_kh">

											<?=$details_kh?>

										</textarea> 

	

									</div>

							</li>

							</ul>

					</div>

				<div style=" float:left; width:300px; height:100%; border-color: rgb(221, 221, 221);	border-style: solid; border-width: 0px 1px 0px 0px; padding:5px;">

				<div class="checkout-register" style="float:left; width:95%;">

					<div style="float:left;width:100%;">

						<ul width=100%;>

						<li style="float:left;padding-bottom:2px; padding-top:5px; text-align:left; width:100%;border-color:rgb(173,213,82);	border-style: solid; border-width: 0px 0px 1px 0px; font-size:16px; font-weight: bold;"><?=_hinhthucthanhtoan?></li>

						</ul>

					

		

						<div class="register-content" style="float:left;padding-top:5px; width:100%;">

											

							<ul class="register-methods" style="width:100%; text-align: left;padding:3px;">

								<li style="padding-bottom:10px">

									<input class="radio valign" type="radio" id="checkout_type_register" name="checkout_type_register" value="" checked="checked" onclick="fn_show_checkout_buttons('register');" />									

									<span class="method-title"style=""><?=_thanhtoankhinhanhang?></span>

								</li >



								<li style="padding-bottom:10px">

									<input class="radio valign" type="radio" id="checkout_type_guest" name="checkout_type_guest" value="" onclick="fn_show_checkout_buttons('guest');" />

									<span class="method-title" style=""><?=_thanhtoannganluong?></span>

								</li>

							</ul>

						</div>

					</div>

				</div>

				<div id="anonymous_checkout" class="cm-noscript">

				

						<input type="hidden" name="result_ids" value="checkout*,account*" />							

							<div>

								<div style="width:97%;float:left;padding-left:3px;padding-top:20px;padding-right:10px;">

									

										 <ul class=""style="width:25%;float:left;"><img src="images/vietcombank.jpg" alt="" title="" style="cursor:pointer"/></ul>

										 <ul class=""style="width:25%;float:left;"><img src="images/viettinbank.jpg" alt="" title="" style="cursor:pointer"/></ul>

										 <ul class=""style="width:25%;float:left;"><img src="images/donga.jpg" alt="" title=""style="cursor:pointer" /></ul>

										 <ul class=""style="width:25%;float:left;"><img src="images/vib.jpg" alt="" title="" style="cursor:pointer" /></ul>

								</div>

								<div style="width:97%;float:left;padding-left:3px;padding-top:20px;padding-right:10px;">

								

									 <ul class=""style="width:25%;float:left;"><img src="images/teckcom.jpg" alt="" title="" style="cursor:pointer"/></ul>

									 <ul class=""style="width:25%;float:left;"><img src="images/hdbank.jpg" alt="" title="" style="cursor:pointer"/></ul>

									 <ul class=""style="width:25%;float:left;"><img src="images/tienphongbank.jpg" alt="" title=""style="cursor:pointer" /></ul>

									 <ul class=""style="width:25%;float:left;"><img src="images/mb.png" alt="" title="" style="cursor:pointer" /></ul>

							</div>

							<div style="width:97%;float:left;padding-left:3px;padding-top:20px;padding-right:10px;">

								

									 <ul class=""style="width:25%;float:left;"><img src="images/vieta.jpg" alt="" title="" style="cursor:pointer"/></ul>

									 <ul class=""style="width:25%;float:left;"><img src="images/mattime.jpg" alt="" title="" style="cursor:pointer"/></ul>

									 <ul class=""style="width:25%;float:left;"><img src="images/eximbank.jpg" alt="" title=""style="cursor:pointer" /></ul>

									 <ul class=""style="width:25%;float:left;"><img src="images/shb.jpg" alt="" title="" style="cursor:pointer" /></ul>

							</div>

							<div style="width:97%;float:left;padding-left:3px;padding-top:20px;padding-right:10px;">

								

									 <ul class=""style="width:25%;float:left;"><img src="images/sacombank.jpg" alt="" title="" style="cursor:pointer"/></ul>

									 

							</div>

							</div>

				</div>

					

			</div>

			<div style=" float:left; height:auto;width:330px;padding-left:5px;padding-bottom:3px;">

						<ul id="thongtinnguoinhan" style=" float:left; width:100%">

								

							<li style="float:left;padding-bottom:2px; padding-top:10px; text-align:left; width:100%;border-color:rgb(173,213,82);border-style: solid; border-width: 0px 0px 1px 0px; font-size:16px; font-weight: bold;	"><?=_xacnhandonhang?></li>

								

						</ul>

						<ul style="padding-top:25px;">

							<li style=" width:100%; height:27px; border-style: solid; border-color:rgb(221,221,221); float:left; border-width: 0px 0px 1px 0px; padding-left:12px;">

								

							</li>

						</ul>

						<ul style="padding-top:5px; height:auto; border-style: solid; border-color:rgb(221,221,221); float:left; border-width: 0px 0px 1px 0px; padding-left:12px; width:100%;font-weight: bold;text-align:center">

							<li style="float:left;width:30%;text-align:left">

								<?=_tensp?>

							</li>

							<li style="float:left;padding-left:70px"><?=_soluong?></li>

							<li style="float:right"><?=_gia?></li>

						</ul>

						<?php

						if(is_array(@$_SESSION['cart'])){

						$max=count($_SESSION['cart']);

						for($i=0;$i<$max;$i++){

						$pid=$_SESSION['cart'][$i]['productid'];

						$q=$_SESSION['cart'][$i]['qty'];				

						$pname=get_product_name($pid,$lang);

						if($q==0) continue;

						?>

						<ul style="padding-top:5px; height:auto; border-style: solid; border-color:rgb(221,221,221); color:rgb(102,102,102); float:left; border-width: 0px 0px 1px 0px; padding-left:12px; width:100%;">

							<li style="float:left;width:30%;text-align:left">

								<?=catchuoi($pname,10)?>

							</li>

							<li style="float:left;padding-left:100px"><?=$q?></li>

							<li style="float:right"><?=number_format((get_price($pid)*$q)-($q*get_price($pid)*get_price_km($pid)),0, ',', '.') ?> &nbsp;VNĐ</li>

						</ul>

						<?php	

						}

						}

						?>

						

						<ul style="padding-top:5px; height:25px; border-style: solid; border-color:rgb(221,221,221); color:rgb(102,102,102); float:left; border-width: 0px 0px 1px 0px; padding-left:12px; width:100%;">

							<li style="float:left;width:30%;text-align:left">

							

							</li>

							<li style="float:left;text-align:left"><?=_phivanchuyen?></li>

							<li style="float:right"><?= $phivanchuyen ?>đ</li>

						</ul>

						<!--<ul style="padding-top:5px; height:25px; border-style: solid; border-color:rgb(221,221,221); color:rgb(102,102,102); float:left; border-width: 0px 0px 1px 0px; padding-left:12px; width:100%;">

							

							<li style="float:left;text-align:right;width:65%;"><?=_giagiam?></li>

							<li style="float:right">0đ</li>

						</ul>

						-->

						<ul style="padding-top:5px; height:25px; border-style: solid; border-color:rgb(221,221,221); float:left; font-weight: bold; border-width: 0px 0px 1px 0px; padding-left:12px; width:100%;">

							

							<li style="float:left;text-align:right;width:65%;"><?=_tong?></li>

							<li style="float:right"><?=number_format((get_order_total() + $phivanchuyen),0, ',', '.')?></span>

              &nbsp;VNĐ</b></li>

						</ul>

						<ul style="padding-top:5px; height:30x; float:left; font-weight: bold;padding-left:12px; width:100%;padding-top:25px;">

								<li style="float:right;background-color:rgb(190,219,79);">

								<a id="btnnl" style="display:none;" href="javascript:;" onclick="exceCheckOut();"><?=_hoantat?> 1</a>

								<input id="btthanhtoankygoi" name="btthanhtoankygoi" type="button" value="<?=_hoantat?>" style="float:right;background-color:rgb(190,219,79); text-align:center;padding-top:2px;cursor:pointer; border:0; font: 13px/1.231 arial, helvetica, clean, sans-serif; font-weight: bold; color: #000;height: 40px;width: 120px;" onclick="exceCheckOut();"/>

								</li>

						</ul>

						

						

			</div>

		</div>

			<?php

			}else{

			?>	

				<div style="padding-left:10px; float:left; width:95%;">

					<div class="thanhtoan" style=" width=100%;font-size: 20px; color: rgb(173, 213, 82); text-align:left; padding-bottom:13px;">

						<?=_thanhtoan?> 							 

					</div>	

					<div class="thanhtoan1" style=" width:100%; float:left; text-align:left; padding-bottom:13px; padding-top:5px; border-color: rgb(221, 221, 221);	border-style: solid; border-width: 0px 0px 1px;">

    												<?=_bancanphai?>

													<a style="font-size:13px; font-family: Verdana; color: rgb(173, 213, 82); font-style: italic;border-color: rgb(173,213,82);	border-style: solid; border-width: 0px 0px 1px;" href="thanhvien.html?url=<?= $_SERVER['REQUEST_URI'] ?>"><?=_login?></a> 

													<?=_truocthanhtoan?>

					</div>

				</div>

			<?php

			}

			?>				

				</div>

			</div>

    <div class="clear"></div>

	</div>

	<input class="textfe" id="type_buy" name="type_buy" type="text" style="display:none;" value="<?=$type_buy?>"></input>

</form>