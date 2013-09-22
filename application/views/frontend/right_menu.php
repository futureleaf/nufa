
      
      
      <!--////////////////////////////BEGINNING SIDEBAR-RIGHT-BLOG//////////////////////////-->
      
      <aside class="sidebar-right-blog"> 
        
        <!--|||||||||||||||||||||||||||||BEGINNING SPOT-BLOG||||||||||||||||||||||||||||||-->
        
        <div class="spot-blog"><!--beginning spot-blog-->
        <?php
		if($this->uri->segment(2) == "gallery" || $this->uri->segment(2) == "history" || $this->uri->segment(2) == "visionAndMision") {
			$function = "archieves";
		}
		else {
			$function = $this->uri->segment(2);
		}
        ?>
        <form class="search-post" action="<?= base_url().$controller."/".$function?>" method="get">
        <fieldset> <span class="text"><input name="search" type="text" value="" placeholder="Search ..."></span>
        </fieldset>
        </form>
          <h3 class="title-three-4"><span>Latest Post</span></h3>
          <ul>
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
        </div>
        <!--end spot-blog--> 
        
        <!--|||||||||||||||||||||||||||||||||END SPOT-BLOG||||||||||||||||||||||||||||||||||||--> 
        
        <!--|||||||||||||||||||||||||||||||||BEGINNING SPOT-BLOG||||||||||||||||||||||||||||||-->
        
        <div class="spot-blog"><!--beginning spot-blog-->
          <h3 class="title-three-4"><span>Category</span></h3>
          <ul>
	      <li><?php echo anchor("$controller/archieves","Semua Kategori", array("title"=>"Semua Kategori")); ?></li>
	      <li><?php echo anchor("$controller/notifications","Pengumuman", array("title"=>"Pengumuman")); ?></li>
	      <li><?php echo anchor("$controller/newses","Berita Sekolah", array("title"=>"Berita Sekolah")); ?></li>
	      <li><?php echo anchor("$controller/events","Kegiatan", array("title"=>"Kegiatan")); ?></li>
	      <li><?php echo anchor("$controller/articles","Artikel", array("title"=>"Artikel")); ?></li>
	      <li><?php echo anchor("$controller/facilitys","Fasilitas", array("title"=>"Fasilitas")); ?></li>
	      <li><?php echo anchor("$controller/achievements","Prestasi", array("title"=>"Prestasi")); ?></li>
          </ul>
        </div>
        <!--end spot-blog--> 
        
        <!--||||||||||||||||||||||||||||||||||END SPOT-BLOG|||||||||||||||||||||||||||||||||||-->
        
        
        <!--|||||||||||||||||||||||||||||||||BEGINNING SPOT-BLOG||||||||||||||||||||||||||||||-->
        <?php if (isset($right_special_records)) { ?>
        <div class="spot-blog"><!--beginning spot-blog-->
          <h3 class="title-three-4"><span>Archives</span></h3>
          <ul>
		<?php $link="";$parent_word="";$i = 0; foreach($right_special_records as $archieve_all_record):
			if($all_content->id_rcontent == 1) $link = "newses";
			else if($all_content->id_rcontent == 2) $link = "articles";
			else if($all_content->id_rcontent == 3) $link = "achievements";
			else if($all_content->id_rcontent == 4) $link = "facilitys";
			else if($all_content->id_rcontent == 5) $link = "notifications";
			else if($all_content->id_rcontent == 6) $link = "events";
			$uri_2 = $this->uri->segment(2);
			if($i <= 12 && $parent_word != $this->method->dateMonthYearFromDatabaseText($archieve_all_record->ud_content) && $link != $this->uri->segment(2)) {
				echo "<li>" . anchor("$controller/$uri_2/date/" . $this->method->dateMonthYearToDatabase($archieve_all_record->ud_content) . "", $this->method->dateMonthYearFromDatabaseText($archieve_all_record->ud_content)) . "</li>";
				++$i;
			}
			$parent_word = $this->method->dateMonthYearFromDatabaseText($archieve_all_record->ud_content);
		endforeach; ?>
          </ul>
        </div>
        <!--end spot-blog--> 
        <?php } ?>
        <!--|||||||||||||||||||||||||||||||||END SPOT-BLOG||||||||||||||||||||||||||||||||||||-->
        
        
        <!--|||||||||||||||||||||||||||||||||BEGINNING SPOT-BLOG||||||||||||||||||||||||||||||-->
        
        <div class="spot-blog"><!--beginning spot-blog-->
		<h3 class="title-three-4"><span>Flickr</span></h3>
		<div class="widget-flickr-spot"><!--beginning-widget-flickr-->
		<!-- begin tweeter -->
		<a href="https://twitter.com/arraafid" class="twitter-follow-button" data-show-count="false">Follow @arraafid</a>
		<a href="https://twitter.com/share" class="twitter-share-button" data-text="SMPIT Nurul Fajar" data-lang="id" data-hashtags="nufa" data-dnt="true">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
		<!-- end twetter -->
		<iframe src="//www.facebook.com/plugins/like.php?href=https://www.facebook.com/ReisasFanPage/;width=250&amp;height=20&amp;colorscheme=light&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;send=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:300px;" allowTransparency="true"></iframe>


		</div><!--end-widget-flickr-->
        </div>
        <!--end spot-blog--> 
        
        <!--|||||||||||||||||||||||||||||||||END SPOT-BLOG||||||||||||||||||||||||||||||||||||--> 
        
        
      </aside>
      <!--end sidebar-right-blog--> 