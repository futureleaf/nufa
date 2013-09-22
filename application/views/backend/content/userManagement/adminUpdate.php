						<div class="row-fluid sortable">
							<div class="box span12">
								<div class="box-header well" data-original-title>
									<h2><i class="icon-edit"></i> <?php echo $_title_content ?></h2>
									<div class="box-icon">
										<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
										<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
									</div>
								</div>
								<div class="box-content">
										<fieldset>			
											<?php
											// untuk craete
													echo form_open_multipart("", array("class"=>"form-horizontal"));
													foreach($admin_update as $admin):
											?>
												<input type="hidden" name="current_password" value="<?php echo $this->encrypt->decode($admin->password); ?>" />
												  <div class="control-group">
														<div class="controls">
															<label class="radio">
																<input type="checkbox" name="change_name" value="TRUE" <?php echo (isset($change_name))?'checked="checked"':''; ?> /> Rubah nama
															</label>
														</div>
												  </div>
											      <div class="control-group <?php if(form_error('full_name') != null) echo"error" ?>">
														<label class="control-label">Nama Admin </label>
														<div class="controls">
															<input type="text" style="width:30.5%" name="full_name" value="<?php echo (set_value('full_name'))?set_value('full_name'):$admin->full_name; ?>" />
															<?php if(form_error('full_name') != null) echo "<span class=\"help-inline\"> " . form_error('full_name') . " </span>"; ?>
														</div>
											      </div>
												  <div class="control-group">
														<div class="controls">
															<label class="radio">
																<input type="checkbox" name="change_email" value="TRUE" <?php echo (isset($change_email))?'checked="checked"':''; ?> /> Rubah email
															</label>
														</div>
												  </div>
											      <div class="control-group <?php if(form_error('email') != null) echo"error" ?>">
														<label class="control-label">Email </label>
														<div class="controls">
															<input type="email" style="width:30.5%" name="email" value="<?php echo (set_value('email'))?set_value('email'):$admin->email; ?>" />
															<?php if(form_error('email') != null) echo "<span class=\"help-inline\"> " . form_error('email') . " </span>"; ?>
														</div>
											      </div>
											      <div class="control-group <?php if(form_error('repeat_email') != null) echo"error" ?>">
														<label class="control-label">Update Email </label>
														<div class="controls">
															<input type="email" style="width:30.5%" name="repeat_email" value="<?php echo (set_value('repeat_email'))?set_value('repeat_email'):$admin->email; ?>" />
															<?php if(form_error('repeat_email') != null) echo "<span class=\"help-inline\"> " . form_error('repeat_email') . " </span>"; ?>
														</div>
											      </div>
												  <div class="control-group">
														<div class="controls">
															<label class="radio">
																<input type="checkbox" name="change_pass" value="TRUE" <?php echo (isset($change_pass))?'checked="checked"':''; ?> /> Rubah password
															</label>
														</div>
												  </div>
											      <div class="control-group <?php if(form_error('old_password') != null) echo"error" ?>">
														<label class="control-label">Kata Sandi Lama</label>
														<div class="controls">
															<input type="password" style="width:30.5%" name="old_password" value="<?php echo (set_value('old_password'))?set_value('old_password'):""; ?>" />
															<?php if(form_error('old_password') != null) echo "<span class=\"help-inline\"> " . form_error('old_password') . " </span>"; ?>
														</div>
											      </div>
											      <div class="control-group <?php if(form_error('password') != null) echo"error" ?>">
														<label class="control-label">Kata Sandi Baru</label>
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
											      <div class="form-actions">
														<button type="submit" class="btn btn-primary" name="doUpdate">Save changes</button>
														<?php echo ($this->session->userdata('id_user') == $id_user)?'<a href="#'.base_url().'admin/administrator/view/'.$this->session->userdata('id_user').'" class="btn">Kembali</a>':'<a href="#'.base_url().'admin/administrator" class="btn">Kembali</a>'; ?>
											      </div>
										</fieldset>
									<?php
											endforeach;
											echo form_close();
									?>
								</div>
							</div><!--/span-->

						</div><!--/row-->
