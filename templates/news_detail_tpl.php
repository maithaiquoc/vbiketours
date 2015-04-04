<?php

	$id_set = $tintuc_detail[0]['id_item'];



$d->reset();

			$sql_contact = "select * from #_setting ";

			$d->query($sql_contact);

			$row_setting = $d->fetch_array();



?>



<script>

function fs_add_product_command_sub()

	{	

	var id_sub = $('#txtid_sub').val();

		var _id = '<?=$tintuc_detail[0]["id"]?>';

		var _name = $('#txtPcommandName').val();		

		var _notes = $('#txtPcommandNotes').val();

		var _email =  $('#txtPcommandEmail').val();

		if( _name != "" && _notes != "" && _email != ""){

                                if(IsEmail(_email)){

				$.ajax ( {

					type: "POST",

					url: "sacviet/lib/model_news_sub.php",

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

		var _id = '<?=$tintuc_detail[0]["id"]?>';

		var _name = $('#txtPcommandName').val();		

		var _notes = $('#txtPcommandNotes').val();

var _email =  $('#txtPcommandEmail').val(); 

		if( _name != "" && _notes != "" && _email  != "")	{

if(IsEmail(_email)){

				$.ajax ( {

					type: "POST",

					url: "sacviet/lib/model_news.php",

					data: { id : _id , name : _name, comment : _notes, email : _email  },

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

				}); 

}else alert("Email không đúng format 'Email@domain'!");

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



<div class="left">				

            	<!-- NEWS Detail ----------------------------------------------------------------->         

                <div class="tintuc_news_detail" id ="img_set"style="margin:25px 5px 5px 10px; width:100%;">

					<div class="title_news"><?=$tintuc_detail[0]['ten_'.$lang]?></div>                    

                    <div class="news_detail_content" style="max-height: 1200px;">

                    	<?=$tintuc_detail[0]['noidung_'.$lang]?>

                    </div>





<div class="tags_bar box_width_common">

<div style="width:100%;margin-top:20px;">

<img src="images/tags.jpg" style="float: left;"></img>

<h3 class="title-pro-new"style="">Tags</h3></div>

<div style="margin-left:10px; width: 88%;margin-top: 21px;float:left">

                 <?php

								$d->reset();

								$sql_tag = "select distinct NT.id,ten_vi,ten_en from #_news_tags NT inner join #_tags T on NT.tag_id = T.id  where new_id = '".$tintuc_detail[0]["id"]."'";																

$d->query($sql_tag);

								$items_tag = $d->result_array();

								if(!empty($items_tag)){

									for($t=0,$count_ccc=count($items_tag);$t<$count_ccc;$t++){

								?>

								<a class="txt_blue" style="color:#ccc;font-weight:bold" href="tag/keyword=<?=$items_tag[$t]["ten_$lang"]?>" ><?=$items_tag[$t]["ten_$lang"]?><?php if($t == ($count_ccc - 1)) echo ""; else echo ","; ?></a>

								<?php

									}

								}

								?>     

</div>

    </div>                  





<div class="clear"></div>

<div id="share-buttons">



<a href="<?= $row_setting['googleplus_link'] ?>" target="_blank">

 <img src="images/Google+.png" alt="Google" />

</a>



<a href="<?= $row_setting['linkedin_link'] ?>" target="_blank">

<img src="images/linkedin_32.png" alt="linkedin" />

</a>



<a href="<?= $row_setting['facebook_link'] ?>" target="_blank">

<img src="images/Facebook.png" alt="Facebook" />

</a>





<a href="<?= $row_setting['twitter_link'] ?>" target="_blank">

<img src="images/twitter.png" alt="Twitter" />

</a>

 

</div>

			<li class="commentblog">

						<p class="namecomment" style="float:left;"><?=_ykienkhachhang?> </p> 

												

													<ul class="pro_txtcomment" onclick="javascript:$('#product_form_comment').show();$('#btnsend').show();$('#btnsendsub').hide();"><p style=""><?=_ykiencuaban?> </p></ul>

						<div class="com_content" style="height:400px" >

<div id="product_form_comment" class="blog_leavecom" style="display:none;">								



								<ul style="width:100%;float:left;padding-bottom:10px">

                                                  <li> <input class="" type="text" id="txtPcommandName" value="" title="" style="width:90%; height:31px; float:left;margin-right: 20px;" placeholder="Name"></li>



							<li>     <input id="txtPcommandEmail" class="" type="text" value="" title="" style="width:90%; height:31px; float:left;" placeholder="Email"></li>

                                                             </ul>



								<ul style="width:83%;float:left;margin-bottom:10px"><textarea id="txtPcommandNotes" style="" placeholder="Notes" cols="10" rows="2"></textarea></ul>



							<ul  style="width:100%;float:left;padding-top:10px">	

                                         <button id="btnsend" class="" type="button" onclick="fs_add_product_command();"> Send </button>

<button id="btnsendsub" class="" type="button" onclick="fs_add_product_command_sub();"> Send </button>

								<button id="" class="" type="button" style="" onclick="javascript:$('#product_form_comment').hide(); $('#product_list_comments').show();"> Close </button>	

                                                          </ul>



							</div>

							<div class="com_content_detail" id="product_list_comments">

								<?php

								$d->reset();

								$sql_detail_comment = "select id, ten,ngaytao,noidung,email from #_new_comment where id_new='".$tintuc_detail[0]["id"]."' and parentid is null order by id desc";

								//echo $sql_detail_comment;

								$d->query($sql_detail_comment);

								$row_detail_comment = $d->result_array();

								if(!empty($row_detail_comment)){

									for($j=0,$count_cc=count($row_detail_comment);$j<$count_cc;$j++){

								?>

								<ul class="deblog_load_comemt">

											<li class="deblog_comm" style=""><p class="photo_comm_name"><?=$row_detail_comment[$j]['ten']?> </p><p class="photo_comm_email"><?=$row_detail_comment[$j]['email']?> </p><p class="photo_com_date"><?=date('d-m-Y h:i:s A',$row_detail_comment[$j]['ngaytao'])?></p></li>											

											<li class="deblog_comm"style="">

											<?=$row_detail_comment[$j]['noidung']?>

											</li>



<li class="txtreply"style=""  onclick="javascript:$('#product_form_comment').show(); $('#btnsend').hide();$('#btnsendsub').show(); $('#txtid_sub').val('<?=$row_detail_comment[$j]['id']?>');"><?=_traloi?></li>

								</ul>



<div id="sub_comment_<?=$row_detail_comment[$j]["id"]?>" style="background-color:rgb(246, 246, 246);margin-left:30px;float:left;width:93%">

								<?php

								$d->reset();

								$sql_detail_comment_sub = "select id,ten,email,ngaytao,noidung from #_new_comment where id_new='".$tintuc_detail[0]["id"]."' and parentid = '".$row_detail_comment[$j]["id"]."' order by id desc";

								$d->query($sql_detail_comment_sub);

								$sql_detail_comment_sub = $d->result_array();

								if(!empty($sql_detail_comment_sub)){

									for($k=0,$count_ccc=count($sql_detail_comment_sub);$k<$count_ccc;$k++){

								?>

								<ul>

								<li style="float:left;min-width:50px;text-align:left;font-weight:bold;color(113, 103, 94)"><?=$sql_detail_comment_sub[$k]['ten']?></li>

									<li style="float:left;min-width:50px;text-align:left;font-weight:bold;color(113, 103, 94)"><?=$sql_detail_comment_sub[$k]['email']?></li>

									<li style="float:left;text-align:left;font-weight:bold;color: rgb(206,206,206);padding-left:10px"><?=date('d-m-Y h:i:s A',$sql_detail_comment_sub[$k]['ngaytao'])?></li>	

									<li style="width:100%;text-align:left;padding-top:10px;float:left;">

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

				<div class="clear"></div>

                <!-- Sub updating news ----------------------------------------------------------------->

                <div class="news_detail_sub_newsupdate" style="margin:20px">                	

						<div class="title_news"><?=_cacbaikhac?></div> 

						<div class="clear"></div>

                    	<ul class="news_detail_sub_newsupdate_title" style="padding-left:0px; margin-top:10px;">

                        	<?php

								$d->reset();

								$sql_tintuc_lienquan = "select ten_$lang,tenkhongdau,mota_$lang,thumb,id,ngaytao,luotxem,nguoitao from #_news where hienthi=1 and id_item ='".$tintuc_detail[0]['id_item']."' order by stt,ngaytao desc limit 0,12";

								$d->query($sql_tintuc_lienquan); 



								$tintuc_lienquan = $d->result_array();

								if(!empty($tintuc_lienquan)){

									for($i=0,$count_cc=count($tintuc_lienquan);$i<$count_cc;$i++)

									{										

											?>

												<li>													

													<img src="images/icon_arrow_default_news.png" style="margin-right:15px" />

													<a href="tin-tuc/<?=$tintuc_lienquan[$i]['id']?>-<?=$tintuc_lienquan[$i]['tenkhongdau']?>.html">

													<?=$tintuc_lienquan[$i]["ten_$lang"]?> <?=date('d-m-Y h:i:s A',$tintuc_lienquan[$i]['ngaytao'])?> by <?=$tintuc_lienquan[$i]["nguoitao"]?>

													</a>

												</li>

											<?php																			

									}

								}

							?>                            

                        </ul>

                </div>

      

        	</div>



<input type="text" style="display:none;" id="txtid_sub" />