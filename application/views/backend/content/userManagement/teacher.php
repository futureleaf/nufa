<script src="/application/views/backend/js/jquery.js"></script>
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
										<th><center>Nama Lengkap</center></th>
										<th><center>Jabatan</center></th>
										<th><center>Email</center></th>
										<th><center>NIP</center></th>
										<th><center>Wali Kelas</center></th>
										<th style="width:21%"><center>Aksi</center></th>
									</tr>
								</thead>   
								<tbody>
								      <?php $i = 0;foreach($teachers as $teacher) { ?>
								      <tr>
											<td><center><?php echo ++$i ?></center></td>
											<td><?php echo $teacher->full_name ?></td>
											<td><?php echo $teacher->name_ruser ?></td>
											<td><?php echo $teacher->email ?></td>
											<td><?php echo $teacher->nip ?></td>
											<td><?php echo ($teacher->name_class=="")?"-":$teacher->name_class ?></td>
											<td class="center">
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2) echo '<a href="#'.base_url().'admin/teacher/view/'.$teacher->id_user.'" class="btn btn-success" title="Detail"><i class="icon-zoom-in icon-white"></i></a>'; ?>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 6) echo '<a href="#'.base_url().'admin/teacher/education/'.$teacher->id_user.'" class="btn btn-warning" title="Mata Pelajaran"><i class="icon-tasks"></i></a>'; ?>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2) echo '<a href="#'.base_url().'admin/teacher/grade/'.$teacher->id_user.'" class="btn" title="Buat Nilai"><i class="icon-list"></i></a>'; ?>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2) echo '<a href="#'.base_url().'admin/teacher/update/'.$teacher->id_user.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; ?>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2) echo ($teacher->id_ruser != 2)?'<a href="#'.base_url().'admin/teacher/delete/'.$teacher->id_user.'" class="btn btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus '.$teacher->full_name.' ?\')"><i class="icon-trash icon-white"></i></a>':""; ?>
											</td>
								      </tr>
								      <?php } ?>
								</tbody>
							</table>
							<?php echo '
								<a href="#'.base_url().'admin/teacher/create" title="Buat Baru">
									<div class="bottom-table-1">
										<button class="btn btn-large btn-primary">
											<i class="icon-edit icon-white"></i>
										</button>
									</div>
								</a>
								'; 
							?>
						</div>
					</div><!--/span-->
				
				</div><!--/row-->
