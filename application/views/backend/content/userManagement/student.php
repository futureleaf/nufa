<?php
	if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || ($this->session->userdata('id_ruser') == 3 && $this->session->userdata('id_class') == 3)) {
?>				
				<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header well" data-original-title>
							<h2><i class="icon-user"></i> <?php echo $_title_content ?> Kelas 9</h2>
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
										<th><center>Email</center></th>
										<th><center>NIS</center></th>
										<th><center>NISN</center></th>
										<th><center>Status</center></th>
										<th style="width:26%"><center>Aksi</center></th>
									</tr>
								</thead>	 
								<tbody>
									<?php $i = 0;foreach($studentixs as $student) { ?>
									<tr>
										<td><center><?php echo ++$i ?></center></td>
										<td><?php echo $student->full_name ?></td>
										<td><?php echo $student->email ?></td>
										<td><?php echo $student->nis ?></td>
										<td><?php echo $student->nisn ?></td>
										<td><center><?php echo ($student->is_auser==1)?"<span class=\"label label-success\">Aktif</span>":"<span class=\"label label-important\">Tidak Aktif</span>" ?></center></td>
										<td class="center">
											<center>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 6) echo '<a href="#'.base_url().'admin/student/view/'.$student->id_user.'" class="btn btn-success" title="Detail"><i class="icon-zoom-in icon-white"></i></a>'; ?>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 6) echo '<a href="#'.base_url().'admin/student/up/3/'.$student->id_user.'" class="btn btn-warning" title="Naik Kelas"><i class="icon-eject icon-white"></i></a>'; ?>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 6) echo '<a href="#'.base_url().'admin/student/down/3/'.$student->id_user.'" class="btn btn-warning" title="Turun Kelas"><i class="icon-arrow-down icon-white"></i></a>'; ?>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 6) echo '<a href="#'.base_url().'admin/student/grade/'.$student->id_user.'" class="btn" title="Lihat Nilai"><i class="icon-list"></i></a>'; ?>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 6) echo '<a href="#'.base_url().'admin/student/update/'.$student->id_user.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; ?>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 6) echo '<a href="#'.base_url().'admin/student/delete/'.$student->id_user.'" class="btn btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus '.$student->full_name.' ?\')"><i class="icon-trash icon-white"></i></a>'; ?>
											<center>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php echo '
								<a href="#'.base_url().'admin/student/create/3" title="Buat Baru">
									<div class="bottom-table-1">
										<button class="btn btn-large btn-primary">
											<i class="icon-edit icon-white"></i>
										</button>
									</div>
								</a>
								'; 
							?>
							<?php echo anchor("admin/student/export/3", '
								<div class="bottom-table-2">
									<button class="btn btn-large btn-inverse">
										<i class="icon-share icon-white"></i>
									</button>
								</div>
								', array("title"=>"Export Exel")); 
							?>
							<?php echo ('
								<a href="#'.base_url().'admin/student/upAll/3" title="Jadikan Alumni" onClick="return confirm(\'Anda yakin ingin mengubah semua murid menjadi alumni ?\')">
									<div class="bottom-table-4">
										<button class="btn btn-large btn-warning">
											<i class="icon-eject icon-white"></i>
										</button>
									</div>
								</a>
								'); 
							?>
							<?php echo ('
								<a href="#'.base_url().'admin/student/downAll/3" title="Turun Kelas" onClick="return confirm(\'Anda yakin ingin menurunkan murid menjadi kelas 2 ?\')">
									<div class="bottom-table-3">
										<button class="btn btn-large btn-warning">
											<i class="icon-arrow-down icon-white"></i>
										</button>
									</div>
								</a>
								'); 
							?>
						</div>
					</div><!--/span-->
				
				</div><!--/row-->
<?php
	}
	if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || ($this->session->userdata('id_ruser') == 3 && $this->session->userdata('id_class') == 2)) {
?>
				<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header well" data-original-title>
							<h2><i class="icon-user"></i> <?php echo $_title_content ?> Kelas 8</h2>
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
										<th><center>Email</center></th>
										<th><center>NIS</center></th>
										<th><center>NISN</center></th>
										<th><center>Status</center></th>
										<th style="width:25%"><center>Aksi</center></th>
									</tr>
								</thead>	 
								<tbody>
									<?php $i = 0;foreach($studentviiis as $student) { ?>
									<tr>
										<td><center><?php echo ++$i ?></center></td>
										<td><?php echo $student->full_name ?></td>
										<td><?php echo $student->email ?></td>
										<td><?php echo $student->nis ?></td>
										<td><?php echo $student->nisn ?></td>
										<td><center><?php echo ($student->is_auser==1)?"<span class=\"label label-success\">Aktif</span>":"<span class=\"label label-important\">Tidak Aktif</span>" ?></center></td>
										<td class="center">
											<center>
												<?php echo '<a href="#'.base_url().'admin/student/view/'.$student->id_user.'" class="btn btn-success" title="Detail"><i class="icon-zoom-in icon-white"></i></a>'; ?>
												<?php echo '<a href="#'.base_url().'admin/student/up/2/'.$student->id_user.'" class="btn btn-warning" title="Naik Kelas"><i class="icon-arrow-up icon-white"></i></a>'; ?>
												<?php echo '<a href="#'.base_url().'admin/student/down/2/'.$student->id_user.'" class="btn btn-warning" title="Turun Kelas"><i class="icon-arrow-down icon-white"></i></a>'; ?>
												<?php echo '<a href="#'.base_url().'admin/student/grade/'.$student->id_user.'" class="btn" title="Lihat Nilai"><i class="icon-list"></i></a>'; ?>
												<?php echo '<a href="#'.base_url().'admin/student/update/'.$student->id_user.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; ?>
												<?php echo '<a href="#'.base_url().'admin/student/delete/'.$student->id_user.'" class="btn btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus $student->full_name ?\')"><i class="icon-trash icon-white"></i></a>'; ?>
											<center>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php echo '
								<a href="#'.base_url().'admin/student/create/2" title="Buat Baru">
									<div class="bottom-table-1">
										<button class="btn btn-large btn-primary">
											<i class="icon-edit icon-white"></i>
										</button>
									</div>
								</a>
								'; 
							?>
							<?php echo anchor("admin/student/export/2", '
								<div class="bottom-table-2">
									<button class="btn btn-large btn-inverse">
										<i class="icon-share icon-white"></i>
									</button>
								</div>
								', array("title"=>"Export Exel")); 
							?>
							<?php echo ('
								<a href="#'.base_url().'admin/student/downAll/2" title="Turun Kelas" onClick="return confirm(\'Anda yakin ingin menurunkan semua murid ke kelas 1 ?\')">
									<div class="bottom-table-3">
										<button class="btn btn-large btn-warning">
											<i class="icon-arrow-down icon-white"></i>
										</button>
									</div>
								</a>
								'); 
							?>
							<?php echo ('
								<a href="#'.base_url().'admin/student/upAll/2" title="Naik Kelas" onClick="return confirm(\'Anda yakin ingin menaikan semua murid ke kelas 3 ?\')">
									<div class="bottom-table-4">
										<button class="btn btn-large btn-warning">
											<i class="icon-arrow-up icon-white"></i>
										</button>
									</div>
								</a>
								'); 
							?>
						</div>
					</div><!--/span-->
				
				</div><!--/row-->
<?php
	}
	if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || ($this->session->userdata('id_ruser') == 3 && $this->session->userdata('id_class') == 1)) {
?>
				<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header well" data-original-title>
							<h2><i class="icon-user"></i> <?php echo $_title_content ?> Kelas 7</h2>
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
										<th><center>Email</center></th>
										<th><center>NIS</center></th>
										<th><center>NISN</center></th>
										<th><center>Status</center></th>
										<th style="width:21%"><center>Aksi</center></th>
									</tr>
								</thead>	 
								<tbody>
									<?php $i = 0;foreach($studentviis as $student) { ?>
									<tr>
										<td><center><?php echo ++$i ?></center></td>
										<td><?php echo $student->full_name ?></td>
										<td><?php echo $student->email ?></td>
										<td><?php echo $student->nis ?></td>
										<td><?php echo $student->nisn ?></td>
										<td><center><?php echo ($student->is_auser==1)?"<span class=\"label label-success\">Aktif</span>":"<span class=\"label label-important\">Tidak Aktif</span>" ?></center></td>
										<td class="center">
											<center>
												<?php echo '<a href="#'.base_url().'admin/student/view/'.$student->id_user.'" class="btn btn-success" title="Detail"><i class="icon-zoom-in icon-white"></i></a>'; ?>
												<?php echo '<a href="#'.base_url().'admin/student/up/1/'.$student->id_user.'" class="btn btn-warning" title="Naik Kelas"><i class="icon-arrow-up icon-white"></i></a>'; ?>
												<?php echo '<a href="#'.base_url().'admin/student/grade/'.$student->id_user.'" class="btn" title="Lihat Nilai"><i class="icon-list"></i></a>'; ?>
												<?php echo '<a href="#'.base_url().'admin/student/update/'.$student->id_user.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; ?>
												<?php echo '<a href="#'.base_url().'admin/student/delete/'.$student->id_user.'" class="btn btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus '.$student->full_name .' ? \')"><i class="icon-trash icon-white"></i></a>'; ?>
											<center>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php echo '
								<a href="#'.base_url().'admin/student/create/1" title="Buat Baru">
									<div class="bottom-table-1">
										<button class="btn btn-large btn-primary">
											<i class="icon-edit icon-white"></i>
										</button>
									</div>
								</a>
								'; 
							?>
							<?php echo anchor("admin/student/export/1", '
								<div class="bottom-table-2">
									<button class="btn btn-large btn-inverse">
										<i class="icon-share icon-white"></i>
									</button>
								</div>
								', array("title"=>"Export Exel")); 
							?>
							<?php echo ('
								<a href="#'.base_url().'admin/student/upAll/1" title="Naik Kelas" onClick="return confirm(\'Anda yakin ingin menaikan semua murid ke kelas 2 ?\')">
									<div class="bottom-table-3">
										<button class="btn btn-large btn-warning">
											<i class="icon-arrow-up icon-white"></i>
										</button>
									</div>
								</a>
								'); 
							?>
						</div>
					</div><!--/span-->
				
				</div><!--/row-->
<?php
	}
?>