<?php



$d->reset();

			$sql_contact = "select * from #_setting ";

			$d->query($sql_contact);

			$row_setting = $d->fetch_array();



?>
<script type="text/javascript" src="js/jquery.youtubeplaylist.js"></script>
<script>

$(document).ready(function(){
$("ul.playerList").ytplaylist({addThumbs:true, autoPlay: false, holderId: 'ytvideoPlayer',playerWidth: '860', playerHeight: '400',allowFullScreen : true});

/*
flowplayer("a.myPlayer", "js/flowplayer-3.2.18.swf",{

    clip: {       

        autoPlay: false

    }

});
*/

});



	function fs_add_product_command_sub()

	{	

	var id_sub = $('#txtid_sub').val();

		var _id = '<?=$tintuc_detail["id"]?>';

		var _name = $('#txtPcommandName').val();		

		var _notes = $('#txtPcommandNotes').val();

		var _email =  $('#txtPcommandEmail').val();

		if( _name != "" && _notes != "" && _email != ""){

                                if(IsEmail(_email)){

				$.ajax ( {

					type: "POST",

					url: "sacviet/lib/model_blog_sub.php",

					data: { id : _id , name : _name, comment : _notes, email : _email, sub_id : id_sub },

					success: function(html){ 

						if(html != "")

						{ 

							alert('<?=_themthanhcong?>'); 

							var control = '#sub_comment_'+id_sub;														

							$(control).prepend(html);			

							$('#product_form_comment').hide(); 

							$('#product_list_comments').show();							

						}

						else

						{ 

							alert('<?=_themkhongduoc?>'); 

						}

					} 

				}); 

			}else alert("Email không đúng format 'Email@domain'!");

		}

		else{

			alert("<?=_nhapddtt?>!");

		}

	}



	function fs_add_product_command()

	{	

		var _id = '<?=$tintuc_detail["id"]?>';

		var _name = $('#txtPcommandName').val();		

		var _notes = $('#txtPcommandNotes').val();

var _email =  $('#txtPcommandEmail').val();

		if( _name != "" && _notes != "" && _email != "")	{

if(IsEmail(_email)){				

$.ajax ( {

					type: "POST",

					url: "sacviet/lib/model_blog.php",

					data: { id : _id , name : _name, comment : _notes, email : _email},

					success: function(html){ 

						if(html != "")

						{ 

							alert('<?=_themthanhcong?>'); 													

							$('#product_list_comments').prepend(html);			

							$('#product_form_comment').hide(); 

							$('#product_list_comments').show();							

						}

						else

						{ 

							alert('<?=_themkhongduoc?>'); 

						}

					} 

				}); }else alert("Email không đúng format 'Email@domain'!");

		}

		else{

			alert("<?=_nhapddtt?>!");

		}

	}

	

	function IsEmail(email) {



	  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;



	  return regex.test(email);



	}

</script>
<style type="text/css">
table#layout {
	font-size: 100%;
	width: 100%;
	table-layout: fixed;
}
table#layout {
	font-size: 100%;
	width: 100%;
}
td#middle {
	vertical-align: top;
	width: 70%;
	padding: 10px 15px;
}
div.post, div.page {
	display: block;
	margin: 0 0 30px 0;
}
td#right {
vertical-align: top;
border-left: dashed 1px #CCCCCC;
padding: 10px 10px 10px 10px;
background: #ffffff;
}
</style>
<div id="ja-container" class="wrap ja-r1">
  <div class="main clearfix">
    <div id="ja-mainbody" style="width:90%">
      <table>
        <tr id="bodyrow"> 
          
          <!-- Main Column -->
          <td id="middle">
          <div class="post-1395 post type-post status-publish format-standard hentry category-travel-tips category-xo-tours tag-copycat tag-fake tag-hanoi tag-motorbike-tours tag-scam tag-unsafe tag-xo-tours odd" id="post-1395">
              <div class="post-headline">
                <h2> <a href="news/<?=$tintuc_detail['id']?>-<?=$tintuc_detail['tenkhongdau']?>.html" rel="bookmark" title="<?=$tintuc_detail["ten_$lang"]?>">
                  <?=$tintuc_detail["ten_$lang"]?>
                  </a></h2>
                <p class="date">
                  <?=date('M D,Y',$tintuc_detail['ngaytao'])?>
                  by <a href="javascript:;">
                  <?=$tintuc_detail["nguoitao"]?>
                  </a> </p>
              </div>
              <div class="post-bodycopy clearfix">
                <div id="attachment_1398" style="width: 650px" class="wp-caption aligncenter"> <img class="wp-image-1398 size-large" src="<?="upload/news/".$tintuc_detail['photo']?>" alt="<?=$tintuc_detail["ten_$lang"]?>" width="620" height="425"></div>
                <br />
                <?=$tintuc_detail["noidung_$lang"]?>
                <br />
                <div class="tags_bar box_width_common">

<div style="width:100%;margin-top:20px;">

<img src="images/tags.jpg" style="float: left;"></img>

<h3 class="title-pro-new"style="font-weight: bold;">Tags</h3></div>

<div style="margin-left:10px; width: 88%;float:left">

<?php

								$d->reset();

								$sql_tag = "select NT.id,ten_vi,ten_en from #_blogs_tags NT inner join #_tags T on NT.tag_id = T.id  where blog_id = '".$tintuc_detail["id"]."'";																

$d->query($sql_tag);

								$items_tag = $d->result_array();

								if(!empty($items_tag)){

									for($t=0,$count_ccc=count($items_tag);$t<$count_ccc;$t++){

								?>

								<a class="txt_blue" style="color:#ccc;" href="tag/keyword=<?=$items_tag[$t]["ten_$lang"]?>"><?=$items_tag[$t]["ten_$lang"]?><?php if($t == ($count_ccc - 1)) echo ""; else echo ","; ?></a>

								<?php

									}

								}

								?>



                      

 </div>

</div>
</div>
<br />
                <li class="commentblog" style="min-height: 450px;">
                  <ul class="pro_txtcomment" onclick="javascript:$('#product_form_comment').show();$('#btnsend').show();$('#btnsendsub').hide();">
                    <p class="leave_comment"style="">Leave a Reply</p>
                  </ul>
                  <div class="com_content1" style="height:300px;overflow: auto;float: left;" >
                    <div id="product_form_comment" class="blog_leavecom" style="display:none;">
                      <ul style="width:100%;float:left;padding-bottom:10px">
                        <li>
                          <input class="" type="text" id="txtPcommandName" value="" title="" style="width:90%; height:31px; float:left;margin-right: 20px;margin-bottom: 20px;" placeholder="Name">
                        </li>
                        <li>
                          <input id="txtPcommandEmail" class="" type="text" value="" title="" style="width:90%; height:31px; float:left;margin-bottom: 20px;" placeholder="Email">
                        </li>
                      </ul>
                      <ul style="width:90%;float:left;margin-bottom:10px">
                        <textarea id="txtPcommandNotes" style="" placeholder="Notes" cols="10" rows="2"></textarea>
                      </ul>
                      <ul  style="width:100%;float:left;padding-top:10px">
                        <button id="btnsend" class="" type="button" onclick="fs_add_product_command();"> Send </button>
                        <button id="btnsendsub" class="" type="button" onclick="fs_add_product_command_sub();"> Send </button>
                        <button id="" class="" type="button" style="" onclick="javascript:$('#product_form_comment').hide(); $('#product_list_comments').show();"> Close </button>
                      </ul>
                      <ul class="pro_txtcomment">
                        <p class="leave_comment"style="">&nbsp;</p>
                      </ul>
                    </div>
                    <div class="com_content_detail" id="product_list_comments" style="overflow: auto;">
                      <?php



								$d->reset();



								$sql_detail_comment = "select id, ten,ngaytao,noidung,email from #_blog_comment where id_blog='".$tintuc_detail['id']."' and parentid is null order by id desc";



								//echo $sql_detail_comment;



								$d->query($sql_detail_comment);



								$row_detail_comment = $d->result_array();



								if(!empty($row_detail_comment)){



									for($j=0,$count_cc=count($row_detail_comment);$j<$count_cc;$j++){



								?>
                      <ul class="deblog_load_comemt">
                        <li class="deblog_comm" style="background: rgba(204, 204, 204, 0.05);
width: 600px;">
                          <p class="photo_comm_name" style="text-align: left;
text-transform: capitalize;">
                            <?=$row_detail_comment[$j]['ten']?>
                          </p>
                          <p class="photo_comm_name" style="font-size: 10pt;">
                            <?=$row_detail_comment[$j]['email']?>
                          </p>
                          <p class="photo_com_date" style="font-size: 10pt;">
                            <?=date('M D,Y',$row_detail_comment[$j]['ngaytao'])?>
                          </p>
                        </li>
                        <li class="deblog_comm"style="">
                          <?=$row_detail_comment[$j]['noidung']?>
                        </li>
                        <li class="txtreply"style="float:right"  onclick="javascript:$('#product_form_comment').show(); $('#btnsend').hide();$('#btnsendsub').show(); $('#txtid_sub').val('<?=$row_detail_comment[$j]['id']?>');">
                          <?=_traloi?>
                        </li>
                      </ul>
                      <div id="sub_comment_<?=$row_detail_comment[$j]["id"]?>" style="background-color:rgb(246, 246, 246);margin-left:30px;float:left;width:96%">
                        <?php

								$d->reset();

								$sql_detail_comment_sub = "select id,ten,email,ngaytao,noidung from #_blog_comment where id_blog='".$tintuc_detail["id"]."' and parentid = '".$row_detail_comment[$j]["id"]."' order by id desc";

								$d->query($sql_detail_comment_sub);

								$sql_detail_comment_sub = $d->result_array();

								if(!empty($sql_detail_comment_sub)){

									for($k=0,$count_ccc=count($sql_detail_comment_sub);$k<$count_ccc;$k++){

								?>
                        <ul>
                          <li style="float:left;min-width:50px;text-align:left;font-weight:bold;color(113, 103, 94)">
                            <?=$sql_detail_comment_sub[$k]['ten']?>
                          </li>
                          <li style="float:left;min-width:50px;text-align:left;font-weight:bold;color(113, 103, 94)">
                            <?=$sql_detail_comment_sub[$k]['email']?>
                          </li>
                          <li style="float:left;text-align:left;font-weight:bold;color: rgb(206,206,206);padding-left:10px">
                            <?=date('M D,Y',$sql_detail_comment_sub[$k]['ngaytao'])?>
                          </li>
                          <li style="width:100%;text-align:left;float:left;margin-left:20px">
                            <?=$sql_detail_comment_sub[$k]['noidung']?>
                          </li>
                          <li class="" style="float:left;border-bottom: 1px dashed rgb(204, 204, 204);width:100%"></li>
                        </ul>
                        <?php

									}

								}

								?>
                      </div>
                      <?php



									}



								}



								?>
                    </div>
                  </div>
                </li>
              </div>
           
             </td>
          <td id="right">
          <div id="share-buttons"> <a href="<?= $row_setting['googleplus_link'] ?>" target="_blank"> <img src="images/Google+.png" alt="Google" /> </a> <a href="<?= $row_setting['linkedin_link'] ?>" target="_blank"> <img src="images/linkedin_32.png" alt="linkedin" /> </a> <a href="<?= $row_setting['facebook_link'] ?>" target="_blank"> <img src="images/Facebook.png" alt="Facebook" /> </a> <a href="<?= $row_setting['twitter_link'] ?>" target="_blank"> <img src="images/twitter.png" alt="Twitter" /> </a> </div>
            <div id="search-6" class="widget widget_search">
               <?php include _template."layout/search.php"; ?>
            </div>
            <div id="categories-2" class="widget widget_categories">
              <div class="widget-title">
                <h3>Categories</h3>
              </div>
              <ul>
              
                 <?php

						$d->reset();

						$sql_cat="select ten_$lang,tenkhongdau,id from #_blog_item where hienthi=1 ";

						$d->query($sql_cat);

						$blog_cat = $d->result_array();

						if(count($blog_cat)>0){

							for($i=0,$count_cat=count($blog_cat);$i<$count_cat;$i++){

					?>
                <li class="cat-item cat-item-28"><a href="news/<?=$blog_cat[$i]['id']?>-<?=$blog_cat[$i]['tenkhongdau']?>/"><?=$blog_cat[$i]["ten_$lang"]?></a> </li>
                <?php

							}

						}

					?>

                
              </ul>
            </div>        
            
            </td>
          <!-- / Right Sidebar --> 
          
        </tr>
      </table>
    </div>
  </div>
</div>
