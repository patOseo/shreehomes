<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<div id="wrapper-footer-full" class="py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<img class="mb-5 mb-lg-0" src="/wp-content/uploads/2019/07/square-logo.png" alt="Shree Homes">
			</div>
			<div class="col-lg-4">
				<h6 class="mb-2 mb-lg-4 text-primary fw-bold">Contact Us</h6>
				<?php if(get_field('email', 'option')): ?><p><a class="text-decoration-none" href="<?php the_field('email', 'option'); ?>"><?php the_field('email', 'option'); ?></a></p><?php endif; ?>
				<?php if(get_field('phone_number', 'option')): ?><p><a class="text-decoration-none" href="tel:<?php the_field('phone_number', 'option'); ?>"><?php the_field('phone_number', 'option'); ?></a></p><?php endif; ?>
				<?php if(get_field('facebook_url', 'option')): ?>
					<p>
						<a class="text-decoration-none" href="<?php the_field('facebook_url', 'option'); ?>">
							<span class="fa-stack fa-lg fs-6">
  								<i class="fa fa-circle fa-stack-2x text-primary"></i>
  								<i class="fa fa-facebook fa-stack-1x fa-inverse text-light"></i>
							</span>
						</a>
					</p>
				<?php endif; ?>
			</div>
			<div class="col-lg-4">
				<h6 class="mb-2 mb-lg-4 text-primary fw-bold">Shree Homes Inc.</h6>
				<?php if(get_field('address', 'option')): ?><p><?php the_field('address', 'option'); ?></p><?php endif; ?>
			</div>
		</div>
	</div>
</div>

<footer class="footer bg-dark py-4">
	<div class="copyright-bar text-center text-light">
		<span>© <?php echo date('Y'); ?> Shree Homes Inc. | All Rights Reserved</span>
	</div>
</footer>

<?php // Closing div#page from header.php. ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

