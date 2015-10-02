<?php
                $d->reset();

			$sql_contact = "select * from #_setting ";

			$d->query($sql_contact);

			$row_setting = $d->fetch_array();
			?>
<div class="col-sm-12 col-center">
          <h1 id="tagline" class="uppercase text-jumbo text-contrast1 row-space-1"><?=$row_setting['keywords']?></h1>
          <div id="subtitle" class="h4 text-contrast2 row-space-4"><?=$row_setting['diachi_en']?> </div>
          <div class="col-8 hide show-sm">
            <div class="input-addon" id="sm-search-field"> <input id="iText" class="input-stem input-large fake-search-field" onblur="if(this.value == ''){this.value = 'Search';}"><i id="iSearch" class="input-suffix btn btn-primary icon icon-full icon-search"></i> </div>
          </div>
          <div class="banner ii_w ac">
            <div class="ib ii_dropdown_wr banner_des_select hide_64">
              <div class="ii_dropdown_2wr place_disclosure">
                <div class="ii_disclosure disclosure_link">
<!--                  <div class="place_desination rb4 sd pad_0_20 triip_btn"> Choose your category ?</div>-->
                  <div class="ii_disclosure_list sd place_list" style="display:none">
                    <div class="place_list_wr">
                    <?php

					$d->reset();

					$sql_category="select ten_$lang, id,tenkhongdau from #_product_list where hienthi =1 order by stt,id desc";

					$d->query($sql_category);

					$result_sp=$d->result_array();

					//echo var_dump($result_sp);

					if(!empty($result_sp)){
						foreach($result_sp as $item_pro_category){

				?>



                     <span class="country_wr">
                     <b class=""><a class="country_item place_item bl ii_item" href="tour/<?=$item_pro_category['id']?>-<?=$item_pro_category['tenkhongdau']?>/"><?=$item_pro_category['ten_vi']?></a> </b>

					<?php
					$d->reset();

							$sql_category_sub="select ten_$lang, id,tenkhongdau  from #_product_cat where hienthi =1 and id_list = '".$item_pro_category['id']."' order by tenkhongdau";

							$d->query($sql_category_sub);

							//echo $sql_category_sub;

							$result_sp_sub=$d->result_array();
//echo var_dump($result_sp_sub);
							if(!empty($result_sp_sub)){
							foreach($result_sp_sub as $item_pro_category_sub){
							?>
                      <a class="place_item bl ii_item" href="tour/<?=$item_pro_category['id']?>-<?=$item_pro_category['tenkhongdau']?>/<?=$item_pro_category_sub['id']?>-<?=$item_pro_category_sub['tenkhongdau']?>/"><?=$item_pro_category_sub['ten_vi']?></a>
                         <?php }}?>
                     </span>
                     <?php }}?>
                      </div>
                    <div class="c"></div>
                   <!-- <div class="hr trav_request_place hint">
                      <p>Can not find your destination? </p>
                    </div>-->
                  </div>
                </div>
              </div>
            </div>
          </div>
<!--          <a href="https://www.airbnb.com/?mr=f#discovery-container" class="mobile-discovery-arrow hide-md hide-lg">
           <i class="icon icon-chevron-down icon-white icon-size-2"></i> </a>-->

           </div>