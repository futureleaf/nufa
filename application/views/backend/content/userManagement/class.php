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
		
			
		$('#editbox').live('blur',function(){
			$('.ajax').html($('.ajax input').val());
			$('.ajax').removeClass('ajax');
		});
	
	});

</script>
			<center>
				<div class="row-fluid sortable">
					<div class="box span6 center">
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
										<th><center>Nama <?php echo $_title ?></center></th>
									</tr>
								</thead>   
								<tbody>
								      <?php foreach($classes as $class) { ?>
								      <tr>
									      <td class="gridedit class <?php echo $class->id_class ?>"><?php echo $class->name_class ?></td>
								      </tr>
								      <?php } ?>
								</tbody>
							</table>
						</div>
					</div><!--/span-->
				
				</div><!--/row-->
			</center>