<?php /* Smarty version Smarty-3.1.18, created on 2014-10-24 09:26:57
         compiled from "templates\start\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:229565449f6100d0562-19758520%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a067c8539956b41ad6a082ab45142c639b642d7f' => 
    array (
      0 => 'templates\\start\\header.tpl',
      1 => 1414135615,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '229565449f6100d0562-19758520',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5449f6101225f6_52695783',
  'variables' => 
  array (
    'title' => 0,
    'css_files' => 0,
    'css' => 0,
    'js_files' => 0,
    'js' => 0,
    'pageName' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5449f6101225f6_52695783')) {function content_5449f6101225f6_52695783($_smarty_tpl) {?><!DOCTYPE html><html><head>    <meta http-equiv="X-UA-Compatible" content="IE=edge">        <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
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
"></script>    <?php } ?></head><body>    <header>        <h1>Page Designer</h1>        <div id="headerRightLink">            <?php if ($_smarty_tpl->tpl_vars['pageName']->value!='register') {?>                <a title="register" href="register" class="entypo-vcard"></a>            <?php } elseif ($_smarty_tpl->tpl_vars['pageName']->value!='login') {?>                <a title="login" href="login" class="entypo-login"></a>            <?php }?>        </div>    </header><?php }} ?>
