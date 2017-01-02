<h3>------------- You have successfully logged into the system ----------------</h3>


<?php echo form_open('logout'); ?>

<?php 
	$username = $this->session->username;
	if($username){
		echo 'Welcome user: '.$username." with ID ". $this->session->accountID;
		}else {
			//redirect('login');
			}
?>

	<fieldset>
	<!-- Form Name -->


	<legend>LOGGED IN<legend>

<!-- Button -->
	<div class="form-group">
	  <div class="col-md-9 control-label">
		<button id="submit" name="submit" type="submit" class="btn btn-primary btn-lg">Logout</button>
	  </div>
	</div>
	
	
	</fieldset>
	</form>
	
	
<?php echo form_open('profile'); ?>


	<fieldset>
	<!-- Form Name -->

<legend> EDIT PROFILE</legend>

<!-- Button -->
	<div class="form-group">
	  <div class="col-md-9 control-label">
		<button id="submit" name="submit" type="submit" class="btn btn-primary btn-lg">Edit Profile</button>
	  </div>
	</div>
	
	
	</fieldset>
	</form>
