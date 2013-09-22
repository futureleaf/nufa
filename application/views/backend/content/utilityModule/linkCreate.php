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
											<input type="hidden" name="parent_content" value="0" />
											<div class="control-group <?php if(form_error('name_content') != null) echo"error" ?>">
												<label class="control-label" for="typeahead">Nama </label>
												<div class="controls">
													<input type="text" class="span3 typeahead" name="name_content" value="<?php echo (set_value('name_content'))?set_value('name_content'):""; ?>" />
													<?php if(form_error('name_content') != null) echo "<span class=\"help-inline\"> " . form_error('name_content') . " </span>"; ?>
												</div>
											</div>
											<div class="control-group <?php if(form_error('desc_content') != null) echo"error" ?>">
												<label class="control-label">Link </label>
												<div class="controls">
													<input type="text" class="span6 typeahead" name="desc_content" value="<?php echo (set_value('desc_content'))?set_value('desc_content'):""; ?>"/>
													<?php if(form_error('desc_content') != null) echo "<span class=\"help-inline\"> " . form_error('desc_content') . " </span>"; ?>
												</div>
											</div>
											<div class="form-actions">
												<button type="submit" class="btn btn-primary" name="doCreate">Save changes</button>
												<?php echo '<a href="#'.base_url().'admin/link/" class="btn">Kembali</a>'; ?>
											</div>
									</fieldset>
								</div>
							</div><!--/span-->

						</div><!--/row-->

			<?php
				echo form_close();
			?>
