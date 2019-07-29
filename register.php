<?php
// Include config file
include("config.php");
/*$u_name=$_POST['u_name'];
$email=$_POST['email'];
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$psw=$_POST['psw'];
$u_type=$_POST['u_type'];
$gender=$_POST['gender'];*/
 
// Define variables and initialize with empty values
$u_name = $psw = $confirm_password = $f_name = $l_name  = $u_type = $email = $gender = "";
$username_err = $password_err = $confirm_password_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["u_name"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT user_id FROM user WHERE u_name = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["u_name"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $u_name = trim($_POST["u_name"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Validate password
    if(empty(trim($_POST["psw"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["psw"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $psw = trim($_POST["psw"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($psw != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
		$sql = "INSERT INTO user (u_name,psw,f_name,l_name,email,utype,gender) values ('$u_name','$psw','$f_name','$l_name','$email','$u_type','$gender')";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $u_name;
            $param_password = password_hash($psw, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: welcome.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
       // mysqli_stmt_close($stmt);
    //}
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html>
<head>
   
    <title>Sign Up</title>
    
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" placeholder="Enter Username" name="u_name" class="form-control" value="<?php echo $u_name; ?>" required>
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" placeholder="Enter Password" name="psw" class="form-control" value="<?php echo $psw; ?>" required>
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password"placeholder="Enter Password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>" required>
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
			<div class="form group">
				<label>Enail Address</label>
				<input type="text" placeholder="Enter Email" name="email" required>
			</div>
			<div class="form group">
				<label>First Name</label>
				<input type="text" placeholder="Enter First Name" name="f_name" required>
			</div>
			<div class="form group">
				<label>Last Name</label>
				<input type="text" placeholder="Enter Last Name" name="l_name" required>
			</div>
			<div class="form group">
				<label>User Type</label>
				<input type="radio" name="u_type" value="landlord" required>Landlord
				<input type="radio" name="u_type" value="tenant" required>Tenant
				<input type="radio" name="u_type" value="administrator" required>Administrator<br><br>
			</div>
			<div class="form group">
				<label>Gender</label>
				<input type="radio" name="gender" value="male" required>Male
				<input type="radio" name="gender" value="female" required>Female<br><br>
			</div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>