<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {   
$u_name=$_POST['u_name'];
$email=$_POST['email'];
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$property=$_POST['property'];
$u_type=$_POST['u_type'];
$gender=$_POST['gender'];
$status='active';

    
    // checking empty fields
    if(empty($u_name) || empty($email) || empty($f_name)|| empty($l_name) || empty($property) || empty($u_type)|| empty($gender)) {            
        if(empty($u_name)) {
            echo "<font color='red'>Username field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
        if(empty($f_name)) {
            echo "<font color='red'>First name field is empty.</font><br/>";
        } 
		if(empty($l_name)) {
            echo "<font color='red'>Last name field is empty.</font><br/>";
        }
        
        if(empty($property)) {
            echo "<font color='red'>Property field is empty.</font><br/>";
        }
        
        if(empty($u_type)) {
            echo "<font color='red'>User type field is empty.</font><br/>";
        } 
		if(empty($gender)) {
            echo "<font color='red'>Gender field is empty.</font><br/>";
        }  
    } else {   
	 $sql = "INSERT INTO user (u_name,f_name,l_name,email,property,u_type,gender,status) values ('$u_name','$f_name','$l_name','$email','$property','$u_type','$gender','$status')";
}}
	 ?>
</body>
</html>