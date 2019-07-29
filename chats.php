<html>
	<head>
		<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color:white}
</style>
		<title>Home Page</title>
		<link href="stylesheet.css" rel="stylesheet" type="text/css">
		
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>E-RENTAL</h1>
				<a href="welcome.php">Home</a>
				<a href="requests.html">Maintenance Requests</a>
				<a href="posts.php">Online Noticeboard</a>
				<a href="chats.php">Chats</a>
				<a href="profile.php">Profile</a>
				<a href="logout.php">Logout</a>
			</div>
		</nav>
<?php
   
    include("config.php"); 
   include('session.php');
   $sql="SELECT * FROM user WHERE property='$session_property' ";
   $result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
   // output data of each row
	echo "<table>";
	echo "<tr><th>"."Username"."</th><th>"."First Name"."</th><th>"."Last Name"."</th><th>"."Message"."</th></tr>";
    while($row = mysqli_fetch_array($result)) {
		if($row['status']=="active"){
			if($row['u_name']!="$login_session")
			
		
		echo "<tr><td>" . $row["u_name"] . "</td><td>". $row["f_name"]. "</td><td>" .$row["l_name"]. "</td><td>"."<a href=\"chats_i.php?user_id=$row[user_id]\">Message</a>"."</td></tr>";
		 

		}
		
	}
	
	
	
} else { echo "0 results"; }
echo "</table>";
    

//$conn->close();
   ?>
   </body>
   </html>
   
   
   