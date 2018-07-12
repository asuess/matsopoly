<?php
	session_start();
	$filename = "../game/userList.txt";
	$db = Database::getInstance();
	$statement = "DELETE FROM userqueue WHERE username LIKE :username";
	$statement = $db -> prepare($statement);
	$statement -> bindParam(":username",$_SESSION['username']);
	$statement -> execute();
	?>