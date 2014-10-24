<?php /* Smarty version Smarty-3.1.18, created on 2014-10-24 10:26:56
         compiled from "views\register\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:312195449f775f062f6-24819385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdd4cb761491bd5bebc6eed84b47f5172d0cbf96' => 
    array (
      0 => 'views\\register\\index.tpl',
      1 => 1414137143,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '312195449f775f062f6-24819385',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5449f776000df7_83206677',
  'variables' => 
  array (
    'pageName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5449f776000df7_83206677')) {function content_5449f776000df7_83206677($_smarty_tpl) {?><form id="registerForm" class="startForm" method="post">    <h2><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['pageName']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
</h2>    <div class="success" id="registerSuccess"></div>    <div class="error" id="registerError"></div>    <label><input type="text" class="input required" name="register-name" id="register-name" placeholder="Username"></label><br />    <label><input type="password" class="input required" name="register-pass" id="register-pass" placeholder="Password"></label><br />    <label><input type="password" class="input required" name="register-pass-rep" id="register-pass-rep" placeholder="Password (again)"></label><br />    <label><input type="text" class="input required" name="register-email" id="register-email" placeholder="Email"></label><br />    <input type="submit" class="btn" id="registerBtn" value="Register"></form><?php }} ?>
