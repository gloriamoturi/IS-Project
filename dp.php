<?php
//including the database connection file

include("config.php");
$post_id = $_GET["post_id"];
$sql = mysqli_query($conn, "UPDATE post_details SET p_status='removed' WHERE post_id=$post_id ");
	header("Location:posts.php");
?>