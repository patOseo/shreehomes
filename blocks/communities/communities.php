<?php

$args = array(
	'post_type' => 'communities',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'order' => 'DESC',
	'orderby' => 'date'
);

$comms = new WP_Query($args);

?>

<?php if($comms->have_posts()): ?>

	<div class="communities py-4">
		<div class="row justify-content-center gx-3">
			<?php while($comms->have_posts()): $comms->the_post(); ?>
				<?php 
					if(get_the_post_thumbnail()) {
						$bg = get_the_post_thumbnail_url(get_the_ID(), '4x3');
					} else {
						$bg = wp_get_attachment_image_url(get_field('default_bg', 'option'), '4x3');
					}
				?>
				<div class="col-lg-4 mb-3 mb-lg-0">
					<div class="community-block text-center position-relative" style="background-image:url('<?= $bg; ?>');">
						<div class="community-overlay py-4 py-lg-5 position-relative top-0 start-0 w-100 h-100">
							<a href="<?php the_permalink(); ?>" class="stretched-link text-decoration-none">
								<h3 class="h4"><?php the_title(); ?></h3>
							</a>
							<?php echo wp_get_attachment_image(get_field('logo', get_the_ID()), 'thumbnail'); ?>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>

<?php endif;