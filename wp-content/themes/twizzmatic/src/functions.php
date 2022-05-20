<?php

/* Specify CSS bundle path */
function loadStyles()
{
	wp_enqueue_style('main', get_template_directory_uri() . '/../dist/bundle.css');
	// wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css');
}

/* Specify JS bundle path */
function loadScripts()
{
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
function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Add Shortcode Functionality for Menus 
function print_menu_shortcode($atts, $content = null)
{
	extract(shortcode_atts(array('id' => null, 'class' => null, 'name' => null,), $atts));
	return wp_nav_menu(array('menu_id' => $id, 'menu_class' => $class, 'menu' => $name, 'echo' => false));
}
add_shortcode('menu', 'print_menu_shortcode');  // add using this shortcode [menu id="custom-id" class="custom-class" name="Menu Name"]

// Removing Default Image Link

function wpb_imagelink_setup()
{
	$image_set = get_option('image_default_link_type');

	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);


// To change add to cart text on single product page
add_filter('woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text');
function woocommerce_custom_single_add_to_cart_text()
{
	return __('Buy Now', 'woocommerce');
}

// To change add to cart text on product archives(Collection) page
add_filter('woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text');
function woocommerce_custom_product_add_to_cart_text()
{
	return __('Buy Now', 'woocommerce');
}

// Disable Single Product Pages
remove_action('woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10);
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);

// Add Global Options Page for ACF
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'position' => "-1"
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
}
