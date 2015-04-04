<?php /*?>   <?php include _template."layout/search.php"; ?><?php */?>





<form name="form1" action="index.php">



	<input type="hidden" name="productid" />



    <input type="hidden" name="command" />



</form>



	<?php
	
	$maxR=15;
	$maxP=10;

	$d->reset();



	$sql_dep="select ten_$lang, spmoi, mota_$lang, id,tenkhongdau, gia, thumb, photo from #_product where hienthi =1 and noibat>0 order by stt,id desc limit 150";





	$d->query($sql_dep);
	$result_tieubieu=$d->result_array();
	$tongsanpham=count($result_tieubieu);
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;	
$url='index.html/';
$paging=paging_home($result_tieubieu, $url, $curPage, $maxR, $maxP);



	$result_tieubieu=$paging['source'];	

	?>

        

         <div class="left" style="text-align: center;">       

                <div class="container">

                     <?php include _template."layout/slideranh.php"; ?>	

                </div>

           		<div class="leftb">

                <div id="home_product_search"  style="width: 100%;">

                                    <div class="headline_sp">

                                        <?=_sanphamtieubieu ?>

                                    </div>



                                    <div class="home_search">

                                            <?php include _template."layout/search.php"; ?>

                                            <div class="clear"></div>

                                        </form>

                                    </div>									

                                    <div class="clear"></div>									

                            </div>

							

                            <div id="home_product_list" style="min-height: 1375px;">

       

    

    <?php

                    

					

				

							

					if(!empty($result_tieubieu)){$index = 0; $totalProduct = count($result_tieubieu);

						for($j=0,$count_cc=count($result_tieubieu);$j<$count_cc;$j++){$index += 1;

						

		?>                            

                                 

                                    <div class="frame_one_idx">




<a href="san-pham/<?=$result_tieubieu[$j]['id']?>-<?=$result_tieubieu[$j]['tenkhongdau']?>.html"><div class="saleoff" style="
    max-width: 150px;
    margin: 0;
    max-height: 150px;
    position: absolute;
    float: right;
    background: url('../images/saleoff.png');
    height: 55px;
    width: 70px;
    font-size: 17px;
    font-weight: bold;
    color: red;
    text-align: center;
    right: 0;
    padding-top: 20px;
">-100%</div></a>




                            <div class="home_image_pro"><a href="san-pham/<?=$result_tieubieu[$j]['id']?>-<?=$result_tieubieu[$j]['tenkhongdau']?>.html">

                            <img src="<?=_upload_product_l.$result_tieubieu[$j]['photo']?>" /></a></div>

							

								<div class="home_name_pro"><?=catchuoi($result_tieubieu[$j]["ten_$lang"],120)?></div>

								<div class="home_info_detail_pro">



<?= catchuoi(str_replace("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;","",strip_tags($result_tieubieu[$j]["mota_$lang"],"")),80) ?>



</div>

								<span style="width:100%; float:left; bottom:0; position: absolute; left:0;">



<div class="home_price_pro"><?=number_format($result_tieubieu[$j]["gia"],0,",",".")?> <sup style="vertical-align: super; font-size: smaller;">đ</sup></div>



									  <div class="home_btn_buy"><a href="san-pham/<?=$result_tieubieu[$j]['id']?>-<?=$result_tieubieu[$j]['tenkhongdau']?>.html"><img src="images/<?= _buttonbuyhome ?>" alt="" title="" /></a></div>

	                                           <!--<p class="pro_read_more">	

								          <a href="san-pham/<?=$result_tieubieu[$j]['id']?>-<?=$result_tieubieu[$j]['tenkhongdau']?>.html">

											>> Chi tiết

								           </a>-->

									</p>

								</span>

							

                        </div>

                        

                        <?php 

							

								if($j == ($totalProduct - 1)){

									if($totalProduct <15){

										echo "<div class='pt'>&nbsp;</div>"; 

									}

								}

								else{								

									if ($index == 5){ 

										echo "<div class='pt'>&nbsp;</div>"; $index = 0; 									
		 

									}

								}

							?>	

                             

                      <?php	



			}



		}



	?>  
<div class="phantrang" style="float:right; width: 100%;" ><?=$paging['paging']?></div>
            </div>  		
 
        </div> 

	

        <div class="clear"></div>

		<div class="home_news" style="height: auto;margin-top:135px; overflow: auto;">

		<?php if($lang == 'vi') {  ?>

		<?php

			$d->reset();

			$sql_dep="select ten_$lang, id,tenkhongdau from #_news_cat where hienthi =1 order by stt,id desc";

			$d->query($sql_dep);

			$result_tieubieu=$d->result_array();

		

			if(!empty($result_tieubieu)){

			foreach($result_tieubieu as $item_pro){			

		?>			

			<div class="column1" style="margin-right:5px;">

				<p class="home_title_news"><?=$item_pro["ten_$lang"]?></p>

				<ul class="home_left_news">

				<?php

					$idcat = $item_pro["id"];

					$d->reset();

					$sql_dep="select ten_$lang,  mota_$lang,ngaytao, id,tenkhongdau, thumb,tinnoibat, photo,nguoitao from #_news where hienthi =1 and id_cat='".$idcat."' order by stt,id desc limit 3";

					//echo $sql_dep;

					$d->query($sql_dep);

					$result_tinnoibat=$d->result_array();

					if(!empty($result_tinnoibat)){

					for($j=0,$count_cc=count($result_tinnoibat);$j<$count_cc;$j++){

				?>

				<li>

				<img src="<?="upload/news/".$result_tinnoibat[$j]['thumb']?>" />

				<a href="tin-tuc/<?=$result_tinnoibat[$j]['id']?>-<?=$result_tinnoibat[$j]['tenkhongdau']?>.html">

					<h3><?=catchuoi($result_tinnoibat[$j]["ten_$lang"],25)?></h3>

				</a>

				<p class="date"><?=date('d-m-Y h:i:s A',$result_tinnoibat[$j]['ngaytao'])?> <a href="javascript:;"><?=$result_tinnoibat[$j]["nguoitao"]?></a></p>

				<p class="des_new">

				<?=catchuoi($result_tinnoibat[$j]["mota_$lang"],75)?>     

				</p>       

				</li>

				<?php

					}

				}

				?>						

				</ul>

			</div>

			

		<?php

			

			}

		}

		?>

		<?php		

			

		}

		?>

		</div>

        		     

        	</div>