
 <?php include _template."layout/dongchu.php"; ?>
<div id="ja-container" class="wrap ">
	<div class="main clearfix">

		<div id="ja-mainbody" style="width:100%">
			<!-- CONTENT -->
<div id="ja-main" style="width:100%">
<div class="inner clearfix">
	
	

	
	<div id="ja-contentwrap" class="">
				<div id="ja-content" class="column" style="width:100%">

			<div id="ja-current-content" class="column" style="width:100%">
								
								<div class="ja-content-main clearfix">
<div class="article-content">
<h1 class="contentheading press-page">VBIKETOURS in the Press</h1>
<div class="press-page">

 <?php 
                    if(count($gioithieu)>0){
                 for($i=0,$count_sp=count($gioithieu);$i<$count_sp;$i++) { ?>
                 
                 <?php if($gioithieu[$i]["mota_vi"]==''){ ?>
                 
<div class="pp-item">
<div class="ppi-img"><a href="<?=$gioithieu[$i]["link"]?>" target="_blank" rel="nofollow">
<img src="<?=_upload_tintuc_l,$gioithieu[$i]["photo"]?>" alt="<?=$gioithieu[$i]["ten_$lang"]?>" height="260" width="186"></a></div>
<div class="ppi-title"><a href="<?=$gioithieu[$i]["link"]?>" target="_blank"><?=$gioithieu[$i]["ten_$lang"]?></a></div>
<div class="ppi-date"><?=date('M d, Y',$gioithieu[$i]['ngaytao'])?></div>
</div>
   <?php }?>
<?php 
                } }else echo '<p>updating! please other</p>';
            ?> 
            </div>
                            <hr class="style-2">
<h1 class="contentheading press-page">VBIKETOURS on the Web</h1>
        <?php 
                    if(count($gioithieu)>0){
                 for($i=0,$count_sp=count($gioithieu);$i<$count_sp;$i++) { ?>
                 
                 <?php if($gioithieu[$i]["mota_vi"]!==''){ ?>     
 

<div class="pp-web-item">
<div class="ppwi-left"><span class="ppwil-subject">
<a href="<?=$gioithieu[$i]["link"]?>" target="_blank" rel="nofollow"><?=$gioithieu[$i]["ten_$lang"]?></a></span>
<span class="ppwil-date"><?=date('M d, Y',$gioithieu[$i]['ngaytao'])?></span></div>
<div class="ppwi-right"><span><?=$gioithieu[$i]["mota_$lang"]?></span></div>
</div>
                 <?php }?>
<?php 
                } }else echo '<p>updating! please other</p>';
            ?> 

</div>
</div>


</div>



				</div>
				
								
				
			</div>

			
		</div>
		
			</div>

	
</div>
</div>
<!-- //CONTENT -->					</div>

			
	</div>
	</div>