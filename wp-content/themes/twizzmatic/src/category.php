<?php get_header(); ?>

  <main role="main" aria-label="Content">
    <section>
      <div class="row">
        <div class="col">
          <h1 class="page-title"><?php single_cat_title(); ?></h1>
          <?php 
            get_template_part( 'partials/news/filter');
            get_template_part('loop');
            get_template_part('pagination'); 
            // Implement Load More Pagination Feature
          ?>
        </div>
      </div>
    </section>
  </main>
<?php get_footer(); ?>
