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
										<th><center>Nama Pelajaran</center></th>
										<th><center>KKM</center></th>
										<th><center>Nilai</center></th>
										<th><center>Predikat</center></th>
										<th style="width:25%"><center>Pesan</center></th>
										<th style="width:10%"><center>Aksi</center></th>
									</tr>
								</thead>   
								<tbody>
								      <?php foreach($education_record as $education) { ?>
								      <tr>
											<td>
												<?php 
													echo "<b>" . $education->name_edu . "</b>"; 
													$grades = $this->mdl_grade->edu_records($this->uri->segment(4), $this->uri->segment(5), $education->id_edu)->result();
													echo "<ul>";
													foreach($grades as $grade) {
														echo "	<li>" . $grade->name_grade . "</li>";
													}
													echo "</ul>"
												?>
											</td>
											<td>
												<center>
													<?php
														echo "<b>" . $education->kkm . "</b>";
													?>
												</center>
											</td>
											<td>
												<center>
													<?php 
														foreach($grades as $grade) {
															echo "<br />";
															echo $grade->grade;
														}
													?>
												</center>
											</td>
											<td>
												<center>
													<?php 
														foreach($grades as $grade) {
															echo "<br />";
															echo ($education->kkm <= $grade->grade)?"Lulus":"Belum Lulus";
														}
													?>
												</center>
											</td>
											<td>
												<center>
													<?php 
														foreach($grades as $grade) {
															echo "<br />";
															echo ($grade->desc_grade != "" )?$grade->desc_grade :"-";
														}
													?>
												</center>
											</td>
											<td>
												<center>
													<?php 
														foreach($grades as $grade) {
															echo "<br />";
															echo '<a href="#'.base_url().'admin/student/grade/'.$id_user.'/'.$id_semester.'/update/'.$grade->id_grade.'" class="btn btn-info btn-mini" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; 
															echo '<a href="#'.base_url().'admin/student/grade/'.$id_user.'/'.$id_semester.'/delete/'.$grade->id_grade.'" class="btn btn-danger btn-mini" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus '.$grade->name_grade.' ?\')"><i class="icon-trash icon-white"></i></a>'; 
														}
													?>
												</center>
											</td>
								      </tr>
								      <?php } ?>
								</tbody>
							</table>
							<?php echo anchor("admin/student/grade/$id_user/$id_semester/create", '
								<div class="bottom-table-1">
									<button class="btn btn-large btn-primary">
										<i class="icon-edit icon-white"></i> 
									</button>
								</div>
								', array("title"=>"Buat Baru")); ?>
							<?php echo '
								<a href="#'.base_url().'admin/student/grade/'.$id_user.'/'.$id_semester.'/create" title="Buat Baru">
									<div class="bottom-table-1">
										<button class="btn btn-large btn-primary">
											<i class="icon-edit icon-white"></i>
										</button>
									</div>
								</a>
								'; 
							?>
							<?php echo '
								<a href="#'.base_url().'admin/student/grade/'.$id_user.'" title="Kembali">
									<div class="bottom-table-2">
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