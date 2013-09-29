/**
 * jQuery iView Slider v2.0
 * 
 * @version: 2.0.1 - August 17, 2012
 * 
 * @author: Hemn Chawroka
 *          hemn@iprodev.com
 *          http://iprodev.com/
 * 
 */
$(document).ready(function(){
				$('#iview').iView({
					pauseTime: 7000,
					pauseOnHover: true,
					directionNavHoverOpacity: 0,
					timer: "Bar",
					timerDiameter: "50%",
					timerPadding: 0,
					timerStroke: 7,
					timerBarStroke: 0,
					timerColor: "rgb(134,196,64)",
					timerPosition: "bottom-right"
				});
			});