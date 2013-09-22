<?php $dir = base_url() ;?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $_title ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
	<meta name="author" content="Muhammad Usman">

	<!-- The styles -->
	<link id="bs-css" href="<?=$dir?>/backend/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
	
	<link href="<?php echo base_url(); ?>backend/css/bootstrap-responsive.css" rel="stylesheet">
	<link href="<?=$dir?>/backend/css/charisma-app.css" rel="stylesheet">
	<link href="<?=$dir?>/backend/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
	<link href='<?=$dir?>/backend/css/fullcalendar.css' rel='stylesheet'>
	<link href='<?=$dir?>/backend/css/fullcalendar.print.css' rel='stylesheet'  media='print'>
	<link href='<?=$dir?>/backend/css/chosen.css' rel='stylesheet'>
	<link href='<?=$dir?>/backend/css/uniform.default.css' rel='stylesheet'>
	<link href='<?=$dir?>/backend/css/colorbox.css' rel='stylesheet'>
	<link href='<?=$dir?>/backend/css/jquery.cleditor.css' rel='stylesheet'>
	<link href='<?=$dir?>/backend/css/jquery.noty.css' rel='stylesheet'>
	<link href='<?=$dir?>/backend/css/noty_theme_default.css' rel='stylesheet'>
	<link href='<?=$dir?>/backend/css/elfinder.min.css' rel='stylesheet'>
	<link href='<?=$dir?>/backend/css/elfinder.theme.css' rel='stylesheet'>
	<link href='<?=$dir?>/backend/css/jquery.iphone.toggle.css' rel='stylesheet'>
	<link href='<?=$dir?>/backend/css/opa-icons.css' rel='stylesheet'>
	<link href='<?=$dir?>/backend/css/uploadify.css' rel='stylesheet'>
	<link href='<?=$dir?>/backend/css/own-style.css' rel='stylesheet'>

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- The fav icon -->
	<link rel="shortcut icon" href="img/favicon.ico">
	
</head>

<body>
	
	<?php 
		if(isset($_header))
			echo $_header;
		if(isset($_left_menu))
			echo $_left_menu;
		if(isset($_top_menu))
			echo $_top_menu;
		if(isset($_content))
			echo $_content;
		if(isset($_right_menu))
			echo $_right_menu;
		if(isset($_bottom_menu))
			echo $_bottom_menu;
		if(isset($_footer))
			echo $_footer;
	?>

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="<?=$dir?>/backend/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="<?=$dir?>/backend/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="<?=$dir?>/backend/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="<?=$dir?>/backend/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="<?=$dir?>/backend/js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="<?=$dir?>/backend/js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="<?=$dir?>/backend/js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="<?=$dir?>/backend/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="<?=$dir?>/backend/js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="<?=$dir?>/backend/js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="<?=$dir?>/backend/js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="<?=$dir?>/backend/js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="<?=$dir?>/backend/js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="<?=$dir?>/backend/js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="<?=$dir?>/backend/js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="<?=$dir?>/backend/js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='<?=$dir?>/backend/js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='<?=$dir?>/backend/js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="<?=$dir?>/backend/js/excanvas.js"></script>
	<script src="<?=$dir?>/backend/js/jquery.flot.min.js"></script>
	<script src="<?=$dir?>/backend/js/jquery.flot.pie.min.js"></script>
	<script src="<?=$dir?>/backend/js/jquery.flot.stack.js"></script>
	<script src="<?=$dir?>/backend/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="<?=$dir?>/backend/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="<?=$dir?>/backend/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="<?=$dir?>/backend/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="<?=$dir?>/backend/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="<?=$dir?>/backend/js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="<?=$dir?>/backend/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="<?=$dir?>/backend/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="<?=$dir?>/backend/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="<?=$dir?>/backend/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="<?=$dir?>/backend/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="<?=$dir?>/backend/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="<?=$dir?>/backend/js/charisma.js"></script>
	<!-- jQuery -->
	<!-- application script for ajax -->
	<script src="<?=$dir?>/backend/js/jquery.min.js">
<!-- 	<script src="<?=$dir?>/backend/js/jquery.js"></cript> -->
	
	<?php //Google Analytics code for tracking my demo site, you can remove this.
		if($_SERVER['HTTP_HOST']=='usman.it') { ?>
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-26532312-1']);
			_gaq.push(['_trackPageview']);
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(ga);
			})();
		</script>
	<?php } ?>
</body>
</html>
