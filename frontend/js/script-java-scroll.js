// JavaScript Document

<!--beginning java-scroll-->
			$(function() {
				var $elem = $('.pageWrapper');
				
				$('#nav_up').fadeIn('slow');
				$('#nav_down').fadeIn('slow');  
				
				
				
				$('#nav_down').click(
					function (e) {
						$('html, body').animate({scrollTop: $elem.height()}, 800);
					}
				);
				$('#nav_up').click(
					function (e) {
						$('html, body').animate({scrollTop: '0px'}, 800);
					}
				);
            });
<!--end java-scroll-->