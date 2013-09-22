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
													foreach($student_record as $student):
											?>
													<div class="control-group">
														<label class="control-label">Nama <?php echo $_title; ?> </label>
														<div class="controls">
															<p><?php echo $student->full_name; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Nama Orang Tua <?php echo $_title; ?> </label>
														<div class="controls">
															<p><?php echo $student->parent_name; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Email </label>
														<div class="controls">
															<p><?php echo $student->email; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Nomer Jenjang </label>
														<div class="controls">
															<p><?php echo $student->no_jenjang; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">NIS </label>
														<div class="controls">
															<p><?php echo $student->nis; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">NISN </label>
														<div class="controls">
															<p><?php echo $student->nisn; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Kelas </label>
														<div class="controls">
															<p><?php echo $student->name_class; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Status Pemakaian </label>
														<div class="controls">
															<p><?php echo ($student->is_auser==1)?"Aktif":"Tidak Aktif"; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Kota</label>
														<div class="controls">
															<p><?php echo $student->name_city; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Gambar </label>
														<div class="controls">
															<p><img src="<?php echo base_url() . $uploads . "/thumbs/thumb_" . $student->picture_user; ?>" /></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Jenis Kelamin</label>
														<div class="controls">
															<p><?php echo ($student->gender == 1)?"Laki-laki":"Perempuan"; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Tanggal Lahir </label>
														<div class="controls">
															<p><?php echo $this->method->dateFromDatabase($student->born_date); ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Alamat </label>
														<div class="controls">
															<p><?php echo $student->address; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Deskripsi <?php echo $_title; ?> </label>
														<div class="controls">
															<p><?php echo $student->desc_user; ?></p>
														</div>
													</div>
													<div class="form-actions">
													<?php echo '<a href="#'.base_url().'admin/student/update/'.$student->id_user.'" class="btn btn-info" title="Perbaharui"><i class="icon-edit icon-white"></i> Perbaharui</a>'; ?>
														<?php echo '<a href="#'.base_url().'admin/student" class="btn">Kembali</a>'; ?>
													</div>
										</fieldset>
									<?php
											endforeach;
											echo form_close();
									?>
								</div>
							</div><!--/span-->

						</div><!--/row-->
