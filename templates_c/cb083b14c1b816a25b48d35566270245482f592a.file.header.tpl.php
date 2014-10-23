<?php /* Smarty version Smarty-3.1.18, created on 2014-10-23 11:57:15
         compiled from "templates\default\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1594553ac732493b7d8-70746053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb083b14c1b816a25b48d35566270245482f592a' => 
    array (
      0 => 'templates\\default\\header.tpl',
      1 => 1414058232,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1594553ac732493b7d8-70746053',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53ac732498a7e7_46783304',
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
<?php if ($_valid && !is_callable('content_53ac732498a7e7_46783304')) {function content_53ac732498a7e7_46783304($_smarty_tpl) {?><!DOCTYPE html><html><head>        <title>HMB - <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
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
"></script>    <?php } ?></head>    <div id="leftBar">        <nav id="mainNav">            <ul>                <li class="entypo-rocket"></li>            </ul>        </nav>    </div>    <div id="rightBar"></div><?php }} ?>
