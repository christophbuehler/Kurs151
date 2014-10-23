<?php /* Smarty version Smarty-3.1.18, created on 2014-06-29 13:02:51
         compiled from "./templates/default/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8125296153aff25bef7a07-20655638%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7040b74a208ff35624ed6973b1382a03371f6a25' => 
    array (
      0 => './templates/default/header.tpl',
      1 => 1404039573,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8125296153aff25bef7a07-20655638',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'css_global' => 0,
    'css' => 0,
    'js_global' => 0,
    'js' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53aff25c00bce9_60701146',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53aff25c00bce9_60701146')) {function content_53aff25c00bce9_60701146($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    
    <title>HMB - <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>

    
    <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['css_global']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value) {
$_smarty_tpl->tpl_vars['css']->_loop = true;
?>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
">
    <?php } ?>

    
    <?php  $_smarty_tpl->tpl_vars['js'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_global']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
	<div id="content">
		<div id="mainContent"><?php }} ?>
