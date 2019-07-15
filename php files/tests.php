<?php
$uname=$_POST['uname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$pword=$_POST['pword'];
$utype=$_POST['utype'];
$gender=$_POST['gender'];

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

$sql = "INSERT INTO user (uname,email,phone,pword,utype,gender) values ('$uname','$email','$phone','$pword','$utype','$gender')";
//worked

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
