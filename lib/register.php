<?php
  require('../lib/Template.class.php');
  $tpl = new Template();
  
  $script="<script type='text/javascript' src='scripts/register.js'></script>";
  
  $content="<br/><form method='post' action='../lib/register_post.php'><br />";
  $content.="<p>Name: <input type='text' name='name' id='name' placeholder='name' required /></p>";
  $content.="<p>Passwort: <input type='password' name='pw' id='pw' placeholder='password' required /></p>";
  $content.="<p>Email: <input type='email' name='email' id='email' placeholder='email' required /></p>";
  $content.="<p>Description: <textarea name='descr' id='descr' placeholder='description' ></textarea></p>";
  $content.="<input class='button' type='submit' name='submitRegisterForm' value='Register' />";
  $content.="</form>";
  $content.="<form method='post' action='../index.php'><br />";
  $content.="<input class='button' type='submit' name='submit'  value='Zurück' />";
  $content.="</form><br/>";
  
  $tpl->assign('script', $script);
  $tpl->assign('content', $content);
  $tpl->assign('url', '../');
  $tpl->display('../templates/index.html');
?>