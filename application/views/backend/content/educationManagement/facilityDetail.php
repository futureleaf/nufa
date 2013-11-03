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
											foreach($facilityes as $facility) :
										?>
												<div class="control-group">
													<label class="control-label">Nama <?php echo $_title; ?> </label>
													<div class="controls">
														<p><?php echo $facility->name_content; ?></p>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Gambar Utama </label>
													<div class="controls">
														<p><img src="<?php echo $uploads . "/thumbs/thumb_" . $facility->picture_content; ?>" /></p>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Deskripsi </label>
													<div class="controls">
														<p><?php echo $facility->desc_content; ?></p>
													</div>
												</div>
												<?php
													$i = 1;
													foreach($comments as $comment) :
												?>
													<div class="control-group">
														<label class="control-label">Komentar <?php echo $i; ?> </label>
														<div class="controls">
															<p>Penulis : <?php echo $comment->author_comment; ?></p>
															<p>Email : <?php echo $comment->email_comment; ?></p>
															<p>Deskripsi : <?php echo $comment->desc_comment; ?></p>
															<p>Action : 
															<?php
																echo '<a href="#'.base_url().'admin/facility/commentUpdate/'.$facility->id_content.'/'.$comment->id_comment.'" class="btn btn-mini btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; 
																echo '<a href="#'.base_url().'admin/facility/commentDelete/'.$facility->id_content.'/'.$comment->id_comment.'" class="btn btn-mini btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus komentar ?\')"><i class="icon-trash icon-white"></i></a>'; 
															?>
														</div>
													</div>
												<?php
													$i++;
													endforeach;
												?>
												<div class="form-actions">
													<?php echo '<a href="#'.base_url().'admin/facility/commentCreate/'.$facility->id_content.'" class="btn btn-inverse" title="Komentar"><i class="icon-comment icon-white"></i> Buat Komentar</a>'; ?>
													<?php echo '<a href="#'.base_url().'admin/facility/update/'.$facility->id_content.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i> Perbaharui</a>'; ?>
													<?php echo '<a href="#'.base_url().'admin/facility" class="btn">Kembali</a>'; ?>
												</div>
										<?php
											endforeach;
										?>
									</fieldset>
								</div>
							</div><!--/span-->

						</div><!--/row-->
