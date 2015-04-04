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

<div class="right">

                    <div class="news_right">

					 <?php  if($lang == "vi"){  ?>

                        <p class="title_news" align="center"><?=_tintucmoinhat?></p>

						<?php

							$d->reset();

							$sql_tintuc_new = "select ten_$lang,tenkhongdau,mota_$lang,thumb,id,ngaytao,luotxem,nguoitao from #_news where hienthi=1 order by stt,ngaytao desc limit 0,3";

							$d->query($sql_tintuc_new);	

							$result_tintuc_tieubieu=$d->result_array();

							if(count($result_tintuc_tieubieu)>0){

						?>

						<ul class="new-right-news">

						<?php

								for($i=0,$count_tintuc_noibac=count($result_tintuc_tieubieu);$i<$count_tintuc_noibac;$i++){

						?>

						

							<li><img src="<?=_upload_tintuc_l.$result_tintuc_tieubieu[$i]['thumb']?>">

                             <a href="tin-tuc/<?=$result_tintuc_tieubieu[$i]['id']?>-<?=$result_tintuc_tieubieu[$i]['tenkhongdau']?>.html"><h3>

                                <?=$result_tintuc_tieubieu[$i]["ten_$lang"]?> 

                                </h3></a>

                                <p class="date">

                                <?=date('d-m-Y h:i:s A',$result_tintuc_tieubieu[$i]['ngaytao'])?> by <a href="#"> <?=$result_tintuc_tieubieu[$i]["nguoitao"]?> </a>

                                </p>

                                <p class="des_new">



<?= catchuoi(strip_tags($result_tintuc_tieubieu[$i]["mota_$lang"],""),80) ?>   

                                </p>     

                            </li>  						

						<?php

								}

						?>

						</ul>							

						<p class="read_more"><a href="tin-tuc.html"><?=_xemthem?>...</a></p>

						<?php

							}

							else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';								

						?>

						<?php																			

									}else{?>

									

						    <ul class="home_new-right">

<?php

	$d->reset();

	$sql_dep="select ten_$lang, spmoi, mota_$lang, id,tenkhongdau, gia, thumb, photo from #_product where hienthi =1 and noibat>0 order by stt,id desc limit 3";

	$d->query($sql_dep);

	$result_tieubieu=$d->result_array();

	if(!empty($result_tieubieu))

	{

		for($j=0,$count_cc=count($result_tieubieu);$j<$count_cc;$j++) 

		{	

	?>

	<li>

<img src="<?=_upload_product_l.$result_tieubieu[$j]['photo']?>" />

<a href="san-pham/<?=$result_tieubieu[$j]['id']?>-<?=$result_tieubieu[$j]['tenkhongdau']?>.html"><h3><?=$result_tieubieu[$j]["ten_$lang"]?></h3></a> 

<p class="des_new">



<?= catchuoi(str_replace("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","",strip_tags($result_tieubieu[$j]["mota_$lang"],"")),90) ?>    

</p>  

</li>

	<?php																			

		} 

	}

	?>

						

	 </ul><p class="read_more"><a href="san-pham.html"><?=_docthem?>...</a></p>

<?php																			

									}

						   ?>

                    </div>					

					

					

                    <div class="new_blog">

                        <p class="title_news"><?=_blogcamnhan?></p>

                        <ul class="blog-right">

							<?php

								$d->reset();



								$sql_dep="select ten_$lang,  mota_$lang,ngaytao, id,tenkhongdau, thumb,tinnoibat, photo from #_blog where hienthi =1 order by stt,id desc limit 3";



								$d->query($sql_dep);	



								$result_blog=$d->result_array();

								

								if(!empty($result_blog))

								{

									for($j=0,$count_cc=count($result_blog);$j<$count_cc;$j++)

									{										

											?>

												<li>

													<a href="blog/<?=$result_blog[$j]['id']?>-<?=$result_blog[$j]['tenkhongdau']?>.html">

													<img src="<?="upload/news/".$result_blog[$j]['photo']?>" />													

													<p class="des_blog">

														<?=catchuoi($result_blog[$j]["ten_$lang"],60)?>   

													</p> 

													</a>													      

												</li>

											<?php																			

									}

								}

						   ?>                         

                        </ul>

                    </div>

                   				

             <div class="home_box_facebook"  style="margin-top:20px;">      

                   <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FMyphamsacviet%2F1411063722473649%3Fskip_nax_wizard%3Dtrue%23&amp;width=136&amp;height=220&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:340px; height:220px;" allowTransparency="true"></iframe>



                    </div>
                    
                    
                    <div style="width:100%;nargin-top:5px;">

<a href="http://www.linkedin.com/profile/view?id=283836781&trk=nav_responsive_tab_profile_pic" target="_blank">



<img src="images/linkedin_32.png" alt="linkedin" />



</a>

<a href="https://twitter.com/myphamsacviet" target="_blank">



<img src="images/twitter.png" alt="Twitter" />



</a>

</div>
                    

<a href="<?= $row_setting['googleplus_link'] ?>" target="_blank">

<div class="pPc DMc" id="___page_15" style="left: 114.5px; top: 207px; text-indent: 0px; margin: 0px; padding: 0px; background-color: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 340px; height: 106px; background-position: initial initial; background-repeat: initial initial;"><iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 340px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 106px;" tabindex="0" vspace="0" width="100%" id="I14_1390608862646" name="I14_1390608862646" src="https://apis.google.com/u/0/_/widget/render/page?usegapi=1&amp;bsv=o&amp;width=340&amp;href=https%3A%2F%2Fplus.google.com%2F110760234552216976671&amp;layout=landscape&amp;showcoverphoto=1&amp;showtagline=1&amp;origin=https%3A%2F%2Fapis.google.com&amp;gsrc=3p&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en_GB.BYNDe7gdDGY.O%2Fm%3D__features__%2Fam%3DIQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAItRSTPBmjOmWcnqNVcgx_JiXkhLfJq5YA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh&amp;id=I14_1390608862646&amp;parent=https%3A%2F%2Fapis.google.com&amp;pfname=%2FI0_1390606296660&amp;rpctoken=38599031" data-gapiattached="true" title="+Badge"></iframe></div>

</a>

<br />

<!--

<div style="width:100%;load:left;margin-left:20px">

<a href="<?= $row_setting['linkedin_link'] ?>" target="_blank">

<img style="width:42px;margin:3px" src="images/linken.jpg"></img></a>

<a href="<?= $row_setting['facebook_link'] ?>" target="_blank">

<img style="width:42px;margin:3px" src="images/Facebook-Icon.png"></img></a>



<a href="<?= $row_setting['googleplus_link'] ?>" target="_blank">

<img style="width:42px;margin:3px" src="images/google_plus_bloggiks.png"></img></a>

<a href="<?= $row_setting['twitter_link'] ?>" target="_blank">

<img style="width:42px;margin:3px" src="images/twitter.png"></img></a>

</div>

-->





                    <div class="videoo_right" style="margin-top:10px;">

                        <p class="title_news">VIDEO</p>

                        <ul class="videoo">

                            <li>
<div id="ytvideoPlayer"></div><ul class="playerList">
<?php

							$d->reset();

							$sql_video="select * from #_video where hienthi =1 order by id desc";

							$d->query($sql_video);	

							$result_video=$d->result_array();

							if(!empty($result_video))

							{

							for($j=0,$count_cc=count($result_video);$j<$count_cc;$j++)

							{

							?>
<li><a href="<?=$result_video[$j]['link'] ?>">Video 1</a></li>
							<?php
							}
							}else

							echo '<a href="" style="display:block;width:100%;height:280px"  id="player">  </a>';

							?>     

                            </ul></li> 

                        </ul>

                    </div>

                    <div class="picture">

                        <p class="title_news"><?=_hinhanh?></p>

                        <ul class="picture_right">

                            <?php

$d->reset();

$sql_bst="select id_list,id_cat,id_item,id,photo,thumb, masp, gia, ten_$lang,tenkhongdau,ngaytao,noidung_$lang from #_duan where hienthi=1 order by id desc limit 0,4";

$d->query($sql_bst);	

$result_bst=$d->result_array();

if(!empty($result_bst))

{

for($j=0,$count_cc=count($result_bst);$j<$count_cc;$j++)

{		

?>

<li>

<a href="hinh-anh/<?=$result_bst[$j]['id']?>-<?=$result_bst[$j]['tenkhongdau']?>.html">

<img src="<?=_upload_duan_l.$result_bst[$j]['photo']?>" style="width:45%;height: 200px; "/>

</a>

</li>

<?php

}}

?>

                        </ul>

                    </div>

                    <div class="marketing">

                        <p class="title_news"><?=_quangcao?></p>

                        <ul class="marketing_right">

                            <?php

$d->reset();

$sql_quangcao="select id,link,photo from #_quangcao where hienthi=1 order by id desc";

$d->query($sql_quangcao);	

$result_quangcao=$d->result_array();

if(!empty($result_quangcao))

{

for($j=0,$count_cc=count($result_quangcao);$j<$count_cc;$j++)

{		

?>

<li>

<a href="<?=$result_quangcao[$j]['link']?>">

 <?php

if (strpos($result_quangcao[$j]['photo'],'swf') == true){

?>

<object width="340" codebase="http://active.macromedia.com/flash4/cabs/swflash.cab#version=4,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">

              <param NAME="_cx" VALUE="13414">

              <param NAME="_cy" VALUE="6641">

              <param NAME="FlashVars" VALUE>

              <param NAME="Movie" VALUE="<?=_upload_duan_l.$result_quangcao[$j]['photo']?>">

              <param NAME="Src" VALUE="<?=_upload_duan_l.$result_quangcao[$j]['photo']?>">

              <param NAME="Quality" VALUE="High">

              <param NAME="AllowScriptAccess" VALUE>

              <param NAME="DeviceFont" VALUE="0">

              <param NAME="EmbedMovie" VALUE="0">

              <param NAME="SWRemote" VALUE>

              <param NAME="MovieData" VALUE>

              <param NAME="SeamlessTabbing" VALUE="1">

              <param NAME="Profile" VALUE="0">

              <param NAME="ProfileAddress" VALUE>

              <param NAME="ProfilePort" VALUE="0">

              <param NAME="AllowNetworking" VALUE="all">

              <param NAME="AllowFullScreen" VALUE="false">

              <param name="scale" value="ExactFit">

             <embed src="<?=_upload_duan_l.$result_quangcao[$j]['photo']?>" quality="High" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" width="340" scale="ExactFit"></embed>

            </object>

<?php

}else{

?>

       <img src="<?=_upload_duan_l.$result_quangcao[$j]['photo']?>" style="width:340px" />



 <?php } ?> 

</a>

</li>

<?php

}}

?> 

                        </ul>

                    </div>

        	</div>