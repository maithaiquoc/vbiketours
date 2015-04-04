
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
					
<div class="componentheading" >
	Frequently Asked Questions</div>
<div id="contentarea" style="width: 98%;">
<div id="myPane" class="pane-sliders">
<?php

								$d->reset();

								$sql_newitem="select ten_$lang,mota_$lang, id from #_hotro where hienthi =1  order by stt,id desc";

								$d->query($sql_newitem);	

								$result_tintuc=$d->result_array();	

								if(!empty($result_tintuc)){

								?>
                                <?php

									foreach($result_tintuc as $item_pro_new){

										?>
							<div class="panel">
<h3 class="jpane-toggler title" id="jeFAQquestions_q0"><span><?=$item_pro_new["ten_$lang"]?></span></h3>
<div class="jpane-slider content" style="padding-top: 0px; border-top-style: none; padding-bottom: 0px; border-bottom-style: none; overflow: hidden; height: 0px;"><?=@$item_pro_new["mota_$lang"]?>
</a>
</p></div></div>
								<?php

									}

								?>	
                                <?php

								}

							?>

</div></div></div></div>

<br style="clear : both">
				</div>
				
								
				
			</div>

			
		</div>
		
			</div>

	
</div>
</div>
<!-- //CONTENT -->					</div>

			
	</div>
	</div>