<?php /* Smarty version Smarty-3.1.18, created on 2014-08-11 21:27:29
         compiled from "templates/login/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162691614753e9192184b9e7-07274936%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3692d261462ace21328f648a8316a8d80bbd5fbf' => 
    array (
      0 => 'templates/login/header.tpl',
      1 => 1407589531,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162691614753e9192184b9e7-07274936',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'css_files' => 0,
    'css' => 0,
    'js_files' => 0,
    'js' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53e919218d5d57_28673496',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53e919218d5d57_28673496')) {function content_53e919218d5d57_28673496($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    
    <title>HMB - <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

    
    <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value) {
$_smarty_tpl->tpl_vars['css']->_loop = true;
?>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
">
    <?php } ?>

    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    
    <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js']->key => $_smarty_tpl->tpl_vars['js']->value) {
$_smarty_tpl->tpl_vars['js']->_loop = true;
?>
        <script src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
"></script>
    <?php } ?>
</head>
<body>
<header>
</header>
<div id="container1">
    <div id="container2"><?php }} ?>
