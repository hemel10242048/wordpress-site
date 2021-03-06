<?php 
	/* Template Name: Contact With Image */ 
?>

<!doctype html>
<html>
	<head>
		<?php include(locate_template('template_parts/main-head.php')); ?>
	</head>

	<body class="animated-hero">
		<?php include(locate_template('template_parts/main-header.php')); ?>
		
		<div class="contact general-contact-form">
			<section class="hero" id="particles-js" style="background-image: url(<?php the_field('hero_background_image'); ?>);">
				<div class="container">
					<div class="row">
						<div class="col">
							<h1 class="title"><?php the_field('hero_title'); ?></h1>
							<div class="subtitle"><?php the_field('hero_copy'); ?></div>
						</div>
					</div>
				</div>
			</section>

			<section class="contact-form">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="section-title"><?php the_field('contact_form_title'); ?></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md">
							<div class="cf7-form"><?php echo do_shortcode( get_field('contact_form') ); ?></div>
						</div>
						<div class="col-md">
							<div class="image-block">
								<img class="img-responsive" src="<?php the_field('contact_map'); ?>" />
							</div>
							<div class="address"><?php the_field('contact_map_address'); ?></div>
						</div>
					</div>
				</div>
			</section>
		</div>

		<?php include(locate_template('template_parts/more-orange.php')); ?>
		<?php include(locate_template('template_parts/footer-cta.php')); ?>

		<?php include(locate_template('template_parts/main-footer.php')); ?>
		<?php include(locate_template('template_parts/main-scripts.php')); ?>	
	</body>
</html>