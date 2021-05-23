<?php 
	// Get ACF Fields
	
	$title = get_field('title');
	$bio = get_field('bio');
	$quote = get_field('quote');
	$image = get_field('image');
?>

<section id="bio-content">
	<div class="row">
		<div class="col col-1">
			<div class="bio-image">
				<img src="<?php echo $image; ?>" alt="TwizzMatic">
			</div>
			<div class="bio-quote">
				<?php echo $quote; ?>
			</div>
		</div>
		<div class="col col-2">
			<h1 class="bio-title yellow"><?php echo $title; ?></h1>
			<div class="full-bio">
				<div class="inner">
					<?php echo $bio; ?>
				</div>
			</div>
		</div>
	</div>
</section>