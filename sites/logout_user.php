<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	if(isset($_SESSION['username'])) {
		unset($_SESSION['username']);
		$_SESSION['loggedIn'] = false;
		$_SESSION['loginError'] = "Erfolgreich ausgeloggt";
	}
	header('Location: ../index.php');