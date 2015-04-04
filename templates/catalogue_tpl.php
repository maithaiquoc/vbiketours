<div class="show-pro">                               
    <?php for($i=0,$count_sp=count($catalogue);$i<$count_sp;$i++) { ?>
    	     
		<div class="pro">
		   <div class="block_img <?php if(($i+1)%3==0) echo ' last'?>">
				<a class="catalogue" href="catalogue-detail/<?=$catalogue[$i]['id']?>-<?=$catalogue[$i]['tenkhongdau']?>.html"><img src="<?=_upload_catalogue_l.$catalogue[$i]['thumb']?>" alt="" title="" onmouseout="hideTip()" onmouseover="doTooltip(event, '<?=_upload_catalogue_l.$catalogue[$i]['photo']?>')" /></a>
			</div>
			<p class="pro-name"><a href="catalogue-detail/<?=$catalogue[$i]['id']?>-<?=$catalogue[$i]['tenkhongdau']?>.html"><?=$catalogue[$i]['ten_'.$lang]?></a></p>
            <p class="pro-name">Mã :<a href="catalogue-detail/<?=$catalogue[$i]['id']?>-<?=$catalogue[$i]['tenkhongdau']?>.html"><?=$catalogue[$i]['masp']?></a></p>
			<p class="pro-price">Giá: <span class="red"><?php if($catalogue[$i]['gia'] =="" || $catalogue[$i]['gia'] =="0") echo 'Liên hệ'; else echo number_format ($catalogue[$i]['gia'],0,",","."); ?> </span> vnđ</p>
		</div><!--pro-->
    <?php } ?>       
    <div class="clear"></div>
    <div class="phantrang" ><?=$paging['paging']?></div>
</div>