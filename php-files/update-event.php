<?php

session_start();
if($_SESSION['role']=='user' or $_SESSION['role']=='admin'){
	
require_once  'db.php';

$conn = new mysqli($hn, $un, $pw, $db);

if($conn->connect_error) die($conn->connect_error);

$eventId = $_GET['eventId'];

$query = "Select * from events where event_id = '".$eventId."' order by event_name ASC"; 

$result = $conn->query($query); 

if(!$result) die($conn->error); 

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$id=$row["event_id"];
	$event_name=$row["event_name"];
	$location=$row["location"];
	$teams=$row["teams"] ;
	$email = $row["email"] ;
	$event_date=$row["event_date"];
	$ticket_price=$row["ticket_price"];
	$event_image=$row["event_image"];
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../css-files/team-update.css">
<link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
<nav>
    <div class="brand">
      <h3><a href="home.php" style="text-decoration:none; color:white">U Athletics</a></h3>
    </div>
    <div class="navigation">
      <ul class="menu">
		<!-- <li><a href="profile.php">My Profile</a></li> -->
    	<li><a href="home.php">Home</a></li>
		<li><a href="teams.php">Teams</a></li>
		<li><a href="events.php">Events</a></li>
    	<li><a href="logout.php">Logout</a></li> 
      </ul>
    </div>
  </nav>
<div class="update-form">
	<form  method="POST" action="update-event.php?eventId=<?php echo $eventId ?>">
		<h1 style="text-align:center">Update Event</h1>
		<div class="content">
		  <div class="input-field">
			Event Name: <input type="name" name="event_name" value="<?php echo "$event_name "; ?>" autocomplete="nope">
		  </div>
		  <div class="input-field">
			Location: <input type="name" name="location" value="<?php echo "$location "; ?>" autocomplete="nope">
		  </div>
		  <div class="input-field">
			Teams playing: <input type="name" name="teams" value="<?php echo "$teams "; ?>" autocomplete="nope">
		  </div>
		  <div class="input-field">
			Email id: <input type="name" name="email" value="<?php echo "$email "; ?>" autocomplete="nope">
		  </div>
		  <div class="input-field">
			Event date: <input type="name" name="event_date" value="<?php echo "$event_date "; ?>" autocomplete="nope">
		  </div>
		  <div class="input-field">
			Ticket Price: <input type="name" name="ticket_price" value="<?php echo "$ticket_price "; ?>" autocomplete="nope">
		  </div>		  
		</div>
		<div class="action">
			<input type='hidden' name='update' value='yes'>
			<input type='hidden' name='eventId' value='$eventId'>
			<button style="text-align:center">Submit</a></button>
		</div>
	</form>
</div>
</body>
</html>

<?php
}
if(isset($_POST['update'])) {
	$event_name=$_POST["event_name"];
	$location=$_POST["location"];
	$teams=$_POST["teams"] ;
	$email = $_POST["email"] ;
	$event_date=$_POST["event_date"];
	$ticket_price=$_POST["ticket_price"];
	
	$updateQuery = "update events set event_name='$event_name', location = '$location', teams='$teams', email='$email', event_date='$event_date', ticket_price='$ticket_price'  where event_id = '$id'";

	if ($conn->query($updateQuery) === TRUE) {
		
		header("Location: event-details.php?eventId=$eventId");
	} else {
		echo "Error: ".$updateQuery."<br>".$conn->error;
	}
}
	
mysqli_close($conn);
}else{
echo 'Un-Authorized';
}
?>
