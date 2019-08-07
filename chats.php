<?php
   
   include('linkbar.php');
  
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
	</head>
	
	<body class="loggedin">
		
		<div class="container-fluid h-100">
			<div class="row justify-content-center h-100">
				<div class="col-md-10 col-xl-6 chat"><div class="card mb-sm-3 mb-md-0 contacts_card">
					<div class="card-header">
					<form>
						<div class="input-group">
						
							<input id="searchbar" onkeyup="search_user()" 
        name="search"type="text" placeholder="Search..."  class="form-control search">
							<div class="input-group-prepend">
								<span class="input-group-text search_btn"><button type="submit" name="upload"><i class="fas fa-search"></i></span>
							
							</div>
						</div>
					</form>
					</div>
					<div class="card-body contacts_body">
						<ui class="contacts">
						
<?php
   
    
   $sql="SELECT * FROM user WHERE property='$session_property' ";
   $result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
   // output data of each row
       while($row = mysqli_fetch_array($result)) {
		if($row['status']=="active"){
			if($row['u_name']!="$login_session")

   echo "<li class='active'>
							<div class='d-flex bd-highlight'>
								<div class='img_cont'>
									<img src='user.jpg' class='rounded-circle user_img'>".
									// <img src='images/".$row["u_image"]." class='rounded-circle user_img'>
									
								"</div>
								<div class='user_info'>
									<span>".$row["u_name"]."</span>
									<p>".$row["f_name"]." ".$row["l_name"]."<br> House Number : 
									".$row["h_no"]."</p>
									<p>"."<a href=\"chats_i.php?user_id=$row[user_id]&u_name=$row[u_name]\">Message</a>"."</p>
								</div>
							</div>
						</li>";
	

		}
	   }
	}
		 else { echo "0 results"; }

    

//$conn->close();
   ?>
					</ui>
					</div>
					</div>
					</div>
					</div>
					<script>
					// JavaScript code 
function search_user() { 
    let input = document.getElementById('searchbar').value 
    input=input.toLowerCase(); 
    let x = document.getElementsByClassName('active'); 
      
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
   
   
   