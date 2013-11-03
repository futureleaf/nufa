 
  <!--/////////////////////////BEGINNING contentWrapper///////////////////-->
  
  <div id="contentWrapper"><!--beginning contentWrapper-->
    <h3 class="title-three-5"><span><?php echo $_title; ?></span></h3>
            
            
            <form action="" method="post" name="ajaxcontactform" id="ajaxcontactform" enctype="multipart/form-data">
                
                <div class="change-password">
                	<fieldset>
				<input type="file" style="background:none;border:none;width:40%" name="userfile" />
				<?php if($errorImage != null) echo "<span class=\"help-inline\"> " . $errorImage . " </span>"; ?>
			</fieldset>
                    
                	<fieldset>
                    	<input name="do" type="submit" id="submit" class="contactformbutton" value="Perbaharui" style="cursor:pointer;">
                    </fieldset>
                
                </div>
				
            </form>

</div>
