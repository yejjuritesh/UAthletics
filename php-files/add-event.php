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
    	<li><a href="login.php">Logout</a></li> 
      </ul>
    </div>
  </nav>
<div class="update-form">
	<form method='POST' action='add-event.php'>
		<h1 style="text-align:center">Add Event</h1>
		<div class="content">
		  <div class="input-field">
			<input type="name" name="event_name" placeholder="Event Name" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" name="location" placeholder="Location" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name"  name="teams" placeholder="Teams playing" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" name="email" placeholder="Email id" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" name="event_date" placeholder="Event date" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" name="ticket_price" placeholder="Ticket Price" autocomplete="nope">
		  </div>		  
		</div>
		<div class="action">
		  <button style="text-align:center"><a href="add-event.php" style="color: #777; text-decoration:none">Submit</a></button>
		  
		</div>
	</form>
</div>
</body>
</html>


<?php
//import credentials for db
require_once  'loggedin.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//check if fields exist
if(isset($_POST['event_name']) && isset($_POST['location']) && isset($_POST['teams']) && isset($_POST['event_date']) && isset($_POST['ticket_price']))
{
	
	//Get data from POST object
	$event_name = $_POST['event_name'];
	$location = $_POST['location'];
	$teams = $_POST['teams'];
	$email = $_POST['email'];
	$event_date = $_POST['event_date'];
	$ticket_price = $_POST['ticket_price'];
	//$event_image = $_POST['event_image'];
	
	$query = "INSERT INTO events (event_name, location, teams, email, event_date, ticket_price) VALUES ('$event_name', '$location', '$teams', '$email', '$event_date', '$ticket_price')";
	
	echo $query.'<br>';
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: events.php");//this will return you to the view all page	
	
}



?>