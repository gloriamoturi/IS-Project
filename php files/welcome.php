<?php
   include('session.php');
?>


<html>
	<head>
		
		<title>Home Page</title>
		<link href="stylesheet.css" rel="stylesheet" type="text/css">
		
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>E-RENTAL</h1>
				<a href="requests.html">Maintenance Requests</a>
				<a href="posts.php">Online Noticeboard</a>
				<a href="chats.html">Chats</a>
				<a href="profile.php">Profile</a>
				<a href="logout.php">Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?php echo $login_session; ?></p>
		</div>
	</body>
</html>

