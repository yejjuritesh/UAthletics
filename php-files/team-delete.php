<?php

//import credentials for db
require_once  'db.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['teamId']))
{
	$teamId = $_GET['teamId'];

	$query = "DELETE FROM team WHERE team_id='$teamId' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
?>

<?php

//Return to the teams page
header("Location: teams.php");
	
}
else {
  echo "Cannot delete the team";
}
mysqli_close($conn);
?>