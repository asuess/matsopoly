<?php
  require('../lib/Template.class.php');
  $tpl = new Template();
  
  $username=filter_var(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
  $pw=password_hash(filter_input(INPUT_POST, 'pw'), PASSWORD_DEFAULT);
  $email= filter_var(filter_input(INPUT_POST, 'email'), FILTER_SANITIZE_EMAIL);
  $descr= filter_var(filter_input(INPUT_POST, 'descr'), FILTER_SANITIZE_STRING);
  
  require('../lib/functions.php');
  $toBeEchoed= getUser($username);
  $checkExistance = isUserNameTaken($username) ? "The username is taken, please pick another username.":(isEmailRegistered($email)?"The E-Mail address is already registered.":""); 
  if(empty($checkExistance)) {
    if(doesMailExist($email)) {
      $registered = insertUser($username, $pw, $email, $descr);
    } else {
      $checkExistance = "The E-Mail address is invalid.";
      $registered = false;
    }
  } else {
    $registered = false;
  }
  $content="<br /><h1> Registration ".($registered ? "succeeded": "failed. $checkExistance")."</h1>";
  $content.="<form method='post' action='../index.php'><br />";
  $content.="<input class='button' type='submit' name='submit'  value='Zurück' />";
  $content.="</form><br/>";
  $_POST = array();
  
  $tpl->assign('script', '');
  $tpl->assign('content', $content);
  $tpl->assign('url', '../');
  $tpl->display('../templates/index.html');
?>