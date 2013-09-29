<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	<html lang="en"> <!--<![endif]-->
<head>

	<!-- General Metas -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<!-- Force Latest IE rendering engine -->
	<title>Login Form</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url();?>frontend/css/assetsLogin/css/base.css">
	<link rel="stylesheet" href="<?php echo base_url();?>frontend/css/assetsLogin/css/skeleton.css">
	<link rel="stylesheet" href="<?php echo base_url();?>frontend/css/assetsLogin/css/layout.css">
	
</head>
<style>
.notice{
	height:auto !important;
}
.notice p{
	text-align:center;
}
</style>
<body>
<?php if(form_error('email') != null || form_error('password') != null){?>
	<div class="notice">
		<a href='' id='btn' class="close">close</a>
		<center><p class="warn">
		<?php 
			if(form_error('email') != null) echo form_error('email')." ";
			if(form_error('password') != null) echo form_error('password'); ?>
		</p></center>
	</div>
<?php } ?>


	<!-- Primary Page Layout -->

	<div class="container">
		
		<div class="form-bg">
			<form action="" method="post" name="ajaxcontactform" id="ajaxcontactform">
				<h2>Login</h2>
				<p><input name='email' type="text" placeholder="email" value='<?php echo (set_value('email'))?set_value('email'):""; ?>'></p>
				<p><input name='password' type="password" placeholder="password" value=''></p>
				<button name='do' type="submit"></button>
			<form>
		</div>


	</div><!-- container -->

	<!-- JS  -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
	<script>window.jQuery || document.write("<script src='js/jquery-1.5.1.min.js'>\x3C/script>")</script>
<script>
$(function(){
	$('.close').click(function(){
		$('.notice').hide();
	});
});
</script>
	<script src="js/app.js"></script>
	
<!-- End Document -->
</body>
</html>