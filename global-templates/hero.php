<?php
/**
 * Hero setup
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$home = is_front_page();

?>

<div class="main-hero mb-5 py-5">
	<div class="container <?php if($home) { ?>py-lg-5<?php } ?>">
		<?php if($home) { ?><div class="py-lg-5"><?php } ?>
			<h1 class="text-center text-white py-4 <?php if($home) { ?>py-lg-5<?php } ?> w-100"><?php the_title(); ?></h1>
		<?php if($home) { ?></div><?php } ?>
	</div>
</div>