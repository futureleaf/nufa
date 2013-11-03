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
													<input type="hidden" name="grade" value="0" />
													<div class="control-group">
														<label class="control-label">Nama Pelajaran</label>
														<div class="controls">
															<select name="id_edu" data-rel="chosen">
																<?php
																	foreach($education_record as $education) {
																		echo "<option value='$education->id_edu' set_select('myselect', 'one', TRUE) >$education->name_edu</option>";
																	}
																?>
															</select>
														</div>
													</div>
													<div class="control-group <?php if(form_error('name_grade') != null) echo"error" ?>">
														<label class="control-label">Nama Ulangan </label>
														<div class="controls">
															<input type="text" style="width:30.5%" name="name_grade" value="<?php echo (set_value('name_grade'))?set_value('name_grade'):""; ?>" />
															<?php if(form_error('name_grade') != null) echo "<span class=\"help-inline\"> " . form_error('name_grade') . " </span>"; ?>
														</div>
													</div>
													<div class="control-group <?php if(form_error('desc_grade') != null) echo"error" ?>">
														<label class="control-label">Pesan (untuk semua)</label>
														<div class="controls">
															<textarea name="desc_grade"><?php echo (set_value('desc_grade'))?set_value('desc_grade'):""; ?></textarea>
															<?php if(form_error('desc_grade') != null) echo "<span class=\"help-inline\"> " . form_error('desc_grade') . " </span>"; ?>
														</div>
													</div>
													<div class="form-actions">
														<button type="submit" class="btn btn-primary" name="doCreate">Save</button>
														<?php echo '<a href="#'.base_url().'admin/teacher/grade/'.$id_user.'/'.$id_semester.'" title="Kembali" class="btn">Kembali</a>'; ?>
													</div>
									<?php
										echo form_close();
									?>
									</fieldset>
								</div>
							</div><!--/span-->

						</div><!--/row-->