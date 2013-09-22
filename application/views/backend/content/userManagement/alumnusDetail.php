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
													foreach($alumnus_record as $alumnus):
											?>
													<div class="control-group">
														<label class="control-label">Nama <?php echo $_title; ?> </label>
														<div class="controls">
															<p><?php echo $alumnus->full_name; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Nama Orang Tua <?php echo $_title; ?> </label>
														<div class="controls">
															<p><?php echo $alumnus->parent_name; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Email </label>
														<div class="controls">
															<p><?php echo $alumnus->email; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Nomer Jenjang </label>
														<div class="controls">
															<p><?php echo $alumnus->no_jenjang; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">NIS </label>
														<div class="controls">
															<p><?php echo $alumnus->nis; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">NISN </label>
														<div class="controls">
															<p><?php echo $alumnus->nisn; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Kelas </label>
														<div class="controls">
															<p><?php echo $alumnus->name_class; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Status Pemakaian </label>
														<div class="controls">
															<p><?php echo ($alumnus->is_auser==1)?"Aktif":"Tidak Aktif"; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Kota</label>
														<div class="controls">
															<p><?php echo $alumnus->name_city; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Gambar </label>
														<div class="controls">
															<p><img src="<?php echo base_url() . $uploads . "/thumbs/thumb_" . $alumnus->picture_user; ?>" /></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Jenis Kelamin</label>
														<div class="controls">
															<p><?php echo ($alumnus->gender == 1)?"Laki-laki":"Perempuan"; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Tanggal Lahir </label>
														<div class="controls">
															<p><?php echo $this->method->dateFromDatabase($alumnus->born_date); ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Alamat </label>
														<div class="controls">
															<p><?php echo $alumnus->address; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Deskripsi <?php echo $_title; ?> </label>
														<div class="controls">
															<p><?php echo $alumnus->desc_user; ?></p>
														</div>
													</div>
													<div class="form-actions">
													<?php echo '<a href="#'.base_url().'admin/alumnus/update/'.$alumnus->id_user.'" class="btn btn-info" title="Perbaharui"><i class="icon-edit icon-white"></i> Perbaharui</a>'; ?>
														<?php echo '<a href="#'.base_url().'admin/alumnus" class="btn">Kembali</a>'; ?>
													</div>
										</fieldset>
									<?php
											endforeach;
											echo form_close();
									?>
								</div>
							</div><!--/span-->

						</div><!--/row-->
