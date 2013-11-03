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
													foreach($head_master_record as $head_master):
											?>
													<div class="control-group <?php if(form_error('full_name') != null) echo"error" ?>">
														<label class="control-label">Nama <?php echo $_title; ?> </label>
														<div class="controls">
															<input type="text" style="width:30.5%" name="full_name" value="<?php echo (set_value('full_name'))?set_value('full_name'):$head_master->full_name; ?>" />
															<?php if(form_error('full_name') != null) echo "<span class=\"help-inline\"> " . form_error('full_name') . " </span>"; ?>
														</div>
													</div>
													<div class="control-group">
														<div class="controls">
															<label class="radio">
																<input type="checkbox" name="change_email" value="TRUE"  /> Rubah email
															</label>
														</div>
													</div>
													<div class="control-group <?php if(form_error('email') != null) echo"error" ?>">
														<label class="control-label">Email </label>
														<div class="controls">
															<input type="email" style="width:30.5%" name="email" value="<?php echo (set_value('email'))?set_value('email'):$head_master->email; ?>" />
															<?php if(form_error('email') != null) echo "<span class=\"help-inline\"> " . form_error('email') . " </span>"; ?>
														</div>
													</div>
													<div class="control-group <?php if(form_error('repeat_email') != null) echo"error" ?>">
														<label class="control-label">Ulangi Email </label>
														<div class="controls">
															<input type="email" style="width:30.5%" name="repeat_email" value="<?php echo (set_value('repeat_email'))?set_value('repeat_email'):$head_master->email; ?>" />
															<?php if(form_error('repeat_email') != null) echo "<span class=\"help-inline\"> " . form_error('repeat_email') . " </span>"; ?>
														</div>
													</div>
													<div class="control-group">
														<div class="controls">
															<label class="radio">
																<input type="checkbox" name="change_pass" value="TRUE"  /> Rubah password
															</label>
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
														<label class="control-label">Kota</label>
														<div class="controls">
															<select name="id_city" data-rel="chosen">
																<?php
																	foreach($cities as $city) {
																		echo "<option value='$city->id_city' set_select('myselect', 'one', TRUE) >$city->name_city</option>";
																	}
																?>
															</select>
														</div>
													</div>
													<div class="control-group">
														<div class="controls">
															<label class="radio">
																<input type="checkbox" name="change_photo" value="TRUE"  /> Rubah photo
															</label>
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
															<select name="gender" data-rel="chosen">
																<option value="1">Laki-Laki</option>
																<option value="0">Perempuan</option>
															</select>
														</div>
													</div>
													<div class="control-group <?php if(form_error('born_date') != null) echo"error" ?>">
														<label class="control-label">Tanggal Lahir </label>
														<div class="controls">
															<input class="datepicker" type="text" style="width:30.5%" name="born_date" value="<?php echo (set_value('born_date'))?set_value('born_date'):$head_master->born_date; ?>" />
															<?php if(form_error('born_date') != null) echo "<span class=\"help-inline\"> " . form_error('born_date') . " </span>"; ?>
														</div>
													</div>
													<div class="control-group <?php if(form_error('address') != null) echo"error" ?>">
														<label class="control-label">Alamat </label>
														<div class="controls">
															<textarea rows="3" name="address"><?php echo (set_value('address'))?set_value('address'):$head_master->address; ?></textarea>
															<?php if(form_error('address') != null) echo "<span class=\"help-inline\"> " . form_error('address') . " </span>"; ?>
														</div>
													</div>
													<div class="control-group <?php if(form_error('desc_user') != null) echo"error" ?>">
														<label class="control-label">Deskripsi <?php echo $_title; ?> </label>
														<div class="controls">
															<textarea class="cleditor" rows="3" name="desc_user"><?php echo (set_value('desc_user'))?set_value('desc_user'):$head_master->desc_user; ?></textarea>
															<?php if(form_error('desc_user') != null) echo "<span class=\"help-inline\"> " . form_error('desc_user') . " </span>"; ?>
														</div>
													</div>
													<div class="form-actions">
														<button type="submit" class="btn btn-primary" name="doUpdate">Save changes</button>
														<?php echo anchor("admin/head_master", "Back", array("class"=>"btn")); ?>
													</div>
										</fieldset>
									<?php
											endforeach;
											echo form_close();
									?>
								</div>
							</div><!--/span-->

						</div><!--/row-->
