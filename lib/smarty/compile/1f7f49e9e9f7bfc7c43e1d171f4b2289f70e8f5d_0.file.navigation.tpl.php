<?php
/* Smarty version 3.1.32, created on 2018-07-11 12:46:09
  from 'C:\xampp\htdocs\matsopoly\templates\navigation.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b45dff194e2c9_34224709',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1f7f49e9e9f7bfc7c43e1d171f4b2289f70e8f5d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\matsopoly\\templates\\navigation.tpl',
      1 => 1531305959,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b45dff194e2c9_34224709 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="navigation">
    <ul>
            <li>
                <a href="../index.php">Home</a>
            </li>
            <li>
                <a href="../ranking.php">Ranking</a>
            </li>
            <li>
                <a href="../sites/help.php">Hilfe</a>
            </li>
			<?php echo '<?php
			';?>if($_SESSION['loggedIn'] === true) {
				echo"<li><a href='../sites/game.php'>Spiel Starten</a></li>";
				}
				<?php echo '?>';?>
    </ul>
</div><?php }
}
