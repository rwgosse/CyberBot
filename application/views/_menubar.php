<?php
/*
 * Menu navbar, just an unordered list
 */
?>
<h2>Cyberbots Web App</h2>
<div id="loginbox">
    <span id="logintext">Mickey</span>
    <form name="loginform" id="loginform" autocomplete="off" method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="submit" value="{submit_text}">
    </form>
</div>
<ul class="nav">    
    {menudata}
    <li><a href="{link}">{name}</a></li>
    {/menudata}
</ul>

