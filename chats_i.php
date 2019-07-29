<?php
  // Create database connection
  include("config.php");
   include('session.php');
   $user_id = $_GET['user_id'];
  if (isset($_POST['upload'])) {
  $msg_status='displayed';
  	// Get text
  	$msg = $_POST['msg'];
	$sql = "INSERT INTO msgs (sender_id,user_id,msg,msg_date,msg_status ) VALUES ('$login_session_id','$user_id','$msg',CURRENT_TIMESTAMP,'$msg_status')";
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
  

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>
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
		

<a href="chats.php">All Chats</a>
<h2>Chat Messages</h2>
<div id="content">
  <?php
  include("config.php");
  
  $sql = "SELECT msgs.msg_id,msgs.sender_id,msgs.user_id,msgs.msg,msgs.msg_date,msg_status, user.u_name,user.user_id FROM msgs INNER JOIN user ON msgs.user_id=user.user_id   " ;
$result = $conn->query($sql);
echo $row['u_name'];
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		if($row['user_id']=="$user_id" && $row['sender_id']=="$login_session_id"||$row['user_id']=="$login_session_id" && $row['sender_id']=="$user_id"){
		if($row['msg_status']=="displayed"){
			if($row['sender_id']=="$login_session_id"){
				echo "<div class='container'> <p>".$row['msg']."</p> <span class='time-right'>".$row['msg_date']."</span> <br> <a href=\"d_msg.php?msg_id=$row[msg_id]\" onClick=\"return confirm('Are you sure you want to delete the message?')\">Delete Message</a></div>";
		}else{
			echo "<div class='container darker'> <p>".$row['msg']."</p> <span class='time-left'>".$row['msg_date']."</span></div>";
		}
		
		
    }
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
      	name="msg" 
      	placeholder="Write message....."></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">SEND</button>
  	</div>
  </form>
</div>
</body>
</html>