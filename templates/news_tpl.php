   <script type="text/javascript">
	function inputFocus(i){
		if(i.value==i.defaultValue){ i.value=""; i.style.color="#000"; }
	}
	function inputBlur(i){
		if(i.value==""){ i.value=i.defaultValue; i.style.color="#888"; }
	}
	</script> 
<div class="left">
            	<!-- Slideshow ----------------------------------------------------------------->         
                <div class="container">
                 <?php include _template."layout/slideranh.php"; ?>	
                 </div>
        		<div class="clear"></div>
                <!-- News ---------------------------------------------------------------------->
                <div class="news_items">
                    <ul class="news_items_frame">
                    <?php

	   if(count($tintuc)>0){

	   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){

   ?>
                            <li style="min-width: 300px;"><img src="<?=_upload_tintuc_l.$tintuc[$i]['thumb']?>">
                             <a href="tin-tuc/<?=$tintuc[$i]['id']?>-<?=$tintuc[$i]['tenkhongdau']?>.html"><h3 style="font-weight: bold;">       
                                <?=$tintuc[$i]["ten_$lang"]?> 
                                </h3></a>
                                <p class="date">
                                 <?=date('d-m-Y h:i:s A',$tintuc[$i]['ngaytao'])?> by <a href="#"><?=$tintuc[$i]['nguoitao']?></a>
                                </p>
                                <p class="des_new">
<?= catchuoi(strip_tags($tintuc[$i]["mota_$lang"],""),300) ?>  
                                </p>       
                            </li>
                        
                         
                       <?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>  
                       
                    
                    	</ul>
						<div class="phantrang" style="text-align:center" ><?=$paging['paging']?></div>
                </div>        		     
        	</div>
			