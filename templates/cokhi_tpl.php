<div class="submenu-content">
    <span class="name-sub"><?=_cokhi?></span>
    <ul class="sub-item">       
         <?php			  
			   for($i=0,$count_dmtt=count($result_dmtt);$i<$count_dmtt;$i++){
		   ?>
        <li><a href="<?=$lang?>/co-khi/<?=$result_dmtt[$i]['id']?>-<?=$result_dmtt[$i]['tenkhongdau']?>/"><?=$result_dmtt[$i]['ten_'.$lang]?></a></li>
         <?php } ?>
    </ul>
    <div class="clear"></div>
</div>

   <div class="box_content">
               	         
             <?php
			   if(count($tintuc)>0){
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>
            <div class="box_new_<?php if(($i+1)%2==0) echo 'r'; else echo 'l'?>">
            	<div class="image_boder"><a href="<?=$lang?>/co-khi/<?=$tintuc[$i]['id']?>-<?=$tintuc[$i]['tenkhongdau']?>.html"><img src="<?php if($tintuc[$i]['thumb']!=NULL) echo _upload_tintuc_l.$tintuc[$i]['thumb']; else echo 'images/noimage.gif';?>" onerror="this.src='images/noimage.gif';" /></a></div>
               <h1> <a href="<?=$lang?>/co-khi/<?=$tintuc[$i]['id']?>-<?=$tintuc[$i]['tenkhongdau']?>.html"><?=$tintuc[$i]['ten_'.$lang]?></a></h1> <?=$tintuc[$i]['mota_'.$lang]?>          
              <div class="clear"></div>
            </div>
            <?php if(($i+1)%2==0) echo '<div class="clear" style="height:20px;"></div>'?>
            <?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>                    <div class="clear"></div>                  
            <div class="phantrang" ><?=$paging['paging']?></div>
            </div> 