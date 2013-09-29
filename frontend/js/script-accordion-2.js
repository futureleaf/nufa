// JavaScript Document
	$(document).ready(function() {
		$(".accord-li").click(function(){
			$(this).toggleClass("active");
			$(this).next(".acc-2").stop('true','true').slideToggle("slow");
		});
	});
