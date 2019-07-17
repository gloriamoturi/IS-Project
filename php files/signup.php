<?php
include("config.php");
$u_name=$_POST['u_name'];
$email=$_POST['email'];
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$psw=$_POST['psw'];
$u_type=$_POST['u_type'];
$gender=$_POST['gender'];
$param_password = password_hash($psw, PASSWORD_DEFAULT); // Creates a password hash
$sql = "INSERT INTO user (u_name,psw,f_name,l_name,email,u_type,gender) values ('$u_name','$param_password','$f_name','$l_name','$email','$u_type','$gender')";


//worked

if ($conn->query($sql) === TRUE) {
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      function login($u_name,$psw){
    global $conn;
    $query = "SELECT user_id FROM user WHERE u_name = '$u_name'";

    $result_set=mysqli_query($conn,$query);
        if (mysqli_num_rows($result_set) === 1) {
            $row = mysqli_fetch_assoc($result_set);
            if (password_verify($psw, $row['psw'])) {
                $_SESSION['login_user'] = $row[u_name];
                 header("location: welcome.php");
            }else{
                echo " <script>alert('Password is incorrect');</script>  ";
            }
        }else{
            echo " <script>alert('No username found: {$u_name}');</script>  ";
        }


}

$u_name = mysqli_real_escape_string (  $conn,  $_POST['u_name']);
$psw= mysqli_real_escape_string (  $conn,  $_POST['psw']);
login($u_name,$psw);
      /*$myusername = mysqli_real_escape_string($conn,$_POST['u_name']);
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
   }*/
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

