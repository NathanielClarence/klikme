// SIGN UP
$(document).ready(function(){
	$("#uname").blur(checkUsername);
	$("#name").blur(checkName);
	$("#email").blur(checkEmail);
	$("#remail").blur(checkEmail);
	$("#pwd").blur(checkPassword);
	$("#repwd").blur(checkPassword);
	$("#font").change(changeFont);
});

function checkUsername(){
	var uname = $("#uname").val();

	if (uname == ""){
		$("#pesanUname").text("Username field is required");
		$("#pesanUname").addClass("error");
	}
	else{
		$("#pesanUname").text("");
	}
}

function checkName(){
	var name = $("#name").val();

	if (name == ""){
		$("#pesanName").text("Full name field cannot be blank");
		$("#pesanName").addClass("error");
	}
	else{
		$("#pesanName").text("");
	}
}

function checkEmail(){
	var email = $("#email").val();
	var remail = $("#remail").val();

	if (email != remail){
		$("#pesanEmail").text("Email still not okay");
		$("#pesanEmail").addClass("error");
	}
	else{
		$("#pesanEmail").text("");
	}
}

function checkPassword(){
	var pwd = $("#pwd").val();
	var repwd = $("#repwd").val();

	var bigLetter = /[A-Z]/;
	var number = /[0-9]/

	if (!bigLetter.test(pwd)){
		showMessage(false);
	}
	if (!number.test(pwd)){
		showMessage(false);
	}
	if (pwd != repwd){
		showMessage(false);
	}
	else{
		showMessage(true);
	}
}

function showMessage(valid){
	if (valid == false){
		$("#pesanPwd").text("Password still not okay");
		$("#pesanPwd").addClass("error");
	}
	else{
		$("#pesanPwd").text("");
	}
}

//TYPE POST
function changeFont(){
	var content = $("#content");
	switch(this.options[this.selectedIndex].value){
		case "arial": content.css("font-family", "arial"); break;
		case "arialBlack": content.css("font-family", "arial"); break;
		case "courier": content.css("font-family", "arial"); break;
		case "cursive": content.css("font-family", "arial"); break;
		case "georgia": content.css("font-family", "arial"); break;
		case "impact": content.css("font-family", "arial"); break;
		case "monospace": content.css("font-family", "arial"); break;
		case "sans": content.css("font-family", "arial"); break;
		case "serif": content.css("font-family", "arial"); break;
		case "tahoma": content.css("font-family", "arial"); break;
		case "tnr": content.css("font-family", "arial"); break;
		case "verdana": content.css("font-family", "arial"); break;
	}
}