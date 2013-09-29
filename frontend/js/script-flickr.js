/*
 * DC Flickr - jQuery Flickr
 * Copyright (c) 2011 Design Chemical
 * http://www.designchemical.com/blog/
 *
 * Dual licensed under the MIT and GPL licenses:
 * 	http://www.opensource.org/licenses/mit-license.php
 * 	http://www.gnu.org/licenses/gpl.html
 *
 */
	
$(document).ready(function($){
	$('.flickr-icons').dcFlickr({
		limit: 12, 
        q: { 
            id: '96419267@N00',
			lang: 'en-us',
			format: 'json',
			jsoncallback: '?'
        }
	});
	
	
});	


$(document).ready(function($){
	$('.flickr-icons-spot').dcFlickr({
		limit: 12, 
        q: { 
            id: '96419267@N00',
			lang: 'en-us',
			format: 'json',
			jsoncallback: '?'
        }
	});
	
	
});


