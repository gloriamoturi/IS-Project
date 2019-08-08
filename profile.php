<?php
include("config.php");
include('linkbar.php');
include('bs.html');

//error_reporting(0);
// We need to use sessions, so you should always start sessions using the below code.

// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['login_user'])) {
    header('Location: welcome.php');
    exit();
}

// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $conn->prepare('SELECT u_name,f_name,l_name,email,u_type,gender,property,h_no,u_image FROM user WHERE user_id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($u_name,$f_name,$l_name,$email,$u_type,$gender,$property,$h_no,$u_image);
$stmt->fetch();
$stmt->close();
?>

<html>
<head>
<title>Profile </title>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body >
        
        <div class="content">

<div class="card mb-4" style="max-width: 700px;margin:0 auto;float:none;align:centre; ">
  <div class="row no-gutters">
    <div class="col-md-4">
      
      <?php echo "<img src='images/".$u_image."'class='card-img' style='width:100%;height:60%;' alt='...' >" ?>
    </div>
    <div class="col-md-8">
      <div class="card-body" style="align:centre;">
        <h3 style="color:black;margin-left:30px;" class="card-title">Account details</h3>

<p class="card-text">       
<div>
                
                <table>
                    <tr>
                        <td>Username:</td>
                        <td> <?php echo $u_name ?></td>
                    </tr>
                    <tr>
                        <td>First Name:</td>
                        <td> <?php echo $f_name ?></td>
                    </tr>
                    <tr>
                        <td>Last Name:</td>
                        <td> <?php echo $l_name ?></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><?=$email?></td>
                    </tr>
                    <tr>
                        <td>User Type:</td>
                        <td><?=$u_type?></td>
                    </tr>
                    <tr>
                        <td>Property:</td>
                        <td><?=$property?></td>
                    </tr>
                    <?php
                    if($u_type=='tenant'){
                        echo "<tr><td>House Number:</td><td>".$h_no."</td></tr>";
                    }
                    ?>

                    <tr>
                        <td>Gender:</td>
                        <td><?=$gender?></td>
                    </tr>
                </table>
            </div>
                </p>
                <a href='edit.php?user_id=<?php echo $_SESSION["user_id"] ?>'class='btn btn-primary btn-sm btn float-right'>Edit</a>
                </div>
    </div>
  </div>
  </div>
</div>
    </body>
</html>
</body>
</html>


