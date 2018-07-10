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
	
	$returnString = "</div>"; //leave content div limitting width
	$colors = getColors();
	
	$streetNames = getStreets();
	$returnString .="<div id='spielfeld'>"; //start board-div
	$returnString.="<div id='leftColumn'><div class='corner' name='corner_PRISON'>PRISON</div>";
	
	

	//LINKE SPALTE
	for($i = 9; $i > 0; $i--) {
		$returnString.="<div class='feld_".$i."' name='col1_field_".$i."'>";
		$streetIndex = $i-1;
		if(in_array($i, array(1,3))) {
		$returnString.="<div class='street_color' style='background-color: ".$colors[0]."'></div><div class='streetName'>".$streetNames[$streetIndex]."</div>";
		} else if(in_array($i, array(6,8,9))) {
			$returnString.="<div class='street_color' style='background-color: ".$colors[1]."'></div><div class='streetName'>".$streetNames[$streetIndex]."</div>";
		} else {
			$returnString.="<div class='street_color' style=''></div><div class='streetName'>".$streetNames[$streetIndex]."</div>";
		}
		$returnString .="</div>";
	}
	$returnString.="<div class='corner' name='corner_GO'>LOS</div>";
	$returnString.= "</div>";
	//ENDE LINKE SPALTE
	
	//RECHTE SPALTE
	$returnString.="<div id='rightColumn'><div class='corner' name='corner_PARKING'>PARKING</div>";
	for($i = 19; $i < 28; $i++) {
		$streetIndex = $i -2;
		$returnString.="<div class='feld_".$i."' name='col1_field_".$i."'>";
		if(in_array($i, array(19,21,22))) {
			$returnString.="<div class='street_color' style='background-color: ".$colors[4]."'></div><div class='streetName'>".$streetNames[$streetIndex]."</div>";
		} else if(in_array($i, array(24,25,27))) {
			$returnString.="<div class='street_color' style='background-color: ".$colors[5]."'></div><div class='streetName'>".$streetNames[$streetIndex]."</div>";
		} else {
			$returnString.="<div class='street_color' style=''></div><div class='streetName'>".$streetNames[$streetIndex]."</div>";
		}
		$returnString .="</div>";
	}
	
	$returnString.="<div class='corner' name='corner_GO_PRISON'>GO INTO PRISON</div></div>";
	//ENDE RECHTE SPALTE
	
	//OBERE REIHE
	$returnString.="<div id='topRow'>";
	for($i = 10; $i < 19; $i++) {
		$streetIndex = $i-1;
		$returnString.="<div class='feld_".$i."' name='row1_field_".$i."'>";
		if(in_array($i, array(10,12,13))) {
			$returnString.="<div class='streetName'>".$streetNames[$streetIndex]."</div><div class='street_color' style='background-color: ".$colors[2]."'></div>";
		} else if(in_array($i, array(15,17,18))) {
			$returnString.="<div class='streetName'>".$streetNames[$streetIndex]."</div><div class='street_color' style='background-color: ".$colors[3]."'></div>";
		} else {
			$returnString.="<div class='streetName'>".$streetNames[$streetIndex]."</div><div class='street_color' style=''></div>";
		}
		$returnString .="</div>";
	}
	$returnString.="</div>";
	//ENDE OBERE REIHE
	
	//INNERES FELD
	$returnString .="<div id='innerField'>";
	$returnString .= "<span id='title'>MATSOPOLY</span>";
	
	$returnString .= "</div>";
	//ENDE INNERES FELD
	
	//UNTERE REIHE
	$returnString.="<div id='bottomRow'>";
	for($i = 36; $i > 27; $i--) {
		$streetIndex = $i-2;
		$returnString.="<div class='feld_".$i."' name='row2_field_".$i."'>";
		if(in_array($i, array(28,29,31))) {
			$returnString.="<div class='street_color' style='background-color: ".$colors[6]."'></div><div class='streetName'>".$streetNames[$streetIndex]."</div>";
		} else if(in_array($i, array(34,36))) {
			$returnString.="<div class='street_color' style='background-color: ".$colors[7]."'></div><div class='streetName'>".$streetNames[$streetIndex]."</div>";
		} else {
			$returnString.="<div class='street_color' style=''></div><div class='streetName'>".$streetNames[$streetIndex]."</div>";
		}
		$returnString .="</div>";
	}
	$returnString .= "</div>";
	//ENDE UNTERE REIHE
	
	return $returnString."<script src='../js/getStreetView.js'></script></div>";
	
	
}
 function getColors() {
	$colors = array();
	$pdo = new PDO('mysql:host=localhost;dbname=matsopoly', 'root', '');
	$sql = "SELECT color FROM streetgroups";
	foreach ($pdo->query($sql) as $row) {
		array_push($colors, $row['color']);
	}
	return $colors;
}
function getStreets() {
	$streets = array();
	$pdo = new PDO('mysql:host=localhost;dbname=matsopoly', 'root', '');
	$sql = "SELECT streetname FROM streets";
	foreach ($pdo->query($sql) as $row) {
		array_push($streets, $row['streetname']);
	}
	return $streets;
}
?>

