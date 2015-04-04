<div id="hotnews" class="tintucmoi">
    <div class="icon-hotnews"><a href="tin-tuc.html"><img src="images/hotnews.png" /></a></div>
    <div class="scroll-tin">
         <div class="jcarousel-container jcarousel-container-vertical" style="position:relative; display:block">
                <div class="jcarousel-clip jcarousel-clip-vertical" style="position:relative">
                    <ul class="jcarousel-skin-tango" id="tinmoi">
                    	<?php
							$sql_tintuc = "select ten_$lang,tenkhongdau,id from #_news where hienthi=1 order by stt,ngaytao desc";
							$d->query($sql_tintuc);
							$tintucnews = $d->result_array();
							   if(count($tintucnews)>0){
							   for($i=0,$count_tintucnews=count($tintucnews);$i<$count_tintucnews;$i++){
						   ?>
							<li><a href="tin-tuc/<?=$tintucnews[$i]['id']?>-<?=$tintucnews[$i]['tenkhongdau']?>.html"><?=$tintucnews[$i]["ten_$lang"]?></a></li>
						<?php } }?>                                     
                    </ul>				
                </div><!--End .jcarousel-clip-->
            </div><!--End .jcarousel-container-->

    </div>
</div><!--hotnews-->