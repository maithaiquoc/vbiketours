<script>

function submitdata()

{

var keyword = document.getElementById("traloi").value;		

if(keyword  == "") {alert("Please enter the text replies."); document.getElementById("traloi").focus();} else document.frm.submit();

}

</script>

<h3>View info Contact</h3>



<form name="frm" method="post" action="index.php?com=contact&act=save" enctype="multipart/form-data" class="nhaplieu">

<br />

	<b>Name</b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br />

    <b>Email</b> <input type="text" name="email" value="<?=@$item['email']?>" class="input" /><br />

    <b>Date send</b> <input type="text" name="ngaytao" value="<?=make_date(@$item['ngaytao'])?>" class="input" /><br />

    <b>Subject</b> <input type="text" name="subject" value="<?=@$item['subject']?>" class="input" /><br />

    

	<b>Content</b>

    <div>

    <textarea name="noidung" name="noidung" cols="50" rows="10"><?=@$item['noidung']?></textarea>

  </div>

<br />

<b>Reply</b>

    <div>

    <textarea name="traloi" id="traloi" name="traloi" cols="50" rows="10"><?=@$item['noidungtraloi']?></textarea>

  </div>

	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />

<input type="button" value="Reply" onclick="javascript:submitdata();" class="btn" />

	<input type="button" value="Exit" onclick="javascript:window.location='index.php?com=contact&act=man'" class="btn" />

</form>