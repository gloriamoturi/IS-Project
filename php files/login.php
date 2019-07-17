<?php
   include("config.php");
   session_start();
   $error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['u_name']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['psw']); 
      
      $sql = "SELECT user_id FROM user WHERE u_name = '$myusername' and psw = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         
         $_SESSION['login_user'] = $myusername;
		 
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
<head>
<link rel="icon" href="C:\Users\Absolom\Pictures\house.png" type="image" sizes="16x16">
  <title>Login</title>
<style>

body {font-family: Arial, Helvetica, sans-serif;
 width: 50%;
  display: block;
margin-left: auto;
  margin-right: auto;
  background-color: grey;}
form {border: 3px solid #f1f1f1;}
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 20%;
  color:yellow;
}

h1{
text-align: center;
background-color: white;
color:black;
}


p{
text-align:right;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {

  background-color:green;
  color: white;
  padding: 14px 20px;
  
  border: none;
  cursor: pointer;
  width: 50%;
  display: block;
  margin-left: auto;
  margin-right: auto;
}

button:hover {
  opacity: 0.8;
}




</style>
</head>
<body>
<div style="background-color:white">
<?php 
if($error != ""){
?>
<p class="loginError"><?php echo $error; ?></p>
<?php 
}
$error = "";
?>
<form action="" method="post">
  <h1>Login Form</h1>
 <img src="C:\Users\Absolom\Pictures\house.png" alt="logo" >
    
    <label for="u_name"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="u_name" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
       
    <button type="submit">Login</button>
	<button type="button" class="cancelbtn">Cancel</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  
  <h2>Not registered?<a href="signup.html">Create an account</a></h2>
    <p>Forgot <a href="#">password?</a></p>
  
</form>
</div>

</body>
</html>
