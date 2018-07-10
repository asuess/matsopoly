<?php
  session_start();
  require('../lib/Template.class.php');
  $tpl = new Template();
  
  $content="<br/><form method='post' action='../lib/forgotPass_post.php'><br />";
  $content.="<p>Email: <input type='email' name='email' id='email' required /></p>";
  $content.="<input class='button' type='submit' name='submitForgotPassForm'  value='Enter' />";
  $content.="</form>";
  if(isset($_SESSION["forgotPassError"])) {
    $content.="<h4>".$_SESSION["forgotPassError"]."</h4>";
  }
  $content.="<form method='post' action='../index.php'><br />";
  $content.="<input class='button' type='submit' name='submit'  value='Zurück' />";
  $content.="</form><br/>";
  
  $tpl->assign('script', '');
  $tpl->assign('content', $content);
  $tpl->assign('url', '../');
  $tpl->display('../templates/index.html');
?>