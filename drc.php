<?php
//including the database connection file

include("config.php");
 
//getting id of the data from url

$request_id = $_GET["request_id"];
$r_comment_id=$_GET["r_comment_id"];
//deleting the row from table


$sql = mysqli_query($conn, "UPDATE r_comments SET r_c_status='removed' WHERE r_comment_id=$r_comment_id ");

	header("Location:r_comments.php?request_id=".$request_id);

 

?>
