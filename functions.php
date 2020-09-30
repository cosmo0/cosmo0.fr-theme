<?php
/**
 * cosmo0 Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cosmo0
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'CHILD_THEME_COSMO0_VERSION', '1.0.0' );

/**
 * Enqueue styles
 */
function child_custom_styles() {
	wp_enqueue_style( 'cosmo0-theme-css', get_stylesheet_directory_uri() . '/style.css', array('astra-theme-css'), CHILD_THEME_COSMO0_VERSION, 'all' );
	wp_enqueue_style( 'plyr-css', get_stylesheet_directory_uri() . '/css/plyr.css', array('astra-theme-css'), '', 'all' );
}

/**
 * Enqueue scripts
 */
function child_custom_scripts() {
    wp_enqueue_script( 'plyr-js', get_stylesheet_directory_uri() . '/js/plyr.polyfilled.min.js', array( 'jquery' ),'',true );
}

add_action( 'wp_enqueue_scripts', 'child_custom_styles', 15 );
add_action( 'wp_enqueue_scripts', 'child_custom_scripts' );
