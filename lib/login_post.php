<?php
  session_start();
  $username=filter_var(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $pw=filter_input(INPUT_POST, 'pw');
  
  $_POST = array();
  require('../lib/functions.php');
  $loggedIn = isLoginCorrect($username, $pw);
  if($loggedIn) {
    session_unset();
    $loggedInUser = getUser($username);
    $_SESSION["name"]=$loggedInUser["name"];
    $_SESSION["descr"]=(empty($loggedInUser["description"])?"-":$loggedInUser["description"]);
    header("location:../lib/userdata.php");
  } else {
    $_SESSION["loginError"] = "Please re-enter the correct username and password";
    header("location:../lib/login.php");
  }
?>