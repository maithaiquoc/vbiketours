<div id="ja-container" class="wrap ja-l1">
    <div class="main clearfix">
      <div id="ja-mainbody" style="width:100%"> 
        <!-- CONTENT -->
        <div id="ja-main" style="width:74%">
          <div class="inner clearfix">
            <div class="ja-mass ja-mass-top clearfix">
              <div class="ja-moduletable moduletable_welcome  clearfix" id="Mod74">
                <div class="ja-box-ct clearfix">
                <?php
                $d->reset();

			$sql_contact = "select * from #_setting ";

			$d->query($sql_contact);

			$row_setting = $d->fetch_array();
			?>
                  <p><strong><?=$row_setting["kygoi_$lang"] ?></p>
                  
                </div>
              </div>
            </div>
            <div id="ja-contentwrap" class="">
              <div id="ja-content" class="column" style="width:100%">
                <div id="ja-current-content" class="column" style="width:100%">
                  <div class="ja-content-main clearfix">
                    <div class="blog">
                   
                      <div class="cols2 clearfix">
                       <?php

		if(!empty($product)){

			for($j=0,$count_cc=count($product);$j<$count_cc;$j++){

		?>	
                        <div class="article_column  <?php if($j%2!==0) echo 'column2'?> <?php if($j%2==0) echo 'column1'?>" <?php if($j%2!==0) echo 'style="padding-left:12px;"' ?> <?php if($j%2==0) echo 'style="padding-right:0px;"' ?>>
                          <div class="home_tours_list clearfix">
                            <div class="home-image"> 
                            <a href="tour/<?=$product[$j]['id']?>-<?=$product[$j]['tenkhongdau']?>.html" class="contentpagetitle spec_home_tours"> <img src="<?=_upload_product_l.$product[$j]['photo']?>" class="home_tours" alt="<?=$product[$j]["ten_$lang"]?>" title="<?=$product[$j]["ten_$lang"]?>" width="325" height="244"> </a> </div>
                            <div class="home-main clearfix">
                              <h2 class="home_tours_title"> <a href="tour/<?=$product[$j]['id']?>-<?=$product[$j]['tenkhongdau']?>.html" class="contentpagetitle"> <?=$product[$j]["ten_$lang"]?></a> </h2>
                              <h4 class="home_tours_time"><strong>Tour starts at <?=$product[$j]["start"]?></strong></h4>
                              <h3 class="home_tours_price_time"><strong> $<?=$product[$j]["gia"]?> - <?=$product[$j]["lenght"]?> hours </strong></h3>
                              <div class="home_tours_intro"><?= catchuoi(str_replace("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","",strip_tags($product[$j]["mota_$lang"],"")),80) ?> </div>
                              <div class="readon-block"> 
                              <a href="tour/<?=$product[$j]['id']?>-<?=$product[$j]['tenkhongdau']?>.html" title=" <?=$product[$j]["ten_$lang"]?>" class="readon"> <span>Learn more</span> </a> </div>
                            </div>
                          </div>
                        </div>
                        <?php if($j%2!==0) echo '<div class="article_row" style="clear: both;"></div>'?>
                       <?php	

			}

		}else echo _seecataproError;



	?>  
                        
                      </div>
                      
                  
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!--<div class="ja-mass ja-mass-bottom clearfix">
			<div class="ja-moduletable moduletable  clearfix" id="Mod66">
						<div class="ja-box-ct clearfix">
		<div>
    <object width="710" height="402" data="http://www.youtube.com/v/lilC0648FqM?version=3&amp;hl=en_US&amp;rel=0" type="application/x-shockwave-flash">
        <param name="movie" value="http://www.youtube.com/v/lilC0648FqM?version=3&amp;hl=en_US&amp;rel=0&amp;hd=1">
        <param name="allowFullScreen" value="true">
        <param name="allowscriptaccess" value="always">
    </object>
</div>
<!--
<div>
	</div>
    </div>
	
	</div>--> 
            
          </div>
        </div>
        <!-- //CONTENT --> <!-- LEFT COLUMN-->
        <div id="ja-left" class="column sidebar" style="width:26%">
          <div class="ja-colswrap clearfix ja-l1">
            <div class="ja-col  column" style="width:100%">
              <div class="ja-col-inner clearfix">
                <div class="ja-moduletable moduletable_whyxo  clearfix" id="Mod93">
                  <h3><span>Why Vbike Tours?</span></h3>
                  <div class="ja-box-ct clearfix">
                    <div class="why_xo_text">
                      <ul>
                       <?php
				$d->reset();

			$sql_contact = "select * from table_hotro where hienthi =1 order by stt,id desc limit 9 ";

			$d->query($sql_contact);

			$row_faq = $d->result_array();
			
			
			?>
             <?php

		if(!empty($row_faq)){

			for($k=0,$count_f=count($row_faq);$k<$count_f;$k++){

		?>	
                        <li><a href="faq.html"><?=$row_faq[$k]["ten_$lang"]?></a></li>
                        <?php }}?>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="ja-moduletable moduletable_rbp  clearfix" id="Mod60">
                  <h3><span>News</span></h3>
                  <div class="ja-box-ct clearfix"> 
                    
                   
                    <div class="srfrContainer _rbp">
                      <ul class="srfrList">
                      <?php

								$d->reset();



								$sql_dep="select ten_$lang,  mota_$lang,ngaytao, id,tenkhongdau, thumb,tinnoibat, photo from #_blog where hienthi =1 order by stt,id desc limit 6";



								$d->query($sql_dep);	



								$result_blog=$d->result_array();

								

								if(!empty($result_blog))

								{

									for($j=0,$count_cc=count($result_blog);$j<$count_cc;$j++)

									{										

											?>

                        <li class="<?php if($j%2==0) echo 'srfrRow0' ?> <?php if($j%2!==0) echo 'srfrRow1' ?>"> <a target="_blank" href="news/<?=$result_blog[$j]['id']?>-<?=$result_blog[$j]['tenkhongdau']?>.html"><?=catchuoi($result_blog[$j]["ten_$lang"],60)?> </a>
                          <div class="srfrFeedDetails"> <span class="srfrFeedItemDate"><?=date('M D,Y',$result_blog[$j]['ngaytao'])?></span> </div>
                        </li>
                       
                        	<?php																			

									}

								}

						   ?>                 
                      </ul>
                    </div>
                    <div class="clr"></div>
                    
                   
                    
                  </div>
                </div>
               <div class="ja-moduletable moduletable_tripadv  clearfix" id="Mod34">
                  <div class="ja-box-ct clearfix">                
                
                    <?php

$d->reset();

$sql_quangcao="select id,link,photo from #_quangcao where hienthi=1 and stt>=19 order by id desc";

$d->query($sql_quangcao);	

$result_left=$d->result_array();
?>
<?php if(!empty($result_left))

{

for($j=0,$count_cc=count($result_left);$j<$count_cc;$j++)

{		

?>

                    <div style="margin-left: -1px; margin-top: 12px;border: solid 2px #e2227c;width: 238px;"> <a href="<?=$result_left[$j]['link']?>">
                    <img src="<?=_upload_duan_l.$result_left[$j]['photo']?>" width="234p" height="auto"></a> </div>
                    <?php }}?>
                  </div>
                </div>
                <?php
				$d->reset();

			$sql_contact = "select * from #_setting ";

			$d->query($sql_contact);

			$row_setting = $d->fetch_array();
			?>
                <div class="ja-moduletable moduletable_home_social_box  clearfix" id="Mod79">
                  <div class="ja-box-ct clearfix">
                    <p class="hsb-p">
                    <span>
                     <a href="<?=$row_setting['facebook_link'] ?>" target="_blank">
						<img src="images/Facebook.png" alt="Facebook" /></a>
                    
                    </span>
                    <span>
                    <a href="<?= $row_setting['twitter_link'] ?>" target="_blank">
					<img src="images/twitter.png" alt="Twitter" />
						</a></span>
                    <span> <a href="<?= $row_setting['googleplus_link'] ?>" target="_blank">

 <img src="images/Google+.png" alt="Google" />

</a></span>
                    <span><a href="<?= $row_setting['linkedin_link'] ?>" target="_blank">

<img src="images/linkedin_32.png" alt="linkedin" />

</a></span>
                    </p>
                  </div>
                </div>
                <div class="ja-moduletable moduletable  clearfix" id="Mod92">
                  <div class="ja-box-ct clearfix"> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- //LEFT COLUMN--> 
      </div>
    </div>
  </div>