<div class="block_content">
    <div class="title_index">
        <h3 class="title-pro"><?=$title_tcat?></h3>
    </div>
    <div class="clear"></div>
    <div class="show-pro">
	  <?php
				   if(count($tintuc)>0){
				   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
			   ?>
		<div class="box_news">
					<div class="image_boder"><a href="dich-vu/<?=$tintuc[$i]['id']?>-<?=$tintuc[$i]['tenkhongdau']?>.html"><img src="<?=_upload_dichvu_l.$tintuc[$i]['thumb']?>" onerror="this.src='images/noimage.gif';" width="120" height="80"/></a></div>
				   <h2> <a href="dich-vu/<?=$tintuc[$i]['id']?>-<?=$tintuc[$i]['tenkhongdau']?>.html"><?=$tintuc[$i]["ten_$lang"]?></a></h2>
				   <p class="small"><?=_dangluc?> <?=date('d-m-Y h:i:s A',$tintuc[$i]['ngaytao'])?> - <?=_luotxem?>: <?=$tintuc[$i]['luotxem']?></p>
				  <p><?=$tintuc[$i]["mota_$lang"]?></p>
				  <div class="clear"></div>
				 
				</div>
			<?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>                                     
				<div class="phantrang" ><?=$paging['paging']?></div>
		<div class="clear"></div>
	</div>
</div>