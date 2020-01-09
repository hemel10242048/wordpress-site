<?php 
	/* Template Name: Home */ 
?>

<!doctype html>
<html>
	<head>
		<?php include(locate_template('template_parts/main-head.php')); ?>
	</head>

	<body>
		<?php include(locate_template('template_parts/main-header.php')); ?>
		
		<div class="home">
			<section class="homepage-hero">
				<div class="container">
					<div class="row hero-section">
						<div class="container col-lg-6">
							<div class="row">
								<div class="icon"><img src="<?php the_field('banner_icon'); ?>"></div>
								<div class="text">
									<a class="banner-link" href="<?php the_field('banner_link_url'); ?>">
										<b>News</b><?php the_field('banner_link_text'); ?><span>→</span>
									</a>
								</div>
							
								<div>
									<h2 class="hero-title-phrase"><?php the_field('hero_description_title'); ?></h2>
									<div class="hero-subtext"><?php the_field('hero_description_subtext'); ?></div>
									<div class="email-contact">
										<input type="email" name="contact-email" placeholder="Enter Email" aria-required="true" aria-invalid="false" />
										<input type="submit" value="Request Demo" class="email-submit-btn" />
									</div>
								</div>
							</div>
						</div>
						<div class="container col-lg-6">
							<div class="hero-bg-image">
								<img src="<?php the_field('hero_background_image'); ?>" />
							</div>
						</div>
					</div>
					<div class="row">
						<ul class="col-lg-12 repeater top repeater-container">
							<?php
								$latency = get_field('latency_tile');
								if( $latency ): ?>	
							<div class="item-container">
								<li class="item latency-tile">
									<div id="latency-animation">
										<div class="latency">
											<div class="box square-left"></div>
											<div class="box square-right"></div>
											<div class="opposite-latency"></div>
										</div>
									</div>
									<div class="item-title"><?php echo $latency['item_title']; ?></div>
									<div class="item-subtext"><?php echo $latency['item_subtext']; ?></div>
								</li>
							</div>
							<?php endif; ?>
							<?php
								$scale = get_field('scale_tile');
								if( $scale ): ?>	
							<div class="item-container">
								<li class="item scale-tile">
									<div id="new-node-animation">
										<div class="box"></div>
										<div class="animation">
											<img src="<?php the_field('scale_animation_image'); ?>" width="40" height="50" />
											<img src="<?php the_field('scale_animation_image'); ?>" width="40" height="50" />
											<img src="<?php the_field('scale_animation_image'); ?>" width="40" height="50" />
											<img class="newNode" src="<?php the_field('scale_animation_image'); ?>" width="40" height="50" />
										</div>
									</div>
									<div class="item-title"><?php echo $scale['item_title']; ?></div>
									<div class="item-subtext"><?php echo $scale['item_subtext']; ?></div>
								</li>
							</div>
							<?php endif; ?>
							<?php
								$geodist = get_field('geo-distribution_tile');
								if( $geodist ): ?>
							<div class="item-container" style="padding: 20px 50px 50px;">
								<li class="item">
									<div class="global-animation" style="background-image: url('<?php the_field('globe_image'); ?>');">
										<svg class="globe-line" width="120" height="100" xmlns="http://www.w3.org/2000/svg">
											<path class="path-clockwise" d="M 33, 37 a 50,10 40 1 1 50 42" stroke-width="2" stroke="#FF6E42" fill="transparent" stroke-linejoin="round" stroke-miterlimit="10" 
											/>
											<path class="path-counterclockwise" d="M 86, 36 a 50 10 138 1,0 -46 43" stroke="#FF6E42" stroke-width="2" fill="transparent" stroke-linejoin="round" stroke-miterlimit="10" 
											/>
										</svg>
									</div>
									<div class="item-title"><?php echo $geodist['item_title']; ?></div>
									<div class="item-subtext"><?php echo $geodist['item_subtext']; ?></div>
								</li>
							</div>
							<?php endif; ?>
						</ul>
					</div>
					<?php if(have_rows('customer_logos_repeater')): ?>
						<div class="logo-wall">
							<?php while(have_rows('customer_logos_repeater')) : the_row(); ?>
								<img src="<?php the_sub_field('customer_logo'); ?>" />
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
			<section class="bg-grey">
				<div class="container community-metrics">
					<div class="row text-center">
						<?php if(have_rows('section_repeater')): ?>
							<?php while(have_rows('section_repeater')) : the_row(); ?>
								<div class="col-xs-12 col-md-6 card-content">
									<div class="community-header">
										<h2><?php the_sub_field('community_title'); ?></h2>
										<div class="subtitle-text"><?php the_sub_field('community_subtitle'); ?></div>
									</div>
									<img class="main-illustration" src="<?php the_sub_field('community_image'); ?>" />
									<div class="metrics-header"><?php the_sub_field('metrics_caption'); ?></div>
									<?php if(have_rows('community_section_repeater')): ?>
										<div class="stats-row">
										<?php while(have_rows('community_section_repeater')) : the_row(); ?>
											<div class="metric-wrapper">
												<?php if(!empty(get_sub_field('card_image'))) { ?>
													<img src="<?php the_sub_field('card_image'); ?>" />
												<?php } ?>
												<div class="metric-stat"><?php the_sub_field('card_title'); ?></div>
												<span class="metric-unit"><?php the_sub_field('card_caption'); ?></span>
											</div>
										<?php endwhile; ?>
										</div>
									<?php endif; ?>
									<?php if(!empty(get_sub_field('community_hyperlink'))) { ?>
										<a class="more-info-link" href="<?php the_sub_field('community_hyperlink'); ?>" target="_blank">
											<?php the_sub_field('community_link_text'); ?> <span><i class="fa fa-chevron-right"></i></span>
											<!-- <span><svg aria-hidden="true" focusable="false" data-prefix="fal" data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" class="svg-inline--fa fa-caret-right fa-w-6"><path fill="currentColor" d="M0 128.032v255.93c0 28.425 34.488 42.767 54.627 22.627l128-127.962c12.496-12.496 12.497-32.758 0-45.255l-128-127.968C34.528 85.305 0 99.55 0 128.032zM160 256L32 384V128l128 128z" class=""></path></svg></span> -->
										</a>
									<?php } ?>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<section class="layers">
				<div class="container value-prop">
					<div class="value-header-container">
						<h2 class="title"><?php the_field('value_prop_title'); ?></h2>
						<div class="description"><?php the_field('value_prop_desc'); ?></div>
					</div>
					<div class="value-prop-list">
						<?php if(have_rows('value_prop_repeater')): ?>
							<?php while(have_rows('value_prop_repeater')) : the_row(); ?>
								<div class="row">
									<div class="col-3 col-xs-12 text-right">
										<img class="feature-icon" src="<?php the_sub_field('feature_icon'); ?>">
									</div>
									<div>
										<div class="tile-title"><?php the_sub_field('feature_name'); ?></div>
										<div class="tile-caption"><?php the_sub_field('feature_description'); ?></div>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</section>
			<section class="demo-banner">
				<div class="container">
					<div class="cta-wrapper">
						<h3><?php the_field('cta_demo_header'); ?></h3>
						<div class="text-content"><?php the_field('cta_demo_content'); ?></div>
						<div class="email-contact">
							<input type="email" name="contact-email" placeholder="Enter Email" aria-required="true" aria-invalid="false" />
							<input type="submit" value="Request Demo" class="email-submit-btn" />
						</div>
					</div>
				</div>
			</section>
			<section class="customers">
				<div class="container">
					<div class="row case-study-wrapper">
						<?php if(have_rows('customer_repeater_copy')): ?>
							<?php while(have_rows('customer_repeater_copy')) : the_row(); ?>
								<div class="customer-card">
									<div class="title-logo">
										<img src="<?php the_sub_field('customer_logo'); ?>" />
									</div>
									<div class="customer-testimonial"><?php the_sub_field('testimonial'); ?></div>
									<div class="customer-advocate">
										<img class="profile-pic" src="<?php the_sub_field('profile_picture'); ?>"/>
										<div class="customer-details">
											<b><?php the_sub_field('customer_name'); ?></b>
											<div class="customer-position"><?php the_sub_field('customer_position'); ?></div> 
										</div>
										<div class="more-info-link">
											<a href="/wp-content/uploads/2019/03/Narvar-YugaByte-DB-Case-Study.pdf">Read more <span><i class="fa fa-chevron-right"></i></span></a>
										</div>
									</div>									
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<div class="success-stories-wrapper more-info-link">
						<a href="/success-stories">See more success stories <span><i class="fa fa-chevron-right"></i></span></a>
					</div>
				</div>
			</section>

			</section>
		</div>

		<?php include(locate_template('template_parts/footer-cta.php')); ?>

		<?php include(locate_template('template_parts/main-footer.php')); ?>
		<?php include(locate_template('template_parts/main-scripts.php')); ?>	
	</body>
</html>
