<?php

add_action('ndruth_before_site','start_head_wrapper',10);
add_action('ndruth_before_site','site_logo',20);
// add_action('ndruth_before_site','',30);
add_action('ndruth_before_site','site_menu',40);
add_action('ndruth_before_site','end_head_wrapper',50);