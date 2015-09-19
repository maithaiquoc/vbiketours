

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
					

<?php



$d->reset();

			$sql_contact = "select * from #_setting ";

			$d->query($sql_contact);

			$row_setting = $d->fetch_array();
			?>




<div class="article-content">

<?=@$gioithieu["ten"]?>
</div>



				</div>
				
								
				
			</div>

			
		</div>
		
			</div>

	
</div>
<div class="sharethis_zone">
                      <hr>
                      <p class="addthis_desc">Share this with your friends</p>
                      <div class="addthis_toolbox addthis_default_style">
                      <a href="<?=$row_setting['facebook_link'] ?>" target="_blank">
						<img src="images/Facebook.png" alt="Facebook"  style="width:32px !important;;height:32px !important;" /></a>
                      
                      <a href="<?= $row_setting['twitter_link'] ?>" target="_blank" >
					<img src="images/twitter.png" alt="Twitter"  style="width:32px !important;;height:32px !important;"  />
						</a>
                      
                      <a href="<?= $row_setting['googleplus_link'] ?>" target="_blank">

 <img src="images/Google+.png" alt="Google" style="width:32px !important;;height:32px !important;" />

</a>



<a href="<?= $row_setting['linkedin_link'] ?>" target="_blank">

<img src="images/linkedin_32.png" alt="linkedin"  style="width:32px !important;;height:32px !important;" />

</a>
                        <div class="atclear"></div>
                      </div>
                    </div>
</div>
<!-- //CONTENT -->					</div>

			
	</div>
	</div>