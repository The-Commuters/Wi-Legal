"use strict",

$(function(){

	// DROPDOWN FUNCTION

	// Displays and hides the login box onclick anywhere
	$(".login-container").click(function(){
		$("header").toggleClass("login-jq");
	});

	// Hides the login box using the X button
	$(".login-quit").click(function(){
		$("header").removeClass("login-jq");
	});

	// Stops the login box from hiding when clicked on
	$('.login-box-container').click(function(e) {
		e.stopPropagation();
	});

	// END OF DROPDOWN FUNCTION



	// ... FUNCTION

	// END OF ... FUNCTION

});