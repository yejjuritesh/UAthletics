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
	<form method='POST' action='add-team.php'>
		<h1 style="text-align:center">Add Team</h1>
		<div class="content">
		  <div class="input-field">
			<input type="name" placeholder="Team Name" name="team_name" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Sport Name" name="sport_name" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Number of players" name="no_players" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Email" name="email" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Est. date" name="est_date" autocomplete="nope">
		  </div>
		  <!--<div class="input-field">
			<input type="name" placeholder="Team Rank" name="rank" value="Team Rank" autocomplete="nope">
		  </div>-->
		  <div class="input-field">
			<input type="name" placeholder="Income" name="income" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Image" name="team_icon" autocomplete="nope">
		  </div>		  
		</div>
		<div class="action">
		  <button style="text-align:center"><a href="add-team.php" style="color: #777; text-decoration:none">Submit</a></button>
		  
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

//check if ISBN exists
if(isset($_POST['team_name']) && isset($_POST['sport_name']) && isset($_POST['no_players']))
{
	//Get data from POST object
	$team_name = $_POST['team_name'];
	$sport_name = $_POST['sport_name'];
	$no_players = $_POST['no_players'];
	$email = $_POST['email'];
	$est_date = $_POST['est_date'];
	$income = $_POST['income'];
	$team_icon = $_POST['team_icon'];
	
	$query_temp = "SELECT sport_id from sport where sport_name = '".$sport_name."'";
	
	$result = $conn->query($query_temp);
	if(!$result) die($conn->error);
	
	if ($result->num_rows > 0) {
		$sportsRow = $result->fetch_assoc();
		$sport_id= $sportsRow["sport_id"];
	}
	
	$query = "INSERT INTO team (team_name, sport_id, email, est_date, no_players, income, team_icon) VALUES ('$team_name', '$sport_id', '$email', '$est_date', '$no_players', '$income', '$team_icon')";
	
	//echo $query.'<br>';
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: teams.php");//this will return you to the view all page	
	
}



?>
