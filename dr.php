<?php
//including the database connection file

include("config.php");
$request_id = $_GET["request_id"];
$sql = mysqli_query($conn, "UPDATE request_details SET r_status='removed' WHERE request_id=$request_id ");
	header("Location:requests.php");
?>