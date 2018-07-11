<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('C:\xampp\htdocs\matsopoly\lib\smarty\Smarty.class.php');

$smarty = new Smarty;
$smarty -> setTemplateDir('../templates/');
$smarty -> setCacheDir('../lib/smarty/cache');
$smarty -> setConfigDir('../lib/smarty/config');
$smarty -> setPluginsDir('../lib/smarty/plugins');
$smarty -> setCompileDir('../lib/smarty/compile');
$smarty -> force_compile = true;

$content = "<div style='text-align: center'>";

if(!isset($_SESSION['username'])) {
	if(isset($_SESSION['loginError'])) {
		$content .= "<span style='color: red'>".$_SESSION['loginError']."</span><br>";
		$_SESSION['loginError'] = null;
	}
	$content .= "<span> Fuer die Registrierung benötigen wir folgende Daten: <br>";
	$content .= "<form action='register_user.post.php' method='POST'>";
	$content .= "<table style='margin: 0 auto; border-spacing:1em;'><tr>";
	$content .= "<input type='hidden' value='../sites/register_user.php' name='returnSite'>";
	$content .= "<tr><td>Nutzername:</td><td><input type='text' name='username'></td></tr>";
	$content .= "<tr><td>Passwort:</td><td><input type='password' name='password'></td></tr>";
	$content .= "<tr><td>Wdhl. Passwort:</td><td><input type='password' name='password_verify'></td></tr>";
	$content .= "<tr><td>Mail:</td><td><input type='text' name='mail'></td></tr>";
	$content .= "</table>";
	$content .= " <input type='submit' value='Registrieren!'>";
	$content .= "<form></div>";
} else {
	$content = "Aber du bist doch schon registriert, ".$_SESSION['username']."!";
}
$content .="</div>";
$smarty -> assign('content', $content);
$smarty -> display('default_layout.tpl');