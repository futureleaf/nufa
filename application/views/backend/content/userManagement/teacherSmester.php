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
									<?php 
										$out[0] = false;
										$out[1] = false;
										$out[2] = false;
										$out[3] = false;
										$out[4] = false;
										$out[5] = false;
										foreach($semesters as $semester) {
											if($semester->mode_edu == 1 OR $semester->mode_edu == 3 OR $semester->mode_edu == 5 OR $semester->mode_edu == 7OR $semester->mode_edu == 9OR $semester->mode_edu == 11OR $semester->mode_edu == 13OR $semester->mode_edu == 15OR $semester->mode_edu == 17OR $semester->mode_edu == 19OR $semester->mode_edu == 21OR $semester->mode_edu == 23OR $semester->mode_edu == 25OR $semester->mode_edu == 27OR $semester->mode_edu == 29OR $semester->mode_edu == 31OR $semester->mode_edu == 33OR $semester->mode_edu == 35OR $semester->mode_edu == 37OR $semester->mode_edu == 39OR $semester->mode_edu == 41OR $semester->mode_edu == 43OR $semester->mode_edu == 45OR $semester->mode_edu == 47OR $semester->mode_edu == 49OR $semester->mode_edu == 51OR $semester->mode_edu == 53OR $semester->mode_edu == 55OR $semester->mode_edu == 57OR $semester->mode_edu == 59OR $semester->mode_edu == 61OR $semester->mode_edu == 63) $out[0] = true;
											if($semester->mode_edu == 2 OR $semester->mode_edu == 3 OR $semester->mode_edu == 6 OR $semester->mode_edu == 7OR $semester->mode_edu == 10OR $semester->mode_edu == 11OR $semester->mode_edu == 14OR $semester->mode_edu == 15OR $semester->mode_edu == 18OR $semester->mode_edu == 19OR $semester->mode_edu == 22OR $semester->mode_edu == 23OR $semester->mode_edu == 26OR $semester->mode_edu == 27OR $semester->mode_edu == 30OR $semester->mode_edu == 31OR $semester->mode_edu == 34OR $semester->mode_edu == 35OR $semester->mode_edu == 38OR $semester->mode_edu == 39OR $semester->mode_edu == 42OR $semester->mode_edu == 43OR $semester->mode_edu == 46OR $semester->mode_edu == 47OR $semester->mode_edu == 50OR $semester->mode_edu == 51OR $semester->mode_edu == 54OR $semester->mode_edu == 55OR $semester->mode_edu == 58OR $semester->mode_edu == 59OR $semester->mode_edu == 62OR $semester->mode_edu == 63) $out[1] = true;
											if($semester->mode_edu == 4 OR $semester->mode_edu == 5 OR $semester->mode_edu == 6 OR $semester->mode_edu == 7OR $semester->mode_edu == 12OR $semester->mode_edu == 13OR $semester->mode_edu == 14OR $semester->mode_edu == 15OR $semester->mode_edu == 20OR $semester->mode_edu == 21OR $semester->mode_edu == 22OR $semester->mode_edu == 23OR $semester->mode_edu == 28OR $semester->mode_edu == 29OR $semester->mode_edu == 30OR $semester->mode_edu == 31OR $semester->mode_edu == 36OR $semester->mode_edu == 37OR $semester->mode_edu == 38OR $semester->mode_edu == 39OR $semester->mode_edu == 44OR $semester->mode_edu == 45OR $semester->mode_edu == 46OR $semester->mode_edu == 47OR $semester->mode_edu == 52OR $semester->mode_edu == 53OR $semester->mode_edu == 54OR $semester->mode_edu == 55OR $semester->mode_edu == 60OR $semester->mode_edu == 61OR $semester->mode_edu == 62OR $semester->mode_edu == 63) $out[2] = true;
											if($semester->mode_edu == 8 OR $semester->mode_edu == 9 OR $semester->mode_edu == 10 OR $semester->mode_edu == 11OR $semester->mode_edu == 12OR $semester->mode_edu == 13OR $semester->mode_edu == 14OR $semester->mode_edu == 15OR $semester->mode_edu == 24OR $semester->mode_edu == 25OR $semester->mode_edu == 26OR $semester->mode_edu == 27OR $semester->mode_edu == 28OR $semester->mode_edu == 29OR $semester->mode_edu == 30OR $semester->mode_edu == 31OR $semester->mode_edu == 40OR $semester->mode_edu == 41OR $semester->mode_edu == 42OR $semester->mode_edu == 43OR $semester->mode_edu == 44OR $semester->mode_edu == 45OR $semester->mode_edu == 46OR $semester->mode_edu == 47OR $semester->mode_edu == 56OR $semester->mode_edu == 57OR $semester->mode_edu == 58OR $semester->mode_edu == 59OR $semester->mode_edu == 60OR $semester->mode_edu == 61OR $semester->mode_edu == 62OR $semester->mode_edu == 63) $out[3] = true;
											if($semester->mode_edu == 16 OR $semester->mode_edu == 17 OR $semester->mode_edu == 18 OR $semester->mode_edu == 19OR $semester->mode_edu == 20OR $semester->mode_edu == 21OR $semester->mode_edu == 22OR $semester->mode_edu == 23OR $semester->mode_edu == 24OR $semester->mode_edu == 25OR $semester->mode_edu == 26OR $semester->mode_edu == 27OR $semester->mode_edu == 28OR $semester->mode_edu == 29OR $semester->mode_edu == 30OR $semester->mode_edu == 31OR $semester->mode_edu == 48OR $semester->mode_edu == 49OR $semester->mode_edu == 50OR $semester->mode_edu == 51OR $semester->mode_edu == 52OR $semester->mode_edu == 53OR $semester->mode_edu == 54OR $semester->mode_edu == 55OR $semester->mode_edu == 56OR $semester->mode_edu == 57OR $semester->mode_edu == 58OR $semester->mode_edu == 59OR $semester->mode_edu == 60OR $semester->mode_edu == 61OR $semester->mode_edu == 62OR $semester->mode_edu == 63) $out = true;
											if($semester->mode_edu == 32 OR $semester->mode_edu == 33 OR $semester->mode_edu == 34 OR $semester->mode_edu == 35OR $semester->mode_edu == 36OR $semester->mode_edu == 37OR $semester->mode_edu == 38OR $semester->mode_edu == 39OR $semester->mode_edu == 40OR $semester->mode_edu == 41OR $semester->mode_edu == 42OR $semester->mode_edu == 43OR $semester->mode_edu == 44OR $semester->mode_edu == 45OR $semester->mode_edu == 46OR $semester->mode_edu == 47OR $semester->mode_edu == 48OR $semester->mode_edu == 49OR $semester->mode_edu == 50OR $semester->mode_edu == 51OR $semester->mode_edu == 52OR $semester->mode_edu == 53OR $semester->mode_edu == 54OR $semester->mode_edu == 55OR $semester->mode_edu == 56OR $semester->mode_edu == 57OR $semester->mode_edu == 58OR $semester->mode_edu == 59OR $semester->mode_edu == 60OR $semester->mode_edu == 61OR $semester->mode_edu == 62OR $semester->mode_edu == 63) $out = true;
										}
										if($out[0] == true) {
									?>
									<tr>
										<td>
											<?php echo '<a href="#'.base_url().'admin/teacher/grade/'.$id_user.'/1">Semester 1</a>'; ?>
										</td>
									</tr>
									<?php 
										}
										if($out[1] == true) {
									?>
									<tr>
										<td>
											<?php echo '<a href="#'.base_url().'admin/teacher/grade/'.$id_user.'/2">Semester 2</a>'; ?>
										</td>
									</tr>
									<?php 		
										}
										if($out[2] == true) {
									?>
									<tr>
										<td>
											<?php echo '<a href="#'.base_url().'admin/teacher/grade/'.$id_user.'/3">Semester 3</a>'; ?>
										</td>
									</tr>
									<?php 		
										}
										if($out[3] == true) {
									?>
									<tr>
										<td>
											<?php echo '<a href="#'.base_url().'admin/teacher/grade/'.$id_user.'/4">Semester 4</a>'; ?>
										</td>
									</tr>
									<?php 		
										}
										if($out[4] == true) {
									?>
									<tr>
										<td>
											<?php echo '<a href="#'.base_url().'admin/teacher/grade/'.$id_user.'/5">Semester 5</a>'; ?>
										</td>
									</tr>
									<?php 		
										}
										if($out[5] == true) {
									?>
									<tr>
										<td>
											<?php echo '<a href="#'.base_url().'admin/teacher/grade/'.$id_user.'/6">Semester 6</a>'; ?>
										</td>
									</tr>
									<?php 	
										}
									?>
								</tbody>
							</table>
							<?php 
								if($this->session->userdata('id_user') == $id_user)
									echo '
										<a href="#'.base_url().'admin/teacher/view/'.$this->session->userdata('id_user').'" title="Kembali">
											<div class="bottom-table-1">
												<button class="btn btn-large">
													<i class="icon-arrow-left"></i> 
												</button>
											</div>
										</a>
									'; 
								else
									echo '
										<a href="#'.base_url().'admin/teacher" title="Kembali">
											<div class="bottom-table-1">
												<button class="btn btn-large">
													<i class="icon-arrow-left"></i> 
												</button>
											</div>
										</a>
										'; 
							?>
						</div>
					</div><!--/span-->
				
				</div><!--/row-->