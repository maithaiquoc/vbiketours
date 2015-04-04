<h3 class="title-menu">TOUR</h3>
<div class="clear"></div>
<div class="fb-like" data-href="<?=getCurrentPageURL()?>" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false"></div>
		<div class="block-khachsan-top">
        	
            <div class="block-img-khachsan">
                 <a href="tour/<?=$tintuc[0]['id']?>-<?=$tintuc[0]['tenkhongdau']?>.html"><img src="<?=_upload_tour_l.$tintuc[0]['thumb']?>" alt="" title="" /></a>
            </div><!--block-img-khachsan-->
            <div class="block-info-khachsan">
                <h3> <a href="tour/<?=$tintuc[0]['id']?>-<?=$tintuc[0]['tenkhongdau']?>.html"><?=$tintuc[0]["ten_$lang"]?></a></h3>
                <p class="mota"><?=$tintuc[0]["mota_$lang"]?></p>
                <a href="tour/<?=$tintuc[0]['id']?>-<?=$tintuc[0]['tenkhongdau']?>.html" class="xemchitiet">Chi tiết</a>
        </div>
        </div>  <!--block-khachsan-top-->   
  			<?php
			   if(count($tintuc)>0){
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>  
      	
           
     <div class="block-khachsan <?php if(($i+1)%2==0) echo 'last';?>">
     	<h4> <a href="tour/<?=$tintuc[$i]['id']?>-<?=$tintuc[$i]['tenkhongdau']?>.html"><?=$tintuc[$i]["ten_$lang"]?></a></h4>
    	<div class="block-thumb-khachsan">
        	 <a href="tour/<?=$tintuc[$i]['id']?>-<?=$tintuc[$i]['tenkhongdau']?>.html"><img src="<?=_upload_tour_l.$tintuc[$i]['thumb']?>" alt="" title="" /></a>
        </div><!--block-thumb-->
        <div class="block-mota-khachsan">
        	<p><?=$tintuc[$i]["mota_$lang"]?></p>
           
            </div>
   		 </div><!--block-khachsan-->
        <?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>          
        <div class="clear"></div>                               
            <div class="phantrang" ><?=$paging['paging']?></div>
    	<div class="clear"></div>
