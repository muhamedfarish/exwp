<?php   
/**
 * Block Patterns
 *
 * @package Filmways Lite
 * @since 1.0
 */

/**
 * Registers block patterns and categories.
 *
 * @since 1.0
 *
 * @return void
 */
function filmways_lite_register_block_patterns() {
	$block_pattern_categories = array(
		'filmways-lite' => array( 'label' => esc_html__( 'Filmways Lite Patterns', 'filmways-lite' ) ),
		'pages'    => array( 'label' => esc_html__( 'Pages', 'filmways-lite' ) ),
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *     An associative array of block pattern categories, keyed by category name.
	 *
	 *     @type array[] $properties {
	 *         An array of block category properties.
	 *
	 *         @type string $label A human-readable label for the pattern category.
	 *     }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'filmways_lite_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
			register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(		
		'header-default',
		'header-banner',
		'inner-banner',
		'who-we-are',
		'what-we-do',					
		'hidden-404',
		'sidebar',		
		'footer-default',	
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since 1.0
	 *
	 * @param array $block_patterns List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'filmways_lite_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		$pattern_file = get_parent_theme_file_path( '/inc/patterns/' . $block_pattern . '.php' );

		register_block_pattern(
			'filmways-lite/' . $block_pattern,
			require $pattern_file
		); // register_block_pattern( string $pattern_name, array $pattern_properties )
	}
}
add_action( 'init', 'filmways_lite_register_block_patterns', 9 );