<?php
/*
 * Menu navbar, just an unordered list
 */
?>
<h2>Cyberbots Web App</h2>
<div id="loginbox">
    <span id="logintext">{login_text}</span>
    <form name="loginform" id="loginform" autocomplete="off" method="POST">
        <input type="text" name="username" placeholder="Username" style="display:{login_visibility}">
        <input type="submit" value="{submit_text}">
    </form>
</div>
<ul class="nav">    
    {menudata}
    <li><a href="{link}">{name}</a></li>
    {/menudata}
</ul>

