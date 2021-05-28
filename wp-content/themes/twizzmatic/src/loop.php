<div class="posts-grid">
  <?php 
    if (have_posts()): while (have_posts()) : the_post();

    // Get ACF Fields
    
    $title = get_the_title();
    $post_content = get_field('content');
    $image = get_field('main_image');
    $link = get_field('link');
  ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <a href="<?php echo $link; ?>" target="_blank" class="post-image" style="background-image:url('<?php echo $image; ?>')"></a>
      <div class="post-content" onclick="window.open('<?php echo $link; ?>')">
        <h2 class="post-title">
          <a href="<?php echo $link; ?>" target="_blank"><?php echo $title; ?></a>
        </h2>
        <?php // SHOW YOAST PRIMARY CATEGORY, OR FIRST CATEGORY
          $category = get_the_category();
          $useCatLink = true;
          // If post has a category assigned.
          if ($category){
            $category_display = '';
            $category_link = '';
            if ( class_exists('WPSEO_Primary_Term') )
            {
              // Show the post's 'Primary' category, if this Yoast feature is available, & one is set
              $wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
              $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
              $term = get_term( $wpseo_primary_term );
              if (is_wp_error($term)) { 
                // Default to first category (not Yoast) if an error is returned
                $category_display = $category[0]->name;
                $category_link = get_category_link( $category[0]->term_id );
              } else { 
                // Yoast Primary category
                $category_display = $term->name;
                $category_link = get_category_link( $term->term_id );
              }
            } 
            else {
              // Default, display the first category in WP's list of assigned categories
              $category_display = $category[0]->name;
              $category_link = get_category_link( $category[0]->term_id );
            }

            // Display category
            if ( !empty($category_display) ){
                if ( $useCatLink == true && !empty($category_link) ){
              echo '<p class="post-category">';
              echo '<a href="'.$category_link.'">'.htmlspecialchars($category_display).'</a>';
              echo '</p>';
                } else {
              echo '<p class="post-category">'.htmlspecialchars($category_display).'</p>';
                }
            }  
          }
        ?>
        <div class="post-excerpt">
          <?php echo $post_content; ?>
        </div>
      </div>
    </article>
  <?php endwhile; ?>
  <?php endif; ?>
</div>