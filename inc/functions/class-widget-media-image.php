<?php
/**
 * Widget API: WP_Widget_Media_Image class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.8.0
 */
class Widget_Media_Image extends WP_Widget {

	/**
	 * Constructor.
	 *
	 * @since 4.8.0
	 */
	public function __construct() {
		parent::__construct(
			'media_image_service',
			__( 'Image Service' ),
			array(
				'description' => __( 'Displays an image for use in services .' ),
				'mime_type'   => 'image',
			)
		);
	}

	public function form($instance) {
		//WIDGET BACK-END SETTINGS
		$instance = wp_parse_args((array) $instance, array('link1' => ''));
		$link1 = $instance['link1'];
		$images = new WP_Query( array( 'post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image' , 'posts_per_page' => -1 ) );
		if( $images->have_posts() ){ 
			$options = array();
			for( $i = 0; $i < 2; $i++ ) {
				$options[$i] = '';
				while( $images->have_posts() ) {
					$images->the_post();
					$img_src = wp_get_attachment_image_src(get_the_ID());
					$the_link = ( $i == 0 ) ? $link1 : $link2;
					$options[$i] .= '<option value="' . $img_src[0] . '" ' . selected( $the_link, $img_src[0], false ) . '>' . get_the_title() . '</option>';
				} 
		   } ?>
		   <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'ndb' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
		<p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'link1' ) ); ?>"><?php echo esc_html__( 'Image:', 'ndb' ); ?></label>
		<select name="<?php echo $this->get_field_name( 'link1' ); ?>"><?php echo $options[0]; ?></select>
        </p>
		</br>
		<?php
		} else {
			  echo 'There are no images in the media library. Click <a href="' . admin_url('/media-new.php') . '" title="Add Images">here</a> to add some images';
		}
  
	}
	public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['link1'] = ( !empty( $new_instance['link1'] ) ) ? $new_instance['link1'] : '';
        return $instance;
	}
	public function widget($args, $instance){
		$title = ( empty($instance['title']) ) ? 0 : $instance['title'];
		$link1 = ( empty($instance['link1']) ) ? 0 : $instance['link1']; ?>

		<!-- Display images --><?php 
		if( !( $title || $link1 ) ) {
			echo "Please configure this widget.";
		} else {
			echo $args['before'];
			echo "<h5 class='card-header'>$title</h5>"; 
			?>
			<div class="d-flex align-items-center" style="height:250px">
                <img src="<?php echo $link1; ?>" class="card-img-top mh-100" alt="..." role="img" preserveaspectratio="xMidYMid slice">
            </div>
			<?php
			echo $args['after']; 
		} 
	}
}

class Foo_Widget extends WP_Widget {
 
	function __construct() {
		parent::__construct(
		  
			// Base ID of your widget
			'wpb_widget', 
			
			// Widget name will appear in UI
			__('WPBeginner Widget', 'wpb_widget_domain'), 
			
			// Widget description
			array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
			);
		}
		  
		// Creating widget front-end
		  
		public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		  
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		  
		// This is where you run the code and display the output
		echo __( 'Hello, World!', 'wpb_widget_domain' );
		echo $args['after_widget'];
		}
				  
		// Widget Backend 
		public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
		$title = $instance[ 'title' ];
		}
		else {
		$title = __( 'New title', 'wpb_widget_domain' );
		}
		// Widget admin form
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
		}
			  
		// Updating widget replacing old instances with new
		public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
		}
 
} // class Foo_Widget
