<!-- Menu section -->
    <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
      <?php wp_nav_menu(
				array(
          'theme_location'  => 'header',
          'container_class' => 'collapse navbar-collapse',
          'container_id' => 'navbarSupportedContent',
          'menu_class'      => 'navbar-nav ml-auto',
				)
			); ?>
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
 