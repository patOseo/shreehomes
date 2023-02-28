<section class="homes-section my-4 py-5">
	 <div class="container">
	 	<div class="row homes">
	 		<?php
	 			if(is_page(31)) {
	 				$homeargs = array(
	 					'post_type' => 'homes',
	 					'posts_per_page' => -1,
	 					'orderby' => 'title',
	 					'order' => 'ASC',
	 				);
	 			} else {
	 				$homeargs = array(
	 					'post_type' => 'homes',
	 					'posts_per_page' => 3,
	 					'orderby' => 'title',
	 					'order' => 'ASC',

	 				);
	 			}

	 			$homes = new WP_Query($homeargs);
	 		?>
	 		<?php if ($homes->have_posts()): ?>
				<?php while($homes->have_posts()): $homes->the_post(); ?>
				<div class="col-lg-4 cell home mb-0 text-center">
					<a class="text-decoration-none" href="<?php the_permalink(); ?>">
						<div class="mb-3"><?php the_post_thumbnail('medium_large'); ?></div>
						<h4 class="h5"><?php the_title(); ?></h4>
						<p><?php the_field('beds'); ?> beds, <?php the_field('baths'); ?> baths, <?php the_field('square_footage'); ?> ft²</p>
					</a>
				</div>
				<?php endwhile; ?>
	 		<?php endif; ?>
	 		<?php wp_reset_postdata(); ?>
	 	</div>
	 	<?php if(!is_page(31)): ?><div><a class="button large" href="/homes/"><?php the_field('button_text', 5); ?></a></div><?php endif; ?>
	 </div>
</section>