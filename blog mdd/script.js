$(document).ready(function() {
	$(".blog-button button").click(function() {
		$(this).parent().prev().toggle();
		if($(this).html() == "Read More") {
			$(this).html("Read Less");
		}
		else {
			$(this).html("Read More");		}
	})
});

function formToggle() {
	if($("form#login-form").css("display") == "block") {
		$("form#login-form").hide();
		$("form#register-form").show();
		$("button#register-btn").html("Login");
	}
	else {
		$("form#login-form").show();
		$("form#register-form").hide();
		$("button#register-btn").html("Register");
	}
}

function postToggle() {
	$(".new-post-wrapper").toggle();
}

function loginPage() {
	window.location = "login.php";
}
function logoutPage() {
	window.location = "logout.php";
}

function submitForm() {
	if($("form#login-form").css("display") == "block") {
		document.getElementById("login-form").submit();
	}
	else {
		document.getElementById("register-form").submit();
	}
}