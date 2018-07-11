<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('..\lib\smarty\Smarty.class.php');
require_once('..\lib\Database.class.php');
$smarty = new Smarty;
$smarty -> setTemplateDir('../templates/');
$smarty -> setCacheDir('../lib/smarty/cache');
$smarty -> setConfigDir('../lib/smarty/config');
$smarty -> setPluginsDir('../lib/smarty/plugins');
$smarty -> setCompileDir('../lib/smarty/compile');
$smarty -> force_compile = true;
$sql = "INSERT INTO users(name, email, password, points) VALUES (:name , :mail, :password ,0)";

	if(isset($_SESSION['username'])) {
		$content = "<div style='text-align: center;'>Keine Ahnung wie du hier gelandet bist, aber hier gehörst du defintiv nicht hin! Du bist schließlich schon eingeloggt!<br>";
		$content .= "<span style='font-size: 400%; text-align: center; margin: 0 auto;'> ERROR </span></div>";
		$smarty -> assign('content', $content);
		$smarty -> display('default_layout.tpl');
	} else {
		
		$username=filter_var(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$pw =filter_input(INPUT_POST, 'password');
		$pw2 = filter_input(INPUT_POST, 'password_verify');
		$mail= filter_var(filter_input(INPUT_POST, 'mail'), FILTER_SANITIZE_EMAIL);
		$errorMessage = validateInputs($username, $pw, $pw2,$mail);
		
		if($errorMessage != null) {
			$_SESSION['loginError'] = $errorMessage;
			header("Location: ".$_POST['returnSite']);
		} else {
			$pwHashed=password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT);
			$conn = Database::getInstance();
			$statement = $conn->prepare($sql);
			$statement -> bindParam(":name", $username);
			$statement -> bindParam(":mail", $mail);
			$statement -> bindParam(":password", $pwHashed);
			$statement -> execute();
			$id = $conn -> lastInsertId();
			$smarty->assign('content', "<div style='text-align: center'>Neuen Nutzer mit Namen ".$username." und ID ".$id." angelegt!");
			$smarty -> display('default_layout.tpl');
			$_SESSION['username'] = $username;
			$_SESSION['loggedIn'] = true;
	}
	}
	
	function validateInputs($username, $pw, $pw2, $mail) {
		
		if(empty(trim($username))) {
			return "kein Username angegeben!";
		} else if(empty(trim($pw)) || empty(trim($pw2))) {
			return "kein Passwort angegeben!";
		} else if(empty(trim($mail))) {
			return "keine Mail angegeben!";
		} else if(strcmp($pw,$pw2) != 0) {
			return "Passwörter waren nicht identisch!";
		} else if(strrpos($mail, "@")===false) {
			return "Mail ungültig";
		} else if(userExists($username)) {
			return "User mit diesem Namen existiert bereits";
		} else {
			return null;
		}
	}
	function userExists($user) {
		$conn = Database::getInstance();
		$sql = $conn -> prepare("SELECT COUNT(*) FROM users WHERE name LIKE :user");
		$sql -> bindParam(":user", $user);
		$sql->execute();
		$numRows = $sql ->fetchColumn();
		return $numRows > 0;
		
	}