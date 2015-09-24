<div class="footer-content-container page-container-responsive">
    <div class="row row-condensed">
      <div class="col-xs-12 col-md-6">
        <div class="language-curr-picker clearfix">
            <div class="col-xs-12 col-md-6">
                <div class="col-xs-12 col-sm-4">
                    <?php
                        $d->reset();
                        $sql_quangcao="select id,link,photo from #_quangcao where hienthi=1 and stt < 7 order by id desc";
                        $d->query($sql_quangcao);
                        $result_quangcao=$d->result_array(); ?>

                        <ul class="foter_ul">
                            <?php if(!empty($result_quangcao)){
                                for($j=0,$count_cc=count($result_quangcao);$j<$count_cc;$j++){ ?>
                                    <li>
                                        <a href="<?=$result_quangcao[$j]['link']?>">
                                            <img src="<?=_upload_duan_l.$result_quangcao[$j]['photo']?>" height="27" width="92">
                                        </a>
                                    </li>
                                <?php }}?>
                        </ul>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?php
                        $d->reset();
                        $sql_quangcao="select id,link,photo from #_quangcao where hienthi=1 and stt >=7 and stt<=12 order by id desc";
                        $d->query($sql_quangcao);
                        $result_quangcao1=$d->result_array(); ?>

                        <ul class="foter_ul">
                            <?php if(!empty($result_quangcao1)){
                                for($j=0,$count_cc=count($result_quangcao1);$j<$count_cc;$j++){ ?>
                                    <li>
                                        <a href="<?=$result_quangcao1[$j]['link']?>">
                                            <img src="<?=_upload_duan_l.$result_quangcao1[$j]['photo']?>" height="27" width="92">
                                        </a>
                                    </li>
                                <?php }}?>
                        </ul>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?php
                        $d->reset();
                        $sql_quangcao="select id,link,photo from #_quangcao where hienthi=1 and stt>12 and stt<19 order by id desc";
                        $d->query($sql_quangcao);
                        $result_quangcao2=$d->result_array(); ?>

                        <ul class="foter_ul">
                            <?php if(!empty($result_quangcao2)){
                                for($j=0,$count_cc=count($result_quangcao2);$j<$count_cc;$j++){ ?>
                                    <li>
                                        <a href="<?=$result_quangcao2[$j]['link']?>">
                                            <img src="<?=_upload_duan_l.$result_quangcao2[$j]['photo']?>" height="27" width="92">
                                        </a>
                                    </li>
                                <?php }}?>
                        </ul>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="row">
                    <iframe class="center-block" src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FVbiketours%2F1468819633364888%3Fref%3Dhl&amp;width=270&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=true&amp;appId=359340147575210" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px; height:258px;" allowTransparency="true"></iframe>
                </div>
            </div>
          </div>
      </div>
      <div class="col-xs-12 col-md-2">
        <h5><b>Company</b></h5>
        <ul class="unstyled list-layout">
          <li><a href="index.html" class="link-contrast">Home</a></li>
          <li><a href="about-us.html" class="link-contrast">About Us</a></li>
          <li><a href="testimonials.html" class="link-contrast">Testimonials</a></li>
          <li><a href="news.html" class="link-contrast">News</a></li>
          <li><a href="link.html" class="link-contrast">Link</a></li>
          <li><a href="faq.html" class="link-contrast">Faq</a></li>
          <li><a href="gallery.html" class="link-contrast">Gallery</a></li>
          <li><a href="contact.html" class="link-contrast">Contact</a></li>
        </ul>
      </div>
      <div class="col-xs-12 col-md-2">
        <h5><b>Our Tour</b></h5>
        <ul class="unstyled list-layout">
        <?php 
			$sql_dep="select ten_$lang, spmoi, id,tenkhongdau from #_product where hienthi =1 and noibat>0 order by stt,id desc limit 9";

	$d->query($sql_dep);
	$result_tieubieu=$d->result_array();
	?>
     <?php

         if(!empty($result_tieubieu)){$index = 0; $totalProduct = count($result_tieubieu);

		for($j=0,$count_cc=count($result_tieubieu);$j<$count_cc;$j++){$index += 1;						

		?>  
          <li><a href="tour/<?=$result_tieubieu[$j]["id"]?>-<?=$result_tieubieu[$j]["tenkhongdau"]?>.html" class="link-contrast"><?=catchuoi($result_tieubieu[$j]["ten_$lang"],420)?> </a></li>
        <?php }}?>
        </ul>
      </div>
      <div class="col-xs-12 col-md-2">
        <h5><b>News</b></h5>
        <ul class="unstyled list-layout">
         <?php

								$d->reset();



								$sql_dep="select ten_$lang,  mota_$lang,ngaytao, id,tenkhongdau, thumb,tinnoibat, photo,nguoitao from #_blog where hienthi =1 order by stt,id desc limit 4";



								$d->query($sql_dep);	



								$result_tinnoibat=$d->result_array();

								

								if(!empty($result_tinnoibat))

								{

									for($j=0,$count_cc=count($result_tinnoibat);$j<$count_cc;$j++)

									{										

											?>
          <li> <a href="news/<?=$result_tinnoibat[$j]['id']?>-<?=$result_tinnoibat[$j]['tenkhongdau']?>.html" class="link-contrast"><?=$result_tinnoibat[$j]["ten_$lang"]?></a></li>
        
          <?php																			

									}

								}

						   ?>

        </ul>
      
      </div>
    </div>
    <div class="col-xs-12 col-sm-12 row-space-4 row-space-top-4">
      <ul class="unstyled list-layout list-inline text-center h5">
        <li><a href="about-us.html" class="link-contrast">About Us</a></li>
          <li><a href="testimonials.html" class="link-contrast">Testimonials</a></li>
          <li><a href="news.html" class="link-contrast">News</a></li>
          <li><a href="link.html" class="link-contrast">Link</a></li>
          <li><a href="faq.html" class="link-contrast">Faq</a></li>
          <li><a href="gallery.html" class="link-contrast">Gallery</a></li>
          <li><a href="contact.html" class="link-contrast">Contact</a></li>
       
      </ul>
   
    </div>
    <hr class="footer-divider row-space-top-8 row-space-4">
    <div class="social-media text-center">
      <h5 class="row-space-4">Join Us On</h5>
      <ul class="unstyled list-layout list-inline">
        <?php



$d->reset();

			$sql_contact = "select * from #_setting ";

			$d->query($sql_contact);

			$row_setting = $d->fetch_array();
			?>
        <li> <a href="<?=$row_setting['facebook_link'] ?>" class="link-contrast footer-icon-container" target="_blank"> <i class="icon footer-icon icon-facebook"></i> </a> </li>
        <li> <a href="<?= $row_setting['googleplus_link'] ?>" class="link-contrast footer-icon-container" target="_blank"> <i class="icon footer-icon icon-google-plus"></i> </a> </li>
        <li> <a href="<?= $row_setting['twitter_link'] ?>" class="link-contrast footer-icon-container" target="_blank"> <i class="icon footer-icon icon-twitter"></i> </a> </li>
<!--        <li> <a href="--><?//= $row_setting['linkedin_link'] ?><!--" class="link-contrast footer-icon-container" target="_blank"> <i class="icon footer-icon icon-linkedin"></i> </a> </li>-->
        
      </ul>
      <div id="copyright" class="row-space-top-2 text-muted"> All right Vbiketour . </div>
    </div>
  </div>