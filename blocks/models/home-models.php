<?php 

if(get_field('max_homes')) {
	$max_homes = get_field('max_homes');
} else {
	$max_homes = -1;
}

$homeargs = array(
	'post_type' => 'homes',
	'posts_per_page' => $max_homes,
	'orderby' => 'title',
	'order' => 'ASC',
);

$homes = new WP_Query($homeargs);

?>

<?php if ($homes->have_posts()): ?>
<section class="homes-section py-4">
	 <div class="container">
	 	<div class="row justify-content-center homes">
			<?php while($homes->have_posts()): $homes->the_post(); ?>
			<div class="col-lg-4 cell home mb-0 text-center">
				<a class="text-decoration-none" href="<?php the_permalink(); ?>">
					<div class="mb-3"><?php the_post_thumbnail('medium_large'); ?></div>
					<h4 class="h5"><?php the_title(); ?></h4>
					<p><?php the_field('beds', get_the_ID()); ?> beds, <?php the_field('baths', get_the_ID()); ?> baths, <?php the_field('square_footage', get_the_ID()); ?> ft²</p>
				</a>
			</div>
			<?php endwhile; ?>
	 	</div>

	 	<div class="row">
	 		<div class="col-12">
	 			<div class="mt-4 w-100 text-center">
	 				<a class="btn btn-md btn-primary" href="/homes/">See All Models</a>
	 			</div>
	 		</div>
	 	</div>
	 </div>
</section>
<?php endif; ?>