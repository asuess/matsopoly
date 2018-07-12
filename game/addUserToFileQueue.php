<?php
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	$username = $_POST['user'];
	require("../lib/Database.class.php");
	$db = Database::getInstance();
	$statement = "INSERT INTO userqueue VALUES(:user)";
	$stmt = $db -> prepare($statement);
	$stmt -> bindParam(":user",$username);
	$stmt -> execute();
	echo $username;
	?>