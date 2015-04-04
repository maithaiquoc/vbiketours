<h3 class="title-pro-new"><?=$title_tcat?></h3>
    <div class="clear"></div>
 
<div class="show-pro">                               
    <?php for($i=0,$count_sp=count($product);$i<$count_sp;$i++) { ?>
    	     
		<div class="pro <?php if(($i+1)%2==0) echo ' last'?>">
		   <div class="block_img">
				<a href="san-pham/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html"><img src="<?=_upload_product_l.$product[$i]['thumb']?>" alt="" title="" onmouseout="hideTip()" onmouseover="doTooltip(event, '<?=_upload_product_l.$product[$i]['photo']?>')" /></a>
			</div>
			<p class="pro-name"><a href="san-pham/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten_'.$lang]?></a></p>
            <p class="pro-id">Mã :<a href="san-pham/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['masp']?></a></p>
			<p class="pro-price">Giá: <span class="font-red"><?php if($product[$i]['gia'] =="" || $product[$i]['gia'] =="0") echo 'Liên hệ'; else echo number_format ($product[$i]['gia'],0,",","."); ?> </span> vnđ</p>
		</div><!--pro-->
    <?php } ?>       
    <div class="clear"></div>
    <div class="phantrang" ><?=$paging['paging']?></div>
</div>