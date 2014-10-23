<?php /* Smarty version Smarty-3.1.18, created on 2014-10-23 14:42:11
         compiled from "views\designer\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:178025448e0ea43ff75-00211379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be95aa7e754ca3ffb76e1a97fb71e86c1fbdca3c' => 
    array (
      0 => 'views\\designer\\index.tpl',
      1 => 1414067929,
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
<?php if ($_valid && !is_callable('content_5448e0ea43ff78_85324730')) {function content_5448e0ea43ff78_85324730($_smarty_tpl) {?><div id="interface">
    <nav id="interfaceNav">
        <ul>
            <li><a href="#save">Save</a></li>
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
            <li><a id="showGridBtn" href="#showGrid">Show Grid</a></li>
        </ul>
    </nav>
</div>
<div id="resize"></div>
<div id="configurationBox">
    <span>Selected Element</span>
    <section>
        <label>Background</label>
        <ul>
            <li>
                <label>Color</label>
                <div>
                    <input id="backgroundColor" class="noStyle" type="color">
                </div>
            </li>
            <li>
                <label>Image</label>
                <div>
                    <input id="backgroundImage" class="input noStyle" type="file">
                </div>
            </li>
            <li>
                <label>Size</label>
                <div>
                    <input id="backgroundSizeX" class="halfWidth input noStyle" type="text" value="-">
                    <input id="backgroundSizeY" class="halfWidth input noStyle" type="text" value="-">
                </div>
            </li>
            <li>
                <label>Position</label>
                <div>
                    <input id="backgroundPositionX" class="halfWidth input noStyle" type="text" value="-">
                    <input id="backgroundPositionY" class="halfWidth input noStyle" type="text" value="-">
                </div>
            </li>
            <li>
                <label>Repeat</label>
                <div>
                    <select id="backgroundRepeat" class="input noStyle">
                        <option>repeat</option>
                        <option>no-repeat</option>
                        <option>repeat-x</option>
                        <option>repeat-y</option>
                    </select>
                </div>
            </li>
        </ul>
    </section>
    <section>
        <label>Text</label>
        <ul>
        </ul>
    </section>
    <div id="viewSettings">
        <span>View</span>
        <ul>
            <li>
                <label>Grid Size</label>
                <div>
                    <input type="text" value="60" id="gridSize" class="numericInput">
                </div>
            </li>
        </ul>
    </div>
</div><?php }} ?>
