 
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
  
  <div id="contentWrapper"><!--beginning contentWrapper-->
    <h3 class="title-three-5"><span><?php echo $_title; ?></span></h3>
            
	      <center>
		<form action="" method="post" name="ajaxcontactform" id="ajaxcontactform">
		    
		    <div class="change-password">
					    <?php
						    foreach($student_record as $student):
					    ?>
					    <input type="hidden" name="current_password" value="<?php echo $this->encrypt->decode($student->password); ?>" />
					    <?php
						    endforeach;
					    ?>
			    <fieldset>
			    <input name="old_password" id="name" type="password" placeholder="Kata Sandi Lama" class="contacttextform" value="<?php echo (set_value('old_password'))?set_value('old_password'):""; ?>">
			    <?php if(form_error('old_password') != null) echo "<span class=\"error-contact\"> " . form_error('old_password') . " </span>"; ?>
					    </fieldset>
				    
			    <fieldset>
			    <input name="password" id="name" type="password" placeholder="Kata Sandi Baru" class="contacttextform" value="<?php echo (set_value('password'))?set_value('password'):""; ?>">
			    <?php if(form_error('password') != null) echo "<span class=\"error-contact\"> " . form_error('password') . " </span>"; ?>
					    </fieldset>
				    
			    <fieldset>
			    <input name="repeat_password" id="name" type="password" placeholder="Ulangi Kata Sandi" class="contacttextform" value="<?php echo (set_value('repeat_password'))?set_value('repeat_password'):""; ?>">
			    <?php if(form_error('repeat_password') != null) echo "<span class=\"error-contact\"> " . form_error('repeat_password') . " </span>"; ?>
					    </fieldset>
			
			    <fieldset>
			    <input name="do" type="submit" id="submit" class="contactformbutton" value="Perbaharui" style="cursor:pointer;">
			</fieldset>
		    
		    </div>
				    
		</form>
	      </center>
            
</div>
