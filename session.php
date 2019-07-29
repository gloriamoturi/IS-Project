<?php
   include('config.php');
   session_start();
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select * from user where u_name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['u_name'];
   $login_session_id = $row['user_id'];
   $_SESSION['user_id'] = $row['user_id'];
   $session_u_type=$row['u_type'];
   $session_property=$row['property'];
   $session_user_id = $row['user_id'];
   
   
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>