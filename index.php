<?php
session_start();
include('C:\xampp\htdocs\matsopoly\lib\smarty\Smarty.class.php');

$smarty = new Smarty;
$smarty -> setTemplateDir('templates/');
$smarty -> setCacheDir('lib/smarty/cache');
$smarty -> setConfigDir('lib/smarty/config');
$smarty -> setPluginsDir('lib/smarty/plugins');
$smarty -> setCompileDir('lib/smarty/compile');
$smarty -> force_compile = true;

$firstPara = '<p style="text-align: center">Hallo und herzlich Willkommen zu <b>Matsopoly</b> - das "etwas" andere Monopoly!</p>';
$secondPara = '<p>In diesem Spiel erwarten dich einige bekannte Begriffe aus dem Lebensraum der Matse-Ausbildung, beginnend bei Dozenten, 
über charakeristische Begriffe aus den Vorlesungen und dem allgemeinn Studentenleben in Aachen, zu Dingen, die wir schlicht witzig fanden!</p>';
$thirdPara = '<p>Wir hoffen, Ihr habt Spaß mit unserem kleinen Spiel und dass es euch ein kleines Lachen ins Gesicht zaubert! Viel Spaß!';
$smarty -> assign('content', $firstPara.$secondPara.$thirdPara);
$smarty -> display('index.tpl');