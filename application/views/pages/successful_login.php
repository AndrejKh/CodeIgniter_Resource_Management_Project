<h3>------------- You have successfully logged into the system ----------------</h3>


<?php echo form_open('logout'); ?>

<?php 
	$username = $this->session->username;
	if($username){
		echo 'Welcome user: '.$username;
		}else {
			echo 'session DOES NOT exist!';
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