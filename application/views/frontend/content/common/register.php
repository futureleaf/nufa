
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> 	

<html lang="en"> <!--<![endif]-->
	<!DOCTYPE html>
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
	<link rel="stylesheet" href="<?php echo base_url();?>frontend/css/assetsLogin/css/base.css!">
	<link rel="stylesheet" href="<?php echo base_url();?>frontend/css/assetsLogin/css/skeleton.css!">
	<link rel="stylesheet" href="<?php echo base_url();?>frontend/css/assetsLogin/css/layout.css!">
	
</head>
<style>
.notice{
	height:auto !important;
}
.notice p{
	text-align:center;
}
</style>
	<link rel="stylesheet" href="<?php echo base_url();?>frontend/css/assetsReg/style.css">
	
</head>
<body>
	<fieldset>			
		<?php
		// untuk craete
			echo form_open_multipart("", array("class"=>"form-horizontal"));
		?>
			<h2>Register</h2>
		<div id='content'>
				<input type="hidden" name="id_class" value="<?php echo $this->uri->segment(4); ?>" />
				<input type="hidden" name="is_auser" value="0" />
				<input type="hidden" name="no_jenjang" value="0000" />
				<input type="hidden" name="desc_user" value="-" />
				<div class="control-group <?php if(form_error('full_name') != null) echo"error" ?>">
						<?php if(form_error('full_name') != null) echo "<span class=\"help-inline\"> " . form_error('full_name') . " </span>"; ?>
					<div class="controls">
						<input type="text" placeholder='Nama Lengkap' name="full_name" value="<?php echo (set_value('full_name'))?set_value('full_name'):""; ?>" />
					</div>
				</div>
				<div class="control-group <?php if(form_error('parent_name') != null) echo"error" ?>">
						<?php if(form_error('parent_name') != null) echo "<span class=\"help-inline\"> " . form_error('parent_name') . " </span>"; ?>
					<div class="controls">
						<input type="text" placeholder='Nama Orang Tua' name="parent_name" value="<?php echo (set_value('parent_name'))?set_value('parent_name'):""; ?>" />
					</div>
				</div>
				<div class="control-group <?php if(form_error('email') != null) echo"error" ?>">
						<?php if(form_error('email') != null) echo "<span class=\"help-inline\"> " . form_error('email') . " </span>"; ?>
					<div class="controls">
						<input type="email" placeholder='Email' name="email" value="<?php echo (set_value('email'))?set_value('email'):""; ?>" />
					</div>
				</div>
				<div class="control-group <?php if(form_error('repeat_email') != null) echo"error" ?>">
						<?php if(form_error('repeat_email') != null) echo "<span class=\"help-inline\"> " . form_error('repeat_email') . " </span>"; ?>
					<div class="controls">
						<input type="email" placeholder='Ulangi Email' name="repeat_email" value="<?php echo (set_value('repeat_email'))?set_value('repeat_email'):""; ?>" />
					</div>
				</div>
				<div class="control-group <?php if(form_error('password') != null) echo"error" ?>">
						<?php if(form_error('password') != null) echo "<span class=\"help-inline\"> " . form_error('password') . " </span>"; ?>
					<div class="controls">
						<input type="password" placeholder='Kata Sandi' name="password" value="<?php echo (set_value('password'))?set_value('password'):""; ?>" />
					</div>
				</div>
				<div class="control-group <?php if(form_error('repeat_password') != null) echo"error" ?>">
						<?php if(form_error('repeat_password') != null) echo "<span class=\"help-inline\"> " . form_error('repeat_password') . " </span>"; ?>
					<div class="controls">
						<input type="password" placeholder='Ulangi Kata Sandi' name="repeat_password" value="<?php echo (set_value('repeat_password'))?set_value('repeat_password'):""; ?>" />
					</div>
				</div>
				<div class="control-group">
					<div class="controls" placeholder='Kelas'>
						<?php
							foreach($classes as $class) {$classs["$class->id_class"] = $class->name_class;}
							echo form_dropdown("id_class", $classs, '', 'data-rel="chosen"'); 
						?>
					</div>
				</div>
				<div class="control-group <?php if(form_error('nis') != null) echo"error" ?>">
						<?php if(form_error('nis') != null) echo "<span class=\"help-inline\"> " . form_error('nis') . " </span>"; ?>
					<div class="controls">
						<input type="text" placeholder='Nomer Induk Siswa' name="nis" value="<?php echo (set_value('nis'))?set_value('nis'):""; ?>" />
					</div>
				</div>
				<div class="control-group <?php if(form_error('nisn') != null) echo"error" ?>">
						<?php if(form_error('nisn') != null) echo "<span class=\"help-inline\"> " . form_error('nisn') . " </span>"; ?>
					<div class="controls">
						<input type="text" placeholder='Nomer Induk Siswa Nasional' name="nisn" value="<?php echo (set_value('nisn'))?set_value('nisn'):""; ?>" />
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<?php 
							foreach($cities as $city) {$citieses["$city->id_city"] = $city->name_city;}
							echo form_dropdown("id_city", $citieses, '', 'data-rel="chosen"'); 
						?>
					</div>
				</div>
				<div class="control-group <?php if($errorImage != null) echo"error" ?>">
						<?php if($errorImage != null) echo "<span class=\"help-inline\"> " . $errorImage . " </span>"; ?>
					<label class="control-label">Foto </label>
					<div class="controls">
						<input type="file" placeholder='Foto' name="userfile" value="" />
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<?php
							$genders['1'] = "Laki-laki";
							$genders['0'] = "Perempuan";
							echo form_dropdown("gender", $genders, '', 'data-rel="chosen"'); 
						?>
					</div>
				</div>
				<div class="control-group <?php if(form_error('born_date') != null) echo"error" ?>">
						<?php if(form_error('born_date') != null) echo "<span class=\"help-inline\"> " . form_error('born_date') . " </span>"; ?>
					<label class="control-label" placeholder='Nama Orang Tua'> </label>
					<div class="controls">
						<input class="datepicker" type="text" placeholder='Tanggal Lahir (MM/DD/YYYY)' name="born_date" value="<?php echo (set_value('born_date'))?set_value('born_date'):""; ?>" />
					</div>
				</div>
				<div class="control-group <?php if(form_error('address') != null) echo"error" ?>">
						<?php if(form_error('address') != null) echo "<span class=\"help-inline\"> " . form_error('address') . " </span>"; ?>
					<label class="control-label" placeholder='Nama Orang Tua'> </label>
					<div class="controls">
						<textarea rows="3" placeholder='Alamat' name="address"><?php echo (set_value('address'))?set_value('address'):""; ?></textarea>
					</div>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn btn-primary" name="doCreate">Save changes</button>
					<?php echo '<a href="'.site_url("front/login").'" class="btn">Kembali</a>'; ?>
				</div>
		<?php
			echo form_close();
		?>
	</fieldset>

</body>
</html>
