<?php
$poname=$_POST['poname'];
$pdescription=$_POST['pdescription'];
$uname=$_POST['uname'];
$podate=$_POST['podate'];

$servername = "localhost";
$username = "root";
$password = "";
$dbName="project";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO post_details (poname,pdescription,uname,podate) values ('$poname','$pdescription','$uname','$podate')";
//worked

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
