<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package ndruththeme
 */

get_header();
?>

<main id="site-content" role="main">

	<div class="container pt-4">

		<h1 class="entry-title"><?php _e( 'Page Not Found', 'ndruththeme' ); ?></h1>

		<div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'ndruththeme' ); ?></p></div>

		<?php
		get_search_form(
			array(
				'label' => __( '404 not found', 'ndruththeme' ),
			)
		);
		?>

	</div><!-- .section-inner -->

</main><!-- #site-content -->

<?php
get_footer();
