<?php
  // Create database connection
  
   
   include('linkbar.php');
  

   
   $user_id = $_GET['user_id'];
   $u_name = $_GET['u_name'];
  if (isset($_POST['upload'])) {
  $msg_status='displayed';
  	// Get text
  	$msg = $_POST['msg'];
	if (!empty($msg)){
	$sql = "INSERT INTO msgs (sender_id,user_id,msg,msg_date,msg_status ) VALUES ('$login_session_id','$user_id','$msg',CURRENT_TIMESTAMP,'$msg_status')";
	if ($conn->query($sql) === TRUE) {
    
	}else{
		echo "no";
	}
  }
  }
  ?>
<!DOCTYPE html>
<html>
<head>
<title>Chat</title>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link href="stylesheet.css" rel="stylesheet" type="text/css">
		<link href="chats.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.js"></script>

<style type="text/css">
   

.time-right {
  float: right;
  color: #aaa;
}
.time-left {
  float: left;
  color: #999;
}
#searchbar{ 
	
     padding:5px; 
     border-radius: 5px; 
   } 
 
   input[type=text] { 
      width: 30%; 
      -webkit-transition: width 0.15s ease-in-out; 
      transition: width 0.15s ease-in-out; 
   } 
 
   /* When the input field gets focus, 
        change its width to 100% */
   input[type=text]:focus { 
     width: 70%; 
   } 
 
  #list{ 
    font-size:  1.5em; 
    margin-left: 90px; 
   } 
 
.posts{ 
   display: list-item;     
  }  
</style>
<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body class="loggedin">
		
		<div class="content">
		


<h2><a href="chats.php">All Chats</a></h2>
<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				
				<div class="col-md-12 col-xl-10 chat">
					<div class="card">
						<div class="card-header msg_head">
							<div class="d-flex bd-highlight">
								
								<div class="user_info">
								
									

    <?php
  include("config.php");
  
  $sql = "SELECT msgs.msg_id,msgs.sender_id,msgs.user_id,msgs.msg,msgs.msg_date,msg_status, user.u_name,user.user_id FROM msgs INNER JOIN user ON msgs.user_id=user.user_id" ;
$result = $conn->query($sql);
$r = $result->fetch_assoc();
echo "<span>".$u_name."</span><br><input id='searchbar' onkeyup='search_posts()' type='text'
name='search' placeholder='Search ..'>
<ol id='list'></div></div></div>";
echo "<div class='card-body msg_card_body'>";

  if ($result->num_rows > 0) {
	  
    // output data of each row
    while($row = $result->fetch_assoc()) {
		if($row['user_id']=="$user_id" && $row['sender_id']=="$login_session_id"||$row['user_id']=="$login_session_id" && $row['sender_id']=="$user_id"){
		if($row['msg_status']=="displayed"){
			if($row['sender_id']=="$login_session_id"){
				echo "<li class='posts'style='list-style-type:none'><div class='d-flex justify-content-end mb-4'><div class='msg_cotainer_send'>".$row['msg']."<br><span class='time-right'>".$row['msg_date']."</span><br> <a href=\"d_msg.php?msg_id=$row[msg_id]&user_id=$user_id\" onClick=\"return confirm('Are you sure you want to delete the message?')\">Delete Message</a></div>
								 
							</div></li>
							
							
							";
				
		}else{
			echo "<li class='posts'style='list-style-type:none'>
							<div class='d-flex justify-content-start mb-4'><div class='msg_cotainer'>".$row['msg']."<br><span class='time-left'>".$row['msg_date']."</span></div>
							</div></li>";
		}
		
		
    }
  }
  }
  }
  
  
    
  ?>
  </ol>
  </div>
  <form method="POST" action="">
  <div class="card-footer">
							<div class="input-group">

								<textarea name="msg" class="form-control type_msg" placeholder="Type your message..."></textarea>
								<div class="input-group-append">
									<span class="input-group-text send_btn"><button type="submit" name="upload"><i class="fas fa-location-arrow"></i></button></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			var height = 0;
$('.msg_card_body').each(function(i, value){
    height += parseInt($(this).height());
});

height += '';

$('.msg_card_body').animate({scrollTop: height});
			</script>
			<script>
function search_posts() { 
    let input = document.getElementById('searchbar').value 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName('posts'); 
      
    for (i = 0; i < x.length; i++) {  
        if (!x[i].innerHTML.toLowerCase().includes(input)) { 
            x[i].style.display="none"; 
        } 
        else { 
            x[i].style.display="list-item";                  
        } 
    } 
}
</script> 
	</body>
</html>

  	