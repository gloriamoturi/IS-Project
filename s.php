<?php
//including the database connection file

include("config.php");
 
//getting id of the data from url
$request_id = $_GET["request_id"];
$sql="SELECT * FROM request_details WHERE request_id=$request_id ";
	
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = mysqli_fetch_array($result)) {
 
//deleting the row from table
if($row["stage"]=="awaiting feedback"){
    $sql = mysqli_query($conn, "UPDATE request_details SET stage='assigned'  WHERE request_id=$request_id ");
    header("Location:requests.php");
   
}   
else if($row["stage"]=="assigned"){
    $sql = mysqli_query($conn, "UPDATE request_details SET stage='complete' WHERE request_id=$request_id ");
    $sql = mysqli_query($conn, "UPDATE request_details SET completion_date=CURRENT_TIMESTAMP WHERE request_id=$request_id");
    header("Location:requests.php");
}
else{
    header("Location:requests.php");
}


		}
	}


 

?>