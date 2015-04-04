<div class="submenu-content">
    <span class="name-sub"><?=_cokhi?></span>
    <ul class="sub-item">       
         <?php			  
			   for($i=0,$count_dmtt=count($result_dmtt);$i<$count_dmtt;$i++){
		   ?>
        <li><a href="<?=$lang?>/co-khi/<?=$result_dmtt[$i]['id']?>-<?=$result_dmtt[$i]['tenkhongdau']?>/"><?=$result_dmtt[$i]['ten_'.$lang]?></a></li>
         <?php } ?>
    </ul>
    <div class="clear"></div>
</div>

   <div class="box_content">
   <div class="news_detail">
   			<div class="title_news"><?=$tintuc_detail[0]['ten_'.$lang]?>       </div>
           <?=$tintuc_detail[0]['noidung_'.$lang]?>                            
</div>

<div class="othernews">
           <h1><?=_cacbaikhac?></h1>
           <ul>
           
<?php foreach($tintuc_khac as $tinkhac){?>
<li class="clearfix"><img src="<?=_upload_tintuc_l.$tinkhac['thumb']?>" width="80" /><a href="<?=$lang?>/co-khi/<?=$tinkhac['id']?>-<?=$tinkhac['tenkhongdau']?>.html" style="text-decoration:none;"><?=$tinkhac['ten_'.$lang]?></a></li>
<?php }?>
     </ul>
<a href="<?=$lang?>/co-khi.html">Xem thêm</a>
</div>

<div class="clear"></div>
         </div>
<style>
.news_detail{
	float:left;
	border-right:1px dashed #212121;
	width:730px;
	padding-right:9px;
	
}
.othernews{
	float:left;
	width:230px;
}
</style>