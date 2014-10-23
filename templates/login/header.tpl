<!DOCTYPE html>
<html>
<head>
    {* Display page title *}
    <title>HMB - {$title}</title>

    {* Display global css *}
    {foreach from=$css_files item=css}
        <link rel="stylesheet" href="{$css}">
    {/foreach}

    {* jQuery *}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    {* Display global js *}
    {foreach from=$js_files item=js}
        <script src="{$js}"></script>
    {/foreach}
</head>
<body>
<header>
</header>
<div id="container1">
    <div id="container2">