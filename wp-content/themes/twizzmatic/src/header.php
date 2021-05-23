<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon.ico" rel="shortcut icon">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
  </head>
  <?php 
    global $post;
    $post_slug = $post->post_name;
    // Display a page parent's slug
    $post_data = get_post($post->post_parent);
    $parent_slug = $post_data->post_name;
  ?>

  <body <?php body_class(array('page-'.$post_slug, 'parent-page-'.$parent_slug)); ?>>
    <div class="wrapper">
      <header id="main-header" class="header" role="banner">
        <div class="header-container">
          <a href="#" class="nav-menu-trigger">
            <span class="bar"></span>
            <span class="bar"><span class="open">MENU</span><span class="close">CLOSE</span></span>
          </a>
          <a href="#" class="sound-trigger">SOUND <span class="status">ON</span></a>  
        </div>
        
        <div class="nav-wrapper">
          <nav class="nav" role="navigation">
            <?php 
              wp_nav_menu( array(
                  'menu' => 'Main Menu',
                  'menu_id' => 'header-menu',
              ) ); 
            ?>
          </nav>  
        </div>
      </header>
      
