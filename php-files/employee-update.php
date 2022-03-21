<?php

session_start();
if($_SESSION['role']=='user' or $_SESSION['role']=='admin'){
	
require_once  'db.php';

$conn = new mysqli($hn, $un, $pw, $db);

if($conn->connect_error) die($conn->connect_error);

$employeeId = $_GET['employee_id'];

$query = "Select * from employee where employee_id = '".$employeeId."' order by employee_id ASC"; 

$result = $conn->query($query); 

if(!$result) die($conn->error); 

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
	$firstName = $row["first_name"];
  $lastName = $row["last_name"];
  $address = $row["address"];
  $startDate = $row["start_date"];
  $endDate = $row["end_date"];
  $salaryType = $row["salary_type"];
  $uRole = $row["Urole"];
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
	<form  method="POST" action="employee-update.php?eventId=<?php echo $employeeId ?>">
		<h1 style="text-align:center">Update Event</h1>
		<div class="content">
		  <div class="input-field">
			First Name: <input type="name" name="first_name" value="<?php echo "$firstName "; ?>" autocomplete="nope">
		  </div>
		  <div class="input-field">
			Last Name: <input type="name" name="last_name" value="<?php echo "lastName "; ?>" autocomplete="nope">
		  </div>
		  <div class="input-field">
			Address: <input type="name" name="address" value="<?php echo "address "; ?>" autocomplete="nope">
		  </div>
		  <div class="input-field">
			Start Date: <input type="date" name="start_date" value="<?php echo "$startDate "; ?>" autocomplete="nope">
		  </div>
		  <div class="input-field">
			End date: <input type="date" name="end_date" value="<?php echo "$endDate "; ?>" autocomplete="nope">
		  </div>
		  <div class="input-field">
			 Salary Type: <input type="name" name="salary_type" value="<?php echo "$salaryType "; ?>" autocomplete="nope">
		  </div>		
      <div class="input-field">
			Role: <input type="name" name="urole" value="<?php echo "$uRole "; ?>" autocomplete="nope">
		  </div>	
		</div>
		<div class="action">
			<input type='hidden' name='update' value='yes'>
			<input type='hidden' name='eventId' value='$eventId'>
			<button style="text-align:center">Submit</a></button>
		</div>
	</form>
</div>
</body>
</html>

<?php
}
if(isset($_POST['update'])) {
	$firstName=$_POST["first_name"];
	$lastName=$_POST["last_name"];
	$address=$_POST["address"] ;
	$startDate = $_POST["start_date"] ;
	$endDate=$_POST["end_date"];
	$salaryType=$_POST["salary_type"];
  $uRole = $_POST["urole"];
	
	$updateQuery = "update employee set first_name='$firstName', last_name = '$lastName', address='address', start_date='$startDate', end_date='$endDate', salary_type='$tsalaryType', Urole = '$uRole'  where employee_id = '$employeeId'";

	if ($conn->query($updateQuery) === TRUE) {
		
		header("Location: event-details.php?eventId=$eventId");
	} else {
		echo "Error: ".$updateQuery."<br>".$conn->error;
	}
}
	
mysqli_close($conn);
}else{
echo 'Un-Authorized';
}
?>
