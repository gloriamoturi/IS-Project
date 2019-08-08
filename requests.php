<?php
   
   include('linkbar.php');
   error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);

   if (isset($_POST['upload'])) {
	$r_name=$_POST['r_name'];
	$r_location=$_POST['r_location'];
    $r_description=$_POST['r_description'];
	$r_status='displayed';
	$stage='awaiting feedback';
    

  	// Get image name
  	$r_image = $_FILES['r_image']['name'];

  	// image file directory
  	$target = "images/".basename($r_image);
}
if (!empty($r_name)||!empty($r_description)||!empty($r_image)||!empty($r_location)||!empty($r_image)){
$sql = "INSERT INTO request_details (r_name,r_location,r_description,r_image,user_id,r_date,r_status,stage) values ('$r_name','$r_location','$r_description','$r_image','$login_session_id',CURRENT_TIMESTAMP,'$r_status','$stage')";
//worked

mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['r_image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
		header("location:requests.php");
  	}else{
  		$msg = "Failed to upload image";
	  }
	}

$conn->close();
?>

<html>
<head>
	<style>
#searchbar{ 
    {
  float: right;
  padding: 6px;
  border: none;
  margin-top: 8px;
  margin-right: 16px;
  
 
   } 
   #content{
	 
   	
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
	   background-color: grey;
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

   
 
   /* When the input field gets focus, 
        change its width to 100% */
   
 
  
 
.posts{ 
	
   display: list-item;     
  }  

</style>
<link href="stylesheet.css" rel="stylesheet" type="text/css">

<title>Maintenance Requests</title>

</head>
<body class="loggedin">
		
		<div class="content">
		<h2 style="color:white;">Maintenance Requests<br>
		<input style="color:black;" id="searchbar" onkeyup="search_posts()" type="text"
		name="search" placeholder="Search ..">		</h2>
		<br>
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
		Maintenance Request Form
  </button>
		<a href='own_requests.php' class='btn btn-primary btn-sm  ' >My Requests</a><br>
		

    <div class="mdb-lightbox no-margin">
	<ol id='list'>	
<?php
include("config.php");

$sql = "SELECT request_details.request_id, request_details.user_id,request_details.r_name,request_details.r_location, request_details.r_description,request_details.r_image,request_details.r_date,request_details.completion_date,request_details.r_status,request_details.stage, user.u_name,user.property FROM request_details INNER JOIN user ON request_details.user_id=user.user_id WHERE property='$session_property' ORDER BY request_details.request_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if($row['r_status']=="displayed"){
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
				  </div>";				}
				if($session_u_type=='landlord'){
					echo " <a class='btn btn-secondary' href=\"s.php?request_id=$row[request_id]\">Edit</a>";
						
				}
				echo "<br><a style='color:white;' href=\"r_comments.php?request_id=$row[request_id]\">Comments</a></span></div>
				</li>
				";
		
		
			}}}
 else {
    echo "0 results";
}
$conn->close();
?>
</ol>
<div class="clearfix"></div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="background-color: transparent !important;">
  
  <div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalCenterTitle">Maintenance Request Form</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		 
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		<form method="POST" action="requests.php" enctype="multipart/form-data">
			<div class="form-group">
			  <label for="r_name" class="col-form-label">Request Name:</label>
			  <input type="text" class="form-control" id="r_name" name="r_name" required>
			</div>
			<div class="form-group">
			  <label for="r_location" class="col-form-label">Location:</label>
			  <textarea class="form-control" id="r_location" name ="r_location" required></textarea>
			</div>
			<div class="form-group">
			  <label for="r_description" class="col-form-label">Description:</label>
			  <textarea class="form-control" id="r_description" name ="r_description" required></textarea>
			</div>
			<div class="form-group">
			</div>
	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="r_image">
  	</div>	
			</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="submit" class="btn btn-primary" name="upload">Submit</button>
		</div>
		</form>
	  </div>
	</div>
  </div>
  </div>
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

