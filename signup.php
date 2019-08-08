<?php
include("config.php");
session_start();
$c_psw_msg="";
$u_msg="";
$e_msg="";
$l_msg="";
$u_name="";
$email="";
$f_name="";
$l_name="";
$psw="";
$c_psw="";
$property="";
$h_no="";
$u_type="";
$gender="";
$status="";


    
if($_SERVER["REQUEST_METHOD"] == "POST"){
$u_name=$conn->real_escape_string($_POST['u_name']);
$email=$conn->real_escape_string($_POST['email']);
$f_name=$conn->real_escape_string($_POST['f_name']);
$l_name=$conn->real_escape_string($_POST['l_name']);
$psw=$conn->real_escape_string($_POST['psw']);
$c_psw=$conn->real_escape_string($_POST['c_psw']);
$property=$conn->real_escape_string($_POST['property']);
$h_no=$conn->real_escape_string($_POST['h_no']);
$u_type=$conn->real_escape_string($_POST['u_type']);
$gender=$conn->real_escape_string($_POST['gender']);
$status='active';
// Get image name
$u_image = $_FILES['u_image']['name'];

// image file directory
$target = "images/".basename($u_image);
$user_check_query = "SELECT * FROM user WHERE u_name='$u_name' LIMIT 1 ";
$users_check_query = "SELECT * FROM user WHERE email='$email'LIMIT 1 ";
$type_check_query = "SELECT * FROM user WHERE u_type='$u_type' AND property='$property' ";
  $result = mysqli_query($conn, $user_check_query);
  $users = mysqli_fetch_assoc($result);
  $results = mysqli_query($conn, $users_check_query);
  $userss = mysqli_fetch_assoc($results);
  $res = mysqli_query($conn, $type_check_query);
  $type = mysqli_fetch_assoc($res);
  
  
    if ($users['u_name'] === $u_name) {
      $u_msg="Username already exists!";
    }
  
  
	if ($userss['email'] === $email) {
      $e_msg= "Email already exists!";
    }
  
 
	if ($type['u_type'] === 'landlord') {
      $l_msg= "Landlord already exists!";
    }
   
if($psw != $c_psw){
	$c_psw_msg="Password does not match!";
}
if (empty($u_msg)&&empty($e_msg)&&empty($l_msg)&&empty($c_psw_msg)){
	
if (!empty($u_name)||!empty($email)||!empty($f_name)||!empty($l_name)||!empty($psw)||!empty($c_psw)||!empty($property)||!empty($u_type)||!empty($gender)||!empty($status)||!empty($u_image)){
	$psw_hash= password_hash($psw, PASSWORD_DEFAULT);
$sql = "INSERT INTO user (u_name,psw,f_name,l_name,email,property,h_no,u_type,gender,u_image,status,start_date) values ('$u_name','$psw_hash','$f_name','$l_name','$email','$property','$h_no','$u_type','$gender','$u_image','$status',CURRENT_TIMESTAMP)";
if (move_uploaded_file($_FILES['u_image']['tmp_name'], $target)) {
echo "yes";
}else{
	echo "no";	
}


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
}






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
				<form action="" method="post"  class="login100-form validate-form" enctype="multipart/form-data">
					

					<span class="login100-form-title p-b-34 p-t-27">
						Sign up
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="u_name" placeholder="Username"value="<?php echo $u_name; ?>"required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
						<?php if($u_msg!=""){echo "<span style='color:maroon;'>".$u_msg."</span>"; }?>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" minlength="5" type="password" name="psw" placeholder="Password"value="<?php echo $psw; ?>"required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" minlength="5" type="password" name="c_psw" placeholder="Confirm password"value="<?php echo $c_psw; ?>"required>
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
						<?php if($c_psw_msg!=""){echo "<span style='color:maroon;'>".$c_psw_msg."</span>"; }?>
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="email" name="email" placeholder="Email" value="<?php echo $email; ?>"required>
						<?php if($e_msg!=""){echo "<span style='color:maroon;'>". $e_msg."</span>"; }?>
						<!--<span class="focus-input100" data-placeholder="&#xf207;"></span>-->
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="f_name" placeholder="First Name"value="<?php echo $f_name; ?>"required>
						<!--<span class="focus-input100" data-placeholder="&#xf207;"></span>-->
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="l_name" placeholder="Last Name"value="<?php echo $l_name; ?>"required>
						<!--<span class="focus-input100" data-placeholder="&#xf207;"></span>-->
					</div>
					<div class="wrap-input100 validate-input" >
						<input class="input100" type="text" name="property" placeholder="Property Name"value="<?php echo $property; ?>"required>
						<!--<span class="focus-input100" data-placeholder="&#xf207;"></span>-->
					</div>
					<script type="text/javascript">
    function ShowHideDiv() {
        var chkYes = document.getElementById("chkYes");
		var h = document.getElementById("h");
        h.style.display = chkYes.checked ? "block" : "none";
    }
</script>
					<div class="wrap-input100 validate-input" >
					<label style="color:white">User Type</label>
						<input type="radio"  id="chkNo"  name="u_type" value="landlord" onclick="ShowHideDiv()" <?php if($u_type == 'landlord') echo 'checked' ?> required>Landlord
						<input type="radio" id="chkYes" name="u_type" value="tenant" onclick="ShowHideDiv()" <?php if($u_type == 'tenant') echo 'checked' ?> required>Tenant
						<?php if($l_msg!=""){echo "<br><span style='color:maroon;'>".$l_msg."</span>"; }?>
						<div id="h" style="display: none">
							House Number:
							<input type="text" id="h_no" name="h_no" placeholder="House number"value="<?php echo $h_no; ?>">
							</div>
						<!--<span class="focus-input100" data-placeholder="&#xf207;"></span>-->
					</div>
					<div class="wrap-input100 validate-input" >
					<label style="color:white">Gender</label>
						<input  type="radio" name="gender" value="male" <?php if($gender == 'male') echo 'checked' ?> required >Male
						<input  type="radio" name="gender" value="female" <?php if($gender == 'female') echo 'checked' ?> required>Female
						<!--<span class="focus-input100" data-placeholder="&#xf207;"></span>-->
						<!--removed class="input100"-->
					</div>
					<div class="wrap-input100 validate-input" >
					<label style="color:white">Profile Picture</label>
						<div>
							<input type="hidden" name="size" value="1000000">
						</div>
  						<div>
  	  						<input type="file" name="u_image" required>
  						</div>	
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
					
