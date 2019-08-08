<?php
//including the database connection file

include("config.php");
 
//getting id of the data from url
$user_id = $_GET["user_id"];
$sql="SELECT * FROM user WHERE user_id=$user_id ";
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = mysqli_fetch_array($result)) {
 
//deleting the row from table
if($row["status"]=="active"){
$sql = mysqli_query($conn, "UPDATE user SET status='deactivated' WHERE user_id=$user_id ");
$sql = mysqli_query($conn, "UPDATE user SET end_date=CURRENT_TIMESTAMP WHERE user_id=$user_id");

	header("Location:welcome.php");
}else{
	$sql = mysqli_query($conn, "UPDATE user SET status='active' WHERE user_id=$user_id ");
	$sql = mysqli_query($conn, "UPDATE user SET start_date=CURRENT_TIMESTAMP WHERE user_id=$user_id");

	header("Location:welcome.php");	
}
		}
	}


 

?>