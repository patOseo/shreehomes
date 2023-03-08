<?php
/**
 * The template for displaying all single homes
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

$community = get_field('community');
$background = '/wp-content/themes/shreehomes/images/hero-bg.jpg';
$img_gallery = get_field('gallery');
?>

<div class="wrapper pt-0" id="single-wrapper">

	<div class="main-hero" style="background-image:url('<?= $background; ?>');">
		<div class="hero-overlay py-4">
			<div class="container py-5">
				<div class="py-5 text-center position-relative title-box">
					<h1 class="text-white mb-0"><?php the_title(); ?></h1>
					
				</div>
			</div>
		</div>
	</div>

	<div class="container mt-n5">
		<div class="hero-box">
			<p class="mb-2"><a href="/models/" class="text-decoration-none text-white">&#8249; Back to Models</a></p>
			<div class="shadow bg-white px-lg-5 pb-5 pb-lg-0">
				<div class="row align-items-center pb-3">
					<div class="col-12">
						<div class="text-center my-4">
							<?php the_post_thumbnail('4x3', array('class' => 'mb-3')); ?>
							<p><strong><?php the_field('square_footage'); ?> ft² • <?php the_field('floors'); ?> Floors • <?php the_field('beds'); ?> Bedrooms<?php if(get_field('baths')) { ?> • <?php the_field('baths'); ?> Bathrooms<?php } ?></strong></p>
						<?php the_field('description'); ?>
						</div>					
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

			<main class="site-main" id="main">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<nav>
					  <div class="border border-light nav nav-tabs nav-pills nav-fill" id="nav-tab" role="tablist">
					    <button class="h5 fw-bold mx-0 p-3 bg-grey rounded-0 nav-link active" id="nav-3d-tab" data-bs-toggle="tab" data-bs-target="#tab3D" type="button" role="tab" aria-controls="tab-3d" aria-selected="true"><i class="fa fa-home me-2"></i> 3D Plan</button>
					    <button class="h5 fw-bold mx-0 p-3 bg-grey rounded-0 nav-link" id="nav-floorplan-tab" data-bs-toggle="tab" data-bs-target="#tabFloorplan" type="button" role="tab" aria-controls="tab-floorplan" aria-selected="false"><i class="fa fa-map-o me-2"></i> Floor Plan</button>
					    <button class="h5 fw-bold mx-0 p-3 bg-grey rounded-0 nav-link" id="nav-gallery-tab" data-bs-toggle="tab" data-bs-target="#tabGallery" type="button" role="tab" aria-controls="tab-gallery" aria-selected="false"><i class="fa fa-image me-2"></i> Gallery</button>
					  </div>
					</nav>

					<div class="tab-content">
						<div class="tab-pane fade show active py-5" id="tab3D">
							<?php if(have_rows('3d_floorplans')): ?>
								<?php while(have_rows('3d_floorplans')): the_row(); $gallery = get_sub_field('3d_plan'); ?>
									<?php if($gallery): ?>
										<div class="gallery-section mb-5">
											<figure class="is-layout-flex wp-block-gallery has-nested-images columns-4 is-cropped">
												<?php foreach($gallery as $image_id): ?>
													<figure class="wp-block-image size-large">
														<a href="<?php echo wp_get_attachment_image_url($image_id, 'full'); ?>"><?php echo wp_get_attachment_image($image_id, 'full'); ?></a>
													</figure>
												<?php endforeach; ?>
											</figure>
											<?php if(get_sub_field('plan_3d_pdf')): ?>
												<div class="w-100 py-4 text-center"><a class="mx-auto btn btn-primary" href="<?php the_sub_field('plan_3d_pdf'); ?>" target="_blank" rel="noopener,noreferrer">Download PDF</a></div>
											<?php endif; ?>
										</div>
									<?php else: echo '<p class="text-center py-5">There is currently no 3D plan available.</p>'; endif; ?>
								<?php endwhile; ?>
							<?php else: ?>
								<p class="text-center py-5">There is currently no 3D plan available.</p>
							<?php endif; ?>
						</div>
						<div class="tab-pane fade py-5" id="tabFloorplan">
							<?php if(have_rows('black_floorplans')): ?>
								<?php while(have_rows('black_floorplans')): the_row(); $gallery = get_sub_field('floorplan'); ?>
									<?php if($gallery): ?>
										<div class="gallery-section mb-5">
											<figure class="is-layout-flex wp-block-gallery has-nested-images columns-4 is-cropped">
												<?php foreach($gallery as $image_id): ?>
													<figure class="wp-block-image size-large">
														<a href="<?php echo wp_get_attachment_image_url($image_id, 'full'); ?>"><?php echo wp_get_attachment_image($image_id, 'full'); ?></a>
													</figure>
												<?php endforeach; ?>
											</figure>
										</div>
										<?php if(get_sub_field('plan_pdf')): ?>
											<div class="w-100 py-4 text-center"><a class="mx-auto btn btn-primary" href="<?php the_sub_field('plan_pdf'); ?>" target="_blank" rel="noopener,noreferrer">Download PDF</a></div>
										<?php endif; ?>
									<?php else: echo '<p class="text-center py-5">There is currently no floor plan available.</p>'; endif; ?>
								<?php endwhile; ?>
							<?php else: ?>
								<p class="text-center py-5">There is currently no floor plan available.</p>
							<?php endif; ?>
						</div>
						<div class="tab-pane fade py-5" id="tabGallery">
							<?php if($img_gallery): ?>
								<figure class="is-layout-flex wp-block-gallery has-nested-images columns-6 is-cropped">
									<?php foreach($img_gallery as $image_id): ?>
										<figure class="wp-block-image size-large">
											<a href="<?php echo wp_get_attachment_image_url($image_id, 'full'); ?>"><?php echo wp_get_attachment_image($image_id, 'full'); ?></a>
										</figure>
									<?php endforeach; ?>
								</figure>
							<?php else: ?>
								<p class="text-center py-5">There is currently no gallery available for this model.</p>
							<?php endif; ?>
						</div>
					</div>
				</article>

			</main>

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
