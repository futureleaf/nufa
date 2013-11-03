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
	
		<div class="change-password">
			<table align="center" border="1" cellpadding="10" class="table-class">
				<tr>
					<th>Kelas 1</th>
					<th>Kelas 2</th>
					<th>Kelas 3</th>
				</tr>
				<tr>
					<td><?php echo anchor("$controller/student/grade/0/1", "Semester 1"); ?></td>
					<td><?php echo anchor("$controller/student/grade/0/3", "Semester 3"); ?></td>
					<td><?php echo anchor("$controller/student/grade/0/5", "Semester 5"); ?></td>
				</tr>
				<tr>
					<td><?php echo anchor("$controller/student/grade/0/2", "Semester 2"); ?></td>
					<td><?php echo anchor("$controller/student/grade/0/4", "Semester 4"); ?></td>
					<td><?php echo anchor("$controller/student/grade/0/6", "Semester 6"); ?></td>
				</tr>
				
			</table><br/><br/><br/>
		</div>

	</div>

</div>
