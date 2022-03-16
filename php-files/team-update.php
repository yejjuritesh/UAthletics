<?php

require_once  'db.php';

$conn = new mysqli($hn, $un, $pw, $db);

if($conn->connect_error) die($conn->connect_error);

$teamId = $_GET['teamId'];

$query = "Select * from team join sport on team.sport_id = sport.sport_id where team_id = '".$teamId."' order by team_name ASC"; 

$result = $conn->query($query); 

if(!$result) die($conn->error); 

if ($result->num_rows > 0) {

$row = $result->fetch_assoc()
$id=$row["team_id"];
$teamName=$row["team_name"];
$sportName=$row["sport_name"];
$teamEmail=$row["email"] ;
$establishedDate=$row["established_date"];
$numberOfPlayers=$row["number_of_players"];
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
	<form>
		<h1 style="text-align:center">Update Team</h1>
		<div class="content">
		  <div class="input-field">
			Team Name: <input type="text" placeholder="<?php echo "$teamName "; ?>" name="team-name">
		  </div>
		  <div class="input-field">
			Sport Name: <input type="text" placeholder="<?php echo "$sportName "; ?>" name="sport-name">
		  </div>
		  <div class="input-field">
			Team Email: <input type="text" placeholder="<?php echo "$teamEmail "; ?>" name="team-email">
		  </div>
		  <div class="input-field">
			Established Date: <input type="text" placeholder="<?php echo "$establishedDate "; ?>" name="est-date">
		  </div>
		  <div class="input-field">
			Number of Players: <input type="text" placeholder="<?php echo "$numberOfPlayers "; ?>" name="number-Of-Players">
		  </div>
		<div class="action">
		  <button style="text-align:center"><a href="teams.php" style="color: #777; text-decoration:none">Submit</a></button>
		  
		</div>
	</form>
</div>
</body>
</html>

<?php

$teamName=$_POST["team-name"];
$sportName=$_POST["sport-name"];
$teamEmail=$_POST["team-email"] ;
$establishedDate=$_POST["est-date"];
$numberOfPlayers=$_POST["number-of-players"];

$Query2 = "select sport_id from sport where sport_name = '$sportName' "
$result = $conn->query($query); 
if(!$result) die($conn->error); 
if ($result->num_rows > 0) {
$row = $result->fetch_assoc()
$sportId=$row["sport_id"];

$updateQuery = "update team set team_name='$teamName', sport_id = '$sportId', email='$teamEmail', established_date='$establishedDate' where team_id = '$id'"

if ($conn->query($updateQuery) === TRUE) {
	echo "Records updated: ".$student_id."-".$name."-".$age."-".$gender;
} else {
	echo "Error: ".$updateQuery."<br>".$conn->error;
}


mysqli_close($conn);
?>