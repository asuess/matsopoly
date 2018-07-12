<?php
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	//$existingUsers = json_decode($_POST['users']);
	require("../lib/Database.class.php");
	$db = Database::getInstance();
	$statement = "SELECT * FROM user_queue";
	$statement = $db -> prepare($statement);
	$statement -> bindParam(":username",$_SESSION['username']);
	$statement -> execute();
	while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
			echo $row['username'];
	}