<?php 
   include('linkbar.php');
   
?>


<html>
	<head>

	<link href="stylesheet.css" rel="stylesheet" type="text/css">
		<title>Home Page</title>
		
	</head>
	<body class="loggedin">
		
		<div class="content">
			<h2 style="color:white;">Home Page</h2>
			
			<div class="alert alert-light" role="alert">
			Welcome back, <?php echo $login_session; ?>.
</div>
			
			<?php
   
   $stmt = $conn->prepare('SELECT u_type FROM user WHERE user_id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($u_type);
$stmt->fetch();
$stmt->close();

if($u_type=='landlord')
{
	echo "<b><span style='color:white;'>TENANTS</span></b>";
	echo "<a href='notice.php' class='btn btn-primary btn-sm btn float-right' >Notices</a><br><br>";
	
	$sql="SELECT * FROM user WHERE u_type='tenant' AND property='$session_property' ";
	
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
    // output data of each row
	echo '<table class="table table-bordered table-dark ">';
	echo "<thead class='thead-dark'><tr><th>"."User ID"."</th><th>"."Username"."</th><th>"."First Name"."</th><th>"."Last Name"."</th><th>"."Email"."</th><th>"."Property"."</th><th>"."House Number"."</th><th>"."Gender"."</th><th>"."Status"."</th><th>"."Update"."</th></tr></thead>";
    while($row = mysqli_fetch_array($result)) {
		
		echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["u_name"] . "</td><td>". $row["f_name"]. "</td><td>" .$row["l_name"]. "</td><td>" . $row["email"] . "</td><td>". $row["property"]. "</td><td>".$row["h_no"]. "</td><td>". $row["gender"]."</td><td>". $row["status"]. "</td><td>"." <a class='btn btn-secondary' href=\"delete.php?user_id=$row[user_id]\" ";
		if($row["status"]=="active"){
		echo "onClick=\"return confirm('Are you sure you want to deactivate the account?')\">Deactivate</a>"."</td></tr>";
		}else{
			echo "onClick=\"return confirm('Are you sure you want to activate the account?')\">Activate</a>"."</td></tr>";	
		}
         
}
echo "</table>";
} else { echo "0 results"; }
    }else{
		include('notice.php');
	}

//$conn->close();
  
?>
			
		</div>
		<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
	</body>
</html>

