<?php
  session_start();
  require('../lib/Template.class.php');
  $tpl = new Template();
  
  $script="";
  require('../lib/functions.php');
  $loggedInUser = getUser($_SESSION["name"]);
  
  $content="<br/><form method='post' action='../lib/editProfile_post.php'><br />";
  $content.="<p>Name: ".$loggedInUser['name']."</p>";
  $content.="<p>Old Passwort: <input type='password' name='oldPw' id='oldPw' placeholder='old password' required /></p>";
  $content.="<p>New Passwort: <input type='password' name='newPw' id='newPw' placeholder='new password' required /></p>";
  $content.="<p>Email: ".$loggedInUser['email']."</p>";
  $content.="<p>Description: <textarea type='text' name='descr' id='descr' placeholder='description'>".$loggedInUser['description']."</textarea></p>";
  $content.="<p>Points: ".$loggedInUser['points']."</p>";
  $content.="<input class='button' type='submit' name='submitEditForm' value='Edit' />";
  $content.="</form>";
  $content.="<form method='post' action='../index.php'><br />";
  $content.="<input class='button' type='submit' name='submit'  value='Zurück' />";
  $content.="</form><br/>";
  
  $tpl->assign('script', $script);
  $tpl->assign('content', $content);
  $tpl->assign('url', '../');
  $tpl->display('../templates/index.html');
?>