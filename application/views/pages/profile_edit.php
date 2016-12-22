<?php echo validation_errors(); ?>

<!-- FIND THE title VARIABLE BELOW -->

<!-- <?php  echo $title ?> -->
<?php echo form_open('profile'); ?>

	<fieldset>
	<!-- Form Name -->


	<legend>Edit Account Details<legend>

	<label class="col-md-7 control-label">Please fill in the details below(* denotes a required field)</label> <br/><br/>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="fname">First Name: </label>  
	  <div class="col-md-5">
	  <input id="fname" name="fname" type="text" placeholder="Joe" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info['profile']->firstname; }   ?>  > 
	  <span class="help-block">Enter your first name above</span>  
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="sname">Second Name: </label>  
	  <div class="col-md-5">
	  <input id="sname" name="sname" type="text" placeholder="Bloggs" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info['profile']->lastname; }   ?> >
	  <span class="help-block">Enter your second name above</span>  
	  </div>
	</div>
	
	<!-- Date of birth input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="dob">Date Of Birth: </label>  
	  <div class="col-md-5">
	  <input id="dob" name="dob" type="date" min="1917-09-09" max="2017-09-09" placeholder="dd/mm/yyyy" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info['profile']->dob; }   ?> >
	  <span class="help-block">Enter your date of birth above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="country">Country: </label>  
	  <div class="col-md-5">
	  <input id="country" name="country" type="text" placeholder="Scotland..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info['address']->country; }   ?> >
	  <span class="help-block">Enter residing country above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="city">City: </label>  
	  <div class="col-md-5">
	  <input id="city" name="city" type="text" placeholder="Edinburgh..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info['address']->city; }   ?> >
	  <span class="help-block">Enter residing city above</span>  
	  </div>
	</div>
	
		<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="postcode">Postcode: </label>  
	  <div class="col-md-5">
	  <input id="postcode" name="postcode" type="text" pattern ="[A-Za-z]{1,2}[0-9Rr][0-9A-Za-z]? [0-9][ABD-HJLNP-UW-Zabd-hjlnp-uw-z]{2}"  placeholder="EH11 ABC..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value='".$info['address']->postcode."'"; }   ?>  >
	  <span class="help-block">Enter postcode above</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="streetName">Street Name: </label>  
	  <div class="col-md-5">
	  <input id="streetName" name="streetName" type="text" placeholder="Riccarton Avenue..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info['address']->streetName; }   ?>>
	  <span class="help-block">Enter street name</span>  
	  </div>
	</div>
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="buildingNumber">Building Number: </label>  
	  <div class="col-md-5">
	  <input id="buildingNumber" name="buildingNumber" type="number" placeholder="Insert number..." class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info['address']->buldingNumber; }   ?> >
	  <span class="help-block">Enter building number</span>  
	  </div>
	</div>
	
	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="religion">Religion</label>  
	  <div class="col-md-5">
	  <input id="religion" name="religion" type="text" placeholder="" class="form-control input-md" <?php if(isset($info)) { 	echo "value=".$info['profile']->religion; }   ?> >
	  <span class="help-block">Enter your religion above</span>  
	  </div>
	</div>

	<!-- Multiple Checkboxes -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="locationFlex" >Location Flexibility</label>
	  <div class="col-md-4">
	  <div class="checkbox">
		<label for="locationFlex-0">
		
	<!-- RADIO BUTTONS BUGGY AF - FIXED -->			

		  <input type="radio" name="locationFlex" id="locationFlex" value="able" required=""> Able to relocate
		  <input type="radio" name="locationFlex" id="locationFlex" value ="inable" style="margin-left: 20px"> In-able to relocate
		</label>
		</div>
	  </div>
	</div>

	<!-- Button -->
	<div class="form-group">
	  <div class="col-md-9 control-label">
		<button id="submit" name="submit" type="submit" class="btn btn-primary btn-lg">Submit</button>
	  </div>
	</div>

	
	</fieldset>
	</form>
