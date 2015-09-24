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
.newblog img {
text-align: left;
float: left;
width: 32%;
padding-right: 25px;
}
.newblog li {
margin-top: 20px;
float: left;
width: 100%;
padding-bottom: 20px;
border-bottom: 1px dashed #ccc;
}
</style>
<div id="ja-container" class="wrap ja-r1 container-fluid">
  <div class="main clearfix">
    <div id="ja-mainbody" style="width:90%">
        <ul class="breadcrumb">
            <li><a href="">Home</a></li>
            <li><a href="/<?=$com?>.html"><?=ucfirst($com)?></a></li>
        </ul>
      <table>
        <tr id="bodyrow"> 
          
          <!-- Main Column -->
          <td id="middle">
          <div class="post-1395 post type-post status-publish format-standard hentry category-travel-tips category-xo-tours tag-copycat tag-fake tag-hanoi tag-motorbike-tours tag-scam tag-unsafe tag-xo-tours odd" id="post-1395">
              <div class="post-headline">
                <ul class="newblog">

					<?php

	

		   if(count($tintuc)>0){



		   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){



	   ?>

			<li>

							<img src="<?="upload/news/".$tintuc[$i]['thumb']?>" alt="banner" title="" style="margin-top:7px;">

																	

								<h3>    <a class="blog_name"href="news/<?=$tintuc[$i]['id']?>-<?=$tintuc[$i]['tenkhongdau']?>.html"><?=$tintuc[$i]['ten_'.$lang]?></a> </h3>

								<p class="date">

									<?=date('M D,Y',$tintuc[$i]['ngaytao'])?> by <a href="javascript:;"><?=$tintuc[$i]["nguoitao"]?>  



</a>

								</p>

								<p class="des_new">

									<?=$tintuc[$i]["mota_$lang"]?>  

								</p>

			

				

				   <?php } }else echo '<p> _seecataproError</p>';  ?>               

			</li>



				<div class="clear"></div>

				<div class="phantrang" style="text-align:center" ><?=$paging['paging']?></div>  



			</ul>
                
</div>
<br />
                
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
