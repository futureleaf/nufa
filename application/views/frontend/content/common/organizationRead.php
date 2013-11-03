 
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
  
  <div id="contentWrapper"><!--beginning contentWrapper-->
  
		<h3 class="title-three-5"><span><?php echo $_title . " "; if(isset($_GET['search']))echo $_GET['search']; else echo $this->method->dateMonthYearFromDatabaseText($filter); ?></span></h3> 
    
	<!--|||||||||||||||||||||||BEGINNING ITEM-CONTENT-BLOG|||||||||||||||||||||||||||-->
	
	<article class="item-content-blog">
		<?php
			foreach($teachers as $teacher): 
		?>
		<div class="photos-blog"><!--beginning photos-blog--> 
			<?php echo anchor("$controller/".$this->uri->segment(2)."/$teacher->id_user", '<span class="roll-img-blog"></span><img src="'. $dir_uploads.$teacher->picture_user .'" style="width:650px;height:300px;" alt="">'); ?>
		</div>
		<div class="intro-text-blog-single"><!--beginning intro-text-blog-->
			<?php echo anchor("$controller/".$this->uri->segment(2)."/$teacher->id_user", '<h3 class="title-three-4"><span>'.$teacher->full_name.' </span></h3>', array("style"=>"text-decoration:none;")); ?>
			
			<p class="doc-post"> 
				<span class="time-post"><img src="<?=$dir_images?>calendar_alt_fill_16x16.png" alt=""> <?php echo anchor("$controller/".$this->uri->segment(2)."/$teacher->id_user", $this->method->dateFromDatabaseText($teacher->ud_user)); ?></span> 
				<span class="admin-post">
					<?php echo ($teacher->gender != 0 || $teacher->gender == null)? '<img src="'.$dir_images.'user_12x16_grey.png" alt="">' : '<img src="'.$dir_images.'user-woman_12x14_grey.png" alt="">';?> 
					<?php echo anchor("$controller/".$this->uri->segment(2)."/$teacher->id_user", ($teacher->id_user ==null)?"Admin":$teacher->full_name); ?>
				</span> 
				<span class="category-post"><img src="<?=$dir_images?>tag_fill_16x16.png" alt=""> 
					  <?= anchor("$controller/".$this->uri->segment(2)."", $this->uri->segment(2))?>
				</span> 
			</p>
			<p><?php echo $teacher->desc_user;?></p>
							
		</div>
		<!--end intro-text-blog-->
		<div class="separator-post"></div>
		<!--end tiny-tips-->
		<?php endforeach; ?>
        
	</article>
  
  <!--////////////////////////END contentWrapper//////////////////--> 