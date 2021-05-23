<?php 
	// Get ACF Fields
	
	$title = the_field('title');
?>

<section id="contact-banner">
	<div class="row">
		<div class="col">
			<h1 class="contact-title title--large"><?php echo $title; ?></h1>
		</div>
	</div>
</section>