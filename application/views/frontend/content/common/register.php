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
<body>
	<fieldset>			
		<?php
		// untuk craete
			echo form_open_multipart("", array("class"=>"form-horizontal"));
		?>
				<input type="hidden" name="id_class" value="<?php echo $this->uri->segment(4); ?>" />
				<input type="hidden" name="is_auser" value="0" />
				<input type="hidden" name="no_jenjang" value="0000" />
				<input type="hidden" name="desc_user" value="-" />
				<div class="control-group <?php if(form_error('full_name') != null) echo"error" ?>">
					<label class="control-label">Nama Lengkap </label>
					<div class="controls">
						<input type="text" style="width:30.5%" name="full_name" value="<?php echo (set_value('full_name'))?set_value('full_name'):""; ?>" />
						<?php if(form_error('full_name') != null) echo "<span class=\"help-inline\"> " . form_error('full_name') . " </span>"; ?>
					</div>
				</div>
				<div class="control-group <?php if(form_error('parent_name') != null) echo"error" ?>">
					<label class="control-label">Nama Orang Tua  </label>
					<div class="controls">
						<input type="text" style="width:30.5%" name="parent_name" value="<?php echo (set_value('parent_name'))?set_value('parent_name'):""; ?>" />
						<?php if(form_error('parent_name') != null) echo "<span class=\"help-inline\"> " . form_error('parent_name') . " </span>"; ?>
					</div>
				</div>
				<div class="control-group <?php if(form_error('email') != null) echo"error" ?>">
					<label class="control-label">Email </label>
					<div class="controls">
						<input type="email" style="width:30.5%" name="email" value="<?php echo (set_value('email'))?set_value('email'):""; ?>" />
						<?php if(form_error('email') != null) echo "<span class=\"help-inline\"> " . form_error('email') . " </span>"; ?>
					</div>
				</div>
				<div class="control-group <?php if(form_error('repeat_email') != null) echo"error" ?>">
					<label class="control-label">Ulangi Email </label>
					<div class="controls">
						<input type="email" style="width:30.5%" name="repeat_email" value="<?php echo (set_value('repeat_email'))?set_value('repeat_email'):""; ?>" />
						<?php if(form_error('repeat_email') != null) echo "<span class=\"help-inline\"> " . form_error('repeat_email') . " </span>"; ?>
					</div>
				</div>
				<div class="control-group <?php if(form_error('password') != null) echo"error" ?>">
					<label class="control-label">Kata Sandi </label>
					<div class="controls">
						<input type="password" style="width:30.5%" name="password" value="<?php echo (set_value('password'))?set_value('password'):""; ?>" />
						<?php if(form_error('password') != null) echo "<span class=\"help-inline\"> " . form_error('password') . " </span>"; ?>
					</div>
				</div>
				<div class="control-group <?php if(form_error('repeat_password') != null) echo"error" ?>">
					<label class="control-label">Ulangi Kata Sandi </label>
					<div class="controls">
						<input type="password" style="width:30.5%" name="repeat_password" value="<?php echo (set_value('repeat_password'))?set_value('repeat_password'):""; ?>" />
						<?php if(form_error('repeat_password') != null) echo "<span class=\"help-inline\"> " . form_error('repeat_password') . " </span>"; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Kelas</label>
					<div class="controls">
						<?php
							foreach($classes as $class) {$classs["$class->id_class"] = $class->name_class;}
							echo form_dropdown("id_class", $classs, '', 'data-rel="chosen"'); 
						?>
					</div>
				</div>
				<div class="control-group <?php if(form_error('nis') != null) echo"error" ?>">
					<label class="control-label">Nomer Induk Siswa</label>
					<div class="controls">
						<input type="text" style="width:30.5%" name="nis" value="<?php echo (set_value('nis'))?set_value('nis'):""; ?>" />
						<?php if(form_error('nis') != null) echo "<span class=\"help-inline\"> " . form_error('nis') . " </span>"; ?>
					</div>
				</div>
				<div class="control-group <?php if(form_error('nisn') != null) echo"error" ?>">
					<label class="control-label">Nomer Induk Siswa Nasional</label>
					<div class="controls">
						<input type="text" style="width:30.5%" name="nisn" value="<?php echo (set_value('nisn'))?set_value('nisn'):""; ?>" />
						<?php if(form_error('nisn') != null) echo "<span class=\"help-inline\"> " . form_error('nisn') . " </span>"; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Kota</label>
					<div class="controls">
						<?php 
							foreach($cities as $city) {$citieses["$city->id_city"] = $city->name_city;}
							echo form_dropdown("id_city", $citieses, '', 'data-rel="chosen"'); 
						?>
					</div>
				</div>
				<div class="control-group <?php if($errorImage != null) echo"error" ?>">
					<label class="control-label">Foto </label>
					<div class="controls">
						<input type="file" name="userfile" value="" />
						<?php if($errorImage != null) echo "<span class=\"help-inline\"> " . $errorImage . " </span>"; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Jenis Kelamin</label>
					<div class="controls">
						<?php
							$genders['1'] = "Laki-laki";
							$genders['0'] = "Perempuan";
							echo form_dropdown("gender", $genders, '', 'data-rel="chosen"'); 
						?>
					</div>
				</div>
				<div class="control-group <?php if(form_error('born_date') != null) echo"error" ?>">
					<label class="control-label">Tanggal Lahir (MM/DD/YYYY)</label>
					<div class="controls">
						<input class="datepicker" type="text" style="width:30.5%" name="born_date" value="<?php echo (set_value('born_date'))?set_value('born_date'):""; ?>" />
						<?php if(form_error('born_date') != null) echo "<span class=\"help-inline\"> " . form_error('born_date') . " </span>"; ?>
					</div>
				</div>
				<div class="control-group <?php if(form_error('address') != null) echo"error" ?>">
					<label class="control-label">Alamat </label>
					<div class="controls">
						<textarea rows="3" name="address"><?php echo (set_value('address'))?set_value('address'):""; ?></textarea>
						<?php if(form_error('address') != null) echo "<span class=\"help-inline\"> " . form_error('address') . " </span>"; ?>
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
