<?php
session_start();

require_once('../lib/Database.class.php');

if(isset($_POST['username'])) {
	$username=filter_var(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$pw=password_hash(filter_input(INPUT_POST, 'password'), PASSWORD_DEFAULT);
	
	if(userAccepted($username, $pw)) {
		$_SESSION['username'] = $username;
	} else {
		$_SESSION['loginError'] = "Login nicht erfolgreich. Username/Passwort falsch";
	}
	header('Location: '.$_POST['site']);
}
function userAccepted($user, $pw) {
	$conn = Database::getInstance();
	$sql = "SELECT * FROM users where name = :name AND password = :pw";
	$statement = $conn -> prepare($sql);
	$statement -> bindParam('name', $user);
	$statement -> bindParam('pw', $pw);
	$statement -> execute();
	$user = $statement -> fetch();
	if($user != null) {
		return true;
	}
	return false;
	}
	?>