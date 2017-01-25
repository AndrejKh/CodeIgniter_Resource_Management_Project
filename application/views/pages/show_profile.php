
<!-- start of profile well-->

<section>
<div class="well well-sm">
<div class="container" style="margin-top: 30px;">
<div class="profile-head">
<div class="col-md- col-sm-4 col-xs-12">
<img src="http://www.newlifefamilychiropractic.net/wp-content/uploads/2014/07/300x300.gif" class="img-responsive" />
<h6><?php echo $info[0]['firstname']; echo " ".  $info[0]['lastname']; ?>  </h6>
</div><!--col-md-4 col-sm-4 col-xs-12 close-->



<div class="col-md-5 col-sm-5 col-xs-12">
<h5 id="h01"> <?php echo $info[0]['firstname']; echo " ".  $info[0]['lastname']; ?>  </h5>
<p id="p01"> Web Designer / Develpor </p>
<ul>
<li><span class="glyphicon glyphicon-briefcase"></span> 5 years</li>
<li><span class="glyphicon glyphicon-map-marker"></span> Italy</li>
<li><span class="glyphicon glyphicon-home"></span> 
<?php echo $info[0]['buldingNumber'];echo " ".  $info[0]['streetName'];echo " ".  $info[0]['postcode'];echo " ".  $info[0]['city'];echo " ".  $info[0]['country']; ?>

</li>
<li><span class="glyphicon glyphicon-phone"></span> <a href="#" title="call">(+021) 956 789123</a></li>
<li><span class="glyphicon glyphicon-envelope"></span><a href="#" title="mail"> <?php echo $info[0]['email'];?></a></li>

</ul>


</div><!--col-md-8 col-sm-8 col-xs-12 close-->


</div><!--profile-head close-->
</div>
</div>



<!--start timeline of projects-->

<section id="cd-timeline" class="cd-container">
		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="img/cd-icon-picture.svg" alt="Picture">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Title of section 1</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span class="cd-date">Jan 14</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-movie">
				<img src="img/cd-icon-movie.svg" alt="Movie">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Title of section 2</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde?</p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span class="cd-date">Jan 18</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-picture">
				<img src="img/cd-icon-picture.svg" alt="Picture">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Title of section 3</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, obcaecati, quisquam id molestias eaque asperiores voluptatibus cupiditate error assumenda delectus odit similique earum voluptatem doloremque dolorem ipsam quae rerum quis. Odit, itaque, deserunt corporis vero ipsum nisi eius odio natus ullam provident pariatur temporibus quia eos repellat consequuntur perferendis enim amet quae quasi repudiandae sed quod veniam dolore possimus rem voluptatum eveniet eligendi quis fugiat aliquam sunt similique aut adipisci.</p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span class="cd-date">Jan 24</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-location">
				<img src="img/cd-icon-location.svg" alt="Location">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Title of section 4</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span class="cd-date">Feb 14</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-location">
				<img src="img/cd-icon-location.svg" alt="Location">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Title of section 5</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum.</p>
				<a href="#0" class="cd-read-more">Read more</a>
				<span class="cd-date">Feb 18</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->

		<div class="cd-timeline-block">
			<div class="cd-timeline-img cd-movie">
				<img src="img/cd-icon-movie.svg" alt="Movie">
			</div> <!-- cd-timeline-img -->

			<div class="cd-timeline-content">
				<h2>Final Section</h2>
				<p>This is the content of the last section</p>
				<span class="cd-date">Feb 26</span>
			</div> <!-- cd-timeline-content -->
		</div> <!-- cd-timeline-block -->
	</section> <!-- cd-timeline -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->

<!--start of profile information-->

<div id="sticky" class="container">
    
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-menu" role="tablist">
      <li class="active">
          <a href="#profile" role="tab" data-toggle="tab">
              <i class="fa fa-male"></i> Profile
          </a>
      </li>
      <li><a href="#change" role="tab" data-toggle="tab">
          <i class="fa fa-key"></i> Edit Profile
          </a>
      </li>
    </ul><!--nav-tabs close-->
    
    <!-- Tab panes -->
    <div class="tab-content">
    <div class="tab-pane fade active in" id="profile">
    <div class="container">
<div class="col-sm-11" style="float:left;">
<div class="hve-pro">
<p>ITS A ME <?php echo $info[0]['firstname'];?></p>
</div><!--hve-pro close-->
</div><!--col-sm-12 close-->
<br clear="all" />
<div class="row">
<div class="col-md-12">
<h4 class="pro-title">Bio Graph</h4>
</div><!--col-md-12 close-->


<div class="col-md-6">

<div class="table-responsive responsiv-table">
  <table class="table bio-table">
      <tbody>
     <tr>      
        <td>Firstname</td>
        <td>: <?php echo $info[0]['firstname'];?></td> 
     </tr>
     <tr>    
        <td>Lastname</td>
        <td>: <?php echo $info[0]['lastname'];?></td>       
     </tr>
     <tr>    
        <td>Birthday</td>
        <td>: <?php echo $info[0]['dob'];?></td>       
    </tr>
    <tr>    
        <td>Contury</td>
        <td>: <?php echo $info[0]['country'];?></td>       
    </tr>
    <tr>
        <td>Occupation</td>
        <td>: Web Designer</td> 
     </tr>

    </tbody>
  </table>
  </div><!--table-responsive close-->
</div><!--col-md-6 close-->

<div class="col-md-6">

<div class="table-responsive responsiv-table">
  <table class="table bio-table">
      <tbody>
     <tr>  
        <td>Email Id</td>
        <td>: <?php echo $info[0]['email'];?></td> 
     </tr>
     <tr>    
        <td>Mobile</td>
        <td>: (+6283) 456 789</td>       
     </tr>
     <tr>    
        <td>Phone</td>
        <td>: (+021) 956 789123</td>       
    </tr>
    <tr>    
        <td>Experience</td>
        <td>: 5 years</td>       
    </tr>
    <tr>
        <td>Twiter</td>
        <td>#@jenifer123</td> 
     </tr>

    </tbody>
  </table>
  </div><!--table-responsive close-->
</div><!--col-md-6 close-->

</div><!--row close-->




</div><!--container close-->
</div><!--tab-pane close-->
      
      
<div class="tab-pane fade" id="change">
<div class="container fom-main">
<div class="row">
<div class="col-sm-12">
<h2 class="register">Edit Your Profile</h2>
</div><!--col-sm-12 close-->

</div><!--row close-->
<br />
<div class="row">

<form class="form-horizontal main_form text-left" action=" " method="post"  id="contact_form">
<fieldset>


<div class="form-group col-md-12">
  <label class="col-md-10 control-label">First Name</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input id="fname" name="fname" type="text" placeholder="Joe" class="form-control input-md" required="" <?php if(isset($info)) { 	echo "value=".$info['profile']->firstname; }   ?>  >
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group col-md-12">
  <label class="col-md-10 control-label" >Last Name</label> 
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <input name="last_name" placeholder="Last Name" class="form-control"  type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group col-md-12">
  <label class="col-md-10 control-label">E-Mail</label>  
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       
<div class="form-group col-md-12">
  <label class="col-md-10 control-label">Phone #</label>  
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
  <input name="phone" placeholder="(845)555-1212" class="form-control" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
      
 <div class="form-group col-md-12">
  <label class="col-md-10 control-label">Address</label>
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
            <textarea class="form-control" name="comment" placeholder="Project Description"></textarea>
  </div>
  </div>
</div>

 <div class="form-group col-md-12">
  <label class="col-md-10 control-label">Project Description</label>
    <div class="col-md-12 inputGroupContainer">
    <div class="input-group">
        	<textarea class="form-control" name="comment" placeholder="Project Description"></textarea>
  </div>
  </div>
</div>



<div class="form-group col-md-12"> 
  <label class="col-md-10 control-label">Industry</label>
    <div class="col-md-12 selectContainer">
    <div class="input-group">
    <select name="state" class="form-control selectpicker" >
      <option value=" " >Industry</option>
      <option>Industry</option>
      <option>Industry</option>
      <option>Industry</option>
    </select>
  </div>
</div>
</div>


<!-- Select Basic -->
   
<div class="form-group col-md-12"> 
  <label class="col-md-10 control-label">Qualification</label>
    <div class="col-md-12 selectContainer">
    <div class="input-group">
    <select name="state" class="form-control selectpicker" >
           <option value=" " >your Qualification</option>
      <option>M.A.</option>
      <option>B.A.</option>
      <option >B.Ed</option>
    </select>
  </div>
</div>
</div>



<div class="form-group col-md-12"> 
  <label class="col-md-10 control-label">Expertise areas</label>
    <div class="col-md-12 selectContainer">
    <div class="input-group">
    <select name="state" class="form-control selectpicker" >
      <option value=" " >Expertise areas</option>
      <option>Expertise areas1</option>
      <option>Expertise areas1</option>
      <option>Expertise areas1</option>
    </select>
  </div>
</div>
</div>

<div class="form-group col-md-12"> 
  <label class="col-md-10 control-label">Experience</label>
    <div class="col-md-12 selectContainer">
    <div class="input-group">
    <select name="state" class="form-control selectpicker" >
      <option value=" " >your Experience</option>
      <option>1 year</option>
      <option>2 years</option>
      <option >3 years</option>
    </select>
  </div>
</div>
</div>

<div class="form-group col-md-12"> 
  <label class="col-md-10 control-label">Salary expected</label>
    <div class="col-md-12 selectContainer">
    <div class="input-group">
    <select name="state" class="form-control selectpicker" >
      <option value=" " >your Salary expectation</option>
      <option>50 thousand</option>
      <option>30 thousand</option>
    </select>
  </div>
</div>
</div>

<div class="form-group col-md-12"> 
  <label class="col-md-10 control-label">Preferred Location</label>
    <div class="col-md-12 selectContainer">
    <div class="input-group">
    <select name="state" class="form-control selectpicker" >
      <option value=" " >your Preferred Location</option>
      <option>Chandigarh</option>
      <option>Chandigarh</option>
    </select>
  </div>
</div>
</div>

<div class="form-group col-md-12">
  <label class="col-md-10 control-label">Choose Password</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="first_name" placeholder="Choose Password" class="form-control"  type="password">
    </div>
  </div>
</div>



<div class="form-group col-md-12">
  <label class="col-md-10 control-label">Confiram Password</label>  
  <div class="col-md-12 inputGroupContainer">
  <div class="input-group">
  <input  name="first_name" placeholder="Confiram Password" class="form-control"  type="password">
    </div>
  </div>
</div>


<!-- radio checks -->
 <div class="form-group col-md-12">
                        <label class="col-md-10 control-label">Gender</label>
                        <div class="col-md-6">
                            <div class="radio col-md-2">
                                <label>
                                    <input type="radio" name="hosting" value="yes" /> Male
                                </label>
                            </div>
                            <div class="radio col-md-2">
                                <label>
                                    <input type="radio" name="hosting" value="no" /> Female
                                </label>
                            </div>
                        </div>
                    </div>

<!-- upload profile picture -->
<div class="col-md-12 text-left">
<div class="uplod-picture">
<span class="btn btn-default uplod-file">
    Upload Photo <input type="file" />
</span>
</div><!--uplod-picture close-->
</div><!--col-md-12 close-->
<!-- Button -->
<div class="form-group col-md-10">
  <div class="col-md-6">
    <button type="submit" class="btn submit-button" >Save</button>
    <button type="submit" class="btn submit-button" >Cancel</button>

  </div>
</div>
</fieldset>
</form>
</div><!--row close-->
</div><!--container close -->          
</div><!--tab-pane close-->
</div><!--tab-content close-->
</div><!--container close-->

</section>

  </div>
</body>
