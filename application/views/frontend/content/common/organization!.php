
<!-- main begin -->
<div id="main">

    <!-- Start Slider Wrapping -->
    <div id="sliderwrap">
		
        <!-- Start Slider -->
        <div id="slider" class="nivoSlider">
			<?php
				foreach($sliders as $slider):
					echo "<img src=\"/application/uploads/$slider->name_picture\" alt=\"\" width=\"1000px\" height=\"350px\" />";
				endforeach;
			?>
        </div>
        <!-- End Slider -->
        <!-- Start Slider HTML Captions -->
        <div id="htmlcaption" class="nivo-html-caption">
            <strong>This</strong> is an example of a <em>HTML</em> caption with <a href="#">a link</a>.
        </div>
        <!-- End Slider HTML Captions -->
    
    </div>
    <!-- End Slider Wrapping -->
    <!-- Start H1 Title -->
    <div class="titles">
    
    	<h1>Selamat Datang Di <?php echo $_org; ?></h1>
        
        <span></span>
    
    </div>
    <!-- End H1 Title -->
    <!-- Start Main Body Wrap -->
    <div id="main-wrap">
    
    	<!-- Start Featured Boxes -->
        <div class="boxes-third boxes-first">
        
        	<div class="boxes-padding">
            <?php
				foreach($historys as $history):
			?>
            	<div class="bti">
                    <?php echo anchor("$controller/history","<div class=\"featured-images\"><img src=\"/application/views/frontend/images/responsive-icon.png\" width=\"72\" height=\"53\" alt=\"Responsive\"></div><div class=\"featured-titles\">$history->name_content</div>"); ?>
                </div>
                <div class="featured-text"><?php echo (strlen($history->desc_content) > 100)?substr($history->desc_content, 0, 100)."....":$history->desc_content;?></div>
            <?php
				endforeach;
			?>
            </div>
            
            <span class="box-arrow"></span>
        
        </div>
        
        <div class="boxes-third">
        
        	<div class="boxes-padding">
            <?php
				foreach($visionAndMissions as $visionAndMission):
			?>
            	<div class="bti">
                    <?php echo anchor("$controller/visionAndMission","<div class=\"featured-images\"><img src=\"/application/views/frontend/images/cleansleek-icon.png\" width=\"66\" height=\"53\" alt=\"Responsive\"></div><div class=\"featured-titles\">$visionAndMission->name_content</div>"); ?>
                </div>
                <div class="featured-text"><?php echo (strlen($visionAndMission->desc_content) > 100)?substr($visionAndMission->desc_content, 0, 100)."....":$visionAndMission->desc_content;?></div>
            <?php
				endforeach;
			?>
            </div>
            
            <span class="box-arrow"></span>
        
        </div>
        
        <div class="boxes-third boxes-last">
        
        	<div class="boxes-padding">
            	
                <div class="bti">
                    <?php echo anchor("$controller/gallery","<div class=\"featured-images\"><img src=\"/application/views/frontend/images/google-icon.png\" width=\"54\" height=\"53\" alt=\"Responsive\"></div><div class=\"featured-titles\">Gallery</div>"); ?>
                </div>
                <div class="featured-text">Lihat gallery foto-foto narsis dan gokil guru serta murid sekolah SMPIT Nurul Fajar</div>
            
            </div>
            
            <span class="box-arrow"></span>
        
        </div>
        <!-- End Featured Boxes -->
        
        <!-- Title Kegiatan Sekolah Begin -->
        <div class="boxes-full">
        
        	<div class="boxes-padding fullpadding"><h1>Kegiatan Sekolah</h1></div>
            
            <span class="box-arrow"></span>
        
        </div>
        <!-- Title Kegiatan Sekolah End -->
        
        <!-- Kegiatan Sekolah Begin -->
		<?php $i = 1; foreach($events as $event): ?>
		<div class="boxes-fourth <?php if($i==1)echo"boxes-first-fourth";else if($i==4)echo"boxes-last-fourth";?>">
        
       	  <div class="latestfour">
            
           	<div class="title">
				<?php echo $event->name_content; ?>
				<span class="titlearrow"></span>
            </div>
			<div class=""><a href="/application/uploads/<?php echo $event->picture_content; ?>" rel="prettyPhoto" title="<?php echo $event->name_content; ?>"><img src="/application/uploads/thumbs/thumb_<?php echo $event->picture_content; ?>" alt="<?php echo $event->name_content; ?>" width="123" height="123" border="0"/></a></div>
            <div class="text">
				<?php echo (strlen($event->desc_content) > 100)?substr($event->desc_content, 0, 100)."....":$event->desc_content;?>
				<span class="textarrow"></span>
            </div>
            
          </div>
        
        </div>
		<?php $i++;endforeach; ?>
        <!-- Kegiatan Sekolah End -->
    </div>
    <!-- End Main Body Wrap -->

</div>
<!-- main end -->