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
function homepage_posts(){
    global $post;
    while ( have_posts() ) {
        the_post();
        
        include 'views/html-content-homepage.php';

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
    wp_enqueue_script( 'ndruththeme-widget-image', get_template_directory_uri() . '/js/widget-images.js', array('jquery'), $ndruththeme_version, true );
}

function the_pricay($before = '',$after= ''){
    $link               = '';
        $privacy_policy_url = get_privacy_policy_url();
        $policy_page_id     = (int) get_option( 'wp_page_for_privacy_policy' );
        $page_title         = ( $policy_page_id ) ? get_the_title( $policy_page_id ) : '';
    
        if ( $privacy_policy_url && $page_title ) {
            $link = sprintf(
                '<a class="text-white" href="%s" style="padding-left:3px;">%s</a>',
                esc_url( $privacy_policy_url ),
                esc_html( $page_title )
            );
        }
    
        /**
         * Filters the privacy policy link.
         *
         * @since 4.9.6
         *
         * @param string $link               The privacy policy link. Empty string if it
         *                                   doesn't exist.
         * @param string $privacy_policy_url The URL of the privacy policy. Empty string
         *                                   if it doesn't exist.
         */
        // $link = apply_filters( 'the_privacy_policy_link', $link, $privacy_policy_url );
    
        if ( $link ) {
            echo $before . $link . $after;
        }
    
        echo '';
}

function the_termsconditions(){
    $link               = '';
    $termsURL = '';
}