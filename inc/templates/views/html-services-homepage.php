<section class="pt-3 pb-3">
  <div class="row ml-1 mr-1"> 
    <?php
    if ( is_active_sidebar( 'homepage-service-widget' ) ) {
        dynamic_sidebar( 'homepage-service-widget' );
    }
    ?>
  </div>
</section>
    wp_enqueue_script( 'bnd-w', get_template_directory_uri() . '/js/popper.min.js', array('jquery'), $bnd_version, true );
