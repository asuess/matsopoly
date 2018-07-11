<?php 
session_start();
	if(isset($_SESSION['username'])) {
		unset($_SESSION['username']);
		$_SESSION['loginError'] = "Erfolgreich ausgeloggt";
	}
	header('Location: ../index.php');