<?php /* Smarty version Smarty-3.1.18, created on 2014-10-24 08:47:44
         compiled from "views\login\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2652553caf7c33f4c73-15375963%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83f635e7503d6af8761fee3406d9afcc55fa49c3' => 
    array (
      0 => 'views\\login\\index.tpl',
      1 => 1414057132,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2652553caf7c33f4c73-15375963',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53caf7c33f5f47_96245253',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53caf7c33f5f47_96245253')) {function content_53caf7c33f5f47_96245253($_smarty_tpl) {?><form id="loginForm" method="post">    <h2>Anmeldung</h2>    <div id="loginSuccess"></div>    <div id="loginError"></div>    <label id="usernameLogo"><input type="text" class="input" name="login-name" id="login-name" placeholder="Benutzername"></label><br />    <label id="pwLogo"><input type="password" class="input" name="login-pass" id="login-pass" placeholder="Passwort"></label><br />    <input type="submit" class="btn" id="loginBtn" value="Anmelden"></form><?php }} ?>
