
<?php include _template."layout/dongchu.php"; ?>

<link rel="stylesheet" href="../css/AdmirorGallery.css" type="text/css">
<link rel="stylesheet" href="../css/template.css" type="text/css">
<link rel="stylesheet" href="../css/albums.css" type="text/css">
<link rel="stylesheet" href="../css/pagination.css" type="text/css">
<link rel="stylesheet" href="../css/slimbox2.css" type="text/css">
<script type="text/javascript" src="../js/AG_jQuery.js"></script>
<script type="text/javascript" src="../js/slimbox2.js"></script>

<script type="text/javascript" src="../js/html5lightbox.js"></script>



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
<div id="ja-container" class="wrap container-fluid">
    <div class="main clearfix">
        <div id="ja-mainbody" style="width:100%">
            <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href="/<?=$com?>.html"><?=ucfirst($com)?></a></li>
            </ul>
            <!-- CONTENT -->
            <div id="ja-main" style="width:100%">
                <div class="inner clearfix">
                    <div class="ja-mass ja-mass-top clearfix">
                        <div class="ja-moduletable moduletable_video_zone  clearfix" id="Mod81">
                            <div class="ja-box-ct clearfix">
                                <h1 class="componentheading">Video Clips</h1>
                                <div class="pvideo">
                                    <?php
                                    $d->reset();

                                    $sql_newvideo="select ten_$lang,link,id,photo,thumb,tenkhongdau from #_video where hienthi =1  order by ngaytao desc";

                                    $d->query($sql_newvideo);

                                    $result_video=$d->result_array();

                                    if(count($result_video)>0){
                                        for($i=0,$count_video=count($result_video);$i<$count_video;$i++){
                                            ?>
                                            <div class="pv-item">
                                                <div class="pvi-video">
                                                    <a href="<?=$result_video[$i]['link']?>" class="html5lightbox" title=" <?=$result_video[$i]['ten_'.$lang]?>" data-group="xovid" data-width="854" data-height="480"><img src="<?=_upload_hinhanh_l.$result_video[$i]['thumb']?>" alt=" <?=$result_video[$i]['ten_'.$lang]?>" height="200" width="300"></a> </div>
                                                <div class="pvi-title"> <?=$result_video[$i]['ten_'.$lang]?></div>
                                                <div class="div-video-play div-video-play-gallery" onclick="$(this).parent().find('a').click();"></div>
                                            </div>
                                        <?php } ?>
                                    <?php }else{echo "<p class='text-center'>There's no video now...</p>";} ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h1 class="componentheading">Photo Collections</h1>
                    <?php

                    $d->reset();

                    $sql_newitem="select ten_$lang,noidung_$lang, id,photo,thumb,tenkhongdau from #_duan where hienthi =1  order by ngaytao desc";

                    $d->query($sql_newitem);

                    $result_tintuc=$d->result_array();

                    if(!empty($result_tintuc)){ ?>
                        <div id="AG_090" class="ag_reseter AG_classic">
                            <table cellspacing="0" cellpadding="0" border="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <?php
                                            if(!empty($result_tintuc)){
                                                foreach($result_tintuc as $item_ha){ ?>
                                                    <div class="ag_thumbclassic spanPhotoCollection">
                                                        <a href="<?=_upload_duan_l,$item_ha['photo']?>" title="Click to view" class="" rel="lightbox[AdmirorGallery090]" target="_blank">
                                                            <img src="<?=_upload_duan_l,$item_ha['thumb']?>" alt="<?=_upload_duan_l,$item_ha['ten']?>" class="img-responsive">
                                                        </a>
                                                        <br/>
                                                        <p class="pPhotoCollection"><a href="/photos/<?=$item_ha['id']?>-<?=$item_ha['tenkhongdau']?>.html"><?=$item_ha['ten_'.$lang]?></a></p>
                                                    </div>
                                                <?php }}else{echo "<p class='text-center'>There are no images here...</p>";}?>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- //CONTENT --> </div>
    </div>
</div>

<script type="text/javascript">
    //<![CDATA[
    function AG_form_submit_90(galleryIndex,paginPage,albumFolder,linkID) {
        var AG_URL="<?=$row_detail["tenkhongdau"]?>.html";
        var split = AG_URL.split("AG_MK=0");
        if(split.length==3){
            AG_URL = split[0]+split[2];
        }
        var char = AG_URL.charAt((AG_URL.length)-1);
        if ((char != "?") && (char != "&"))
        {
            AG_URL += (AG_URL.indexOf("?")<0) ? "?" : "&";
        }
        AG_URL+="AG_MK=0&";
        AG_jQuery(".ag_hidden_ID").each(function(index) {
            var paginInitPages=eval("paginInitPages_"+AG_jQuery(this).attr('id'));
            var albumInitFolders=eval("albumInitFolders_"+AG_jQuery(this).attr('id'));
            if(AG_jQuery(this).attr('id') == "ag90"){
                var paginInitPages_array = paginInitPages.split(",");
                paginInitPages_array[galleryIndex] = paginPage;
                paginInitPages = paginInitPages_array.toString();
                var albumInitFolders_array = albumInitFolders.split(",");
                albumInitFolders_array[galleryIndex] = albumFolder;
                albumInitFolders = albumInitFolders_array.toString();
            }
            AG_URL+="AG_form_paginInitPages_"+AG_jQuery(this).attr('id')+"="+paginInitPages+"&";
            AG_URL+="AG_form_albumInitFolders_"+AG_jQuery(this).attr('id')+"="+albumInitFolders+"&";
        });
        AG_URL+="AG_form_scrollTop"+"="+AG_jQuery(window).scrollTop()+"&";
        AG_URL+="AG_form_scrollLeft"+"="+AG_jQuery(window).scrollLeft()+"&";
        AG_URL+="AG_MK=0";
        window.open(AG_URL,"_self");
    }
    //]]>
</script>

<span class="ag_hidden_ID" id="ag90"></span>