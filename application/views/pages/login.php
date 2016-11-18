<?php echo validation_errors(); ?>

<!-- FIND THE title VARIABLE BELOW -->
<?php 
	if(isset($retry)) { 
		if($retry == true ){echo "<h2 style= 'color: red'>Incorrect Username or Password entered, please try again</h2>";} 
	}?>
<?php if(isset($created)){ echo '<h2>'.$created.'</h2>'; } ?>

<?php echo form_open('login'); ?>

	<fieldset>
	<!-- Form Name -->


	<!-- <legend>Login to system<legend> -->


	<label class="col-md-7 control-label">Please fill in the details below(* denotes a required field)</label> <br/><br/>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="username">Username: </label>  
	  <div class="col-md-5">
	  <input id="username" name="username" type="text" placeholder="cgm21111" class="form-control input-md" required="">
	  <span class="help-block">Enter your username above</span>  
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="password">Second Name: </label>  
	  <div class="col-md-5">
	  <input id="password" name="password" type="password" placeholder="********" class="form-control input-md" required="">
	  <span class="help-block">Enter your password above</span>  
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