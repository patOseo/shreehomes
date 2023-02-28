<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 * @since 1.1.0
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="top-bar bg-primary py-2 text-end text-light">
	<div class="container-fluid">
		<div class="info-bar">
			<div class="top-info"><a class="mx-lg-2 text-decoration-none text-light" href="mailto:<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a>&nbsp;&nbsp;&nbsp;<a class="mx-lg-2 text-decoration-none text-light" href="tel:<?php the_field('phone_number', 'option') ?>"><?php the_field('phone_number', 'option'); ?></a>&nbsp;&nbsp;&nbsp;
				<?php if(get_field('facebook_url', 'option')): ?>
				<a class="facebook" target="_blank" rel="noopener" href="<?php the_field('facebook_url', 'option'); ?>">
					<span class="fa-stack fa-lg fs-6">
  						<i class="fa fa-circle fa-stack-2x text-light"></i>
  						<i class="fa fa-facebook fa-stack-1x fa-inverse text-primary"></i>
					</span>
				</a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<nav id="main-nav" class="navbar navbar-expand-lg py-3" aria-labelledby="main-nav-label">

	<p id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</p>


	<div class="container-fluid">

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="main-logo" src="<?php the_field('logo', 'option'); ?>" alt="Shree Homes Logo"></a>

		<button
			class="navbar-toggler"
			type="button"
			data-bs-toggle="collapse"
			data-bs-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>"
		>
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- The WordPress Menu goes here -->
		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'primary',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarNavDropdown',
				'menu_class'      => 'navbar-nav ms-auto',
				'fallback_cb'     => '',
				'menu_id'         => 'main-menu',
				'depth'           => 2,
				'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
			)
		);
		?>

	</div><!-- .container(-fluid) -->

</nav><!-- #main-nav -->
