			<?php
			// untuk update
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
									<form class="form-horizontal">
										<fieldset>
												<div class="control-group <?php if(form_error('name_edu') != null) echo"error" ?>">
													<label class="control-label" for="typeahead">Nama Pelajaran </label>
													<div class="controls">
														<input type="text" class="typeahead" name="name_edu" value="<?php echo (set_value('name_edu'))?set_value('name_edu'):""; ?>">
														<?php if(form_error('name_edu') != null) echo "<span class=\"help-inline\"> " . form_error('name_edu') . " </span>"; ?>
													</div>
												</div>
												<div class="control-group <?php if(form_error('kkm') != null) echo"error" ?>">
													<label class="control-label" for="typeahead">KKM </label>
													<div class="controls">
														<input type="text" class="span1 typeahead" name="kkm" value="<?php echo (set_value('kkm'))?set_value('kkm'):""; ?>">
														<?php if(form_error('kkm') != null) echo "<span class=\"help-inline\"> " . form_error('kkm') . " </span>"; ?>
													</div>
												</div>
												<div class="control-group <?php if(form_error('id_user') != null) echo"error" ?>">
													<label class="control-label">Guru</label>
													<div class="controls">
														<?php echo form_dropdown("id_user", $teachers, '', 'data-rel="chosen"'); ?>
														<?php if(form_error('id_user') != null) echo "<span class=\"help-inline\"> " . form_error('id_user') . " </span>"; ?>
													</div>
												</div>
												<div class="control-group <?php if(form_error('mode_edu[]') != null) echo"error" ?>">
													<label class="control-label">Semesters</label>
													<div class="controls">
														<label class="checkbox inline">
															<input type="checkbox" name="mode_edu[]" value="1"> Semester 1
														</label>
														<label class="checkbox inline">
															<input type="checkbox" name="mode_edu[]" value="4"> Semester 3
														</label>
														<label class="checkbox inline">
															<input type="checkbox" name="mode_edu[]" value="16"> Semester 5
														</label><br />
														<label class="checkbox inline">
															<input type="checkbox" name="mode_edu[]" value="2"> Semester 2
														</label>
														<label class="checkbox inline">
															<input type="checkbox" name="mode_edu[]" value="8"> Semester 4
														</label>
														<label class="checkbox inline">
															<input type="checkbox" name="mode_edu[]" value="32"> Semester 6
														</label>
														<?php if(form_error('mode_edu[]') != null) echo "<span class=\"help-inline\"> " . form_error('mode_edu[]') . " </span>"; ?>
													</div>
												</div>
												<div class="control-group <?php if(form_error('desc_edu') != null) echo"error" ?>">
													<label class="control-label">Description</label>
													<div class="controls">
														<textarea class="cleditor" rows="3" name="desc_edu"><?php echo (set_value('desc_edu'))?set_value('desc_edu'):""; ?></textarea>
														<?php if(form_error('desc_edu') != null) echo "<span class=\"help-inline\"> " . form_error('desc_edu') . " </span>"; ?>
													</div>
												</div>
												<div class="form-actions">
													<button type="submit" class="btn btn-primary" name="doCreate">Save changes</button>
													<?php echo '<a href="#'.base_url().'admin/education" class="btn">Kembali</a>'; ?>
												</div>
										</fieldset>
									</form>   
								</div>
							</div><!--/span-->

						</div><!--/row-->

			<?php
					echo form_close();
			?>