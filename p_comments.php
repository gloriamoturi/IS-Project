<?php
  // Create database connection
  include("config.php");
   include('session.php');
   include('bs.html');
   $post_id = $_GET['post_id'];
  if (isset($_POST['upload'])) {
  $p_c_status='displayed';
  	// Get text
  	$p_c_desc = $_POST['p_c_desc'];
	$sql = "INSERT INTO p_comments (post_id,user_id,p_c_desc,p_c_time,p_c_status ) VALUES ('$post_id','$login_session_id','$p_c_desc',CURRENT_TIMESTAMP,'$p_c_status')";
	if ($conn->query($sql) === TRUE) {
    
	}else{
		echo "no";
	}
  }
  
?>
<!DOCTYPE html>
<html>
<head>
<title>Comments</title>
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
</style>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>
<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>E-RENTAL</h1>
				<a href="welcome.php">Home</a>
				<a href="requests.php">Maintenance Requests</a>
				<a href="posts.php">Online Noticeboard</a>
				<a href="chats.php">Chats</a>
				<a href="profile.php">Profile</a>
				<a href="logout.php">Logout</a>
			</div>
		</nav>
		<div class="content">
		<h2 style="color:white;">Comments</h2>

<a href="posts.php" class='btn btn-primary btn-sm'>All Posts</a>
<div id="content">
  <?php
  include("config.php");
  
  $sql = "SELECT p_comments.p_comment_id,p_comments.post_id,p_comments.user_id,p_comments.p_c_desc, p_comments.p_c_time,p_comments.p_c_status, user.u_name,user.user_id FROM p_comments INNER JOIN user ON p_comments.user_id=user.user_id WHERE post_id='$post_id'";
$result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		if($row['p_c_status']=="displayed"){
		echo "<div id='img_div'>";
		echo "<p>".$row['u_name']."</p>";
        echo "<div id='img_div'>"."<p>".$row['p_c_desc']."</p>"."</div>";
		echo "<p>".$row['p_c_time']."</p>";
		if($row['user_id']=="$login_session_id"){
			echo "<br> <a href=\"dpc.php?p_comment_id=$row[p_comment_id]&post_id=$post_id\" onClick=\"return confirm('Are you sure you want to remove the comment?')\">Remove comment</a>";
		}
		echo "</div>";
    }
  }
  }
    
  ?>
  <form method="POST" action="">
  	<div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="p_c_desc" 
      	placeholder="Add a comment....."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">POST</button>
  	</div>
  </form>
</div>
</body>
</html>