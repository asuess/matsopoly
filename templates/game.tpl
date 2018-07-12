<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/board.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <title> Matsopoly </title>
</head>
<body>
<div id="anmeldung">{get_login_bar}</div>
<script>
$("#standardTextFeld ul li").each(function(index) {
		if($(this).text() === "Spiel Starten") {
			$(this).remove();
		}
	});
</script>
<div id="header">
    {get_navigation}
    <img src="../img/logo.png" alt="logo" class="img_center"/>
</div>
</div>
<div id="content">
    <div id="spieler_ansicht">DUMMY</div>
	</div id="gegner_ansicht">DUMMY</div>
	<br>
    {$content}
    </div>
    {get_board}
</div>
</body>
</html>