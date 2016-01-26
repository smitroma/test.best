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
<html <?php language_attributes(); ?> class="no-js" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="Hodges-Mace: Smarter Benefits" />
	<meta property="og:description" content="Hodges-Mace, LLC is an employee benefits technology and communications company. Hodges-Mace empowers employers and employees to enjoy smarter benefits." />
	<meta property="og:url" content="http://www.hodgesmace.com/" />
	<meta property="og:site_name" content="Hodges-Mace" />
	<meta property="og:image" content="http://www.hodgesmace.com/wp-content/uploads/2016/01/hodgesmace-logo.jpg" />
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
  <!-- Google Tag Manager -->
  <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NCHLPG"
  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-NCHLPG');</script>
  <!-- End Google Tag Manager -->
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
            	<img	src="<?php header_image(); ?>" alt="<?php bloginfo('name') ?>"  width="260" height="86" title="Hodges-Mace Logo" alt="Hodges-Mace Logo"/>
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
