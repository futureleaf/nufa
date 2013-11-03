<script src="/application/views/backend/js/jquery.js"></script>
<script>
	$(document).ready(function(){
	
	});
		function deletePicture(url){
			status = confirm('Anda yakin ingin menghapus komentar ?');
			if(status == true) {
				window.location=url;
			}
		};
</script>
		<div class="row-fluid sortable">
			<div class="box span12">
				<div class="box-header well" data-original-title>
					<h2><i class="icon-edit"></i> <?php foreach($galleryes as $gallery) : echo $gallery->name_content; endforeach; ?></h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<fieldset class="form-horizontal">			
						<?php
							foreach($galleryes as $gallery) :
						?>
						<p class="center">
							<button id="toggle-fullscreen" class="btn btn-large btn-info visible-desktop" data-toggle="button"><i class="icon-fullscreen icon-white"></i>Toggle Fullscreen</button>
							<?php echo '<a href="#'.base_url().'admin/gallery/pictureCreate/'.$gallery->id_content.'" class="btn btn-large btn-primary" title="Tambah Gambar"><i class="icon-plus-sign icon-white"></i> Tambah Gambar</a>'; ?>
							<?php echo '<a href="#'.base_url().'admin/gallery/commentCreate/'.$gallery->id_content.'" class="btn btn-large btn-inverse" title="Buat Gambar"><i class="icon-comment icon-white"></i> Buat Komentar</a>'; ?>
							<?php echo '<a href="#'.base_url().'admin/gallery" class="btn btn-large">Kembali</a>'; ?>
						</p>
						<br/>
						<ul class="thumbnails">
							<?php foreach($pictures as $picture) { ?>
							<li id="image-<?php echo $picture->name_picture; ?>" class="thumbnail">
								<a style="background:url(<?php echo $uploads ?>/thumbs/thumb_<?php echo $picture->name_picture; ?>)" title="<?php echo $picture->name_picture; ?>" href="<?php echo $uploads ."/". $picture->name_picture; ?>">
									<img class="grayscale" src="<?php echo $uploads; ?>/thumbs/thumb_<?php echo $picture->name_picture; ?>" />
								</a>
									<?php
										echo '<br /><br /><center>';
										echo '<button class="btn btn-mini" title="Perbaharui" style="position:absolute;margin:-20% -40%;" onClick="window.location=\'#'.base_url().'admin/gallery/pictureUpdate/'.$gallery->id_content.'/'.$picture->id_picture.'\';"><i class="icon-pencil"></i></button>'; 
										echo '<button onClick=" return deletePicture(\'#'.base_url().'admin/gallery/pictureDelete/'.$gallery->id_content.'/'.$picture->id_picture.'\')" class="btn btn-mini pictureDelete" title="Hapus" style="position:absolute;margin:-20% 13%;"><i class="icon-trash"></i></button>'; 
										echo '</canter>';
									?>
							</li>
							<?php } ?>
						</ul>
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
										echo '<a href="#'.base_url().'admin/gallery/commentUpdate/'.$gallery->id_content.'/'.$comment->id_comment.'" class="btn btn-mini btn-info" title="Perbaharui"><i class="icon-pencil icon-white"></i></a> '; 
										echo '<a href="#'.base_url().'admin/gallery/commentDelete/'.$gallery->id_content.'/'.$comment->id_comment.'" class="btn btn-mini btn-danger" title="Hapus" onClick="return confirm(\'Anda yakin ingin menghapus komentar ?\')"><i class="icon-trash icon-white"></i></a>'; 
									?>
								</div>
							</div>
						<?php
							$i++;
							endforeach;
						?>
				<?php
					endforeach;
				?>
			</fieldset>
		</div>
	</div><!--/span-->

</div><!--/row-->
