<!DOCTYPE HTML>
<?php 
  $dir=base_url()."frontend/";
  $dir_css=$dir."css/";
  $dir_js=$dir."js/";
  $dir_images=$dir."images/";
?>
<!--[if IE 7]>                  <html class="ie7 no-js" lang="en">     <![endif]-->
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<html>

<head>

<!-- Basic Page Needs -->
<meta charset="utf-8">
<title><?php echo $_title; ?></title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!--///////////////////////beginning CSS/////////////////////////-->
<!--CSS Style-->
<link rel="stylesheet" href="<?=$dir_css?>style.css" media="screen" />
<!--CSS base-->
<link rel="stylesheet" href="<?=$dir_css?>base.css" media="screen" />
<!--<CSS Button-->
<link rel="stylesheet" href="<?=$dir_css?>button.css" media="screen" />
<!--CSS style-scroll-->
<link rel="stylesheet" href="<?=$dir_css?>style-scroll.css" media="screen" />
<!--<CSS tooltips-icon-->
<link rel="stylesheet" href="<?=$dir_css?>tooltips-icon.css" media="screen" />
<!--CSS style-accordion-2-->
<link rel="stylesheet" href="<?=$dir_css?>style-accordion-2.css" media="screen" />
<!--CSS quovolver-->
<link rel="stylesheet" href="<?=$dir_css?>style-quovolver.css" media="screen" />
<!--CSS prettyPhoto-->
<link rel="stylesheet" href="<?=$dir_css?>prettyPhoto.css" media="screen" />
<!--CSS tabs-responsive-->
<link rel="stylesheet" href="<?=$dir_css?>tabs-responsive.css" media="screen" />
<!--<CSS tooltips-icon-->
<link rel="stylesheet" href="<?=$dir_css?>tooltips-icon.css" media="screen" />
<!--CSS jcarousel-->
<link rel="stylesheet" href="<?=$dir_css?>skin-single.css" media="screen" />
<!--CSS skin-->
<link rel="stylesheet" href="<?=$dir_css?>skin.css" media="screen" />
<!--CSS skin-single-blog-->
<link rel="stylesheet" href="css/skin-single-blog.css" media="screen" />
<!--slide-iview-->
<link rel="stylesheet" href="<?=$dir_css?>iview.css" media="screen" />
<!--style-iview-->
<link rel="stylesheet" href="<?=$dir_css?>style-iview.css" media="screen" />
<!--CSS style-sliding-panel-fixed-->
<link rel="stylesheet" href="<?=$dir_css?>style-sliding-panel-fixed.css" media="screen" />
<!-- Phone -->
<link href="<?=$dir_css?>media-query-phone.css" rel="stylesheet" type="text/css" media="only screen and (max-width:480px)">
<!-- Tablet -->
<link href="<?=$dir_css?>media-query-tablet.css" rel="stylesheet" type="text/css" media="only screen and (min-width:481px) and (max-width:768px)">
<!-- Desktop -->
<link href="<?=$dir_css?>media-query-desktop.css" rel="stylesheet" type="text/css" media="only screen and (min-width:769px) and (max-width:960px)">
<!--CSS noscript-->
<link rel="stylesheet" href="<?=$dir_css?>picbox.css" type="text/css" media="screen" />
<!--CSS picbox-->
<noscript>
<link rel="stylesheet" href="<?=$dir_css?>noscript.css" media="screen" />
</noscript>
<!--///////////////////////end CSS///////////////////////////////-->

<link href='http://fonts.googleapis.com/css?family=Inconsolata' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic' rel='stylesheet' type='text/css'>



<!-- Favicons -->
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

<!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
		<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
	</div>
	<![endif]-->
<!--[if lt IE 9]>
<script src="<?=$dir_js?>html5shiv.js"></script>
<![endif]-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-35880572-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


<!--//////////////////// java script ///////////////////////////////////--> 
<script type="text/javascript" src="<?=$dir_js?>jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?=$dir_js?>jquery-1.9.1.min.js"><\/script>')</script>
<script type="text/javascript" src="<?=$dir_js?>jquery.dcflickr.1.0.js"></script><!--jquery.dcflickr.1.0-->
<script type="text/javascript" src="<?=$dir_js?>script-flickr.js"></script><!--jscript-flickr--> 
<script type="text/javascript" src="<?=$dir_js?>jquery-menu.js"></script><!--menu--> 
<script type="text/javascript" src="<?=$dir_js?>script-menu.js"></script><!--script-menu--> 
<script type="text/javascript" src="<?=$dir_js?>jquery.easing.js"></script><!--jquery.easing-->
<script type="text/javascript" src="<?=$dir_js?>script-sliding-panel-fixed.js"></script><!--script-sliding-panel-fixed-->
<script type="text/javascript" src="<?=$dir_js?>custom.js"></script><!--image-rollover-->
<script type="text/javascript" src="<?=$dir_js?>script-tooltips.js"></script><!--script-tooltips-->
<script type="text/javascript" src="<?=$dir_js?>jquery.prettyPhoto.js"></script><!--prettyPhoto-->
<script type="text/javascript" src="<?=$dir_js?>jquery.jcarousel.js"></script><!--script-jcarousel-->
<script type="text/javascript" src="<?=$dir_js?>script-jcarousel-single.js"></script><!--script-jcarousel-single-->
<script type="text/javascript" src="<?=$dir_js?>script-jcarousel.js"></script><!--script-jcarousel-->
<script type="text/javascript" src="<?=$dir_js?>scroll-startstop.events.jquery.js"></script><!--java-scroll--> 
<script type="text/javascript" src="<?=$dir_js?>script-java-scroll.js"></script><!--script-java-scroll--> 
<script type="text/javascript" src="<?=$dir_js?>jquery.twitter.js"></script><!--jquery.twitter-->
<script type="text/javascript" src="<?=$dir_js?>tinynav.js"></script><!--tinynav--> 
<script type="text/javascript" src="<?=$dir_js?>script-tinynav.js"></script><!--script-tinynav-->
<script type="text/javascript" src="<?=$dir_js?>jquery.prettyPhoto.js"></script><!--prettyPhoto-->
<script type="text/javascript" src="<?=$dir_js?>script-prettyPhoto-one.js"></script><!--script-prettyPhoto-one--> 
<script type="text/javascript" src="<?=$dir_js?>jquery.nivo.slider.js"></script><!--jquery.nivo.slider-->
<script type="text/javascript" src="<?=$dir_js?>picbox.js"></script><!-- picbox -->
<script type="text/javascript" src="<?=$dir_js?>iview.js"></script><!--slide iview-->
<script type="text/javascript" src="<?=$dir_js?>script-iview.js"></script><!--slide iview-->
<?php
	if($this->uri->segment(2) != "index"){
?>
<script type="text/javascript" src="<?=$dir_js?>jquery-1.8.2.min.js"></script><!--jquery-1.8.2.min-->
<?php
}
?>
<script type="text/javascript" src="<?=$dir_js?>jPages.js"></script><!--jpages-->
<script>
	//// Start Simple Sliders ////
	$(function() {
		setInterval("rotateDiv()", 10000);
	});
		function rotateDiv() {
		var currentDiv=$("#simpleslider div.current");
		var nextDiv= currentDiv.next ();
		if (nextDiv.length ==0)
			nextDiv=$("#simpleslider div:first");
		
		currentDiv.removeClass('current').addClass('previous').fadeOut('2000');
		nextDiv.fadeIn('3000').addClass('current',function() {
			currentDiv.fadeOut('2000', function () {currentDiv.removeClass('previous');});
		});
	}
	//// End Simple Sliders //// 
</script> 
<!--//////////////////// end java script ///////////////////////////////-->
  <script>
  /* when document is ready */
  $(function() {

    /* initiate plugin assigning the desired button labels  */
    $("div.holder").jPages({
      containerID : "itemContainer",
      first       : "first",
      previous    : "previous",
      next        : "next",
      last        : "last"
    });

  });
  </script>

  <style type="text/css">
  .holder {
    margin: 15px 0;
  }

  .holder a {
	text-decoration:none;
	font-size: 15px;
	cursor: pointer;
	margin: 0 1px;
	color: #333;
	padding:3px 6px;
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	border-radius:4px;
  }

  .holder a:hover {
	margin: 0 0px;
	color:rgb(0,0,0);
	-webkit-transition-delay:0;
	-moz-transition-delay:0;
	-o-transition-delay:0;
	transition-delay:0;
	border: 1px solid rgb(134,196,64);
  }

  .holder a.jp-previous { margin-right: 15px; }
  .holder a.jp-next { margin-left: 15px; }

  .holder a.jp-current, a.jp-current:hover {
	margin: 0 0px;
	color:rgb(0,0,0);
	display:inline-block;
	padding:3px 6px;
	border:1px solid rgb(134,196,64);
	-webkit-border-radius:4px;
	-moz-border-radius:4px;
	border-radius:4px;
  }

  .holder a.jp-disabled, a.jp-disabled:hover {
    color: #bbb;
  }

  .holder a.jp-current, a.jp-current:hover,
  .holder a.jp-disabled, a.jp-disabled:hover {
    cursor: default;
    background: none;
  }

  .holder span { margin: 0 5px; }
  </style>

</head>
<body>

	<?php	
		if(isset($_header)) echo $_header;
		if(isset($_left_menu)) echo $_left_menu;
		if(isset($_top_menu)) echo $_top_menu;
	?>
	<?php
		if(isset($_content)) echo $_content;
		if(isset($_right_menu)) echo $_right_menu;
		?>
    <!--end section item-container-blog--> 
    </section>
    <!--///////////////////// END SECTION ITEM-CONTAINER-BLOG//////////////////////-->
  </div>
  <!--end contentWrapper-->
  <!--////////////////////////END contentWrapper//////////////////--> 
		<?php
		if(isset($_bottom_menu)) echo $_bottom_menu;
		if(isset($_footer)) echo $_footer;
	?>



<!--beginning "nav_up nav_down-->
<div style="display:none;" class="nav_up" id="nav_up"></div>
<!--<div style="display:none;" class="nav_down" id="nav_down"></div>-->
<!--end "nav_up nav_down-->

<!--//////////////////// java script ///////////////////////////////////--> 

<!--//////////////////// end java script ///////////////////////////////-->

</body>

<!-- Mirrored from www.orangedesk.net/sviluppo-web/creative/ by HTTrack Website Copier/3.x [XR&CO'2006], Sun, 04 Aug 2013 00:15:00 GMT -->
</html>