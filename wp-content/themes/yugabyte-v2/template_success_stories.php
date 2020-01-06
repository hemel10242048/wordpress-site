<?php 
	/* Template Name: Success Stories */ 
?>

<!doctype html>
<html>
	<head>
		<?php include(locate_template('template_parts/main-head.php')); ?>
	</head>

	<body>
		<?php include(locate_template('template_parts/main-header.php')); ?>
		
		<div class="success-stories">
            <section class="banner-section">
                <div class="row">
                    <div class="col-6 header-text">
                        <h2 class="title"><?php the_field('hero_title'); ?></h2>
                        <div class="subtitle"><?php the_field('hero_subtitle'); ?></div>
                    </div>
                    <div class="col-6 header-image">
                        <img src="<?php the_field('banner_image'); ?>" height="200" />
                    </div>
            </section>

            <section class="company-gallery">
                <div class="table-view">
                <?php if(have_rows('company_list')): ?>
                    <?php while(have_rows('company_list')) : the_row(); ?>
                        <div class="card">
                            <div class="logo-container">
                                <a href="<?php the_sub_field('company_url'); ?>" target="_blank">
                                    <img data-name="<?php the_sub_field('company_name'); ?>" src="<?php the_sub_field('company_logo'); ?>" />
                                </a>
                            </div>
                            <div class="header-container">
                                <div class="company-purpose"><?php the_sub_field('purpose'); ?></div>
                            </div>
                            <div class="testimonial-quote">
                                <?php the_sub_field('testimonial_blurb'); ?>
                            </div>                            
                            <div class="company-details hidden">
                                <p><?php the_sub_field('company_testimonial'); ?></p>
                                <div class="case-study-link">
                                    <?php if (!empty(get_sub_field('case_study_url'))) { ?>
                                        <a class="full-story-btn" href="<?php the_sub_field('case_study_url'); ?>" target="_blank">Read Story</a>
                                    <?php } ?>
                                    <div class="shrink-btn">Show Less</div>
                                </div>
                            </div>
                            <div class="action-bar">
                                <div class="expand-btn">Show More</div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </section>
		</div>

		<?php include(locate_template('template_parts/footer-cta.php')); ?>
        <?php include(locate_template('template_parts/main-footer.php')); ?>
		<?php include(locate_template('template_parts/main-scripts.php')); ?>	
	</body>
</html>
