<?php
/*
 * Smarty plugin
 * -------------------------------------------------------------
 * File:     function.get_board.php
 * Type:     function
 * Name:     get_board
 * Purpose:  generates the board for matsopoly and returns it in a displayable html format
 * -------------------------------------------------------------
 */
function smarty_function_get_board($params, &$smarty)
{
    $spielfeld = "<div id='spielfeld'>";
    $ecken = "<div id='spielfeld_ecke'>";
    $reiheOben = "<div id='spielfeld_reiheOben'>";
    $reiheUnten = "<div id='spielfeld_reiheUnten'>";
    $spaltelinks = "<div id='spielfeld_spalteLinks'>";
    $spalteRechts = "<div id='spielfeld_spalteRechts'>";
    $los = "<div id=spielfeld_";

    $spielfeld .= $ecken."Gefängnis"."</div>";


    return ($spielfeld . "</div>");
}
?>

