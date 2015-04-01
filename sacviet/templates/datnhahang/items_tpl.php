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
		location.href = "index.php?com=datnhahang&act=man&keyword="+keyword;
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
        <th style="width:10%;">Ngày đặt  </th>
        <th style="width:10%;">Nhà hàng  </th> 
		<th style="width:5%;">Số người</th>
        <th style="width:5%;">Xóa</th>
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"><?=$i+1?></td>
		       
        <td style="width:10%;"><a href="javascript:void(0)" style="text-decoration:none;"><?=$items[$i]['ten_vi']?></a></td>
        <td style="width:10%;"><?=$items[$i]['sodt']?></td>
         <td style="width:10%;"><?=$items[$i]['email']?></td>                                 
          <td style="width:10%;"><?=$items[$i]['ngaydat']?></td>
         <?php
         //Xac dinh nhà hàng
		$d->reset();
		$sql_ks="SELECT`id`,`ten_vi`,`tenkhongdau` FROM #_nhahang where `hienthi`=1 and id=".$items[$i]['loainhahang']." ORDER BY stt,id ASC";
		$d->query($sql_ks);
		$result_ks=$d->fetch_array();
		?>
        <td style="width:10%;"><?=$result_ks['ten_vi']?></td>
         <td style="width:5%;"><?=$items[$i]['songuoi']?></td>
        <td style="width:5%;"><a href="index.php?com=datnhahang&act=delete&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" /></a></td>
	</tr>
	<?php	}?>
    </table>

<div class="paging"><?=$paging['paging']?></div>