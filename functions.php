<?php
/**
 *
 * @package ndruththeme
 */
define( 'WP_DEBUG', false );
define( 'SCRIPT_DEBUG', false );
define( 'WP_DEBUG_DISPLAY', false );
define( 'CONCATENATE_SCRIPTS', true );
define( 'COMPRESS_CSS', true );
define( 'COMPRESS_SCRIPTS', true );

$theme = wp_get_theme();
global $ndruththeme_version;
$ndruththeme_version = $theme['Version'];

//This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );
//Apply do_shortcode() to widgets so that shortcodes will be executed in widgets
add_filter( 'widget_text', 'do_shortcode' );

if(wp_doing_ajax()){
    // if(is_admin()){
    //     require_once 'inc/admin/ajax.php';
    // }
    // require_once 'inc/functions/ajax.php';
    // require_once 'inc/templates/ajax.php';
}
else{
    require_once 'inc/functions/generic.php';
    require_once 'inc/templates/generic.php';
    require_once 'inc/hooks/generic.php';
    // echo Automattic\WooCommerce\Admin\PageController::get_instance()->get_current_screen_id();
    if(is_admin()){
    
        if(!wp_doing_ajax()){
            // require_once 'inc/admin/functions.php';
        }
    }
}