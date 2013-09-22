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
										<th><center>Type Kontak</center></th>
										<th><center>Penulis</center></th>
										<th><center>Email</center></th>
										<th style="width:13%"><center>Nomer Telepon</center></th>
										<th style="width:35%"><center>Deskripsi</center></th>
										<th style="width:12%"><center>Aksi</center></th>
									</tr>
								</thead>   
								<tbody>
									<?php $i = 0;foreach($contacts as $contact) { ?>
									<tr>
										<td><center><?php echo ++$i ?></center></td>
										<td><?php echo $contact->name_rcomment ?></td>
										<td><?php echo $contact->author_comment ?></td>
										<td><?php echo $contact->email_comment ?></td>
										<td><?php echo $contact->phone_comment ?></td>
										<td><?php echo $contact->desc_comment ?></td>
										<td class="center">
											<center>
											<?php if($this->session->userdata('id_ruser') == 1 || $this->session->userdata('id_ruser') == 2 || $this->session->userdata('id_ruser') == 3 || $this->session->userdata('id_ruser') == 6) {
												echo ($contact->id_rcomment != 2)?(($contact->is_acomment == 1)?'<a href="#'.base_url().'admin/contact/toogle/'.$contact->id_comment.'/0" class="btn btn-warning" title="Toogle Active">
												<i class="icon-ok-circle icon-white"></i></a>':'<a href="#'.base_url().'admin/contact/toogle/'.$contact->id_comment.'/1" class="btn btn-inverse" title="Toogle Active"><i class="icon-remove-circle icon-white"></i></a>'):""; 
												echo '<a href="#'.base_url().'admin/contact/update/'.$contact->id_comment.'" class="btn btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; 
												echo ($contact->id_rcomment != 2)?'<a href="#'.base_url().'admin/contact/delete/'.$contact->id_comment.'" class="btn btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus aspirasi dari '. $contact->author_comment  . ' ?\')"><i class="icon-trash icon-white"></i></a>':""; 
											  }
											  ?>
											</center>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php echo '
								<a href="#'.base_url().'admin/contact/create" title="Buat Baru">
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
