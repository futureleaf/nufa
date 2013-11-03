<link href='<?php echo base_url();?>backend/css/bootstrap-spacelab.css' rel='stylesheet' type='text/css' /> 
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
	<div id="contentWrapper"><!--beginning contentWrapper-->
		<!--/////////////////// BEGINNING SECTION ITEM-CONTAINER-BLOG /////////////////-->
		<section id="item-container-blog"><!--beginning item-container-blog-->
		<h3 class="title-three-5"><span><?php echo /*$this->uri->segment(2) . */"Buat Artikel "; if(isset($_GET['search']))echo $_GET['search']; else echo $this->method->dateMonthYearFromDatabaseText($filter); ?></span></h3> 
		
		<!--|||||||||||||||||||||||BEGINNING ITEM-CONTENT-BLOG|||||||||||||||||||||||||||-->
		
		<article class="item-content-blog"><!--beginning item-content-blog--> 
			<form action="" method="post" enctype="multipart/form-data">
				<input type="hidden" name="is_acontent" value="0" />
				<input type="hidden" name="is_dcontent" value="0" />
				<input type="hidden" name="id_tcontent" value="1" />
				<table>
					<tr>
						<td>Kategori Posting</td>
						<td>:</td>
						<td>
							<?php
								foreach($rpost_records as $rpostRecords) {$rpostRecord["$rpostRecords->id_rcontent"] = $rpostRecords->name_rcontent;}
								echo form_dropdown("id_rcontent", $rpostRecord,  "", 'data-rel="chosen"');
							?>
						</td>
					</tr>
					<tr>
						<td>Nama Posting</td>
						<td>:</td>
						<td>
							<input type="text" name="name_content" value="<?php echo (set_value('name_content'))?set_value('name_content'):""; ?>" />
							<?php if(form_error('name_content') != null) echo "<span class=\"help-inline\"> " . form_error('name_content') . " </span>"; ?>
						</td>
					</tr>
					<tr>
						<td>Gambar Posting</td>
						<td>:</td>
						<td>
							<input class="input-file uniform_on" type="file" name="userfile" size="20" />
							<?php if($errorImage != null) echo "<span class=\"help-inline\"> " . $errorImage . " </span>"; ?>
						</td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td>:</td>
						<td>
							<textarea class="cleditor" rows="3" name="desc_content"><?php echo (set_value('desc_content'))?set_value('desc_content'):""; ?></textarea>
							<?php if(form_error('desc_content') != null) echo "<span class=\"help-inline\"> " . form_error('desc_content') . " </span>"; ?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<input type="submit" name="doCreate" value="Posting"/>
							<input type="reset" name="back" value="Back" onClick="window.location='<?php echo site_url("$controller/createPosting"); ?>'" />
						</td>
					</tr>
				</table>
			</form>
		</article>
	<!--end item-container-blog--> 
		
	<!--||||||||||||||||||||||||||||END ITEM-CONTENT-BLOG|||||||||||||||||||||||||||||||||--> 
