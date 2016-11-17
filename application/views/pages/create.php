<?php echo validation_errors(); ?>

<?php echo form_open('pages/create'); ?>

	<fieldset>
	<!-- Form Name -->

	<legend>Register Account TEST change ////// 11111111111</legend>


	<label class="col-md-7 control-label">Please fill in the details below(* denotes a required field)</label> <br/><br/>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="fname">first_name</label>  
	  <div class="col-md-5">
	  <input id="fname" name="fname" type="text" placeholder="Joe" class="form-control input-md" required="">
	  <span class="help-block">Enter your first name above</span>  
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="sname">second_name</label>  
	  <div class="col-md-5">
	  <input id="sname" name="sname" type="text" placeholder="Bloggs" class="form-control input-md" required="">
	  <span class="help-block">Enter your second name above</span>  
	  </div>
	</div>
	
	<!-- Date of birth input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="dob">Date Of Birth</label>  
	  <div class="col-md-5">
	  <input id="dob" name="dob" type="date" min="1917-09-09" max="2017-09-09" placeholder="dd/mm/yyyy" class="form-control input-md" required="">
	  <span class="help-block">Enter your date of birth above</span>  
	  </div>
	</div>

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
	
<!-- type input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="type">type</label>
	  <div class="col-md-4">
		<input id="type" name="type" type="number" minlength = "1" placeholder="enter number" class="form-control input-md" required="">
		<span class="help-block"></span>
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
	
	

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="religion">Religion</label>  
	  <div class="col-md-5">
	  <input id="religion" name="religion" type="text" placeholder="" class="form-control input-md" required ="">
	  <span class="help-block">Enter your religion above</span>  
	  </div>
	</div>

	<!-- Multiple Checkboxes -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="locationFlex">Location Flexibility</label>
	  <div class="col-md-4">
	  <div class="checkbox">
		<label for="locationFlex-0">
		  <input type="radio" name="locationFlex" id="locationFlex-0" value="0" required = ""> Able to relocate
		  <input type="radio" name="locationFlex" id="locationFlex-1" value ="1" style="margin-left: 20px" required =""> In-able to relocate
		</label>
		</div>
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
