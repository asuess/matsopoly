<?php
/* Smarty version 3.1.32, created on 2018-07-12 12:51:40
  from 'C:\xampp\htdocs\matsopoly\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b4732bce27283_37801266',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a65d2f28f54fdb1b085586891f939f6d30a30937' => 
    array (
      0 => 'C:\\xampp\\htdocs\\matsopoly\\templates\\index.tpl',
      1 => 1531306285,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b4732bce27283_37801266 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\matsopoly\\lib\\smarty\\plugins\\function.get_login_bar.php','function'=>'smarty_function_get_login_bar',),1=>array('file'=>'C:\\xampp\\htdocs\\matsopoly\\lib\\smarty\\plugins\\function.get_navigation.php','function'=>'smarty_function_get_navigation',),2=>array('file'=>'C:\\xampp\\htdocs\\matsopoly\\lib\\smarty\\plugins\\function.get_board.php','function'=>'smarty_function_get_board',),));
?><!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/board.css">
	<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>
   <title> Matsopoly </title>
</head>
<body>
<div id="anmeldung"><?php echo smarty_function_get_login_bar(array(),$_smarty_tpl);?>
</div>
<div id="header">

    <?php echo smarty_function_get_navigation(array(),$_smarty_tpl);?>


    <img src="../img/logo.png" alt="logo" class="img_center"/>
</div>
<div id="content">
    <div id="standardTextfeld">
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

    </div>
    <?php echo smarty_function_get_board(array(),$_smarty_tpl);?>

</div>
</body>
</html><?php }
}
