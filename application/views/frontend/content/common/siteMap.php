  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
  
  <div id="contentWrapper"><!--beginning contentWrapper-->
  
  <h3 class="title-three-5"><span>Site Map</span></h3>
  
        					<section id="sitemap-container"><!--geginning sitemap-container-->
                        
                        
                        		<div class="address-main"><!--beginning address-main-->
                                <h3 class="title-three-4"><span>Address</span></h3>
                                		<figure class="logo-map">
                                        		<img src="<?=$dir_images?>logo.png" alt="">
                                        </figure>
                            
      <?php
	      foreach($our_contacts as $our_contact):
      ?>                       
          <div class="perloc"><!--beginning perloc-->
            <div class="city"><img src="<?=$dir_images?>home_50.png" alt=""></div>
            <p><?php echo $our_contact->desc_comment; ?></p>
            <div class="phone"><img src="<?=$dir_images?>fax.png" alt=""></div>
            <p><?php echo $our_contact->phone_comment; ?></p>
            <div class="mail"><img src="<?=$dir_images?>mail_16x12_50.png" alt=""></div>
            <p><?php echo $our_contact->email_comment; ?></p>
          </div>
    <?php
	    endforeach;
    ?>
          <!--end perloc--> 
                                
                                </div><!--end address-main-->
                                
                                <div class="index-pages"><!--beginning index-pages-->
                                <h3 class="title-three-4"><span>List Pages</span></h3>
                                		<ul class="list-pages">
						    <li class="title-list"><?php echo anchor("$controller/index","Home", array("title"=>"Home", "class"=>"intest-nav", "id"=>($this->uri->segment(2)=="index")?"selected":"")); ?></li>
                                                    <li class="title-list"><a href="#" title="My Profile">My Profile</a>
                                                     <ul class="list-pages-2">
						      <li><?php echo anchor("$controller/history","Sejarah", array("title"=>"Sejarah")); ?></li>
						      <li><?php echo anchor("$controller/visionAndMision","Visi Dan Misi", array("title"=>"Visi Dan Misi")); ?></li>
						      <li><?php echo anchor("$controller/facilitys","Fasilitas", array("title"=>"Fasilitas")); ?></li>
						      <li><?php echo anchor("$controller/achievements","Prestasi", array("title"=>"Prestasi")); ?></li>
                                                     </ul>
                                                    </li>
						    <li class="title-list"><a href="#">Informasi</a>
                                                     <ul class="list-pages-2">
						      <li><?php echo anchor("$controller/notifications","Pengumuman", array("title"=>"Pengumuman")); ?></li>
						      <li><?php echo anchor("$controller/newses","Berita Sekolah", array("title"=>"Berita Sekolah")); ?></li>
						      <li><?php echo anchor("$controller/events","Kegiatan", array("title"=>"Kegiatan")); ?></li>
						      <li><?php echo anchor("$controller/articles","Artikel", array("title"=>"Artikel")); ?></li>
                                                    </ul>
                                                   </li>
                                                   <li class="title-list"><?php echo anchor("$controller/organization","Organisasi", array("title"=>"Organisasi")); ?></li>
                                                   <li class="title-list"><?php echo anchor("$controller/gallery","Gallery Foto", array("title"=>"Gallery Foto")); ?></li>
                                                   <li class="title-list"><?php echo anchor("$controller/contact","Kontak", array("title"=>"Kontak")); ?></li>
                                                  
						   <?php if($this->session->userdata('is_login_front') == FALSE) { ?>
						   <li class="title-list"><?php echo anchor("$controller/login","Masuk", array("title"=>"Masuk")); ?></li>
						   <?php } else {?>
						   <li class="title-list"><a href="#" title="Account">Account</a>
						     <ul class="list-pages-2">
						      <li><?php echo anchor("$controller/updatePassword","Update Password", array("title"=>"Update Password")); ?></li>
						      <li><?php echo anchor("$controller/updatePicture","Update Picture", array("title"=>"Update Picture")); ?></li>
						      <li><?php echo anchor("$controller/student","Nilai", array("title"=>"Nilai")); ?></li>
						      <li><?php echo anchor("$controller/logout","Keluar", array("title"=>"Masuk")); ?></li>
						     </ul>
						   </li>
						   <?php } ?>
						   </li>
                                                </ul>
                                </div><!--end index-pages-->
                                
                                <div class="other"><!--beginning other-->
                                <h3 class="title-three-4"><span>Blog Link</span></h3>
                                		<ul class="list-pages">
						   <li class="title-list"><a href="#">Blog Categories</a>
						      <ul class="list-pages-2">
							<li><?php echo anchor("$controller/archieves","Semua Kategori", array("title"=>"Semua Kategori")); ?></li>
							<li><?php echo anchor("$controller/notifications","Pengumuman", array("title"=>"Pengumuman")); ?></li>
							<li><?php echo anchor("$controller/newses","Berita Sekolah", array("title"=>"Berita Sekolah")); ?></li>
							<li><?php echo anchor("$controller/events","Kegiatan", array("title"=>"Kegiatan")); ?></li>
							<li><?php echo anchor("$controller/articles","Artikel", array("title"=>"Artikel")); ?></li>
							<li><?php echo anchor("$controller/facilitys","Fasilitas", array("title"=>"Fasilitas")); ?></li>
							<li><?php echo anchor("$controller/achievements","Prestasi", array("title"=>"Prestasi")); ?></li>
						      </ul>
                                                   </li>
                                               </ul>
                                 <h3 class="title-three-4"><span>Archives Blog</span></h3>
                                               <ul class="list-pages">
						  <?php $link="";$parent_word="";$i = 0; foreach($archieve_all_records as $archieve_all_record):
							  $uri_2 = "archieves";
							  if($i <= 12 && $parent_word != $this->method->dateMonthYearFromDatabaseText($archieve_all_record->ud_content) && $link != $this->uri->segment(2)) {
								  echo "<li>" . anchor("$controller/$uri_2/date/" . $this->method->dateMonthYearToDatabase($archieve_all_record->ud_content) . "", $this->method->dateMonthYearFromDatabaseText($archieve_all_record->ud_content)) . "</li>";
								  ++$i;
							  }
							  $parent_word = $this->method->dateMonthYearFromDatabaseText($archieve_all_record->ud_content);
						  endforeach; ?>
                                               </ul>
                                </div><!--end other-->
  