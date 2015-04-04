<script language="javascript" src="admin/media/scripts/my_script.js"></script>
<script language="javascript">
function js_submit(){
	
	if(isEmpty(document.getElementById('email'), "<?=_emailError?>")){
		document.getElementById('email').focus();
		return false;
	}
	
	if(!check_email(document.frm.email.value)){
		alert("<?=_emailError1?>");
		document.frm.email.focus();
		return false;
	}
	
	
	if(isEmpty(document.getElementById('noidung'), "<?=_contentError?>")){
		document.getElementById('noidung').focus();
		return false;
	}
	
	document.frm.submit();
}
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#form-datcauhoi").hide();
        $("#datcauhoi").click(function() {
            $("#form-datcauhoi").slideToggle();
        });
    });
</script>
<div class="block_content">
    <div class="title_index">
        <h3 class="title-pro"><?=_hoidap?></h3>
    </div>
    <div class="clear"></div>
    <div class="show-pro">
    <div class="title" style="margin:0 0 30px 0">
        <span class="font-red" id="datcauhoi" style="float:padding-right:20px; cursor:pointer">&gt;&gt;<?=_datcauhoi?>&lt;&lt;</span>
    </div>
    <div id="content-source">
	  <div id="form-datcauhoi">
        <form method="post" name="frm" action="" enctype="multipart/form-data">
        <table width="100%" cellpadding="5" cellspacing="0" border="0" class="tablelienhe">
            <tr>
                <td><?=_hovaten?></td>
                <td><input name="ten" type="text" class="input" id="ten" size="50" /></td>
            </tr>                        
            <tr>
                <td><?=_diachi?></td>
                <td><input name="diachi" id="diachi" type="text"  class="input" size="50" /></td>
            </tr>
            <tr>
                <td><?=_dienthoai?></td>
                <td><input name="dienthoai" type="text" class="input" id="dienthoai" size="50"/></td>
            </tr>
            <tr>
                <td><?=_email?><span class="font-red">*</span></td>
                <td><input name="email" type="text" id="email" class="input" size="50"  /></td>
            </tr>                                                  
                                  
            <tr>
                <td><?=_noidung?><span  class="font-red">*</span></td>
                <td>
                <textarea name="noidung" cols="50" rows="5" class="ta_noidung" id="noidung" style="background-color:#FFFFFF; color:#666666;"></textarea>
                </td>
            </tr>
             <tr>
                 <td>&nbsp;</td>
                <td> 
                    <input class="button" type="button" value="<?=_gui?>" onclick="js_submit();" />
                    <input class="button" type="button" value="<?=_nhaplai?>" onclick="document.frm.reset();" />                                       
                </td>
            </tr>
            </table>   
                </form>
          </div><!--"form-datcauhoi"-->
 	</div>
    <p class="font-red" style="padding-left:20px; margin:20px 0 0 0; font-style:normal">CÁC CÂU HỎI - ĐÁP</p>
    <div class="clear" style="border-bottom:2px solid #E2D9CF; margin-bottom:20px;">&nbsp;</div>
     <?php 
	 	foreach($rows_cauhoi as $item){?>
    <div class="block-hoi-dap">
    	<div class="block-hoi">
        	<p class="title"><span style="font-weight:bold"><?=_hoi?>: </span><span class="font-red"><?= $item['ten']?></span></p>
            <div class="block-cauhoi">
            	<?= $item['noidung']?>
            </div><!---block-cauhoi-->
        </div><!--block-hoi-->
        <div class="block-dap">
        	<p class="title"><span style="font-weight:bold"><?=_dap?>: </span><span class="font-red"><?=_bophanchamsockhachhang?></span></p>
            <div class="block-traloi">
            	<?= $item['traloi']?>
            </div><!---block-traloi-->
        </div><!--block-dap-->
    </div><!--block-hoi-dap-->
	<?php		  
    } 
    ?>
    
     <div class="clear"></div>
    <div class="phantrang" ><?=$paging['paging']?></div>
		
</div>
</div>