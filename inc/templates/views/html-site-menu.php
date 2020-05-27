<!-- Menu section -->
    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      
      <?php
      function page_header_menu_a_class($attrs){
        $attrs['class'] .= ' nav-link';
        return $attrs;
      }
      add_filter('page_menu_link_attributes','page_header_menu_a_class');
      wp_nav_menu(
				array(
          'theme_location'  => 'header',
          'container_id'    => 'navbarSupportedContent',
          'container_class' => 'collapse navbar-collapse',
          // 'menu_id'      => 'navbarSupportedContent',
          // 'menu_class'   => 'collapse navbar-collapse',
          'menu_class'      => 'navbar-nav ml-auto',
        // 'before'         => '<ul class="navbar-nav ml-auto">',
          // 'after'        => '</ul>',
          // 'walker'       => new WP_Bootstrap_Navwalker,
          'link_class'      => 'nav-link',
          'li_class'        => 'nav-item',
          'fallback_cb'     => 'header_page_menu'
				)
      ); 
      
      
      function header_page_menu( $args = array() ) {
        $defaults = array(
          'sort_column'  => 'menu_order, post_title',
          'menu_id'      => '',
          'menu_class'   => 'menu',
          'container'    => 'div',
          'echo'         => true,
          'link_before'  => '',
          'link_after'   => '',
          'before'       => '',
          'after'        => '',
          'item_spacing' => 'discard',
          'walker'       => '',
          'link_class'      => 'nav-link',
          'li_class'        => 'nav-item'
        );
        $args     = wp_parse_args( $args, $defaults );
      
        if ( ! in_array( $args['item_spacing'], array( 'preserve', 'discard' ) ) ) {
          // Invalid value, fall back to default.
          $args['item_spacing'] = $defaults['item_spacing'];
        }
      
        if ( 'preserve' === $args['item_spacing'] ) {
          $t = "\t";
          $n = "\n";
        } else {
          $t = '';
          $n = '';
        }
      
        /**
         * Filters the arguments used to generate a page-based menu.
         *
         * @since 2.7.0
         *
         * @see wp_page_menu()
         *
         * @param array $args An array of page menu arguments.
         */
        $args = apply_filters( 'wp_page_menu_args', $args );
      
        $menu = '';
      
        $list_args = $args;
      
        // Show Home in the menu.
        if ( ! empty( $args['show_home'] ) ) {
          if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] ) {
            $text = __( 'Home' );
          } else {
            $text = $args['show_home'];
          }
          $class = '';
          if ( is_front_page() && ! is_paged() ) {
            $class = 'class="nav-link current_page_item"';
          }
          $menu .= '<li ' . $class.' '.$args['li_class'] . '><a class="'.$args['link_class'].'" href="' . home_url( '/' ) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
          // If the front page is a page, add it to the exclude list.
          if ( get_option( 'show_on_front' ) == 'page' ) {
            if ( ! empty( $list_args['exclude'] ) ) {
              $list_args['exclude'] .= ',';
            } else {
              $list_args['exclude'] = '';
            }
            $list_args['exclude'] .= get_option( 'page_on_front' );
          }
        }
      
        $list_args['echo']     = false;
        $list_args['title_li'] = '';
        $menu                 .= wp_list_pages( $list_args );
      
        $container = sanitize_text_field( $args['container'] );
      
        // Fallback in case `wp_nav_menu()` was called without a container.
        if ( empty( $container ) ) {
          $container = 'div';
        }
      
        if ( $menu ) {
      
          // wp_nav_menu() doesn't set before and after.
          if ( isset( $args['fallback_cb'] ) &&
            'wp_page_menu' === $args['fallback_cb'] &&
            'ul' !== $container ) {
            $args['before'] = "<ul class='navbar-nav ml-auto'>{$n}";
            $args['after']  = '</ul>';
          }
      
          $menu = $args['before'] . $menu . $args['after'];
        }
      
        $attrs = '';
        if ( ! empty( $args['menu_id'] ) ) {
          $attrs .= ' id="' . esc_attr( $args['menu_id'] ) . '"';
        }
      
        if ( ! empty( $args['menu_class'] ) ) {
          $attrs .= ' class="' . esc_attr( $args['menu_class'] ) . '"';
        }
      
        $menu = "<{$container}{$attrs}>" . $menu . "</{$container}>{$n}";
      
        /**
         * Filters the HTML output of a page-based menu.
         *
         * @since 2.7.0
         *
         * @see wp_page_menu()
         *
         * @param string $menu The HTML output.
         * @param array  $args An array of arguments.
         */
        $menu = apply_filters( 'wp_page_menu', $menu, $args );
      
        if ( $args['echo'] ) {
          echo $menu;
        } else {
          return $menu;
        }
      }
      ?>
      <!-- <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/sobre-ruth">Sobre Ruth</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/servicios">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/informacion">Información gratuita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/testimonios">Testimonios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contacto">Contacto</a>
        </li>
      </ul> -->
 
