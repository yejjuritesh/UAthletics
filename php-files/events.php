<?php
session_start();
if($_SESSION['role']=='user' or $_SESSION['role']=='admin'){

require_once  'db.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="../css-files/teams.css">
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
  <button onclick="location.href='add-event.php'" style="padding:20px;margin-left:780px;margin-top:70px" >Add Event</button>
	<div class="center">
		<?php
		$query = "Select event_id, event_name from events order by event_id asc"; 

		$result = $conn->query($query); 

		if(!$result) die($conn->error); 

		if ($result->num_rows > 0) {

			while($row = $result->fetch_assoc())
			{
				$id=$row["event_id"];
				$eventName=$row["event_name"];
		?>
		<div class="container">
			  <p class="title"><?php echo "$eventName "; ?></p>
			  <div class="overlay"></div>
			  <div class="button"><a href="event-details.php?eventId=<?php echo $id ?>"> Click Here </a></div>
		</div>
				
		<?php
			}
		}
		else {
		  echo "0 results";}
		mysqli_close($conn);
		?>
	</div>
</body>
</html>
<?php
}else{
echo 'Un-Authorized';
}
?>
