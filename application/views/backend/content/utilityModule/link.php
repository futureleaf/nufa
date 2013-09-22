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
										<th style="width:50%"><center>Link</center></th>
										<th style="width:12%"><center>Aksi</center></th>
									</tr>
								</thead>   
								<tbody>
									<?php $i = 0;foreach($linkes as $link) { ?>
									<tr>
										<td><center><?php echo ++$i ?></center></td>
										<td><?php echo $link->name_content ?></td>
										<td><?php echo $link->full_name ?></td>
										<td><?php echo $link->desc_content ?></td>
										<td class="center">
											<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 3 || $this->session->userdata('id_ruser') == 6) {
													echo ($link->is_acontent == 1)?'<a href="#'.base_url().'admin/link/toogle/'.$link->id_content.'/0" class="btn btn-warning" title="Toogle Active"><i class="icon-ok-circle icon-white"></i></a>':'<a href="#'.base_url().'admin/link/toogle/'.$link->id_content.'/1" class="btn btn-inverse" title="Toogle Active"><i class="icon-remove-circle icon-white"></i></a>'; ; 
													echo '<a href="#'.base_url().'admin/link/update/'.$link->id_content.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; 
													echo '<a href="#'.base_url().'admin/link/delete/'.$link->id_content.'" class="btn btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus '. $link->name_content  . ' ?\')"><i class="icon-trash icon-white"></i></a>'; 
												}
											?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php echo '
								<a href="#'.base_url().'admin/link/create" title="Buat Baru">
									<div class="bottom-table-1">
										<button class="btn btn-large btn-primary">
											<i class="icon-edit icon-white"></i>
										</button>
									</div>
								</a>
								'; 
							?>
							<!-- create end -->
						</div>
					</div><!--/span-->
				
				</div><!--/row-->
			</center>
