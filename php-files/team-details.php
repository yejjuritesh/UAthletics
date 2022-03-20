<?php

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
$income=$row["income"];

$query = "Select sum(transaction_amount) as team_income from transaction_ledger where team_id = '".$teamId."' and transaction_type = 'income' group by team_id"; 

$result = $conn->query($query); 

if(!$result) die($conn->error); 

if ($result->num_rows > 0) {

$incomeRow = $result->fetch_assoc();
$income= $income + $incomeRow["team_income"];
}
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
		<h1 style="text-align:center">Team Details</h1>
		<div class="content">
		  	<table background="">
				<thead>
					<th><h3><?php echo "$teamName "; ?></h3></th>
				</thead>
				<tr>
					<td>Sport Type: </td> <td><?php echo "$sportName "; ?> </td>
				</tr>
				<tr>
					<td>Number of players: </td> <td><?php echo "$numberOfPlayers";?> </td>
				</tr>
				<tr>
					<td>Team Email id: </td> <td><?php echo "$teamEmail "; ?> </td>
				</tr>
				<tr>
					<td>Est. date: </td> <td><?php echo "$establishedDate "; ?> </td>
				</tr>
				<tr>
					<td>Income: </td> <td><?php echo "$income "; ?></td>
				</tr>
			</table>
			<a href="team-delete.php?teamId=<?php echo $id ?> " style="color: #777; ">
				Delete team
			</a>
		</div>
		<div class="action">
		  <button style="text-align:center"><a href="team-update.php?teamId=<?php echo $id ?>" style="color: #777; text-decoration:none">Edit Team Details</a></button>
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