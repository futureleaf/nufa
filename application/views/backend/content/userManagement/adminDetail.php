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
										<fieldset class="form-horizontal">			
											<?php
													foreach($admin_details as $admin_detail):
											?>
													<div class="control-group">
														<label class="control-label">Nama <?php echo $_title; ?> </label>
														<div class="controls">
															<p><?php echo $admin_detail->full_name; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Email </label>
														<div class="controls">
															<p><?php echo $admin_detail->email; ?></p>
														</div>
													</div>
													<div class="form-actions">
														<?php echo anchor("admin/administrator/update/$admin_detail->id_user", "<i class=\"icon-edit icon-white\"></i> Perbaharui", array("class"=>"btn btn-info")); ?>
														<?php echo anchor("admin/index", "Back To Dashboard", array("class"=>"btn")); ?>
													</div>
										</fieldset>
									<?php
											endforeach;
											echo form_close();
									?>
								</div>
							</div><!--/span-->

						</div><!--/row-->
