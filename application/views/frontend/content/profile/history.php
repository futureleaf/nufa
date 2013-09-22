 
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
  
  <div id="contentWrapper"><!--beginning contentWrapper-->
  
		<h3 class="title-three-5"><span><?php echo $this->uri->segment(2) . " "; ?></span></h3> 
    
	<!--|||||||||||||||||||||||BEGINNING ITEM-CONTENT-BLOG|||||||||||||||||||||||||||-->
	
	<article class="item-content-blog">
		<?php
			foreach($historys as $history): 
			$link = "";
			if($history->id_rcontent == 1) $link = "newses";
			else if($history->id_rcontent == 2) $link = "historys";
			else if($history->id_rcontent == 3) $link = "achievements";
			else if($history->id_rcontent == 4) $link = "historys";
			else if($history->id_rcontent == 5) $link = "historys";
			else if($history->id_rcontent == 6) $link = "historys";
		?>
		<div class="photos-blog"><!--beginning photos-blog--> 
		</div>
		<div class="intro-text-blog-single"><!--beginning intro-text-blog-->
			<?php echo anchor("$controller/$link/$history->id_content", '<h3 class="title-three-4"><span>'.$history->name_content.' </span></h3>', array("style"=>"text-decoration:none;")); ?>
			
			<p><?php echo $history->desc_content;?></p>
							
		</div>
		<!--end intro-text-blog-->
		<div class="separator-post"></div>
		<!--end tiny-tips-->
		<?php endforeach; ?>
        
	</article>
  
  <!--////////////////////////END contentWrapper//////////////////--> 