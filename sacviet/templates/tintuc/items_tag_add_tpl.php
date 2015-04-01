<?php
if (isset($_POST['btnsubmit'])){
if(!empty($_POST['check_list'])) {
$id = $_GET['id'];
    foreach($_POST['check_list'] as $check) {
            if(IsChecked('check_list',$check))
            {
               $d->reset();
               $sql = "insert into #_news_tags(new_id,tag_id) values ('".$id."','".$check."')";
	       $d->query($sql);
            }
    }
}
redirect("index.php?com=news&act=man_tag&id=".$_GET['id']."");
}

function IsChecked($chkname,$value)
    {
        if(!empty($_POST[$chkname]))
        {
            foreach($_POST[$chkname] as $chkval)
            {
                if($chkval == $value)
                {
                    return true;
                }
            }
        }
        return false;
    }

?>

<form name="frm" method="post" action="" class="nhaplieu">

<h3><a href="index.php?com=bosuutap&amp;act=add">Thêm tag</a></h3>

<table class="blue_table">


	<tr>	

<th style="width:25%;">Chọn</th>
	
        <th style="width:25%;">Tên vi</th>

		<th style="width:25%;">Tên en</th>

	</tr>


	<?php for($i=0, $count=count($items); $i<$count; $i++){?>


	<tr>

<td style="width:5%;"><input type="checkbox" name="check_list[]" value="<?=$items[$i]['id']?>" /></td>   
		<td style="width:5%;"><?=$items[$i]['ten_vi']?></td>      


       <td style="width:25%;"><?=$items[$i]['ten_en']?></td>



		


	</tr>


	<?php	}?>


    </table>


<input type="submit" name="btnsubmit" value="Thêm" class="btn">
<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=news&act=man_tag&id=<?= $_GET['id'] ?>'" class="btn">
</form>
