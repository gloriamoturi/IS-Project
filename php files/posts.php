

<html>
<head>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<title>Online Noticeboard</title>
</head>
<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>E-RENTAL</h1>
				<a href="requests.html">Maintenance Requests</a>
				<a href="posts.html">Online Noticeboard</a>
				<a href="chats.html">Chats</a>
				<a href="profile.php">Profile</a>
				<a href="logout.php">Logout</a>
			</div>
		</nav>
		<div class="content">
		<h2>Online Noticeboard</h2>
<a href="fpost.html">Add Post</a>
<button type="button" onclick="document.getElementById('p_own').style.display='block'" style="width:auto;">My Own</button>
<button type="button" onclick="document.getElementById('p_all').style.display='block'" style="width:auto;">All</button>'
<?php
include("config.php");
$sql = "SELECT post_id, poname,pdescription,uname,podate,comment_id FROM post_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "post id: " . $row["post_id"]. " - Name: " . $row["poname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
</div>
</body>

</html>

