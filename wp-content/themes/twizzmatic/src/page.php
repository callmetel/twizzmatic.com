<?php get_header(); ?>

  <main>
    <?php
      if(is_front_page()):
        get_template_part( 'partials/home/banner', 'slider' );

      // Contact Page
      elseif(is_page(34)):
        get_template_part( 'partials/contact/content');

      // Bio Page
      elseif(is_page(37)):
        get_template_part( 'partials/bio/content');
      else:
    ?>
      <section>
        <div class="row">
          <div class="col">
            <h1><?php the_title(); ?></h1>
            <?php if (have_posts()): while (have_posts()) : the_post(); ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php the_content(); ?>
                <?php comments_template('', true); ?>
              </article>
            <?php endwhile; ?>
            <?php else: ?>
              <article>
                <h2><?php _e('Sorry, nothing to display.', 'wp-blank'); ?></h2>
              </article>
            <?php endif; ?>
          </div>
        </div>
      </section>
    <?php
      endif;
    ?>
  </main>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
