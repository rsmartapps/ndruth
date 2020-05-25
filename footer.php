<div class="clear"></div>
    <div class="footer">
       <hr />
        <div class="sixteen columns">
            <?php if ( is_active_sidebar( 'footer-widget' ) ) : ?> <?php dynamic_sidebar( 'footer-widgetgit s' ); ?>
            <?php else : ?><p>You need to drag a widget into your sidebar in the WordPress Admin</p>
	        <?php endif; ?> 
        </div>
    </div>
            
</div> 

<?php wp_footer();  ?>
   
</body>
</html>