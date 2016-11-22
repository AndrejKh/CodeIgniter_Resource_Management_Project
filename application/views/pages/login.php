<?php echo validation_errors(); ?>

<!-- FIND THE title VARIABLE BELOW -->
<?php 
	if(isset($retry)) { 
		if($retry == true ){echo "<h2 style= 'color: red'>Incorrect Username or Password entered, please try again</h2>";} 
	}?>
<?php if(isset($created)){ echo '<h2>'.$created.'</h2>'; } ?>

	 <div class="container">
    <div id="shadow">
      <div class="jumbotron">
        <div id="subTitle" <h3>PlanWise ID </h3>
        </div>
        <h5>Sign into your PlanWise account</h5>
		<?php echo form_open('login'); ?>
          <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username">
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
      </div>
    </div>
  </div>
