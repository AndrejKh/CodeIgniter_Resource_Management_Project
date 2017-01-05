

    <div class="alert alert-info text-center" role="alert">
        <h3>Please fill in the details below</h3>
        <strong>( * marks a required field)</strong>
        <h4> <?php echo validation_errors(); ?> </h4>
    </div>
    <?php echo form_open('create_project'); ?>
    <div class="createProject container-fluid">
        <div class="col-sm-4">

            <label for="projectTitle">* Project Name:</label>
            <input type="text" class="form-control" name="projectTitle">
            <br>
            <label for="projectEmail">* Project Email:</label>
            <input type="text" class="form-control" name="projectEmail">
            <br>
            <label for="projectType">Project Type:</label>
            <input type="text" class="form-control" name="projectType">
            <br>
            <div class='input-group date' id='datetimepicker5'>
                <label for="startDate">* Start Date:</label>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker5'>
                        <input type='date' class="form-control" name="startDate" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <label for="endDate">* End Date:</label>
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker5'>
                        <input type='text' class="form-control" name="endDate" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
            $(function () {
                $('#datetimepicker5').datetimepicker({
                    defaultDate: "11/1/2013",
                    disabledDates: [
                        moment("12/25/2013"),
                        new Date(2013, 11 - 1, 21),
                        "11/22/2013 00:53"
                    ]
                });
            });
        </script>
            <label for="projectLocation">* Loaction:</label>
            <div id="map" style="width:40%x;height:400px;background:White">
                <script src="https://maps.googleapis.com/maps/api/js?callback=myOptions"></script>
                <script>
                    var myOptions = {
                        zoom: 14,
                        center: new google.maps.LatLng(55.910213, -3.319792)
                    }

                    var geocoder = new google.maps.Geocoder;
                    var infowindow = new google.maps.InfoWindow;

                    var map = new google.maps.Map(document.getElementById("map"), myOptions);

                    var marker;

                    function placeMarker(location) {
                        geocoder = new google.maps.Geocoder();

                        if (marker) {
                            marker.setPosition(location);
                        } else {
                            marker = new google.maps.Marker({
                                position: location,
                                map: map
                            });
                        }

                        geocoder.geocode({
                            'location': location
                        }, function(results) {
                            if (results[1]) {
                                map.setZoom(15);
                                infowindow.setContent(results[1].formatted_address);
                                infowindow.open(map, marker);
                                var addresslocaion = results[1].formatted_address;
                                //Note  when extracting the location for database input use the variable "addresslocation"
                            }
                        });



                    }

                    google.maps.event.addListener(map, 'click', function(event) {
                        placeMarker(event.latLng)
                    });
                </script>



            </div>

        </div>

        <div class="col-sm-8">



            <label for="projectDesc">* Project Description:</label>
            <textarea class="form-control" rows="10" name="projectDesc"></textarea>
            <br>
            <label for="projectBudget">* Budget:</label>
            <input type="text" class="form-control" name="projectBudget">
            <br>
            <div class="form-inline">
                <div class="form-group" id="skillSelect">
                    <div class="form-group col-sm-6">
                        <label for="skillName" >Skill:</label>
                        <select class="form-control" id="skillName">
                            <?php foreach($skills['names'] as $skillName) { ?>
                            <option> <?php echo $skillName['skillName']; ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="skillLevel" >Level:</label>
                        <select class="form-control" id="skillLevel">
                            <?php foreach($skills['levels'] as $skillLevel) { ?>
                            <option> <?php echo($skillLevel['level']);?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-sm-2">
                        <button id="addSkill" type="button" class="btn btn-default btn-sm ">Add Skill</button>
                    </div>

                </div>
            </div>
            <br>
          
            <div class="">
                <div class = "panel panel-info">
                    <div class = "panel-heading">
                        <h3 class = "panel-title">Skills</h3>
                    </div>

                    <div class = "panel-body">
                        Please choose the skills required for the project and the level of proficiency needed for each skill.
                        <label for="projectSkills">* Skills Required:</label>
                <!--            <input type="text" class="form-control" name="projectSkills">-->
                        <ul class="list-group well well-sm pre-scrollable tested" style="max-height: 260px; overflow-y:auto;"  id="projectSkills">
                        </ul>
                        <button id="delSkill" type="button" class="btn btn-primary">Delete</button> 
                   </div>
                </div>
                
              
            </div>

            <br>
            <!--            TAKE SELECTED from below AND INSERT above-->

            <br>
            <br>

            <script>
                $("#addSkill").click(function() {
                    $("#projectSkills").append(' <li id="test" value="'+ $("#skillName").val() +'" class="list-group-item testing">' + $("#skillName").val() + '<input type="hidden"  name="skill[1]" value="'+ $("#skillName").text()+' "/><span class="badge">' + $("#skillLevel").val() + '</span></li>');
                });
                $("#delSkill").click(function() {
                    alert("hello");
                });
            
                $("#projectSkills").on("click",".testing",function(e) {
                    $(this).parent().children().removeClass("selected");
                    $(this).addClass("selected");
                    alert($(this) 
                            .clone()    //clone the element
                            .children() //select all the children
                            .remove()   //remove all the children
                            .end()  //again go back to selected element
                            .text() );

                });
            </script>

        </div>
        <div class="col-sm-2">
            <button type="button" class="btn btn-danger btn-lg">Go Back</button>

            <button type="submit" class="btn btn-success btn-lg">Go Forward</button>
        </div>
    </div>
    </form>
</body>

</html>