  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
	<div id="contentWrapper"><!--beginning contentWrapper-->
		<!--/////////////////// BEGINNING SECTION ITEM-CONTAINER-BLOG /////////////////-->
		<section id="item-container-blog"><!--beginning item-container-blog-->
		<h3 class="title-three-5"><span><?php echo $this->uri->segment(2) . " "; if(isset($_GET['search']))echo $_GET['search']; else echo $this->method->dateMonthYearFromDatabaseText($filter); ?></span></h3> 
		
			<!--|||||||||||||||||||||||BEGINNING ITEM-CONTENT-BLOG|||||||||||||||||||||||||||-->
			
			<article class="item-content-blog"><!--beginning item-content-blog--> 
		  
	      
		  
				<div class="holder" style="float:right"></div><br/><br/><br/><br/>
				<!--///////////////////////////////BEGINNING POST WITH PHOTO//////////////////////////////////////-->
				<ul id="itemContainer">
				<?php
					foreach($facilitys as $facility): 
						$link = "";
						if($facility->id_rcontent == 1) $link = "newses";
						else if($facility->id_rcontent == 2) $link = "articles";
						else if($facility->id_rcontent == 3) $link = "achievements";
						else if($facility->id_rcontent == 4) $link = "facilitys";
						else if($facility->id_rcontent == 5) $link = "notifications";
						else if($facility->id_rcontent == 6) $link = "events";
				?>
					<li>
						<div class="photos-blog"><!--beginning photos-blog--> 
							<?php echo anchor("$controller/$link/$facility->id_content", '<span class="roll-img-blog"></span><img src="'. $dir_uploads.$facility->picture_content .'" style="width:650px;height:300px;margin-bottom:20px;" alt="">'); ?>
							<div class="intro-text-blog"><!--beginning intro-text-blog-->
							  
							  <?php echo anchor("$controller/$link/$facility->id_content", '<h3 class="title-three-4"><span>'.$facility->name_content.' </span></h3>'); ?>
							  
								<p class="doc-post"> 
									<span class="time-post"><img src="<?=$dir_images?>calendar_alt_fill_16x16.png" alt=""> <?php echo anchor("$controller/$link/$facility->id_content", $this->method->dateFromDatabaseText($facility->ud_content)); ?></span> 
									<span class="admin-post">
										<?php echo ($facility->gender != 0 || $facility->gender == null)? '<img src="'.$dir_images.'user_12x16_grey.png" alt="">' : '<img src="'.$dir_images.'user-woman_12x14_grey.png" alt="">';?> 
										<?php echo anchor("$controller/$link/$facility->id_content", ($facility->id_user ==null)?"Admin":$facility->full_name); ?>
									</span> 
									<span class="comment-post"><img src="<?=$dir_images?>comment_stroke_16x14.png" alt=""> <?php $count_comments = $this->mdl_comment->count_id_content_records($facility->id_content); echo anchor("$controller/$link/$facility->id_content", ($count_comments == 1)?$count_comments . " Comment":$count_comments . " Comments"); ?></span> 
									<span class="category-post"><img src="<?=$dir_images?>tag_fill_16x16.png" alt=""> 
									<?= anchor("$controller/$link", $link)?>
									</span> 
								</p>
							  
							<p><?php echo (strlen($facility->desc_content) > 500)?substr($facility->desc_content, 0, 500):$facility->desc_content;?>... <?php echo anchor("$controller/$link/$facility->id_content", "<span>Read More</span>"); ?></p>
							  
							<div class="separator-post"></div>  
						  
						</div>
						<!--end intro-text-blog-->
					</li>
				<?php 
					endforeach; 
				?>
				</ul>
				<!--//////////////////////////////////////END POST WITH PHOTO//////////////////////////////////////-->
				<!--end intro-text-blog-->
				<div class="holder" style="float:right"></div>
			</article>
		<!--end item-container-blog--> 
		
	<!--||||||||||||||||||||||||||||END ITEM-CONTENT-BLOG|||||||||||||||||||||||||||||||||--> 