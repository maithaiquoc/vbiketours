<div id="brd"><ul><li class="home"><a href="http://<?=$config_url?>/<?=$lang?>/index.html"><?=_trangchu?></a></li><li><a href="http://<?=$config_url?>/<?=$lang?>/san-pham.html"><?=_sanpham?></a></li>
<li><a href="http://<?=$config_url?>/<?=$lang?>/cat1/<?=$result_pro1['id']?>-<?=$result_pro1['tenkhongdau']?>.html"><?=$result_pro1['ten_'.$lang]?></a></li>
<li><a href="http://<?=$config_url?>/<?=$lang?>/cat2/<?=$result_pro2['id']?>-<?=$result_pro2['tenkhongdau']?>.html"><?=$result_pro2['ten_'.$lang]?></a></li>
<li><a href="http://<?=$config_url?>/<?=$lang?>/cat3/<?=$loaitin[0]['id']?>-<?=$loaitin[0]['tenkhongdau']?>.html"><?=$loaitin[0]['ten_'.$lang]?></a></li>
</ul>
</div>
   <div class="box_content">
   <div id="product">


<div id="content-cat">


	<div id="mainSubCateBanner">
    	<div class="bigimg"><img border="0" src="<?=_upload_product_l.$loaitin[0]['thumb']?>"></div>

    	<div class="intro">
        	<h2><?=$loaitin[0]['ten_'.$lang]?></h2>

        <?=$loaitin[0]['mota_'.$lang]?>
    	</div>
    </div><!-- end mainSubCateBanner -->


    <ul id="mainSeriesContent">
        <?php for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){ ?>  
        <li <?php if(($i+1)%5==0) echo 'class="n5"'; ?>>
            <a class="view" href="<?=$lang?>/san-pham/<?=$tintuc[$i]['id']?>/<?=$tintuc[$i]['tenkhongdau']?>.html">
            	<span class="SeriesTopBox">
                	<strong><?=$tintuc[$i]['ten_'.$lang]?></strong>
                	
                </span>

                <span class="SeriesMidBoxA"></span>

               	<span class="img"><span class="vert"></span><img border="0" src="<?=_upload_product_l.$tintuc[$i]['thumb']?>"></span>
          	</a>
           	<div class="tech"></div>
        </li>
        <?php } ?>               
    </ul>

    <div class="clr"></div>
</div>


</div></div>