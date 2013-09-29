/*!
 * jCarousel - Riding carousels with jQuery
 *   http://sorgalla.com/jcarousel/
 *
 * Copyright (c) 2006 Jan Sorgalla (http://sorgalla.com)
 * Dual licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * and GPL (http://www.opensource.org/licenses/gpl-license.php) licenses.
 *
 * Built on top of the jQuery library
 *   http://jquery.com
 *
 * Inspired by the "Carousel Component" by Bill Scott
 *   http://billwscott.com/carousel/
 */

/*global window, jQuery */


/* this is the standard configuration*/
/*jQuery(document).ready(function() {
    jQuery('#mycarousel').jcarousel({
        start: 1
    });
});*/


			$(document).ready(function() {
					
						$('#mycarousel-single').jcarousel({
						   	easing: 'easeInOutExpo',
						   	animation: 600,
							scroll: 1,
        					visible: 1
						});
				});
				

			$(document).ready(function() {
					
						$('#mycarousel-single-one').jcarousel({
						   	easing: 'easeInOutExpo',
						   	animation: 600,
							scroll: 1,
        					visible: 1
						});
				});
				
				
				$(document).ready(function() {
					
						$('#mycarousel-single-two').jcarousel({
						   	easing: 'easeInOutExpo',
						   	animation: 600,
							scroll: 1,
        					visible: 1
						});
				});
				
				
				$(document).ready(function() {
					
						$('#mycarousel-single-three').jcarousel({
						   	easing: 'easeInOutExpo',
						   	animation: 600,
							scroll: 1,
        					visible: 1
						});
				});
				
	
	
/*mycarousel-single-big*/	
				
				function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};
				
				$(document).ready(function() {
				

					
						$('#mycarousel-single-big').jcarousel({
						   	easing: 'easeInOutExpo',
							auto: 2,
							visible: 1,
							animation: 3000,
							wrap: 'last',
							scroll: 1,
							initCallback: mycarousel_initCallback
						});
						
				});
				
				
				
				/*mycarousel-single-big-item*/	
				
				function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};
				
				$(document).ready(function() {
				

					
						$('#mycarousel-single-big-item').jcarousel({
						   	easing: 'easeInOutExpo',
							auto: 2,
							visible: 1,
							animation: 3000,
							wrap: 'last',
							scroll: 1,
							initCallback: mycarousel_initCallback
						});
						
				});
				
				
				
/*mycarousel-single-medium*/	
				
				function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};
				
				$(document).ready(function() {
				

					
						$('#mycarousel-single-medium').jcarousel({
						   	easing: 'easeInOutExpo',
							auto: 2,
							visible: 1,
							animation: 3000,
							wrap: 'last',
							scroll: 1,
							initCallback: mycarousel_initCallback
						});
						
				});	
				
				
				
/*mycarousel-single-blog*/	
				
				function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};
				
				$(document).ready(function() {
				

					
						$('#mycarousel-single-blog').jcarousel({
						   	easing: 'easeInOutExpo',
							auto: 2,
							visible: 1,
							animation: 3000,
							wrap: 'last',
							scroll: 1,
							initCallback: mycarousel_initCallback
						});
						
				});	
				
				
				/*mycarousel-single-service-1*/	
				
				function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};
				
				$(document).ready(function() {
				

					
						$('#mycarousel-single-service-1').jcarousel({
						   	easing: 'easeInOutExpo',
							auto: 2,
							visible: 1,
							animation: 3000,
							wrap: 'last',
							scroll: 1,
							initCallback: mycarousel_initCallback
						});
						
				});
				
				
								/*mycarousel-single-post*/	
				
				function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};
				
				$(document).ready(function() {
				

					
						$('#mycarousel-single-post').jcarousel({
						   	easing: 'easeInOutExpo',
							auto: 2,
							visible: 1,
							animation: 3000,
							wrap: 'last',
							scroll: 1,
							initCallback: mycarousel_initCallback
						});
						
				});

				
				
				
				/*mycarousel-single-blog-large*/	
				
				function mycarousel_initCallback(carousel)
{
    // Disable autoscrolling if the user clicks the prev or next button.
    carousel.buttonNext.bind('click', function() {
        carousel.startAuto(0);
    });

    carousel.buttonPrev.bind('click', function() {
        carousel.startAuto(0);
    });

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    });
};
				
				$(document).ready(function() {
				

					
						$('#mycarousel-single-blog-large').jcarousel({
						   	easing: 'easeInOutExpo',
							auto: 2,
							visible: 1,
							animation: 3000,
							wrap: 'last',
							scroll: 1,
							initCallback: mycarousel_initCallback
						});
						
				});
				
