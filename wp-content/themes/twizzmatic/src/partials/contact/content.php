<?php 
	// Get ACF Fields
	
	$title = get_field('title');
	$email = get_field('email');
?>

<section id="contact-banner">
	<div class="row">
		<div class="col">
			<h1 class="contact-title title--large white"><?php echo $title; ?></h1>
		</div>
	</div>
</section>

<section id="contact-info">
	<div class="row">
		<div class="col">
			<a href="mailto:<?php echo $email; ?>" class="contact-email">
				<span class="email-title">Email Me</span>
				<span class="email-address"><?php echo $email; ?></span>
			</a>
		</div>
	</div>
</section>