<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
  session_start();
  require('lib/Template.class.php');
  $tpl = new Template();
  
  //2 Buttons->Anzeigen und Register + error message
  
  $content="<br/><h1>Welcome!</h1>";
  $content.="<h3>Choose one of the options below!</h3>";
  if(isset($_SESSION["user"]) && isset($_SESSION["note"])) {
    $content.="<form method='post' action='lib/userdata.php'><br />";
    $content.="<input class='button' type='submit' name='goUserdata'  value='Go To Landing Page' />";
    $content.="</form>";
  } else {
    $content.="<form method='post' action='lib/register.php'><br />";
    $content.="<input class='button' type='submit' name='goRegister'  value='Registrieren' />";
    $content.="</form>";
    $content.="<form method='post' action='lib/login.php'><br />";
    $content.="<input class='button' type='submit' name='goLogin'  value='Anmelden' />";
    $content.="</form>";
  }
  
  $tpl->assign('script', '');
  $tpl->assign('content', $content);
  $tpl->assign('url', '');
  $tpl->display('templates/index.html');
?>
