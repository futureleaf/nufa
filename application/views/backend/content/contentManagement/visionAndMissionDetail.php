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
											foreach($visionAndMissiones as $visionAndMission) :
										?>
												<div class="control-group">
													<label class="control-label">Nama <?php echo $_title; ?> </label>
													<div class="controls">
														<p><?php echo $visionAndMission->name_content; ?></p>
													</div>
												</div>
												<div class="control-group">
													<label class="control-label">Deskripsi </label>
													<div class="controls">
														<p><?php echo $visionAndMission->desc_content; ?></p>
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
																echo '<a href="#'.base_url().'admin/visionAndMission/commentUpdate/'.$visionAndMission->id_content.'/'.$comment->id_comment.'" class="btn btn-mini btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; 
																echo '<a href="#'.base_url().'admin/visionAndMission/commentDelete/'.$visionAndMission->id_content.'/'.$comment->id_comment.'" class="btn btn-mini btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus komentar ?\')"><i class="icon-trash icon-white"></i></a>'; 
															?>
														</div>
													</div>
												<?php
													$i++;
													endforeach;
												?>
												<div class="form-actions">
													<?php echo '<a href="#'.base_url().'admin/visionAndMission/update/'.$visionAndMission->id_content.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i> Perbaharui</a>'; ?>
													<?php echo '<a href="#'.base_url().'admin/visionAndMission" class="btn">Kembali</a>'; ?>
												</div>
										<?php
											endforeach;
										?>
									</fieldset>
								</div>
							</div><!--/span-->

						</div><!--/row-->
