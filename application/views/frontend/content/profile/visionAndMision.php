 
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
  
  <div id="contentWrapper"><!--beginning contentWrapper-->
  
		<h3 class="title-three-5"><span>Vision And Mission</span></h3> 
    
	<!--|||||||||||||||||||||||BEGINNING ITEM-CONTENT-BLOG|||||||||||||||||||||||||||-->
	
	<article class="item-content-blog">
		<?php
			foreach($visionAndMissions as $visionAndMission): 
			$link = "";
			if($visionAndMission->id_rcontent == 1) $link = "newses";
			else if($visionAndMission->id_rcontent == 2) $link = "visionAndMissions";
			else if($visionAndMission->id_rcontent == 3) $link = "achievements";
			else if($visionAndMission->id_rcontent == 4) $link = "visionAndMissions";
			else if($visionAndMission->id_rcontent == 5) $link = "visionAndMissions";
			else if($visionAndMission->id_rcontent == 6) $link = "visionAndMissions";
		?>
		<div class="photos-blog"><!--beginning photos-blog--> 
		</div>
		<div class="intro-text-blog-single"><!--beginning intro-text-blog-->
			<?php echo anchor("$controller/$link/$visionAndMission->id_content", '<h3 class="title-three-4"><span>'.$visionAndMission->name_content.' </span></h3>', array("style"=>"text-decoration:none;")); ?>
			
			<p><?php echo $visionAndMission->desc_content;?></p>
							
		</div>
		<!--end intro-text-blog-->
		<div class="separator-post"></div>
		<!--end tiny-tips-->
		<?php endforeach; ?>
        
	</article>
  
  <!--////////////////////////END contentWrapper//////////////////--> 