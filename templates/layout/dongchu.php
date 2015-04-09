<?php
    $_SESSION['status'] = "";

	$d->reset();

	$sql_slider = "select ten_vi from #_yahoo where hienthi=1  order by stt,id desc";

	$d->query($sql_slider);

	$result_slider=$d->result_array();
?>
<div class="hide-sm" id="community-wrapper">
  <div class="ja-moduletable moduletable  clearfix" id="Mod76">
    <div class="ja-box-ct clearfix">
      <div class="ja-healineswrap ja_cfl_rss_overall">
        <div class="ja_cfl_rss_title_left"></div>
        <div class="ja_cfl_rss_title"><strong>Headlines</strong></div>
        <div class="ja_cfl_rss_title_right"></div>
        <div id="jalh-modid76" class="ja_cfl_rss_body">
          <!-- HEADLINE CONTENT -->
          <?php

		for($i=0,$count_slider=count($result_slider);$i<$count_slider;$i++){
	?>
          <div class="ja-headlines-item jahl-verticald ja_cfl_rss_div" style="color: #d63588; visibility: hidden; padding: 10px 0px; margin: 0px auto; z-index: 2; width: 903px; zoom: 1; opacity: 0; top: 0px;"> <?=@$result_slider[$i]['ten_vi']?> </div>
          <?php }?>
          <!-- //HEADLINE CONTENT -->
        </div>
      </div>
      <script type="text/javascript">
// options setting
var options = { box:$('jalh-modid76'),
				items: $$('#jalh-modid76 .ja-headlines-item'),
				mode: 'verticald',
				wrapper:$('jahl-wapper-items-jalh-modid76'),
				buttons:{next: $$('.ja-headelines-next'), previous: $$('.ja-headelines-pre')},
				interval:4000,
				fxOptions : { duration: 1000,
							  transition: Fx.Transitions.linear ,
							  wait: false }	};

var jahl = new JANewSticker( options );
</script> </div>
  </div>
</div>