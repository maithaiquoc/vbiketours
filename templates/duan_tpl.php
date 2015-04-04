<div class="block_content" style="margin-bottom:30px;">
    <div class="title_index">
        <h3 class="title-pro-new"><?=_hinhanh?></h3>
    </div>
    <div class="clear"></div>
    <div class="show-pro">   
        
                 <?php 
                    if(count($duan)>0){
                 for($i=0,$count_sp=count($duan);$i<$count_sp;$i++) { ?>
                 <div class="pro">
                   <div class="block_img">
                        <a href="hinh-anh/<?=$duan[$i]["id"]?>-<?=$duan[$i]["tenkhongdau"]?>.html"><img src="<?=_upload_duan_l,$duan[$i]["thumb"]?>" alt="" title="" onmouseout="hideTip()" onmouseover="doTooltip(event, '<?=_upload_duan_l,$duan[$i]["photo"]?>')" /></a>
                    </div>
                    <div class="bong_sp"></div>
                    <p class="pro-name"><a href="hinh-anh/<?=$duan[$i]["id"]?>-<?=$duan[$i]["tenkhongdau"]?>.html"><?=$duan[$i]["ten_$lang"]?></a></p>
        			<p class="pro-price"><a href="hinh-anh/<?=$duan[$i]["id"]?>-<?=$duan[$i]["tenkhongdau"]?>.html"><?php if($duan[$i]['gia']==0) echo _lienhe; else echo number_format ($duan[$i]['gia'],0,",",".")." VNĐ";?></a></p>
                </div><!--pro-->
                   
               
            <?php 
                } }else echo '<p>Đang cập nhật nội dung, mời bạn xem chuyên mục khác !</p>';
            ?>        
            <div class="clear"></div>
             <div class="phantrang" ><?=$paging['paging']?></div>         
</div><!--show-pro-->
</div>