<style>
.box-login {
  text-align:center;
  margin-top:10%;
  border:0px solid black;
  height:50%;
}
.box {
  border:1px solid black;
  width:20%;
  margin:auto;
  padding:3% 3% 1% 3%;
  border-radius:5px;
  box-shadow:0px 0px 10px #000;
}
.help-inline {
  text-align:center;
  margin-top:-3%;
  font-size:80%;
  color:color: rgb(255, 0, 0);
}
</style>


<div class="box-login">
  
	<div class="box">
		<form action="" method="post" name="ajaxcontactform" id="ajaxcontactform">

				<fieldset>
					<input name="email" type="text" id="name" class="text-login" placeholder="email" value="<?php echo (set_value('email'))?set_value('email'):""; ?>">
					<?php if(form_error('email') != null) echo "<div class=\"help-inline\"> " . form_error('email') . " </div>"; ?>
				</fieldset>
				<fieldset>
					<input name="password" type="password" id="name" class="text-login" placeholder="password" value="<?php echo (set_value('password'))?set_value('password'):""; ?>">
					<?php if(form_error('password') != null) echo "<div class=\"help-inline\"> " . form_error('password') . " </div>"; ?>
				</fieldset>
				<fieldset>
					<input name="do" type="submit" id="submit" class="button-login" value="LOGIN">
					<?php echo anchor("$controller/index", "<input type=\"button\" id=\"submit\" value=\"BACK\"/>", array("class"=>"button-login2"), array("id"=>"submit")); ?>
				</fieldset>
				
		</form>

		<span class="box-arrow"></span>
	</div>
</div>