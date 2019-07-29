<?php
//including the database connection file

include("config.php");
 
//getting id of the data from url
$user_id = $_GET["user_id"];
$post_id = $_GET["post_id"];
$p_comment_id=$_GET["p_comment_id"];
$msg_id=$_GET["msg_id"];

 
//deleting the row from table

$sql = mysqli_query($conn, "UPDATE user SET status='deactivated' WHERE user_id=$user_id ");
if ($conn->query($sql) === TRUE) {
	header("Location:welcome.php");
}
	
$sql1 = mysqli_query($conn, "UPDATE post_details SET p_status='removed' WHERE post_id=$post_id ");{
header("Location:posts.php");
}
$sql2 = mysqli_query($conn, "UPDATE p_comments SET p_c_status='removed' WHERE p_comment_id=$p_comment_id ");{

}


 

?>