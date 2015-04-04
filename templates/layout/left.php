<?php
	
	$d->reset();
	$sql_yahoo="select yahoo,ten_$lang,dienthoai_vi, dienthoai1, dienthoai2 from #_yahoo where hienthi =1 order by stt,id desc";
	$d->query($sql_yahoo);
	$result_yahoo = $d->result_array();
	
	$d->reset();
	$sql_dm="SELECT `id`,`ten_$lang`,`tenkhongdau` FROM #_product_list where `hienthi`=1 ORDER BY stt,id ASC";
	$d->query($sql_dm);
	$result_dm=$d->result_array();
	
	$d->reset();
	$sql_dv="SELECT `id`,`ten_$lang`,`tenkhongdau` FROM #_dichvu_item where `hienthi`=1 ORDER BY stt,id ASC";
	$d->query($sql_dv);
	$result_dv=$d->result_array();
	
	$d->reset();
	$sql_dl="SELECT file,link FROM #_download where `hienthi`=1 ORDER BY id ASC LIMIT 0,2";
	$d->query($sql_dl);
	$dl=$d->result_array();

?>
<div class="cate-pro">
    <h3 class="title-menu"><?=_danhmucsanpham?></span></h3>
    <ul class="accordion cateUl"  id="accordion-2">
    <?php
		if(!empty($result_dm)){
			foreach($result_dm as $k=>$item_dm){
	?>
        <li><a href="san-pham/<?=$item_dm["id"]?>-<?=$item_dm["tenkhongdau"]?>/" title="<?=$item_dm["ten_$lang"]?>"><?=$item_dm["ten_$lang"]?></a>
        <?php
			$d->reset();
			$sql_dm1="SELECT `id`,`ten_$lang`,`tenkhongdau` FROM #_product_cat where `hienthi`=1 and id_list='$item_dm[id]' ORDER BY stt,id ASC";
			$d->query($sql_dm1);
			$result_dm1=$d->result_array();
			if(!empty($result_dm1)){
				echo '<ul>';
				foreach($result_dm1 as $k1=>$item_dm1){
		?>
        	<li<?php if($k1>(count($result_dm1)-2)) echo ' class="noborder"'; ?>><a href="san-pham/<?=$item_dm["id"]?>-<?=$item_dm["tenkhongdau"]?>/<?=$item_dm1["id"]?>-<?=$item_dm1["tenkhongdau"]?>/" title="<?=$item_dm1["ten_$lang"]?>"><?=$item_dm1["ten_$lang"]?></a>
        <?php
				}
				echo '</ul>';
			}
		?>
        </li>
    <?php
			}
		}
	?>
    </ul><!--ul.cateUl-->
</div><!--cate-pro-->
<div class="cate-pro mar-top-20">
    <h3 class="title-menu"><?=_dichvu?></span></h3>
    <ul class="cateUl">
	<?php
    if(!empty($result_dv)){
        foreach($result_dv as $k=>$item_dv){
	?>
    	<li><a href="dich-vu/<?=$item_dv["id"]?>-<?=$item_dv["tenkhongdau"]?>/" title="<?=$item_dv["ten_$lang"]?>"><?=$item_dv["ten_$lang"]?></a></li>
    <?php
		}
	}
	?>
    </ul><!--ul.cateUl-->
</div><!--cate-pro-->
<div class="cate-pro mar-top-20">
    <h3 class="title-menu"><?=_hotrotructuyen?></span></h3>
    <div class="hotro">
        <ul class="menu-left help">
        <?php
			if(!empty($result_yahoo)){
				foreach($result_yahoo as $item_yahoo){
		?>
        <li class="item_support"><?=$item_yahoo["ten_$lang"]?>
            <div>
                <a href="ymsgr:sendIM?<?=$item_yahoo["yahoo"]?>"> <img border="0" style="width: 70px; height: 20px;" src="http://opi.yahoo.com/online?u=<?=$item_yahoo["yahoo"]?>&amp;m=g&amp;t=1" alt="" title="<?=$item_yahoo["ten_$lang"]?>" /></a>
            </div>
        </li>
        <li><?=_dienthoai?> 1<span><?=$item_yahoo['dienthoai_vi']?></span></li>
		<?php
			if($item_yahoo['dienthoai1']!=''){
		?>
		<li><?=_dienthoai?> 2<span><?=$item_yahoo['dienthoai1']?></span></li>
		<?php
			}
		?>
		<?php
			if($item_yahoo['dienthoai2']!=''){
		?>
		<li><?=_dienthoai?> 3<span><?=$item_yahoo['dienthoai2']?></span></li>
		<?php
			}
		?>
        <?php	
				}
			}
		?>
        </ul>
         <div class="block-info">
            <p class="font-shadow font-red">Hotline:</p>
            <p class="font-shadow font-red"><?=$row_setting['hotline']?></p>
            <p style="color:#06F; font-size:11px">Email: <?=$row_setting['email']?></p>
            <p style="color:#06F; font-size:11px">Website: <?=$row_setting['website']?></p>
        </div><!--block-info-->
    </div><!--hotro-->
</div><!--cate-pro-->
<div class="cate-pro mar-top-20">
    <h3 class="title-menu"><?=_quangcao?></h3>
    <div class="hotro">
        <div id="lienketweb">
            <ul class="scroll">
                <?php
					$d->reset();
					$d->setTable('photo');
					$d->setWhere('com','quangcao');
					$d->setWhere('hienthi','1');
					$d->setOrder('stt,id desc');
					$d->select('photo, mota, ten');
					$d->query();
					$qc=$d->result_array();
					if(count($qc)>0){
						foreach($qc as $qcItem){
							echo '<li>
									<a href="'.$qcItem['mota'].'"><img src="'._upload_hinhanh_l,$qcItem['photo'].'" alt="'.$qcItem['ten'].'" title="'.$qcItem['ten'].'" /></a>
								  </li>';
						}
					}
				?>
            </ul>
         </div><!--lienketweb-->
        <div class="clear"></div>
    </div><!--hotro-->
</div><!--cate-pro-->
<div class="cate-pro mar-top-20">
    <h3 class="title-menu"><?=_hotrokhachhang?></h3>
    <div class="hotro">
        <div id="lienketweb">
            <ul class="cateUl">
                <li><a href="chinh-sach.html"><?=_chinhsach?></a></li>
                <li><a href="hoi-dap.html"><?=_giaidapkythuat?></a></li>
                <?php
					if(@$dl[0]['link']==''){
				?>
                	<li><a href="<?=_upload_download_l,$dl[0]['file']?>"><?=_downloadbanggia?></a></li>
                <?php	
					}else{
				?>
                	<li><a href="<?=$dl[0]['link']?>"><?=_downloadbanggia?></a></li>
                <?php	
					}
				?>
                
                <?php
					if(@$dl[1]['link']==''){
				?>
                	<li><a href="<?=_upload_download_l,$dl[1]['file']?>">Download Driver</a></li>
                <?php	
					}else{
				?>
                	<li><a href="<?=$dl[1]['link']?>">Download Driver</a></li>
                <?php	
					}
				?>
            </ul>
         </div><!--lienketweb-->
        <div class="clear"></div>
    </div><!--hotro-->
</div><!--cate-pro-->
<div class="cate-pro" style="margin-top:20px; font-size:12px; color:#666">
    <div class="thongke_footer">
        <h3 style="color:#666; text-transform:uppercase; margin:0 0 10px 0"><?=_thongketruycap?></h3>
        <ul class="ul_tk">
            <li><?=_online?>&nbsp;:&nbsp;<?=$count_user_online?></li>
            <li class="noborder"><?=_tongtruycap?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;<?=$all_visitors?></li>
        </ul>
    </div>
</div><!--cate-pro-->