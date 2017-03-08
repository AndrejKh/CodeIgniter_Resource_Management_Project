<!DOCTYPE html>
<html lang="en">
<head>
  <title>Task Assignment</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/mystyle.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="jquery-3.1.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--
  <link rel='stylesheet' href='http://fullcalendar.io/js/fullcalendar-2.2.3/fullcalendar.css' />
-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

 <style type="text/css">
     
 
 .row{
    margin-top:40px;
    padding: 0 10px;
}

.clickable{
    cursor: pointer;   
}

.panel-heading span {
	margin-top: -20px;
	font-size: 15px;
}
 </style>
 
</head>
<!--
  <div class="buttons">
    <button type="button" onclick="location.href='http://google.com';" class="btn btn-info">
      <span class="glyphicon glyphicon-user"></span> Profile
    </button>
    <button type="button" onclick="location.href='https://preview.c9users.io/mvv1/stage2/calendar/fullcalendar-3.0.1/demos/agenda-views.html?_c9_id=livepreview1&_c9_host=https://ide.c9.io';" class="btn btn-info ">
      <span class="glyphicon glyphicon-calendar"></span> Calendar
    </button>
      </div>
<div class="page-header">
  <h4>Creating A project : Task Assignment </h4>
</div>
<body>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">PlanWise</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Home</a></li>
      <li><a href="#">My Account</a></li>
      <li class="active"><a href="#">Create Project</a></li>
      <li><a href="#">Company</a></li>
      <li><a href="#">Blog</a></li>
      <li><a href="#">Log Out</a></li>
    </ul>
  </nav>
  </div>
  
-->
  <div class="alert alert-info text-center" role="alert">
      <h3>Create Project tasks and assign roles to the tasks</h3>
  <strong>(Project must contain at least one task)</strong>
          <h4> <?php echo validation_errors(); ?> </h4>
</div>
    <?php echo form_open('create_tasks'); ?>

            <div class="row">
				<div class="col-lg-12 noPadding ">
					<div class="input-group " id="skillSelect">
						<div class="col-sm-5 ">
							<label>Task Title:</label>
							<input type="text" name='taskTitle' id='taskTitle'  placeholder='Task Title' class="form-control">
						</div>
						<div class="col-sm-2">
							<label>Start Date:</label>
							<input type='text' class="form-control" placeholder='Start date' name='startDate' id='datepicker' />
						</div>
							<div class="col-sm-2 ">
							<label>End Date:</label>
							<input type='text' class="form-control" placeholder='End date' name='endDate' id='datepicker2' />
						</div>
		  				 <div class="col-sm-2 ">
							<label>Number of Roles in task:</label>
							<input type="number" id="numOfPeople" value="1" min="1" class="form-control">
						</div>
						<div class=" input-group-btn noPadding">
							<button id="create_task" type="button" class="btn btn-default  ">Create Task</button>
						</div>
					</div>
				</div>
            </div>
            <br>
            <div class="">
                <div class = "panel panel-info">
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Tasks</h3>
                    </div>

                    <div class = "panel-body">
                        Please allocate a member of staff to every task role in the project.
                <!--            <input type="text" class="form-control" name="taskTitle">-->
                        <ul class="list-group well well-sm pre-scrollable tested" style="max-height: 800px; overflow-y:auto;"  id="projectTasks">
                        </ul>
                        <button id="delTask" type="button" class="btn btn-primary">Delete</button> 
                   </div>
                </div>
                
              
            </div>

            <br>
            <br>
            <br>

            <script>
				
			
			var taskNum =0;	
            $("#create_task").click(function() {
            var j = $("#numOfPeople").val();
            var i;
            
              $("#projectTasks").append('<li> <div id="taskcon" class="panel panel-primary"> '+
              '<div class="panel-heading" name="task['+ taskNum +']"> Task: '+ $("#taskTitle").val() +'   Start Date:'+ $("#datepicker").val() +'       End Date :'+ $("#datepicker2").val() +'       Number Of Roles : '+ $("#numOfPeople").val() +' <a data-toggle="collapse" href="#'+ $("#taskTitle").val() +'"  style="color: #C0C0C0;" >  Click to exand/collapse </a>     </div>'+
              '<div id="'+ $("#taskTitle").val() +'" class="panel-collapse collapse">'+
              '<div id="'+ $("#taskTitle").val() +'_roles" class="panel-body">	'+
              '<input name="task['+ taskNum +'][title]" type="text" value="'+ $("#taskTitle").val() +'" hidden > </input>'+
				'<input name="task['+ taskNum +'][startDate]" type="text" value="'+ $("#datepicker").val() +'"  hidden > </input>' +
              '<input name="task['+ taskNum +'][endDate]" type="text" value="'+ $("#datepicker2").val()+'" hidden > </input>' + 

              '<div class="" id="'+ $("#taskTitle").val() +'_table"> '+
							'<label class="text-center">Role Title</label>'+
							'<label class="text-center">Number of People</label>'+
              '</div id="roletable"></div></li>');
                     
              for (i = 0; i < j; i++)
              {
              $('#'+ $("#taskTitle").val() +'_table').append('<div class ="panel panel-danger" name="'+taskNum+'_'+ i +'" id="'+ $("#taskTitle").val() +''+ i +'"><div class="panel-heading role">Role '+ (i+1) +'</div>'+
                  '<div><input name="task['+ taskNum +'][role]['+ i +'][name]" type="text" placeholder="Role Title" class="form-control input-md"/> </div>'+
                  '<div><input name="task['+ taskNum +'][role]['+ i +'][numPeople]" placeholder="1" type="number" class="form-control input-md"/> </div>'+ 
                  '<div class="row">' +
					'<div class="col-lg-12 noPadding ">' +
					'<div class="input-group " id="skillSelect">' +
						'<div class="col-sm-5 ">'+
							'<label for="skillName" >Skill:</label>'+
							'<select class="form-control" id="skillName'+taskNum+'_'+ i +'">'+
								<?php foreach($skills['names'] as $skillName) { ?>
								'<option> <?php echo $skillName["skillName"]; ?> </option>'+
								<?php } ?>
							'</select>'+
						'</div>'+
						'<div class="col-sm-3 ">'+
							'<label for="skillLevel" >Level:</label>'+
							'<select class="form-control" id="skillLevel'+taskNum+'_'+ i +'">'+
								<?php foreach($skills['levels'] as $skillLevel) { ?>
								'<option> <?php echo($skillLevel['level']);?> </option>'+
								<?php } ?>
							'</select>'+
						'</div>'+
						'<div class=" input-group-btn noPadding">'+
							'<button id="addSkill" type="button" onclick="addskill('+taskNum+','+ i +')" class="btn btn-default  ">Add Skill</button>'+
						'</div>'+
					'</div>'+
				'</div>'+

            '</div>'+
            '<br>'+
            '<div class="">'+
                '<div class = "panel panel-info">'+
					'<div class = "panel-heading">'+
                        '<h3 id="titleSkills" class = "panel-title">Skills</h3>'+
                    '</div>'+

                   ' <div class = "panel-body">'+
                        'Please choose the skills required for the project, the level of proficiency needed for each skill and the number of people which will need to hold it.'+
                        '<label for="projectSkills">* Skills Required:</label>'+
                        '<ul class="list-group well well-sm pre-scrollable tested" style="max-height: 240px; overflow-y:auto;"  id="projectSkills'+taskNum+'_'+ i +'">'+
                        '</ul>'+
                        '<button id="delSkill" type="button" onclick="delskill('+taskNum+','+ i +')" class="btn btn-primary">Delete</button>'+
                   '</div>'+
               ' </div>'+
            '</div></tr>');
              }
              taskNum= taskNum + 1 ;
              });
              
			function addskill(x,y) {
				$("#projectSkills"+x+"_"+y).append(' <li id="pSkills'+x+'_'+y+'_'+$("#projectSkills"+x+"_"+y+" li").length+'" value="'+ $("#skillName"+x+"_"+y).val() +' " onClick="selectSkill('+x+','+y+','+$("#projectSkills"+x+"_"+y+" li").length+')" class="list-group-item skill ">' + $("#skillName"+x+"_"+y).val() + '<span class="label label-primary pull-right">' 
                    + ($("#skillLevel"+x+"_"+y+" option:selected").index() + 1 )+ '</span>' 
                    + '<input type="number" hidden name="task['+ x +'][role]['+ y +'][skill]['+$("#projectSkills"+x+"_"+y+" li").length+'][skillID]" value="'+ ( $("#skillName"+x+"_"+y+" option:selected").index() + 1 )+'"/> '
					+ '<input type="number" hidden name="task['+ x +'][role]['+ y +'][skill]['+$("#projectSkills"+x+"_"+y+" li").length+'][skillLevel]" value="'+ ( $("#skillLevel"+x+"_"+y+" option:selected").index() + 1 )+'"/> '
					+ '</li>');
			};

                    
              
              
              //$("#taskcon").append('<tr id="role'+ i +'"> <td>'+ i +'</td><td><input name="taskTitle" type="text" placeholder="Task Title" class="form-control input-md"/></td><td><input name="employeeName" type="text" placeholder="Employee Name" class="form-control input-md" /> </td></tr>'); }
              
              
             //<tbody><tr id="addr0"><td>1</td><td><input type="text" name="name0"  placeholder="Name" class="form-control"/></td><td><input type="text" class="form-control" placeholder="Start date" name="startDate0" id="datepicker" /></td><td><input type="text" class="form-control" placeholder="End date" name="endDate0" id="datepicker2" /></td><td><input type="number" id="rolesInTask" value="1" min="1" class="form-control"></td></tr></tbody> 
             
              
              
              // <li value="'+ $("#taskTitle").val() +'">' + $("#taskTitle").val() + '<span class="label label-primary pull-right">'     
                   
            // <input type="text" ='name0'  placeholder='Name' class="form-control"/></td><td>
			

          
                   
                
                  /// Notes  id and name for role,  the skill required and the number of people wilth thtat sikill and their proficiency,  along with the employee id and name perhaps
                
             function delskill(x,y) {
				 $("#projectSkills"+x+"_"+y+" .selected").remove();
			}
  
                
             $("#delTask").click(function() {
					$("#projectTasks .selected").remove();
                });
                
            function selectSkill(x,y,z)    {
				$("#projectSkills"+x+"_"+y+" .selected").css('background','#fff');
				$("#projectSkills"+x+"_"+y+" .selected").css('color','#000');
				$("#projectSkills"+x+"_"+y+" .selected").removeClass("selected");
				$("#pSkills"+x+"_"+y+"_"+z).addClass("selected");
				$("#pSkills"+x+"_"+y+"_"+z).css('background','#007');
				$("#pSkills"+x+"_"+y+"_"+z).css('color','#fff');
			}

			function selectRole(x,y)    {
							 $("#projectSkills"+x+" .selected").removeClass("selected");
							$("#pSkills"+x+"_"+y).addClass("selected");
							$("#pSkills"+x+"_"+y).css('background','#fff');
							$("#pSkills"+x+"_"+y).css('color','#000');

					//~ background: #007;
	//~ color:#fff;
			}
            //~ $("#delSkill").click(function() {
					//~ $("#projectSkills"+x+"_"+y+" .selected").remove();
                //~ });
            
			$("#projectSkills"+x+"_"+y).on("click",".skill",function(e) {
				$(this).parent().children().removeClass("selected");
				$(this).addClass("selected");
			});
                
  $( function()  {
      $( "#datepicker" ).datepicker();
    $( "#datepicker" ).datepicker( "option", "dateFormat", "dd/mm/yy");
  } );
  
  $( function() {
    $( "#datepicker2" ).datepicker();
    $( "#datepicker2" ).datepicker( "option", "dateFormat", "dd/mm/yy");
    
  } );
            </script>

        </div>
   		
    </div>
	<button type="submit" class="btn btn-success btn-lg">Go Forward</button>

    </form>

</body>
</html>
