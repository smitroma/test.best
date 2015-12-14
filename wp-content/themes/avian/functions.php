<?php
/*-----------------------------------------------------------------------------------

	Hello. This file contains all the important custom functions for 
	this theme. Please be very careful when editing this file.

-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Set Content Width
/*-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 634;
	
/*-----------------------------------------------------------------------------------*/
/*	Language Support
/*-----------------------------------------------------------------------------------*/

// Retrieve the directory for the localization files
$lang_dir = get_template_directory() . '/languages';
 
// Set the theme's text domain using the unique identifier from above

load_theme_textdomain('avian', $lang_dir);
	
/*-----------------------------------------------------------------------------------*/
/*	WooCommerce Support
/*-----------------------------------------------------------------------------------*/	
	
add_theme_support( 'woocommerce' );

/*-----------------------------------------------------------------------------------*/
/*	Load CSS Files
/*-----------------------------------------------------------------------------------*/

function zt_theme_styles()  {  
	
	//wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '20120208');	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '20120208');
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/style.css', array(), '20120208');	
	if (get_field('layout_mode', 'option') == "large_wide") {
		wp_enqueue_style( '1170', get_template_directory_uri() . '/assets/css/1170.css', array(), '20120208');
	}
	wp_enqueue_style( 'scripts', get_template_directory_uri() . '/assets/css/scripts.css', array(), '20120208');
	//wp_enqueue_style( 'isotope', get_template_directory_uri() . '/assets/css/isotope.css', array(), '20120208');
	//wp_enqueue_style( 'fanxybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.css', array(), '20120208');
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '20120208');
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), '20120208' );
	wp_enqueue_style( 'woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css', array(), '20120208' );
	//wp_enqueue_style( 'mini-cart', get_template_directory_uri() . '/assets/css/mini-cart.css', array(), '20120208' );
	
}
    
add_action( 'wp_enqueue_scripts', 'zt_theme_styles' );  


// Load Admin Styles (documentation)
function zt_custom_register_admin_styles() {
	wp_enqueue_style( 'docs', get_template_directory_uri() . '/docs/docs.css', array(), '20120208' );
}
add_action( 'admin_enqueue_scripts', 'zt_custom_register_admin_styles' );

/*-----------------------------------------------------------------------------------*/
/*	Load Javascript Files
/*-----------------------------------------------------------------------------------*/

function zt_theme_scripts() {


	wp_enqueue_script( 'comment-reply' );
    wp_enqueue_script( 'flex-slider', get_template_directory_uri() . "/assets/js/jquery.flexslider-min.js", array(),'', 'in_footer');	
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . "/assets/js/bootstrap.min.js", array(),'', 'in_footer');
    wp_enqueue_script( 'isotope_infinite', get_template_directory_uri() . "/assets/js/jquery.infinitescroll.min.js", array(),'', 'in_footer');
    wp_enqueue_script( 'isotope_manual', get_template_directory_uri() . "/assets/js/jquery.manual-trigger.js", array(),'', 'in_footer');
    wp_enqueue_script( 'isotope', get_template_directory_uri() . "/assets/js/jquery.isotope.min.js", array(),'', 'in_footer');
    wp_enqueue_script( 'bbq', get_template_directory_uri() . "/assets/js/jquery.ba-bbq.min.js", array(),'', 'in_footer');
    wp_enqueue_script( 'fancybox', get_template_directory_uri() . "/assets/js/jquery.fancybox.js", array(),'', 'in_footer');
    wp_enqueue_script( 'easing', get_template_directory_uri() . "/assets/js/easing.js", array(),'', 'in_footer');
    wp_enqueue_script( 'totop', get_template_directory_uri() . "/assets/js/jquery.ui.totop.js", array(),'', 'in_footer');
    wp_enqueue_script( 'like_post', get_template_directory_uri().'/assets/js/post-like.min.js', array(),'', 'in_footer');
    wp_enqueue_script( 'parallax', get_template_directory_uri().'/assets/js/jquery.parallax-1.1.3.js', array(),'', 'in_footer');
    wp_enqueue_script( 'scrollto', get_template_directory_uri().'/assets/js/jquery.scrollTo-1.4.2-min.js', array(),'', 'in_footer');
    //wp_enqueue_script( 'scrollingp', get_template_directory_uri().'/assets/js/jquery.scrolling-parallax.js', array(),'', 'in_footer');
    wp_enqueue_script( 'twitter_feed', get_template_directory_uri().'/framework/twitter/jquery.tweet.js', array(),'', 'in_footer');
    wp_enqueue_script( 'random_number', get_template_directory_uri().'/assets/js/random-number.js', array(),'');
    wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri().'/assets/js/waypoints.min.js', array(),'in_footer');
    wp_enqueue_script( 'jquery-waypoints-sticky', get_template_directory_uri().'/assets/js/waypoints-sticky.min.js', array(), 'in_footer');
    wp_enqueue_script( 'jquery-infinite-carousel', get_template_directory_uri().'/assets/js/jquery.infinite-carousel.js', array());


}

add_action('wp_enqueue_scripts', 'zt_theme_scripts');


// Load admin scripts (documentation, importer)
function zt_custom_register_admin_scripts() {

	wp_register_script( 'documentation-tabs', get_template_directory_uri() . '/assets/js/doc-tabs.js' );
	wp_enqueue_script( 'documentation-tabs' );
	
	wp_register_script( 'ajax-importer', get_template_directory_uri() . '/framework/importer/importer.js' );
	wp_enqueue_script( 'ajax-importer', array(),'', 'in_footer');

}

add_action( 'admin_enqueue_scripts', 'zt_custom_register_admin_scripts' );

/*-----------------------------------------------------------------------------------*/
/*	Load Google Fonts
/*-----------------------------------------------------------------------------------*/

function zt_mytheme_fonts() {
    $protocol = is_ssl() ? 'https' : 'http';
    
    // Default Font
	wp_enqueue_style( 'mytheme-sourcesanspro', "$protocol://fonts.googleapis.com/css?family=Open+Sans:200,300,400,500,600,700" );
    
    
   // Load custom fonts
    if (get_field('heading_font', 'option') != "Open Sans") {
    	wp_enqueue_style( 'heading_font', "$protocol://fonts.googleapis.com/css?family=".get_field('heading_font','option').":200,300,400,500,600,700" );
    }
    
    if (get_field('body_font', 'option') != "Open Sans") {
    	wp_enqueue_style( 'body_font', "$protocol://fonts.googleapis.com/css?family=".get_field('body_font','option').":300,400,700" );
    }
}
	   
add_action( 'wp_enqueue_scripts', 'zt_mytheme_fonts' );

/*-----------------------------------------------------------------------------------*/
/*	Get Category Slug
/*-----------------------------------------------------------------------------------*/

function zt_get_cat_slug($cat_id) {
	$cat_id = (int) $cat_id;
	$category = &get_category($cat_id);
	return $category->slug;
}

/*-----------------------------------------------------------------------------------*/
/*	Add Theme Support
/*-----------------------------------------------------------------------------------*/

add_theme_support( 'post-formats', array('gallery','image','link', 'quote', 'video') );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails');
add_post_type_support( 'portfolio', 'post-formats' );

/*-----------------------------------------------------------------------------------*/
/*	Menu
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'zt_register_my_menus' );
function zt_register_my_menus() {
  register_nav_menus(
    array( 'header-menu' => 'Header Menu' )
  );
}

/*-----------------------------------------------------------------------------------*/
/*	Get Posts
/*-----------------------------------------------------------------------------------*/

function zt_make_href_root_relative($input) {
    return preg_replace('!http(s)?://' . $_SERVER['SERVER_NAME'] . '/!', '/', $input);
}

/*-----------------------------------------------------------------------------------*/
/*	Remove title attributes
/*-----------------------------------------------------------------------------------*/

function zt_wp_list_categories_remove_title_attributes($output) {
    $output = preg_replace('` title="(.+)"`', '', $output);
    return $output;
}
add_filter('wp_list_categories', 'zt_wp_list_categories_remove_title_attributes');


/*-----------------------------------------------------------------------------------*/
/*	Register Widget Areas
/*-----------------------------------------------------------------------------------*/

// Footer
$side_nav = array(
	'name'          => 'Footer',
	'description'	=> 'Place widgets in here to display them in the footer area. We recommend a maximum of 4 widgets.',
	'before_widget' => '<div class="footer-widget"><div class="span3"><ul><li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li></ul></div></div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' );
	
register_sidebar($side_nav);

// Sidebar
$side_post = array(
	'name'          => 'Page',
	'description'	=> 'This is the standard sidebar widget area. Place widgets on here to display them on the sidebar of pages. Please activate the sidebar through the page editor for the pages you want it be displayed on.',
	'before_widget' => '<div class="sidebar-widget"><div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div></div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>' );
	
	
register_sidebar($side_post);

/*-----------------------------------------------------------------------------------*/
/*	Unlimited Sidebars
/*-----------------------------------------------------------------------------------*/
 
function sidebar_widgets_init() { //Register the default sidebar
	
	if (get_field('sidebars','option')){
		while (has_sub_field('sidebars','option')){ //Loop through sidebar fields to generate custom sidebars
			$s_name = get_sub_field('sidebar_name','option');
			$s_id = str_replace(" ", "-", $s_name); // Replaces spaces in Sidebar Name to dash
			$s_id = strtolower($s_id); // Transforms edited Sidebar Name to lowercase
			register_sidebar( array(
				'name' => $s_name,
				'id' => $s_id,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h2 class="widgettitle">',
				'after_title' => '</h2>',
			) );
		};
	};
	
};
 
add_action( 'widgets_init', 'sidebar_widgets_init' );

/*-----------------------------------------------------------------------------------*/
/*	Add sidebar option to ACF
/*-----------------------------------------------------------------------------------*/
 
function my_acf_load_sidebar( $field )
{
 // reset choices
 $field['choices'] = array();
 $field['choices']['Page'] = 'Page';
 // load repeater from the options page
 if(get_field('sidebars', 'option'))
 {
 // loop through the repeater and use the sub fields "value" and "label"
 while(has_sub_field('sidebars', 'option'))
 {
 
 $label = get_sub_field('sidebar_name');
 $value = str_replace(" ", "-", $label);
 $value = strtolower($value);
 
$field['choices'][ $value ] = $label;
 
}
 }
 
 // Important: return the field
 return $field;
}
 
add_filter('acf/load_field/name=select_a_sidebar', 'my_acf_load_sidebar');

/*-----------------------------------------------------------------------------------*/
/*	Custom Search Output
/*-----------------------------------------------------------------------------------*/

function zt_html5_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <input type="text" placeholder="'.__("Search").'" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="Search" />
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'zt_html5_search_form' );

/*-----------------------------------------------------------------------------------*/
/*	Add Read More to excerpt
/*-----------------------------------------------------------------------------------*/

function zt_new_excerpt_more($more) {
	global $post;
	return '<br><br><a class="read-more" href="'. get_permalink($post->ID) . '">Read more</a>';
}
add_filter('excerpt_more', 'zt_new_excerpt_more');

/*-----------------------------------------------------------------------------------*/
/*	Custom Comment Styling
/*-----------------------------------------------------------------------------------*/

function zt_mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	} ?>
		
	<?php if ( 'div' != $args['style'] ) : ?>
	<li id="div-comment-<?php comment_ID(); ?>">
	<?php endif; ?>
		<div class="entry margin-bottom">
			<div class="avatar">
				<?php echo get_avatar( '', 50, '', '' ); ?> 
			</div>
			<div class="comment-meta">
				<h4><?php comment_author_link(); ?></h4>
				<p><?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' ago'; ?> <?php edit_comment_link('(Edit)','  ','' ); ?></p>
			</div>	
			<div class="comment-body">
		  		<?php if ($comment->comment_approved == '0') : ?>
		  			<p>Your comment is awaiting approval</p>
		  		<?php endif; ?>
		  		<?php comment_text(); ?>
		  		<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		  	</div>
	
		</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</li>
	<?php endif; ?>
<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Remove thumbnail dimensions
/*-----------------------------------------------------------------------------------*/

add_filter( 'post_thumbnail_html', 'zt_remove_thumbnail_dimensions', 10, 3 );

function zt_remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

/*-----------------------------------------------------------------------------------*/
/*	Get category slug
/*-----------------------------------------------------------------------------------*/

function zt_get_category_slug() {
	foreach(get_the_category() as $category) {
		echo $category->slug . ' ';
	} 
}

/*-----------------------------------------------------------------------------------*/
/*	Custom wp_link_pages
/*-----------------------------------------------------------------------------------*/

function zt_custom_wp_link_pages( $args = '' ) {
	$defaults = array(
		'before' => '<p id="post-pagination"> Pages: ', 
		'after' => '</p>',
		'text_before' => '',
		'text_after' => '',
		'next_or_number' => 'number', 
		'nextpagelink' => 'Next page',
		'previouspagelink' => 'Previous page',
		'pagelink' => '%',
		'echo' => 1
	);

	$r = wp_parse_args( $args, $defaults );
	$r = apply_filters( 'wp_link_pages_args', $r );
	extract( $r, EXTR_SKIP );

	global $page, $numpages, $multipage, $more, $pagenow;

	$output = '';
	if ( $multipage ) {
		if ( 'number' == $next_or_number ) {
			$output .= $before;
			for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
				$j = str_replace( '%', $i, $pagelink );
				$output .= ' ';
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= _wp_link_page( $i );
				else
					$output .= '<span class="current-post-page">';

				$output .= $text_before . $j . $text_after;
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= '</a>';
				else
					$output .= '</span>';
			}
			$output .= $after;
		} else {
			if ( $more ) {
				$output .= $before;
				$i = $page - 1;
				if ( $i && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $text_before . $previouspagelink . $text_after . '</a>';
				}
				$i = $page + 1;
				if ( $i <= $numpages && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $text_before . $nextpagelink . $text_after . '</a>';
				}
				$output .= $after;
			}
		}
	}

	if ( $echo )
		echo $output;

	return $output;
}

/*-----------------------------------------------------------------------------------*/
/*	Enable/Disable Lightbox
/*-----------------------------------------------------------------------------------*/

function zt_fancybox() {
		echo "fancybox";
}

function zt_fancybox_url($url) {
	echo $url;
}

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
		'menu_icon' => get_template_directory_uri() . '/assets/img/admin_icon2.png',
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
/*	Get custom category slug name
/*-----------------------------------------------------------------------------------*/

function zt_get_custom_category_slug($id, $category) {
	$my_terms = get_the_terms( $id, $category );

	if( $my_terms && !is_wp_error( $my_terms ) ) {
		foreach( $my_terms as $term ) {
			echo $term->slug . ' ';
		}
	} 
}

/*-----------------------------------------------------------------------------------*/
/*	Get number of likes
/*-----------------------------------------------------------------------------------*/

function zt_get_like_count($id) {
	if (get_post_meta($id, "votes_count")) {
		echo get_post_meta($id, "votes_count", true);
	} else {
		echo "0";
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Time Ago Function
/*-----------------------------------------------------------------------------------*/

function zt_themeblvd_time_ago() {
 
	global $post;
 
	$date = get_post_time('G', true, $post);
 
	/**
	 * Where you see 'themeblvd' below, you'd
	 * want to replace those with whatever term
	 * you're using in your theme to provide
	 * support for localization.
	 */ 
 
	// Array of time period chunks
	$chunks = array(
		array( 60 * 60 * 24 * 365 , __( '', 'avian' ), __( '', 'avian' ) ),
		array( 60 * 60 * 24 * 30 , __( '', 'avian' ), __( '', 'avian' ) ),
		array( 60 * 60 * 24 * 7, __( '', 'avian' ), __( '', 'avian' ) ),
		array( 60 * 60 * 24 , __( '', 'avian' ), __( '', 'avian' ) ),
		array( 60 * 60 , __( '', 'avian' ), __( '', 'avian' ) ),
		array( 60 , __( '', 'avian' ), __( '', 'avian' ) ),
		array( 1, __( '', 'avian' ), __( '', 'avian' ) )
	);
 
	if ( !is_numeric( $date ) ) {
		$time_chunks = explode( ':', str_replace( ' ', ':', $date ) );
		$date_chunks = explode( '-', str_replace( ' ', '-', $date ) );
		$date = gmmktime( (int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0] );
	}
 
	$current_time = current_time( 'mysql', $gmt = 0 );
	$newer_date = strtotime( $current_time );
 
	// Difference in seconds
	$since = $newer_date - $date;
 
	// Something went wrong with date calculation and we ended up with a negative date.
	if ( 0 > $since )
		return __( 'sometime', 'avian' );
 
	/**
	 * We only want to output one chunks of time here, eg:
	 * x years
	 * xx months
	 * so there's only one bit of calculation below:
	 */
 
	//Step one: the first chunk
	for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
		$seconds = $chunks[$i][0];
 
		// Finding the biggest chunk (if the chunk fits, break)
		if ( ( $count = floor($since / $seconds) ) != 0 )
			break;
	}
 
	// Set output var
	$output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
 
 
	if ( !(int)trim($output) ){
		$output = '0 ' . __( 'seconds', 'avian' );
	}
 
	return $output;
}

function zt_themeblvd_time_ago2() {
 
	global $post;
 
	$date = get_post_time('G', true, $post);
 
 
	// Array of time period chunks
	$chunks = array(
		array( 60 * 60 * 24 * 365 , __( 'year', 'avian' ), __( 'years', 'avian' ) ),
		array( 60 * 60 * 24 * 30 , __( 'month', 'avian' ), __( 'months', 'avian' ) ),
		array( 60 * 60 * 24 * 7, __( 'week', 'avian' ), __( 'weeks', 'avian' ) ),
		array( 60 * 60 * 24 , __( 'day', 'avian' ), __( 'days', 'avian' ) ),
		array( 60 * 60 , __( 'hour', 'avian' ), __( 'hours', 'avian' ) ),
		array( 60 , __( 'minute', 'avian' ), __( 'minutes', 'avian' ) ),
		array( 1, __( 'second', 'avian' ), __( 'seconds', 'avian' ) )
	);
 
	if ( !is_numeric( $date ) ) {
		$time_chunks = explode( ':', str_replace( ' ', ':', $date ) );
		$date_chunks = explode( '-', str_replace( ' ', '-', $date ) );
		$date = gmmktime( (int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0] );
	}
 
	$current_time = current_time( 'mysql', $gmt = 0 );
	$newer_date = strtotime( $current_time );
 
	// Difference in seconds
	$since = $newer_date - $date;
 
	// Something went wrong with date calculation and we ended up with a negative date.
	if ( 0 > $since )
		return __( 'sometime', 'avian' );
 
	/**
	 * We only want to output one chunks of time here, eg:
	 * x years
	 * xx months
	 * so there's only one bit of calculation below:
	 */
 
	//Step one: the first chunk
	for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
		$seconds = $chunks[$i][0];
 
		// Finding the biggest chunk (if the chunk fits, break)
		if ( ( $count = floor($since / $seconds) ) != 0 )
			break;
	}
 
	// Set output var
	$output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
 
 
	if ( !(int)trim($output) ){
		$output = '0 ' . __( 'seconds', 'avian' );
	}
 
	$output .= __(' ago', 'avian');
 
	return $output;
}

/*-----------------------------------------------------------------------------------*/
/*	Breadcrumbs
/*-----------------------------------------------------------------------------------*/

function zt_the_breadcrumb() { ?>
<div class="page-callout">
	<div class="container">
		<div class="row">
			<div class="span6">
				<?php zt_the_breadcrumb_data(); ?>
			</div>
			
			<div class="span6">
				<div class="page-name">
					<?php the_title(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
}

function zt_the_breadcrumb_data() {
	echo '<div class="breadcrumbs">'. __('You are here', 'avian') .':<ul>';
    if (!is_home()) {
        echo '<li><a href="';
        echo home_url();
        echo '">';
        echo '<i class="fa fa-home"></i> ' . __('Home', 'avian');
        echo "</a></li>";
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li> ');
            echo '</li>';
                        

            if (is_category()) {
            	 echo '</div>';
            }
            if (is_single()) {
                echo "</li><li>";
                the_title();
                echo '</li>';
                echo '</div>';
            }
        } elseif (is_page()) {
        	global $post;   	
        	$parent_title = get_the_title($post->post_parent);     	
        	if ($post->post_parent) {
        		echo '<a href="'.get_permalink($post->post_parent).'">'.$parent_title.'</a>';
        	}
            echo '<li>';
            echo the_title();
            echo '</li>';
            echo '</div>';
        } else {
	         echo '</div>';
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    elseif (is_home()) { echo '</div>'; }
    echo '</ul>';
    
}

function menu_set_dropdown( $sorted_menu_items, $args ) {
    $last_top = 0;
    foreach ( $sorted_menu_items as $key => $obj ) {
        // it is a top lv item?
        if ( 0 == $obj->menu_item_parent ) {
            // set the key of the parent
            $last_top = $key;
        } else {
            $sorted_menu_items[$last_top]->classes['dropdown'] = 'dropdown';
        }
    }
    return $sorted_menu_items;
}
add_filter( 'wp_nav_menu_objects', 'menu_set_dropdown', 10, 2 );

/*-----------------------------------------------------------------------------------*/
/*	Custom Visual Composer Animator
/*-----------------------------------------------------------------------------------*/

function zt_getCSSAnimation($css_animation) {
    $output = '';
    if ( $css_animation != '' ) {
        wp_enqueue_script( 'waypoints' );
        $output = ' wpb_animate_when_almost_visible wpb_'.$css_animation;
    }
    return $output;
}

function zt_getExtraClass($el_class) {
        $output = '';
        if ( $el_class != '' ) {
            $output = " " . str_replace(".", "", $el_class);
        }
        return $output;
    }

/*-----------------------------------------------------------------------------------*/
/*	Colour Brightness
/*-----------------------------------------------------------------------------------*/

function zt_colourBrightness($hex, $percent) {
	// Work out if hash given
	$hash = '';
	if (stristr($hex,'#')) {
		$hex = str_replace('#','',$hex);
		$hash = '#';
	}
	/// HEX TO RGB
	$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
	//// CALCULATE
	for ($i=0; $i<3; $i++) {
		// See if brighter or darker
		if ($percent > 0) {
			// Lighter
			$rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
		} else {
			// Darker
			$positivePercent = $percent - ($percent*2);
			$rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
		}
		// In case rounding up causes us to go to 256
		if ($rgb[$i] > 255) {
			$rgb[$i] = 255;
		}
	}
	//// RBG to Hex
	$hex = '';
	for($i=0; $i < 3; $i++) {
		// Convert the decimal digit to hex
		$hexDigit = dechex($rgb[$i]);
		// Add a leading zero if necessary
		if(strlen($hexDigit) == 1) {
		$hexDigit = "0" . $hexDigit;
		}
		// Append to the hex string
		$hex .= $hexDigit;
	}
	return $hash.$hex;
}

add_filter( 'the_category', 'add_nofollow_cat' );
function add_nofollow_cat( $text ) {
$text = str_replace('rel="category tag"', "", $text); return $text;
}

/*-----------------------------------------------------------------------------------*/
/*	Category Filter Custom Walker
/*-----------------------------------------------------------------------------------*/

class zt_MyWalker extends Walker_Category {
 
	function start_el(&$output, $category, $depth = 0, $args = "", $current_object_id = 0) {
		extract($args);
 
		$cat_name = esc_attr( $category->name );
		$cat_name = apply_filters( 'list_cats', $cat_name, $category );
		
		$link = '<a href="#filter=.' . $category->slug . '">' . $cat_name . '</a>'; 
		
		if ( 'list' == $args['style'] ) {
			if ( !empty($current_category) ) {
				$_current_category = get_term( $current_category, $category->taxonomy );
				if ( $category->term_id == $current_category )
					$class .=  ' current-cat';
				elseif ( $category->term_id == $_current_category->parent )
					$class .=  ' current-cat-parent';
			}
			
			$output .= "<li class=" . $class;
			$output .=  '>'.$link;
			$output .=  '';
		} else {
			$output .= $link;
		}
	}
}

/*-----------------------------------------------------------------------------------*/
/*	Visual Composer
/*-----------------------------------------------------------------------------------*/

if (!class_exists('WPBakeryVisualComposerAbstract')) {
  $dir = dirname(__FILE__) . '/framework/wpbakery/';
  $composer_settings = Array(
      'APP_ROOT'      => $dir . '/js_composer',
      'WP_ROOT'       => dirname( dirname( dirname( dirname($dir ) ) ) ). '/',
      'APP_DIR'       => basename( $dir ) . '/js_composer/',
      'CONFIG'        => $dir . '/js_composer/config/',
      'ASSETS_DIR'    => '../../framework/wpbakery/js_composer/assets/',
      'COMPOSER'      => $dir . '/js_composer/composer/',
      'COMPOSER_LIB'  => $dir . '/js_composer/composer/lib/',
      'SHORTCODES_LIB'  => $dir . '/js_composer/composer/lib/shortcodes/',
      'USER_DIR_NAME'  => 'vc_templates', /* Path relative to your current theme, where VC should look for new shortcode templates */
 
      //for which content types Visual Composer should be enabled by default
      'default_post_types' => Array('page')
  );
  require_once locate_template('/framework/wpbakery/js_composer/js_composer.php');
  $wpVC_setup->init($composer_settings);
  
}

include("framework/functions/vc-extend.php");


/*-----------------------------------------------------------------------------------*/
/*	Post Views
/*-----------------------------------------------------------------------------------*/

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Views";
    }
    return '<i class="fa fa-eye"></i> '.$count;
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

/*-----------------------------------------------------------------------------------*/
/*	Change Excerpt Amount
/*-----------------------------------------------------------------------------------*/

function custom_excerpt_length( $length ) {
	
	if (get_field('excerpt_length', "option")) {
		return get_field('excerpt_length', "option");
	} else {
		return 150;
	}
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*-----------------------------------------------------------------------------------*/
/*	Documentation
/*-----------------------------------------------------------------------------------*/


add_action( 'admin_menu', 'zt_documentation_menu' );

function zt_documentation_menu() {
	add_dashboard_page( 'Documentation', 'Avian Documentation', 'manage_options', 'my-unique-identifier', 'my_plugin_options' );
}

function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	get_template_part('docs/'.'docs');
}

/*-----------------------------------------------------------------------------------*/
/*	Redirect after activation
/*-----------------------------------------------------------------------------------*/

if (is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
	header( 'Location: '.admin_url().'themes.php?page=acf-options');
}

/*-----------------------------------------------------------------------------------*/
/*	Redirect after activation
/*-----------------------------------------------------------------------------------*/

function post_icons() { ?>


<?php if ( 'portfolio' == get_post_type() ) { ?>
	
	<?php if (get_field('disable_time', 'option')) { ?> 
		<style>
			.single-portfolio .post-icons {
				margin-right: 30px;
				padding-right: 22px;
			}
		</style>
	<?php } ?>
	
	<span class="time-ago" <?php if (get_field('disable_time', 'option')) { ?> style="border-right: 0px; padding-right: 0px;"	<?php } ?>>
	<?php if (!get_field('disable_time', 'option')) { ?>
		<?php echo zt_themeblvd_time_ago2(); ?>
	<?php } ?>
	</span>

	<?php if (!get_field('disable_like_heart', 'option')) { ?>
		<?php echo getPostLikeLink(get_the_ID());?>
	<?php } ?>
	
	<?php if (comments_open()) { ?>
	<a href="<?php the_permalink(); ?>" class="post-comment">
		<i class="fa fa-comment"></i> 
		<?php comments_number('0','1','%'); ?>
	</a>
	<?php } ?>
	
	<?php if (!get_field('disable_views', 'option')) { ?>
	<a class="post-view">
		<?php echo getPostViews(get_the_ID()); ?>
	</a>
	<?php } ?>
<?php } ?>

<?php if ( 'post' == get_post_type() ) { ?>
	
	<?php if (!get_field('disable_blog_time', 'option')) { ?>
	<span class="time-ago">
		<?php echo zt_themeblvd_time_ago2(); ?>
	</span> 
	<?php } ?>

	<?php if (!get_field('disable_blog_like_heart', 'option')) { ?>
		<?php echo getPostLikeLink(get_the_ID());?> 
	<?php } ?>
	
	<?php if (comments_open()) { ?>
	<a href="<?php the_permalink(); ?>" class="post-comment">
		<i class="fa fa-comment"></i> 
		<?php comments_number('0','1','%'); ?>
	</a>
	<?php } ?>
	
	<?php if (!get_field('disable_blog_views', 'option')) { ?>
		<a class="post-view">
		<?php echo getPostViews(get_the_ID()); ?>
		</a>
	<?php } ?>
<?php } ?>



<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Mini Cart
/*-----------------------------------------------------------------------------------*/

include("framework/functions/mini-cart.php");
// Ensure cart contents update when products are added to the cart via AJAX (place the following in functions.php)
add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
 
function woocommerce_header_add_to_cart_fragment( $fragments ) {
global $woocommerce;
ob_start();
?>

	<li class="dropdown mini-cart">
	<?php if ( sizeof( $woocommerce->cart->cart_contents ) > 0 ) { ?>
	<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><i class="fa fa-shopping-cart"></i> <?php echo $woocommerce->cart->get_cart_total(); ?></a>
	
	<?php zt_mini_cart(); ?>
	
	<?php } ?>
	</li>
<?php

$fragments['li.mini-cart'] = ob_get_clean();
return $fragments;
}

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   return implode(",", $rgb); // returns the rgb values separated by commas
   //return $rgb; // returns an array with the rgb values
}

/*-----------------------------------------------------------------------------------*/
/*	Load Shortcodes, Plugins, Widgets
/*-----------------------------------------------------------------------------------*/


// Add the Theme Shortcodes
include("framework/functions/shortcodes.php");

// Add the custom jQuery
include("framework/functions/jquery.php");

// Add the custom jQuery
include("framework/functions/custom-css.php");

// Add custom like script
include("framework/functions/like.php");

// Plugin Activation Class
include("framework/tgm/plugin-activate.php");

// WordPress Demo Importer
include("framework/importer/importer.php");

// Add the widgets
include("framework/widgets/widgets.php");

// Add custom fields and options
include("framework/advanced-custom-fields/acf.php");
include("framework/advanced-custom-fields/acf-fields.php");

// Visual Composer Custom
include("framework/functions/vc-maps.php");

// Other Includes
include("framework/functions/custom-nav-walker.php");
include("framework/functions/header-layout.php");
include("framework/functions/header-style.php");

?>