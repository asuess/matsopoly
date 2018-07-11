<?php
session_start();
include('C:\xampp\htdocs\matsopoly\lib\smarty\Smarty.class.php');
$content = "";
$smarty = new Smarty;
$smarty -> setTemplateDir('templates/');
$smarty -> setCacheDir('lib/smarty/cache');
$smarty -> setConfigDir('lib/smarty/config');
$smarty -> setPluginsDir('lib/smarty/plugins');
$smarty -> setCompileDir('lib/smarty/compile');
$smarty -> force_compile = true;

if(isset($_SESSION['loginError'])) {
	$content .="<p style='color: red'>".$_SESSION['loginError']."!";
	unset($_SESSION['loginError']);
}
$content .= '<p style="text-align: center">Hallo und herzlich Willkommen zu <b>Matsopoly</b> - das "etwas" andere Monopoly!</p>';
$content .= '<p>In diesem Spiel erwarten dich einige bekannte Begriffe aus dem Lebensraum der Matse-Ausbildung, beginnend bei Dozenten, 
über charakeristische Begriffe aus den Vorlesungen und dem allgemeinn Studentenleben in Aachen, zu Dingen, die wir schlicht witzig fanden!</p>';
$content .= '<p>Wir hoffen, Ihr habt Spaß mit unserem kleinen Spiel und dass es euch ein kleines Lachen ins Gesicht zaubert! Viel Spaß!';
$smarty -> assign('content', $content);
$smarty -> display('index.tpl');