  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
	<div id="contentWrapper"><!--beginning contentWrapper-->
		<!--/////////////////// BEGINNING SECTION ITEM-CONTAINER-BLOG /////////////////-->
		<section id="item-container-blog"><!--beginning item-container-blog-->
		<h3 class="title-three-5"><span><?php echo $this->uri->segment(2) . " "; ?></span></h3> 
		
			<!--|||||||||||||||||||||||BEGINNING ITEM-CONTENT-BLOG|||||||||||||||||||||||||||-->
			
			<article class="item-content-blog" style="margin:-10% 0%;"><!--beginning item-content-blog--> 
		
				<div class="holder" style="float:right"></div><br/><br/><br/><br/>
				<!--///////////////////////////////BEGINNING POST WITH PHOTO//////////////////////////////////////-->
					<?php foreach($gallerys as $gallery) { 
						$data['pictures'] = $this->mdl_picture->id_content_records($gallery->id_content)->result();
						foreach($data['pictures'] as $picture):
					?>
						<div class="photos-blog gallery" style="width:22%"><!--beginning photos-blog--> 
							<div class="intro-text-blog" style="width:100%"><!--beginning intro-text-blog-->
<!-- 								<?php echo anchor("$controller/".$this->uri->segment(2)."/$gallery->id_content", '<h3 class="title-three-4"><span>'.$gallery->name_content.' </span></h3>'); ?> -->
								<p><a href="<?php echo $dir_uploads . $this->method->getImage($picture->name_picture); ?>"  rel="lightbox[gallery]"><img src="<?php echo $dir_uploads_thumbs . $this->method->getImage($picture->name_picture); ?>" alt="can't load image" style="height:100px;width:130px" class="gallery-image"></a></p></div>
						</div>
						<!--end intro-text-blog-->
					<?php endforeach; } ?>
				<!--//////////////////////////////////////END POST WITH PHOTO//////////////////////////////////////-->
				<!--end intro-text-blog-->
				<div class="holder" style="float:right"></div>
			</article>
		<!--end item-container-blog--> 
		
	<!--||||||||||||||||||||||||||||END ITEM-CONTENT-BLOG|||||||||||||||||||||||||||||||||--> 