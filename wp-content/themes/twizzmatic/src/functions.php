<?php

/* Specify CSS bundle path */
function loadStyles() {
  wp_enqueue_style('main', get_template_directory_uri() . '/../dist/bundle.css');
  wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css');
}

/* Specify JS bundle path */
function loadScripts() {
  wp_register_script('main', get_template_directory_uri() . '/../dist/bundle.js', array('jquery'), '1.0.0');
  wp_enqueue_script('main');

  wp_register_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js', array('jquery'), '1.0.0');
  wp_enqueue_script('bootstrap-js');
}

/* Support programmable title tag */
add_theme_support('title-tag');

/* Register styles and scripts */
add_action('wp_enqueue_scripts', 'loadStyles');
add_action('wp_enqueue_scripts', 'loadScripts');

if (function_exists('register_sidebar')) {
	register_sidebar(array(
		'name' => 'Sidebar',
		'id'   => 'sidebar-1',
		'description'   => 'Add widgets here to appear in your sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
  ));
}

?>
