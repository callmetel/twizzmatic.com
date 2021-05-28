<?php

/* Specify CSS bundle path */
function loadStyles() {
  wp_enqueue_style('main', get_template_directory_uri() . '/../dist/bundle.css');
  // wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css');
}

/* Specify JS bundle path */
function loadScripts() {
  wp_register_script('main', get_template_directory_uri() . '/../dist/bundle.js', array('jquery'), '1.0.0');
  wp_enqueue_script('main');

  // wp_register_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js', array('jquery'), '1.0.0');
  // wp_enqueue_script('bootstrap-js');
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

// Allow SVG Uploads
	function cc_mime_types($mimes) {
	  $mimes['svg'] = 'image/svg+xml';
	  return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');

	// Add Shortcode Functionality for Menus 
	function print_menu_shortcode($atts, $content = null) {
	    extract(shortcode_atts(array( 'id' => null, 'class' => null, 'name' => null, ), $atts));
	    return wp_nav_menu( array( 'menu_id' => $id, 'menu_class' => $class, 'menu' => $name, 'echo' => false ) );
	}
	add_shortcode('menu', 'print_menu_shortcode');  // add using this shortcode [menu id="custom-id" class="custom-class" name="Menu Name"]

	// Removing Default Image Link

	function wpb_imagelink_setup() {
	    $image_set = get_option( 'image_default_link_type' );
	     
	    if ($image_set !== 'none') {
	        update_option('image_default_link_type', 'none');
	    }
	}
	add_action('admin_init', 'wpb_imagelink_setup', 10);


	// Add Load More to News/Blog Page
	wp_localize_script( 'load-more-js', 'ajax_posts', array(
	    'ajaxurl' => admin_url( 'admin-ajax.php' ),
	    'noposts' => __('No older posts found', 'twentyfifteen'),
	));	

	// wp_register_script( 'load-more-js', get_template_directory_uri() . '/assets/js/loadmore.js');
	// wp_enqueue_script( 'load-more-js' );

	function more_post_ajax(){

	  $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
	  $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;

	  header("Content-Type: text/html");

	  $args = array(
	      'suppress_filters' => true,
	      'post_type' => 'post',
	      'posts_per_page' => $ppp,
	      'paged'    => $page,
	  );

	  $loop = new WP_Query($args);

	  $out = '';

	  if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post();
	      $out .= '<div class="small-12 large-4 columns">
	              <h1>'.get_the_title().'</h1>
	              <p>'.get_the_content().'</p>
	       </div>';

	  endwhile;
	  endif;
	  wp_reset_postdata();
	  die($out);
	}

	add_action('wp_ajax_nopriv_more_post_ajax', 'more_post_ajax');
	add_action('wp_ajax_more_post_ajax', 'more_post_ajax');
?>
