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
					<h2><i class="icon-edit"></i> <?php echo $_title_content; ?></h2>
					<div class="box-icon">
						<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
					</div>
				</div>
				<div class="box-content">
					<fieldset class="form-horizontal">
						<p class="center">
							<button id="toggle-fullscreen" class="btn btn-large btn-info visible-desktop" data-toggle="button"><i class="icon-fullscreen icon-white"></i>Toggle Fullscreen</button>
							<?php echo '<a href="#'.base_url().'admin/picture/create/0" class="btn btn-large btn-primary" title="Tambah Gambar"><i class="icon-plus-sign icon-white"></i> Tambah Gambar</a>'; ?>
						</p>
						<br/>
						<ul class="thumbnails">
							<?php foreach($pictures as $picture) { ?>
							<li id="image-<?php echo $picture->name_picture; ?>" class="thumbnail">
								<a style="background:url(<?php echo $uploads; ?>/thumbs/thumb_<?php echo $picture->name_picture; ?>)" title="<?php echo $picture->name_picture; ?>" href="<?php echo $uploads ."/". $picture->name_picture; ?>">
									<img class="grayscale" src="<?php echo $uploads; ?>/thumbs/thumb_<?php echo $picture->name_picture; ?>" />
								</a>
									<?php
										echo '<br /><br /><center>';
										echo ($picture->is_apicture == 1)?'<button class="btn btn-mini btn-warning" title="Toogle Active" style="position:absolute;margin:-20% -45%;" onClick="window.location=\'#'.base_url().'admin/picture/toogle/'.$picture->id_content.'/'.$picture->id_picture.'/0\';"><i class="icon-ok-circle"></i></button>':'<button class="btn btn-mini" title="Toogle Active"  style="position:absolute;margin:-20% -45%;onClick="window.location=\'#'.base_url().'admin/picture/toogle/'.$picture->id_content.'/'.$picture->id_picture.'/1\';"><i class="icon-remove-circle"></i></button>'; 
										echo '<button class="btn btn-mini" title="Perbaharui" style="position:absolute;margin:-20% -13%;" onClick="window.location=\'#'.base_url().'admin/picture/pictureUpdate/'.$picture->id_content.'/'.$picture->id_picture.'\';"><i class="icon-pencil"></i></button>'; 
										echo '<button onClick=" return deletePicture(\'#'.base_url().'admin/picture/pictureDelete/'.$picture->id_content.'/'.$picture->id_picture.'\')" style="position:absolute;margin:-20% 18%;" class="btn btn-mini pictureDelete" title="Hapus"><i class="icon-trash"></i></button>'; 
										echo '</canter>';
									?>
							</li>
							<?php } ?>
						</ul>
				</fieldset>
		</div>
	</div><!--/span-->

</div><!--/row-->
