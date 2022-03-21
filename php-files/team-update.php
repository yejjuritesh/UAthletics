<?php
session_start();
if($_SESSION['role']=='user' or $_SESSION['role']=='admin'){

require_once  'db.php';

$conn = new mysqli($hn, $un, $pw, $db);

if($conn->connect_error) die($conn->connect_error);

$teamId = $_GET['teamId'];

$query = "Select * from team join sport on team.sport_id = sport.sport_id where team_id = '".$teamId."' order by team_name ASC"; 

$result = $conn->query($query); 

if(!$result) die($conn->error); 

if ($result->num_rows > 0) {

$row = $result->fetch_assoc();
$id=$row["team_id"];
$teamName=$row["team_name"];
$sportName=$row["sport_name"];
$teamEmail=$row["email"] ;
$establishedDate=$row["est_date"];
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
    	<li><a href="logout.php">Logout</a></li> 
      </ul>
    </div>
  </nav>
<div class="update-form">
	<form method="POST" action="team-update.php?teamId=<?php echo $teamId ?>">
		<h1 style="text-align:center">Update Team</h1>
		<div class="content">
		  <div class="input-field">
			Team Name: <input type="text" value="<?php echo "$teamName "; ?>" name="team_name">
		  </div>
		  <div class="input-field">
			Sport Name: <input type="text" value="<?php echo "$sportName "; ?>" name="sport_name">
		  </div>
		  <div class="input-field">
			Team Email: <input type="text" value="<?php echo "$teamEmail "; ?>" name="team_email">
		  </div>
		  <div class="input-field">
			Established Date: <input type="text" value="<?php echo "$establishedDate "; ?>" name="est_date">
		  </div>
		  <div class="input-field">
			Number of Players: <input type="text" value="<?php echo "$numberOfPlayers "; ?>" name="no_players">
		  </div>
		<div class="action">
			<input type='hidden' name='update' value='yes'>
			<input type='hidden' name='teamId' value='$teamId'>
			<button style="text-align:center"><!--<a href="team-update.php?teamId=<?php echo $teamId ?>" style="color: #777; text-decoration:none">-->Submit</a></button>
		  
		</div>
	</form>
</div>
</body>
</html>

<?php
}
	if(isset($_POST['update'])) {
		$teamName=$_POST["team_name"];
		$sportName=$_POST["sport_name"];
		$teamEmail=$_POST["team_email"] ;
		$establishedDate=$_POST["est_date"];
		$numberOfPlayers=$_POST["no_players"];

		$Query2 = "select sport_id from sport where sport_name = '$sportName' ";
		$result = $conn->query($query); 
		if(!$result) die($conn->error); 
		if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$sportId=$row["sport_id"];

		$updateQuery = "update team set team_name='$teamName', sport_id = '$sportId', email='$teamEmail', est_date='$establishedDate' where team_id = '$id'";

		if ($conn->query($updateQuery) === TRUE) {
			// echo "Records updated: ".$teamName."-".$sportName."-".$teamEmail."-".$establishedDate;
			header("Location: team-details.php?teamId=$teamId");
		} else {
			echo "Error: ".$updateQuery."<br>".$conn->error;
		}
	}
	
}



mysqli_close($conn);
}else{
echo 'Un-Authorized';
}
?>
