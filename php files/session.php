<?php
   include('config.php');
   session_start();
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($conn,"select u_name,user_id from user where u_name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['u_name'];
   $_SESSION['user_id'] = $row['user_id'];
   
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>