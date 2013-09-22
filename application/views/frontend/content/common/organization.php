
  
  <div id="contentWrapper"><!--beginning contentWrapper-->
  
		<h3 class="title-three-5"><span><?php echo $this->uri->segment(2) . " "; if(isset($_GET['search']))echo $_GET['search']; else echo $this->method->dateMonthYearFromDatabaseText($filter); ?></span></h3> 
    
	<!--|||||||||||||||||||||||BEGINNING ITEM-CONTENT-BLOG|||||||||||||||||||||||||||-->
	
	<article class="item-content-blog">
		<div class="comment-container"><!--BEGINNING COMMENT-CONTAINER-->
			<ol class="comment-content">
				<?php foreach($teachers as $teacher):  ?>
				<li class="comment-one"><!--beginning comment-one-->
					<div class="avatar"><img src="<?php echo $dir_uploads . $this->method->getImage($teacher->picture_user); ?>" alt="<?php echo $teacher->full_name; ?>" width="60px" height="60px" /></div>
				  
					<div class="content-comment-one"><!--beginning content-comment-one-->
						<div class="line-one">
							<div class="name-comment"><b><?php echo anchor("$controller/".$this->uri->segment(2),$teacher->name_ruser); ?></b></a></div>
						</div>
						<div class="line-two">
							<div class="time"><div class="name-comment" style="margin-left:-1.4%;"><a href="mailto:<?=$teacher->email;?>" style="font-size:100%;"><?=$teacher->email;?></a></div>
						</div>
						<div class="line-three">
							<p><?php echo (strlen($teacher->desc_user) > 175)?str_replace(array("<br>", "</br>"), " ", substr($teacher->desc_user, 0, 175)):str_replace(array("<br>", "</br>"), " ", $teacher->desc_user);?>... <?php echo anchor("$controller/".$this->uri->segment(2)."/$teacher->id_user", "<span>Read More</span>", array("style"=>"color: rgb(153, 153, 153);text-decoration:none;")); ?></p>
						</div>
				    
						<div class="separator-post" style="margin:-0% 0% -0% 0%"></div>
				    
					</div>
					<!--end content-comment-one-->
				</li>
				<!--END COMMENT-ONE-->
				<?php endforeach; ?>
			</ol>
			<!--end comment-content-->
			  
			<!--END COMMENT-TWO-->
          
			<div id="comment" />
		</div><!--end comment-container-->
        
	</article>
  
  <!--////////////////////////END contentWrapper//////////////////--> 