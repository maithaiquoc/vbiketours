<div class="tcat"><?=$tintuc_detail[0]['ten_'.$lang]?></div>
   <div class="box_content">
   <div class="news_detail">
              
           <?=$tintuc_detail[0]['noidung_'.$lang]?>
             <table class="s4-wpTopTable" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td valign="top"><div WebPartID="00000000-0000-0000-0000-000000000000" HasPers="true" id="WebPartWPQ12" width="100%" class="ms-WPBody noindex" OnlyForMePart="true" allowDelete="false" style="" ><div id="ctl00_PlaceHolderMain_ctl00_g_6eb72671_8b6e_4763_8bd1_0d4467184dd9">
			<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><div class='GPH-g1'>                            <div class='GPphanhoi'>
                                    <div class='googleone'>
                                        <div class='google-1'>
                                            <div class='google-item'><g:plusone size='medium'></g:plusone></div>
                                        </div>
                                    </div><div class='facebook-1'>
                                        <div class='facabook'><iframe src="http://www.facebook.com/plugins/like.php?href=<?=getCurrentPageURL()?>&amp;layout=button_count&amp; show_faces=true&amp;width=450&amp;action=like&amp;font=tahoma&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:450px; height:px"></iframe></div>
                                    </div></div><div class='GPH-in' onclick="printpreview('vi-VN')"><span>&nbsp;</span>
                                </div><div class='GPH-email' onclick="guiEmail();"><span>&nbsp;</span>
                                </div>
                            <div class='chiasewaitem'>
                            <div class='book-text'>Chia sẻ: </div>
                            <div class='detail-bookmark'><div class='dell'><a href="http://link.apps.zing.vn/share?u=&lt;url&gt;" onclick="return zme_click();" target='_blank'>    <img src="http://www.thanhnien.com.vn/_layouts/Images/img-thanhnien/zingmeicon.gif" alt=''/></a></div><div class='dell'><a href="http://www.facebook.com/share.php?u=<url>" onclick="return fbs_click();" target='_blank'> <img alt='' src="http://www.thanhnien.com.vn/_layouts/Images/img-thanhnien/facebook_share_icon.gif" alt=''/></a></div><div class='dell'><a onclick="javascript:window.open('http://twitter.com/home?status=2&url='+window.location,'_blank')">   <img alt='' src="http://www.thanhnien.com.vn/_layouts/Images/img-thanhnien/twitter.gif" /></a></div><div class='dell'><a onclick="javascript:window.open('http://www.google.com/bookmarks/mark?op=edit&output=popup&bkmk='+window.location,'_blank')"><img alt='' src="http://www.thanhnien.com.vn/_layouts/Images/img-thanhnien/googleicon.jpg" /></a></div><div class='dell'><a onclick="javascript:window.open('http://bookmarks.yahoo.com/myresults/bookmarklet?u=' + window.location,'_blank');"><img alt='' src="http://www.thanhnien.com.vn/_layouts/Images/img-thanhnien/yahoo.gif" /></a></div></div>
                        </div>
                </div>
		</div></div></td>
	</tr>
</table>

<script>function zme_click() {u=location.href;t=document.title;window.open('http://link.apps.zing.vn/share?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script>
<script>function fbs_click() {u=location.href;t=document.title;window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script>
          <div class="othernews">
           <h1><?=_cacbaikhac?></h1>
           <ul>
           
<?php foreach($tintuc_khac as $tinkhac){?>
<li><a href="<?=$lang?>/tuyen-dung/<?=$tinkhac['id']?>-<?=$tinkhac['tenkhongdau']?>.html" style="text-decoration:none;"><?=$tinkhac['ten_'.$lang]?></a> (<?=make_date($tinkhac['ngaytao'])?>)</li>
<?php }?>
     </ul>
</div>

</div>
         </div>