$(document).ready(function() {
	$(".read-post-button button").click(function() {
		$(".read-post-wrapper").hide();
	});
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

function newPostToggle() {
	$(".new-post-wrapper").toggle();
}

function profileToggle() {
	$(".profile-wrapper").toggle();
}

function postToggle($count) {
	$(".read-post-title h1").html($("#post" + $count).find(".blog-title h1").html());
	$(".read-post-img img").attr("src",$("#post" + $count).find(".blog-img img").attr("src"));
	$(".read-post-content p").html($("#post" + $count).find(".blog-text p").html());
	$(".read-post-wrapper").show();
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