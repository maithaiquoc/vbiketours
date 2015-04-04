 <form name="frm_search" id="frm_search" method="get" action="tim-kiem/" onsubmit="return false;" style="margin-bottom: 20px;
margin-top: 20px;">



            <input type="input" class="	" id="keyword" name="keyword" value="" onkeypress="doEnter(event)" onblur="if(this.value=='') this.value='Search'" style="color:#888;width: 163px;" onfocus="if(this.value =='Tìm kiếm' ) this.value=''" />



            <input  value="ok" name="sreachAct" id="btnSearch" class="submit" type="image" src="images/icon_search.png" style="padding-top:2px" />



        </form>

        

        

       

							



         <script type="text/javascript">



		$(function(){



			$('#btnSearch').click(function(evt){



				onSearch(evt);



			});



		});



		function onSearch(evt){



			var keyword = document.frm_search.keyword;



			if( keyword.value == '' || keyword.value ==='Tìm kiếm'){alert('Bạn chưa nhập từ khóa tìm kiếm!'); keyword.focus(); return false;}



			location.href='http://<?=$config_url?>/tim-kiem/keyword='+keyword.value;	



		}



		



		function doEnter(evt){



		// IE					// Netscape/Firefox/Opera



		var key;



		if(evt.keyCode == 13 || evt.which == 13){



			onSearch(evt);



		}else{



			return false;	



		}



		}



		</script>



        