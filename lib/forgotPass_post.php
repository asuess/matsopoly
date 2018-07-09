<?php
  session_start();
  $email= filter_var(filter_input(INPUT_POST, 'email'), FILTER_SANITIZE_EMAIL);
  
  $_POST = array();
  require('../lib/functions.php');
  
  //TODO
  $emailRegistered= isEmailRegistered($email);
  
  if($emailRegistered) {
    session_unset();
    $sent=sendMailNewPass($email);
    $_SESSION["info"] = "An $sent E-Mail with a new login data has just sent to: $email";
    header("location:../lib/login.php");
  } else {
    $_SESSION["forgotPassError"] = "Please re-enter the correct email";
    header("location:../lib/forgotPass.php");
  }
?>