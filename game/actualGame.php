<?php
session_start();
require("../lib/Database.class.php");
if(isset($_SESSION['username'])) {
	include('../lib/Smarty/Smarty.class.php');
	$smarty = new Smarty;
	$smarty -> setTemplateDir('../templates/');
	$smarty -> setCacheDir('../lib/smarty/cache');
	$smarty -> setConfigDir('../lib/smarty/config');
	$smarty -> setPluginsDir('../lib/smarty/plugins');
	$smarty -> setCompileDir('../lib/smarty/compile');
	$smarty -> force_compile = true;
	$opponent = $_GET['op'];
	$user = $_SESSION['username'];
	if(userExists($opponent)) {
		deleteUserFromQueue($opponent);
		deleteUserFromQueue($user);
		$content = "<div style='text-align: center'>es spielen gegeneinander: ".$user." (du) gegen ".$opponent."!</div>";
	} else {
		$content = "nanana, so nicht! deinen gegner gibt es garnicht!";
	}
	$smarty -> assign('content', $content);
	$smarty -> display('game.tpl');
}
function userExists($opponent) {
	$db = Database::getInstance();
	$statement = "SELECT * FROM userqueue WHERE username like :username";
	$stmt = $db -> prepare($statement);
	$stmt -> bindParam(":username",$opponent);
	$stmt -> execute();
	$result = $stmt ->fetch(PDO::FETCH_OBJ);
	return isset($result->username);
}
function deleteUserFromQueue($user) {
	
	$db = Database::getInstance();
	$statement = "DELETE FROM userqueue where username like :username";
	$stmt = $db -> prepare($statement);
	$stmt -> bindParam(":username",$user);
	$stmt -> execute();
}