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
<title>Maintenance Requests</title>
</head>
<body class="loggedin">
		
		<div class="content">
		<h2>Maintenance Requests</h2>
		
		<a href='requests.php' class='btn btn-primary btn-sm  ' >All Requests</a><br>

<?php

$sql = "SELECT request_details.request_id, request_details.user_id,request_details.r_name,request_details.r_location, request_details.r_description,request_details.r_image,request_details.r_date,request_details.r_status,request_details.stage, user.u_name,user.property FROM request_details INNER JOIN user ON request_details.user_id=user.user_id WHERE property='$session_property' ORDER BY request_details.request_id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if($row['user_id']=="$login_session_id"){
        echo "<div id='img_div'>"."<img src='images/".$row['r_image']."' >"."Request ID: " . $row["request_id"]. "<br> Name: " . $row["r_name"]. "<br> Location: " . $row["r_location"]."<br>Description: " . $row["r_description"]. " <br> Posted by: " . $row["u_name"]."<br> Date: " .$row["r_date"] ."<br> Status: " .$row["r_status"] ."<br><span style='color:red;'>".$row["stage"]."</span><br>"."<a href=\"r_comments.php?request_id=$row[request_id]\">Comments</a>";
		if($row['r_status']=="displayed"){
			echo "<br> <a href=\"dr.php?request_id=$row[request_id]\" onClick=\"return confirm('Are you sure you want to remove the request?')\">Remove request</a>";
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