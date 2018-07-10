<?php

session_start();
include('C:\xampp\htdocs\matsopoly\lib\smarty\Smarty.class.php');

$smarty = new Smarty;
$smarty -> setTemplateDir('../templates/');
$smarty -> setCacheDir('../lib/smarty/cache');
$smarty -> setConfigDir('../lib/smarty/config');
$smarty -> setPluginsDir('../lib/smarty/plugins');
$smarty -> setCompileDir('../lib/smarty/compile');
$smarty -> force_compile = true;


	if(isset($_POST['username'])) {
		
	} else {
		$content = "<div style='text-align: center;'>Keine Ahnung wie du hier gelandet bist, aber hier geshörst du defintiv nicht hin!<br>";
		
		$content .= "<span style='font-size: 400%; text-align: center; margin: 0 auto;'> ERROR 404 </span></div>";
		
		$smarty -> assign('content', $content);
		$smarty -> display('default_layout.tpl');
	}