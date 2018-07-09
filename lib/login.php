<?php
  session_start();
  require('../lib/Template.class.php');
  $tpl = new Template();
  
  $content="<br/><form method='post' action='../lib/login_post.php'><br />";
  $content.="<p>Name: <input type='text' name='name' id='name' required /></p>";
  $content.="<p>Passwort: <input type='password' name='pw' id='pw' required /></p>";
  $content.="<a href='../lib/forgotPass.php'>Forgot password...</a><br/>";
  $content.="<input class='button' type='submit' name='submitLoginForm'  value='Log in' />";
  $content.="</form>";
  if(isset($_SESSION["loginError"])) {
    $content.="<h4>".$_SESSION["loginError"]."</h4>";
  }elseif(isset($_SESSION["info"])) {
    $content.="<h4>".$_SESSION["info"]."</h4>";
    session_unset();
  }
  $content.="<form method='post' action='../index.php'><br />";
  $content.="<input class='button' type='submit' name='submit'  value='Zurück' />";
  $content.="</form><br/>";
  
  $tpl->assign('script', '');
  $tpl->assign('content', $content);
  $tpl->assign('url', '../');
  $tpl->display('../templates/index.html');
?>