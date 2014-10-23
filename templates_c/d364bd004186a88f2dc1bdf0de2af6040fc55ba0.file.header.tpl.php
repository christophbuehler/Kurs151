<?php /* Smarty version Smarty-3.1.18, created on 2014-10-14 19:55:08
         compiled from "templates/default/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:79984521253a7405204b9f0-35177398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd364bd004186a88f2dc1bdf0de2af6040fc55ba0' => 
    array (
      0 => 'templates/default/header.tpl',
      1 => 1413309309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '79984521253a7405204b9f0-35177398',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53a7405206ee20_93585212',
  'variables' => 
  array (
    'title' => 0,
    'css_files' => 0,
    'css' => 0,
    'js_files' => 0,
    'js' => 0,
    'userName' => 0,
    'role' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53a7405206ee20_93585212')) {function content_53a7405206ee20_93585212($_smarty_tpl) {?><!DOCTYPE html>
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
    <div id="showNavBtn" class="entypo-menu"></div>
    <div id="titleWelcomeBox"><b>HMB</b></div>
    <div id="userWelcomeBox">Hallo, <?php echo $_smarty_tpl->tpl_vars['userName']->value;?>
 <a href="logout">Abmelden</a></div>
    <div id="wrapper">
        <div id="navContainer" data-show="true">
             <div id="containerSpace"></div>
             <nav>
                <?php if ($_smarty_tpl->tpl_vars['role']->value==1) {?>
                    <i>Admin</i>
                    <article id="adminArea">
                        <a href="users">Benutzer</a>
                        <a href="userGroups">Gruppen</a>
                        <a href="pending">Pendenzen</a>
                    </article>
                <?php }?>
                <i>Allgemeines</i>
                <article>
                    <a href="calendar">Kalender</a>
                    <a href="pending">Von Probe Abmelden</a>
                </article>
                <i>Listen</i>
                <article>
                    <a href="user-manager">HMB Mitglieder</a>
                    <a href="user-group-manager">JBO Mitglieder</a>
                    <a href="pending">Jugendensemble</a>
                </article>
            </nav>
        </div><div id="content">
            <div id="containerSpace"></div>
            <div id="mainContent"><?php }} ?>
