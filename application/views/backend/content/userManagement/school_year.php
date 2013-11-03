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
										<th><center>Nama Tahun Ajaran</center></th>
										<th><center>Aksi</center></th>
									</tr>
								</thead>   
								<tbody>
								      <?php foreach($school_years as $school_year) { ?>
								      <tr>
									      <td><?php echo $school_year->name_school_year ?></td>
									      <td class="center">
											<center>							
												<?php //echo anchor("admin/school_year/view/$school_year->id_school_year", "<i class=\"icon-zoom-in icon-white\"></i> Detail", array("class"=>"btn btn-success")); ?>
												<?php echo anchor("admin/school_year/update/$school_year->id_school_year", "<i class=\"icon-edit icon-white\"></i> Perbaharui", array("class"=>"btn btn-info")); ?>
												<?php echo anchor("admin/school_year/delete/$school_year->id_school_year", "<i class=\"icon-trash icon-white\"></i> Hapus", array("class"=>"btn btn-danger", "onClick"=>"return confirm('Anda yakin ingin menghapus $school_year->name_school_year ?')")); ?>
											<center>
									      </td>
								      </tr>
								      <?php } ?>
								</tbody>
							</table>
							<?php echo anchor("admin/school_year/create", '
								<div class="create-table">
									<button class="btn btn-large btn-success">
										<i class="icon-share icon-white"></i> 
										Buat Baru
									</button>
								</div>
								'); ?>
						</div>
					</div><!--/span-->
				
				</div><!--/row-->
			</center>