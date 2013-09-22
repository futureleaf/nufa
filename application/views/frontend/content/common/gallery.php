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
						$i = 0;
						foreach($data['pictures'] as $picture):
							if($i == 0) {
					?>
						<div class="photos-blog gallery" style="width:33%"><!--beginning photos-blog--> 
							<div class="intro-text-blog" style="width:100%"><!--beginning intro-text-blog-->
							  
<!-- 							  <?php echo anchor("$controller/".$this->uri->segment(2)."/$gallery->id_content", '<h3 class="title-three-4"><span>'.$gallery->name_content.' </span></h3>'); ?> -->
								<center><b><?php echo anchor("$controller/gallery/picture/$gallery->id_content", $gallery->name_content); ?></b></center>
								<p><?php  echo anchor("$controller/gallery/picture/$gallery->id_content", "<img src=\"$dir_uploads_thumbs".$this->method->getImage($picture->name_picture)."\" alt=\"can't load image\"/ style=\"height:130px;width:190px;\" class=\"gallery-image\">"); ?></p>
								<p class="doc-post"> 
									<span class="time-post"><img src="<?=$dir_images?>calendar_alt_fill_16x16.png" alt=""> <?php echo anchor("$controller/".$this->uri->segment(2)."/$gallery->id_content", $gallery->cd_content); ?></span>
									<span class="comment-post"><img src="<?=$dir_images?>comment_stroke_16x14.png" alt=""> <?php $count_comments = $this->mdl_comment->count_id_content_records($gallery->id_content); echo anchor("$controller/".$this->uri->segment(2)."/$gallery->id_content", ($count_comments == 1)?$count_comments . " Comment":$count_comments . " Comments"); ?></span> 
								</p>
							</div>
						</div>
						<!--end intro-text-blog-->
					<?php }$i++; endforeach; } ?>
				<!--//////////////////////////////////////END POST WITH PHOTO//////////////////////////////////////-->
				<!--end intro-text-blog-->
				<div class="holder" style="float:right"></div>
			</article>
		<!--end item-container-blog--> 
		
	<!--||||||||||||||||||||||||||||END ITEM-CONTENT-BLOG|||||||||||||||||||||||||||||||||--> 