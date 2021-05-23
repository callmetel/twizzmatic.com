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

// Get Primary Category For Posts
	function get_post_primary_category($post_id, $term='category', $return_all_categories=false){
    $return = array();

    if (class_exists('WPSEO_Primary_Term')){
        // Show Primary category by Yoast if it is enabled & set
        $wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
        $primary_term = get_term($wpseo_primary_term->get_primary_term());

        if (!is_wp_error($primary_term)){
            $return['primary_category'] = $primary_term;
        }
    }

    if (empty($return['primary_category']) || $return_all_categories){
        $categories_list = get_the_terms($post_id, $term);

        if (empty($return['primary_category']) && !empty($categories_list)){
            $return['primary_category'] = $categories_list[0];  //get the first category
        }
        if ($return_all_categories){
            $return['all_categories'] = array();

            if (!empty($categories_list)){
                foreach($categories_list as &$category){
                    $return['all_categories'][] = $category->term_id;
                }
            }
        }
    }

    return $return;
	}

?>
