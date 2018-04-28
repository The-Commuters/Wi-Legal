"use strict",

$(function(){

	// LOGIN DROPDOWN FUNCTION

	// Displays login box and hides the login box onclick anywhere
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

	// Hides the login box using the X button
	$("#msglog").click(function(){
		$("header").toggleClass("login-jq");
	});

	// END OF LOGIN DROPDOWN FUNCTION



	// REGISTER DROPDOWN FUNCTION

	$("#user").click(function(){
		$("#user-register").toggleClass("toggle")
		$("#user").toggleClass("rotate-triangle")
	});

	$("#lawyer").click(function(){
		$("#lawyer-register").toggleClass("toggle")
		$("#lawyer").toggleClass("rotate-triangle")
	});

	$("#firm").click(function(){
		$("#firm-register").toggleClass("toggle")
		$("#firm").toggleClass("rotate-triangle")
	});

	// END OF REGISTER DROPDOWN FUNCTION



	// STAR FUNCTION

	$("#star1con").click(function(){
		$("#star1").addClass("fas")
		$("#star2").addClass("far")
		$("#star3").addClass("far")
		$("#star4").addClass("far")
		$("#star5").addClass("far")
	});

	$("#star2con").click(function(){
		$("#star1").addClass("fas")
		$("#star2").addClass("fas")
		$("#star3").addClass("far")
		$("#star4").addClass("far")
		$("#star5").addClass("far")
	});

	$("#star3con").click(function(){
		$("#star1").addClass("fas")
		$("#star2").addClass("fas")
		$("#star3").addClass("fas")
		$("#star4").addClass("far")
		$("#star5").addClass("far")
	});

	$("#star4con").click(function(){
		$("#star1").addClass("fas")
		$("#star2").addClass("fas")
		$("#star3").addClass("fas")
		$("#star4").addClass("fas")
		$("#star5").addClass("far")
	});

	$("#star5con").click(function(){
		$("#star1").addClass("fas")
		$("#star2").addClass("fas")
		$("#star3").addClass("fas")
		$("#star4").addClass("fas")
		$("#star5").addClass("fas")
	});

	// END OF STAR FUNCTION

	

	// ... FUNCTION

	// END OF ... FUNCTION

});