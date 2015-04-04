<div id="bg_center" style="width:100%;height:auto">
                    <img src="images/banner_content.jpg" alt="banner" title=""  style="padding-top: 40px;" /> 
				
                </div>
<div style="width:100%;margin-top:20px;">
<img src="images/tags.jpg" style="float: left; margin-left: 27px;"></img>
<h3 class="title-pro-new"style="">Tag</h3> <a style="float: left;margin-top: 3px;font-weight: bold;color: rgb(204, 204, 204);text-align: left;margin-right:5px;"><?=$tukhoatag?></a>
 <div class="search_header_quick_searchsp">						
		 <?php include _template."layout/search.php"; ?>							
</div>
</div>
    <div class="clear"></div>

 

<div class="show-pro">                              

    <?php for($i=0,$count_sp=count($product);$i<$count_sp;$i++) { ?>
<!-- neu la product -->    	     
<?php if($product[$i]['mode'] == 0) { ?>
		<div class="pro <?php if(($i+1)%2==0) echo ' last'?>">

		   <div class="block_img">

				<a href="san-pham/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html"><img src="<?=_upload_product_l.$product[$i]['thumb']?>" alt="" title="" onmouseout="hideTip()" onmouseover="doTooltip(event, '<?=_upload_product_l.$product[$i]['photo']?>')" /></a>

			</div>
			<div class="search_information">
				<p class="pro-name"><a href="san-pham/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten_'.$lang]?></a></p>
				
				<p class="pro-name"><?=catchuoi($product[$i]["mota_$lang"],55)?></p>
				<p class="pro-id">Mã :<a href="san-pham/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['masp']?></a></p>

				<p class="pro-price">Giá: <span class="font-red"><?php if($product[$i]['gia'] =="" || $product[$i]['gia'] =="0") echo 'Liên hệ'; else echo number_format ($product[$i]['gia'],0,",","."); ?> </span> vnđ</p>
				<p class="search_read_more">	
				 <a href="san-pham/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html">
												>> Chi tiết
								           </a>
				</p>
			</div>
		</div><!--pro-->
<?php } ?> 
<!-- neu la product -->

<!-- neu la news -->    	     
<?php if($product[$i]['mode'] == 1) { ?>
		<div class="pro <?php if(($i+1)%2==0) echo ' last'?>">

		   <div class="block_img">

				<a href="tin-tuc/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html"><img src="<?=_upload_tintuc_l.$product[$i]['thumb']?>" alt="" title="" onmouseout="hideTip()" onmouseover="doTooltip(event, '<?=_upload_product_l.$product[$i]['photo']?>')" /></a>

			</div>
			<div class="search_information">
				<p class="pro-name"><a href="tin-tuc/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten_'.$lang]?></a></p>
				<p class="date">
                                 <?=date('d-m-Y h:i:s A',$product[$i]['ngaytao'])?> by <a href="#"><?=$product[$i]['nguoitao']?></a>
                                </p>
<p class="des_new">
<?=catchuoi($product[$i]["mota_$lang"],300)?>  
                                </p>
								
				<p class="search_read_more">	
				 <a href="tin-tuc/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html">
												>> Chi tiết
								           </a>
				</p>
			</div>
		</div><!--pro-->
<?php } ?> 
<!-- neu la news  -->


<!-- neu la blogs -->    	     
<?php if($product[$i]['mode'] == 2) { ?>
		<div class="pro <?php if(($i+1)%2==0) echo ' last'?>">

		   <div class="block_img">

				<a href="blog/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html"><img src="<?=_upload_tintuc_l.$product[$i]['thumb']?>" alt="" title="" onmouseout="hideTip()" onmouseover="doTooltip(event, '<?=_upload_product_l.$product[$i]['photo']?>')" /></a>

			</div>
			<div class="search_information">
				<p class="pro-name"><a href="blog/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten_'.$lang]?></a></p>
				<p class="date">
                                 <?=date('d-m-Y h:i:s A',$product[$i]['ngaytao'])?> by <a href="#"><?=$product[$i]['nguoitao']?></a>
                                </p>
<p class="des_new">
<?=catchuoi($product[$i]["mota_$lang"],300)?>  
                                </p>
								
				<p class="search_read_more">	
				 <a href="blog/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html">
												>> Chi tiết
								           </a>
				</p>
			</div>
		</div><!--pro-->
<?php } ?> 
<!-- neu la blogs -->
    <?php } ?>   
    
    
    <div class="clear"></div>

    <div class="phantrang"  style="float:left" ><?=$paging['paging']?></div>

</div>