<?php
/**
 *
 * @package ndruththeme
 */

require_once 'ndruththeme_widgets.php';


/***** HEADERS ********/




function add_header_xua() {
    header( 'Strict-Transport-Security: max-age=0;' );
    header('Cache-control: max-age='.(60*60*24*365));
    header('Expires: '.gmdate(DATE_RFC1123,time()+60*60*24*365));
}
add_action( 'send_headers', 'add_header_xua' );

function ndruththeme_theme_setup() {
    add_theme_support( 'menus' );
    register_nav_menus( array( 
      'header' => 'Header menu', 
      'footer' => 'Footer menu' 
    ) );
}
  add_action('after_setup_theme','ndruththeme_theme_setup');
/**
 * Enqueue scripts and styles.
 *
 * @since  1.0.0
 */
function scripts() {
    global $ndruththeme_version;
    $min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

    /**
     * Styles
     */
    wp_enqueue_style( 'font-awesome-style', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css' );
    wp_enqueue_style( 'ndruththeme-style', get_template_directory_uri() . '/style'.$min.'.css', '', $ndruththeme_version );

    /**
     * Fonts
     */
    // wp_enqueue_style( 'ndruththeme-fonts', google_fonts(), array(), null );

    // /**
    //  * Scripts
    //  */
    // // <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    // wp_register_script( 'jquery', get_template_directory_uri() . '/js/bootstrap/jquert.3.3.1.min.js', array(), $ndruththeme_version, true );
    wp_enqueue_script( 'ndruththeme-bootstrap4', get_template_directory_uri() . '/js/bootstrap/bootstrap.all.min.js', array('jquery'), $ndruththeme_version, true );
    wp_enqueue_script( 'ndruththeme-popper', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), $ndruththeme_version, true );

    // Slick
    
	// wp_enqueue_style( 'slick', get_template_directory_uri() . '/css/slick/slick.css', array(), '1.5.7' );
	// wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/css/slick/slick-theme.css', array(), '1.5.7' );
	// wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick/slick.min.js', array(), '1.5.7', true );

}
add_action("wp_enqueue_scripts","scripts");
  
function wpdocs_channel_nav_class( $classes, $item, $args ,$depth ) {
 
    if ( 'header' === $args->theme_location ) {
        $classes[] = "nav-item";
    }
 
    return $classes;
}
add_filter( 'nav_menu_css_class' , 'wpdocs_channel_nav_class' , 50, 4 );


function wpse156165_menu_add_class( $atts, $item, $args,$depth ) {
    $class = 'nav-link'; // or something based on $item
    $atts['class'] = $class;
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 50, 4 );



/************* WIDGETS *****************/
function register_widgets(){
    register_sidebar( array(
        'name' => 'Footer web',
        'id' => 'footer-widget',
        'description' => 'Widgets in this area will be shown in the footer.',
        'before_widget' => '<div id="%1$s" class="col-lg-4 mr-auto">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    register_sidebar( array(
        'name' => 'Footer social media',
        'id' => 'footer-media-widget',
        'description' => 'Widgets in this area will be shown in the footer.',
        'before_widget' => '<ul id="%1$s" class="social-buttons navbar-nav flex-row justify-content-center">',
        'after_widget' => '</ul>',
        'before_title' => '',
        'after_title' => ''
    ));
    register_sidebar(array(
        'name'          => 'Services',
        'id'            => 'homepage-service-widget',
        'description'   => 'Services shown in homepage, drag image widget in here',
        'before_widget' => '<div id="%1$s" class="col-12 col-md-6 col-lg-4 col-xl-3 mt-3 mb-3"><div class="card h-100 shadow">',
        'after_widget'  => '</div></div>',
        'before_title' => '<h5 class="card-header">',
        'after_title' => '</h5>'
    ));
    register_sidebar(array(
        'name'          => 'Certificates footer page',
        'id'            => 'footer-certs-widget',
        'description'   => 'Add image certificates',
    ));
}
add_action('after_setup_theme','register_widgets');


/***** FOOTERS ********/