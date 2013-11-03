<script src="/application/views/backend/js/jquery.js"></script>
<script>

	$(document).ready(function(){
		$('.gridedit').click(function(){
			$('.ajax').html($('.ajax input').val());
			$('.ajax').removeClass('ajax');
			$(this).addClass('ajax');
			$(this).html('<input id="editbox" size="'+$(this).text().length+'" type="text" value="' + $(this).text() + '" style="width:50px">');
			$('#editbox').focus();
		});
	
		$('.gridedit').keydown(function(event){
		arr = $(this).attr('class').split( " " );  
			if(event.which == 13) {
				valueRecord = $('.ajax input').val();
				idRecord = arr[2];
				fieldRecord = arr[1];
				$.ajax({type: "POST",
						url: "",
						data: {value:valueRecord, id:idRecord, field:fieldRecord},
						success: function(){
							$('.ajax').html($('.ajax input').val());  
							$('.ajax').removeClass('ajax');
						}}
					);
			}
		});
	
		
		$('.grid').click(function(){
			$('.ajax').html($('.ajax input').val());
			$('.ajax').removeClass('ajax');
			$(this).addClass('ajax');
			$(this).html('<input id="editbox" size="'+$(this).text().length+'" type="text" value="' + $(this).text() + '" style="width:400px">');
			$('#editbox').focus();
		});
		
		$('.grid').keydown(function(event){
		arr = $(this).attr('class').split( " " );  
			if(event.which == 13) {
				valueRecord = $('.ajax input').val();
				idRecord = arr[2];
				fieldRecord = arr[1];
				$.ajax({type: "POST",
						url: "",
						data: {value:valueRecord, id:idRecord, field:fieldRecord},
						success: function(){
							$('.ajax').html($('.ajax input').val());  
							$('.ajax').removeClass('ajax');
						}}
					);
			}
		});
		
			
		$('#editbox').live('blur',function(){
			$('.ajax').html($('.ajax input').val());
			$('.ajax').removeClass('ajax');
		});
	
	});

</script>
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
										<th><center>Nama Murid</center></th>
										<th style="width:5%"><center>Nilai</center></th>
										<th style="width:40%"><center>Pesan</center></th>
									</tr>
								</thead>   
								<tbody>
								      <?php foreach($user_grade_records as $user_grade_record) { ?>
								      <tr>
											<td><?php echo $user_grade_record->full_name; ?></td>
											<td class="gridedit grade <?php echo $user_grade_record->id_grade ?>"><?php echo $user_grade_record->grade; ?></td>
											<td class="grid desc_grade <?php echo $user_grade_record->id_grade ?>"><?php echo ($user_grade_record->desc_grade != "" )?$user_grade_record->desc_grade :"-"; ?></td>
								      </tr>
								      <?php } ?>
								</tbody>
							</table>
							<?php echo '
								<a href="#'.base_url().'admin/teacher/grade/'.$id_user.'/'.$id_semester.'" title="Kembali">
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