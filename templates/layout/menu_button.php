  <div class="bottom-search-area hide-sm">
          <div class="col-12">
    <form name="frm_search" id="frm_search" method="get" action="tim-kiem/" onsubmit="return false;">
              <div class="location-wrapper">
			 <ul id="ja-cssmenu">
<li class="havechild menu-item0 active first-item">

<button type="submit" class="search-button form-inline btn btnour-primary btn-large" id="submit_location" style="width: 150px;">
 <a href="list_tour.html" class="menu-item0 active first-item haschild" id="menu1" title="Our Tours">Our Tours
</button></a>
<ul>
<?php

	$sql_dep="select ten_$lang, spmoi, id,tenkhongdau from #_product where hienthi =1 and noibat>0 order by stt,id desc limit 10";

	$d->query($sql_dep);
	$result_tieubieu=$d->result_array();

	?>
    <?php

         if(!empty($result_tieubieu)){$index = 0; $totalProduct = count($result_tieubieu);

		for($j=0,$count_cc=count($result_tieubieu);$j<$count_cc;$j++){$index += 1;

		?>
<li><a href="tour/<?=$result_tieubieu[$j]['id']?>-<?=$result_tieubieu[$j]['tenkhongdau']?>.html" class=" first-item" id="menu56" title="The Sights">
<span class="menu-title"><?=catchuoi($result_tieubieu[$j]["ten_$lang"],420)?></span></a>
</li>
<?php }}?>
</ul></li>

</ul>
			    <button type="submit" class="search-button form-inline btn btnour-primary btn-large" id="submit_location" style="width: 150px;">
                <a href="booking-now.html">Booking Now </a></button>
                <!--<input type="text" class="form-inline location input-large input-contrast" autocomplete="off" id="location" name="location" placeholder="Where do you want to go?">-->
                   <input type="text" class="form-inline location input-large input-contrast" id="keyword" name="keyword" value="" onkeypress="doEnter(event)" onblur="if(this.value=='') this.value='Search'" onfocus="if(this.value =='Tìm kiếm' ) this.value=''" placeholder=""/>
                <p id="enter_location_error_message" class="bad hide"> Please set location </p>
              </div>


<!--              <div class="select select-large">-->
<!--                <select id="guests" name="guests">-->
<!--                  <option value="1">1 Guest</option>-->
<!--                  <option value="2">2 Guests</option>-->
<!--                  <option value="3">3 Guests</option>-->
<!--                  <option value="4">4 Guests</option>-->
<!--                  <option value="5">5 Guests</option>-->
<!--                  <option value="6">6 Guests</option>-->
<!--                  <option value="7">7 Guests</option>-->
<!--                  <option value="8">8 Guests</option>-->
<!--                  <option value="9">9 Guests</option>-->
<!--                  <option value="10">10 Guests</option>-->
<!--                  <option value="11">11 Guests</option>-->
<!--                  <option value="12">12 Guests</option>-->
<!--                  <option value="13">13 Guests</option>-->
<!--                  <option value="14">14 Guests</option>-->
<!--                  <option value="15">15 Guests</option>-->
<!--                  <option value="16">16+ Guests</option>-->
<!--                </select>-->
<!--              </div>-->

            <!--  <button type="submit" class="search-button form-inline btn btn-primary btn-large" id="submit_location"> Search </button>-->
            <input  value="Search" name="sreachAct" id="btnSearch" class="search-button form-inline btn btn-primary btn-large" type="submit" style="width: 150px;"/>
            </form>
          <?php /*?>   <form name="frm_search" id="frm_search" method="get" action="tim-kiem/" onsubmit="return false;">
              <input type="input" class="	" id="keyword" name="keyword" value="" onkeypress="doEnter(event)" onblur="if(this.value=='') this.value='Search'" style="color:#888;width: 163px;" onfocus="if(this.value =='Tìm ki?m' ) this.value=''" />
              <input  value="Search" name="sreachAct" id="btnSearch" class="search-button form-inline btn btn-primary btn-large" type="submit" />
             </form><?php */?>
          </div>
        </div>
        <script type="text/javascript">



		$(function(){



			$('#btnSearch').click(function(evt){



				onSearch(evt);



			});



		});



		function onSearch(evt){



			var keyword = document.frm_search.keyword;



			if( keyword.value == '' || keyword.value ==='Tìm ki?m'){alert('B?n ch?a nh?p t? khóa tìm ki?m!'); keyword.focus(); return false;}



			location.href='http://<?=$config_url?>/tim-kiem/keyword='+keyword.value;



		}







		function doEnter(evt){



		// IE					// Netscape/Firefox/Opera



		var key;



		if(evt.keyCode == 13 || evt.which == 13){



			onSearch(evt);



		}else{



			return false;



		}



		}



		</script>