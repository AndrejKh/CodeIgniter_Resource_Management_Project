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
			
        </head>
        
        <body onload="document.getElementById('time').innerHTML = ' <?php echo $this->session->sess_expiration   ?> ';">
                <h1><?php echo $title; echo "exp time:".$this->config->item("sess_expiration"); ?></h1>
                <label id="SessionTimeLb">SessionTime</label>
                <p id="time"></p>
                
             	<script type="text/javascript">

			        function DisplaySessionTimeout()
			        {
			            //assigning minutes left to session timeout to Label
			            document.getElementById("SessionTime").innerHTML = sessionTimeout;
			            sessionTimeout = sessionTimeout - 1;
			            
			            //if session is not less than 0
			            if (sessionTimeout >= 3)
			                //call the function again after 1 minute delay

			            else
			            {
			                //show message box
			                alert("Your current Session is nearly over.");
			            }
			        }	
			</script>