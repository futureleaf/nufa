<!--beginning "pageWrapper"--> 
<div class="pageWrapper">

  <!--///////////////////// BEGINNING wrapperslider/////////////////-->
  
  <!--beginning "wrapperslider"-->
  <div class="wrapperslider">
  
    <!--beginning "mediaslider"-->
    <section id="mediaslider">
      
      <div class="container-iview"><!--beginning slider iview-->
		<div id="iview">
			<div data-iview:image="<?=$dir_images?>photo1.jpg">
				<div class="iview-caption caption1" data-x="200" data-y="100" data-transition="expandDown">
                <ul class="iview-ul">
                	<li>Menjadikan Anak Cerdas</li>
        			<li>Berjiwa Kepemimpinan Seperti Rasulullah</li>
        			<li>Inofatif</li>
        			<li>Berwibawa</li>
                 </ul>
                 <!--<a href="#" class="btn btn-small btn-dark-grey">Purchase Now</a>-->
                </div>
			</div>

			<div data-iview:image="<?=$dir_images?>photo2.jpg" data-iview:transition="block-drop-random" data-iview:pausetime="4000">

			<div class="iview-caption caption2" data-x="20" data-y="25" data-transition="expandRight">
				<h1>With Creative<strong class="iview-strong"> Will Attract More </strong><br>Customers Attention on Your Products</h1><h2>Full Clean & Responsive</h2><p>Lorem ipsum dolor sit amet, <br>consetetur sadipscing elitr, <br>sed diam nonumy eirmod tempor invidunt ut<br> labore et dolore magna aliquyam.</p>
				</div>
			</div>

			<div data-iview:image="<?=$dir_images?>photo3.jpg">
				<div class="iview-caption caption3" data-x="750" data-y="30" data-transition="expandLeft">
                <ul class="iview-ul-2">
                	<li>About us page Version 1</li>
        			<li>About us page Version 2</li>
        			<li>Portfolio one column</li>
        			<li>Portfolio two columns</li>
        			<li>Portfolio three columns</li>
                 </ul>
                </div>
			</div>

			<div data-iview:image="<?=$dir_images?>photo4.jpg">
            <div class="iview-caption caption4" data-x="700" data-y="200" data-transition="expandLeft">
            <h1>With Creative<strong class="iview-strong"> Will Attract More </strong><br>Customers Attention on Your Products</h1><h2>Full Clean & Responsive</h2><a href="#" class="btn btn-small btn-dark-grey">Purchase Now</a>
            </div>
		</div>
	</div>
    
    </div><!--end slider-iview-->
      
    </section>
    <!-- end "mediaslider" --> 
    
  </div>
  <!-- end "wrapperslider"--> 
  
  <!--///////////////////// END wrapperslider/////////////////--> 
  
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
  
  
                 <!--////////////////////////////////// BEGINNING QUOVOLVER///////////////////////////////-->
                        
        <div id="quovolver-three" style="margin:-3.8% 0% 0%;text-align:center;"><!--beginning quovolver-->
		 <div style="margin-left:10%"><br/>
			<blockquote class="block-three">
				<script type="text/javascript">

				/***********************************************
				* Fading Scroller- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
				* This notice MUST stay intact for legal use
				* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
				***********************************************/

				var delay = 5000; //set delay between message change (in miliseconds)
				var maxsteps=30; // number of steps to take to change from start color to endcolor
				var stepdelay=40; // time in miliseconds of a single step
				//**Note: maxsteps*stepdelay will be total time in miliseconds of fading effect
				var startcolor= new Array(255,255,255); // start color (red, green, blue)
				var endcolor=new Array(0,0,0); // end color (red, green, blue)

				var fcontent=new Array();

				begintag=''; //set opening tag, such as font declarationsbegintag=''; //set opening tag, such as font declarations
				<?php $i=0;foreach($diamondWords as $diamondWord): ?>
				fcontent[<?php echo $i++; ?>]="<p style=\"font-size:120%;margin-left:10%\"><?php echo $diamondWord->desc_comment;?></p>";
				<?php endforeach; ?>
				closetag='';
		
			

				var fwidth='700px'; //set scroller width
				var fheight='60px'; //set scroller height

				var fadelinks=1;  //should links inside scroller content also fade like text? 0 for no, 1 for yes.

				///No need to edit below this line/////////////////


				var ie4=document.all&&!document.getElementById;
				var DOM2=document.getElementById;
				var faderdelay=0;
				var index=0;


				/*Rafael Raposo edited function*/
				//function to change content
				function changecontent(){
				  if (index>=fcontent.length)
				    index=0
				  if (DOM2){
				    document.getElementById("fscroller").style.color="rgb("+startcolor[0]+", "+startcolor[1]+", "+startcolor[2]+")"
				    document.getElementById("fscroller").innerHTML=begintag+fcontent[index]+closetag
				    if (fadelinks)
				      linkcolorchange(1);
				    colorfade(1, 15);
				  }
				  else if (ie4)
				    document.all.fscroller.innerHTML=begintag+fcontent[index]+closetag;
				  index++
				}

				// colorfade() partially by Marcio Galli for Netscape Communications.  ////////////
				// Modified by Dynamicdrive.com

				function linkcolorchange(step){
				  var obj=document.getElementById("fscroller").getElementsByTagName("A");
				  if (obj.length>0){
				    for (i=0;i<obj.length;i++)
				      obj[i].style.color=getstepcolor(step);
				  }
				}

				/*Rafael Raposo edited function*/
				var fadecounter;
				function colorfade(step) {
				  if(step<=maxsteps) {	
				    document.getElementById("fscroller").style.color=getstepcolor(step);
				    if (fadelinks)
				      linkcolorchange(step);
				    step++;
				    fadecounter=setTimeout("colorfade("+step+")",stepdelay);
				  }else{
				    clearTimeout(fadecounter);
				    document.getElementById("fscroller").style.color="rgb("+endcolor[0]+", "+endcolor[1]+", "+endcolor[2]+")";
				    setTimeout("changecontent()", delay);
					
				  }   
				}

				/*Rafael Raposo's new function*/
				function getstepcolor(step) {
				  var diff
				  var newcolor=new Array(3);
				  for(var i=0;i<3;i++) {
				    diff = (startcolor[i]-endcolor[i]);
				    if(diff > 0) {
				      newcolor[i] = startcolor[i]-(Math.round((diff/maxsteps))*step);
				    } else {
				      newcolor[i] = startcolor[i]+(Math.round((Math.abs(diff)/maxsteps))*step);
				    }
				  }
				  return ("rgb(" + newcolor[0] + ", " + newcolor[1] + ", " + newcolor[2] + ")");
				}

				if (ie4||DOM2)
				  document.write('<div id="fscroller" style="width:'+fwidth+';height:'+fheight+'"></div>');

				if (window.addEventListener)
				window.addEventListener("load", changecontent, false)
				else if (window.attachEvent)
				window.attachEvent("onload", changecontent)
				else if (document.getElementById)
				window.onload=changecontent

				</script>
				
				<div style="margin-top:-1%;"/>
			</blockquote>
		</div>
	</div><!-- end quovolver -->
                        
  <div class="decor-footer"></div>
                 <!--////////////////////////////////// END QUOVOLVER///////////////////////////////-->
                 
  <div id="contentWrapper"><!--beginning contentWrapper-->
    
    <!--///////////////////// beginning main-one /////////////////////////-->
    
    <section id="main-one">
      <div class="dept-left">
        <?php foreach($historys as $history): ?>
	<div class="dept-dept-one"> <i class="symbol"><img src="<?=$dir_images?>dial_32x32_green.png" alt=""></i>
		<h3><?php echo anchor("$controller/history","$history->name_content", array("class"=>"basic-link")); ?></h3>
		<p><?php echo (strlen($history->desc_content) > 100)?substr($history->desc_content, 0, 100)."...":$history->desc_content;?></p>
		<span class="more"><?php echo anchor("$controller/history","Read More"); ?></span>
	</div>
        <?php endforeach; ?>
        <?php foreach($visionAndMissions as $visionAndMission): ?>
	<div class="dept-dept-two"> <i class="symbol"><img src="<?=$dir_images?>dial_32x32_green.png" alt=""></i>
		<h3><?php echo anchor("$controller/visionAndMission","$visionAndMission->name_content", array("class"=>"basic-link")); ?></h3>
		<p><?php echo (strlen($visionAndMission->desc_content) > 100)?substr($visionAndMission->desc_content, 0, 100)."...":$visionAndMission->desc_content;?></p>
		<span class="more"><?php echo anchor("$controller/visionAndMission","Read More"); ?></span>
	</div>
        <?php endforeach; ?>
      </div>
      <div class="dept-right">
        <div class="dept-dept-three"> <i class="symbol"><img src="<?=$dir_images?>steering_wheel_32x32_green.png" alt=""></i>
          <h3><?php echo anchor("$controller/gallery","Gallery", array("class"=>"basic-link")); ?></h3>
          <p>Lihat gallery foto-foto narsis dan gokil guru serta murid sekolah SMPIT Nurul Fajar.</p>
          <span class="more"><?php echo anchor("$controller/gallery","Read More"); ?></span>
        </div>
        <div class="dept-dept-four"> <i class="symbol"><img src="<?=$dir_images?>move_alt2_32x32_green.png" alt=""></i>
          <h3><?php echo anchor("$controller/contact","Contact Us", array("class"=>"basic-link")); ?></h3>
          <p>Hubungi kami jika ingin mendaftar sekolah, ada keluhan dan informasi yang mungkin anda butuhkan dan lain-lain.</p>
          <span class="more"><?php echo anchor("$controller/contact","Read More"); ?></span>
        </div>
      </div>
    </section>
    
    <!--//////////////////// END main-one /////////////////-->
    
    
    
    <!--///////////////////// BEGINNING  AREA-INFO////////////////////-->
    
	<div  class="area-info"><!--beginning area-info-->

		<div class="area-info-left"><!--beginning area-info-left-->
			<h3 class="title-area-info-list"><span>Fasilitas</span></h3>
			<ul class="area-info-list">
				<?php foreach($facilitys as $facility):
					echo "<li>".anchor("$controller/facilitys/".$facility->id_content, $facility->name_content,array("class"=>"basic-link"))."</li>";
				endforeach;?>
			</ul>
		</div><!--end area-info-right-->
			
		<div class="area-info-right"><!--beginning-area-info-right-->
			<h3 class="title-area-info-list"><span>Prestasi</span></h3>
			<ul class="index-service">
				<?php foreach($achievements as $achievement):
					echo "<li>".anchor("$controller/facilitys/".$achievement->id_content, $achievement->name_content,array("class"=>"basic-link"))."</li>";
				endforeach;?>
			</ul>
		</div><!--end area-info-right-->
		
	</div><!--end area-info-->
                        <div style="clear:both;"></div>
    <!--///////////////////// END  AREA-INFO////////////////////-->
    
    
    <!--========================== BEGINNING  WRAP-MYCAROUSEL content-slide-pro ==========================-->
    
    <div class="content-slide-pro"><!--content-slide-pro-->
    
    <h3 class="title-three"><span>Informasi Sekolah</span></h3>



    
<div class="content-slide-pro-left"><!--BEGINNING CONTENT-SLIDE-PRO-LEFT-->
	<br />
	<span class="title-index-bottom" style="margin:10% 0% -10% 13%"><?php echo anchor("$controller/notifications", "Pengumuman", array("class"=>"basic-link")) ?></span>
	<div style="margin-bottom:-5%"></div>
	<ul id="mycarousel-single-one" class="jcarousel-skin-tango-single-one"><!--beginning jcarousel-skin-tango-single-one-->
		<?php foreach($notifications as $notification): ?>
		<li>
			<a href="<?=$dir_uploads.$notification->picture_content ?>" rel="prettyPhotoOne[gallery]"><span class="roll-jcarousel-one" ></span><img src="<?=$dir_uploads.$notification->picture_content ?>" style="width:220px;height:142px;" alt=""></a>
			<div class="text-one">
				<div class="icon-blog">
					<?php echo anchor("$controller/notifications/$notification->id_content", $notification->name_content, array("class"=>"icon-title")); ?>
					<span class="date-post"><?php echo anchor("$controller/notifications/$notification->id_content", $this->method->dateFromDatabaseText($notification->cd_content)); ?></span>
					<span class="comment-post-post"><?php $count_comments = $this->mdl_comment->count_id_content_records($notification->id_content); echo anchor("$controller/notifications/$notification->id_content", ($count_comments == 1)?$count_comments . " Comment":$count_comments . " Comments"); ?></span>
				</div>
				<p><?php echo (strlen($notification->desc_content) > 100)?substr(strip_tags($notification->desc_content), 0, 100)."....":strip_tags($notification->desc_content);?></p>
			</div>
		</li>
		<?php endforeach; ?>
	</ul><!--end jcarousel-skin-tango-single-one-->

	<div class="title-index-bottom" style="margin-top:2%;text-align:center">
		<?php echo anchor("$controller/newses", "Berita Sekolah", array("class"=>"basic-link")) ?>
	</div>
	<div style="margin-bottom:-10%"></div>
	<ul id="mycarousel-single-two" class="jcarousel-skin-tango-single-two"><!--beginning jcarousel-skin-tango-single-one-->
		<?php foreach($newses as $news): ?>
		<li>
			<?php echo anchor("$controller/newses/".$news->id_content, '<span class="roll-jcarousel-two" style="cursor:pointer"></span><img src="'.$dir_uploads.$news->picture_content.'" style="width:220px;height:142px;" alt="">'); ?>
			<div class="text-one">
				<div class="icon-blog">
					<?php echo anchor("$controller/newses/$news->id_content", $news->name_content, array("class"=>"icon-title")); ?>
					<span class="date-post"><?php echo anchor("$controller/newses/$news->id_content", $this->method->dateFromDatabaseText($news->cd_content)); ?></span>
					<span class="comment-post-post"><?php $count_comments = $this->mdl_comment->count_id_content_records($news->id_content); echo anchor("$controller/newses/$news->id_content", ($count_comments == 1)?$count_comments . " Comment":$count_comments . " Comments"); ?></span>
				</div>
				<p><?php echo (strlen($news->desc_content) > 100)?substr(strip_tags($news->desc_content), 0, 100)."....":strip_tags($news->desc_content);?></p>
			</div>
		</li>
		<?php endforeach; ?>
	</ul><!--end jcarousel-skin-tango-single-one-->
</div>
<!--END CONTENT-SLIDE-PRO-LEFT-->

<div class="content-slide-pro-right"><!--BEGINNING CONTENT-SLIDE-PRO-RIGHT-->
	<br />
	<span class="title-index-bottom" style="margin:10% 0% -10% 20%">
		<?php echo anchor("$controller/events", "Kegiatan", array("class"=>"basic-link")) ?>
	</span>
	<div style="margin-bottom:-5%"></div>
	<ul id="mycarousel-single-three" class="jcarousel-skin-tango-single-three"><!--beginning jcarousel-skin-tango-single-three-->
		<?php foreach($events as $event): ?>
		<li>
			<?php echo anchor("$controller/events/".$event->id_content, '<span class="roll-jcarousel-two" style="cursor:pointer"></span><img src="'.$dir_uploads.$event->picture_content.'" style="width:220px;height:142px;" alt="">'); ?>
			<div class="text-one">
				<div class="icon-blog">
					<?php echo anchor("$controller/events/$event->id_content", $event->name_content, array("class"=>"icon-title")); ?>
					<span class="date-post"><?php echo anchor("$controller/events/$event->id_content", $this->method->dateFromDatabaseText($event->cd_content)); ?></span>
					<span class="comment-post-post"><a href="#"><?php $count_comments = $this->mdl_comment->count_id_content_records($event->id_content); echo anchor("$controller/events/$event->id_content", ($count_comments == 1)?$count_comments . " Comment":$count_comments . " Comments"); ?></a></span>
				</div>
				<p><?php echo (strlen($event->desc_content) > 100)?substr(strip_tags($event->desc_content), 0, 100)."....":strip_tags($event->desc_content);?></p>
			</div>
		</li>
		<?php endforeach; ?>
	</ul><!--end jcarousel-skin-tango-single-three-->


	<div style="margin-top:1.7%;margin-bottom:1%;"></div>
	<div class="title-index-bottom" style="margin-left:72%">
		<?php echo anchor("$controller/articles", "Artikel", array("class"=>"basic-link")) ?>
	</div>
	<div style="margin-bottom:-10%"></div>
	<ul id="mycarousel-single" class="jcarousel-skin-tango-single"><!--beginning jcarousel-skin-tango-single-->
		<?php foreach($articles as $article): ?>
		<li>
			<?php echo anchor("$controller/articles/".$article->id_content, '<span class="roll-jcarousel-two" style="cursor:pointer"></span><img src="'.$dir_uploads.$article->picture_content.'" style="width:220px;height:142px;" alt="">'); ?>
			<div class="text-one">
				<div class="icon-blog">
					<?php echo anchor("$controller/articles/$article->id_content", $article->name_content, array("class"=>"icon-title")); ?>
					<span class="date-post"><?php echo anchor("$controller/articles/$article->id_content", $this->method->dateFromDatabaseText($article->cd_content)); ?></span>
					<span class="comment-post-post"><a href="#"><?php $count_comments = $this->mdl_comment->count_id_content_records($article->id_content); echo anchor("$controller/articles/$article->id_content", ($count_comments == 1)?$count_comments . " Comment":$count_comments . " Comments"); ?></a></span>
				</div>
				<p><?php echo (strlen($article->desc_content) > 100)?substr(strip_tags($article->desc_content), 0, 100)."....":strip_tags($article->desc_content);?></p>
			</div>
		</li>
		<?php endforeach; ?>
	</ul><!--end jcarousel-skin-tango-single-->

</div><!--END CONTENT-SLIDE-PRO-RIGHT-->




</div><!--end content-slide-pro-->
	
    	<!--=============================== END  WRAP-MYCAROUSEL content-slide-pro ==============================-->
    
  </div>
  <!--end contentWrapper--> 