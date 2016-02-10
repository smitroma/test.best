<?php
/**
 * Header
 *
 * @package Brain_Bytes
 * @subpackage Hodges Mace
 * @since Hodges Mace  1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<!--[if lte IE 9]>
	   <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
		 <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/ie.css">
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'gtm4wp_the_gtm_tag' ) ) { gtm4wp_the_gtm_tag(); } ?>
  <div class="container-fluid">
		<div id="top-header">
			<div class="container">
				<?php get_search_form( true ); ?>
				<?php wp_nav_menu(array('menu' => 'Login Menu', 'menu_class' => 'top_nav' )); ?>
				<!-- <a href="#">
					<button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern bttn-white-border m-l-md">SmartBen Login</button>
				</a> -->
			</div>
		</div>
    <div id="header">
      <div class="container">
				<div class="logo">
						<a href="<?php echo home_url(); ?> ">
            	<img src="<?php header_image(); ?>" alt="<?php bloginfo('name') ?>"  width="260" height="86" title="Hodges-Mace Logo" />
						</a>
				</div>
				<div class="mobile-menu-toggle"><i class="fa fa-bars"></i></div>
				<div id="main-menu">
					<div class="request-header">
						<a href="/request-a-demo/">
							<button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern bttn-blue m-l-sm">Request a Demo</button>
						</a>
					</div>
	        <?php wp_nav_menu(array('menu' => 'Main Menu', 'menu_class' => 'header_nav' )); ?>
				</div>
    	</div>
    </div>
		<div class="site-content">
