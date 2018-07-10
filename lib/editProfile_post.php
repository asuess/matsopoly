<?php
  session_start();
  require('../lib/Template.class.php');
  $tpl = new Template();
  
  $oldPw=filter_input(INPUT_POST, 'oldPw');
  $newPw=password_hash(filter_input(INPUT_POST, 'newPw'), PASSWORD_DEFAULT);
  $descr= filter_var(filter_input(INPUT_POST, 'descr'), FILTER_SANITIZE_STRING);
  
  require('../lib/functions.php');
  if(isLoginCorrect($_SESSION['name'], $oldPw)) {
    editProfile($_SESSION['name'], $newPw, $descr);
    $edited=true;
  } else {
    $edited=false;
  }
  
  $content="<br /><h1> Your profile ".($edited ? "is updated": "cannot be updated. You entered the wrong password.")."</h1>";
  $content.="<form method='post' action='../index.php'><br />";
  $content.="<input class='button' type='submit' name='submit'  value='Zurück' />";
  $content.="</form><br/>";
  $_POST = array();
  
  $tpl->assign('script', '');
  $tpl->assign('content', $content);
  $tpl->assign('url', '../');
  $tpl->display('../templates/index.html');
?>