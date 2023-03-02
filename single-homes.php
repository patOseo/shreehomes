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
?>

<div class="wrapper pt-0" id="single-wrapper">

	<div class="main-hero mb-5 py-5">
		<div class="container <?php if($home) { ?>py-lg-5<?php } ?>">
			<?php if($home) { ?><div class="py-lg-5"><?php } ?>
				<p class="h1 text-center text-white mb-0 py-4 w-100">Our Home Models</p>
			<?php if($home) { ?></div><?php } ?>
		</div>
	</div>

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1><?php the_title(); ?></h1>
					<p><strong><?php the_field('square_footage'); ?> ft² • <?php the_field('floors'); ?> Floors • <?php the_field('beds'); ?> Beds • <?php the_field('baths'); ?> Baths</strong></p>
					<div class="row">
						<div class="col-lg-9">
							<div class="mb-4"><?php the_post_thumbnail('full'); ?></div>
							<?php the_field('description'); ?>
						</div>
						<div class="col-lg-3 home-extra text-center">
							<?php if($community): $post = $community; $commimg = get_field('logo'); ?>
							<div class="home-community">
								<h4 class="h5">Community:</h4>
								<?php echo wp_get_attachment_image($commimg, 'full'); ?>
							</div>
							<?php endif; wp_reset_postdata(); ?>
							<?php if(have_rows('floorplans')): ?>
								<h4 class="h5">Floorplans:</h4>
				
									<?php while(have_rows('floorplans')): the_row(); $link = get_sub_field('pdf'); $floorplan = get_sub_field('image'); ?>
										<div class="floorplan-thumb"><?php if($link): ?><a href="<?php the_sub_field('pdf'); ?>" target="_blank"><?php endif; echo wp_get_attachment_image($floorplan['ID'], 'thumbnail'); ?><?php if($link): ?></a><?php endif; ?></div>
									<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</article>

			</main>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php
get_footer();
