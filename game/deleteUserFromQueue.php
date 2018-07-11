<?php
	session_start();
	$filename = "../game/userList.txt";
	$fileContent = file_get_contents($filename);
	$fileContent = str_replace($_SESSION['username'], "");
	file_put_contents($filename, $fileContent);
	?>