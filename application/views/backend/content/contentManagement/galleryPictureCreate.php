	<?php
	// untuk craete
			echo form_open_multipart("", array("class"=>"form-horizontal"));
	?>
				<div class="row-fluid sortable">
					<div class="box span12">
						<div class="box-header well" data-original-title>
							<h2><i class="icon-edit"></i> <?php echo $_title_content ?></h2>
							<div class="box-icon">
								<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
								<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
								<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content">
							<fieldset>
								<input type="hidden" name="id_user" value="0" />
								<div class="control-group <?php if($errorImage != null) echo"error" ?>">
									<label class="control-label" for="typeahead">Gambar Utama </label>
									<div class="controls">
										<input class="input-file uniform_on" type="file" name="userfile" size="20" />
										<?php if($errorImage != null) echo "<span class=\"help-inline\"> " . $errorImage . " </span>"; ?>
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-primary" name="doCreate">Save changes</button>
									<?php echo '<a href="#'.base_url().'admin/gallery/picture/'.$id_content.'" class="btn">Kembali</a>'; ?>
								</div>
							</fieldset>
						</div>
					</div><!--/span-->

				</div><!--/row-->
	<?php
		echo form_close();
	?>