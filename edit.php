<?php
//not working
// including the database connection file
include("config.php");
include("bs.html");
 
if(isset($_POST['update']))
{  
$user_id=$_POST['user_id']; 
$u_name=$_POST['u_name'];
$email=$_POST['email'];
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$property=$_POST['property'];
$u_type=$_POST['u_type'];
$gender=$_POST['gender'];

    
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
        //updating the table
        $result = mysqli_query($conn, "UPDATE user SET u_name='$u_name',email='$email',f_name='$f_name',l_name='$l_name',property='$property',u_type='$u_type',gender='$gender' WHERE user_id=$user_id");
        echo"Record updated";
		header("Location:profile.php");
        
    }
}
?>
<?php
//getting id from url
$user_id = $_GET['user_id'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM user WHERE user_id=$user_id");
 
while($res = mysqli_fetch_array($result))
{
    $u_name = $res['u_name'];
    $email = $res['email'];
	$f_name = $res['f_name'];
    $l_name = $res['l_name'];
	$property = $res['property'];
    $u_type= $res['u_type'];
	$gender = $res['gender'];
}
?>
<html>
<head>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
  
    <title>Edit Data</title>
</head>
 
<body >
    
    <br/><br/>
    
    <form style="background:white;"name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Username</td>
                <td><input type="text" name="u_name" value="<?php echo $u_name;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
			<tr> 
                <td>First Name</td>
                <td><input type="text" name="f_name" value="<?php echo $f_name;?>"></td>
            </tr>
            <tr> 
                <td>Last Name</td>
                <td><input type="text" name="l_name" value="<?php echo $l_name;?>"></td>
            </tr>
            <tr> 
                <td>Property</td>
                <td><input type="text" name="property" value="<?php echo $property;?>"></td>
            </tr>
            <tr> 
                <td>User Type</td>
                <td><input type="text" name="u_type" value="<?php echo $u_type;?>"></td>
            </tr>
			<tr> 
                <td>Gender</td>
                <td><input type="text" name="gender" value="<?php echo $gender;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="user_id" value=<?php echo $_GET['user_id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
                <td><a  class='btn btn-secondary btn-sm btn float-right' href="profile.php">Cancel</a></td>
            </tr>
        </table>
    </form>
</body>
</html>