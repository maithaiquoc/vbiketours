<?php include _template."layout/dongchu.php"; ?>

<div id="ja-container" class="wrap ">
  <div class="main clearfix">
    <div id="ja-mainbody" style="width:100%">
        <ul class="breadcrumb">
            <li><a href="">Home</a></li>
            <li><a href="/<?=$com?>.html"><?=ucfirst($com)?></a></li>
        </ul>
      <!-- CONTENT -->
      <div id="ja-main" style="width:100%">
        <div class="inner clearfix">
          <div id="ja-contentwrap" class="">
            <div id="ja-content" class="column" style="width:100%">
              <div id="ja-current-content" class="column" style="width:100%">
                <div class="ja-content-main clearfix">
                  <h1 class="componentheading"> Testimonials</h1>
                  <div class="blog clearfix">
                    <?php

	$maxR=15;
	$maxP=10;

	$d->reset();



	$sql_dep="select photo,mota,id from #_photo where hienthi =1 and com='quangcao'  order by stt,id desc limit 10";





	$d->query($sql_dep);
	$result_tieubieu=$d->result_array();

	//echo $sql_dep;
	$tongsanpham=count($result_tieubieu);
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
$url='testimonials.html/';
$paging=paging_home($result_tieubieu, $url, $curPage, $maxR, $maxP);



	$result_tieubieu=$paging['source'];

	?>
                    <?php

         if(!empty($result_tieubieu)){

		for($j=0,$count_cc=count($result_tieubieu);$j<$count_cc;$j++){

		?>
                    <div class="article_row cols1 clearfix">
                      <div class="article_column column1">
                        <div class="contentpaneopen haveimage clearfix" style="height: 150px">
                          <div class="article-image"> <span><img src="<?=_upload_hinhanh_l.$result_tieubieu[$j]['photo']?>" alt="<?=_upload_hinhanh_l.$result_tieubieu[$j]['photo']?>" width="150" height="150"></span> </div>
                          <div class="article-main">
                            <div class="article-content">
                                <blockquote class="testimonial" style="padding: 20px; text-align: justify; line-height: 1px">
                                    <?=$result_tieubieu[$j]['mota']?>
                                </blockquote>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } }?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- //CONTENT --> </div>
  </div>
</div>

<script>
    window.onload = function(){
        $('span').css("font-size", "inherit");
    }
</script>