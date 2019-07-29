<?php
//including the database connection file

include("config.php");
 
//getting id of the data from url

$msg_id=$_GET["msg_id"];

 
//deleting the row from table


$sql3 = mysqli_query($conn, "UPDATE msgs SET msg_status='removed' WHERE msg_id=$msg_id ");{
header("Location:chats.php");
}
 

?>
