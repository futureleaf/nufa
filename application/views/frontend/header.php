<?=($this->uri->segment(2)=="index.do")?"selected":"" ?>
  <!--///////////////////// BEGINNING header /////////////////////////////-->
  
  <header><!--beginning header -->
  
    <div class="headercontent"><!--beginning "headercontent"-->
      
      <div class="logo"><!--beginning logo-->
        
        <div class="logo-img"> <?php echo anchor("$controller/index", "<img src=\"".$dir_images."logo.png\" alt=\"logo\"></a>");?> </div>
                
                <div class="social-icon-header"><!--beginning header-item-->
                    <ul class="header-item"><!--beginning list-header-icon-->
						<?php
							$links = $this->mdl_content->link_desc_records()->result();
							foreach($links as $link):
							if($link->id_tcontent == 101) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."skipe-h.png' alt=''> </a> </li>";
							if($link->id_tcontent == 102) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."mail-h.png' alt=''> </a> </li>";
							if($link->id_tcontent == 103) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."facebook-h.png' alt=''> </a> </li>";
							if($link->id_tcontent == 104) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."twitter-h.png' alt=''> </a> </li>";
							if($link->id_tcontent == 105) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."google-h.png' alt=''> </a> </li>";
							if($link->id_tcontent == 106) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."linkedin-h.png' alt=''> </a> </li>";
							if($link->id_tcontent == 107) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."youtube-h.png' alt=''> </a> </li>";
							if($link->id_tcontent == 108) echo "<li> <a href='".$link->desc_content."' title='".$link->name_content."' class='tooltip'> <img src='".$dir_images."vimeo-h.png' alt=''> </a> </li>";
						?>
                         <?php
							endforeach;
                        ?>
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
          <li><?php echo anchor("$controller/history","My Profile", array("title"=>"My Profile", "class"=>"intest-nav", "id"=>($this->uri->segment(2)=="history"||$this->uri->segment(2)=="visionAndMision"||$this->uri->segment(2)=="facilitys"||$this->uri->segment(2)=="achievements")?"selected":"")); ?>
             <ul>
              <li><?php echo anchor("$controller/history","Sejarah", array("title"=>"Sejarah", "id"=>($this->uri->segment(2)=="history")?"selected":"")); ?></li>
              <li><?php echo anchor("$controller/visionAndMision","Visi Dan Misi", array("title"=>"Visi Dan Misi", "id"=>($this->uri->segment(2)=="visionAndMision")?"selected":"")); ?></li>
	      <li><?php echo anchor("$controller/facilitys","Fasilitas", array("title"=>"Fasilitas", "id"=>($this->uri->segment(2)=="facilitys")?"selected":"")); ?></li>
	      <li><?php echo anchor("$controller/achievements","Prestasi", array("title"=>"Prestasi", "id"=>($this->uri->segment(2)=="achievements")?"selected":"")); ?></li>
             </ul>
          </li>
          <li><span class="div-nav">&nbsp;</span></li>
          <li><?php echo anchor("$controller/notifications","Informasi", array("title"=>"Informasi", "class"=>"intest-nav", "id"=>($this->uri->segment(2)=="notifications"||$this->uri->segment(2)=="newses"||$this->uri->segment(2)=="events"||$this->uri->segment(2)=="articles")?"selected":"")); ?>
            <ul>
			  <li><?php echo anchor("$controller/notifications","Pengumuman", array("title"=>"Pengumuman", "id"=>($this->uri->segment(2)=="notifications")?"selected":"")); ?></li>
			  <li><?php echo anchor("$controller/newses","Berita Sekolah", array("title"=>"Berita Sekolah", "id"=>($this->uri->segment(2)=="newses")?"selected":"")); ?></li>
			  <li><?php echo anchor("$controller/events","Kegiatan", array("title"=>"Kegiatan", "id"=>($this->uri->segment(2)=="events")?"selected":"")); ?></li>
			  <li><?php echo anchor("$controller/articles","Artikel", array("title"=>"Artikel", "id"=>($this->uri->segment(2)=="articles")?"selected":"")); ?></li>
            </ul>
          </li>
          <li><span class="div-nav">&nbsp;</span></li>
		  <li><?php echo anchor("$controller/organization","Organisasi", array("title"=>"Organisasi", "class"=>"intest-nav", "id"=>($this->uri->segment(2)=="organization")?"selected":"")); ?>
         	  <li><span class="div-nav">&nbsp;</span></li>
		  <li><?php echo anchor("$controller/gallery","Gallery Foto", array("title"=>"Gallery Foto", "class"=>"intest-nav", "id"=>($this->uri->segment(2)=="gallery")?"selected":"")); ?>
			  <li><span class="div-nav">&nbsp;</span></li>
		  <li><?php echo anchor("$controller/contact","Kontak", array("title"=>"Kontak", "class"=>"intest-nav", "id"=>($this->uri->segment(2)=="contact")?"selected":"")); ?>
          <li><span class="div-nav">&nbsp;</span></li>
          <?php if($this->session->userdata('is_login_front') == FALSE) { ?>
          <li><?php echo anchor("$controller/login","Masuk", array("title"=>"Masuk", "id"=>($this->uri->segment(2)=="login")?"selected":"")); ?></li>
	  <?php } else {?>
		  <li><?php echo anchor("$controller/createPosting","Buat Posting", array("title"=>"Buat Artikel", "id"=>($this->uri->segment(2)=="createPosting")?"selected":"")); ?></li>
          <li><span class="div-nav">&nbsp;</span></li>
          <li><a href="#" title="Account" id=<?php echo ($this->uri->segment(2)=="updatePassword" || $this->uri->segment(2)=="updatePicture" || $this->uri->segment(2)=="student" || $this->uri->segment(2)=="logout")?"selected":"";?>>Account</a>
            <ul>
	      <li><?php echo anchor("$controller/updatePassword","Update Password", array("title"=>"Update Password", "id"=>($this->uri->segment(2)=="updatePassword")?"selected":"")); ?></li>
	      <li><?php echo anchor("$controller/updatePicture","Update Picture", array("title"=>"Update Picture", "id"=>($this->uri->segment(2)=="updatePicture")?"selected":"")); ?></li>
	      <li><?php echo anchor("$controller/student","Nilai", array("title"=>"Nilai", "id"=>($this->uri->segment(2)=="student")?"selected":"")); ?></li>
	      <li><?php echo anchor("$controller/logout","Keluar", array("title"=>"Masuk", "id"=>($this->uri->segment(2)=="logout")?"selected":"")); ?></li>
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
