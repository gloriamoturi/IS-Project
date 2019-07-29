<?php
include("config.php");
session_start();
$c_psw_msg="";
if($_SERVER["REQUEST_METHOD"] == "POST"){
$u_name=$conn->real_escape_string($_POST['u_name']);
$email=$conn->real_escape_string($_POST['email']);
$f_name=$conn->real_escape_string($_POST['f_name']);
$l_name=$conn->real_escape_string($_POST['l_name']);
$psw=$conn->real_escape_string($_POST['psw']);
$c_psw=$conn->real_escape_string($_POST['c_psw']);
$property=$conn->real_escape_string($_POST['property']);
$u_type=$conn->real_escape_string($_POST['u_type']);
$gender=$conn->real_escape_string($_POST['gender']);
$status='active';
if($psw != $c_psw){
	$c_psw_msg="Password does not match";
}else{
$psw_hash= password_hash($psw, PASSWORD_DEFAULT);

$sql = "INSERT INTO user (u_name,psw,f_name,l_name,email,property,u_type,gender,status) values ('$u_name','$psw_hash','$f_name','$l_name','$email','$property','$u_type','$gender','$status')";


//worked

if ($conn->query($sql) === TRUE) {
    
      if($_SERVER["REQUEST_METHOD"] == "POST") {
	   $u_name=$conn->real_escape_string($_POST['u_name']);
	   $psw=$conn->real_escape_string($_POST['psw']);
	   $sql =$conn->query( "SELECT * FROM user WHERE u_name = '$u_name'");
	   if($sql->num_rows>0){
		   $data=$sql->fetch_array();
		   if($data['status']=="active"){
		   if(password_verify($psw,$data['psw'])){
			   // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $user_id;
                            $_SESSION["u_name"] = $u_name;
							$_SESSION['login_user'] = $u_name;
                            
                            // Redirect user to welcome page
		 header("location: welcome.php");}else{
		 $p_msg="Wrong password!";
		   }
		   }
		 else{
			 $s_msg="Your account has been deactivated!";
		 }
		 }else{
			 $u_msg="Wrong username!";
	   }
  
	   }
}
}
}

      /*$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/
$conn->close();
?>