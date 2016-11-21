<!DOCTYPE html>
<html>
        <head>
				<!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

				<!-- jQuery library -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

				<!-- Latest compiled JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <meta name="viewport" content="width=device-width, initial-scale=1">
				<meta charset="utf-8"> 

				<title>CodeIgniter Tutorial</title>
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
        
        <body onload="if(<?php echo $this->session->logged_in ?>){DisplaySessionTimeout();}">
                <h1><?php echo $title; echo "exp time:".$this->config->item("sess_expiration"); ?></h1>
                <div id="timeDiv" style="display:none; "  >
                	<label id="SessionTimeLb" style="float:left;">SessionTime: </label>
                	<p id="time" ></p>
                </div>
                
                
             