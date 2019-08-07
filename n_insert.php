<?php
include("config.php");
 include('session.php');


if (isset($_POST['upload'])) {
	$n_name=$_POST['n_name'];
    $n_description=$_POST['n_description'];
  $n_status='displayed';
  if (!empty($n_name)||!empty($n_description)||!empty($f_name)){
  $sql = "INSERT INTO notice_details (n_name,n_description,user_id,n_date,n_status) values ('$n_name','$n_description','$login_session_id',CURRENT_TIMESTAMP,'$n_status')";
  //worked
  
  mysqli_query($conn, $sql);
  header("location:notice.php");
      

}	
}



$conn->close();
?>

<html>
<head>
<title>Notice</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password], input[type=date],textarea{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
<form method="POST" action="">

  
    <h1>Notice Details</h1>
   <label for="n_name"><b>Notice Name</b></label>
    <input type="text" placeholder="Enter Notice Name" name="n_name" required>

	<label for="n_description"><b>Description</b></label>
    <div>
      <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="n_description" 
      	placeholder="Description"></textarea>
  	</div>
	
  	

   <!-- <label for="podate"><b>Submission Date</b></label>
    <input type="date" placeholder="Enter Submission Date" name="podate" required>-->
	
      
	  
	  <div>
  		<button type="submit" name="upload">POST</button>
  	</div>
	  <a class="login100-form-btn" href="notice.php">Cancel</a>
	  
    
  
</form>

</body>
</html>