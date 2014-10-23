<?php /* Smarty version Smarty-3.1.18, created on 2014-10-23 14:36:35
         compiled from "templates\designer\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:173975448e0ea3d67d2-96408976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '312fbc23cf69cf2826d6d16f7793ce8fbbcbc60f' => 
    array (
      0 => 'templates\\designer\\header.tpl',
      1 => 1414067788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173975448e0ea3d67d2-96408976',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5448e0ea430560_35955149',
  'variables' => 
  array (
    'title' => 0,
    'css_files' => 0,
    'css' => 0,
    'js_files' => 0,
    'js' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5448e0ea430560_35955149')) {function content_5448e0ea430560_35955149($_smarty_tpl) {?><!DOCTYPE html><html><head>        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Open+Sans' rel='stylesheet' type='text/css'>        <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value) {
$_smarty_tpl->tpl_vars['css']->_loop = true;
?>        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
">    <?php } ?>        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>        <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>        <script src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
"></script>    <?php } ?></head><body><?php }} ?>
