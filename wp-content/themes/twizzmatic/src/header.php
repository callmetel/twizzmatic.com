<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <div class="wrapper">
      <header id="main-header" class="header" role="banner">
        <a href="#" class="nav-menu-trigger">
          <span class="bar"></span>
          <span class="bar">MENU</span>
        </a>
        <a href="#" class="sound-trigger">SOUND <span class="status">ON</span></a>
        <div class="nav-wrapper">
          <nav class="nav" role="navigation">
            <?php 
              wp_nav_menu( array $args = array(
                  'theme_location' => 'primary',
                  'menu_id' => 'header-menu',
              ) ); 
            ?>
          </nav>  
        </div>
      </header>
      
