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
													foreach($class_record as $class):
											?>
													<div class="control-group <?php if(form_error('name_class') != null) echo"error" ?>">
														<label class="control-label">Nama <?php echo $_title; ?></label>
														<div class="controls">
															<input type="text" style="width:30.5%" name="name_class" value="<?php echo (set_value('name_class'))?set_value('name_class'):$class->name_class; ?>" />
															<?php if(form_error('name_class') != null) echo "<span class=\"help-inline\"> " . form_error('name_class') . " </span>"; ?>
														</div>
													</div>
													<div class="form-actions">
														<button type="submit" class="btn btn-primary" name="doUpdate">Save changes</button>
														<?php echo anchor("admin/classes", "Back", array("class"=>"btn")); ?>
													</div>
										</fieldset>
									<?php
											endforeach;
											echo form_close();
									?>
								</div>
							</div><!--/span-->

						</div><!--/row-->
