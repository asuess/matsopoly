<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.get_login_bar.php
 * Type:     function
 * Name:     get_login_bar
 * Purpose:  get contents for login bar and evaluate whether the user is logged in or not
 * -------------------------------------------------------------
 */
function smarty_function_get_login_bar($params, &$smarty) {
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	echo "<script src='../js/loginMenu.js'></script>";
	echo "<script src='../lib/jQueryUI/jquery-ui.js'></script>";
    echo "<table><tr><td>";
    if (isset($_SESSION["username"])) {
        echo "Hallo <span id='username'>".$_SESSION["username"]."</span> <a href='../sites/edit_profile.php'> Profil bearbeiten</a> | <a href='../sites/logout_user.php'>Ausloggen</a></td>";
    } else {
        echo "Hallo Gast! <a href='../sites/register_user.php'>Registrieren</a> /<a href='#' id='show_login'> Einloggen </a></td>";
    }
    echo "<td> Datum: ".date('d. M Y, G:i')."</td>";
    echo "</tr></table>";
	
	echo " <div id = 'loginDialog'>
  <form method = 'post' action = '../sites/login_user.php'>
  <br><br>
  <table style='margin: 0 auto;'> 
   <tr><td><input type = 'text' name='username' placeholder = 'Username' id='usr'></td></tr>
   <tr><td><input type = 'password' id = 'pwd' name = 'password' placeholder = '***'></td></tr>
   <tr><td><input type = 'submit' id = 'dologin' value = 'Login'></td></tr>
   <tr><td><input type = 'hidden' name='site' value= '".$_SERVER["PHP_SELF"]."'></td></tr>
   </table>
  </form>
 </div>";
}
?>

