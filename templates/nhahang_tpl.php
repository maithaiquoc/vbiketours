<h3 class="title-menu"><?=_nhahang?></h3>
<div class="fb-like" data-href="<?=getCurrentPageURL()?>" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false"></div>
<div class="clear"></div>
<br />
  <?php
			   if(count($tintuc)>0){
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>
    <div class="block-nhahang <?php if(($i+1)%2==0) echo 'last';?>">
    	
    	<div class="block-thumb">
        	 <a href="nha-hang-tiec-cuoi/<?=$tintuc[$i]['id']?>-<?=$tintuc[$i]['tenkhongdau']?>.html"><img src="<?=_upload_nhahang_l.$tintuc[$i]['thumb']?>" alt="" title="" /></a>
        </div><!--block-thumb-->
        <div class="block-title-nhahang">
        	<h3> <a href="nha-hang-tiec-cuoi/<?=$tintuc[$i]['id']?>-<?=$tintuc[$i]['tenkhongdau']?>.html"><?=$tintuc[$i]["ten_$lang"]?></a></h3>
        <div class="ct"><a href="nha-hang-tiec-cuoi/<?=$tintuc[$i]['id']?>-<?=$tintuc[$i]['tenkhongdau']?>.html">Chi tiết >></a></div>
        </div>
    </div><!--block-nhahang-->
        <?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>                                     
            <div class="phantrang" ><?=$paging['paging']?></div>
    <div class="clear"></div>
