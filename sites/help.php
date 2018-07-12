<?php
include('../lib/Smarty/Smarty.class.php');
$smarty = new Smarty;
$smarty -> setTemplateDir('../templates/');
$smarty -> setCacheDir('../lib/smarty/cache');
$smarty -> setConfigDir('../lib/smarty/config');
$smarty -> setPluginsDir('../lib/smarty/plugins');
$smarty -> setCompileDir('../lib/smarty/compile');
$smarty -> force_compile = true;

$content = "";

$content .= "<p> Hier beantworten wir noch ein paar Fragen!</p>";
$content.= "<ul><li> Wie seid ihr auf die Idee gekommen? </li>";
$content .= "> Keine Ahnung.. wir sind ziemlich durch.";
$content .= "<li>Matsopoly?</li>";
$content .= "> Matsopoly!";
$content .= "<li>Was wird aus diesem Ding hier?</li>";
$content .= "> keine Ahnung, wird bestimmt irgendwann fertig gemacht.";
$content .= "> Just for the lulz<br></ul>";

$content .= "Projekt erstellt von: Muthia Dewi Alawiyah, Patrick Dautzenberg, Dennis Knops, Alexander Süßmuth";
$smarty -> assign('content', $content);
$smarty -> display('default_layout.tpl');



