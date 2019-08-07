<?php
include("config.php");
 include('session.php');


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

$sql = "INSERT INTO request_details (r_name,r_location,r_description,r_image,user_id,r_date,r_status,stage) values ('$r_name','$r_location','$r_description','$r_image','$login_session_id',CURRENT_TIMESTAMP,'$r_status','$stage')";
//worked

mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['r_image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
		header("location:requests.php");
  	}else{
  		$msg = "Failed to upload image";
  	}

$conn->close();
?>
