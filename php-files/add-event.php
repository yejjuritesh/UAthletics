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
		<h1 style="text-align:center">Add Event</h1>
		<div class="content">
		  <div class="input-field">
			<input type="name" placeholder="Event Name" id="event-name" value="Event Name" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Location" id="location" value="Location" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Team A, Team B" id="teams" value="Teams playing" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Email" id="email" value="Email id" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Event date" id="event-date" value="Event date" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Ticket Price" id="ticket-price" value="Ticket Price" autocomplete="nope">
		  </div>
		  <div class="input-field">
			<input type="name" placeholder="Event Image" id="event-image" value="Event Image: image.png" autocomplete="nope">
		  </div>		  
		</div>
		<div class="action">
		  <button style="text-align:center"><a href="teams.php" style="color: #777; text-decoration:none">Submit</a></button>
		  
		</div>
	</form>
</div>
</body>
</html>
