<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.get_navigation.php
 * Type:     function
 * Name:     get_navigation
 * Purpose:  generates the navigation for template files
 * -------------------------------------------------------------
 */
function smarty_function_get_navigation($params, &$smarty) {
	$content = "";
	$content .= "<div id='navigation'>
    <ul>
            <li>
                <a href='../index.php'>Home</a>
            </li>
            <li>
                <a href='../ranking.php'>Ranking</a>
            </li>
            <li>
                <a href='../sites/help.php'>Hilfe</a>
            </li>";
			if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
				$content .= "<li><a href='../game/index.php'>Spiel Starten</a>
			</li>";
			}
    $content .= "</ul></div>";
	return $content;
}
	