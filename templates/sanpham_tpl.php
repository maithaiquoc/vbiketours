
<h2 class="SPTitle"><span class="icon"></span><?=_sanpham?></h2>
<div class="content">
	<div class="ctsanpham">
    	
	<?php
        //lấy tất cả sản phẩm theo từng danh mục
        $d->reset();
        $sql_nb="SELECT * FROM #_product WHERE  `hienthi`=1 ORDER BY id DESC";
        $d->query($sql_nb);
        $result_nb=$d->result_array();
        $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
        $url=getCurrentPageURL();
        $maxR=9;
        $maxP=10;
        $paging=paging_home($result_nb, $url, $curPage, $maxR, $maxP);
        $result_nb=$paging['source'];

    foreach($result_nb as $spItem){?>
				
				<div class="spItemCon">
					<div class="spItem">
						<a href="<?=$lang?>/san-pham/<?=$spItem['id']?>-<?=$spItem['tenkhongdau']?>.html"><img class="hinhthumb" src="<?=_upload_product_l,$spItem["thumb"]?>" alt="<?=$spItem["ten_$lang"]?>" title="<?=$spItem["ten_$lang"]?>" onerror="this.src='images/noimage.gif';" /></a>
						<div class="des-sp">
							<p class="tenSP"><a href="<?=$lang?>/san-pham/<?=$spItem['id']?>-<?=$spItem['tenkhongdau']?>.html" title="<?=$spItem["ten_$lang"]?>"><?=$spItem["ten_$lang"]?></a></p>
							<div class="motaIndex"><?=$spItem["mota_$lang"]?></div>
						</div>
					</div>
					<div class="infoPro">
						<a href="<?=$lang?>/san-pham/<?=$spItem['id']?>-<?=$spItem['tenkhongdau']?>.html" class="chitiet"><?=_chitiet?></a>
						<a href="<?=$lang?>/lien-he.html" class="muahang"><?php if($spItem['gia']=='0') echo _lienhe; else echo number_format($spItem['gia'],'0',',',',').' Vnđ'; ?></a>
					</div>
				</div><!--end .spItemCon-->
				
	<?php	
        }
            
        ?>
                <div class="clr"></div>
                <div class="phantrang" ><?=$paging['paging']?></div>
                <div class="clr"></div>

           

        </div> 
      
					
    	<div class="clr"></div>
    </div>
    <!--.ctsanpham-->
</div>
<!--.content-->    