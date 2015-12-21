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
	<!--[if lt IE 9]>
	   <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <div class="container-fluid">
		<div id="top-header">
			<div class="container">
				<?php echo do_shortcode('[icon class="fa-search"]') ?>
				<a class="bttn-white-border m-l-sm" href="#">SmartBen Login</a>
				<a class="bttn-blue m-r-sm">Requeset a Demo</a>
			</div>
		</div>
    <div id="header">
      <div class="container">
				<div class="logo">
					<h1 class="m-b-0">
            <img	src="<?php header_image(); ?>" alt="<?php bloginfo('name') ?>" />
					</h1>
				</div>
				<div class="mobile-menu-toggle"><i class="fa fa-bars"></i></div>
				<div id="main-menu">
	        <?php wp_nav_menu(array('menu' => 'Main Menu', 'menu_class' => 'header_nav')); ?>
				</div>
    	</div>
    </div>
		<div class="site-content">
