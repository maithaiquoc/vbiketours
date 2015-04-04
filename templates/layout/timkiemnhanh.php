
<script type="text/javascript">
	$(document).ready(function(e) {
		var email_regex = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
		var phone_regex=/^0([0-9]{9,10})$/;
		var nameError="<?=_nameError?>";
		var phoneError="<?=_phoneError?>";
		var phoneError1="<?=_phoneError1?>";
		var emailError="<?=_emailError?>";
		var emailError1="<?=_emailError1?>";
		var loaiphongError="<?=_loaiphongError?>";
		var nhahangError="<?=_nhahangError?>";
		var tourError="<?=_tourError?>";
		
        $('#btn_datphong').on('click',function(e) {
			var hoten= $('#hoten').val();
			var sodt= $('#sodt').val();
			var email= $('#email').val();
			var ngayden= $('#ngayden').val();
			var ngaydi= $('#ngaydi').val();
			var loaiphong = $('#loaiphong').val();
			var songuoiphong = $('#songuoiphong').val();
			if($('#hoten').val()==""){
				alert(nameError);
				$('#hoten').focus();
				return false;
			}
			if($('#sodt').val()==""){
				alert(phoneError);
				$('#sodt').focus();
				return false;
			}else if(!phone_regex.test($('#sodt').val())){
				alert(phoneError1);
				$('#sodt').focus();
				return false;
			}
			if($('#email').val()==""){
				alert(emailError);
				$('#email').focus();
				return false;
			}else if(!email_regex.test($('#email').val())){
				alert(emailError1);
				$('#email').focus();
				return false;
			}
			if($('#loaiphong').val()==0){
				alert(loaiphongError);
				$('#loaiphong').focus();
				return false;
			}
			
			$.ajax({

				url:"ketquatimkiem.php",
				type:"POST",
				data:{loai:"1", hoten:hoten, sodt:sodt, email:email, ngayden:ngayden, ngaydi:ngaydi, loaiphong:loaiphong, songuoiphong:songuoiphong},
				async:true,
				dataType:"text",
				success: function(res){
					if(res==1){
						$('.thanhcong')
						.removeClass('hidden')
						.delay(5000)
						.animate({"opacity":"0"},500);
						location.reload();
					}
					else{
						$('.thatbai')
						.removeClass('hidden')
						.delay(5000)
						.animate({"opacity":"0"},500);
						location.reload();
					}
					
				}
			});
			
		return false;
		});
		
		$('#btn_datnhahang').on('click', function(e) {
			var hoten= $('#hoten').val();
			var sodt= $('#sodt').val();
			var email= $('#email').val();
			var ngaydat= $('#ngaydat').val();
			var loainhahang = $('#loainhahang').val();
			var songuoinhahang = $('#songuoinhahang').val();
			if($('#hoten').val()==""){
				alert(nameError);
				$('#hoten').focus();
				return false;
			}
			if($('#sodt').val()==""){
				alert(phoneError);
				$('#sodt').focus();
				return false;
			}else if(!phone_regex.test($('#sodt').val())){
				alert(phoneError1);
				$('#sodt').focus();
				return false;
			}
			if($('#email').val()==""){
				alert(emailError);
				$('#email').focus();
				return false;
			}else if(!email_regex.test($('#email').val())){
				alert(emailError1);
				$('#email').focus();
				return false;
			}
			if($('#loainhahang').val()==0){
				alert(nhahangError);
				$('#loainhahang').focus();
				return false;
			}
			
			$.ajax({
				url:"ketquatimkiem.php",
				type:"POST",
				data:{loai:"2", hoten:hoten, sodt:sodt, email:email, ngaydat:ngaydat, loainhahang:loainhahang, songuoinhahang:songuoinhahang},
				async:true,
				dataType:"text",
				success: function(res){
					if(res==1){
						$('.thanhcong')
						.removeClass('hidden')
						.delay(5000)
						.animate({"opacity":"0"},500);
						location.reload();
					}
					else{
						$('.thatbai')
						.removeClass('hidden')
						.delay(5000)
						.animate({"opacity":"0"},500);
						location.reload();
					}
				}
			});
			return false;
		});
		 
		 $('#btn_dattour').on('click',function(e) {
			 var hoten= $('#hoten').val();
			var sodt= $('#sodt').val();
			var email= $('#email').val();
			var ngayditour= $('#ngayditour').val();
			//var noidi = $('#noidi').val();
			var noiden = $('#noiden').val();
			var songuoitour = $('#songuoitour').val();
			if($('#hoten').val()==""){
				alert(nameError);
				$('#hoten').focus();
				return false;
			}
			if($('#sodt').val()==""){
				alert(phoneError);
				$('#sodt').focus();
				return false;
			}else if(!phone_regex.test($('#sodt').val())){
				alert(phoneError1);
				$('#sodt').focus();
				return false;
			}
			if($('#email').val()==""){
				alert(emailError);
				$('#email').focus();
				return false;
			}else if(!email_regex.test($('#email').val())){
				alert(emailError1);
				$('#email').focus();
				return false;
			}
			/*if($('#noidi').val()==0){
				alert(tourError);
				return false;
			}
			*/
			if($('#noiden').val()==0){
				alert(tourError);
				return false;
			}
			
			$.ajax({
				url:"ketquatimkiem.php",
				type:"POST",
				data:{loai:"3", hoten:hoten, sodt:sodt, email:email, ngayditour:ngayditour, noiden:noiden, songuoitour:songuoitour},
				async:true,
				dataType:"text",
				success: function(res){
					if(res==1){
						$('.thanhcong')
						.removeClass('hidden')
						.delay(5000)
						.animate({"opacity":"0"},500);
						location.reload();
					}
					else{
						$('.thatbai')
						.removeClass('hidden')
						.delay(5000)
						.animate({"opacity":"0"},500);
						location.reload();
					}
				}
			});
			return false;
		});
    });
</script>
<div id="timkiemnhanh">
<h3><img src="images/btn-search.png" alt="" title=""/><?=_timkiemnhanh?></h3>
<div id="tab-container-1">
    <ul id="tab-container-1-nav" class="tablayout">
      <li class="activeli"><a class="" href="#tab1"><?=_khachsan?></a></li>
      <li><a class="" href="#tab2"><?=_nhahang?></a></li>
      <li><a class="" href="#tab3">Tour</a></li>
    </ul>
    <div class="tabs-container"><!--Start .tabs-container-->
        <form action="" method="post" name="frm-timkiem"> 
            <label for="hoten"><?=_hoten?>: <input type="text" name="hoten" id="hoten"/></label>
            <label for="sodt"><?=_sodt?>: <input type="text" name="sodt" id="sodt"  /></label>
            <label for="email">Email: <input type="text" name="email" id="email"/></label>
                <div class="tab" id="tab1"><!--Start Tab1-->	
                    <label for="ngayden"><?=_ngayden?>: <input type="text" name="ngayden" id="ngayden" /></label>
                    <label for="ngaydi"><?=_ngaydi?>: <input type="text" name="ngaydi" id="ngaydi" /></label>
                    <label for="loaiphong"><?=_loaiphong?>: <select name="loaiphong" id="loaiphong">
                    	<option value="0"><?=_loaiphong?></option>
                    	<?php
							$d->reset();
							$sql_dmsp_ks="SELECT`id`,`ten_$lang`,`tenkhongdau` FROM #_khachsan where `hienthi`=1 ORDER BY stt,id ASC";
							
							$d->query($sql_dmsp_ks);
							$result_dmsp_ks=$d->result_array();
							
							if($d->num_rows()>0){
								foreach($result_dmsp_ks as $k1=>$item_dmsp_ks){
									echo'<option value="'.$item_dmsp_ks['id'].'">'.$item_dmsp_ks['ten_'.$lang].'</option>';
								}
							}
						?>
                    </select></label>
                     <label for="songuoi"><?=_songuoi?>: <input type="text" name="songuoiphong" id="songuoiphong" /></label>
                        <div class="btn"><input type="reset" id="reset" value="<?=_nhaplai?>" class="btn_tim" /> 
                        <input type="button" name="datphong" value="<?=_datphong?>"  class="btn_tim" id="btn_datphong"/>
                        </div>
                    <div class="clear"></div>
                </div><!--End Tab1-->
                <div class="tab" id="tab2"><!--Start Tab2-->
                    <label for="ngaydat"><?=_ngaydat?>: <input type="text" name="ngaydat" id="ngaydat" /></label>
                    <label for="loainhahang"><?=_nhahang?>: <select name="loainhahang" id="loainhahang">
                   	 <option value="0"><?=_nhahang?></option>
                        <?php
							$d->reset();
							$sql_dmsp_nh="SELECT`id`,`ten_$lang`,`tenkhongdau` FROM #_nhahang where `hienthi`=1 ORDER BY stt,id ASC";
							
							$d->query($sql_dmsp_nh);
							$result_dmsp_nh=$d->result_array();
							
							if($d->num_rows()>0){
								foreach($result_dmsp_nh as $k1=>$item_dmsp_nh){
									echo'<option value="'.$item_dmsp_nh['id'].'">'.$item_dmsp_nh['ten_'.$lang].'</option>';
								}
							}
						?>
                    </select></label>
                      <label for="songuoi"><?=_songuoi?>: <input type="text" name="songuoinhahang" id="songuoinhahang" /></label>
                		<div class="btn"><input type="reset" id="reset" value="<?=_nhaplai?>" class="btn_tim" /> 
                		<input type="button" name="dattour" value="<?=_dat?>"  class="btn_tim" id="btn_datnhahang"/></div>
                    <div class="clear"></div>
                </div><!--End Tab2-->
                <div class="tab" id="tab3"><!--Start Tab3-->
                     <label for="ngayditour"><?=_ngaydi?>: <input type="text" name="ngayditour" id="ngayditour" /></label>
                   <!-- <label for="noidi"><?//=_noidi?>: <select name="noidi" id="noidi">
                        <option value="0"><?//=_noidi?></option>
                        <?php
							/*$d->reset();
							$sql_dmsp_t="SELECT`id`,`ten_$lang`,`tenkhongdau` FROM #_tour where `hienthi`=1 ORDER BY stt,id ASC";
							
							$d->query($sql_dmsp_t);
							$result_dmsp_t=$d->result_array();
							
							if($d->num_rows()>0){
								foreach($result_dmsp_t as $k1=>$item_dmsp_t){
									echo'<option value="'.$item_dmsp_t['id'].'">'.$item_dmsp_t['ten_'.$lang].'</option>';
								}
							}*/
						?>
                    </select></label>-->
                    <label for="noiden"><?=_noiden?>: <select name="noiden" id="noiden">
                        <option value="0"><?=_noiden?></option>
                        <?php
							$d->reset();
							$sql_dmsp_t1="SELECT`id`,`ten_$lang`,`tenkhongdau` FROM #_tour where `hienthi`=1 ORDER BY stt,id ASC";
							
							$d->query($sql_dmsp_t1);
							$result_dmsp_t1=$d->result_array();
							
							if($d->num_rows()>0){
								foreach($result_dmsp_t1 as $k1=>$item_dmsp_t1){
									echo'<option value="'.$item_dmsp_t1['id'].'">'.$item_dmsp_t1['ten_'.$lang].'</option>';
								}
							}
						?>
                    </select></label>
                     <label for="songuoi"><?=_songuoi?>: <input type="text" name="songuoitour" id="songuoitour" /></label>
                	<div class="btn">
                    	<input type="reset" id="reset" value="<?=_nhaplai?>" class="btn_tim" /> 
                        <input  type="button" name="dattour" value="<?=_dattour?>"  class="btn_tim" id="btn_dattour"/>
                    </div>
                    <div class="clear"></div>
                </div><!--End Tab3-->
               
            </form>
    </div><!--End .tabs-container--> 
</div> 
<script type="text/javascript">
    var tabber1 = new Yetii({
    id: 'tab-container-1',
    active: 1,
    timeout: null,
    interval: null,
    tabclass: 'tab',
    activeclass: 'active'
    });
</script>
</div>