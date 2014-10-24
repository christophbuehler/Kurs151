<?php /* Smarty version Smarty-3.1.18, created on 2014-10-23 13:27:21
         compiled from "templates\start\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:984453caf7c337ef33-66105901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f387e57f335c76001b8a7da40917b39e21327517' => 
    array (
      0 => 'templates\\start\\header.tpl',
      1 => 1414063640,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '984453caf7c337ef33-66105901',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53caf7c33e4a06_81553089',
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
<?php if ($_valid && !is_callable('content_53caf7c33e4a06_81553089')) {function content_53caf7c33e4a06_81553089($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Open+Sans' rel='stylesheet' type='text/css'>

    
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
        <h1>Page Designer</h1>
    </header><?php }} ?>
