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
										<th><center>Semester</center></th>
									</tr>
								</thead>   
								<tbody>
								      <tr>
											<td>
												<?php echo '<a href="#'.base_url().'admin/student/grade/'.$id_user.'/1">Semester 1</a>'; ?>
											</td>
								      </tr>
								      <tr>
											<td>
												<?php echo '<a href="#'.base_url().'admin/student/grade/'.$id_user.'/2">Semester 2</a>'; ?>
											</td>
								      </tr>
								      <tr>
											<td>
												<?php echo '<a href="#'.base_url().'admin/student/grade/'.$id_user.'/3">Semester 3</a>'; ?>
											</td>
								      </tr>
								      <tr>
											<td>
												<?php echo '<a href="#'.base_url().'admin/student/grade/'.$id_user.'/4">Semester 4</a>'; ?>
											</td>
								      </tr>
								      <tr>
											<td>
												<?php echo '<a href="#'.base_url().'admin/student/grade/'.$id_user.'/5">Semester 5</a>'; ?>
											</td>
								      </tr>
								      <tr>
											<td>
												<?php echo '<a href="#'.base_url().'admin/student/grade/'.$id_user.'/6">Semester 6</a>'; ?>
											</td>
								      </tr>
								</tbody>
							</table>
							<?php echo '
								<a href="#'.base_url().'admin/student" title="Kembali">
									<div class="bottom-table-1">
										<button class="btn btn-large">
											<i class="icon-arrow-left icon-white"></i> 
										</button>
									</div>
								</a>
								'; 
							?>
						</div>
					</div><!--/span-->
				
				</div><!--/row-->