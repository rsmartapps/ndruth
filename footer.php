<?php
/*
  @package ndruththeme
*/
?>
<section class="mt-3 logos">
    <!-- logos -->
    <?php if(is_active_sidebar('footer-certs-widget')){ dynamic_sidebar('footer-certs-widget'); } ?>
</section>
<section class="bg-primary text-white pt-3 mt-3 mb-0">
      <div class="container-fluid">

        <div class="navbar-dark row text-center">
          <div class="col-lg-4 ml-auto">
            <p class="navbar-nav lead flex-row justify-content-center">
            <a class="nav-link p-0" href="mailto:<?php esc_url(antispambot('contact@ndruthsebastian.com'));?>"><?php esc_url(antispambot('contact@ndruthsebastian.com'));?></a>
            </p>
            <?php if ( is_active_sidebar( 'footer-media-widget' ) ) { 
              dynamic_sidebar( 'footer-media-widget' ); 
}  ?>
          </div>
          <?php if ( is_active_sidebar( 'footer-widget' ) ) { dynamic_sidebar( 'footer-widget' ); } ?>
        </div>
        <div class="w-100">
          <p class="text-center m-0" style="font-size:.75rem">© Copyright 2019 - <?php echo esc_html(date( 'Y' )); ?> 
            <a class="text-white" href="/" style="padding-left:3px;padding-right:3px;"> <?php echo esc_html(get_bloginfo( 'name' )); ?> </a> · All Rights Reserved · 
            <?php the_pricay(); ?> · 
          </p>
        </div>
        </div>
  </section>

<?php wp_footer(); ?>
   
</body>
</html>