<?php

/*
@package ndruththeme
*/
class Social_Media_Widget extends WP_Widget{
    public function __construct(){
        $opts = array('description' =>  __( 'Text and link with a button widget', 'ndruththeme' ));
        parent::__construct('ndruththeme_social_media','Social Media',$opts);
    }
   
    
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        echo $before_widget;
        $media = '';
        foreach($instance as $key => $value){
            if(strpos($key, 'media-') !== false){
                $media = $value;
            }
            else{ ?>
                <li class="list-inline-item">
                    <a class="nav-link" href="<?php echo $value; ?>">
                    <i class="fab fa-<?php echo $media; ?>"></i>
                    </a>
              </li><?php
            }
        }
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        echo $after_widget;
    }
 
   
    public function form( $instance ) {
        ?>
        <div style="margin-top:10px;height: 30px;">
            <input type="button" name="addElement" id="addElement" class="button button-primary alignright" value="Add Media">
        </div>
        <?php
        $i = 0;
        $containerID = $i;
        foreach($instance as $key => $value){
            if(strpos($key, 'media-') !== false){
                $idmedia=$this->get_field_id('media-'.$i);
                $nmedia=$this->get_field_name('media-'.$i);
                $containerID = $i;
                ?>
                <div id="mediacontainer-<?php echo $containerID; ?>">
                <p>
                    <label for="<?php echo $idmedia; ?>">Media:</label>
                    <input class="widefat" id="<?php echo $idmedia; ?>" name="<?php echo $nmedia; ?>" type="text" value="<?php echo esc_attr($value); ?>" />
                </p>
            <?php } else { 
                $idurl=$this->get_field_id('url-'.$i);
                $nurl=$this->get_field_name('url-'.$i);?>
                <p>
                    <label for="<?php echo $idurl; ?>">Url:</label>
                    <input class="widefat" id="<?php echo $idurl; ?>" name="<?php echo $nurl; ?>" type="text" value="<?php echo esc_attr( $value ); ?>" />
                </p>
                <? if($containerID != 0) : ?>
                    <div style="height: 30px;">
                    <input container-id="mediacontainer-<?php echo $containerID;?>"  type="button" name="deleteMedia" id="deleteMedia-<?php echo $i;?>" class="button button-primary alignright deleteMedia" value="Delete Media">
                </div>
                <?php endif; ?>
                <hr>
                </div>
            <?php
            }
            $i++;
        }
        if($i == 0){
            ?>
                <p>
                    <label for="<?php echo 'media-'.$i; ?>"><?php _e( 'Media:' ); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id('media-'.$i); ?>" name="<?php echo $this->get_field_name('media-'.$i); ?>" type="text" value="Twitter" />
                </p>
                <p>
                    <label for="<?php echo 'url-'.$i; ?>"><?php _e( 'Url:' ); ?></label>
                    <input class="widefat" id="<?php echo $this->get_field_id('url-'.$i); ?>" name="<?php echo $this->get_field_name( 'url-'.$i ); ?>" type="text" value="https://twitter/missdaesi" />
                </p>
                <hr>
            <?php
        }
        $this->adminScripts($i);
    }

    public function getForm($i){
        $idmedia=$this->get_field_id('media--21');
        $nmedia=$this->get_field_name('media--21');
        $idurl=$this->get_field_id('url--21');
        $nurl=$this->get_field_name('url--21');
        return "<p><label for='".$idmedia."'>Media:</label><input class='widefat' id='".$idmedia."' name='".$nmedia."' type='text' value='' /></p><p><label for='".$idurl."'>Url:</label><input class='widefat' id='".$idurl."' name='".$nurl."' type='text' value='' /></p><hr>";
    }
    public function adminScripts($i){
        $plantilla =$this->getForm(-21);
        $url = esc_url(get_template_directory_uri() . '/js/admin/social_media.js');
        echo '<script type="text/javascript">var plantilla="'.$plantilla.'";var lastId='.$i.';</script>';
        echo "<script type='text/javascript' src='$url' ></script>";
    }
 
    
    public function update( $new_instance, $old_instance ) {
        return $new_instance;
    }
}
     
function declare_widgets() { 
    register_widget( 'Social_Media_Widget' ); 
}
add_action( 'widgets_init', 'declare_widgets' );