 <style>
.table-class tr th {
	text-align:center;
	padding:10px;
	font-weight:bold;
}
.table-class tr td {
	text-align:center;
	padding:10px;
	width:100px;
}
</style>
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
  
<div id="contentWrapper"><!--beginning contentWrapper-->
	<h3 class="title-three-5"><span><?php echo $_title; ?></span></h3>
        
	<div class="boxes-padding fullpadding">
	
		<table class="table-class">
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
		</table><br/><br/><br/><br/><br/>
      
	</div>
	<!-- End Main Body Wrap -->

</div>
