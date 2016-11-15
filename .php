<html>

<head>
    <title>Inserted Account</title>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="test.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>

<body>
    <a href="http://www2.macs.hw.ac.uk/~ac2/HomeNews.php">Homepage</a>
    <?php echo '<p>Hello World</p>';

 // Report all PHP errors
error_reporting(E_ALL);
ini_set('error_reporting', version_compare(PHP_VERSION,5,'>=') && version_compare(PHP_VERSION,6,'<') ?E_ALL^E_STRICT:E_ALL);
include("file_with_errors.php");

$servername = "mysql-server-1.macs.hw.ac.uk";
$username = "gg3";
$password = "abcgg3354";
$dbname = "gg3";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "<br><p>Connected successfully</p>";

//inserting new data mysql query
//INSERT INTO `gg3`.`testTable` (`Name`, `URL`, `TwitterDescription`, `Logo`) VALUES ('Santi', 'amazingweb.com', 'this is a twitter lab task', 'wow.jpeg')
/*
if(isset($_POST['fname']) && isset($_POST['url']
	 $_POST['desc']) && isset($_POST['logo'])) {
	//echo "<h2> $full_name $url $description $logo </h2>";
} else {
	echo "<h2>Provide the first_name and _last_name fields</h2>";
}*/
	$full_name = htmlspecialchars($_POST['fname']);
	$url = htmlspecialchars($_POST['url']);
	$description = htmlspecialchars($_POST['desc']);
	$logo = htmlspecialchars($_POST['logo']);
		echo "<h2> $full_name $url $description $logo </h2>";
//DELETE FROM `testTable` WHERE `Name` = "Grzegorz" AND `URL`="someguy.com" AND `TwitterDescription`="this is a twitter description" AND `Logo`="blob.jpeg"
$sql    = "SELECT * FROM testTable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {



    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "\n<div id = 'fields' class = 'w3-row w3-border'>\n";
		echo "	<div class= 'w3-container w3-quarter w3-blue-grey'>\n";
        echo "		<h2><u>Name</u></h2>\n";
        echo "		<p>".$row["Name"]."</p>\n";
        echo "	</div>\n";
        echo "	<div class= 'w3-container w3-quarter'>\n";
        echo "		<h2><u>URL</u></h2>\n";
        echo "		<p>".$row["URL"]."</p>\n";
        echo "	</div>\n";
        echo "	<div class= 'w3-container w3-quarter w3-blue-grey'>\n";
        echo "		<h2><u>Twitter Description</u></h2>\n";
        echo "		<p>".$row["TwitterDescription"]."</p>\n";
        echo "	</div>\n";
        echo "	<div class= 'w3-container w3-quarter'>\n";
        echo "		<h2><u>Logo</u></h2>\n";
        echo "		<p>".$row["Logo"]."</p>\n";
        echo "	</div>\n";
        echo "</div>\n";
        echo "<br>\n";

    }
} else {
    echo "<br>". "0 results";
}


?>

        <div id="productDisplay">
            <form action="http://www2.macs.hw.ac.uk/~gg3/InsertAccount.php" method="post">
                <div id="info">
                    <br/>
                    <input id="nameInput" name="fname" type="hidden" />
                    <input id="URLInput" type="hidden" name="url" />
                    <input id="descInput" name="desc" type="hidden" />
                    <input id="fileInput" name="logo" type="hidden" />
                    <input type="submit" value="Submit" style="float:left;" />
                </div>

            </form>
        </div>
		<div > 
			<input type="text" id=lab0 style="float:left">
			<br>
			<input type="URL" id=lab1 style="float:left"> 
			<br>
			<input type="text" id=lab2 style="float:left"> 
			<br>
			<input type="text" id=lab3 style="float:left"> 
		</div>
        
<script>

 $('#fields div').click(function() {
   var text = $(this).closest('#fields').find("p").text();
   //alert(text);
   //$('#lab').html(text);
   var inc = 0;
   $(this).closest('#fields').find("p").each(function(index) {
	var tname = 'lab'.concat(parseInt(inc));
	$("#"+tname).val($(this).text());
   inc = inc + 1;
	});
  });

</script>
</body>

</html>
