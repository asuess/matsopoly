<?php
include('../lib/Smarty/Smarty.class.php');
include('../lib/Database.class.php');
$content = "";
$smarty = new Smarty;
$smarty -> setTemplateDir('../templates/');
$smarty -> setCacheDir('../lib/smarty/cache');
$smarty -> setConfigDir('../lib/smarty/config');
$smarty -> setPluginsDir('../lib/smarty/plugins');
$smarty -> setCompileDir('../lib/smarty/compile');
$smarty -> force_compile = true;

$db = Database::getInstance();
$statement = getSqlStatement();
$stmt = $db -> prepare($statement);
$stmt -> bindParam(":username",$opponent);
$stmt -> execute();
$content = "";

$content .= "<div id='tableDatabase' style='text-align: center; margin: 0 auto;'><table>";
$content .="<tr><td>Name</td><td>Anzahl Siege </td></tr>";
while(($result = $stmt ->fetch(PDO::FETCH_ASSOC))!==false) {
	$content .= "<tr>";
	$content .= "<td>".$result['name']."</td>";
	$content .= "<td>".$result['wins']."</td>";
	$content .= "</tr>";
}
$content .= "</table></div>";

$smarty -> assign("content", $content);
$smarty -> display("default_layout.tpl");

function getSqlStatement() {
	return "SELECT * FROM wins"; 
}