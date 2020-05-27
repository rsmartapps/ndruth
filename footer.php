
<section class="bg-primary text-white pt-3 mt-3 mb-0">
      <div class="container-fluid">

        <div class="navbar-dark row text-center">
          <div class="col-lg-4 ml-auto">
            <p class="navbar-nav lead flex-row justify-content-center">
            <a class="nav-link p-0" href="mailto:<?php antispambot('contact@ndruthsebastian.com');?>">ND Ruth Sebastian Contact</a>
            <ul class="list-inline social-buttons navbar-nav flex-row justify-content-center">
              <!-- <li class="list-inline-item">
                <a class="nav-link" href="https://www.facebook.com/ndruthsebastian/">
                  <i class="fab fa-twitter"></i>
                </a>
              </li> -->
              <li class="list-inline-item">
                <a class="nav-link" href="https://www.facebook.com/ndruthsebastian/">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <!-- <li class="list-inline-item">
                <a class="nav-link" href="https://www.facebook.com/ndruthsebastian/" >
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li> -->
            </ul></p>
          </div>
          <?php if ( is_active_sidebar( 'footer-widget' ) ) : ?> <?php dynamic_sidebar( 'footer-widget' ); ?>
            <?php else : ?><p>You need to drag a widget into your sidebar in the WordPress Admin</p>
	        <?php endif; ?> 
        </div>
        <div class="w-100">
          <p class="text-center m-0" style="font-size:.75rem">© Copyright 2019 - <?php echo esc_html(date( 'Y' )); ?> 
            <a class="text-white" href="/" style="padding-left:3px;padding-right:3px;"> <?php echo esc_html(get_bloginfo( 'name' )); ?> </a> · All Rights Reserved · 
            <?php the_pricay(); ?> · 
          </p>
        </div>
    </section>

<?php wp_footer(); ?>
   
</body>
</html>