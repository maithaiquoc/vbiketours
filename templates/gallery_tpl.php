<div id="brd"><ul><li class="home"><a href="http://<?=$config_url?>/<?=$lang?>/index.html"><?=_trangchu?></a></li><li><a href="http://<?=$config_url?>/<?=$lang?>/bo-suu-tap.html"><?=_bosuutap?></a></li></ul></div>
   <div class="box_content">

       <?php
			   if(count($tintuc)>0){
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>
    <div class="box_gallery" <?php if(($i+1)%3==0) echo 'style="margin-right:0px"';?>>
            	<a href="<?=$lang?>/bo-suu-tap/<?=$tintuc[$i]['id']?>/<?=$tintuc[$i]['tenkhongdau']?>.html"><img src="<?=_upload_hinhanh_l.$tintuc[$i]['thumb']?>" onerror="this.src='images/noimage.gif';" /></a>
               <h2> <a href="<?=$lang?>/bo-suu-tap/<?=$tintuc[$i]['id']?>/<?=$tintuc[$i]['tenkhongdau']?>.html"><?=$tintuc[$i]['ten_'.$lang]?></a></h2>
               <?=$tintuc[$i]['mota_'.$lang]?>            </div>
        <?php } }else echo '<p>N?i dung ?ang c?p nh?t, b?n vui lòng xem các chuyên m?c khác.</p>';  ?>
            <div class="phantrang" ><?=$paging['paging']?></div>
    <div class="clear"></div>

              </div>