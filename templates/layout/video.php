<?php 
$sql_dep="select ten_vi,ten_en,photo,link from #_video where hienthi=1 and noibat=1 order by stt,ngaytao desc";
	$d->query($sql_dep);
	$tintuc=$d->result_array();
?>

<div class="hide-sm" id="belong-anywhere-wrapper">
<div id="belong-anywhere-container">
<link href="css/skitter.styles.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.animate-colors-min.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.skitter.min.js"></script>
<script src="js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript">
    $(document).ready(function(){
        $('.box_skitter_medium').skitter({
			theme: 'clean',
			animation:'fade',
			dots: true, 
			preview: false,
			numbers_align: 'right'
		});
    });
</script>
<script type="text/javascript" src="./js/html5lightbox.js"></script>
<style type="text/css">
#html5-text {
	color:#333333;
	line-height:24px;
	font-size:16px;
	font-family:Armata, sans-serif, Arial;
	overflow:hidden;
	white-space:nowrap;
}
.html5-error {
	text-align:center;
	color:#ff0000;
	font-size:14px;
	font-family:Arial, sans-serif;
}
</style>
<!--<link rel="stylesheet" type="text/css" href="./css/video.css">-->
  <div id="slider">
            <div class="box_skitter box_skitter_medium">
                <ul>
                          <?php
			   if(count($tintuc)>0){
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>
                    <li>      
                    <a href="<?=$tintuc[$i]['link']?>" class="html5lightbox" title=" <?=$tintuc[$i]['ten_'.$lang]?>" data-group="xovid" data-width="854" data-height="480"><img src="<?=_upload_hinhanh_l.$tintuc[$i]['photo']?>" alt=" <?=$tintuc[$i]['ten_'.$lang]?>" height="200" width="300"></a></li><i class="icon icon-video-play"></i>
                    <?php } }else echo '<p>Content update.</p>';  ?>   
                </ul>
            </div><!--box_skitter-->
            
        </div>
  
  <!--<script type="text/javascript" src="../html5gallery/html5gallery.js"></script>
--> <!-- <div style="display:none;margin:0 auto;" class="html5gallery" data-skin="gallery" data-width="1366" data-height="472" data-resizemode="fill">
	
	
		
	
		<a href="http://www.youtube.com/embed/YE7VzlLtp-4">
        <img src="http://img.youtube.com/vi/YE7VzlLtp-4/2.jpg" alt="Youtube Video"></a>
		
	
		<a href="http://player.vimeo.com/video/1084537?title=0&amp;byline=0&amp;portrait=0">
        <img src="images/Big_Buck_Bunny.jpg" alt="Vimeo Video"></a>
	
	</div>
  </div>--> 
  <!--<ul class="list-unstyled" id="belong-anywhere-slideshow">
   
      <li class="active" id="belong-anywhere">
        <div class="row row-table row-full-height text-center">
          <div class="col-12 col-middle">
            <div class="text-jumbo text-contrast uppercase"> Belong Anywhere </div>
            <div class="h3 text-contrast row-space-3"> See how Airbnb hosts create a sense of belonging around the world </div>
            <a href="#" id="belong-play-button" class="text-contrast text-jumbo link-reset"> <i class="icon icon-video-play"></i> </a> </div>
        </div>
      </li>
      <li id="belo-screen">
        <div class="row row-table row-full-height text-center">
          <div class="col-12 col-middle">
            <div class="text-jumbo text-contrast uppercase"> Introducing the Bélo </div>
            <div class="h3 text-contrast row-space-3"> The story of a symbol of belonging. </div>
            <a id="belo-play-button" class="text-contrast text-jumbo link-reset"> <i class="icon icon-video-play"></i> </a> </div>
        </div>
      </li>
 
      <li id="create-slide">
        
        <a href="https://create.airbnb.com/">
         <img src="./upload/create-02-ea0613ad2b71f988070c439fbe6656f0.png" data-original="https://a1.muscache.com/airbnb/static/homepages/create-02-ea0613ad2b71f988070c439fbe6656f0.png" class="col-center create-hero lazy" style="display: block;">
        <div class="row row-table row-space-top-6">
          <div class="create-body col-center">
           <img src="./upload/create-01-f88796713cb00ae78a2118c826d25f97.png" data-original="https://a1.muscache.com/airbnb/static/homepages/create-01-f88796713cb00ae78a2118c826d25f97.png" class="pull-left lazy" style="display: block;">
            <div class="create-text pull-left row-space-top-2">
              <div class="h2 text-contrast strong"> Make Airbnb Yours </div>
              <div class="h2 text-contrast text-opaque strong"> Create your Symbol, Tell your Story </div>
            </div>
          </div>
        </div>
        </a> </li>
    </ul>
    
    <a href="#" class="slideshow-scroll slideshow-scroll-prev link-reset text-contrast text-jumbo">
     <i class="icon icon-chevron-left"></i> </a> 
     <a href="#" class="slideshow-scroll slideshow-scroll-next link-reset text-contrast text-jumbo"> <i class="icon icon-chevron-right"></i> </a>
 
  </div>--> 
  <!--<div id="belong-video-player" class="fullscreen-video-player hidden">
    <div class="row row-table row-full-height">
      <div class="col-12 col-middle">
        <video preload="none" id="belong-video" class="col-12">
          <source src="//a0.muscache.com/airbnb/static/Belong_p1_v2.mp4" type="video/mp4">
          <source src="//a0.muscache.com/airbnb/static/Belong_p1_v2.webm" type="video/webm">
        </video>
        <i id="play-button-belong" class="media-button icon icon-video-play hide"></i> <a id="close-fullscreen-belong"> <i class="icon icon-remove"></i> </a> </div>
    </div>
  </div>
  <div id="belo-video-player" class="fullscreen-video-player hidden">
    <div class="row row-table row-full-height">
      <div class="col-12 col-middle">
        <video preload="none" id="belo-video" class="col-12">
          <source src="//a0.muscache.com/airbnb/static/belo-3.mp4" type="video/mp4">
          <source src="//a0.muscache.com/airbnb/static/belo-3.webm" type="video/webm">
        </video>
        <i id="play-button-belo" class="media-button icon icon-video-play hide"></i> <a id="close-fullscreen-belo"> <i class="icon icon-remove"></i> </a> </div>
    </div>
  </div>--> 
  
</div>
