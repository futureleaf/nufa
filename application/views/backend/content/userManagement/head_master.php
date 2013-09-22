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
										<th><center>Nama Lengkap</center></th>
										<th><center>Email</center></th>
										<th><center>Tanggal Update</center></th>
										<th><center>Aksi</center></th>
									</tr>
								</thead>   
								<tbody>
								      <?php foreach($head_masters as $head_master) { ?>
								      <tr>
<!-- 								      <input class="span6" name="query" type="text" value=""> -->
									      <td><?php echo $head_master->full_name ?></td>
									      <td><?php echo $head_master->email ?></td>
									      <td><?php echo $head_master->ud_user ?></td>
									      <td class="center">
											<center>							
												<?php echo anchor("admin/head_master/view/$head_master->id_user", "<i class=\"icon-zoom-in icon-white\"></i> Detail", array("class"=>"btn btn-success")); ?>
												<?php echo anchor("admin/head_master/update/$head_master->id_user", "<i class=\"icon-edit icon-white\"></i> Perbaharui", array("class"=>"btn btn-info")); ?>
												<?php /*echo anchor("admin/head_master/delete/$head_master->id_user", "<i class=\"icon-trash icon-white\"></i> Hapus", array("class"=>"btn btn-danger", "onClick"=>"return confirm('Anda yakin ingin menghapus $head_master->full_name ?')"));*/ ?>
											<center>
									      </td>
								      </tr>
								      <?php } ?>
								</tbody>
							</table>
							<?php /*echo anchor("admin/head_master/create", '
								<div class="create-table">
									<button class="btn btn-large btn-success">
										<i class="icon-share icon-white"></i> 
										Buat Baru
									</button>
								</div>
								'); */?>
						</div>
					</div><!--/span-->
				
				</div><!--/row-->