<?php

require_once ('../lib/Database.class.php');
function insertUser($name, $email, $pass, $descr="", $points=0) {
  $storedUser = getUser($name, $email);
  if($storedUser["name"] === $name || $storedUser["email"] === $email) {
    return false;
  }
  $conn = Database::getInstance();
  $stmt = $conn->prepare('INSERT INTO `users`(`name`, `email`, `password`, `decription`, `points`) VALUES (:name, :email, :pass, :descr, :points)');
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
  $stmt->bindParam(':descr', $descr, PDO::PARAM_STR);
  $stmt->bindParam(':points', $points, PDO::PARAM_INT);
  $stmt->execute();
  $conn->close();
  return true;
}

function getUser($name, $email="") {
  $conn = Database::getInstance();
  $stmt = $conn->prepare('SELECT `id`, `name`, `email`, `password`, `decription`, `points` FROM `users` WHERE `name`=:name OR `email`=:email');
  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->execute();
  $storedUser = $stmt->fetch();
  $conn->close();
  return $storedUser; //return false or user data
}

function isLoginCorrect($name, $pass) {
  $storedUser = getUser($name);
  if($storedUser === false) {
    return false;
  }
  $storedPw = $storedUser["pass"];
  return password_verify($pass, $storedPw);
}

function editName($id, $newName) {
  $conn = Database::getInstance();
  $stmt = $conn->prepare('UPDATE `users` SET `name`=:name WHERE `id`=:id');
  $stmt->bindParam(':name', $newName, PDO::PARAM_STR);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $conn->close();
}

function editEmail($id, $newEmail) {
  $conn = Database::getInstance();
  $stmt = $conn->prepare('UPDATE `users` SET `email`=:email WHERE `id`=:id');
  $stmt->bindParam(':email', $newEmail, PDO::PARAM_STR);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $conn->close();
}

function editPass($id, $newPass) {
  $conn = Database::getInstance();
  $stmt = $conn->prepare('UPDATE `users` SET `password`=:pass WHERE `id`=:id');
  $stmt->bindParam(':pass', $newPass, PDO::PARAM_STR);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $conn->close();
}

function editDescr($id, $newDescr) {
  $conn = Database::getInstance();
  $stmt = $conn->prepare('UPDATE `users` SET `description`=:descr WHERE `id`=:id');
  $stmt->bindParam(':descr', $newDescr, PDO::PARAM_STR);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $conn->close();
}

function editPoints($id, $newPoints) {
  $conn = Database::getInstance();
  $stmt = $conn->prepare('UPDATE `users` SET `points`=:points WHERE `id`=:id');
  $stmt->bindParam(':points', $newPoints, PDO::PARAM_INT);
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  $conn->close();
}

function isUserNameTaken($name) {
  return (getUser($name)===false) ? false:true;
}

function isEmailRegistered($email) {
  return (getUser("", $email)===false) ? false:true;
}

function doesMailExist($mailadress) {
  // the email to validate  
  $emails = array($mailadress);  
  // an optional sender  
  $sender = "matsopoly@rwth-aachen.de";  
  // instantiate the class  
  $SMTP_Valid = new SMTP_validateEmail();  
  // do the validation  
  $result = $SMTP_Valid->validate($emails, $sender);
  $exist = $result[0];
  foreach($result as $key=>$value) {
    $exist = $value;
  }   
  return ($exist)?1:0;
}