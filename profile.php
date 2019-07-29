<?php
include("config.php");
include('linkbar.html');

//error_reporting(0);
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['login_user'])) {
	header('Location: welcome.php');
	exit();
}

// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $conn->prepare('SELECT u_name,f_name,l_name,email,u_type,gender,property FROM user WHERE user_id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($u_name,$f_name,$l_name,$email,$u_type,$gender,$property);
$stmt->fetch();
$stmt->close();
?>

<html>
<head>
<title>Profile </title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body class="loggedin">

		<div class="content">
<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td> <?php echo $u_name ?></td>
					</tr>
					<tr>
						<td>First Name:</td>
						<td> <?php echo $f_name ?></td>
					</tr>
					<tr>
						<td>Last Name:</td>
						<td> <?php echo $l_name ?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
					<tr>
						<td>User Type:</td>
						<td><?=$u_type?></td>
					</tr>
					<tr>
						<td>Property:</td>
						<td><?=$property?></td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td><?=$gender?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>
</body>
</html>