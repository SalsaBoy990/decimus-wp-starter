<?php
/**
 * Decimus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Decimus
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


// Register Bootstrap 5 Nav Walker
if ( ! function_exists( 'decimus_register_navwalker' ) ) :

	/**
	 * @return void
	 */
	function decimus_register_navwalker(): void {
		require_once( 'inc/class-bootstrap-5-navwalker.php' );
		// Register Menus
		register_nav_menu( 'main-menu', 'Main menu' );
		register_nav_menu( 'footer-menu', 'Footer menu' );
	}

endif;
add_action( 'after_setup_theme', 'decimus_register_navwalker' );
// Register Bootstrap 5 Nav Walker END


// Register Comment List
if ( ! function_exists( 'decimus_register_comment_list' ) ) :

	/**
	 * @return void
	 */
	function decimus_register_comment_list(): void {
		// Register Comment List
		require_once( 'inc/comment-list.php' );
	}

endif;
add_action( 'after_setup_theme', 'decimus_register_comment_list' );
// Register Comment List END


if ( ! function_exists( 'decimus_scripts' ) ) :

	/**
	 * Enqueue scripts and styles
	 *
	 * @return void
	 */
	function decimus_scripts(): void {

		// Get modification times.
		// Enqueueing files with modification date to prevent browser from loading cached scripts and styles when file content changes.
		$modifiedBS          = date( 'YmdHi', filemtime( get_template_directory() . '/css/lib/bootstrap.min.css' ) );
		$modifiedStyle       = date( 'YmdHi', filemtime( get_stylesheet_directory() . '/style.css' ) );
		$modifiedFontawesome = date( 'YmdHi', filemtime( get_template_directory() . '/css/lib/fontawesome.min.css' ) );
		$modifiedCF7         = date( 'YmdHi',
			filemtime( get_template_directory() . '/inc/components/bs5-contact-form-7/css/contactform-style.css' ) );
		$modifiedBSScript    = date( 'YmdHi',
			filemtime( get_template_directory() . '/js/lib/bootstrap.bundle.min.js' ) );
		$modifiedThemeScript = date( 'YmdHi', filemtime( get_template_directory() . '/js/theme.js' ) );
		$modifiedCF7Script   = date( 'YmdHi',
			filemtime( get_template_directory() . '/inc/components/bs5-contact-form-7/js/contactform-script.js' ) );


		// Style CSS
		wp_enqueue_style( 'decimus-style', get_stylesheet_uri(), array(), $modifiedStyle );

		// Bootstrap
		wp_enqueue_style( 'bootstrap',
			get_template_directory_uri() . '/css/lib/bootstrap.min.css',
			array(),
			$modifiedBS );

		// Fontawesome
		wp_enqueue_style( 'fontawesome',
			get_template_directory_uri() . '/css/lib/fontawesome.min.css',
			array(),
			$modifiedFontawesome );

		// Contact form styles
		wp_enqueue_style( 'bs5-contactform-style',
			get_template_directory_uri() . '/inc/components/bs5-contact-form-7/css/contactform-style.css',
			array(),
			$modifiedCF7 );

		// Bootstrap JS
		wp_enqueue_script( 'bootstrap',
			get_template_directory_uri() . '/js/lib/bootstrap.bundle.min.js',
			array(),
			$modifiedBSScript,
			true );

		// Contact form script
		wp_enqueue_script( 'bs5-contactform-js',
			get_template_directory_uri() . '/inc/components/bs5-contact-form-7/js/contactform-script.js',
			array(),
			$modifiedCF7Script,
			true );


		// Slick Slider
		wp_enqueue_script( 'slick-slider-js', get_template_directory_uri() . '/js/slick.min.js', false, '', true );


		// Theme JS
		wp_enqueue_script( 'decimus-script',
			get_template_directory_uri() . '/js/theme.js',
			array(),
			$modifiedThemeScript,
			true );


		// Only enqueue comments script when needed
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'decimus_scripts' );
//Enqueue scripts and styles END


/**
 * Theme settings
 */
require_once get_template_directory() . '/inc/theme.php';


/**
 * Widgets
 */
require_once get_template_directory() . '/inc/widgets.php';


/**
 * Navigation (pagination, breadcrumbs, post links, etc.)
 */
require_once get_template_directory() . '/inc/navigation.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Custom components
 */
require_once get_template_directory() . '/inc/components.php';


/**
 * Custom widgets
 */
require_once get_template_directory() . '/inc/widgets/post-archives.php';
require_once get_template_directory() . '/inc/widgets/post-categories.php';
require_once get_template_directory() . '/inc/widgets/post-tags.php';
require_once get_template_directory() . '/inc/widgets/recent-posts.php';


if ( ! function_exists( 'decimus_is_woocommerce_activated' ) ) {

	/**
	 * @return bool
	 */
	function decimus_is_woocommerce_activated(): bool {
		return class_exists( 'WooCommerce' );
	}
}


/**
 * @param array $args
 *
 * @return string
 *
 * args:
 * $lowercase === 0|1
 * $uppercase === 0|1
 * $numbers === 0|1
 * $symbols === 0|1
 * $pwd_length
 * @throws Exception
 */
function decimus_generate_safe_password( array $args ): string {

	extract( $args );

	if (
		$lowercase === 0 &&
		$uppercase === 0 &&
		$numbers === 0 &&
		$symbols === 0
	) {
		return '';
	}

	// simple error handling
	if ( ! is_numeric( $pwd_length ) && is_integer( $pwd_length ) ) {
		wp_die( 'Password length argument should be an integer!' );
	}

	// $pwd_length = filter_var($pwd_length, FILTER_VALIDATE_INT);
	$pwd_length = filter_var( $pwd_length, FILTER_SANITIZE_NUMBER_INT );

	// small letters
	$lowercaseChars = 'abcdefghijklmnopqrstuvwxyz';

	// CAPITAL LETTERS
	$uppercaseChars = strtoupper( $lowercaseChars );

	// numerics
	$numberChars = '1234567890';

	// special characters
	$symbolChars = '`~!@#$%^&*()-_=+]}[{;:,<.>/?\'"\|';

	$charset = '';

	// Contains specific character groups
	if ( $lowercase ) {
		$charset .= $lowercaseChars;
	}
	if ( $uppercase ) {
		$charset .= $uppercaseChars;
	}
	if ( $numbers ) {
		$charset .= $numberChars;
	}
	if ( $symbols ) {
		$charset .= $symbolChars;
	}

	// store password
	$password = '';

	// Loop until the preferred length reached
	for ( $i = 0; $i < $pwd_length; $i ++ ) {
		// get randomized length with cryptographically secure integers
		$_rand = random_int( 0, strlen( $charset ) - 1 );

		// returns part of the string
		$password .= substr( $charset, $_rand, 1 );
	}

	return $password;
}

/**
 *
 * @throws Exception
 */
function decimus_generate_unique_filename( $filename_length ): string {
	return decimus_generate_safe_password( [
			'pwd_length' => $filename_length,
			'lowercase'  => 1,
			'uppercase'  => 1,
			'numbers'    => 1,
			'symbols'    => 0,
		] ) . time();
}
