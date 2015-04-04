<?php /*?><div class="page block-menutop">

    <ul id="nav_main">

        <li><a href="tin-tuc.html" title="<?=_tintuc?>"><?=_tintuc?></a></li>

        <li><a href="hoi-dap.html" title="<?=_hoidap?>"><?=_hoidap?></a></li>

        <li class="nobg"><a href="chinh-sach.html" title="<?=_chinhsach?>"><?=_chinhsach?></a></li> 
         <li class="nobg"><a href="login.html" title="<?=_chinhsach?>">login</a></li> 

    </ul><!--nav-->

    <div class="lang_con">

        <div class="lang">

            <span><a href="index.php?com=langs&lang=vi" title="Tiếng việt" id="flag_vi">&nbsp;</a></span>&nbsp;

            <span><a href="index.php?com=langs&lang=en" title="English" id="flag_en">&nbsp;</a></span>

        </div>

        <div class="cart_con">

            <a href="gio-hang.html" title="Giỏ hàng"><?=_giohang?>: <?php echo count(@$_SESSION['cart']);?> món</a> &nbsp; 
			 <?

			if(is_array(@$_SESSION['cart'])){
				
				
			?>
      <?=number_format(get_order_total(),0, ',', '.')?> <span>đ</span>
             <?					

				}

			?>
           

        </div>

        <div class="clear"></div>

    </div>

    <div class="clear"></div>

</div><?php */?>



<?php

	$d->reset();

	$d->setTable('photo');

	$d->setWhere('com','banner_top');

	$d->select();

	$row=$d->fetch_array();

	if($row!=FALSE) 

		echo'<object width="1000" height="329" id="banner"   codebase="http://active.macromedia.com/flash4/cabs/swflash.cab#version=4,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">

		<param NAME="_cx" VALUE="13414">

		<param NAME="_cy" VALUE="6641">

		<param NAME="FlashVars" VALUE>

		<param NAME="Movie" value="'._upload_hinhanh_l.$row['photo_'.$lang].'">

		<param NAME="Src" value="'._upload_hinhanh_l.$row['photo_'.$lang].'">

		<param NAME="Quality" VALUE="High">

		<param NAME="AllowScriptAccess" VALUE>

		<param NAME="DeviceFont" VALUE="0">

		<param NAME="EmbedMovie" VALUE="0">

		<param NAME="SWRemote" VALUE>

		<param NAME="MovieData" VALUE>

		<param NAME="SeamlessTabbing" VALUE="1">

		<param NAME="Profile" VALUE="0">

		<param NAME="ProfileAddress" VALUE>

		<param NAME="ProfilePort" VALUE="0">

		<param NAME="AllowNetworking" VALUE="all">

		<param NAME="AllowFullScreen" VALUE="false">

		<param name="scale" value="ExactFit">

		<param name="wmode" value="transparent">

		<embed wmode="transparent" src="'._upload_hinhanh_l.$row['photo_'.$lang].'" quality="High" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" width="1000" height="329" scale="ExactFit"></embed>

	</object>';

	else echo '<img src="images/banner.jpg" alt="banner" title="" id="banner" />';

?>

   

