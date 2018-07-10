<?php
/* Smarty version 3.1.32, created on 2018-07-10 14:38:51
  from 'C:\xampp\htdocs\matsopoly\templates\default_layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b44a8db2d8c52_18777581',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7747cd7cd2960fb1d4d7c086256a9a40f51a14f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\matsopoly\\templates\\default_layout.tpl',
      1 => 1531225429,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navigation.tpl' => 1,
  ),
),false)) {
function content_5b44a8db2d8c52_18777581 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\matsopoly\\lib\\smarty\\plugins\\function.get_login_bar.php','function'=>'smarty_function_get_login_bar',),));
?><!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
	<?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"><?php echo '</script'; ?>
>
   <title> Matsopoly </title>
</head>
<body>
<div id="anmeldung"><?php echo smarty_function_get_login_bar(array(),$_smarty_tpl);?>
</div>
<div id="header">

    <?php $_smarty_tpl->_subTemplateRender('file:navigation.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <img src="../img/logo.png" alt="logo" class="img_center"/>
</div>
<div id="content">
    <div id="standardTextfeld">
    <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

    </div>
</div>
</body>
</html><?php }
}
