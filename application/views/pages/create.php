<?php echo validation_errors(); ?>

<?php echo form_open('create'); ?>

	<fieldset>
	<!-- Form Name -->


	<legend>Register Account<legend>


	<label class="col-md-7 control-label">Please fill in the details below(* denotes a required field)</label> <br/><br/>


	


	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="username">username</label>  
	  <div class="col-md-5">
	  <input id="username" name="username" type="text" minlength = "8" placeholder="jbloggs21" class="form-control input-md" required="">
	  <span class="help-block">Enter your username for your account using only letters and numbers</span>  
	  </div>
	</div>

	<!-- Password input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="passwordin">password</label>
	  <div class="col-md-4">
		<input id="password" name="password" type="password" minlength = "8" placeholder="" class="form-control input-md" required="">
		<span class="help-block">Minimum 8 characters, and 1 capital letter</span>
	  </div>
	</div>
	


	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="emailAddress">emailAddress</label>  
	  <div class="col-md-5">
	  <input id="emailAddress" name="emailAddress" type="email" placeholder="joebloggs@imaginary.com" class="form-control input-md" required="">
	  <span class="help-block">Please enter a valid email address</span>  
	  </div>
	</div>
	

	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-9 control-label">
		<button id="submit" name="submit" type="submit" class="btn btn-primary btn-lg">Register</button>
	  </div>
	</div>

	
	</fieldset>
	</form>
