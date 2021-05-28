<?php get_header(); ?>

  <main role="main" aria-label="Content">
    <section>
    	<div class="row">
        <div class="col">
		      <h1 class="page-title"><?php single_post_title(); ?></h1>
	      	<?php 
	      		get_template_part( 'partials/news/filter');
	      	?>
		      <div class="posts-grid">
		      	<?php get_template_part('loop'); ?>	
		      </div>
		      <?php get_template_part('pagination'); ?>
		    </div>
		  </div>
    </section>
  </main>
<?php get_footer(); ?>
