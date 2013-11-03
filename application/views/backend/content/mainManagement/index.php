			<div class="sortable row-fluid">				
				<a data-rel="tooltip" title="6 new members." class="well span6 top-block" href="#">
					<span class="icon32 icon-red icon-user"></span>
					<div>Total Staff</div>
					<div><?php echo $amount_teacher; ?></div>
				</a>

				<a data-rel="tooltip" title="4 new pro members." class="well span6 top-block" href="#">
					<span class="icon32 icon-color icon-users"></span>
					<div>Total Murid</div>
					<div><?php echo $amount_teacher; ?></div>
					<!--<span class="notification green">4</span>-->
				</a>
			</div>
					
			<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Login Terakhir Guru</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="box-content">
							<ul class="dashboard-list">
								<?php
								foreach($ll_teachers as $ll_teacher):
								?>
								<li>
									<a href="<?php echo '#'.base_url().'admin/teacher/view/'.$ll_teacher->id_user;?>">
										<img class="dashboard-avatar" alt="<?php echo $ll_teacher->full_name; ?>" src="<?php echo $uploads; ?>/thumbs/thumb_<?php echo $ll_teacher->picture_user; ?>"></a>
									</a>
									<strong>Nama :</strong> <a href="<?php echo '#'.base_url().'admin/teacher/view/'.$ll_teacher->id_user;?>"><?php echo $ll_teacher->full_name; ?></a><br>
									<strong>Waktu:</strong> <?php echo $ll_teacher->ll_user ?><br>&nbsp;                          
								</li>
								<?php
								endforeach;
								?>
							</ul>
						</div>
					</div>
				</div><!--/span-->
					
				<div class="box span6">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> Login Terakhir Murid</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="box-content">
							<ul class="dashboard-list">
								<?php
								foreach($ll_students as $ll_student):
								?>
								<li>
									<a href="<?php echo '#'.base_url().'admin/student/view/'.$ll_student->id_user;?>">
										<img class="dashboard-avatar" alt="<?php echo $ll_student->full_name; ?>" src="<?php echo $uploads; ?>/thumbs/thumb_<?php echo $ll_student->picture_user; ?>"></a>
									</a>
									<strong>Nama :</strong> <a href="<?php echo '#'.base_url().'admin/student/view/'.$ll_student->id_user;?>"><?php echo $ll_student->full_name; ?></a><br>
									<strong>Waktu:</strong> <?php echo $ll_student->ll_user ?><br>&nbsp;                          
								</li>
								<?php
								endforeach;
								?>
							</ul>
						</div>
					</div>
				</div><!--/span-->
			</div><!--/row-->
					
			<div class="row-fluid sortable">
				<div class="box span6">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-list"></i> Status Bulanan Tahun Ajaran <?php echo $school_year; ?></h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<ul class="dashboard-list">
							<li>
								<a href="#">
									<?php
										if ($new_comments > 50) echo "<i class=\"icon-arrow-up\"></i><span class=\"green\">$new_comments</span>";
										else if($new_comments > 25) echo "<i class=\"icon-minus\"></i><span class=\"blue\">$new_comments</span>";
										else echo "<i class=\"icon-arrow-down\"></i><span class=\"red\">$new_comments</span>";
									?> Komentar Baru
								</a>
							</li>
							<li>
								<a href="#">
									<?php
										if($new_registrators > 50) echo "<i class=\"icon-arrow-up\"></i><span class=\"green\">$new_registrators</span>";
										else if($new_registrators > 25) echo "<i class=\"icon-minus\"></i><span class=\"blue\">$new_registrators</span>";
										else echo "<i class=\"icon-arrow-down\"></i><span class=\"red\">$new_registrators</span>";
									?> Siswa Registrasi Baru Pertahun
								</a>
							</li>
							<li>
								<a href="#">
									<?php
										if($new_articles > 50)echo"<i class=\"icon-arrow-up\"></i><span class=\"green\">$new_articles</span>";
										else if($new_articles > 25)echo"<i class=\"icon-minus\"></i><span class=\"blue\">$new_articles</span>";
										else echo "<i class=\"icon-arrow-down\"></i><span class=\"red\">$new_articles</span>";
									?> Artikel Baru
								</a>
							</li>
							<li>
								<a href="#">
									<?php
										if($new_front_reviews > 1000) echo "<i class=\"icon-arrow-up\"></i><span class=\"green\">$new_front_reviews</span>";
										else if($new_front_reviews > 500) echo "<i class=\"icon-minus\"></i><span class=\"blue\">$new_front_reviews</span>";
										else echo "<i class=\"icon-arrow-down\"></i><span class=\"red\">$new_front_reviews</span>";
									?> Banyak Halaman Depan Dilihat
								</a>
							</li>
							<li>
								<a href="#">
									<?php
										if($new_back_reviews >= 1000)echo "<i class=\"icon-arrow-up\"></i><span class=\"green\">$new_back_reviews</span>";
										else if($new_back_reviews < 1000)echo "<i class=\"icon-minus\"></i><span class=\"blue\">$new_back_reviews</span>";
										else "<i class=\"icon-arrow-down\"></i><span class=\"red\">$new_back_reviews</span>";
									?> Banyak Halaman Belakang Dilihat
								</a>
							</li>
						</ul>
					</div>
				</div><!--/span-->
			</div><!--/row-->