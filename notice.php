

<html>
	<head>

  <link href="stylesheet.css" rel="stylesheet" type="text/css">
        <title>Notices</title>
        <style type="text/css">
   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
   	width: 50%;
   	margin: 20px auto;
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
	 background="note.jpg";
   	width: 80%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   img{
   	float: left;
   	margin: 5px;
   	width: 300px;
   	height: 140px;
   }
   body {
  
  background-size: cover;
  background-repeat:no-repeat;
 
}

.success {
  
  
  background-color: #ddffdd;
  border-left: 6px solid #4CAF50;
}
</style>
		
    </head>
    <?php
    require_once('session.php');
    include("config.php");
    include("bs.html");
    error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
    
    if($session_u_type=='landlord'){
        include('linkbar.php');
     }
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
     ?>
    <body class="loggedin">
		
		<div class="content">
    <?php
     
    
    echo  "<h2 style='color:black;'>NOTICES</h2>";
if($session_u_type=='landlord'){
   
    echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Add Notice
  </button><br>';
    
}

$sql = "SELECT * from notice_details ORDER BY notice_id DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		
        if($row['n_status']=="displayed"){
            echo "<div class='success'><br><strong>  " . $row["n_name"]."</strong><br> " . $row["n_description"]. "<br> <span style='color:grey; float:right;'> " .$row["n_date"] ."</span><br>";
                echo "</div>";
        }
	}
} else {
    echo "0 results";
}
$conn->close();
?>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="background-color: transparent !important;">
  
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Notice Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
       
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="POST" action="notice.php">
          <div class="form-group">
            <label for="n_name" class="col-form-label">Notice Name:</label>
            <input type="text" class="form-control" id="n_name" name="n_name" >
          </div>
          <div class="form-group">
            <label for="n_description" class="col-form-label">Description:</label>
            <textarea class="form-control" id="n_description" name ="n_description" ></textarea>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="upload">Send</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
</body>
</html>