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
											?>
													<div class="control-group <?php if(form_error('nip') != null) echo"error" ?>">
														<label class="control-label">Nomer Induk Pegawai </label>
														<div class="controls">
															<input type="text" style="width:30.5%" name="nip" value="<?php echo (set_value('nip'))?set_value('nip'):""; ?>" />
															<?php if(form_error('nip') != null) echo "<span class=\"help-inline\"> " . form_error('nip') . " </span>"; ?>
														</div>
													</div>
													<div class="control-group <?php if(form_error('full_name') != null) echo"error" ?>">
														<label class="control-label">Nama <?php echo $_title; ?> </label>
														<div class="controls">
															<input type="text" style="width:30.5%" name="full_name" value="<?php echo (set_value('full_name'))?set_value('full_name'):""; ?>" />
															<?php if(form_error('full_name') != null) echo "<span class=\"help-inline\"> " . form_error('full_name') . " </span>"; ?>
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
														<label class="control-label">Kota</label>
														<div class="controls">
															<?php 
																foreach($cities as $city) {$citieses["$city->id_city"] = $city->name_city;}
																echo form_dropdown("id_city", $citieses, "", 'data-rel="chosen"'); 
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
																echo form_dropdown("gender", $genders, "", 'data-rel="chosen"'); 
															?>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Wali Kelas Di</label>
														<div class="controls">
															<?php
																$classs["0"] = "Tidak Mewalikan Kelas";
																foreach($classes as $class) {$classs["$class->id_class"] = $class->name_class;}
																echo form_dropdown("id_class", $classs, "", 'data-rel="chosen"');
															?>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Sebagai Pegawai</label>
														<div class="controls">
															<?php
																$classs["0"] = "Tidak Mewalikan Kelas";
																foreach($staffs as $staff) {$staffss["$staff->id_ruser"] = $staff->name_ruser;}
																echo form_dropdown("id_ruser", $staffss, "", 'data-rel="chosen"');
															?>
														</div>
													</div>
													<div class="control-group <?php if(form_error('born_date') != null) echo"error" ?>">
														<label class="control-label">Tanggal Lahir </label>
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
													<div class="control-group <?php if(form_error('desc_user') != null) echo"error" ?>">
														<label class="control-label">Deskripsi <?php echo $_title; ?> </label>
														<div class="controls">
															<textarea class="cleditor" rows="3" name="desc_user"><?php echo (set_value('desc_user'))?set_value('desc_user'):""; ?></textarea>
															<?php if(form_error('desc_user') != null) echo "<span class=\"help-inline\"> " . form_error('desc_user') . " </span>"; ?>
														</div>
													</div>
													<div class="form-actions">
														<button type="submit" class="btn btn-primary" name="doCreate">Save changes</button>
														<?php echo '<a href="#'.base_url().'admin/teacher" class="btn">Kembali</a>'; ?>
													</div>
										</fieldset>
									<?php
											echo form_close();
									?>
								</div>
							</div><!--/span-->

						</div><!--/row-->
