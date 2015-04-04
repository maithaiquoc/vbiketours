<div class="fb-like" data-href="<?=getCurrentPageURL()?>" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false"></div>
<div class="clear"></div>
<div class="show-pro">   
		<div class="title_news"><?=$tintuc_detail[0]['ten_'.$lang]?></div>
           <?=$tintuc_detail[0]['noidung_'.$lang]?>
           
          <div class="othernews">
           <h1><?=_cacbaikhac?></h1>
           <ul>
                       
            <?php foreach($tintuc_khac as $tinkhac){?>
            <li><a href="nha-hang-tiec-cuoi/<?=$tinkhac['id']?>-<?=$tinkhac['tenkhongdau']?>.html" style="text-decoration:none;"><?=$tinkhac['ten_'.$lang]?></a> (<?=make_date($tinkhac['ngaytao'])?>)</li>
            <?php }?>
                 </ul>
        </div>
 </div>