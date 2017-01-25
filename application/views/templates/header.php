<!DOCTYPE html>
<html>
    <style>#datetimepicker5{z-index:1500 !important;}</style>

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>/css/mystyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
	<title><?php echo $title; ?></title>
	<script type="text/javascript">
		var sessionTimeout = <?php echo $this->config->item("sess_expiration"); ?> ; 
			
		function DisplaySessionTimeout()
		{
			//assigning minutes left to session timeout to Label
				$("#timeDiv").show();
			sessionTimeout = sessionTimeout - 1 ;
			//if session is not less than 0
			if (sessionTimeout >= 5){
				$("#time").text(sessionTimeout); //call the function again after 1 minute delay
					setTimeout(DisplaySessionTimeout,1000);
				}
			else
			{
				//show message box
				if(sessionTimeout == 4) {alert("Your current Session is nearly over.");}
				if(sessionTimeout == 0) {window.location.href = '<?php echo site_url()."/login" ?>';}
				$("#time").text(sessionTimeout); //call the function again after 1 minute delay
					setTimeout(DisplaySessionTimeout,1000);
			}
		}	
	</script>
</head> 
<body onload="if(<?php if (isset($this->session->logged_in) ) { echo $this->session->logged_in; } else  {echo 'false';} ?>){DisplaySessionTimeout();}">
	<div class="jumbotron text-center">
		<h1>PlanWise</h1>
	</div>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">PlanWise</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="view_profile">Home</a></li>
				<li><a href="http://askooner1996.wixsite.com/planwise">Company</a></li>
			</ul>
		</div>
	</nav>
	<div id="timeDiv" style="display:none; "  >
		<label id="SessionTimeLb" style="float:left;">SessionTime: </label>
		<p id="time" >1</p>
	</div>
	
                
             
