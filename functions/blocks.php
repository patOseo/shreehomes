<?php

/**
 * Registers custom ACF blocks.
 */
add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
	register_block_type( __DIR__ . '/../blocks/communities' );
    register_block_type( __DIR__ . '/../blocks/models' );
}
