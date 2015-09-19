<?php

$maxR=15;
$maxP=10;

$d->reset();



$sql_dep="select ten_$lang, spmoi, mota_$lang, id,tenkhongdau, gia, thumb, photo,size from #_product where hienthi =1 and noibat>0 order by stt,id desc limit 12";
$d->query($sql_dep);
$result_tieubieu=$d->result_array();

//echo $sql_dep;
$tongsanpham=count($result_tieubieu);
$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
$url='index.html/';
$paging=paging_home($result_tieubieu, $url, $curPage, $maxR, $maxP);



$result_tieubieu=$paging['source'];?>
<div class="row-space-top-8 row-space-8">
    <div class="section-intro text-center">
        <h2 class="strong" style="font-size: 32px;">Our Tour</h2>

    </div>
</div>
<ul class="community-container col-center list-unstyled row">
    <!--neu chon 4 khung thi chon col-md-3,neu chon 2 khung thi chon col-md-6,neu chon 3 khung thi chon col-md-4,neu chon 1 khung thi chon col-md-12-->
    <?php

    if(!empty($result_tieubieu)){$index = 0; $totalProduct = count($result_tieubieu);

        for($j=0,$count_cc=count($result_tieubieu);$j<$count_cc;$j++){$index += 1;
            ?>
            <?php if($result_tieubieu[$j]['size']==1){?>
                <li class="col-xs-12 col-md-3 col-lg-3 row-space-4 transition-delay-100">
                    <a href="tour/<?=$result_tieubieu[$j]['id']?>-<?=$result_tieubieu[$j]['tenkhongdau']?>.html" class="darken-on-hover-container community-photo-card traveling-card panel-image media-photo link-reset text-center aTourLink">
                        <div style="background:url(<?=_upload_product_l.$result_tieubieu[$j]['photo']?>) no-repeat" class="media-cover background-traveling-card-lazy darken-on-hover"></div>
                        <div class="row row-table row-full-height">
                            <div class="col-sm-12 col-center col-bottom">
                                <div class="divTourDes">
                                    <div class="h2 text-center text-contrast strong"> <?=catchuoi($result_tieubieu[$j]["ten_$lang"],420)?> </div>
                                    <p class="text-center text-contrast"><?= catchuoi(str_replace("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","",strip_tags($result_tieubieu[$j]["mota_$lang"],"")),100) ?> <br>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-contrast text-center strong darken-on-hover"> <?=number_format($result_tieubieu[$j]["gia"],0,",",".")?> $ </div>
                    </a>
                </li>
            <?php }else if($result_tieubieu[$j]['size']==2){?>
                <li class="col-xs-12 col-md-6 col-lg-6 row-space-4 transition-delay-700">
                    <a href="tour/<?=$result_tieubieu[$j]['id']?>-<?=$result_tieubieu[$j]['tenkhongdau']?>.html" class="darken-on-hover-container panel-image media-photo link-reset community-photo-card hosting-card text-center aTourLink">
                        <div class="media-cover background-hosting-card-lazy darken-on-hover background-hosting-card"  style="background:url(<?=_upload_product_l.$result_tieubieu[$j]['photo']?>) no-repeat;"></div>
                        <div class="row row-table row-full-height">
                            <div class="col-sm-10 col-center col-bottom">
                                <div class="divTourDes">
                                    <div class="h2 text-center text-contrast strong"> <?=catchuoi($result_tieubieu[$j]["ten_$lang"],420)?> </div>
                                    <p class="text-center text-contrast"><?= catchuoi(str_replace("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","",strip_tags($result_tieubieu[$j]["mota_$lang"],"")),90) ?> <br>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-contrast text-center strong darken-on-hover"><?=number_format($result_tieubieu[$j]["gia"],0,",",".")?> $ </div>
                    </a> </li>
            <?php }else if($result_tieubieu[$j]['size']==3){?>
                <li class="col-xs-12 col-md-12 col-lg-9 row-space-4 transition-delay-700">
                    <a href="tour/<?=$result_tieubieu[$j]['id']?>-<?=$result_tieubieu[$j]['tenkhongdau']?>.html" class="darken-on-hover-container panel-image media-photo link-reset community-photo-card hosting-card text-center aTourLink">
                        <div class="media-cover background-hosting-card-lazy darken-on-hover background-hosting-card"  style="background:url(<?=_upload_product_l.$result_tieubieu[$j]['photo']?>) no-repeat"></div>
                        <div class="row row-table row-full-height">
                            <div class="col-sm-12 col-center col-bottom">
                                <div class="divTourDes">
                                    <div class="h2 text-center text-contrast strong"> <?=catchuoi($result_tieubieu[$j]["ten_$lang"],420)?> </div>
                                    <p class="text-center text-contrast"><?= catchuoi(str_replace("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","",strip_tags($result_tieubieu[$j]["mota_$lang"],"")),100) ?> <br>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-contrast text-center strong darken-on-hover"><?=number_format($result_tieubieu[$j]["gia"],0,",",".")?> $ </div>
                    </a> </li>
            <?php }else if($result_tieubieu[$j]['size']==4){?>
                <li class="col-xs-12  col-md-12 col-lg-12 row-space-4 transition-delay-700">
                    <a href="tour/<?=$result_tieubieu[$j]['id']?>-<?=$result_tieubieu[$j]['tenkhongdau']?>.html" class="darken-on-hover-container panel-image media-photo link-reset community-photo-card hosting-card text-center aTourLink">
                        <div class="media-cover background-hosting-card-lazy darken-on-hover background-hosting-card"  style="background:url(<?=_upload_product_l.$result_tieubieu[$j]['photo']?>) no-repeat"></div>
                        <div class="row row-table row-full-height">
                            <div class="col-sm-12 col-center col-bottom">
                                <div class="divTourDes">
                                    <div class="h2 text-center text-contrast strong"> <?=catchuoi($result_tieubieu[$j]["ten_$lang"],420)?> </div>
                                    <p class="text-center text-contrast"><?= catchuoi(str_replace("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","",strip_tags($result_tieubieu[$j]["mota_$lang"],"")),100) ?> <br>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-contrast text-center strong darken-on-hover"><?=number_format($result_tieubieu[$j]["gia"],0,",",".")?> $ </div>
                    </a> </li>
            <?php }?>
        <?php }}?>


</ul>