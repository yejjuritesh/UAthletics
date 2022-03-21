<?php
session_start();
if($_SESSION['role']=='user' or $_SESSION['role']=='admin'){
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css-files/home.css">
<link href="https://fonts.googleapis.com/css?family=Arima+Madurai" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
</head>
<body>
<nav>
    <div class="brand">
      <h3>U Athletics</h3>
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
<div class="center">
<div class="container">
  <p class="title">Reports</p>
  <div class="overlay"></div>
  <div class="button"><a href="reports-list.php"> Click Here </a></div>
</div>
<div class="container">
   <p class="title">Edit data</p>
  <div class="overlay"></div>
  <div class="button"><a href="edit-data-list.php"> Click Here </a></div>
</div>
</div>
</body>
</html>
<?php
}else{
echo 'Un-Authorized';
}
?>
