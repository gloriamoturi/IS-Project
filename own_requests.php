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
.posts{ 
	
	display: list-item;     
   }  
 

</style>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
<title>Maintenance Requests</title>
</head>
<body class="loggedin">
		
<div class="content"">
		<h2 style="color:white;">Maintenance Requests<br>
		<input style="color:black;" id="searchbar" onkeyup="search_posts()" type="text"
		name="search" placeholder="Search ..">		</h2>
		<br>
		
		<a href='requests.php' class='btn btn-primary btn-sm  ' >All Requests</a><br>
		

    <div class="mdb-lightbox no-margin">
	<ol id='list'>	
<?php

$sql = "SELECT request_details.request_id, request_details.user_id,request_details.r_name,request_details.r_location, request_details.r_description,request_details.r_image,request_details.r_date,request_details.completion_date,request_details.r_status,request_details.stage, user.u_name,user.property FROM request_details INNER JOIN user ON request_details.user_id=user.user_id WHERE property='$session_property' ORDER BY request_details.request_id DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if($row['user_id']=="$login_session_id"){
			echo "<li class='posts'style='list-style-type:none'><div id='img_div' style='color:white; background-color: grey;'>"."
			<a href='images/".$row['r_image']."'data-size='1600x1067'><img alt='picture'  src='images/".$row['r_image']."'> </a><span>
			 Request ID: " . $row["request_id"]. "<br> Name: " . $row["r_name"]. "<br> Location: " . $row["r_location"]."<br>Description: " . $row["r_description"]. " <br> Posted by: " . $row["u_name"]."<br>Submission Date: " .$row["r_date"]."<br>Completion Date: " .$row["completion_date"];
					if($row["stage"]=='awaiting feedback'){
						echo "<div class='progress'>
						<div class='progress-bar progress-bar-success' role='progressbar' style='width:30%'>
						  Awaiting Feedback
						</div>
						
					  </div>";				}
					else if($row["stage"]=='assigned'){
						echo "<div class='progress'>
						<div class='progress-bar progress-bar-success' role='progressbar' style='width:30%'>
						  Awaiting Feedback
						</div>
						<div class='progress-bar progress-bar-warning' role='progressbar' style='width:30%'>
						  Assigned
						  </div>
					  </div>";				}
					else if($row["stage"]=='complete'){
						echo "<div class='progress'>
						<div class='progress-bar progress-bar-success' role='progressbar' style='width:30%'>
						  Awaiting Feedback
						</div>
						<div class='progress-bar progress-bar-warning' role='progressbar' style='width:30%'>
						  Assigned
						</div>
						<div class='progress-bar progress-bar-danger' role='progressbar' style='width:40%'>
						  Complete
						</div>
					  </div>";}
					  echo "<a style='color:white;' href=\"r_comments.php?request_id=$row[request_id]\">Comments</a>
				
				";
					
					  		if($row['r_status']=="displayed"){
			echo "<br> <a href=\"dr.php?request_id=$row[request_id]\" onClick=\"return confirm('Are you sure you want to remove the request?')\"class='btn btn-danger btn-sm'>Remove request</a>";
		}
			echo "</div></li>";
	}
	}
} else {
    echo "0 results";
}
$conn->close();
?>
</div>
<script>
function search_posts() { 
    let input = document.getElementById('searchbar').value 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName('posts'); 
      
    for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        else { 
            x[i].style.display="list-item";                  
        } 
    } 
}
// MDB Lightbox Init
$(function () {
$("#mdb-lightbox-ui").load("mdb-addons/mdb-lightbox-ui.html");
});
</script> 
</body>

</html>