<?php 
  if (have_posts()): while (have_posts()) : the_post();

  // Get ACF Fields
  
  $title = the_title();
  $post_categories = get_post_primary_category($post->ID, 'category'); 
  $main_category = $post_categories['primary_category'];
  $content = get_field('content');
  $image = get_field('main_image');
  $link = get_field('link');
?>
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <a href="<?php echo $link; ?>" target="_blank" class="post-image" style="background-image:url('<?php echo $image; ?>')"></a>
    <div class="post-content">
      <h2 class="post-title">
        <a href="<?php echo $link; ?>" target="_blank">
          <?php echo $title; ?>
        </a>
      </h2>
      <p class="post-category">
        <a href="<?php echo $link; ?>" target="_blank">
          <?php echo $title; ?>
        </a>
      </p>
      <div class="post-excerpt">
        <?php print_r($main_category); ?>
      </div>
    </div>
  </article>
<?php endwhile; ?>
<?php endif; ?>
