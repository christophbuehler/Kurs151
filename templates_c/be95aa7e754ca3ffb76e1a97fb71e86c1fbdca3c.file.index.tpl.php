<?php /* Smarty version Smarty-3.1.18, created on 2014-10-24 14:07:29
         compiled from "views\designer\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178025448e0ea43ff75-00211379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be95aa7e754ca3ffb76e1a97fb71e86c1fbdca3c' => 
    array (
      0 => 'views\\designer\\index.tpl',
      1 => 1414152028,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '178025448e0ea43ff75-00211379',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5448e0ea43ff78_85324730',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5448e0ea43ff78_85324730')) {function content_5448e0ea43ff78_85324730($_smarty_tpl) {?><div id="openDialogueBox">
    <div id="openDialogue">
        <span>Recent documents:</span>
        <div id="recentClassDiagrams"></div>
        <form id="newDiagramForm">
            <div class="success" id="createDiagramSuccess"></div>
            <div class="error" id="createDiagramError"></div>
            <input name="diagramName" type="text" id="diagramName" class="input" placeholder="name">
        </form>
        <button id="newDiagram" class="btn">create new class diagram</button>
    </div>
</div>
<div id="interface">
    <nav id="interfaceNav">
        <ul>
            <li><a href="$save">Save</a></li>
            <li><a href="#restore">Restore</a></li>
            <li><a href="#settings">Settings</a></li>
            <li><a href="logout">Logout</a></li>
        </ul>
        <a href="#" id="close">close</a>
    </nav>
</div>
<div id="pageContainer"></div>
<div id="contextMenu">
    <nav>
        <ul>
            <li><a href="$newBlock">New Class</a></li>
            <li><a id="delBlock" href="$deleteBlock">Delete Class</a></li>
            <li><a id="copyBlock" href="$copyBlock">Copy Class</a></li>
            <li><a id="insertBlock" href="$insertBlock">Insert Class</a></li>
            <li><a href="#nav">Page Settings</a></li>
            <li><a id="showGridBtn" href="$showGrid">Show Grid</a></li>
        </ul>
    </nav>
</div>
<div id="configurationBox">
    <label>Grid Size</label>
    <div>
        <input type="text" value="60" id="gridSize" class="numericInput">
        <button class="btn">new connection</button>
    </div>
</div><?php }} ?>
