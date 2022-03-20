<?php
 require_once  'db.php';

$conn = new mysqli($hn, $un, $pw, $db);

if($conn->connect_error) die($conn->connect_error);

$query = "Select team_name, sum(transaction_amount) as team_profits from team join on transaction_ledger where team.team_id = transaction_ledger.team_id group by team_id"; 

$result = $conn->query($query); 

if(!$result) die($conn->error);

$dataPoints = array();
while($row = $result->fetch_assoc())
{
$teamId=$row["team_id"];
$teamProfits=$row["team_profits"];
array_push($dataPoints,array("x"=> $teamId, "y"=> $teamProfits));
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
		text: "Simple Column Chart with Index Labels"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>