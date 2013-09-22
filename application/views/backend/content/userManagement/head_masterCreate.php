						<div class="row-fluid sortable">
							<div class="box span12">
								<div class="box-header well" data-original-title>
									<h2><i class="icon-edit"></i> <?php echo $_title_content ?></h2>
									<div class="box-icon">
										<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
										<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
										<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
									</div>
								</div>
								<div class="box-content">
										<fieldset>			
											<?php
											// untuk craete
													echo form_open_multipart("", array("class"=>"form-horizontal"));
											?>
											      <div class="control-group <?php if(form_error('full_name') != null) echo"error" ?>">
														<label class="control-label">Nama Admin </label>
														<div class="controls">
															<input type="text" style="width:30.5%" name="full_name" value="<?php echo set_value('full_name'); ?>">
															<?php if(form_error('full_name') != null) echo "<span class=\"help-inline\"> " . form_error('full_name') . " </span>"; ?>
														</div>
											      </div>
											      <div class="control-group <?php if(form_error('email') != null) echo"error" ?>">
														<label class="control-label">Email </label>
														<div class="controls">
															<input type="email" style="width:30.5%" name="email" value="<?php echo set_value('email'); ?>">
															<?php if(form_error('email') != null) echo "<span class=\"help-inline\"> " . form_error('email') . " </span>"; ?>
														</div>
											      </div>
											      <div class="control-group <?php if(form_error('repeat_email') != null) echo"error" ?>">
														<label class="control-label">Repeat Email </label>
														<div class="controls">
															<input type="email" style="width:30.5%" name="repeat_email" value="<?php echo set_value('repeat_email'); ?>">
															<?php if(form_error('repeat_email') != null) echo "<span class=\"help-inline\"> " . form_error('repeat_email') . " </span>"; ?>
														</div>
											      </div>
											      <div class="control-group <?php if(form_error('password') != null) echo"error" ?>">
														<label class="control-label">Kata Sandi </label>
														<div class="controls">
															<input type="password" style="width:30.5%" name="password" value="<?php echo set_value('password'); ?>">
															<?php if(form_error('password') != null) echo "<span class=\"help-inline\"> " . form_error('password') . " </span>"; ?>
														</div>
											      </div>
											      <div class="control-group <?php if(form_error('repeat_password') != null) echo"error" ?>">
														<label class="control-label">Ulangi Kata Sandi </label>
														<div class="controls">
															<input type="password" style="width:30.5%" name="repeat_password" value="<?php echo set_value('repeat_email'); ?>">
															<?php if(form_error('repeat_password') != null) echo "<span class=\"help-inline\"> " . form_error('repeat_password') . " </span>"; ?>
														</div>
											      </div>
											      <!--
												  <div class="control-group">
														<div class="controls">
															<input type="checkbox" id="inlineCheckbox1" value="option1" name="change_pass"> Rubah Sandi
														</div>
												  </div>
												  <div class="control-group">
														<label class="control-label">Sandi Baru </label>
														<div class="controls">
															<input type="text" class="span6" name="current_password" value="">
														</div>
											      </div>
											      <div class="control-group">
														<label class="control-label">Ulangi Sandi Baru </label>
														<div class="controls">
															<input type="text" class="span6" name="repeat_password" value="">
														</div>
											      </div>-->
											      <div class="form-actions">
												      <button type="submit" class="btn btn-primary" name="doCreate">Save changes</button>
												      <?php echo anchor("admin/administrator", "Back", array("class"=>"btn")); ?>
											      </div>
										</fieldset>
									<?php
											echo form_close();
									?>
								</div>
							</div><!--/span-->

						</div><!--/row-->
