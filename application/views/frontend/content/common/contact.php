 
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
  
  <div id="contentWrapper"><!--beginning contentWrapper-->
    <h3 class="title-three-5"><span>Contact Us</span></h3>
  
    <!--/////////////////// BEGINNING MAPS/////////////////////// /////////////////-->
    
    <div class="maps">
      <figure class="google-maps">
        <iframe width="940" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=d&amp;source=s_d&amp;saddr=&amp;daddr=SMPIT+Nurul+Fajar+%40-6.5430890522844525,106.72700643539429&amp;hl=en&amp;geocode=FQ8pnP8dXoZcBg&amp;aq=1&amp;oq=cangkr&amp;sll=-6.543782,106.731813&amp;sspn=0.00534,0.010504&amp;mra=ls&amp;ie=UTF8&amp;t=m&amp;ll=-6.543793,106.731813&amp;spn=0.007461,0.00912&amp;z=16&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com/maps?f=d&amp;source=embed&amp;saddr=&amp;daddr=SMPIT+Nurul+Fajar+%40-6.5430890522844525,106.72700643539429&amp;hl=en&amp;geocode=FQ8pnP8dXoZcBg&amp;aq=1&amp;oq=cangkr&amp;sll=-6.543782,106.731813&amp;sspn=0.00534,0.010504&amp;mra=ls&amp;ie=UTF8&amp;t=m&amp;ll=-6.543793,106.731813&amp;spn=0.007461,0.00912&amp;z=16" style="color:#0000FF;text-align:left"></a></small>
      </figure>
    </div>
    
    <!--///////////////////// END MAPS/////////////////////////////////////////////-->
    
    <div class="content-send"><!--beginning content-send-->
      <div id="send-email"><!--beginning send-email-->
        <h3 class="title-three-4"><span>Send Us an Email</span></h3>
        <form method="post" action=""  id="contact-form" class="form">
                
	  <?php
		  if($this->session->userdata('is_login_front') == TRUE) {
			  echo "<input type=\"hidden\" name=\"author_comment\" value=\"" . $this->session->userdata('full_name_front') . "\"/>";
			  echo "<input type=\"hidden\" name=\"email_comment\" value=\"" . $this->session->userdata('email_front') . "\"/>";
			  echo "<input type=\"hidden\" name=\"id_user\" value=\"" . $this->session->userdata('id_user_front'). "\"/>";
		  }
		  else {
	  ?>
          <p class="author_comment">
            <label>Your name</label>
            <br>
            <input type="text" name="author_comment" id="name" required value="<?php echo (set_value('author_comment'))?set_value('author_comment'):""; ?>"/>
            <?php if(form_error('author_comment') != null) echo "<span class=\"error-contact\"> " . form_error('author_comment') . " </span>"; ?>
          </p>
          <p class="email">
            <label>Your email</label>
            <br>
            <input type="text" name="email_comment" id="name" required value="<?php echo (set_value('email_comment'))?set_value('email_comment'):""; ?>"/>
            <?php if(form_error('email_comment') != null) echo "<span class=\"error-contact\"> " . form_error('email_comment') . " </span>"; ?>
          </p>
	  <?php
		  }
	  ?>
          <p class="email">
            <label>Your phone</label>
            <br>
            <input type="text" name="phone_comment" id="name" required value="<?php echo (set_value('phone_comment'))?set_value('phone_comment'):""; ?>"/>
            <?php if(form_error('phone_comment') != null) echo "<span class=\"error-contact\"> " . form_error('phone_comment') . " </span>"; ?>
          </p>
          <p class="text">
            <label>Your message</label>
            <br>
            <textarea id="comments" name="desc_comment" cols="5" rows="5" class="contacttextarea"><?php echo (set_value('desc_comment'))?set_value('desc_comment'):""; ?></textarea><br/>
          </p>
          <p class="submit">
            <input type="submit" name="do" value="Submit" id="submit"/>
          </p>
          <div id="response"></div>
        </form>
      </div>
      <!--end send-email-->
      
                    
      <?php
	      foreach($our_contacts as $our_contact):
      ?>
      <div class="delivery">
        <div class="text-delivery">
          <h3 class="title-three-4"><span>Info Kami</span></h3>
          <p>Permintaan anda akan segera kami proses secepatnya guna meningkatkan kwalitas dan mutu dalam dunia pendidikan kepada sekolah <?=$_org?> ini.</p>
        </div>
        <div class="perloc-delivery">
          <div class="city"><img src="<?=$dir_images?>home_16x16_black.png" alt=""></div>
          <p><?php echo $our_contact->desc_comment; ?></p>
          <div class="phone"><img src="<?=$dir_images?>iphone_12x16_black.png" alt=""></div>
          <p><?php echo $our_contact->phone_comment; ?></p>
          <div class="mail"><img src="<?=$dir_images?>mail_16x12_black.png" alt=""></div>
          <p><?php echo $our_contact->email_comment; ?></p>
        </div>
      </div>
    </div>
    <?php
	    endforeach;
    ?>
    <!--end content-send-->