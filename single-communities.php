<?php
/**
 * The template for displaying all single communities
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if(get_the_post_thumbnail_url()) {
	$background = get_the_post_thumbnail_url();
} else {
	$background = '/wp-content/themes/shreehomes/images/hero-bg.jpg';
}
$logo = get_field('logo');
$city = get_field('city');
$region = get_field('region');
$map = get_field('google_map');
$models = get_field('models');
$gallery = get_field('gallery');
?>

<?php get_template_part('global-templates/map', 'script'); ?>

<div class="wrapper py-0" id="single-wrapper">

	<div class="main-hero" style="background-image:url('<?= $background; ?>');">
		<div class="hero-overlay py-4">
			<div class="container py-5">
				<div class="h1 text-white text-center py-5"></div>
			</div>
		</div>
	</div>

	<div class="container mt-n5">
		<div class="community-box bg-white px-lg-5 pb-5">
			<div class="row align-items-center pb-3">
				<div class="col-12">
					<div class="text-center"><?php echo wp_get_attachment_image($logo, 'full'); ?></div>
					<div class="h6 fw-light text-center text-uppercase">
						<?php echo $city; ?> <?php if($city && $region) { ?><span class="px-4">|</span><?php } echo $region; ?>
					</div>
					<div class="text-center">
						<div class="py-3"><?php the_content(); ?></div>
						<button type="button" class="btn btn-primary py-2" data-bs-toggle="modal" data-bs-target="#registerModal">
							Register for Priority Purchasing
						</button>
					</div>
					
				</div>
			</div>
		</div>
	</div>

	<?php if( $map ): ?>
    <div class="acf-map my-5" data-zoom="16">
        <div class="marker" data-lat="<?php echo esc_attr($map['lat']); ?>" data-lng="<?php echo esc_attr($map['lng']); ?>"></div>
    </div>
	<?php endif; ?>

	<div class="<?php echo esc_attr( $container ); ?> py-5" id="content" tabindex="-1">

		<nav>
		  <div class="border border-light nav nav-tabs nav-pills nav-fill" id="nav-tab" role="tablist">
		    <button class="h5 fw-bold mx-0 p-3 bg-grey rounded-0 nav-link active" id="nav-phases-tab" data-bs-toggle="tab" data-bs-target="#tabPhases" type="button" role="tab" aria-controls="tab-phases" aria-selected="true"><i class="fa fa-flag me-2"></i> Phases</button>
		    <button class="h5 fw-bold mx-0 p-3 bg-grey rounded-0 nav-link" id="nav-models-tab" data-bs-toggle="tab" data-bs-target="#tabModels" type="button" role="tab" aria-controls="tab-models" aria-selected="false"><i class="fa fa-home me-2"></i> Available Models</button>
		  	<button class="h5 fw-bold mx-0 p-3 bg-grey rounded-0 nav-link" id="nav-gallery-tab" data-bs-toggle="tab" data-bs-target="#tabGallery" type="button" role="tab" aria-controls="tab-gallery" aria-selected="false"><i class="fa fa-picture-o me-2"></i> Gallery</button>
		  </div>
		</nav>

		<div class="tab-content py-5">
			<div class="tab-pane fade show active py-4" id="tabPhases">
				<?php if(have_rows('phases')): ?>
					<div class="phases border-light">
						<div class="row">
							<?php while(have_rows('phases')): the_row(); ?>
							<?php 
								if(get_sub_field('sold') == 1) {
									$phasetitle = '<s>' . get_sub_field('phase_title') . '</s> SOLD';
								} else {
									$phasetitle = get_sub_field('phase_title');
								}
							?>
								<div class="col-lg-6 mb-3 mb-lg-0">
									<div class="phase p-4 h-100">
										<h3 class="h3 mb-0 py-2 text-center"><?= $phasetitle; ?></h3>
										<hr class="divider mt-3 mb-5 mx-auto">
										<?php if(get_sub_field('phase_plan')): ?>
											<div class="ratio ratio-4x3">
												<figure class="wp-block-gallery">
													<figure class="wp-block-image">
														<a href="<?php echo wp_get_attachment_image_url(get_sub_field('phase_plan'), 'full'); ?>"><?php echo wp_get_attachment_image(get_sub_field('phase_plan'), 'full'); ?></a>	
													</figure>
												</figure>
											</div>
										<?php else: ?>
											<h3 class="h4 text-center">
												<?php if(get_sub_field('sold') != 1) : ?>
													Coming Soon!
												<?php else: ?>
													This phase is sold.
												<?php endif; ?>
											</h3>
										<?php endif; ?>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				<?php else: ?>
					<p class="text-center">There are currently no phases available for this community.</p>
				<?php endif; ?>
			</div>
			<div class="tab-pane fade py-4" id="tabModels">
				<?php if($models): ?>
					<section class="homes-section">
						<div class="row">
							<?php foreach($models as $post): ?>
								<div class="col-lg-4 cell home mb-0 text-center">
									<div class="single-model position-relative">
										<div class="mb-3"><?php the_post_thumbnail('medium_large'); ?></div>
										<a class="text-decoration-none stretched-link" href="<?php the_permalink(); ?>"><h4 class="h5"><?php the_title(); ?></h4></a>
										<p><?php the_field('beds', get_the_ID()); ?> beds, <?php the_field('baths', get_the_ID()); ?> baths, <?php the_field('square_footage', get_the_ID()); ?> ft²</p>
									</div>
								</div>
							<?php endforeach; wp_reset_postdata(); ?>
						</div>
					</section>
				<?php else: ?>
					<p class="text-center">There are no available models for this community.</p>
				<?php endif; ?>
			</div>
			<div class="tab-pane fade py-4" id="tabGallery">
				<?php if($gallery): ?>
				<?php else: ?>
					<p class="text-center">No gallery available for this community.</p>
				<?php endif; ?>
			</div>
		</div>

	</div><!-- #content -->

	

</div><!-- #single-wrapper -->



<?php
get_footer();
