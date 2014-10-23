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
    <div id="showNavBtn" class="entypo-menu"></div>
    <div id="titleWelcomeBox"><b>HMB</b></div>
    <div id="userWelcomeBox">Hallo, {$userName} <a href="logout">Abmelden</a></div>
    <div id="wrapper">
        <div id="navContainer" data-show="true">
             <div id="containerSpace"></div>
             <nav>
                {if $role==1}
                    <i>Admin</i>
                    <article id="adminArea">
                        <a href="users">Benutzer</a>
                        <a href="userGroups">Gruppen</a>
                        <a href="pending">Pendenzen</a>
                    </article>
                {/if}
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
            <div id="mainContent">