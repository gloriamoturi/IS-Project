<?php
include("config.php");
 include('session.php');


if (isset($_POST['upload'])) {
	$poname=$_POST['poname'];
    $pdescription=$_POST['pdescription'];
	$p_status='displayed';
    

  	// Get image name
  	$p_image = $_FILES['p_image']['name'];

  	// image file directory
  	$target = "images/".basename($p_image);
}

$sql = "INSERT INTO post_details (poname,pdescription,p_image,user_id,podate,p_status) values ('$poname','$pdescription','$p_image','$login_session_id',CURRENT_TIMESTAMP,'$p_status')";
//worked

mysqli_query($conn, $sql);

  	if (move_uploaded_file($_FILES['p_image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
		header("location:posts.php");
  	}else{
  		$msg = "Failed to upload image";
  	}

$conn->close();
?>
