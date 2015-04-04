<div class="submenu-content">
    <span class="name-sub"><?=_timkiem?></span>   
</div>

   <div class="box_content">
  <table border="0" cellspacing="0" cellpadding="0" width="100%">
		<tr>
			<td valign="top" align="left">

				<!--<div id="dhtmlgoodies_scrolldiv">
	<div id="scrolldiv_parentContainer">
		<div id="scrolldiv_content">-->
		<!-- PUT YOUR HTML CONTENT IN HERE -->
	<div class="product-selling">
     <?php
			   if(count($tintuc)>0){
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>
           
    <div id="<?=$tintuc[$i]['id']?>" class="items-product" onmouseover="changebg('<?=$tintuc[$i]['id']?>')" onmouseout="defaultbg('<?=$tintuc[$i]['id']?>')"><a href="<?=$lang?>/<?=$tintuc[$i]['tendm']?>/<?=$tintuc[$i]['id']?>-<?=$tintuc[$i]['tenkhongdau']?>.html"><table cellspacing="0" cellpadding="0" border="0" width:"190" style="background:#101010;"><tr><td align="center"><img src="<?=_upload_product_l.$tintuc[$i]['thumb']?>" width="190" align="center" border="0" class="img_sp"/></td></tr><tr><td height="5"></td></tr><tr><td align="left" class="div_product_name"><?=$tintuc[$i]['ten_'.$lang]?></td></tr><tr><td align="left" class="title_normal"><?=$tintuc[$i]['hangmuc_'.$lang]?></td></tr><tr><td height="5"></td></tr></table></a></div>
    <?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>      
    
<div class="clear"></div>    		
			</td>

		</tr>	
		</table>
 </div>    	                                     