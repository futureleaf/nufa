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
										<th><center>Penulis</center></th>
										<th><center>Email</center></th>
										<th style="width:35%"><center><?php echo $_title; ?></center></th>
										<th style="width:13%"><center>Update Date</center></th>
										<th style="width:11.8%"><center>Aksi</center></th>
									</tr>
								</thead>   
								<tbody>
									<?php $i = 0;foreach($diamondWords as $diamondWord) { ?>
									<tr>
										<td><center><?php echo ++$i ?></center></td>
										<td><?php echo $diamondWord->author_comment ?></td>
										<td><?php echo $diamondWord->email_comment ?></td>
										<td><?php echo $diamondWord->name_comment ?></td>
										<td><?php echo $diamondWord->cd_comment ?></td>
										<td class="center">
											<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 3 || $this->session->userdata('id_ruser') == 6) {
												echo ($diamondWord->is_acomment == 1)?'<a href="#'.base_url().'admin/diamondWord/toogle/'.$diamondWord->id_comment.'/0" class="btn btn-warning" title="Toogle Active"><i class="icon-ok-circle icon-white"></i></a>':'<a href="#'.base_url().'admin/diamondWord/toogle/'.$diamondWord->id_comment.'/1" class="btn btn-inverse" title="Toogle Active"><i class="icon-remove-circle icon-white"></i></a>'; ; 
												echo '<a href="#'.base_url().'admin/diamondWord/update/'.$diamondWord->id_comment.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; 
												echo '<a href="#'.base_url().'admin/diamondWord/delete/'.$diamondWord->id_comment.'" class="btn btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus aspirasi dari '. $diamondWord->author_comment  . ' ?\')"><i class="icon-trash icon-white"></i></a>'; 
											  }
											  ?>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php echo '
								<a href="#'.base_url().'admin/diamondWord/create" title="Buat Baru">
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
