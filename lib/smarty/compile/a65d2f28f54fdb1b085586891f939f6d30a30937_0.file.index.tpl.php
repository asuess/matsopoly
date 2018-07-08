<?php
/* Smarty version 3.1.32, created on 2018-06-16 01:14:51
  from 'C:\xampp\htdocs\matsopoly\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b24486b163521_98376255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a65d2f28f54fdb1b085586891f939f6d30a30937' => 
    array (
      0 => 'C:\\xampp\\htdocs\\matsopoly\\templates\\index.tpl',
      1 => 1529104488,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navigation.tpl' => 1,
  ),
),false)) {
function content_5b24486b163521_98376255 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\matsopoly\\lib\\smarty\\plugins\\function.get_login_bar.php','function'=>'smarty_function_get_login_bar',),1=>array('file'=>'C:\\xampp\\htdocs\\matsopoly\\lib\\smarty\\plugins\\function.get_board.php','function'=>'smarty_function_get_board',),));
?><!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/style.css">
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
    <?php echo smarty_function_get_board(array(),$_smarty_tpl);?>

</div>
</body>
</html><?php }
}
