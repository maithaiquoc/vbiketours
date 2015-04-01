$(document).ready(function() {	
	$(".lienhe_form > .loader").hide();
	var flagLH = $("#flagLH").val();
	if(flagLH == "1") {
		$(".lienhe_form > .success").slideDown('slow');
	}
	
	$("#submitContact").click(function() {
		$(".lienhe_form > .success").hide();
		var name = $("#txtName").val();
		var email=$("#txtEmail").val();
		var phone=$("#txtPhone").val();
		var address=$("#txtAddress").val();
		var title=$("#txtTitle").val();
		var content=$("#txtContent").val();

        if(name == "") {
            $("#nameError").slideDown('fast').delay(3000).slideUp('fast');
            $("#txtName").focus();
            return false;
        }
		
		if(email == "") {
            $("#emailError").slideDown('fast').delay(3000).slideUp('fast');
            $("#txtEmail").focus();
            return false;
        }
		
		var x=$("#txtEmail").val();
		var atpos=x.indexOf("@");
		var dotpos=x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
		{
			$("#emailError1").slideDown('fast').delay(3000).slideUp('fast');
			$("#txtEmail").focus();
            return false;
		}
		if(title == "") {
            $("#titleError").slideDown('fast').delay(3000).slideUp('fast');
            $("#txtTitle").focus();
            return false;
        }
		
		if(content == "") {
            $("#contentError").slideDown('fast').delay(3000).slideUp('fast');
            $("#txtContent").focus();
            return false;
        }
		
		
        $(".lienhe_form > .loader").html("<img src='images/ajax-loader.gif' />").fadeIn('fast').delay(2000).fadeOut('fast');
	});
	
});

