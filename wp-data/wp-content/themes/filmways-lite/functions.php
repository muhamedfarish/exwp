<?php
/**
 * Filmways Lite functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Filmways Lite
 * @since 1.0
 */

if ( ! function_exists( 'filmways_lite_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since 1.0
	 *
	 * @return void
	 */
	function filmways_lite_support() {
	
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );		

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}
endif;
add_action( 'after_setup_theme', 'filmways_lite_support' );

/*-------------------------------------------------------------
 Enqueue Styles
--------------------------------------------------------------*/

if ( ! function_exists( 'filmways_lite_styles' ) ) :	
	function filmways_lite_styles() {
		// Register theme stylesheet.
		wp_enqueue_style('filmways-lite-style', get_stylesheet_uri(), array(), wp_get_theme()->get('version') );
		wp_enqueue_style('filmways-lite-style-blocks', get_template_directory_uri(). '/assets/css/blocks.css');
		wp_enqueue_style('filmways-lite-style-responsive', get_template_directory_uri(). '/assets/css/responsive.css');
	}

endif;
add_action( 'wp_enqueue_scripts', 'filmways_lite_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';

/**
 * Customize Pro included.
 */
require_once get_template_directory() . '/customize-pro/class-customize.php';
// Theme info Page
require_once get_template_directory() . '/inc/theme-info.php';

?>