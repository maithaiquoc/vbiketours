
<?php include _template."layout/dongchu.php"; ?>

<link rel="stylesheet" href="./css/AdmirorGallery.css" type="text/css">
<link rel="stylesheet" href="./css/template.css" type="text/css">
<link rel="stylesheet" href="./css/albums.css" type="text/css">
<link rel="stylesheet" href="./css/pagination.css" type="text/css">
<link rel="stylesheet" href="./css/slimbox2.css" type="text/css">
<script type="text/javascript" src="./js/AG_jQuery.js"></script>
<script type="text/javascript" src="./js/slimbox2.js"></script>

<script type="text/javascript" src="./js/html5lightbox.js"></script>



<!--<link rel="stylesheet" type="text/css" href="./css/video.css">-->


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
<div id="ja-container" class="wrap ">
    <div class="main clearfix">
        <div id="ja-mainbody" style="width:100%">
            <!-- CONTENT -->
            <div id="ja-main" style="width:100%">
                <div class="inner clearfix">
                    <?php if(count($tintuc)>0){ ?>
                    <div class="ja-mass ja-mass-top clearfix">
                        <div class="ja-moduletable moduletable_video_zone  clearfix" id="Mod81">
                            <div class="ja-box-ct clearfix">
                                <h1 class="componentheading">Video Clips</h1>
                                <div class="pvideo">
                                    <?php
                                        for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
                                            ?>
                                            <div class="pv-item">
                                                <div class="pvi-video">
                                                    <a href="<?=$tintuc[$i]['link']?>" class="html5lightbox" title=" <?=$tintuc[$i]['ten_'.$lang]?>" data-group="xovid" data-width="854" data-height="480"><img src="<?=_upload_hinhanh_l.$tintuc[$i]['photo']?>" alt=" <?=$tintuc[$i]['ten_'.$lang]?>" height="200" width="300"></a> </div>
                                                <div class="pvi-title"> <?=$tintuc[$i]['ten_'.$lang]?></div>
                                            </div>
                                        <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php

                    $d->reset();

                    $sql_newitem="select ten_$lang,noidung_$lang, id,photo,thumb,tenkhongdau from #_duan where hienthi =1  order by stt,id desc";

                    $d->query($sql_newitem);

                    $result_tintuc=$d->result_array();

                    if(!empty($result_tintuc)){

                    ?>
                    <div id="ja-contentwrap" class="">
                        <div id="ja-content" class="column" style="width:100%">
                            <div id="ja-current-content" class="column" style="width:100%">
                                <div class="ja-content-main clearfix">
                                    <h1 class="componentheading_gallery"> Photo Gallery</h1>
                                    <div class="blog_gallery clearfix">
                                        <div class=" article_row_gallery  cols2 clearfix" style="border-bottom:none;">

                                                <?php

                                                foreach($result_tintuc as $item_pro_new){

                                                    ?>
                                                    <div class="article_column  <?php if($j%2!==0) echo 'column2'?> <?php if($j%2==0) echo 'column1'?>">
                                                        <div class="gallery_photos_list clearfix">
                                                            <div class="gallery-image"> <a href="photos/<?=$item_pro_new["id"]?>-<?=$item_pro_new["tenkhongdau"]?>.html" class="contentpagetitle_gallery"> <img src="<?=_upload_duan_l,$item_pro_new["photo"]?>" class="gallery_photos" alt="" title=""> </a> </div>
                                                            <div class="gallery-main clearfix">
                                                                <h3 class="gallery_photos_title"> <a href="photos/<?=$item_pro_new["id"]?>-<?=$item_pro_new["tenkhongdau"]?>.html" class="contentpagetitle_gallery">
                                                                        <?=$item_pro_new["ten_$lang"]?>
                                                                    </a> </h3>
                                                                <div class="gallery_photos_intro">
                                                                    <?=@$item_pro_new["noidung_$lang"]?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- //CONTENT --> </div>
    </div>
</div>
