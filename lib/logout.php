<?php
  session_start();
  require('../lib/Template.class.php');
  $tpl = new Template();
  session_destroy();
  $content="<br /><h1>Logout succeeded</h1>";
  $content.="<form method='post' action='../index.php'><br />";
  $content.="<input class='button' type='submit' name='submit'  value='Zurück' />";
  $content.="</form><br/>";
  
  $tpl->assign('script', '');
  $tpl->assign('content', $content);
  $tpl->assign('url', '../');
  $tpl->display('../templates/index.html');
?>