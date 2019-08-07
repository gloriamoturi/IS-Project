<?php
   
   include('linkbar.php');
  
?>
<html>
<head>
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
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<title>Online Noticeboard</title>
</head>
<body class="loggedin">
		
		<div class="content">
		<h2>Online Noticeboard</h2>
		
		<a href='posts.php' class='btn btn-primary btn-sm  ' >All Posts</a><br>

<?php

$sql = "SELECT post_details.post_id, post_details.user_id,post_details.poname, post_details.pdescription,post_details.p_image,post_details.podate,post_details.p_status, user.u_name,user.property FROM post_details INNER JOIN user ON post_details.user_id=user.user_id WHERE property='$session_property' ORDER BY post_details.post_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if($row['user_id']=="$login_session_id"){
        echo "<div id='img_div'>"."<img src='images/".$row['p_image']."' >"."post id: " . $row["post_id"]. "<br> Name: " . $row["poname"]."<br>Description: " . $row["pdescription"]. " <br> Posted by: " . $row["u_name"]."<br> Date: " .$row["podate"] ."<br> Status: " .$row["p_status"] ."<br>"."<a href=\"p_comments.php?post_id=$row[post_id]\">Comments</a>";
		if($row['p_status']=="displayed"){
			echo "<br> <a href=\"dp.php?post_id=$row[post_id]\" onClick=\"return confirm('Are you sure you want to remove the post?')\">Remove post</a>";
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