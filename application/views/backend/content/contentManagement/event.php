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
									<?php $i = 0;foreach($eventes as $event) { ?>
									<tr>
									    <td><center><?php echo ++$i ?></center></td>
										<td><?php echo $event->name_content ?></td>
										<td><?php echo $event->full_name ?></td>
										<td><?php echo $event->ud_content ?></td>
										<td class="center">
											<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 3 || $this->session->userdata('id_ruser') == 6) {
												echo '<a href="#'.base_url().'admin/event/view/'.$event->id_content.'" class="btn btn-success" title="Detail"><i class="icon-zoom-in icon-white"></i></a>'; 
												echo ($event->is_acontent == 1)?'<a href="#'.base_url().'admin/event/toogle/'.$event->id_content.'/0" class="btn btn-warning" title="Toogle Active"><i class="icon-ok-circle icon-white"></i></a>':'<a href="#'.base_url().'admin/event/toogle/'.$event->id_content.'/1" class="btn btn-inverse" title="Toogle Active"><i class="icon-remove-circle icon-white"></i></a>'; ; 
												echo '<a href="#'.base_url().'admin/event/update/'.$event->id_content.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; 
												echo '<a href="#'.base_url().'admin/event/delete/'.$event->id_content.'" class="btn btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus '. $event->name_content  . ' ?\')"><i class="icon-trash icon-white"></i></a>'; 
											  }
											  ?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php echo '
								<a href="#'.base_url().'admin/event/create" title="Buat Baru">
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
