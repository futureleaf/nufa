/*!
 * jQuery JavaScript Library v1.4.4
 * http://jquery.com/
 *
 * Copyright 2010, John Resig
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * Includes Sizzle.js
 * http://sizzlejs.com/
 * Copyright 2010, The Dojo Foundation
 * Released under the MIT, BSD, and GPL Licenses.
 *
 * Date: Thu Nov 11 19:04:53 2010 -0500
 */

<!-- beginning menu-->
$(document).ready(function () {	
	
	$('#nav li').hover(
		function () {
			//mostra sottomenu
			$('ul', this).stop(true, true).delay(50).slideDown(50);

		}, 
		function () {
			//nascondi sottomenu
			$('ul', this).stop(true, true).delay(50).slideUp(50);		
		}
	);
	

});
<!-- end menu-->
