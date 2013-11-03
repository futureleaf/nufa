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
										<th style="width:8.5%"><center>Aksi</center></th>
									</tr>
								</thead>   
								<tbody>
									<?php $i = 0;foreach($visionAndMissiones as $visionAndMission) { ?>
									<tr>
									    <td><center><?php echo ++$i ?></center></td>
										<td><?php echo $visionAndMission->name_content ?></td>
										<td><?php echo $visionAndMission->full_name ?></td>
										<td><?php echo $visionAndMission->ud_content ?></td>
										<td class="center">
											<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 3 || $this->session->userdata('id_ruser') == 6) {
												echo '<a href="#'.base_url().'admin/visionAndMission/view/'.$visionAndMission->id_content.'" class="btn btn-success" title="Detail"><i class="icon-zoom-in icon-white"></i></a>'; 
												echo '<a href="#'.base_url().'admin/visionAndMission/update/'.$visionAndMission->id_content.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; 
											  }
											  ?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<!-- create end -->
						</div>
					</div><!--/span-->
				
				</div><!--/row-->
			</center>
