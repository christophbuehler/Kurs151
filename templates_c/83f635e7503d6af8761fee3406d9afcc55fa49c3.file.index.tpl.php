<?php /* Smarty version Smarty-3.1.18, created on 2014-10-24 09:32:30
         compiled from "views\login\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2652553caf7c33f4c73-15375963%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83f635e7503d6af8761fee3406d9afcc55fa49c3' => 
    array (
      0 => 'views\\login\\index.tpl',
      1 => 1414135944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2652553caf7c33f4c73-15375963',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53caf7c33f5f47_96245253',
  'variables' => 
  array (
    'pageName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53caf7c33f5f47_96245253')) {function content_53caf7c33f5f47_96245253($_smarty_tpl) {?><form id="loginForm" class="startForm" method="post">    <h2><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['pageName']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
</h2>    <div class="success" id="loginSuccess"></div>    <div class="error" id="loginError"></div>    <label><input type="text" class="input" name="login-name" id="login-name" placeholder="Username"></label><br />    <label><input type="password" class="input" name="login-pass" id="login-pass" placeholder="Password"></label><br />    <input type="submit" class="btn" id="loginBtn" value="Anmelden"></form><?php }} ?>
