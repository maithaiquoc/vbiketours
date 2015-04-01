/***************************/
//@Author: Adrian "yEnS" Mato Gondelle & Ivan Guardado Castro
//@website: www.yensdesign.com
//@email: yensamg@gmail.com
//@license: Feel free to use it, but keep this credits please!					
/***************************/

$(document).ready(function(){
	//global vars
	var form = $("#customForm");
	var nick = $("#nick");
	var nickInfo = $("#nickInfo");
	var name = $("#name");
	var nameInfo = $("#nameInfo");
	var email = $("#email");
	var emailInfo = $("#emailInfo");
	var pass1 = $("#pass1");
	var pass1Info = $("#pass1Info");
	var pass2 = $("#pass2");
	var pass2Info = $("#pass2Info");
	var Newpass1 = $("#Newpass1");
	var Newpass1Info = $("#Newpass1Info");
	var Newpass2 = $("#Newpass2");
	var Newpass2Info = $("#Newpass2Info");
	
	//On blur
	name.blur(validateName);
	nick.blur(validateNick);
	email.blur(validateEmail);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	Newpass1.blur(validateNewPass1);
	Newpass2.blur(validateNewPass2);
	//On key press
	name.keyup(validateName);
	nick.keyup(validateNick);
	pass1.keyup(validatePass1);
	pass2.keyup(validatePass2);
	Newpass1.keyup(validateNewPass1);
	Newpass2.keyup(validateNewPass2);
	//On Submitting
	form.submit(function(){
		if(validateName() & validateNick() & validateEmail() & ((validatePass1() & validatePass2()) | (validateNewPass1() & validateNewPass2())))
			return true
		else
			return false;
	});
	
	//validation functions
	function validateEmail(){
		//testing regular expression
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
		if(filter.test(email.val())){
			email.removeClass("error");
			emailInfo.text("Hợp lệ!");
			emailInfo.removeClass("Infoerror");
			return true;
		}
		//if it's NOT valid
		else{
			email.addClass("error");
			emailInfo.text("Nhập đúng định dạng Email!");
			emailInfo.addClass("Infoerror");
			return false;
		}
	}
	function validateName(){
		//if it's NOT valid
		var filter = /[0-9_-]|@|#|%|&/;
		if(name.val().length < 5){
			name.addClass("error");
			nameInfo.text("Tên phải lớn hơn 4 ký tự!");
			nameInfo.addClass("Infoerror");
			return false;
		}
        else if(filter.test(name.val())){
			name.addClass("error");
			nameInfo.text("Tên chỉ gồm: Chữ");
			nameInfo.addClass("Infoerror");
            return false;
        }
		//if it's valid
		else{
			name.removeClass("error");
			nameInfo.text("Tên hợp lệ!");
			nameInfo.removeClass("Infoerror");
			return true;
		}
	}
	function validateNick(){
		//if it's NOT valid
		var filter = /^[a-zA-Z]+[a-zA-Z0-9_]+[a-zA-Z0-9]$/;
		if(nick.val().length < 4){
			nick.addClass("error");
			nickInfo.text("Username phải lớn hơn 3 ký tự!");
			nickInfo.addClass("Infoerror");
			return false;
		}
        else if(filter.test(nick.val())){
			nick.removeClass("error");
			nickInfo.text("Tên hợp lệ!");
			nickInfo.removeClass("Infoerror");
			return true;
        }
		//if it's valid
		else{
			nick.addClass("error");
			nickInfo.text("Username bắt đầu bằng chữ, chỉ gồm: chữ, số và _");
			nickInfo.addClass("Infoerror");
            return false;
		}
	}
	function validatePass1(){
	   if(pass1.val() != null){
    		var filter = /[ ]/;
    
    		//it's NOT valid
    		if(pass1.val().length <5){
    			pass1.addClass("error");
    			pass1Info.text("Mật khẩu lớn hơn 5 ký tự");
    			pass1Info.addClass("Infoerror");
    			return false;
    		}
            else if(filter.test(pass1.val())){
    			pass1.addClass("error");
    			pass1Info.text("Mật khẩu không được có dấu cách!");
    			pass1Info.addClass("Infoerror");
    			return false;
            }
    		//it's valid
    		else{			
    			pass1.removeClass("error");
    			pass1Info.text("Hợp lệ!");
    			pass1Info.removeClass("Infoerror");
    			validatePass2();
    			return true;
    		}
        }
	}
	function validatePass2(){
	   if(pass2.val() != null){
    		//are NOT valid
    		if( pass1.val() != pass2.val() ){
    			pass2.addClass("error");
    			pass2Info.text("Hai mật khẩu không giống nhau!");
    			pass2Info.addClass("Infoerror");
    			return false;
    		}
    		//are valid
    		else{
    			pass2.removeClass("error");
    			pass2Info.text("Hợp lệ!");
    			pass2Info.removeClass("Infoerror");
    			return true;
    		}
        }
	}
	function validateNewPass1(){
	   if(Newpass1.val() != null){
    		var filter = /[ ]/;
            if(Newpass1.val().length == 0){
    			Newpass1.removeClass("error");
    			Newpass1Info.text("");
    			Newpass1Info.removeClass("Infoerror");
    			return true;
    		}
    		//it's NOT valid
    		else if(Newpass1.val().length <5){
    			Newpass1.addClass("error");
    			Newpass1Info.text("Mật khẩu lớn hơn 5 ký tự");
    			Newpass1Info.addClass("Infoerror");
    			return false;
    		}
            else if(filter.test(Newpass1.val())){
    			Newpass1.addClass("error");
    			Newpass1Info.text("Mật khẩu không được có dấu cách!");
    			Newpass1Info.addClass("Infoerror");
    			return false;
            }
    		//it's valid
    		else{			
    			Newpass1.removeClass("error");
    			Newpass1Info.text("Hợp lệ!");
    			Newpass1Info.removeClass("Infoerror");
    			validateNewPass2();
    			return true;
    		}
        }
	}
	function validateNewPass2(){
	   if(Newpass2.val() != null){
    		//are NOT valid
    		if( Newpass1.val() != Newpass2.val() ){
    			Newpass2.addClass("error");
    			Newpass2Info.text("Hai mật khẩu không giống nhau!");
    			Newpass2Info.addClass("Infoerror");
    			return false;
    		}
    		//are valid
    		else{
    			Newpass2.removeClass("error");
    			Newpass2Info.text("Hợp lệ!");
    			Newpass2Info.removeClass("Infoerror");
    			return true;
    		}
      }
	}
});