<?php
$featured_image = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
?>
<section>
    <div 
     class="jumbotron hero-banner image-bg d-flex align-items-center flex-column justify-content-center position-relative" 
     style="background-image:url('<?php echo esc_url( $featured_image ); ?>')">
        <div class="position-absolute w-100 h-100 " style="background-color:rgba(3,3,3,.3)"></div>
            <h1 class="display-4 font-weight-bold text-white" style="z-index:10"><?php the_title(); ?></h1>
            <a class="btn btn-primary btn-lg" href="/servicios" role="button" style="z-index:10">Servicios</a>
        </div>
</section>
<?php the_content(); ?>