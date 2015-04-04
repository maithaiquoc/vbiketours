<script type="text/javascript" src="js/jquery.jcarousel.js"></script>
<script type="text/javascript">//<![CDATA[
	$(function(){
		var big_img=$(".relatedimg li:eq(0)").html();
		$(".big_img").html(big_img);
		
		$(".relatedimg img").live("click",function(){
			big_img=$(this).parent().html();
			$(".big_img").html(big_img);
		});		
		$('.scrollpane').jcarousel({vertical:true,scroll:1});
	})
//]]></script>
<div id="brd"><ul><li class="home"><a href="http://<?=$config_url?>/<?=$lang?>/index.html"><?=_trangchu?></a></li><li><a href="http://<?=$config_url?>/<?=$lang?>/bo-suu-tap.html"><?=_bosuutap?></a></li>
<li><a href="http://<?=$config_url?>/<?=$lang?>/bo-suu-tap/<?=$loaitin[0]['id']?>/<?=$loaitin[0]['tenkhongdau']?>.html"><?=$loaitin[0]['ten_'.$lang]?></a></li></ul></div>


<div class="box_content">

	<div id="seriesintro">
    
    	<div class="big_img"></div><!-- end big image -->
        
        <div class="intro">
        	<h1><?=$loaitin[0]['ten_'.$lang]?></h1>
    
            <div class="preview"><?=$loaitin[0]['mota_'.$lang]?></div>
            
            <h3>Gallery</h3>
            <div class="relatedimg">
            	<div class="scrollpane"><ul>
                <?php for($i=0,$count_hinhanh=count($hinhanh);$i<$count_hinhanh;$i++){ ?>
<li><img src="<?=_upload_hinhanh_l.$hinhanh[$i]['photo']?>" alt="" /></li>
<?php } ?>
</ul></div>
            </div>
            
           
        </div><!-- end intro -->
        
    </div><!-- end seriesintro -->              
    <div class="clear"></div>
</div>