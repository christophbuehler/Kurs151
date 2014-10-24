<!DOCTYPE html><html><head>    <meta http-equiv="X-UA-Compatible" content="IE=edge">    {* Display page title *}    <title>{$title}</title>    {* google external fonts *}    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Open+Sans' rel='stylesheet' type='text/css'>    {* Display global css *}    {foreach from=$css_files item=css}        <link rel="stylesheet" href="{$css}">    {/foreach}    {* jQuery *}    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>    {* Display global js *}    {foreach from=$js_files item=js}        <script src="{$js}"></script>    {/foreach}</head><body>    <header>        <h1>Page Designer</h1>        <div id="headerRightLink">            {if $pageName != 'register'}                <a title="register" href="register" class="entypo-vcard"></a>            {elseif $pageName != 'login'}                <a title="login" href="login" class="entypo-login"></a>            {/if}        </div>    </header>