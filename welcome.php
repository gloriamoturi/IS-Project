<?php
   include("config.php"); 
   include('session.php');
  
?>


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
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?php echo $login_session; ?></p>
			<?php
   
   $stmt = $conn->prepare('SELECT u_type FROM user WHERE user_id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($u_type);
$stmt->fetch();
$stmt->close();
if($u_type=='landlord')
{
	echo '<a href="add.html">Add New Tenant</a>';
	$sql="SELECT * FROM user WHERE u_type='tenant' AND property='$session_property' ";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    // output data of each row
	echo "<table>";
	echo "<tr><th>"."User ID"."</th><th>"."Username"."</th><th>"."First Name"."</th><th>"."Last Name"."</th><th>"."Email"."</th><th>"."Property"."</th><th>"."Gender"."</th><th>"."Status"."</th><th>"."Update"."</th></tr>";
    while($row = mysqli_fetch_array($result)) {
		
		echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["u_name"] . "</td><td>". $row["f_name"]. "</td><td>" .$row["l_name"]. "</td><td>" . $row["email"] . "</td><td>". $row["property"]. "</td><td>". $row["gender"]."</td><td>". $row["status"]. "</td><td>"."<a href=\"edit.php?user_id=$row[user_id]\">Edit</a> | <a href=\"delete.php?user_id=$row[user_id]\" onClick=\"return confirm('Are you sure you want to deactivate the account?')\">Deactivate</a>"."</td></tr>";
		 
         
}
echo "</table>";
} else { echo "0 results"; }
    }

//$conn->close();
  
?>
			
		</div>
	</body>
</html>

