<script type="text/javascript">
function doEnter(evt){
	// IE					// Netscape/Firefox/Opera
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch(evt);
	}
}
function onSearch(evt) {	
		var keyword = document.getElementById("keyword").value;		
		//var encoded = Base64.encode(keyword);
		location.href = "index.php?com=dattour&act=man&keyword="+keyword;
		loadPage(document.location);
			
}

</script>

Tìm kiếm: <input name="keyword" id="keyword" type="text" /> <input type="button" value=" Tìm "  onclick="onSearch(event)"/>
<table class="blue_table">
	<tr>
		<th style="width:5%;">Stt</th>		    
        <th style="width:10%;">Tên  </th>
        <th style="width:10%;">Số đt  </th>
        <th style="width:10%;">Email  </th>
        <th style="width:10%;">Ngày đi  </th>
        <th style="width:10%;">Nơi đi  </th>
        <th style="width:10%;">Nơi đến  </th> 
		<th style="width:5%;">Số người</th>
        <th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$i+1?></td>
		       
        <td style="width:10%;"><a href="javascript:void(0)" style="text-decoration:none;"><?=$items[$i]['ten_vi']?></a></td>
        <td style="width:10%;"><?=$items[$i]['sodt']?></td>
         <td style="width:10%;"><?=$items[$i]['email']?></td>                                 
          <td style="width:10%;"><?=$items[$i]['ngaydi']?></td>
         <?php
       //Xac sinh noi di  noi den
		$d->reset();
		$sql_ks="SELECT`id`,`ten_vi`,`tenkhongdau` FROM #_tour where `hienthi`=1 and id=".$items[$i]['noidi']." ORDER BY stt,id ASC";
		$d->query($sql_ks);
		$result_noidi=$d->fetch_array();
		
		$d->reset();
		$sql_ks1="SELECT`id`,`ten_vi`,`tenkhongdau` FROM #_tour where `hienthi`=1 and id=".$items[$i]['noiden']." ORDER BY stt,id ASC";
		$d->query($sql_ks1);
		$result_noiden=$d->fetch_array();
		?>
        <td style="width:10%;"><?=$result_noidi['ten_vi']?></td>
        <td style="width:10%;"><?=$result_noiden['ten_vi']?></td>
         <td style="width:5%;"><?=$items[$i]['songuoi']?></td>
        <td style="width:5%;"><a href="index.php?com=dattour&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>

<div class="paging"><?=$paging['paging']?></div>