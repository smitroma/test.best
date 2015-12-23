<?php
/**
 *  functions and definitions
 *
 * @package Brain_Bytes
 * @subpackage Hodges Mace
 * @since Hodges Mace  1.0
 */

if (!function_exists('hodges_setup')) {

    function hodgesmace_setup() {

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
            'primary' => __('Primary Menu', 'hodgesmace')
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

add_action( 'after_setup_theme', 'hodgesmace_setup' );

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Hodges Mace  1.1
 */
function hodgesmace_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'hodgesmace_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Hodges Mace  1.0
 */
function hodgesmace_scripts() {
    wp_enqueue_style('js_composer_front'); // VC CSS
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.min.css');
    wp_enqueue_style('typography', get_template_directory_uri() . '/css/typography.css');
    wp_enqueue_style('grid', get_template_directory_uri() . '/css/grid.css');
    wp_enqueue_style('utility', get_template_directory_uri() . '/css/utility.css');
    wp_enqueue_style('hodgesmace-style', get_stylesheet_uri());
    wp_enqueue_script('hodgesmace-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20150330', true);
}

add_action( 'wp_enqueue_scripts', 'hodgesmace_scripts' );

/**
 *  Custom Header
 *
 * @since Hodges Mace  1.0
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

/*-----------------------------------------------------------------------------------*/
/*	Custom Post Type : Portfolio
/*-----------------------------------------------------------------------------------*/

add_action('init', 'zt_portfolio_register');

function zt_portfolio_register() {

	$labels = array(
		'name' => 'Portfolio', 'post type general name',
		'singular_name' => 'Portfolio Item', 'post type singular name',
		'add_new' => 'Add New', 'portfolio item',
		'add_new_item' => 'Add New Portfolio Item',
		'edit_item' => 'Edit Portfolio Item',
		'new_item' => 'New Portfolio Item',
		'view_item' => 'View Portfolio Item',
		'search_items' => 'Search Portfolio',
		'not_found' =>  'Nothing found',
		'not_found_in_trash' => 'Nothing found in Trash',
		'parent_item_colon' => '',
	);

	$args = array(
		'labels' => $labels,
		'label' => 'asd',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'menu_position' => null,
		'supports' => array('title','comments', 'editor', 'thumbnail'),
		'show_in_menu' => TRUE,
		'show_in_nav_menus' => TRUE,
		'has_archive' => TRUE
	  );

	register_post_type( 'portfolio' , $args );
	register_taxonomy("portfolio_categories", array("portfolio"), array("hierarchical" => true, "label" => "Portfolio Categories", "singular_label" => "Portfolio Category", "rewrite" => true));

}

/*-----------------------------------------------------------------------------------*/
/*	Custom Post Type : Testimonials
/*-----------------------------------------------------------------------------------*/

add_action('init', 'testimonial_register');

function testimonial_register() {

	$labels = array(
		'name' => 'Testimonials', 'post type general name',
		'singular_name' => 'Testimonial Item', 'post type singular name',
		'add_new' => 'Add New', 'testimonial item',
		'add_new_item' => 'Add New Testimonial Item',
		'edit_item' => 'Edit Testimonial Item',
		'new_item' => 'New Testimonial Item',
		'view_item' => 'View Testimonial Item',
		'search_items' => 'Search Testimonial',
		'not_found' =>  'Nothing found',
		'not_found_in_trash' => 'Nothing found in Trash',
		'parent_item_colon' => '',
	);

	$args = array(
		'labels' => $labels,
		'label' => 'asd',
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => true,
		'menu_position' => null,
		'supports' => array('editor', 'thumbnail'),
		'show_in_menu' => TRUE,
		'show_in_nav_menus' => TRUE,
		'has_archive' => TRUE
	  );

	register_post_type( 'testimonials' , $args );
}

/*-----------------------------------------------------------------------------------*/
/*	EXCERPT LENGTH / CONTENT
/*-----------------------------------------------------------------------------------*/


  if ( ! function_exists( 'wpse_custom_wp_trim_excerpt' ) ) {
    function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
      $raw_excerpt = $wpse_excerpt;
      if ( '' == $wpse_excerpt ) {
          $wpse_excerpt = get_the_content('');
          $wpse_excerpt = apply_filters('the_content', $wpse_excerpt);
          $excerpt_length = apply_filters('excerpt_length', 75);
          $wpse_excerpt = trim(force_balance_tags($wpse_excerpt));

          return $wpse_excerpt;
      }
      return apply_filters('wpse_custom_wp_trim_excerpt', $wpse_excerpt, $raw_excerpt);
    }
  }

  remove_filter('get_the_excerpt', 'wp_trim_excerpt');
  add_filter('get_the_excerpt', 'wpse_custom_wp_trim_excerpt');
