<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*
function connectDB() {
  $servername = 'mysql:dbname=matsopoly;host=localhost';
  $user = 'root';
  $password = '';
  try {
    $db = new PDO($servername, $user, $password);
  } catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
  }
  return $db;
}
*/

require_once ('../lib/Database.class.php');
function insertUser($user, $pass, $email, $descr) {
  $storedUser = getUser($user);
  if($storedUser["name"] === $user) {
    return false;
  }
  $conn = Database::getInstance();
  $stmt = $conn->prepare('INSERT INTO `users`(`name`, `password`, `email`, `description`) VALUES (:user, :pass, :email, :descr)');
  $stmt->bindParam(':user', $user, PDO::PARAM_STR);
  $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':descr', $descr, PDO::PARAM_STR);
  $stmt->execute();
  $conn->close();
  return true;
}

function getUser($user, $email="") {
  $conn = Database::getInstance();
  $stmt = $conn->prepare('SELECT * FROM `users` WHERE `name`=:user OR `email`=:email');
  $stmt->bindParam(':user', $user, PDO::PARAM_STR);
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->execute();
  $storedUser = $stmt->fetch();
  $conn->close();
  return ($storedUser===false) ? false : $storedUser;
}

function isLoginCorrect($user, $pass) {
  $storedUser = getUser($user);
  if($storedUser === false) {
    return false;
  }
  $storedPw = $storedUser["password"];
  return password_verify($pass, $storedPw);
}

function editProfile($user, $newPass, $newDescr) {
  $conn = Database::getInstance();
  $stmt = $conn->prepare('UPDATE `users` SET `password`=:pass, `description`=:descr WHERE `name`=:user');
  $stmt->bindParam(':pass', $newPass, PDO::PARAM_STR);
  $stmt->bindParam(':descr', $newDescr, PDO::PARAM_STR);
  $stmt->bindParam(':user', $user, PDO::PARAM_STR);
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
  require_once './SMTP-Based-Email-Validation-master/smtpvalidateclass.php';
  // instantiate the class  
  $SMTP_Valid = new SMTP_validateEmail();  
  // do the validation  
  $result = $SMTP_Valid->validate($emails, $sender);
  if(empty($result)) {
    return 0;
  }
  $exist = $result;
  foreach($result as $key=>$value) {
    $email = $key;
    $exist = $value;
  }
  return ($exist && $email===$mailadress);
}