<?php
/**
 * @package    twitterfeed
 * @date       Wed Mar 30 2016 00:22:53
 * @version    2.1.4
 * @author     Askupa Software <contact@askupasoftware.com>
 * @link       http://products.askupasoftware.com/twitter-feed/
 * @copyright  2015 Askupa Software
 */

namespace TwitterFeed;

use Amarkal\Loaders;
use Amarkal\Extensions\WordPress\Plugin;
use Amarkal\Extensions\WordPress\Options;
use Amarkal\Extensions\WordPress\Editor;

class TwitterFeed extends Plugin\AbstractPlugin 
{
    private static $options;
    
    public function __construct() 
    {
        parent::__construct( dirname( __DIR__ ).'/bootstrap.php' );

        $this->generate_defines();
     
        $this->load_classes();
        
        // Register an options page
        self::$options = new Options\OptionsPage( include('configs/options/config.php') );
        self::$options->register();
        
        // Register widgets
        self::register_widgets();
        
        // Add a popup button to the rich editor
        Editor\Editor::add_button( include('configs/editor/config.php') );
        
        // Register shortcodes
        Shortcode::register();
        
        $this->register_assets();
        
        self::check_environment();
    }
    
    public function generate_defines()
    {
        $basepath = dirname( __FILE__ );
        define( __NAMESPACE__.'\LIBRARIES_DIR', dirname( $basepath ).'/vendor/' );
        define( __NAMESPACE__.'\PLUGIN_DIR', $basepath );
        define( __NAMESPACE__.'\PLUGIN_URL', plugin_dir_url( $basepath ).'/' );
        define( __NAMESPACE__.'\JS_URL', plugin_dir_url( $basepath ).'assets/js' );
        define( __NAMESPACE__.'\CSS_URL', plugin_dir_url( $basepath ).'assets/css' );
        define( __NAMESPACE__.'\IMG_URL', plugin_dir_url( $basepath ).'assets/img' );
        define( __NAMESPACE__.'\PLUGIN_VERSION', '2.1.4' );
    }
    
    public function load_classes()
    {
        $loader = new Loaders\ClassLoader();
        $loader->register_namespace( __NAMESPACE__, PLUGIN_DIR );
        
        // Special autoloader filter for \Tweet\UI
        $loader->register_autoload_filter( __NAMESPACE__, function( $class, $namespace, $dir )
        {
            if( strpos( $class, __NAMESPACE__."\Tweets\UI" ) === 0 )
            {
                $class .= '/controller';
                return $dir.str_replace(
                    array('\\',$namespace,$class), 
                    array(DIRECTORY_SEPARATOR,'',''), 
                    $class
                ).'.php';
            }
        });
        $loader->register();
        
        // Include core functions
        require_once PLUGIN_DIR.'/functions.php';
        
        // Include TwitterAPIExchange
        require_once LIBRARIES_DIR.'j7mbo/twitter-api-php/TwitterAPIExchange.php';
    }
    
    public function register_assets()
    {
        $al = new Loaders\AssetLoader();
        $al->register_assets(array(
                new \Amarkal\Assets\Script(array(
                    'handle'        => 'twitterfeed-script',
                    'url'           => JS_URL.'/twitter-feed.min.js',
                    'facing'        => array( 'public' ),
                    'version'       => PLUGIN_VERSION,
                    'dependencies'  => array('jquery'),
                    'footer'        => true
                )),
                new \Amarkal\Assets\Stylesheet(array(
                    'handle'        => 'twitterfeed-style',
                    'url'           => CSS_URL.'/twitter-feed.min.css',
                    'facing'        => array( 'public' ),
                    'version'       => PLUGIN_VERSION
                )),
                new \Amarkal\Assets\Stylesheet(array(
                    'handle'        => 'font-awesome',
                    'url'           => '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css',
                    'facing'        => array( 'public' ),
                    'version'       => '4.5.0'
                ))
            )
        );
        $al->enqueue();
        
        // Custom CSS
        add_action( 'wp_head', array( __CLASS__, 'custom_css' ) );
    }
    
    static function register_widgets()
    {
        $static_tweets = new Widgets\StaticTweets();
        $static_tweets->register();
    }
    
    static function custom_css()
    {
        if( 'ON' == self::$options->get('css_toggle') )
        {
            $css = self::$options->get('css');
            echo "<style>$css</style>";
        }
    }
    
    static function check_environment()
    {
        // Check if cURL is installed
        if( !_is_curl_installed() )
        {
            \Amarkal\Extensions\WordPress\Admin\Notifier::error("<strong>Twitter Feed</strong> requires the <strong>cURL</strong> extension, which is not installed.");
        }
        
        // Check if tokens were provided
        global $twitterfeed_options;
        if( !$twitterfeed_options['oauth_access_token'] || 
            !$twitterfeed_options['oauth_access_token_secret'] ||
            !$twitterfeed_options['consumer_key'] ||
            !$twitterfeed_options['consumer_secret'])
        {
            \Amarkal\Extensions\WordPress\Admin\Notifier::error("<strong>Twitter Feed</strong> cannot retrieve tweets until you provide your Twitter API Tokens. <a href=\"".admin_url( 'admin.php?page=twitter_feed&section=tokens' )."\">Click here</a> to provide your tokens.");
        }
    }
}
new TwitterFeed();