<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
   <title> Matsopoly </title>
</head>
<body>
<div id="anmeldung">{get_login_bar}</div>
<div id="header">

    {include file='navigation.tpl'}

    <img src="../img/logo.png" alt="logo" class="img_center"/>
</div>
<div id="content">
    <div id="standardTextfeld">
    {$content}
    </div>
    {get_board}
</div>
</body>
</html>