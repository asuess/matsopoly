<?php
require_once("smtpvalidateclass.php");
// the email to validate  
$emails = array('muthia.dewi.al@rwth-aachen.de');  
// an optional sender  
$sender = 'user@example.com';  
// instantiate the class  
$SMTP_Valid = new SMTP_validateEmail();  
// do the validation  
$result = $SMTP_Valid->validate($emails, $sender);
$exist = $result[0];
foreach($result as $key=>$value) {
  $email = $key;
  $exist = $value;
} 
/* 
  //view results  
  var_dump($result);
*/
// send email?   
if ($exist) {  
  //mail(...);
  return array("$email exists", "$email existiert");  
} else {
  return array("$email does not exist", "$email nicht existiert");
}
?>  
