<?php
$no_visible_elements=true;
?>
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>Selamat Datang Di Admin Panel</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						Harap Login Dengan Email Dan Password Anda.
					</div>
					<?php
						echo form_open_multipart("", array("class"=>"form-horizontal"));
					?>
						<fieldset>
							<div class="input-prepend control-group <?php if(form_error('email') != null) echo"error" ?>" title="Email" data-rel="tooltip">
								<span class="add-on"><i class="icon-envelope"></i></span><input autofocus class="input-large" style="width:150px" name="email" type="email" value="<?php echo (set_value('email'))?set_value('email'):""; ?>" /><br />
								<?php if(form_error('email') != null) echo "<span class=\"help-inline\"> " . form_error('email') . " </span>"; ?>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend control-group <?php if(form_error('password') != null) echo"error" ?>" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span><input class="input-large" name="password" style="width:150px" type="password" value="<?php echo (set_value('password'))?set_value('password'):""; ?>" /><br />
								<?php if(form_error('password') != null) echo "<span class=\"help-inline\"> " . form_error('password') . " </span>"; ?>
							</div>
							<?php /*
							<div class="clearfix"></div>

							<div class="input-prepend">
								<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>
							</div>
							<div class="clearfix"></div>
							*/
							?>

							<p class="center span5">
							<button type="submit" name="submit" class="btn btn-primary">Login</button>
							</p>
						</fieldset>
					<?php
						echo form_close();
					?>
				</div><!--/span-->
			</div><!--/row-->
			