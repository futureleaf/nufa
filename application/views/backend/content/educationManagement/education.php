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
										<th><center>Nama Pelajaran</center></th>
										<th><center>KKM</center></th>
										<th><center>Pengajar</center></th>
										<th><center>Deskripsi</center></th>
										<th style="width:10%"><center>Aksi</center></th>
									</tr>
								</thead>   
								<tbody>
									<?php $i = 0;foreach($educations as $education) { ?>
									<tr>
									    <td><center><?php echo ++$i ?></center></td>
										<td><?php echo $education->name_edu ?></td>
										<td><?php echo $education->kkm ?></td>
										<td><?php echo ($education->full_name != "")?$education->full_name:"-"; ?></td>
										<td><?php echo ($education->desc_edu != "")?$education->desc_edu:"-"; ?></td>
										<td class="center">
											<center>
													<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 6) echo '<a href="#'.base_url().'admin/education/update/'.$education->id_edu.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; ?>
													<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 6) echo '<a href="#'.base_url().'admin/education/delete/'.$education->id_edu.'" class="btn btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus '. $education->name_edu  . ' ?\')"><i class="icon-trash icon-white"></i></a>'; ?>
											<center>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php echo '
								<a href="#'.base_url().'admin/education/create" title="Buat Baru">
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
