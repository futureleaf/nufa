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
													foreach($head_master_record as $head_master):
											?>
													<div class="control-group">
														<label class="control-label">Nama <?php echo $_title; ?> </label>
														<div class="controls">
															<p><?php echo $head_master->full_name; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Email </label>
														<div class="controls">
															<p><?php echo $head_master->email; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Kota</label>
														<div class="controls">
															<p><?php echo $head_master->name_city; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Gambar </label>
														<div class="controls">
															<p><img src="<?php echo $uploads . "/thumbs/thumb_" . $head_master->picture_user; ?>" /></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Jenis Kelamin</label>
														<div class="controls">
															<p><?php echo ($head_master->gender == 1)?"Laki-laki":"Perempuan"; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Tanggal Lahir </label>
														<div class="controls">
															<p><?php echo $head_master->born_date; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Alamat </label>
														<div class="controls">
															<p><?php echo $head_master->address; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Deskripsi <?php echo $_title; ?> </label>
														<div class="controls">
															<p><?php echo $head_master->desc_user; ?></p>
														</div>
													</div>
													<div class="form-actions">
														<?php echo anchor("admin/head_master/update/$head_master->id_user", "<i class=\"icon-edit icon-white\"></i> Perbaharui", array("class"=>"btn btn-info")); ?>
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
