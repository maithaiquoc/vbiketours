<?php
	$d->reset();
	$sql_video1="select ten_vi,ten_en,photo,link from #_video where hienthi=1 order by stt,id desc limit 0,1";
	$d->query($sql_video1);
	$result_video1=$d->result_array();
	
	$d->reset();
	$sql_tin1="select tenkhongdau,ten_vi,ten_en,mota_en,mota_vi,id,thumb from #_news where hienthi=1 order by stt,id desc limit 0,1";
	$d->query($sql_tin1);
	$result_tin1=$d->result_array();
	
	$d->reset();
	$sql_tin2="select tenkhongdau,ten_vi,ten_en,id from #_news where hienthi=1 order by stt,id desc limit 1,5";
	$d->query($sql_tin2);
	$result_tin2=$d->result_array();
	
	$d->reset();
	$sql_yahoo="select ten,yahoo from #_yahoo where hienthi=1 order by stt,id desc";
	$d->query($sql_yahoo);
	$result_yahoo=$d->result_array();
	
	$d->reset();
	$sql_hotline="select dienthoai,didong from #_hotline limit 0,1";
	$d->query($sql_hotline);
	$hotline=$d->fetch_array();
?>
<div class="box_1">
	<div class="title"><a href="<?=$lang?>/video-clip.html">Video clip</a></div>
    <div class="content">
      <?php for($i=0,$count_video1=count($result_video1);$i<$count_video1;$i++){ ?>
      <div class="box_player"><embed width="230" height="200" wmode="Transparent" src="images/player.swf" allowscriptaccess="always" allowfullscreen="true" flashvars="height=200&amp;width=230&amp;skin=images/modieus.swf&amp;file=<?=$result_video1[$i]['link']?>&amp;autostart=false&amp;controlbar=over&amp;backcolor=0x000000&amp;frontcolor=0xFFFFFF&amp;lightcolor=0xFFFFFF&amp;image=<?=_upload_hinhanh_l.$result_video1[$i]['photo']?>"></div>
      <?php } ?>
    </div>
</div>
<div class="box_2">
	<div class="title"><a href="<?=$lang?>/tin-tuc.html"><?=_tintucmoi?></a></div>
     <div class="content">
     	<?php for($i=0,$count_tin1=count($result_tin1);$i<$count_tin1;$i++){ ?>
        <div class="box_news1">
        	<a href="<?=$lang?>/<?=$result_tin1[$i]['id']?>/<?=$result_tin1[$i]['tenkhongdau']?>.html"><img src="<?=_upload_tintuc_l.$result_tin1[$i]['thumb']?>" border="0" /></a>
            <h1><a href="<?=$lang?>/tin-tuc/<?=$result_tin1[$i]['id']?>/<?=$result_tin1[$i]['tenkhongdau']?>.html"><?=$result_tin1[$i]['ten_'.$lang]?></a></h1>
           <?=catchuoi($result_tin1[$i]['mota_'.$lang],110)?>
        </div>
        <?php } ?>
        <ul>
        		<?php for($i=0,$count_tin2=count($result_tin2);$i<$count_tin2;$i++){ ?>
	            <li><a href="<?=$lang?>/tin-tuc/<?=$result_tin2[$i]['id']?>/<?=$result_tin2[$i]['tenkhongdau']?>.html"><?=catchuoi($result_tin2[$i]['ten_'.$lang],70)?></a></li>
                <?php } ?>
        </ul>
     
     </div>
</div>
<div class="box_3">
	<div class="title"><?=_hotrotructuyen?></div>
     <div class="content">
     	<div class="box_support">
        	<h1><?=_hotrovatuvan?></h1>
            <ul>
            	<?php for($i=0,$count_yahoo=count($result_yahoo);$i<$count_yahoo;$i++){ ?>
                <li><a href="ymsgr:sendIM?<?=$result_yahoo[$i]['yahoo']?>"><img border="0" src="http://opi.yahoo.com/online?u= <?=$result_yahoo[$i]['yahoo']?>&amp;m=g&amp;t=1"></a><br/><?=$result_yahoo[$i]['ten']?></li><?php } ?>
            </ul>
        </div>
        <div class="box_info">
        	<h1><?=$row_title['ten_'.$lang]?></h1>
            <div class="hotline">
            		<?php $array_hotline=explode(",", $hotline['dienthoai']); for($i=0,$count_hl=count($array_hotline);$i<$count_hl;$i++) { echo $array_hotline[$i].'<br/>'; } ?>
            </div>
            Email: nvkiem33@yahoo.com.vn
        </div>
     </div>
</div>