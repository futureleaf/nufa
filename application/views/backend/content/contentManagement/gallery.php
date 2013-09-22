			<center>
				<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header well" data-original-title>
							<h2><i class="icon-user"></i> <?php echo $_title_content ?></h2>
							<div class="box-icon">
								<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
								<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content">
							<table class="table table-striped table-bordered bootstrap-datatable datatable">
								<thead>
									<tr>
										<th style="width:5%;"><center>No</center></th>
										<th><center>Nama <?php echo $_title ?> </center></th>
										<th><center>Penulis</center></th>
										<th><center>Update Date</center></th>
										<th style="width:15.5%"><center>Aksi</center></th>
									</tr>
								</thead>   
								<tbody>
									<?php $i = 0;foreach($galleryes as $gallery) { ?>
									<tr>
									    <td><center><?php echo ++$i ?></center></td>
										<td><?php echo $gallery->name_content ?></td>
										<td><?php echo $gallery->full_name ?></td>
										<td><?php echo $gallery->ud_content ?></td>
										<td class="center">
											<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 3 || $this->session->userdata('id_ruser') == 6) {
												echo '<a href="#'.base_url().'admin/gallery/picture/'.$gallery->id_content.'" class="btn btn-success" title="Tambah Gambar"><i class="icon-picture icon-white"></i></a>'; 
												echo ($gallery->is_acontent == 1)?'<a href="#'.base_url().'admin/gallery/toogle/'.$gallery->id_content.'/0" class="btn btn-warning" title="Toogle Active"><i class="icon-ok-circle icon-white"></i></a>':'<a href="#'.base_url().'admin/gallery/toogle/'.$gallery->id_content.'/1" class="btn btn-inverse" title="Toogle Active"><i class="icon-remove-circle icon-white"></i></a>'; ; 
												echo '<a href="#'.base_url().'admin/gallery/update/'.$gallery->id_content.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; 
												echo '<a href="#'.base_url().'admin/gallery/delete/'.$gallery->id_content.'" class="btn btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus '. $gallery->name_content  . ' ?\')"><i class="icon-trash icon-white"></i></a>'; 
											  }
											  ?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<!-- create begin -->
							<div class="modal hide fade span6" id="btnCreate" style="text-align:left;margin-left:-20%;margin-top:-10%">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">×</button>
									<h3>Buat Entry <?php echo $_title; ?> Baru</h3>
								</div>
								<?php echo form_open("", array("class"=>"form-horizontal")); ?>
									<div class="modal-body">
										<!-- begin -->
										<div class="box-content">
											<fieldset>
												<div class="control-group">
													<label class="control-label">Nama </label>
													<div class="controls">
													      <input type="text" class="span6" name="name_content" />
													</div>
												</div>
											</fieldset>
										</div>
										<!-- end -->
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" name="doCreate">Simpan</button>
										<a href="#" class="btn" data-dismiss="modal">Batal</a>
									</div>
								<?php echo form_close(); ?> 
							</div>
							<a href="#" class="btn-create" title="Buat Baru">
								<div class="create-table bottom-table-1">
									<button class="btn btn-large btn-primary">
										<i class="icon-edit icon-white"></i> 
									</button>
								</div>
							</a>
							<!-- create end -->
						</div>
					</div><!--/span-->
				
				</div><!--/row-->
			</center>
