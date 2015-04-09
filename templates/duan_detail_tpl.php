 <link rel="stylesheet" href="./css/AdmirorGallery.css" type="text/css">
  <link rel="stylesheet" href="./css/template.css" type="text/css">
  <link rel="stylesheet" href="./css/albums.css" type="text/css">
  <link rel="stylesheet" href="./css/pagination.css" type="text/css">
  <link rel="stylesheet" href="./css/slimbox2.css" type="text/css">
  <script type="text/javascript" src="./js/AG_jQuery.js"></script>
  <script type="text/javascript" src="./js/slimbox2.js"></script>


<!-- MAIN CONTAINER -->
	<div id="ja-container" class="wrap ">
	<div class="main clearfix">

		<div id="ja-mainbody" style="width:100%">
			<!-- CONTENT -->
<div id="ja-main" style="width:100%">
<div class="inner clearfix">	
	<div id="ja-contentwrap" class="">
				<div id="ja-content" class="column" style="width:100%">

			<div id="ja-current-content" class="column" style="width:100%">
								
								<div class="ja-content-main clearfix">
					


<h2 class="contentheading clearfix">
			<?=$row_detail["ten_$lang"]?>	</h2>




<div class="article-content">
<!--<div class="error">Although our clients look like they're having a lot of fun driving the motorbikes, these photos are staged - we do not allow our customers to drive on our tours-->
<!--                        </div>-->
<div></div>
<div><div style="clear:both"></div>

<div id="AG_090" class="ag_reseter AG_classic">
  <table cellspacing="0" cellpadding="0" border="0">
    <tbody>
      <tr>
	<td>
    <?php
			if(!empty($album_hinh)){

				foreach($album_hinh as $item_ha){
		?>	
    <span class="ag_thumbclassic">
            <a href="<?=_upload_duan_l,$item_ha['photo']?>" title="<?=_upload_duan_l,$item_ha['photo']?>" class="" rel="lightbox[AdmirorGallery090]" target="_blank">
            
	        <img src="<?=_upload_duan_l,$item_ha['photo']?>" alt="<?=_upload_duan_l,$item_ha['photo']?>" class="ag_imageThumb">
		    </a>
		    </span>
             <?php }}else{echo "<p>There is no images here...</p>";}?>
           
	</td>
      </tr>
    </tbody>
  </table>
</div>
</div>


<script type="text/javascript">
//<![CDATA[
function AG_form_submit_90(galleryIndex,paginPage,albumFolder,linkID) {
var AG_URL="<?=$row_detail["tenkhongdau"]?>.html";
var split = AG_URL.split("AG_MK=0");
if(split.length==3){
    AG_URL = split[0]+split[2];
}
var char = AG_URL.charAt((AG_URL.length)-1);
if ((char != "?") && (char != "&"))
{
    AG_URL += (AG_URL.indexOf("?")<0) ? "?" : "&";
}
AG_URL+="AG_MK=0&";
AG_jQuery(".ag_hidden_ID").each(function(index) {
    var paginInitPages=eval("paginInitPages_"+AG_jQuery(this).attr('id'));
    var albumInitFolders=eval("albumInitFolders_"+AG_jQuery(this).attr('id'));
    if(AG_jQuery(this).attr('id') == "ag90"){
        var paginInitPages_array = paginInitPages.split(",");
        paginInitPages_array[galleryIndex] = paginPage;
        paginInitPages = paginInitPages_array.toString();
        var albumInitFolders_array = albumInitFolders.split(",");
        albumInitFolders_array[galleryIndex] = albumFolder;
        albumInitFolders = albumInitFolders_array.toString();
    }
    AG_URL+="AG_form_paginInitPages_"+AG_jQuery(this).attr('id')+"="+paginInitPages+"&";
    AG_URL+="AG_form_albumInitFolders_"+AG_jQuery(this).attr('id')+"="+albumInitFolders+"&";
});
AG_URL+="AG_form_scrollTop"+"="+AG_jQuery(window).scrollTop()+"&";
AG_URL+="AG_form_scrollLeft"+"="+AG_jQuery(window).scrollLeft()+"&";
AG_URL+="AG_MK=0";
window.open(AG_URL,"_self");
}
//]]>
</script>

<span class="ag_hidden_ID" id="ag90"></span></div>



				</div>
				
								
				
			</div>

			
		</div>
		
			</div>

	
</div>
</div>
<!-- //CONTENT -->					</div>

			
	</div>
	</div>
	<!-- //MAIN CONTAINER -->