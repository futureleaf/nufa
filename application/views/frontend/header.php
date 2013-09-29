<?=($this->uri->segment(2)=="index.do")?"selected":"" ?>
  <!--///////////////////// BEGINNING header /////////////////////////////-->
  
  <header><!--beginning header -->
  
    <div class="headercontent"><!--beginning "headercontent"-->
      
      <div class="logo"><!--beginning logo-->
        
        <div class="logo-img"> <?php echo anchor("$controller/index", "<img src=\"".$dir_images."logo.png\" alt=\"logo\"></a>");?> </div>
                
                <div class="social-icon-header"><!--beginning header-item-->
                    <ul class="header-item"><!--beginning list-header-icon-->
                        <li> <a href="#" title="Vimeo" class="tooltip"> <img src="<?=$dir_images?>vimeo-h.png" alt=""> </a> </li>
                        <li> <a href="#" title="YouTube" class="tooltip"> <img src="<?=$dir_images?>youtube-h.png" alt=""> </a> </li>
                        <li> <a href="#" title="Linkedin" class="tooltip"> <img src="<?=$dir_images?>linkedin-h.png" alt=""> </a> </li>
                        <li> <a href="#" title="Google+" class="tooltip"> <img src="<?=$dir_images?>google-h.png" alt=""> </a> </li>
                        <li> <a href="#" title="Twitter" class="tooltip"> <img src="<?=$dir_images?>twitter-h.png" alt=""> </a> </li>
                        <li> <a href="#" title="Facebook" class="tooltip"> <img src="<?=$dir_images?>facebook-h.png" alt=""> </a> </li>
                        <li> <a href="mailto:hadi.arraafid@gmail.com" title="Write mail" class="tooltip opac"> <img src="<?=$dir_images?>mail-h.png" alt=""> </a> </li>
                        <li> <a href="#" title="Call with Skipe" class="tooltip opac"> <img src="<?=$dir_images?>skipe-h.png" alt=""> </a> </li>
                        
                    </ul>
                </div><!--end social-icon-header-->
            
          </div><!--end logo-->
      
    </div><!--end "headercontent"-->
    
      
  
    <!--beginning content-navigation-->
    <div class="content-navigation">
      
      <nav class="navigator"><!--beginning "navigator"-->
        <ul id="nav">
          <li><?php echo anchor("$controller/index","Home", array("title"=>"Home", "class"=>"intest-nav", "id"=>($this->uri->segment(2)=="index")?"selected":"")); ?></li>
          <li><span class="div-nav">&nbsp;</span></li>
          <li><a href="#" title="My Profile" class="intest-nav">My Profile</a>
             <ul>
              <li><?php echo anchor("$controller/history","Sejarah", array("title"=>"Sejarah")); ?></li>
              <li><?php echo anchor("$controller/visionAndMision","Visi Dan Misi", array("title"=>"Visi Dan Misi")); ?></li>
	      <li><?php echo anchor("$controller/facilitys","Fasilitas", array("title"=>"Fasilitas")); ?></li>
	      <li><?php echo anchor("$controller/achievements","Prestasi", array("title"=>"Prestasi")); ?></li>
             </ul>
          </li>
          <li><span class="div-nav">&nbsp;</span></li>
          <li><a href="#" title="Informasi" class="intest-nav">Informasi</a>
            <ul>
	      <li><?php echo anchor("$controller/notifications","Pengumuman", array("title"=>"Pengumuman")); ?></li>
	      <li><?php echo anchor("$controller/newses","Berita Sekolah", array("title"=>"Berita Sekolah")); ?></li>
	      <li><?php echo anchor("$controller/events","Kegiatan", array("title"=>"Kegiatan")); ?></li>
	      <li><?php echo anchor("$controller/articles","Artikel", array("title"=>"Artikel")); ?></li>
            </ul>
          </li>
          <li><span class="div-nav">&nbsp;</span></li>
	  <li><?php echo anchor("$controller/organization","Organisasi", array("title"=>"Organisasi")); ?></li>
          <li><span class="div-nav">&nbsp;</span></li>
	  <li><?php echo anchor("$controller/gallery","Gallery Foto", array("title"=>"Gallery Foto")); ?></li>
          <li><span class="div-nav">&nbsp;</span></li>
	  <li><?php echo anchor("$controller/contact","Kontak", array("title"=>"Kontak")); ?></li>
	  <li><?php echo anchor("$controller/createArtikel","Buat Artikel", array("title"=>"Buat Artikel")); ?></li>
          <li><span class="div-nav">&nbsp;</span></li>
          <?php if($this->session->userdata('is_login_front') == FALSE) { ?>
          <li><?php echo anchor("$controller/login","Masuk", array("title"=>"Masuk")); ?></li>
	  <?php } else {?>
          <li><a href="#" title="Account">Account</a>
            <ul>
	      <li><?php echo anchor("$controller/updatePassword","Update Password", array("title"=>"Update Password")); ?></li>
	      <li><?php echo anchor("$controller/updatePicture","Update Picture", array("title"=>"Update Picture")); ?></li>
	      <li><?php echo anchor("$controller/student","Nilai", array("title"=>"Nilai")); ?></li>
	      <li><?php echo anchor("$controller/logout","Keluar", array("title"=>"Masuk")); ?></li>
            </ul>
          </li>
	  <?php } ?>
        </ul>
      </nav>
      <!-- end "navigator"--> 
      
    </div>
    <!--end content-navigation-->
    <!--
    <div class="content-navigation">
    -->
  </header>
  <!-- end header--> 
  
  <!--///////////////////// END header /////////////////////////////--> 