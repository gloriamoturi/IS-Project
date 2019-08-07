<?php
//including the database connection file

include("config.php");
 
//getting id of the data from url

$post_id = $_GET["post_id"];
$p_comment_id=$_GET["p_comment_id"];
//deleting the row from table


$sql = mysqli_query($conn, "UPDATE p_comments SET p_c_status='removed' WHERE p_comment_id=$p_comment_id ");

	header("Location:p_comments.php?post_id=".$post_id);

 

?>
