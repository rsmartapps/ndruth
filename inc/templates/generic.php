<?php

function start_head_wrapper(){
    ?><nav class="navbar sticky-top navbar-expand-lg navbar-light bg-white shadow "><?php
}

function site_logo(){
    require_once 'views/html-site-logo.php';
}
function site_menu(){
    require_once 'views/html-site-menu.php';
}

function end_head_wrapper(){ ?>
 </nav><?php
}