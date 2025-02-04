<?php
/**
 * Scholarship functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mystery Themes
 * @subpackage Scholarship
 * @since 1.0.0
 */

if ( ! defined( 'scholarship_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	$scholarship_blog_theme_info = wp_get_theme();
	define( 'scholarship_VERSION', $scholarship_blog_theme_info->get( 'Version' ) );
}


if ( ! function_exists( 'scholarship_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function scholarship_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Scholarship, use a find and replace
	 * to change 'scholarship' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'scholarship', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 50,
		'width'       => 240,
		'flex-height' => true,
		'flex-width' => true,		
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * Define custom image size
	 *
	 * @since 1.1.1
	 */
	add_image_size( 'scholarship-blog-medium', 600, 318, true );
	add_image_size( 'scholarship-blog-large', 1210, 642, true );
	add_image_size( 'scholarship-portfolio-medium', 500, 500, true );
	add_image_size( 'scholarship-team-medium', 300, 343, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'scholarship_primary_menu' => esc_html__( 'Primary Menu', 'scholarship' ),
		'scholarship_footer_menu' => esc_html__( 'Footer Menu', 'scholarship' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'scholarship_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'scholarship_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function scholarship_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'scholarship_content_width', 640 );
}
add_action( 'after_setup_theme', 'scholarship_content_width', 0 );

/**
 * Set the theme version, based on theme stylesheet.
 *
 * @global string $scholarship_version_info
 */
function scholarship_version_info() {
	$scholarship_version_info = wp_get_theme();
	$GLOBALS['scholarship_version'] = $scholarship_version_info->get( 'Version' );
}
add_action( 'after_setup_theme', 'scholarship_version_info', 0 );

/**
 * Added widget function for scholarship
 */
require get_template_directory() . '/inc/widgets/scholarship-widget-functions.php';

/**
 * Added new function for scholarship
 */
require get_template_directory() . '/inc/scholarship-functions.php';

/**
 * Added new file for scholarship custom hooks
 */
require get_template_directory() . '/inc/scholarship-hooks.php';

/**
 * Load files for metaboxes
 */
require get_template_directory() . '/inc/metaboxes/mt-page-metabox.php';
require get_template_directory() . '/inc/metaboxes/mt-post-metabox.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Added customizer custom class
 */
require get_template_directory() . '/inc/customizer/customizer-custom-classes.php';

/**
 * Added customizer sanitize
 */
require get_template_directory() . '/inc/customizer/customizer-sanitize.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load TGM
 * 
 * require get_template_directory() . '/inc/tgm/mt-recommend-plugins.php';
 */

/**
* Load theme dashboard
*/
require get_template_directory() . '/inc/admin/class-scholarship-admin.php';
require get_template_directory() . '/inc/admin/class-scholarship-notice.php';
require get_template_directory() . '/inc/admin/class-scholarship-dashboard.php';