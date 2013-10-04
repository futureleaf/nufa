  <!--///////////////////// BEGINNING footer ///////////////////-->

	
	<div class="decor-footer"></div>
  
	<footer><!--beginnin footer-->
		      
		<div id="footer-down"><!--beginning footer-down-->
			  
			<div class="cont-twitter-nav"><!--beginning cont-twitter-nav-->
				      
				<div id="jstwitter" style="height:1%"><!--beginning jstwitter-->
				
					<h3 class="title-elements">Twitter Feed</h3>
					<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/arraafid"  data-widget-id="364383131354157056" height="0px">Tweets by @arraafid</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

						
				</div>
						
				<div class="container-post"><!--beginning container-navbase-->
					<h3 class="title-elements-footer-nav">Recent Post</h3>
					<ul class="navpost">
						<?php $link = ""; foreach($all_contents as $all_content):
							if($all_content->id_rcontent == 1) $link = "newses";
							else if($all_content->id_rcontent == 2) $link = "articles";
							else if($all_content->id_rcontent == 3) $link = "achievements";
							else if($all_content->id_rcontent == 4) $link = "facilitys";
							else if($all_content->id_rcontent == 5) $link = "notifications";
							else if($all_content->id_rcontent == 6) $link = "events";
						echo "<li>" . anchor("$controller/$link/" . $all_content->id_content, $all_content->name_content) . "</li>";
						endforeach; ?>
					</ul>
				</div><!--end container-navbase-->
				
			</div><!--end cont-twitter-nav-->
      
	<div id="container-addnews"><!--beginning container-addnews-->
	  
		<div id="address"><!--beginning address-->
			<h3 class="title-elements">Contact Info</h3>
			<div id="completeform"><!--beginning completeform-->
				<img src="<?=$dir_images?>logo-footer.png" alt="">
			</div>
			<!--end completeform-->
			
			<div class="perloc"><!--beginning perloc-->
				<?php foreach($our_contacts as $our_contact): ?>
					<div class="city"><img src="<?=$dir_images?>home_50.png" alt=""></div>
					<p><?php echo $our_contact->desc_comment; ?></p>	
					<div class="phone"><img src="<?=$dir_images?>fax.png" alt=""></div>
					<p><?php echo $our_contact->phone_comment; ?></p>
					<div class="mail"><img src="<?=$dir_images?>mail_16x12_50.png" alt=""></div>
					<p><a href="mailto:<?php echo $our_contact->email_comment; ?>"><?php echo $our_contact->email_comment; ?></a></p>
				<?php endforeach; ?>
				<a href="ymsgr:SendIM?arraafid@rocketmail.com">
					<div class="mail"><img border=0 src="http://opi.yahoo.com/online?u=arraafid@rocketmail.com&m=g&t=1"></div>
					<p>Hadi Ubaidillah</p>
				</a>
				<a href="ymsgr:SendIM?xicors@yahoo.co.id">
					<div class="mail"><img border=0 src="http://opi.yahoo.com/online?u=xicors@yahoo.co.id&m=g&t=1"></div>
					<p>Xicors Vincent Kuroba</p>
				</a>
			</div>
			<!--end perloc--> 
		  
		</div>
		<!--end address-->
	  
		<div class="widget-flickr-footer"><!--beginning-widget-flickr-->
			<h3 class="title-elements-flickr">Testimonials</h3>
			<div id="simpleslider">
				<!-- Begin Slide Testimoni -->
				<?php $i=1;foreach($aspirations as $aspiration): ?>
					<div <?php if($i==1) echo "class=\"current\"";?>>
					    <h4><?php echo $aspiration->name_comment;?></h4>
					    <p><?php echo $aspiration->desc_comment;?></p>
					</div>
				<?php ++$i;endforeach; ?>
				<!-- End Slide Testimoni -->
			</div>
		      <!-- Ending simple slider -->
		</div><!--end-widget-flickr-->
	</div>
	<!--end container-addnews--> 
	
</div>
    <!--end footer-down-->
    
	<div class="cont-footer-last"><!--beginning footer-last-->
	<div id="footer-last"><!--beginning footer-last-->
	  <h5>&copy;2013 - <?php echo date('Y'); ?> SMPIT Nurul Fajar. All rights reserved. | <?php echo anchor("$controller/siteMap", "Site Map"); ?></a></h5>
	  <ul class="social-content">
		<?php
			$links = $this->mdl_content->link_desc_records()->result();
			foreach($links as $link):
			if($link->id_tcontent == 103) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."facebook.png' alt=''> </a> </li>";
			if($link->id_tcontent == 104) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."twitter.png' alt=''> </a> </li>";
			if($link->id_tcontent == 105) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."google.png' alt=''> </a> </li>";
			if($link->id_tcontent == 106) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."linkedin.png' alt=''> </a> </li>";
			if($link->id_tcontent == 107) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."youtube.png' alt=''> </a> </li>";
			if($link->id_tcontent == 108) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."vimeo.png' alt=''> </a> </li>";
		?>
		 <?php endforeach; ?>
	  </ul>
	</div>
	<!--end footer-last-->
	</div><!--end cont-footer-last--> 
      
	</footer>
