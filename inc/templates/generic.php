<?php
include_once 'bootstrap_menu_walker.php';

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
function homepage_posts(){
    global $post;
    while ( have_posts() ) {
        the_post();
        
        include_once 'views/html-content-homepage.php';

    } // end of the loop.
}
function homepage_contact(){
    include_once 'views/html-contact-homepage.php';
}
function homepage_consulta_online(){
    include_once 'views/html-consulta-homepage.php';

}
function homepage_servicios(){
    include_once 'views/html-services-homepage.php';
}