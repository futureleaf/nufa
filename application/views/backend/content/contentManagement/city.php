<script src="/backend/js/jquery.js"></script>
<script>

	$(document).ready(function(){
		$('.gridedit').click(function(){
			$('.ajax').html($('.ajax input').val());
			$('.ajax').removeClass('ajax');
			$(this).addClass('ajax');
			$(this).html('<input id="editbox" size="'+$(this).text().length+'" type="text" value="' + $(this).text() + '">');
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
						success: function(result){
							$("#msg").html(result);
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
				<div class="row-fluid sortable" style="width:60%;text">
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
										<th style="width:5%;"><center>No</center></th>
										<th><center>Nama Kota</center></th>
										<th style="width:30%"><center>Aksi</center></th>
									</tr>
								</thead>   
								<tbody>
								      <?php $i = 0;foreach($cities as $city) { ?>
								      <tr>
									      <td><center><?php echo ++$i ?></center></td>
									      <td class="gridedit name_city <?php echo $city->id_city ?>"><?php echo $city->name_city ?></td>
									      <td class="center">
											<center>													
												<?php echo anchor("admin/city/delete/$city->id_city", "<i class=\"icon-trash icon-white\"></i> Hapus", array("class"=>"btn btn-danger", "onClick"=>"return confirm('Do you realy want to delete the city ?')")); ?>
											<center>
									      </td>
								      </tr>
								      <?php } ?>
								</tbody>
							</table>
							<!-- create begin -->
							<div class="modal hide fade span6" id="btnCreate" style="text-align:left;margin-left:-20%;margin-top:-10%">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal">×</button>
									<h3>Buat Entry <?php echo $_title; ?> Baru</h3>
								</div>
								<?php echo form_open("", array("class"=>"form-horizontal")); ?>
									<div class="modal-body">
										<!-- begin -->
										<div class="box-content">
											<fieldset>
												<div class="control-group">
													<label class="control-label">Nama </label>
													<div class="controls">
													      <input type="text" class="span6" name="name_city" />
													</div>
												</div>
											</fieldset>
										</div>
										<!-- end -->
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" name="create">Simpan</button>
										<a href="#" class="btn" data-dismiss="modal">Batal</a>
									</div>
								<?php echo form_close(); ?> 
							</div>
							<a href="#" class="btn-create" title="Buat Baru">
								<div class="create-table bottom-table-1">
									<button class="btn btn-large btn-primary">
										<i class="icon-edit icon-white"></i> 
									</button>
								</div>
							</a>
							<!-- create end -->
						</div>
					</div><!--/span-->
				
				</div><!--/row-->
			</center>