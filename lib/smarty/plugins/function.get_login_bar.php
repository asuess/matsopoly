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
	echo "<script src='../js/loginMenu.js'></script>";
    echo "<table><tr><td>";
    if (isset($_SESSION["username"])) {
        echo "Hallo ".$_SESSION["username"]." <a href='../sites/edit_profile.php'> Profil bearbeiten</a></td>";
    } else {
        echo "Hallo Gast! <a href='../sites/register_user.php'>Registrieren</a> /<a href='#' onClick='showModal()'> Einloggen </a></td>";
    }
    echo "<td> Datum: ".date('d. M Y, G:i')."</td>";
    echo "</tr></table>";
}
?>

