
<?php



$d->reset();

			$sql_contact = "select * from #_setting ";

			$d->query($sql_contact);

			$row_setting = $d->fetch_array();
			?>
<!--Width of template -->
<style type="text/css">
.main {
	width: 996px;
	margin: 0 auto;
}
#ja-wrapper {
	min-width: 997px;
}
</style>
<script type="text/javascript">

    function nocontext(e) {
        var clickedTag = (e==null) ? event.srcElement.tagName : e.target.tagName;
        if (clickedTag == "IMG") {
            //alert(alertMsg);
            return false;
        }
    }
    //var alertMsg = "Image context menu is disabled";
    document.oncontextmenu = nocontext;
//]]>
</script>
<div id="ja-container" class="wrap ja-r1 container-fluid">
  <div class="main clearfix row">
    <div id="ja-mainbody" style="width:75%">
      <!-- CONTENT -->
      <div id="ja-main" style="width:100%">
        <div class="inner clearfix">
          <div id="ja-contentwrap" class="">
            <div id="ja-content" class="column" style="width:100%">
              <div id="ja-current-content" class="column" style="width:100%">
                <div class="ja-content-main clearfix">
                  <h2 class="contentheading_specific clearfix"> <?=$row_detail["ten_$lang"]?>  </h2>
                  <div class="article-content">
                    <div class="tour_description">
                      <div class="tour_image_price">
                      <img class="tour_image_thumb" src="<?=_upload_product_l,$row_detail['photo']?>" alt="<?=$row_detail["ten_$lang"]?> " width="360" height="270">
                        <div class="tour_price">
                          <ul>
                            <li>Price: $<?=number_format($row_detail['gia'],0,",",".")?> USD  &nbsp;</li>
                            <li>Length of tour: <?=$row_detail["lenght"]?>  hours</li>
                            <li>Tour starts at <?=$row_detail["start"]?></li>
                            <!-- <li>Accident insurance included!</li>
                -->
                          </ul>
                        </div>
                        <div class="book_now">
                            <form action="booking-now.html" id="frmBookingNow" method="post">
                                <input type="hidden" value="<?php echo $row_detail['ten_vi']; ?>" name="hidNameBookingNow">
                                <input type="hidden" value="<?php echo $row_detail['gia']; ?>" name="hidPriceBookingNow">
                                <a class="book_now_btn" title="Book this tour now" onclick="$('#frmBookingNow').submit();">Book now</a>
                            </form>
                        </div>
                      </div>
                      <div id="tour_desc_detail">
                      
                       <?=$row_detail["mota_$lang"]?> 
                        <p class="notice-paragraph-blue"><strong>
                       <?=str_replace("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","",strip_tags($row_detail["thanhphan_$lang"],"")) ?>
                        </strong></p>
                       
                        <p class="notice-paragraph-red">
                        <a style="text-decoration: underline;" target="_blank" href="faq.html"><strong>
                        <span style="color: #ffffff;"> <?=str_replace("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","",strip_tags($row_detail["dksudung_$lang"],"")) ?></span></strong></a></p>
                        <p class="notice-paragraph-white">
                      
                          <?=$row_detail["chitiet_$lang"] ?>
                        </p>
                        <p></p>
                      </div>
                      <p></p>
                    </div>
                    
                    <div class="tour_description"> 
                      
                      <!-- JoomlaWorks "AllVideos" Plugin (v4.5.0) starts here -->
                      
                      <!--<div class="avPlayerWrapper avVideo">
                        <div style="width:560px;" class="avPlayerContainer">
                          <div id="AVPlayerID_ffbd6235_701961043" class="avPlayerBlock">
                            <iframe src="./chitiet_files/3UVVmrbulXQ.html" width="560" height="315" frameborder="0" allowfullscreen="" title="JoomlaWorks AllVideos Player"></iframe>
                          </div>
                        </div>
                      </div>-->
                      <div class="videoo_right" style="margin-top:10px;">

                       <script type="text/javascript" src="js/jquery.youtubeplaylist.js"></script>


<script type="text/javascript" language="javascript">

    $(document).ready(function(){			

		//flowplayer("player", "js/flowplayer-3.2.18.swf");
$("ul.playerList").ytplaylist({addThumbs:true, autoPlay: false, holderId: 'ytvideoPlayer',playerWidth: '340', allowFullScreen : true});
    });

</script>
<style>
.playerList
{
display:none;
}
</style>

<center>
                        <div id="ytvideoPlayer"
                        <object height="360" width="540"><param name="movie" value="<?=$row_detail["link"]?>"> <param name="wmode" value="transparent"> <param name="allowfullscreen" value="true"> <embed src="<?=$row_detail["link"]?>" allowfullscreen="true" type="application/x-shockwave-flash" wmode="transparent" height="360" width="540"></object></div>

                    </div>
                      </center>
                      <!-- JoomlaWorks "AllVideos" Plugin (v4.5.0) ends here --> 
                      
                    </div>
                    <div class="sharethis_zone">
                      <hr>
                      <p class="addthis_desc">Share this with your friends</p>
                      <div class="addthis_toolbox addthis_default_style">
<!--                      <a href="--><?//=$row_setting['facebook_link'] ?><!--" target="_blank">-->
<!--						<img src="images/Facebook.png" alt="Facebook"  style="width:32px !important;;height:32px !important;" /></a>-->
<!--                      -->
<!--                      <a href="--><?//= $row_setting['twitter_link'] ?><!--" target="_blank" >-->
<!--					<img src="images/twitter.png" alt="Twitter"  style="width:32px !important;;height:32px !important;"  />-->
<!--						</a>-->
<!--                      -->
<!--                      <a href="--><?//= $row_setting['googleplus_link'] ?><!--" target="_blank">-->

                        <?php
                        $pageURL = $_SERVER['HTTPS'] == 'on' ? 'https://' : 'http://';
                        $pageURL .= $_SERVER['SERVER_PORT'] != '80' ? $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"] : $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                        ?>

                          <div id="share-buttons">
                              <!-- Facebook -->
                              <a href="http://www.facebook.com/sharer.php?u=<?= $pageURL ?>" target="_blank"><img src="images/facebook-share.png" alt="Facebook" /></a>

                              <!-- Google+ -->
                              <a href="https://plus.google.com/share?url=<?= $pageURL ?>" target="_blank"><img src="images/google-share.png" alt="Google" /></a>

                              <!-- Twitter -->
                              <a href="http://twitter.com/share?url=<?= $pageURL ?>" target="_blank"><img src="images/twitter-share.png" alt="Twitter" /></a>

                              <!-- Pinterest -->
                              <!--    <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><img src="http://www.simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" /></a>-->
                          </div>

<!-- <img src="images/Google+.png" alt="Google" style="width:32px !important;;height:32px !important;" />-->
<!---->
<!--</a>-->
<!---->
<!---->
<!---->
<!--<a href="--><?//= $row_setting['linkedin_link'] ?><!--" target="_blank">-->
<!---->
<!--<img src="images/linkedin_32.png" alt="linkedin"  style="width:32px !important;;height:32px !important;" />-->

<!--</a>-->
                        <div class="atclear"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- //CONTENT --> </div>
    
    <!-- RIGHT COLUMN-->
    <div id="ja-right" class="column sidebar" style="width:25%">
      <div class="ja-colswrap clearfix ja-r1">
        <div class="ja-col  column" style="width:100%">
          <div class="ja-col-inner clearfix">
            <div class="ja-moduletable moduletable_see_our_tours  clearfix" id="Mod28">
              <h3><span>Our Other Tours</span></h3>
              <div class="ja-box-ct clearfix">
                <div class="ja-sidenews-list clearfix">
                <?php
							if(!empty($sanpham_khac)){
								for($j=0,$count_cc=count($sanpham_khac);$j<$count_cc;$j++){	

						?> 
                  <div class="ja-slidenews-item"> <a class="img-wrap" href="tour/<?=$sanpham_khac[$j]['id']?>-<?=$sanpham_khac[$j]['tenkhongdau']?>.html"> <img class="img-responsive" src="<?=_upload_product_l.$sanpham_khac[$j]['photo']?>" alt="<?=$sanpham_khac[$j]["ten_$lang"]?>" title="<?=$sanpham_khac[$j]["ten_$lang"]?>"> </a> <a class="ja-title" href="tour/<?=$sanpham_khac[$j]['id']?>-<?=$sanpham_khac[$j]['tenkhongdau']?>.html"><?=$sanpham_khac[$j]["ten_$lang"]?></a> </div>
                  <?php } }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <div id="CDSWIDWRM" style="margin:0; padding:0; width:240px; border:none; background-color:#589442; overflow:hidden; height:auto; position:relative; ">
            <div style="padding:13px 11px;background-color:#fff;  border: 1px solid #589442; position:relative; ">
                <div style="margin:3px 0 3px; padding:0 0 8px; overflow:hidden; border-bottom:1px solid #CCCCCC; border-top:none; border-left:none; border-right:none; text-align:center;">
                    <a target="_blank" href="http://www.tripadvisor.co.uk/"><img src="http://www.tripadvisor.co.uk/img/cdsi/img2/branding/medium-logo-12096-2.png" alt="TripAdvisor" style="border:none;"/></a>
                </div>
                <div style="margin:0; padding:10px 0 8px; border:none; font:bold 14px Arial,Verdana,Tahoma,'Bitstream Vera Sans',sans-serif; color:#2c2c2c; text-align:center; line-height:normal; letter-spacing:0">
                    Review Vbiketours </div>
                <div style="margin:0px 0 0 0; padding:6px 0; border:none; background-color:none; white-space:nowrap;  text-align:center; margin-left:auto; margin-right:auto; position:relative; ">
                    <input type="button" onclick="window.open('https://www.tripadvisor.co.uk/UserReview-g293925-d8091156-m12096-Vbiketours-Ho_Chi_Minh_City.html')" style="border:1px solid #EA9523; border:active:border:none;background:url(http://e2.tacdn.com/img2/sprites/yellow-button.png) 0 0 repeat-x #EA9523;  cursor:pointer; text-decoration:none; outline:none; font: bold 13px Arial,Tahoma,'Bitstream Vera Sans',sans-serif; color:#000; letter-spacing:0; vertical-align:center; text-align:center; width:auto; height:27px; position:relative;" value="Write Review"/> </div>
            </div>
        </div>
    </div>
    <!-- RIGHT COLUMN--> 
  </div>
</div>
