<script type="text/javascript" src="./js/avim.js"></script>
<script type="text/javascript" src="./js/validation.js"></script>
<script type="text/javascript">
	
	function setValue(){
		
		if(document.getElementById('nick').value==''){
			alert("<?=_nhapuser?>!");
			document.getElementById('nick').focus();
			return false;	
		}
		
		if(document.getElementById('email').value==''){
			alert("<?=_nhapemail?>!");
			document.getElementById('email').focus();
			return false;	
		}
		
		
		if(document.getElementById('name').value==''){
			alert("<?=_nhapuser?>!");
			document.getElementById('name').focus();
			return false;	
		}
		
		if(document.getElementById('tensp').value==''){
			alert("<?=_nhapsp?>!");
			document.getElementById('tensp').focus();
			return false;	
		}
		if(document.getElementById('noidung').value==''){
			alert("<?=_nhapmota?> !");
			document.getElementById('noidung').focus();
			return false;	
		}
		if(document.getElementById('diachi').value==''){
			alert("<?=_nhapdiachi?>!");
			document.getElementById('diachi').focus();
			return false;	
		}
		if(document.getElementById('dieukien').value==''){
			alert("<?=_nhapdieukien?>!");
			document.getElementById('dieukien').focus();
			return false;	
		}
		
		
		
		if(document.getElementById('gia').value==''){
			alert("<?=_nhapgia?>!");
			document.getElementById('gia').focus();
			return false;	
		}
		
		if(document.getElementById('phone').value==''){
			alert("<?=_nhaphandphone?>!");
			document.getElementById('phone').focus();
			return false;	
		}
		if(document.getElementById('dienthoai').value==''){
			alert("<?=_nhaphomephone?>!");
			document.getElementById('dienthoai').focus();
			return false;	
		}
		
		document.frm_register.submit();
	}
	
</script>
<script language='javascript'>
  function isNumberKey(evt)
 {
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
 return false;
 return true;
 }

</script>

<div id="info-left">
  <div class="container">
                 <?php include _template."layout/slideranh.php"; ?>	
                 </div>
        		<div class="clear"></div>
  <div class="info-left-title"><span><?=_kygui?></span></div>
  <div class="info-left-content">
    <div class="text">
<?php

$d->reset();
	
	$d->reset();

	$sql_tintuc1 = "select * from #_setting limit 1";

	$d->query($sql_tintuc1);

	$ky_gui = $d->result_array();
?>

      <form action="" method="post" id="frm_register" name="frm_register" enctype="multipart/form-data" style="width:570px;">
<div style="width: 98%; margin: 10px 0 40px 0; text-align: left;max-height: 300px;overflow: auto;">
 <?=$ky_gui[0]['kygoi_'.$lang]?>
</div>
        <table width="100%" border="0">
          <tr>
            <td class="kygui_text"><span ><?=_tendoanhnghiep?>: </span></td>
            <td ><input type="text" id="nick" name="nick">
              <span id="nickInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
          </tr>
           <tr>
            <td class="kygui_text"><span ><?=_diachi?>: </span></td>
            <td><input type="text" id="diachi" name="diachi">
              <span id="nameInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
          </tr>
          
           <tr>
            <td class="kygui_text"><span ><?=_ten?>: </span></td>
            <td><input type="text" id="name" name="name" >
              <span id="nameInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
          </tr>
          
           <td class="kygui_text"><span >Email: </span></td>
            <td><input type="text" id="email" name="email">
              <span id="emailInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
          </tr>
           <tr>
            <td class="kygui_text"><span ><?=_dtban?>: </span></td>
            <td><input type="text" id="dienthoai" name="dienthoai"  onKeyPress="return isNumberKey(event)">
              <span id="phoneInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
          </tr>
           <tr>
            <td class="kygui_text"><span ><?=_didong?>: </span></td>
            <td><input type="text" id="phone" name="phone"  onKeyPress="return isNumberKey(event)">
              <span id="phoneInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
          </tr>
           <tr>
            <td class="kygui_text"><span ><?=_tensp?>: </span></td>
            <td><input type="text" id="tensp" name="tensp" >
              <span id="nameInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
          </tr>
          
           <tr>
            <td class="kygui_text"><span ><?=_webthamkhao?>: </span></td>
            <td><input type="text" id="link" name="link">
              <span id="nameInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
          </tr>
           <tr>
            <td class="kygui_text"><span ><?=_hinhsp?>: </span></td>
            <td><input type="file" name="file" />
              <span id="nameInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
          </tr>
           <tr>
            <td class="kygui_text"><span ><?=_motasp?>: </span></td>
            <td><input type="text" id="noidung" name="noidung" >
              <span id="nameInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
          </tr>
          
          <tr>
            <td class="kygui_text"><span><?=_dkthanhtoan?> : </span></td>
            <td><input type="text" id="dieukien" name="dieukien">
              <span id="nameInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
          </tr>
          
           <tr>
            <td class="kygui_text"><span ><?=_giathitruong?>(*) : </span></td>
            <td><input type="text" id="gia" name="gia" onKeyPress="return isNumberKey(event)">
              <span id="nameInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
          </tr>
         
           <tr>
            <td class="kygui_text"><span ><?=_chietkhau?>: </span></td>
            <td><input type="text" id="chietkhau" name="chietkhau" onKeyPress="return isNumberKey(event)">
              <span id="nameInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
          </tr>
        
          <tr>
            <td class="kygui_text"><?=_ghichuthem?>: </span></td>
            <td><textarea name="ghichu"></textarea></td>
          </tr>
          
          <tr>
            <td  class="kygui_text"><span ><?=_maxn?>: </span></td>
            <td><table>
                <tbody>
                  <tr>
                    <td width="110px"><input type="text" id="captcha" name="captcha" style="width: 140px; height:34px;margin-right:20px;"></td>
                    <td><img src="./captcha_image.php" name="vimg" id="vimg" style="height:27px;"> <img src="images/reload.png" alt="Reload" onclick="nv_change_captcha('vimg','fcode_iavim');" style="cursor: pointer;width:30px"></td>
                  </tr>
                </tbody>
              </table></td>
          </tr>
        </table>
        <p style="padding-left: 150px;">
          <input class="btnregis" type="button" value="<?=send?>" onClick="setValue()"  class="button"style="width:80px;color:#fff">
        </p>
      </form>
    </div>
  </div>
  <!-- .info_content --> 
</div>
<script type="text/javascript">
function dcv_random(a){
	for(var b="",c=0;c<a;c++)b+="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890".charAt(Math.floor(Math.random()*62));
	return b
}
function nv_change_captcha(a,b){
	var c=document.getElementById(a);
	nocache=dcv_random(10);
	c.src="captcha_image.php?&nocache="+nocache;	
	document.getElementById(b).value="";return!1
}
</script>