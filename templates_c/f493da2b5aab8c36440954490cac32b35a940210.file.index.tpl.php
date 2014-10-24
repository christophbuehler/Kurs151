<?php /* Smarty version Smarty-3.1.18, created on 2014-09-01 00:07:43
         compiled from "views/start/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104877960553e919218dd5c7-92025460%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f493da2b5aab8c36440954490cac32b35a940210' => 
    array (
      0 => 'views/start/index.tpl',
      1 => 1409522828,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104877960553e919218dd5c7-92025460',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53e919218dfe86_69321834',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e919218dfe86_69321834')) {function content_53e919218dfe86_69321834($_smarty_tpl) {?>

<form id="loginForm" method="post">

    <h1>Anmeldung</h1>

    <div id="loginSuccess"></div>

    <div id="loginError"></div>

    <label id="usernameLogo" class="entypo-user"><input type="text" class="input" name="login-name" id="login-name" placeholder="Benutzername"></label><br />

    <label id="pwLogo" class="entypo-key"><input type="password" class="input" name="login-pass" id="login-pass" placeholder="Passwort"></label><br />

    <a href="mailto: christoph.buehler@hotmail.com">Passwort vergessen</a>

    <input type="submit" class="btn" id="loginBtn" value="Anmelden">

</form><?php }} ?>
