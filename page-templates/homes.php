<?php

/*
Template Name: Homes
*/
get_header(); ?>
<?php get_template_part('template-parts/hero'); ?>
<div class="wrapper pt-0" id="page-wrapper">

	<?php get_template_part('global-templates/hero'); ?>

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<main class="site-main" id="main">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part('loop-templates/content', 'homes'); ?>
				<?php endwhile; ?>
			</main>

		</div>

	</div>

</div>

<?php get_footer();