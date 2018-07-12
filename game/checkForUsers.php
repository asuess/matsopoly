<?php
	session_start();
	echo getCurrentQueue();
	
	function getCurrentQueue() {
	require("../lib/Database.class.php");
	$db = Database::getInstance();
	$statement = "SELECT * FROM userqueue";
	$stmt = $db -> prepare($statement);
	$stmt -> execute();
	$content = "";
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$content .= $row['username'].";";
	}
	return $content;
}
