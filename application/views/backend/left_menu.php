
	<div class="container-fluid">
		<div class="row-fluid">
		<?php if(!isset($no_visible_elements) || !$no_visible_elements) { ?>
		
			<!-- left menu starts -->
			<div class="span2 main-menu-span">
				<div class="well nav-collapse sidebar-nav">	
					<ul class="nav nav-tabs nav-stacked main-menu">
						<li class="nav-header hidden-tablet">Main Management</li>
						<li><?php echo anchor('admin/index/', '<i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span> ',array('class'=>'ajax-link'));?></li>
						<?php /*
						<li><?php echo anchor('admin/ui/', '<i class="icon-eye-open"></i><span class="hidden-tablet"> UI Features</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/form/', '<i class="icon-edit"></i><span class="hidden-tablet"> Forms</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/chart/', '<i class="icon-list-alt"></i><span class="hidden-tablet"> Charts</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/typography/', '<i class="icon-font"></i><span class="hidden-tablet"> Typography</span> ',array('class'=>'ajax-link'));?></li>
						*/?>
						<li class="nav-header hidden-tablet">Content Management</li>
						<li><?php echo anchor('admin/news/', '<i class="icon icon-copy icon-darkgray"></i><span class="hidden-tablet"> Berita Sekolah</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/event/', '<i class="icon-headphones"></i><span class="hidden-tablet"> Kegiatan</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/history/', '<i class="icon-road"></i><span class="hidden-tablet"> Sejarah</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/visionAndMission/', '<i class="icon icon-lightbulb icon-darkgray"></i><span class="hidden-tablet"> Visi Dan Misi</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/gallery/', '<i class="icon-picture"></i><span class="hidden-tablet"> Galeri</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/picture/', '<i class="icon icon-image icon-darkgray"></i><span class="hidden-tablet"> Gambar Content</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/city/', '<i class="icon-globe"></i><span class="hidden-tablet"> Kota</span> ',array('class'=>''));?></li>
						<li class="nav-header hidden-tablet">Education Management</li>
						<li><?php echo anchor('admin/education/', '<i class="icon-book"></i><span class="hidden-tablet"> Pelajaran</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/notification/', '<i class="icon-bullhorn"></i><span class="hidden-tablet"> Pengumuman</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/article/', '<i class="icon-font"></i><span class="hidden-tablet"> Artikel</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/achievement/', '<i class="icon-star"></i><span class="hidden-tablet"> Prestasi</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/facility/', '<i class="icon-th"></i><span class="hidden-tablet"> Fasilitas</span> ',array('class'=>'ajax-link'));?></li>
						<li class="nav-header hidden-tablet">User Management</li>
						<?php if($this->session->userdata('id_ruser') == 1)  echo "<li>" . anchor('admin/administrator/', '<i class="icon-qrcode"></i><span class="hidden-tablet"> Administrator</span> ',array('class'=>'ajax-link')) . "</li>"; ?>
						<li><?php echo anchor('admin/teacher/', '<i class="icon-user"></i><span class="hidden-tablet"> Guru</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/student/', '<i class="icon icon-users icon-darkgray"></i><span class="hidden-tablet"> Murid</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/alumnus/', '<i class="icon-ok"></i><span class="hidden-tablet"> Alumni</span> ',array('class'=>'ajax-link'));?></li>
						<li class="nav-header hidden-tablet">Utility Module</li>
						<li><?php echo anchor('admin/aspiration/', '<i class="icon-comment"></i><span class="hidden-tablet"> Testimoni</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/diamondword/', '<i class="icon icon-messages icon-darkgray"></i><span class="hidden-tablet"> Kata Mutiara</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/contact/', '<i class="icon-envelope"></i><span class="hidden-tablet"> Kontak</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/link/', '<i class="icon icon-link icon-darkgray"></i><span class="hidden-tablet"> Link</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/support/', '<i class="icon icon-flag icon-darkgray"></i><span class="hidden-tablet"> Sporter</span> ',array('class'=>'ajax-link'));?></li>
						<?php /*
						<li class="nav-header hidden-tablet">Sample Section</li>
						<li><?php echo anchor('admin/table/', '<i class="icon-align-justify"></i><span class="hidden-tablet"> Tables</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/calendar/', '<i class="icon-calendar"></i><span class="hidden-tablet"> Calendar</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/grid/', '<i class="icon-th"></i><span class="hidden-tablet"> Grid</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/file_manager/', '<i class="icon-folder-open"></i><span class="hidden-tablet"> File Manager</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/tour/', '<i class="icon-globe"></i><span class="hidden-tablet"> Tour</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/icon/', '<i class="icon-star"></i><span class="hidden-tablet"> Icons</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/error/', '<i class="icon-ban-circle"></i><span class="hidden-tablet"> Error</span> ',array('class'=>'ajax-link'));?></li>
						<li><?php echo anchor('admin/login/', '<i class="icon-lock"></i><span class="hidden-tablet"> Login Page</span> ',array('class'=>'ajax-link'));?></li>
						*/?>
					</ul>
					<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
				</div><!--/.well -->
			</div><!--/span-->
			<!-- left menu ends -->
			
			<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>
			
			<div id="content" class="span10">
			<!-- content starts -->
			<?php } ?>
