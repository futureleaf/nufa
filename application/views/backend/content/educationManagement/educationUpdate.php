			<?php
			// untuk update
			foreach($edu_update as $education) {
				echo form_open("", array("class"=>"form-horizontal"));
			?>
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
										<div class="control-group <?php if(form_error('name_edu') != null) echo"error" ?>">
											<label class="control-label" for="typeahead">Nama Pelajaran </label>
											<div class="controls">
												<input type="text" class="typeahead" name="name_edu" value="<?php echo (set_value('name_edu'))?set_value('name_edu'):$education->name_edu; ?>">
												<?php if(form_error('name_edu') != null) echo "<span class=\"help-inline\"> " . form_error('name_edu') . " </span>"; ?>
											</div>
										</div>
										<div class="control-group <?php if(form_error('kkm') != null) echo"error" ?>">
											<label class="control-label" for="typeahead">KKM </label>
											<div class="controls">
												<input type="text" class="typeahead" name="kkm" value="<?php echo (set_value('kkm'))?set_value('kkm'):$education->kkm; ?>" style="width:5%">
												<?php if(form_error('kkm') != null) echo "<span class=\"help-inline\"> " . form_error('kkm') . " </span>"; ?>
											</div>
										</div>
										<div class="control-group <?php if(form_error('id_user') != null) echo"error" ?>">
											<label class="control-label">Guru</label>
											<div class="controls">
												<?php echo form_dropdown("id_user", $teachers, $education->id_user, 'data-rel="chosen"'); ?>
												<?php if(form_error('id_user') != null) echo "<span class=\"help-inline\"> " . form_error('id_user') . " </span>"; ?>
											</div>
										</div>
										<div class="control-group <?php if(form_error('mode_edu[]') != null) echo"error" ?>">
											<label class="control-label">Semesters</label>
											<div class="controls">
												<label class="checkbox inline">
													<input type="checkbox" name="mode_edu[]" value="1" <?php if($education->mode_edu == 1 OR $education->mode_edu == 3 OR $education->mode_edu == 5 OR $education->mode_edu == 7 OR $education->mode_edu == 9 OR $education->mode_edu == 11 OR $education->mode_edu == 13 OR $education->mode_edu == 15 OR $education->mode_edu == 17 OR $education->mode_edu == 19 OR $education->mode_edu == 21 OR $education->mode_edu == 23 OR $education->mode_edu == 25 OR $education->mode_edu == 27 OR $education->mode_edu == 29 OR $education->mode_edu == 31 OR $education->mode_edu == 33 OR $education->mode_edu == 35 OR $education->mode_edu == 37 OR $education->mode_edu == 39 OR $education->mode_edu == 41 OR $education->mode_edu == 43 OR $education->mode_edu == 45 OR $education->mode_edu == 47 OR $education->mode_edu == 49 OR $education->mode_edu == 51 OR $education->mode_edu == 53 OR $education->mode_edu == 55 OR $education->mode_edu == 57 OR $education->mode_edu == 59 OR $education->mode_edu == 61 OR $education->mode_edu == 63) echo 'checked="checked"'; ?>> Semester 1
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="mode_edu[]" value="4" <?php if($education->mode_edu == 4 OR $education->mode_edu == 5 OR $education->mode_edu == 6 OR $education->mode_edu == 7 OR $education->mode_edu == 12 OR $education->mode_edu == 13 OR $education->mode_edu == 14 OR $education->mode_edu == 15 OR $education->mode_edu == 20 OR $education->mode_edu == 21 OR $education->mode_edu == 22 OR $education->mode_edu == 23 OR $education->mode_edu == 28 OR $education->mode_edu == 29 OR $education->mode_edu == 30 OR $education->mode_edu == 31 OR $education->mode_edu == 36 OR $education->mode_edu == 37 OR $education->mode_edu == 38 OR $education->mode_edu == 39 OR $education->mode_edu == 44 OR $education->mode_edu == 45 OR $education->mode_edu == 46 OR $education->mode_edu == 47 OR $education->mode_edu == 52 OR $education->mode_edu == 53 OR $education->mode_edu == 54 OR $education->mode_edu == 55 OR $education->mode_edu == 60 OR $education->mode_edu == 61 OR $education->mode_edu == 62 OR $education->mode_edu == 63) echo 'checked="checked"'; ?>> Semester 3
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="mode_edu[]" value="16" <?php if($education->mode_edu == 16 OR $education->mode_edu == 17 OR $education->mode_edu == 18 OR $education->mode_edu == 19 OR $education->mode_edu == 20 OR $education->mode_edu == 21 OR $education->mode_edu == 22 OR $education->mode_edu == 23 OR $education->mode_edu == 24 OR $education->mode_edu == 25 OR $education->mode_edu == 26 OR $education->mode_edu == 27 OR $education->mode_edu == 28 OR $education->mode_edu == 29 OR $education->mode_edu == 30 OR $education->mode_edu == 31 OR $education->mode_edu == 48 OR $education->mode_edu == 49 OR $education->mode_edu == 50 OR $education->mode_edu == 51 OR $education->mode_edu == 52 OR $education->mode_edu == 53 OR $education->mode_edu == 54 OR $education->mode_edu == 55 OR $education->mode_edu == 56 OR $education->mode_edu == 57 OR $education->mode_edu == 58 OR $education->mode_edu == 59 OR $education->mode_edu == 60 OR $education->mode_edu == 61 OR $education->mode_edu == 62 OR $education->mode_edu == 63) echo 'checked="checked"'; ?>> Semester 5
												</label><br />
												<label class="checkbox inline">
													<input type="checkbox" name="mode_edu[]" value="2" <?php if($education->mode_edu == 2 OR $education->mode_edu == 3 OR $education->mode_edu == 6 OR $education->mode_edu == 7 OR $education->mode_edu == 10 OR $education->mode_edu == 11 OR $education->mode_edu == 14 OR $education->mode_edu == 15 OR $education->mode_edu == 18 OR $education->mode_edu == 19 OR $education->mode_edu == 22 OR $education->mode_edu == 23 OR $education->mode_edu == 26 OR $education->mode_edu == 27 OR $education->mode_edu == 30 OR $education->mode_edu == 31 OR $education->mode_edu == 34 OR $education->mode_edu == 35 OR $education->mode_edu == 38 OR $education->mode_edu == 39 OR $education->mode_edu == 42 OR $education->mode_edu == 43 OR $education->mode_edu == 46 OR $education->mode_edu == 47 OR $education->mode_edu == 50 OR $education->mode_edu == 51 OR $education->mode_edu == 54 OR $education->mode_edu == 55 OR $education->mode_edu == 58 OR $education->mode_edu == 59 OR $education->mode_edu == 62 OR $education->mode_edu == 63) echo'checked="checked"'?>> Semester 2
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="mode_edu[]" value="8" <?php if($education->mode_edu == 8 OR $education->mode_edu == 9 OR $education->mode_edu == 10 OR $education->mode_edu == 11 OR $education->mode_edu == 12 OR $education->mode_edu == 13 OR $education->mode_edu == 14 OR $education->mode_edu == 15 OR $education->mode_edu == 24 OR $education->mode_edu == 25 OR $education->mode_edu == 26 OR $education->mode_edu == 27 OR $education->mode_edu == 28 OR $education->mode_edu == 29 OR $education->mode_edu == 30 OR $education->mode_edu == 31 OR $education->mode_edu == 40 OR $education->mode_edu == 41 OR $education->mode_edu == 42 OR $education->mode_edu == 43 OR $education->mode_edu == 44 OR $education->mode_edu == 45 OR $education->mode_edu == 46 OR $education->mode_edu == 47 OR $education->mode_edu == 56 OR $education->mode_edu == 57 OR $education->mode_edu == 58 OR $education->mode_edu == 59 OR $education->mode_edu == 60 OR $education->mode_edu == 61 OR $education->mode_edu == 62 OR $education->mode_edu == 63) echo 'checked="checked"'; ?>> Semester 4
												</label>
												<label class="checkbox inline">
													<input type="checkbox" name="mode_edu[]" value="32" <?php if($education->mode_edu == 32 OR $education->mode_edu == 33 OR $education->mode_edu == 34 OR $education->mode_edu == 35 OR $education->mode_edu == 36 OR $education->mode_edu == 37 OR $education->mode_edu == 38 OR $education->mode_edu == 39 OR $education->mode_edu == 40 OR $education->mode_edu == 41 OR $education->mode_edu == 42 OR $education->mode_edu == 43 OR $education->mode_edu == 44 OR $education->mode_edu == 45 OR $education->mode_edu == 46 OR $education->mode_edu == 47 OR $education->mode_edu == 48 OR $education->mode_edu == 49 OR $education->mode_edu == 50 OR $education->mode_edu == 51 OR $education->mode_edu == 52 OR $education->mode_edu == 53 OR $education->mode_edu == 54 OR $education->mode_edu == 55 OR $education->mode_edu == 56 OR $education->mode_edu == 57 OR $education->mode_edu == 58 OR $education->mode_edu == 59 OR $education->mode_edu == 60 OR $education->mode_edu == 61 OR $education->mode_edu == 62 OR $education->mode_edu == 63) echo 'checked="checked"'; ?>> Semester 6
												</label>
												<?php if(form_error('mode_edu[]') != null) echo "<span class=\"help-inline\"> " . form_error('mode_edu[]') . " </span>"; ?>
											</div>
										</div>
										<div class="control-group <?php if(form_error('desc_edu') != null) echo"error" ?>">
											<label class="control-label">Description</label>
											<div class="controls">
												<textarea class="cleditor" rows="3" name="desc_edu"><?php echo (set_value('desc_edu'))?set_value('desc_edu'):$education->desc_edu; ?></textarea>
												<?php if(form_error('desc_edu') != null) echo "<span class=\"help-inline\"> " . form_error('desc_edu') . " </span>"; ?>
											</div>
										</div>
										<div class="form-actions">
											<button type="submit" class="btn btn-primary" name="doUpdate">Save changes</button>
											<?php echo '<a href="#'.base_url().'admin/education" class="btn">Kembali</a>'; ?>
										</div>
									</fieldset>
								</div>
							</div><!--/span-->

						</div><!--/row-->
			<?php
				echo form_close();
			}
			?>
