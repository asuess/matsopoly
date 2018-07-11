<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once('../lib/Database.class.php');

if(isset($_POST['username'])) {
	$username=filter_var(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$pw=filter_input(INPUT_POST, 'password');
	
	if(userAccepted($username, $pw)) {
		$_SESSION['username'] = $username;
		$_SESSION['loggedIn'] = true;
	} else {
		$_SESSION['loginError'] = "Login nicht erfolgreich. Username/Passwort falsch";
	}
	header('Location: '.$_POST['site']);
}
function userAccepted($user, $pw) {
	$conn = Database::getInstance();
	$sql = "SELECT password FROM users where name = :name";
	$statement = $conn -> prepare($sql);
	$statement -> bindParam('name', $user);
	$statement -> execute();
	$storedPw = $statement -> fetchColumn();
	if($storedPw != null && password_verify($pw, $storedPw)) {
		return true;
	}
	return false;
	}
	?>