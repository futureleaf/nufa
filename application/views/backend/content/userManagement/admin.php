<script src="/application/views/backend/js/jquery.js"></script>
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
										<th><center>Nama Lengkap</center></th>
										<th><center>Email</center></th>
										<th><center>Tanggal Update</center></th>
										<th style="width:30%"><center>Aksi</center></th>
									</tr>
								</thead>
								<tbody>
								      <?php foreach($admins as $admin) { ?>
								      <tr>
									      <td><?php echo $admin->full_name ?></td>
									      <td><?php echo $admin->email ?></td>
									      <td><?php echo $admin->ud_user ?></td>
										  <?php
											if($this->session->userdata('id_ruser') == 1 && $this->session->userdata('id_user') == $admin->id_user) {
										  ?>
									      <td class="center">
											<center>													
												<?php echo anchor("admin/administrator/update/$admin->id_user", "<i class=\"icon-edit icon-white\"></i> Perbaharui", array("class"=>"btn btn-info", "onClick"=>"return")); ?>
												<?php echo anchor("admin/administrator/delete/$admin->id_user", "<i class=\"icon-trash icon-white\"></i> Hapus", array("class"=>"btn btn-danger", "onClick"=>"return confirm('Anda yakin ingin menghapus $admin->full_name ?')")); ?>
											<center>
									      </td>
										  <?php
										  }
										  else {
											echo '<td class="center">you are\'nt permitted to edit<center></td>';
										  }
										  ?>
								      </tr>
								      <?php } ?>
								</tbody>
							</table>
							<?php echo '
								<a href="#'.base_url().'admin/administrator/create" title="Kembali">
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
			</center>