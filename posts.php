<?php
   include("config.php"); 
   include('session.php');
  
?>

<html>
<head>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<title>Online Noticeboard</title>
<style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
	 background="note.jpg";
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
   body {
  
  background-size: cover;
  background-repeat:no-repeat;
 
}

</style>

</head>
<body background="board.jpg" class="loggedin">
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
		<h2>Online Noticeboard

<a href="fpost.html">Add Post</a>
<a href="own_posts.php">My Posts</a></h2>

<?php
include("config.php");


$sql = "SELECT post_details.post_id, post_details.user_id,post_details.poname, post_details.pdescription,post_details.p_image,post_details.podate,post_details.p_status, user.u_name,user.property FROM post_details INNER JOIN user ON post_details.user_id=user.user_id WHERE property='$session_property' ORDER BY post_details.post_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if($row['p_status']=="displayed"){
        echo "<div id='img_div'>"."<img src='images/".$row['p_image']."' >"."post id: " . $row["post_id"]. "<br> Name: " . $row["poname"]."<br>Description: " . $row["pdescription"]. " <br> Posted by: " . $row["u_name"]."<br> Date: " .$row["podate"] ."<br>"."<a href=\"p_comments.php?post_id=$row[post_id]\">Comments</a>";
		if($session_u_type=='landlord'){
			echo "<br> <a href=\"delete.php?post_id=$row[post_id]\" onClick=\"return confirm('Are you sure you want to remove the post?')\">Remove post</a>";
		}
			echo "</div>";
	}
	}
} else {
    echo "0 results";
}
$conn->close();
?>

</div>
</body>

</html>

