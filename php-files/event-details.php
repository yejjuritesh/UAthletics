<?php

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
    	<li><a href="login.php">Logout</a></li> 
      </ul>
    </div>
  </nav>
<div class="update-form">
	<form method='POST' action="update-event.php?eventId=<?php echo $id ?>">
		<h1 style="text-align:center">Event Details</h1>
		<div class="content">
			<table background="">
				<thead>
					<th><h3><?php echo "$event_name "; ?></h3></th>
				</thead>
				<tr>
					<td>Location:	</td> <td><?php echo "$location "; ?> </td>
				</tr>
				<tr>
					<td>Teams playing: </td> <td><?php echo "$teams";?> </td>
				</tr>
				<tr>
					<td>Email id: </td> <td><?php echo "$email "; ?> </td>
				</tr>
				<tr>
					<td>Event Date: </td> <td><?php echo "$event_date "; ?> </td>
				</tr>
				<tr>
					<td>Ticket Price: </td> <td><?php echo "$ticket_price "; ?></td>
				</tr>
			</table>
			<a href="event-delete.php?eventId=<?php echo $id ?> " style="color: #777; ">
				Delete event
			</a>
		</div>
		<div class="action">
		  <button style="text-align:center"><a href="update-event.php?eventId=<?php echo $id ?>" style="color: #777; text-decoration:none">Edit Event Details</a></button>
		</div>
	</form>
</div>
</body>
</html>
<?php
}
else {
  echo "0 results";}
mysqli_close($conn);
?>