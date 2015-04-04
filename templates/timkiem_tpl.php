<style type="text/css">
table#layout {
	font-size: 100%;
	width: 100%;
	table-layout: fixed;
}
table#layout {
	font-size: 100%;
	width: 100%;
}
td#middle {
	vertical-align: top;
	width: 70%;
	padding: 10px 15px;
}
div.post, div.page {
	display: block;
	margin: 0 0 30px 0;
}
td#right {
vertical-align: top;
border-left: dashed 1px #CCCCCC;
padding: 10px 10px 10px 10px;
background: #ffffff;
}
.newblog img {
text-align: left;
float: left;
width: 32%;
padding-right: 25px;
}
.newblog li {
margin-top: 20px;
float: left;
width: 100%;
padding-bottom: 20px;
border-bottom: 1px dashed #ccc;
}
</style>
<div id="ja-container" class="wrap ja-r1">
  <div class="main clearfix">
    <div id="ja-mainbody" style="width:90%">
      <table>
        <tr id="bodyrow"> 
          
          <!-- Main Column -->
          <td id="middle">
          <div class="post-1395 post type-post status-publish format-standard hentry category-travel-tips category-xo-tours tag-copycat tag-fake tag-hanoi tag-motorbike-tours tag-scam tag-unsafe tag-xo-tours odd" id="post-1395">
              <div class="post-headline">
                <ul class="newblog">

					<?php

	

		   if(count($product)>0){



		   for($i=0,$count_tintuc=count($product);$i<$count_tintuc;$i++){



	   ?>
<?php if($product[$i]['mode'] == 0) { ?>
			<li>

							<img src="<?="upload/product/".$product[$i]['thumb']?>" alt="banner" title="" style="margin-top:7px;">

																	

								<h2>    <a class="blog_name"href="tour/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten_'.$lang]?></a> </h3>

								<p class="date">

									<?=date('M D,Y',$product[$i]['ngaytao'])?> 

								</p>

								<p class="des_new">

									<?=$product[$i]["mota_$lang"]?>  

								</p>

			

				

				  

			</li>
            <?php }?>
            <?php if($product[$i]['mode'] == 2) { ?>
			<li>

							<img src="<?="upload/news/".$product[$i]['thumb']?>" alt="banner" title="" style="margin-top:7px;">

																	

								<h2>    <a class="blog_name"href="news/<?=$product[$i]['id']?>-<?=$product[$i]['tenkhongdau']?>.html"><?=$product[$i]['ten_'.$lang]?></a> </h3>

								<p class="date">

									<?=date('M D,Y',$product[$i]['ngaytao'])?> by <a href="javascript:;"><?=$product[$i]["nguoitao"]?>  



</a>

								</p>

								<p class="des_new">

									<?=$product[$i]["mota_$lang"]?>  

								</p>

			

				

				  

			</li>
            <?php }?>

 <?php } }else echo '<p>Result not found</p>';  ?>               

				<div class="clear"></div>

				<div class="phantrang" style="text-align:center" ><?=$paging['paging']?></div>  



			</ul>
                
</div>
<br />
                
              </div>
           
             </td>
          <td id="right">
          <div id="share-buttons"> <a href="<?= $row_setting['googleplus_link'] ?>" target="_blank"> <img src="images/Google+.png" alt="Google" /> </a> <a href="<?= $row_setting['linkedin_link'] ?>" target="_blank"> <img src="images/linkedin_32.png" alt="linkedin" /> </a> <a href="<?= $row_setting['facebook_link'] ?>" target="_blank"> <img src="images/Facebook.png" alt="Facebook" /> </a> <a href="<?= $row_setting['twitter_link'] ?>" target="_blank"> <img src="images/twitter.png" alt="Twitter" /> </a> </div>
            <div id="search-6" class="widget widget_search">
               <?php include _template."layout/search.php"; ?>
            </div>
            <div id="categories-2" class="widget widget_categories">
              <div class="widget-title">
                <h3>Categories</h3>
              </div>
              <ul>
              
                 <?php

						$d->reset();

						$sql_cat="select ten_$lang,tenkhongdau,id from #_blog_item where hienthi=1 ";

						$d->query($sql_cat);

						$blog_cat = $d->result_array();

						if(count($blog_cat)>0){

							for($i=0,$count_cat=count($blog_cat);$i<$count_cat;$i++){

					?>
                <li class="cat-item cat-item-28"><a href="news/<?=$blog_cat[$i]['id']?>-<?=$blog_cat[$i]['tenkhongdau']?>/"><?=$blog_cat[$i]["ten_$lang"]?></a> </li>
                <?php

							}

						}

					?>

                
              </ul>
            </div>        
            
            </td>
          <!-- / Right Sidebar --> 
          
        </tr>
      </table>
    </div>
  </div>
</div>