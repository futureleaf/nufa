<?php
	if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 3) {
?>				
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
										<th><center>Email</center></th>
										<th><center>NIS</center></th>
										<th><center>NISN</center></th>
										<th><center>Status</center></th>
										<th style="width:26%"><center>Aksi</center></th>
									</tr>
								</thead>   
								<tbody>
								      <?php $i = 0;foreach($alumnuses as $alumnus) { ?>
								      <tr>
									      <td><center><?php echo ++$i ?></center></td>
									      <td><?php echo $alumnus->full_name ?></td>
									      <td><?php echo $alumnus->email ?></td>
									      <td><?php echo $alumnus->nis ?></td>
									      <td><?php echo $alumnus->nisn ?></td>
									      <td><center><?php echo ($alumnus->is_auser==1)?"<span class=\"label label-success\">Aktif</span>":"<span class=\"label label-important\">Tidak Aktif</span>" ?></center></td>
									      <td class="center">
											<center>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 6) echo '<a href="#'.base_url().'admin/alumnus/view/'.$alumnus->id_user.'" class="btn btn-success" title="Detail"><i class="icon-zoom-in icon-white"></i></a>'; ?>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 6) echo '<a href="#'.base_url().'admin/alumnus/up/2/'.$alumnus->id_user.'" class="btn btn-warning" title="Kembali Ke Sekolah"><i class="icon-arrow-left icon-white"></i></a>'; ?>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 6) echo '<a href="#'.base_url().'admin/alumnus/update/'.$alumnus->id_user.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; ?>
												<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 6) echo '<a href="#'.base_url().'admin/alumnus/delete/'.$alumnus->id_user.'" class="btn btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus '.$alumnus->full_name.' ?\')"><i class="icon-trash icon-white"></i></a>'; ?>
											<center>
									      </td>
								      </tr>
								      <?php } ?>
								</tbody>
							</table>
							<?php echo anchor("admin/alumnus/export/3", '
								<div class="bottom-table-1">
									<button class="btn btn-large btn-inverse">
										<i class="icon-share icon-white"></i>
									</button>
								</div>
								', array("title"=>"Export Exel")); 
							?>
						</div>
					</div><!--/span-->
				
				</div><!--/row-->
<?php
	}
?>