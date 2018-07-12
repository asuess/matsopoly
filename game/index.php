<?php
session_start();
	include('../lib/Smarty/Smarty.class.php');
	if(isset($_SESSION['username']) && isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']===true) {
		$content = "";
		$smarty = new Smarty;
		$smarty -> setTemplateDir('../templates/');
		$smarty -> setCacheDir('../lib/smarty/cache');
		$smarty -> setConfigDir('../lib/smarty/config');
		$smarty -> setPluginsDir('../lib/smarty/plugins');
		$smarty -> setCompileDir('../lib/smarty/compile');
		$smarty -> force_compile = true;
		
		$content .= "<script type='text/javascript' src='../js/userListTools.js'></script>";
		$content .= "<div id='queueMessage' style='text-align: center; margin-bottom: 10%'></div>";
		$content .= "<div id='warteliste' style='margin: 0 auto; text-align: center; border: 1px dotted;'> 
		<span style='text-align: center; font-size: 120%; text-decoration: underline;'>Warteliste</span><br><ul id='warteListeObj'></ul>
		<img src='../game/ajax-loader.gif' alt='Wartebild'/></div>";
		$smarty -> assign('content', $content);
		$smarty -> display('index.tpl');
		
		
	} else {
		header("Location: ../index.php");
	}
		?> 