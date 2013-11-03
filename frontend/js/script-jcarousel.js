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


// Credits: Robert Penners easing equations (http://www.robertpenner.com/easing/).
jQuery.easing['BounceEaseOut'] = function(p, t, b, c, d) {
	if ((t/=d) < (1/2.75)) {
		return c*(7.5625*t*t) + b;
	} else if (t < (2/2.75)) {
		return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
	} else if (t < (2.5/2.75)) {
		return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
	} else {
		return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
	}
};

jQuery(document).ready(function() {
	scroll: ($(window).width() > 767 ? 4 : 1),
    jQuery('#mycarousel').jcarousel({
        easing: 'BounceEaseOut',
        animation: 2000
    });
	
		
});

// Reload carousels on window resize to scroll only 1 item if viewport is small
			    $(window).resize(function() {
			    	 var el = $("#mycarousel"), carousel = el.data('jcarousel'), win_width = $(window).width();
			    	   var visibleItems = (win_width > 767 ? 4 : 1);
			    	   carousel.options.visible = visibleItems;
			    	   carousel.options.scroll = visibleItems;
			    	   carousel.reload();
			    });

