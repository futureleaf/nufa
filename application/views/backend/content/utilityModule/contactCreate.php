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
											<input type="hidden" name="parent_comment" value="0" />
											<?php
												if($this->session->userdata('is_login') == TRUE) {
													echo "<input type=\"hidden\" name=\"author_comment\" value=\"" . $this->session->userdata('full_name') . "\"/>";
													echo "<input type=\"hidden\" name=\"email_comment\" value=\"" . $this->session->userdata('email') . "\"/>";
													echo "<input type=\"hidden\" name=\"id_user\" value=\"" . $this->session->userdata('id_user'). "\"/>";
												}
												else {
											?>
											<input type="hidden" name="id_user" value="0" />
											<div class="control-group <?php if(form_error('author_comment') != null) echo"error" ?>">
												<label class="control-label" for="typeahead">Nama </label>
												<div class="controls">
													<input type="text" class="span4 typeahead" name="author_comment" value="<?php echo (set_value('author_comment'))?set_value('author_comment'):""; ?>">
													<?php if(form_error('author_comment') != null) echo "<span class=\"help-inline\"> " . form_error('author_comment') . " </span>"; ?>
												</div>
											</div>
											<div class="control-group <?php if(form_error('email_comment') != null) echo"error" ?>">
												<label class="control-label" for="typeahead">Email </label>
												<div class="controls">
													<input type="email" class="span4 typeahead" name="email_comment" value="<?php echo (set_value('email_comment'))?set_value('email_comment'):""; ?>">
													<?php if(form_error('email_comment') != null) echo "<span class=\"help-inline\"> " . form_error('email_comment') . " </span>"; ?>
												</div>
											</div>
											<?php
												}
											?>
											<div class="control-group <?php if(form_error('phone_comment') != null) echo"error" ?>">
												<label class="control-label" for="typeahead">Nomer Telepon </label>
												<div class="controls">
													<input type="text" class="span4 typeahead" name="phone_comment" value="<?php echo (set_value('phone_comment'))?set_value('phone_comment'):""; ?>">
													<?php if(form_error('phone_comment') != null) echo "<span class=\"help-inline\"> " . form_error('phone_comment') . " </span>"; ?>
												</div>
											</div>
											<div class="control-group <?php if(form_error('desc_comment') != null) echo"error" ?>">
												<label class="control-label">Deskripsi </label>
												<div class="controls">
													<textarea rows="3" style="width:40%;" name="desc_comment"><?php echo (set_value('desc_comment'))?set_value('desc_comment'):""; ?></textarea>
													<?php if(form_error('desc_comment') != null) echo "<span class=\"help-inline\"> " . form_error('desc_comment') . " </span>"; ?>
												</div>
											</div>
											<div class="form-actions">
												<button type="submit" class="btn btn-primary" name="doCreate">Save changes</button>
												<?php echo '<a href="#'.base_url().'admin/contact" class="btn">Kembali</a>'; ?>
											</div>
									</fieldset>
								</div>
							</div><!--/span-->

						</div><!--/row-->

			<?php
				echo form_close();
			?>
