<?php
/**
 * Zaban Couples functions and definitions
 *
 * @package Brain_Bytes
 * @subpackage Zaban_Couples
 * @since Zaban Couples 1.0
 */

if (!function_exists('zabancouples_setup')) {

    function zabancouples_setup() {

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');

        // Default thumbnail
        set_post_thumbnail_size(825, 510, true);

        // Register primary nav menu
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'zabancouples')
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ));
    }
}

add_action( 'after_setup_theme', 'zabancouples_setup' );

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Zaban Couples 1.1
 */
function zabancouples_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'zabancouples_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Zaban Couples 1.0
 */
function zabancouples_scripts() {
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.min.css');
    wp_enqueue_style('typography', get_template_directory_uri() . '/css/typography.css');
    wp_enqueue_style('grid', get_template_directory_uri() . '/css/grid.css');
    wp_enqueue_style('utility', get_template_directory_uri() . '/css/utility.css');

    wp_enqueue_style('zabancouples-style', get_stylesheet_uri());

    wp_enqueue_script('zabancouples-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20150330', true);
}

add_action( 'wp_enqueue_scripts', 'zabancouples_scripts' );

/**
 * Zaban Couples Custom Header
 *
 * @since Zaban Couples 1.0
 */

$custom_header_args = array(
  'width' => 445,
	'flex-width' => true,
	'flex-height' => true,
	'default-image' => get_template_directory_uri() . '/images/logo.png',
);

add_theme_support( 'custom-header', $custom_header_args );

/**
 * show/hide admin bar
 */

show_admin_bar( false );

/**
 * Font-Awesome Shortcode
 */

function icon_func( $atts ) {
	$atts = shortcode_atts( array(
		'class' => '',
	), $atts, 'icon' );

	return '<i class="fa '.$atts['class'].'"></i>';
}
add_shortcode( 'icon', 'icon_func' );
