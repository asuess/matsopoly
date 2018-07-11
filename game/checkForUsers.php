<?php
	session_start();
	$filepath = '../game/userList.txt';
	$content = getUsersFromFile($filepath);
	if(strpos($content, $_SESSION['username']) === false) {
		$content .= $_SESSION['username'].";";
	}
	echo $content;
	
	function getUsersFromFile($filepath) {
	$content = "";
	while(($line = fgets($file)) !== false) {
		if(strpos($content, $line) !== false) {
			$content .= $line.";"
		}
	}
	return $content;
	}
