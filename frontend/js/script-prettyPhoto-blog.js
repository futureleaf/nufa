/* ------------------------------------------------------------------------
	Class: prettyPhoto
	Use: Lightbox clone for jQuery
	Author: Stephane Caron (http://www.no-margin-for-errors.com)
	Version: 3.1.5
------------------------------------------------------------------------- */

<!--beginning prettyPhoto-two-->
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				social_tools: false,
				
				$(".photos-blog a[rel^='prettyPhoto']").prettyPhoto({social_tools: false, animation_speed:'normal',theme:'light_rounded',slideshow:3000, autoplay_slideshow: false});

			});
<!--end prettyPhoto-two-->