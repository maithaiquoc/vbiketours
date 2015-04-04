<?php
session_start();
	@define ( '_lib' , '../admin/lib/');
	@define ( '_source' , '../sources/');	
	
	$lang_arr=array("vi","en");
	if (isset($_GET['lang']) == true){
        if (in_array($_GET['lang'], $lang_arr)==true){
            $lang = $_GET['lang'];
            $_SESSION['lang']=$lang;
        } 
	}
    if(isset($_SESSION['lang'])){
        $lang= $_SESSION['lang'];
    }else{
        $lang="vi";
    }

	
	 require_once _source."lang_$lang.php";			
    include_once _lib."config.php";
    include_once _lib."constant.php";
    include_once _lib."functions.php";
    include_once _lib."class.database.php";
	$d = new database($config['database']);  
	
	$id =  addslashes($_GET['id']);
	$d->reset();
	$sql_lanxem = "UPDATE #_catalogue SET luotxem=luotxem+1  WHERE id ='".$id."'";
			$d->query($sql_lanxem);
		
		$d->reset();
		$sql_detail = "select id_list,id_cat,id_item,id,photo,thumb,ten_$lang,tenkhongdau,gia,masp,ngaytao,chitiet_$lang,luotxem from #_catalogue where hienthi=1 and id='".$id."'";
		$d->query($sql_detail);
		$row_detail = $d->fetch_array();
		
		#hinh cua catalogue======================
		$d->reset();
		$sql_detail = "select id,thumb,photo from #_hasp where hienthi=1 and id_photo='".$id."'";
		$d->query($sql_detail);
		$album_hinh = $d->result_array();
?>
<style>
	#cata_wrap{margin:auto;height:450px;width:900px;}
	#cata_left{width:690px;float:left;text-align:center;}
	#cata_right{width:190px;height:450px;float:left;background:green; padding:0 10px; line-height:1.5;color:#000;font-size:14px;}
	.title-cata{font-size:15px; font-weight:bold; color:#fff; line-height:30px; border-bottom:1px solid #ccc;}

</style>
<div id="cata_wrap">
	<div id="cata_left">
		<div id="bg_tag_sp_special"></div><!--End #bg_tag_sp_special-->
        <div class="block_sub_arrow_prev">
            <a id="mycarousel-prev-440" href="javascript:void(0);"><img src="images/arown_prew.png" alt="" title="Previous" /></a>
        </div><!--block_sub_arrow_prev-->
      <div class="block_sub_arrow_next">
            <a id="mycarousel-next-440" href="javascript:void(0);"><img src="images/arown_next.png" alt="" title="Next" /></a>
        </div><!--block_sub_arrow_next-->
      <div class="jcarousel-container jcarousel-container-horizontal" style="position:relative; display:block">
            <div class="jcarousel-clip jcarousel-clip-horizontal" style="position:relative">
                <ul id="440-jcarousel" class="jcarousel-skin-tango">
                    <?php
                        if(count($album_hinh)>0){
                            foreach($album_hinh as $album_hinhItem){
                                echo '<li class="jcarousel_li">
                                        <a href="javascript:void(0)"><img src="'._upload_catalogue_l,$album_hinhItem['photo'].'" height="450px"/></a>
                                      </li>';
                            }
                        }
                    ?>
                </ul><!--End ul jcarousel-list-->
            </div><!--End .jcarousel-clip-->
      </div><!--End .jcarousel-container-->
	</div><!--cata_left-->
	<div id="cata_right">
    	<h3 class="title-cata"><?=$row_detail['ten_'.$lang]?></h3>
        <p class="pro-name"><?=_ma?> :<a href="catalogue/<?=$row_detail['id']?>-<?=$row_detail['tenkhongdau']?>.html"><?=$row_detail['masp']?></a></p>
		<p class="pro-price"><?=_gia?>: <span class="red"><?php if($row_detail['gia'] =="" || $row_detail['gia'] =="0") echo 'Liên hệ'; else echo number_format ($row_detail['gia'],0,",","."); ?> </span> vnđ</p>
        <p><?=_chitiet?>: <?=$row_detail['chitiet_'.$lang]?></p> 
    </div><!--cata_right-->
</div><!--cata_wrap-->