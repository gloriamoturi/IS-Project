<?php
include("config.php");
session_start();
if(isset($_POST['submit'])){
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
	echo "Password does not match";
}else{
$psw_hash= password_hash($psw, PASSWORD_DEFAULT);

$sql = "INSERT INTO user (u_name,psw,f_name,l_name,email,property,u_type,gender,status) values ('$u_name','$psw_hash','$f_name','$l_name','$email','$property','$u_type','$gender','$status')";


//worked

if ($conn->query($sql) === TRUE) {
    
      $sql = "SELECT * FROM user WHERE u_name = '$u_name'";
	  
      $result = mysqli_query($conn,$sql);
	  $data = $result->fetch_assoc();
	$psw_hash=$data['psw'];
	if(!password_verify($psw,$psw_hash)){
		$_SESSION['login_user'] = $u_name;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
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

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form action="" method="post"  class="login100-form validate-form">
					<span class="login100-form-logo">
						<img src="">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Sign up
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="u_name" placeholder="Username"required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" minlength="5" type="password" name="psw" placeholder="Password"required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" minlength="5" type="password" name="c_psw" placeholder="Confirm password"required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="email" name="email" placeholder="Email"required>
						<!--<span class="focus-input100" data-placeholder="&#xf207;"></span>-->
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="f_name" placeholder="First Name"required>
						<!--<span class="focus-input100" data-placeholder="&#xf207;"></span>-->
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="l_name" placeholder="Last Name"required>
						<!--<span class="focus-input100" data-placeholder="&#xf207;"></span>-->
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="property" placeholder="Property Name"required>
						<!--<span class="focus-input100" data-placeholder="&#xf207;"></span>-->
					</div>
					<div class="wrap-input100 validate-input" >
					<label style="color:white">User Type</label>
						<input type="radio" name="u_type" value="landlord" required>Landlord
						<input type="radio" name="u_type" value="tenant" required>Tenant
						<input type="radio" name="u_type" value="administrator" required>Administrator
						<!--<span class="focus-input100" data-placeholder="&#xf207;"></span>-->
					</div>
					<div class="wrap-input100 validate-input" >
					<label style="color:white">Gender</label>
						<input  type="radio" name="gender" value="male" required >Male
						<input  type="radio" name="gender" value="female" required>Female
						<!--<span class="focus-input100" data-placeholder="&#xf207;"></span>-->
						<!--removed class="input100"-->
					</div>
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							Sign up
						</button>
						<a class="login100-form-btn" href="login.php">Cancel</a>
					
					</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
					