<link href='<?php echo base_url();?>backend/css/bootstrap-spacelab.css' rel='stylesheet' type='text/css' /> 
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
	<div id="contentWrapper"><!--beginning contentWrapper-->
		<!--/////////////////// BEGINNING SECTION ITEM-CONTAINER-BLOG /////////////////-->
		<section id="item-container-blog"><!--beginning item-container-blog-->
		<h3 class="title-three-5"><span><?php echo /*$this->uri->segment(2) . */"Buat Artikel "; if(isset($_GET['search']))echo $_GET['search']; else echo $this->method->dateMonthYearFromDatabaseText($filter); ?></span></h3> 
		
		<!--|||||||||||||||||||||||BEGINNING ITEM-CONTENT-BLOG|||||||||||||||||||||||||||-->
		
		<article class="item-content-blog"><!--beginning item-content-blog-->
			<?php
				foreach($articlees as $article) :
			?>
				<table>
					<tr>
						<td>Kategori Posting</td>
						<td>:</td>
						<td><?php echo $article->name_rcontent; ?></td>
					</tr>
					<tr>
						<td>Nama Posting</td>
						<td>:</td>
						<td><?php echo $article->name_content; ?></td>
					</tr>
					<tr>
						<td>Gambar Posting</td>
						<td>:</td>
						<td><img src="<?php echo $dir_uploads . "/thumbs/thumb_" . $article->picture_content; ?>" /></td>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td>:</td>
						<td><?php echo $article->desc_content; ?></td>
					</tr>
					</tr>
					<tr>
						<td>Deskripsi</td>
						<td>:</td>
						<td>
							<?php
								$i = 1;
								foreach($comments as $comment) :
							?>
								<div class="control-group">
									<label class="control-label">Komentar <?php echo $i; ?> </label>
									<div class="controls">
										<p>Penulis : <?php echo $comment->author_comment; ?></p>
										<p>Email : <?php echo $comment->email_comment; ?></p>
										<p>Deskripsi : <?php echo $comment->desc_comment; ?></p>
										<p>Action : 
										<?php
											echo '<a href="#'.base_url().'admin/article/commentUpdate/'.$article->id_content.'/'.$comment->id_comment.'" class="btn btn-mini btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a>'; 
											echo '<a href="#'.base_url().'admin/article/commentDelete/'.$article->id_content.'/'.$comment->id_comment.'" class="btn btn-mini btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus komentar ?\')"><i class="icon-trash icon-white"></i></a>'; 
										?>
									</div>
								</div>
							<?php
								$i++;
								endforeach;
							?>
						</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							<input type="submit" name="doCreate" value="Posting" />
							<input type="submit" name="back" value="Back" onClick="window.location='<?php echo site_url("$controller/createPosting"); ?>'" />
						</td>
					</tr>
				</table>
			<?php
				endforeach;
			?>
		</article>
	<!--end item-container-blog--> 
		
	<!--||||||||||||||||||||||||||||END ITEM-CONTENT-BLOG|||||||||||||||||||||||||||||||||--> 
