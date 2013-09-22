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
													foreach($teacher_record as $teacher):
											?>
													<div class="control-group">
														<label class="control-label">Nama <?php echo $_title; ?> </label>
														<div class="controls">
															<p><?php echo $teacher->full_name; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Email </label>
														<div class="controls">
															<p><?php echo $teacher->email; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Kota</label>
														<div class="controls">
															<p><?php echo $teacher->name_city; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Gambar </label>
														<div class="controls">
															<p><img src="<?php echo base_url() . $uploads . "/thumbs/thumb_" . $teacher->picture_user; ?>" /></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Jenis Kelamin</label>
														<div class="controls">
															<p><?php echo ($teacher->gender == 1)?"Laki-laki":"Perempuan"; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Tanggal Lahir </label>
														<div class="controls">
															<p><?php echo $teacher->born_date; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Alamat </label>
														<div class="controls">
															<p><?php echo $teacher->address; ?></p>
														</div>
													</div>
													<div class="control-group">
														<label class="control-label">Deskripsi <?php echo $_title; ?> </label>
														<div class="controls">
															<p><?php echo $teacher->desc_user; ?></p>
														</div>
													</div>
													<div class="form-actions">
														<?php echo '<a href="#'.base_url().'admin/teacher/grade/'.$teacher->id_user.'" class="btn" title="Buat Nilai"><i class="icon-list"></i> Buat Nilai</a>'; ?>
														<?php echo '<a href="#'.base_url().'admin/teacher/update/'.$teacher->id_user.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i> Perbaharui</a>'; ?>
														<?php echo '<a href="#'.base_url().'admin/teacher/delete/'.$teacher->id_user.'" class="btn btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus '.$teacher->full_name.' ?\')"><i class="icon-trash icon-white"></i> Hapus</a>'; ?>
														<?php echo ($this->session->userdata('id_user') == $id_user)?'<a href="#'.base_url().'admin/index" class="btn">Kembali</a>':'<a href="#'.base_url().'admin/teacher" class="btn">Kembali</a>'; ?>
													</div>
										</fieldset>
									<?php
											endforeach;
											echo form_close();
									?>
								</div>
							</div><!--/span-->

						</div><!--/row-->
