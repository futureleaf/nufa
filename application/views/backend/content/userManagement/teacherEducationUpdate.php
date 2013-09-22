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
													<label class="control-label">Mengajar Pelajaran </label>
													<div class="controls">
														<?php foreach($pure_edus as $pure_edu): ?>
															<label class="checkbox inline">
																<input type="checkbox" name="edu[]" value="<?php echo $pure_edu->id_edu; ?>" 
																<?php 
																	$after = false;
																	foreach($redus as $redu){
																		if($redu->id_edu == $pure_edu->id_edu) {
																			if($redu->id_user == $id_user) echo ' checked="checked"';
																			else { $after = true; echo ' disabled=""'; }
																		}
																	} 
																?>> <?php echo $pure_edu->name_edu; echo ($after == FALSE)?"":"(Sudah Oleh Guru Lain)"; ?></input>
															</label>
															<br />
														<?php endforeach; ?>
													</div>
												</div>
												<div class="form-actions">
													<button type="submit" class="btn btn-primary" name="doUpdate">Save changes</button>
													<?php echo '<a href="#'.base_url().'admin/teacher" class="btn">Kembali</a>'; ?>
												</div>
										</fieldset>
									<?php
											echo form_close();
									?>
								</div>
							</div><!--/span-->

						</div><!--/row-->
