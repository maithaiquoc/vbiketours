<?php
function get_main_category()
	{
		$sql="select * from table_news_cat order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat" class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	?>
<h3>Thêm danh mục</h3>

<form name="frm" method="post" action="index.php?com=dichvu&act=save_cat" enctype="multipart/form-data" class="nhaplieu">
	<div style="display:none"><b>Danh mục:</b><?=get_main_category();?><br /><br />   </div> 
    <b>Tên</b> <input type="text" name="ten_vi" value="<?=$item['ten_vi']?>" class="input" /><br />
    <b>Tên ( english )</b> <input type="text" name="ten_en" value="<?=$item['ten_en']?>" class="input" /><br />
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />   	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=dichvu&act=man_cat'" class="btn" />
</form>