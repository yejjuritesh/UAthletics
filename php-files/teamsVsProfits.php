<?php
session_start();
if($_SESSION['role']=='user' or $_SESSION['role']=='admin'){
 require_once  'db.php';

$conn = new mysqli($hn, $un, $pw, $db);

if($conn->connect_error) die($conn->connect_error);

$query = "Select DISTINCT team.team_name, sum(transaction_ledger.transaction_amount) as team_profits from team join transaction_ledger on team.team_id = transaction_ledger.team_id group by team.team_id";

$result = $conn->query($query); 

if(!$result) die($conn->error);

$dataPoints = array();

while($row = $result->fetch_assoc())
{
$teamId=$row["team_name"];
$teamProfits=$row["team_profits"];
array_push($dataPoints,array("label"=> $teamId, "y"=> $teamProfits));
}
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Team Vs Profits"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints,JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
}
</script>
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
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
<?php
}else{
echo 'Un-Authorized';
}
?>
