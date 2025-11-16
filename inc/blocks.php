<?php
/**
 * Register Custom Gutenberg Blocks
 *
 * @package Infinity_2025_Simple
 */

/**
 * Register Infinity Container Block
 */
function infinity_register_blocks() {
    // Register Infinity Container block
    register_block_type( INFINITY_DIR . '/inc/blocks/infinity-container' );
}
add_action( 'init', 'infinity_register_blocks' );
