<?php
/**
 * The Ball 2022 Child Theme Functions
 *
 * Theme amendments and overrides.
 *
 * @since 1.0.0
 * @package The_Ball_2022
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Set our version here.
define( 'THEBALL2022_VERSION', '2.0.1' );

/**
 * Load theme class if not yet loaded and return instance.
 *
 * @since 1.0.0
 *
 * @return SOF_The_Ball_Theme $theme The theme instance.
 */
function sof_the_ball_2022_theme() {

	// Declare as static.
	static $theme;

	// Instantiate plugin if not yet instantiated.
	if ( ! isset( $theme ) ) {
		include get_stylesheet_directory() . '/includes/class-theme.php';
		$theme = new SOF_The_Ball_2022_Theme();
	}

	// --<
	return $theme;

}

// Init immediately.
sof_the_ball_2022_theme();
