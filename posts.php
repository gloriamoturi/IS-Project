<?php
   
   include('linkbar.php');
   error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
   if (isset($_POST['upload'])) {
	$poname=$_POST['poname'];
    $pdescription=$_POST['pdescription'];
	$p_status='displayed';
    

  	// Get image name
  	$p_image = $_FILES['p_image']['name'];

  	// image file directory
  	$target = "images/".basename($p_image);
}
if (!empty($poname)||!empty($pdescription)||!empty($p_image)){
$sql = "INSERT INTO post_details (poname,pdescription,p_image,user_id,podate,p_status) values ('$poname','$pdescription','$p_image','$login_session_id',CURRENT_TIMESTAMP,'$p_status')";
//worked

mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['p_image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
		header("location:posts.php");
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
  font-size: 17px;
 
   } 
 
   
 
.posts{ 
   display: list-item;     
  }  
  div.gallery {
  border: 1px solid #ccc;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 24.99999%;
}

@media only screen and (max-width: 700px) {
  .responsive {
    width: 49.99999%;
    margin: 6px 0;
  }
}

@media only screen and (max-width: 500px) {
  .responsive {
    width: 100%;
  }
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}
		</style>
<link href="stylesheet.css" rel="stylesheet" type="text/css">

<title>Online Noticeboard</title>


</head>
<body>
		
		<div class="content"  >
		<h2 ><span style="color:white;">Online Noticeboard</span><br><input id="searchbar" onkeyup="search_posts()" type="text"
		name="search" placeholder="Search ..">
		</h2>
		<br>
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter">
		Add Post
  </button>
		<a href='own_posts.php' class='btn btn-primary btn-sm  ' >My Posts</a><br>
		<div class="mdb-lightbox no-margin">
		<ol id='list'>


<?php
include("config.php");


$sql = "SELECT post_details.post_id, post_details.user_id,post_details.poname, post_details.pdescription,post_details.p_image,post_details.podate,post_details.p_status, user.u_name,user.property FROM post_details INNER JOIN user ON post_details.user_id=user.user_id WHERE property='$session_property' ORDER BY post_details.post_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		if($row['p_status']=="displayed"){
        echo "<li class='posts'style='list-style-type:none'><div class='responsive' style=' padding: 0 6px;
		float: left;
		width: 33.3%;'>
		<div class='gallery' style=' border: 1px solid #ccc;'>"."<a  href='images/".$row['p_image']."'data-size='1600x1067'><img style='margin: 5px;
		width: 280px;
		height: 200px;' alt='picture'  src='images/".$row['p_image']."'> </a><div class='desc' style='padding: 15px; font-size: 20px;
		text-align: center;'>
		".
		
		 "<span style='text-align: center;text-decoration: underline;font-weight: bold;'> " . $row["poname"]."</span><br> " . $row["pdescription"]. " <br><span style='color:grey;'font-size: 10px;> Posted by: " . $row["u_name"]."<br> Date: " .$row["podate"] ."</span><br>"."<a href=\"p_comments.php?post_id=$row[post_id]\">Comments</a>";
		if($session_u_type=='landlord'){
			echo "<br> <a href=\"dp.php?post_id=$row[post_id]\" onClick=\"return confirm('Are you sure you want to remove the post?')\">Remove post</a>";
		}
			echo " </div></div></div></li>";
	}
	}
} else {
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
		  <h5 class="modal-title" id="exampleModalCenterTitle">Post Details</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		 
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
		<form method="POST" action="posts.php" enctype="multipart/form-data">
			<div class="form-group">
			  <label for="poname" class="col-form-label">Post Name:</label>
			  <input type="text" class="form-control" id="poname" name="poname" >
			</div>
			<div class="form-group">
			  <label for="p_description" class="col-form-label">Description:</label>
			  <textarea class="form-control" id="pdescription" name ="pdescription" ></textarea>
			</div>
			<div class="form-group">
			</div>
	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="p_image">
  	</div>	
			</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="submit" class="btn btn-primary" name="upload">Post</button>
		</div>
		</form>
	  </div>
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
</script> 
</body>

</html>

