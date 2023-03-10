<?php

/**
 * Registers custom ACF blocks.
 */
add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
	register_block_type( __DIR__ . '/../blocks/divider' );
	register_block_type( __DIR__ . '/../blocks/communities' );
    register_block_type( __DIR__ . '/../blocks/models' );
    register_block_type( __DIR__ . '/../blocks/pdf-link' );
}
