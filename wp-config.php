<?php
# Database Configuration
define( 'DB_NAME', 'wp_hodgesmace' );
define( 'DB_USER', 'hodgesmace' );
define( 'DB_PASSWORD', 'N2bIWshYWE43nofFWdGw' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_cg85ydbili_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         '#T>Jyg0YM52xU6Ydi<V02~y4$W~:TZQQqB@3Etj@PXcu;bHq KCnNY9Wd@=,jccS');
define('SECURE_AUTH_KEY',  'r{pNHa,bMKS@i/vS+N]=Il}F*?n9dlnZ*PX+>V|[70r%Yvgs/G/|I,tOWrr$}|j<');
define('LOGGED_IN_KEY',    't| vPTA-$ul0OZ7KKn1SQ/X?8uS`SwP%}i#^R<kbm@pX8|DGu[$0J`+ ;>6r=e;X');
define('NONCE_KEY',        'C+_I@8~$gk#!$JISD[.?j<|etp#TzZC Z7P(8a8H~@>I+ME@c<ikZy-*plP fd`x');
define('AUTH_SALT',        '3N//b8DR}O(qzi(tH(_D?=o+BO/A:e0?aX(Mc`?ZD~~n4_l]#1&{,hW-rx -|n6L');
define('SECURE_AUTH_SALT', '=/?pWl2+ y5Q3qSvK6(as^_)wl#.tBQ<v&Zsy}IOo:[@|x]f;{E4{$bL&j^X3[$;');
define('LOGGED_IN_SALT',   '(1TvNQ&C$61~H].qdjL:!|dZ%6XL:K-~8.-uQ|Y][-A(b|WBSY``(i+;RW[uW7Po');
define('NONCE_SALT',       'KI9H{,(H!@7|iXtl15mBy.}5(GM(t-Hm?Q[L`hR=t>ih%bco>232?8P&koyb9tz:');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'hodgesmace' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', 'bcd62ead42a335c436c8d7447e96ca1c15bfb7cd' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '40234' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_SFTP_PORT', 2222 );

define( 'WPE_LBMASTER_IP', '45.33.46.17' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'hodgesmace.wpengine.com', );

$wpe_varnish_servers=array ( 0 => 'pod-40234', );

$wpe_special_ips=array ( 0 => '45.33.46.17', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( 'default' =>  array ( 0 => 'unix:///tmp/memcached.sock', ), );
define('WPLANG','');

# WP Engine ID


# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
