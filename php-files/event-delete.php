<?php
session_start();
if($_SESSION['role']=='user' or $_SESSION['role']=='admin'){

//import credentials for db
require_once  'db.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['eventId']))
{
	$eventId = $_GET['eventId'];

	$query = "DELETE FROM events WHERE event_id='$eventId' ";
	
	//Run the query
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
?>

<?php

//Return to the events page
header("Location: events.php");
	
}
else {
  echo "Cannot delete the team";
}
mysqli_close($conn);
}else{
echo 'Un-Authorized';
}
?>
