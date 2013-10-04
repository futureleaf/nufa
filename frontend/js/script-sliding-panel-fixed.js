// JavaScript Document

$(document).ready(function(){
	$(".trigger").click(function(){
		$(".panel").toggle("normal");
		$(this).toggleClass("active");
		return false;
	});
});