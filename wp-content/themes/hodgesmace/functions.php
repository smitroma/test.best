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
            'header_nav' => __('Main Menu', 'hodgesmace'),
            'footer_nav' => __('Footer Menu', 'hodgesmace'),
            'top_nav' => __('Login Menu', 'hodgesmace'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'caption'
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
 */

function hodgesmace_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'hodgesmace_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 */

function hodgesmace_scripts() {

    wp_enqueue_script('jquery');
    wp_enqueue_style('js_composer_front'); // VC CSS
    wp_enqueue_style('OpenSans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,700');
    wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.min.css');
    wp_enqueue_style('typography', get_template_directory_uri() . '/css/typography.css');
    wp_enqueue_style('grid', get_template_directory_uri() . '/css/grid.css');
    wp_enqueue_style('utility', get_template_directory_uri() . '/css/utility.css');
    wp_enqueue_style('hodgesmace-style', get_stylesheet_uri());
    wp_enqueue_script('hodgesmace-script', get_template_directory_uri() . '/js/functions.js#async', array('jquery'), '20150330', true);
    wp_enqueue_script('tweenmax', '//cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js', array(), '1.19.0', false);
    wp_enqueue_script('morphsvg', get_template_directory_uri() . '/js/gsap/plugins/MorphSVGPlugin.min.js', array('tweenmax'), '0.8.6', true);
    wp_enqueue_script('roi-calc', get_template_directory_uri() . '/js/roi-calc.js', array('jquery'));
}

add_action( 'wp_enqueue_scripts', 'hodgesmace_scripts' );

/**
 *  Custom Header
 */

$custom_header_args = array(
  'width' => 445,
	'flex-width' => true,
	'flex-height' => true,
	'default-image' => get_template_directory_uri() . '/images/logo.png',
);

add_theme_support( 'custom-header', $custom_header_args );

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

/**
 * Click to Tweet Shortcode
 */

function tweet_func( $atts, $content = null ) {
	$atts = shortcode_atts( array(
	), $atts);

  global $post;
  $url = 'http://hodgesmace.com/?p='.$post->ID;

  $content_text = str_replace(' ', '+', strip_tags($content));

  ob_start();
  ?>

	<div class="click-to-tweet">
    <div class="ctt-text">
      <p>
        <a href="https://twitter.com/share?text=<?= $content_text ?>&amp;via=HodgesMace&amp;related=HodgesMace&amp;url=<?= $url ?>" target="_blank">
          <?= strip_tags($content) ?>
        </a>
      </p>
    </div>
    <p class="ctt-link">
      <a href="https://twitter.com/share?text=<?= $content_text ?>&amp;via=HodgesMace&amp;related=HodgesMace&amp;url=<?= $url ?>" target="_blank" class="ctt-btn">
        <i class="fa fa-twitter c-twitter-blue"></i> TWEET
      </a>
    </p>
  </div>

  <?php
  return ob_get_clean();
}

add_shortcode( 'tweet', 'tweet_func' );

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
/*	Custom Post Type : Resources
/*-----------------------------------------------------------------------------------*/

add_action('init', 'resource_register');

function resource_register() {
  $labels = array(
    'name' => 'Resources', 'post type general name',
    'singular_name' => 'Resource Item', 'post type singular name',
    'add_new' => 'Add New', 'resource item',
    'add_new_item' => 'Add New Resource Item',
    'edit_item' => 'Edit Resource Item',
    'new_item' => 'New Resource Item',
    'view_item' => 'View Resource Item',
    'search_items' => 'Search Resource',
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
    'supports' => array('editor', 'thumbnail', 'title', ''),
    'show_in_menu' => TRUE,
    'show_in_nav_menus' => TRUE,
    'has_archive' => TRUE,
    'taxonomies' => array('category', 'post_tag'),
  );

	register_post_type( 'resources' , $args );
}

/*	Featured Resource Shortcode */

function resource_link_func( $atts, $content='' ) {
  $atts = shortcode_atts( array(
    'class' => ''
  ), $atts, 'resource_link' );

  $featured_query = new WP_Query(array('post_type'=> 'resources', 'cat'=> 41));

  if($featured_query->have_posts()){
    while($featured_query->have_posts()){
      $featured_query->the_post();
      $url = get_the_permalink();
    }
  } else {
    $url = '#';
  }

	return '<a href="'.$url.'" class="'.$atts['class'].'">'.$content.'</a>';
}

add_shortcode( 'resource_link', 'resource_link_func' );

/*	Featured Resource Title Shortcode */

function resource_title_func( $atts, $content='' ) {

  $featured_query = new WP_Query(array('post_type'=> 'resources', 'cat'=> 41));

  if($featured_query->have_posts()){
    while($featured_query->have_posts()){
      $featured_query->the_post();
      $title = get_the_title();
    }
  } else {
    $title = '';
  }

	return $title;
}

add_shortcode( 'featured_resource_title', 'resource_title_func' );

/*	Banner Ad Shortcodes */
function doingjobblue( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'btn-txt' => 'download',
		), $atts
	);
	$ad_divs = '<div id="hm_bg_jobblue"><div class="place"><a class="hm_shortcode_btn" href="/resources/benefits-management-brochure">'.$atts['btn-txt'].'<span class="brochuretxt">&nbsp;&nbsp;brochure</span></a></div></div>';
	return $ad_divs;
}
function doingjobgreen( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'btn-txt' => 'download',
		), $atts
	);
	$ad_divs = '<div id="hm_bg_jobgreen"><div class="place"><a class="hm_shortcode_btn" href="/resources/benefits-management-brochure">'.$atts['btn-txt'].'<span class="brochuretxt">&nbsp;&nbsp;brochure</span></a></div></div>';
	return $ad_divs;
}
function helloblue( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'btn-txt' => 'learn more',
		), $atts
	);
	$ad_divs = '<div id="hm_bg_helloblue"><div class="place"><a class="hm_shortcode_hellobtn" href="/smartben-platform">'.$atts['btn-txt'].'</a></div></div>';
	return $ad_divs;
}
function hellogreen( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'btn-txt' => 'learn more',
		), $atts
	);
	$ad_divs = '<div id="hm_bg_hellogreen"><div class="place"><a class="hm_shortcode_hellobtn" href="/smartben-platform">'.$atts['btn-txt'].'</a></div></div>';
	return $ad_divs;
}
add_shortcode('brochure-blue', 'doingjobblue');
add_shortcode('brochure-green', 'doingjobgreen');
add_shortcode('sb-blue', 'helloblue');
add_shortcode('sb-green', 'hellogreen');




/*-----------------------------------------------------------------------------------*/
/*	EXCERPT LENGTH / CONTENT
/*-----------------------------------------------------------------------------------*/

  if ( ! function_exists( 'wpse_custom_wp_trim_excerpt' ) ) {
    function wpse_custom_wp_trim_excerpt($wpse_excerpt) {
      $raw_excerpt = $wpse_excerpt;
      if ( '' == $wpse_excerpt && get_post_type(get_the_ID()) == 'testimonials') {
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


/*-----------------------------------------------------------------------------------*/
/*	DESCRIPTIONS ON HEADER MENU
/*-----------------------------------------------------------------------------------*/


function header_menu_desc( $item_output, $item, $depth, $args ) {
	if( 'Main Menu' == $args->menu && $depth && $item->description )
		$item_output = str_replace( '</a>', '<span class="description">' . $item->description . '</span></a>', $item_output );

	return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'header_menu_desc', 10, 4 );


/*-----------------------------------------------------------------------------------*/
/*	actOn Code copied from integration docs
/*-----------------------------------------------------------------------------------*/

 class ActonWordPressConnection
 {
   protected $_postItems = array();

   protected function getPostItems()
   {
     return $this->_postItems;
   }

   /**
    * for setting your form's POST items (key is your form input's name, value is the input value).
    *
    * @param string $key first part of key=value for form field submission (name in name=John)
    * @param string $value latter part of key=value for form field submission (John in name=John)
    */
   public function setPostItems($key, $value)
   {
       $this->_postItems[$key] = (string) $value;
   }

   protected function getDomain($address)
   {
       $pieces = parse_url($address);
       $domain = isset($pieces['host']) ? $pieces['host'] : '';
       if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
         return $regs['domain'];
       }
       return false;
   }

   // get IP of website visitor to send to Act-On for location info
   protected function getUserIP()
   {
       // check proxy
     if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
       $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
     } else {
       $ip = $_SERVER['REMOTE_ADDR'];
     }
     return $ip;
   }

   /**
   * process form data for submission to your Act-On external form URL.
   *
   * @param string $extPostUrl your external post (Proxy URL) for your Act-On "proxy" form
   */
   public function processConnection($extPostUrl)
   {
     // get the account ID from $extPostURL
     $acctIdWithPath = preg_replace('/^(.*?)eform\//', '', $extPostUrl); // remove extPostUrl string parts up to 'eform/'
     $acctId = explode('/', (string) $acctIdWithPath, 2); // remove parts after the first /, which leaves the acct ID remaining
     $aoCookieName = 'wp'.$acctId[0];
     $aoCookieNameOI = 'ao_optin'.$acctId[0]; // if opt-in cookie is enabled
     if (isset($_COOKIE[$aoCookieName])) {
       $aoCookieToSend = new WP_Http_Cookie();
       $aoCookieToSend->name = $aoCookieName;
       $aoCookieToSend->value = $_COOKIE[$aoCookieName];
       $aoCookiesToSend[] = $aoCookieToSend;
       if (isset($_COOKIE[$aoCookieNameOI])) {
         $aoCookieToSendOI = new WP_Http_Cookie();
         $aoCookieToSendOI->name = $aoCookieNameOI;
         $aoCookieToSendOI->value = $_COOKIE[$aoCookieNameOI];
         $aoCookiesToSend[] = $aoCookieToSendOI;
       }
       $this->setPostItems('_ipaddr', $this->getUserIP()); // Act-On accepts manually defined IPs if using field name '_ipaddr'
       $fields = http_build_query($this->getPostItems()); // encode post items into query-string
       $request = wp_remote_get($extPostUrl.'?'.$fields, array(
         'cookies' => $aoCookiesToSend,
       ));
       $aoResponseCookie = explode(';', (string) $request['headers']['set-cookie']);
       foreach ($aoResponseCookie as $key => &$value) {
         $splitAtEquals = explode('=', (string) $value);
         $newKey = $splitAtEquals[0]; // set array keys to named keys (wpXXXX, Version, Domain, Max-Age, Expires, Path)
         $aoResponseCookie[$newKey] = $value;
         $newValue = preg_replace('/^(.*?)=/', '', $value);
         $value = $newValue;
       }
       setrawcookie($aoCookieName, $aoResponseCookie[$aoCookieName], time() + 86400 * 365, '/', $this->getDomain($extPostUrl));
     }
     else {
       $this->setPostItems('_ipaddr', $this->getUserIP()); // Act-On accepts manually defined IPs if using field name '_ipaddr'
       $fields = http_build_query($this->getPostItems()); // encode post items into query-string
       $request = wp_remote_get($extPostUrl.'?'.$fields, array());
     }
   }
}

/* Custom Progressive Profiling */
// *****
// Not Implemented. Using the iframe method.
// *****
// function custom_progressive_profiling($atts, $content = '') {
//   $extPostUrl = 'http://marketing.hodgesmace.com/acton/eform/17907/0001/d-ext-0001';
//   // get the account ID from $extPostURL
//   $acctIdWithPath = preg_replace('/^(.*?)eform\//', '', $extPostUrl); // remove extPostUrl string parts up to 'eform/'
//   $acctId = explode('/', (string) $acctIdWithPath, 2); // remove parts after the first /, which leaves the acct ID remaining
//   $aoCookieName = 'wp'.$acctId[0];
//
//   if (isset($_COOKIE[$aoCookieName])) {
//     $ch = curl_init();
//
//     curl_setopt_array($ch, array(
//       CURLOPT_RETURNTRANSFER => true,
//       CURLOPT_HTTPHEADER => array("Authorization: Bearer 4bce2069eca9ffd66bac9360589cf7", "Cache-Control: no-cache"),
//       CURLOPT_URL => 'https://restapi.actonsoftware.com/api/1/list/lookup?cookie={<wbr />'.$_COOKIE[$aoCookieName].'}',
//     ));
//
//     $data = curl_exec($ch);
//     curl_close($ch);
//
//     return print_r($data);
//   }
// }

/* Contact Form */

add_action('gform_after_submission_1', 'send_to_acton_1', 10, 2);

function send_to_acton_1($entry,$form) {

  $ao_gf1 = new ActonWordPressConnection;

  $ao_gf1->setPostItems('firstName',$entry['5.3']);
  $ao_gf1->setPostItems('lastName',$entry['5.6']);
  // $ao_gf1->setPostItems('Type',$entry['7']);
  $ao_gf1->setPostItems('email',$entry['2']);
  $ao_gf1->setPostItems('businessPhone',$entry['6']);
  $ao_gf1->setPostItems('message',$entry['4']);
  $ao_gf1->setPostItems('Department',$entry['9']);
  // $ao_gf1->setPostItems('Number of Employees Range',$entry['8']);
  $ao_gf1->setPostItems('Marketing Program','Website - Contact Us');

  $ao_gf1->processConnection('http://marketing.hodgesmace.com/acton/eform/17907/0001/d-ext-0001');
}

/* Request a Demo Form */

add_action('gform_after_submission_2', 'send_to_acton_2', 10, 2);

function send_to_acton_2($entry,$form) {

  $ao_gf1 = new ActonWordPressConnection;

  $interestSolutions = array(
    $entry['8.1'],$entry['8.2'],$entry['8.3'],$entry['8.4'],$entry['8.5'],
    $entry['9.1'],$entry['9.2'],$entry['9.3'],$entry['9.4'],$entry['9.5']
  );

  $ao_gf1->setPostItems('firstName',$entry['11.3']);
  $ao_gf1->setPostItems('lastName',$entry['11.6']);
  $ao_gf1->setPostItems('email',$entry['17']);
  $ao_gf1->setPostItems('message',$entry['4']);
  $ao_gf1->setPostItems('businessPhone',$entry['12']);
  $ao_gf1->setPostItems('productInterest',join(',', array_filter($interestSolutions)));
  $ao_gf1->setPostItems('companyName',$entry['15']);
  $ao_gf1->setPostItems('Number of Employees Range',$entry['8']);
  $ao_gf1->setPostItems('state',$entry['16']);


  $ao_gf1->processConnection('http://marketing.hodgesmace.com/acton/eform/17907/0002/d-ext-0001');
}

/* Request a Demo Form - Client */

add_action('gform_after_submission_5', 'send_to_acton_5', 10, 2);

function send_to_acton_5($entry,$form) {

  $ao_gf1 = new ActonWordPressConnection;

  $interestSolutions = array(
    $entry['8.1'],$entry['8.2'],$entry['8.3'],$entry['8.4'],$entry['8.5'],
    $entry['9.1'],$entry['9.2'],$entry['9.3'],$entry['9.4'],$entry['9.5']
  );

  $ao_gf1->setPostItems('firstName',$entry['11.3']);
  $ao_gf1->setPostItems('lastName',$entry['11.6']);
  $ao_gf1->setPostItems('email',$entry['17']);
  $ao_gf1->setPostItems('message',$entry['4']);
  $ao_gf1->setPostItems('businessPhone',$entry['12']);
  $ao_gf1->setPostItems('productInterest',join(',', array_filter($interestSolutions)));
  $ao_gf1->setPostItems('companyName',$entry['15']);
  $ao_gf1->setPostItems('state',$entry['22']);
  $ao_gf1->setPostItems('Number of Employees Range',$entry['20']);
  $ao_gf1->setPostItems('Industry',$entry['19']);
  $ao_gf1->setPostItems('Type','Client');
  $ao_gf1->setPostItems('Marketing Program','Website - Demo');

  $ao_gf1->processConnection('http://marketing.hodgesmace.com/acton/eform/17907/0002/d-ext-0001');
}

/* Request a Demo Form - Broker */

add_action('gform_after_submission_6', 'send_to_acton_6', 10, 2);

function send_to_acton_6($entry,$form) {

  $ao_gf1 = new ActonWordPressConnection;

  $interestSolutions = array(
    $entry['8.1'],$entry['8.2'],$entry['8.3'],$entry['8.4'],$entry['8.5'],
    $entry['9.1'],$entry['9.2'],$entry['9.3'],$entry['9.4'],$entry['9.5']
  );

  $ao_gf1->setPostItems('firstName',$entry['11.3']);
  $ao_gf1->setPostItems('lastName',$entry['11.6']);
  $ao_gf1->setPostItems('email',$entry['17']);
  $ao_gf1->setPostItems('message',$entry['4']);
  $ao_gf1->setPostItems('businessPhone',$entry['12']);
  $ao_gf1->setPostItems('productInterest',join(',', array_filter($interestSolutions)));
  $ao_gf1->setPostItems('companyName',$entry['15']);
  $ao_gf1->setPostItems('Number of Employees Range',$entry['21']);
  $ao_gf1->setPostItems('state',$entry['20']);
  $ao_gf1->setPostItems('Type','Broker');
  $ao_gf1->setPostItems('Marketing Program','Website - Demo');

  $ao_gf1->processConnection('http://marketing.hodgesmace.com/acton/eform/17907/000f/d-ext-0001');
}

/* Request a Demo Form - Carrier */

add_action('gform_after_submission_8', 'send_to_acton_8', 10, 2);

function send_to_acton_8($entry,$form) {

  $ao_gf1 = new ActonWordPressConnection;

  $interestSolutions = array(
    $entry['8.1'],$entry['8.2'],$entry['8.3'],$entry['8.4'],$entry['8.5'],
    $entry['9.1'],$entry['9.2'],$entry['9.3'],$entry['9.4'],$entry['9.5']
  );

  $ao_gf1->setPostItems('firstName',$entry['11.3']);
  $ao_gf1->setPostItems('lastName',$entry['11.6']);
  $ao_gf1->setPostItems('email',$entry['17']);
  $ao_gf1->setPostItems('message',$entry['4']);
  $ao_gf1->setPostItems('businessPhone',$entry['12']);
  $ao_gf1->setPostItems('productInterest',join(',', array_filter($interestSolutions)));
  $ao_gf1->setPostItems('companyName',$entry['15']);
  $ao_gf1->setPostItems('Number of Employees Range',$entry['21']);
  $ao_gf1->setPostItems('state',$entry['20']);
  $ao_gf1->setPostItems('Type','Carrier');
  $ao_gf1->setPostItems('Marketing Program','Website - Demo');

  $ao_gf1->processConnection('http://marketing.hodgesmace.com/acton/eform/17907/0014/d-ext-0001');
}

/* Resource Request */

add_action('gform_after_submission_3', 'send_to_acton_3', 10, 2);

function send_to_acton_3($entry,$form) {

  $ao_gf1 = new ActonWordPressConnection;

  $ao_gf1->setPostItems('firstName',$entry['1.3']);
  $ao_gf1->setPostItems('lastName',$entry['1.6']);
  $ao_gf1->setPostItems('email',$entry['2']);

  $ao_gf1->processConnection('http://marketing.hodgesmace.com/acton/eform/17907/0007/d-ext-0001');
}

/* Brochure Request */

add_action('gform_after_submission_4', 'send_to_acton_4', 10, 2);

function send_to_acton_4($entry,$form) {

  $ao_gf1 = new ActonWordPressConnection;

  $ao_gf1->setPostItems('First Name',$entry['1.3']);
  $ao_gf1->setPostItems('Last Name',$entry['1.6']);
  $ao_gf1->setPostItems('Email',$entry['2']);
  $ao_gf1->setPostItems('State',$entry['5']);
  $ao_gf1->setPostItems('Business Phone',$entry['4']);
  $ao_gf1->setPostItems('Number of Employees Range',$entry['6']);
  $ao_gf1->setPostItems('Marketing Program', 'Website - Brochure');

  $ao_gf1->processConnection('http://marketing.hodgesmace.com/acton/eform/17907/0010/d-ext-0001');
}

/* Contact - Capterra */

add_action('gform_after_submission_11', 'send_to_acton_11', 10, 2);

function send_to_acton_11($entry,$form) {

  $ao_gf1 = new ActonWordPressConnection;

  $ao_gf1->setPostItems('firstName',$entry['5.3']);
  $ao_gf1->setPostItems('lastName',$entry['5.6']);
  $ao_gf1->setPostItems('email',$entry['2']);
  $ao_gf1->setPostItems('businessPhone',$entry['6']);
  $ao_gf1->setPostItems('company',$entry['7']);
  $ao_gf1->setPostItems('Marketing Program','Website - Capterra Landing Page');

  $ao_gf1->processConnection('https://marketing.hodgesmace.com/acton/eform/17907/0022/d-ext-0001');
}

/* Modifies confirmation anchor */
function adjust_brochure_anchor(){
  return 400;
}

add_filter( 'gform_confirmation_anchor_4', 'adjust_brochure_anchor' );

/* Gravity Forms Business Email Validation */

require_once('inc/gform-email-validation.php');


/**
 * Register widgetized area and update sidebar with default widgets
 */

function magazino_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Footer Sidebar', 'magazino' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
	register_sidebar( array(
		'name' => __( 'Side Sidebar', 'magazino' ),
		'id' => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );

}
add_action( 'widgets_init', 'magazino_widgets_init' );



/*-----------------------------------------------------------------------------------*/
/*	SVG shortcode for smartben-platform page
/*-----------------------------------------------------------------------------------*/
function enrollment_svg( $atts ) {
    ob_start();
    get_template_part( 'enrollment-svg' );
    return ob_get_clean();
}

add_shortcode( 'hm_enrollment_svg' , 'enrollment_svg' );

/*-----------------------------------------------------------------------------------*/
/*	Mobile SVG shortcode for smartben-platform page
/*-----------------------------------------------------------------------------------*/
function sentry_svg( $atts ) {
    ob_start();
    get_template_part( 'mobile-svg-sentry' );
    return ob_get_clean();
}
add_shortcode( 'hm_sentry_svg' , 'sentry_svg' );

function avatar_svg( $atts ) {
    ob_start();
    get_template_part( 'mobile-svg-avatar' );
    return ob_get_clean();
}
add_shortcode( 'hm_avatar_svg' , 'avatar_svg' );

function gatekeeper_svg( $atts ) {
    ob_start();
    get_template_part( 'mobile-svg-gatekeeper' );
    return ob_get_clean();
}
add_shortcode( 'hm_gatekeeper_svg' , 'gatekeeper_svg' );

function pathfinder_svg( $atts ) {
    ob_start();
    get_template_part( 'mobile-svg-pathfinder' );
    return ob_get_clean();
}
add_shortcode( 'hm_pathfinder_svg' , 'pathfinder_svg' );

function educator_svg( $atts ) {
    ob_start();
    get_template_part( 'mobile-svg-educator' );
    return ob_get_clean();
}
add_shortcode( 'hm_educator_svg' , 'educator_svg' );

function now_svg( $atts ) {
    ob_start();
    get_template_part( 'mobile-svg-now' );
    return ob_get_clean();
}
add_shortcode( 'hm_now_svg' , 'now_svg' );

/*
* Define a constant path to our single template folder
*/
define(SINGLE_PATH, TEMPLATEPATH . '/single');

/**
* Filter the single_template with our custom function
*/
add_filter('single_template', 'my_single_template');

/**
* Single template function which will choose our template
*/
function my_single_template($single) {
global $wp_query, $post;

/**
* Checks for single template by category
* Check by category slug and ID
*/
foreach((array)get_the_category() as $cat) :

if(file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php'))
return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';

elseif(file_exists(SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php'))
return SINGLE_PATH . '/single-cat-' . $cat->term_id . '.php';

endforeach;
}

// Defer Parsing of js
// function defer_parsing_of_js ( $url ) {
// if ( FALSE === strpos( $url, '.js' ) ) return $url;
// if ( strpos( $url, 'jquery.js' ) ) return $url;
// return "$url' defer ";
// }
// add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
