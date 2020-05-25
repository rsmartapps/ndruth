<section class="pt-3 pb-3">
  <div class="row ml-1 mr-1"> 
    <?php
    if ( is_active_sidebar( 'homepage-service-widget' ) ) {
        dynamic_sidebar( 'homepage-service-widget' );
    }
    ?>
  </div>
</section>
