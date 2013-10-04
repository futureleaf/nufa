<!--beginning "pageWrapper"--> 
<div class="pageWrapper">

  <!--///////////////////// BEGINNING wrapperslider/////////////////-->
  
  <!--beginning "wrapperslider"-->
  <div class="wrapperslider">
  
    <!--beginning "mediaslider"-->
    <section id="mediaslider">
      
      <div class="container-iview"><!--beginning slider iview-->
		<div id="iview">
			<?php foreach($pictures as $picture) { ?>
			<div data-iview:image="<?php echo $dir_uploads; ?>/<?php echo $picture->name_picture; ?>">
				<div class="iview-caption caption1" data-x="200" data-y="100" data-transition="expandDown"></div>
			</div>
			<?php } ?>
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
			<blockquote style='width:80%' class="block-three">
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
				fcontent[<?php echo $i++; ?>]="<p style=\"line-height:24px;font-size:120%;margin-left:0%\"><?php echo $diamondWord->desc_comment;?></p>";
				<?php endforeach; ?>
				closetag='';
		
			

				var fwidth='80%'; //set scroller width
				var fheight='auto'; //set scroller height

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
				  document.write('<div id="fscroller" style="min-height:60px;width:'+fwidth+';height:'+fheight+'"></div>');

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
		<p><?php echo (strlen(strip_tags($history->desc_content)) > 100)?substr(strip_tags($history->desc_content), 0, 100)."...":strip_tags($history->desc_content);?></p>
		<span class="more"><?php echo anchor("$controller/history","Read More"); ?></span>
	</div>
        <?php endforeach; ?>
        <?php foreach($visionAndMissions as $visionAndMission): ?>
	<div class="dept-dept-two"> <i class="symbol"><img src="<?=$dir_images?>dial_32x32_green.png" alt=""></i>
		<h3><?php echo anchor("$controller/visionAndMission","$visionAndMission->name_content", array("class"=>"basic-link")); ?></h3>
		<p><?php echo (strlen(strip_tags($visionAndMission->desc_content)) > 100)?substr(strip_tags($visionAndMission->desc_content), 0, 100)."...":strip_tags($visionAndMission->desc_content);?></p>
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
