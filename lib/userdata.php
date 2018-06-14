<?php
  session_start();
  require('../lib/Template.class.php');
  $tpl = new Template();
  
  $jumbotron="<h1>Welcome!</h1>";
  $jumbotron.="<h2>User ".$_SESSION["user"]."</h2>";
  $jumbotron.="<h3>Note ".$_SESSION["note"]."</h3>";
  $jumbotron.="<form method='post' action='../index.php'><br />";
  $jumbotron.="<input class='btn btn-primary' type='submit' name='goHome' role='button' value='Go Home' />";
  $jumbotron.="</form>";
  $jumbotron.="<form method='post' action='../lib/logout.php'><br />";
  $jumbotron.="<input class='btn btn-primary' type='submit' name='goLogout' role='button' value='Log out' />";
  $jumbotron.="</form>";
  
  $tpl->assign('jumbotron', $jumbotron);
  $tpl->assign('url', '../');
  $tpl->display('../templates/userdata.html');
?>