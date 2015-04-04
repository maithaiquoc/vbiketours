<script type="text/javascript">

$(document).ready(function(){
	$('#tabs div').hide();
	$('#tabs div:first').show();
	$('#tabs ul li:first').addClass('active');
	$('#tabs ul li a').click(function(){ 
	$('#tabs ul li').removeClass('active');
	$(this).parent().addClass('active'); 
	var currentTab = $(this).attr('href'); 
	$('#tabs div').hide();
	$(currentTab).show();
	return false;
	});
});
</script>
<div class="clear"></div>
<div class="show-pro">   
		<div class="block-khachsan-top">
        <div class="fb-like" data-href="<?=getCurrentPageURL()?>" data-send="true" data-layout="button_count" data-width="450" data-show-faces="false"></div>
            <div class="block-img-khachsan">
                 <a href="javascript:void(0)"><img src="<?=_upload_khachsan_l.$tintuc_detail[0]['thumb']?>" alt="" title="" /></a>
            </div><!--block-img-khachsan-->
            <div class="block-info-khachsan">
                <h3> <a href="javascript:void(0)"><?=$tintuc_detail[0]["ten_$lang"]?></a></h3>
                <p class="mota"><?=$tintuc_detail[0]["mota_$lang"]?></p>
        </div>
        </div>  <!--block-khachsan-top-->  
       	
         <div id="tabs">
            <ul>
              <li><a href="#tab-1"><?=_gioithieu?></a></li>
              <li><a href="#tab-2"><?=_quydinh?></a></li>
            </ul>
            <div id="tab-1">
              	<?=$tintuc_detail[0]["gioithieu_$lang"]?>
            </div>
            <div id="tab-2">
              <?=$tintuc_detail[0]["quydinh_$lang"]?>
            </div>
            
          </div>
        
        
		
 </div>