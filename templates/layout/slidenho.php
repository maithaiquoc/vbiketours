<?php
	$d->reset();
	$sql_noibat="select photo, link from #_photo where hienthi =1 and com='doitac' order by stt,id desc";
	$d->query($sql_noibat);	
	$result_noibat=$d->result_array();
	$total_row=count($result_noibat);
	if(!empty($total_row)){
		$count1=floor(($total_row)/3);
		$count2=floor(($total_row-$count1)/2);
		$count3=floor($total_row-$count1-$count2);
?>
	<div class="pro-index">
       <div class="block_img fade">
       <?php
	   	if($count1>0){
			for($i=0;$i<$count1;$i++){
		?>
        	<a href="<?=$result_noibat[$i]['link']?>"><img src="<?=_upload_doitac_l.$result_noibat[$i]['photo']?>" alt="" title="" /></a>
        <?php
			}
		}
	   ?>
        </div>
    </div><!--pro-index-->
    
    <div class="pro-index">
       <div class="block_img fade">
       <?php
	   	if($count2>0){
			for($count1;$i<($count2+$count1);$i++){
		?>
        	<a href="<?=$result_noibat[$i]['link']?>"><img src="<?=_upload_doitac_l.$result_noibat[$i]['photo']?>" alt="" title="" /></a>
        <?php
			}
		}
	   ?>
        </div>
    </div><!--pro-index-->
    
    <div class="pro-index">
       <div class="block_img fade">
       <?php
	   	if($count2>0){
			for($count2;$i<$total_row;$i++){
		?>
        	<a href="<?=$result_noibat[$i]['link']?>"><img src="<?=_upload_doitac_l.$result_noibat[$i]['photo']?>" alt="" title="" /></a>
        <?php
			}
		}
	   ?>
        </div>
    </div><!--pro-index-->
<?php
	}
?>