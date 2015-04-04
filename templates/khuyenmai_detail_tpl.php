<div class="block_content">
    <div class="title_index">
        <h3 class="title-pro-new"><?=_chitietkhuyenmai?></h3>
    </div>
    <div class="clear"></div>
    <div class="show-pro">  
		<div class="title_news"><?=$tintuc_detail[0]['ten_'.$lang]?></div>
           <?=$tintuc_detail[0]['noidung_'.$lang]?>
           
          <div class="othernews">
           <h1><?=_khuyenmaikhac?></h1>
           <ul>
                       
            <?php foreach($tintuc_khac as $tinkhac){?>
            <li><a href="khuyen-mai/<?=$tinkhac['id']?>-<?=$tinkhac['tenkhongdau']?>.html" style="text-decoration:none;"><?=$tinkhac['ten_'.$lang]?></a> (<?=make_date($tinkhac['ngaytao'])?>)</li>
            <?php }?>
                 </ul>
        </div>
 </div>
 </div>