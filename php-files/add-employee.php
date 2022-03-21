<?php
session_start();
if($_SESSION['role']=='admin'){
//import credentials for db
require_once  'db.php';

//connect to db
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//check if employee name is set
if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['employee_id']))
{
	//Get data from POST object
	$employeeId = $_POST['employee_id'];
	$firstName = $_POST['first_name'];
	$lastName = $_POST['last_name'];
	$address = $_POST['address'];
	$startDate = $_POST['start_date'];
	$endDate = $_POST['end_date'];
	$salaryType = $_POST['salary_type'];
	$uRole = $_POST['role'];
	
	$query = "INSERT INTO employee (employee_id, first_name, last_name, address, start_date, end_date, salary_type, Urole) VALUES ('$employeeId','$firstName', '$lastName', '$address', '$startDate', '$endDate', '$salaryType', '$uRole')";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: employees.php");//this will return you to the view all page	
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
    	<li><a href="logout.php">Logout</a></li> 
      </ul>
    </div>
  </nav>
<div class="update-form" action="add-employee.php">
	<form method='POST'>
		<h1 style="text-align:center">Add Employee</h1>
		<div class="content">
		<div class="input-field">
			<input type="number" placeholder="Employee Id" name="employee_id" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="First Name" name="first_name" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Last Name" name="last_name" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Address" name="address" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="date" placeholder="Start Date" name="start_date" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="date" placeholder="End date" name="end_date" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Type of Employee" name="salary_type" autocomplete="nope">
		  </div>	
		  <div class="input-field">
			<input type="name" placeholder="Type of Role" name="role" autocomplete="nope">
		  </div>	  
		</div>
		<div class="action">
		  <button style="text-align:center" type = "submit">submit</button>
		</div>
	</form>
</div>
</body>
</html>
<?php
}else{
echo 'Un-Authorized';
}
?>

