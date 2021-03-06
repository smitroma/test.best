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
	<script src='//cdn.freshmarketer.com/185900/510973.js'></script>
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
<!-- Page hiding snippet (recommended) -->
<style>.async-hide { opacity: 0 !important} </style>
<script>
(function(a,s,y,n,c,h,i,d,e){s.className+=' '+y;
h.end=i=function(){s.className=s.className.replace(RegExp(' ?'+y),'')};
(a[n]=a[n]||[]).hide=h;setTimeout(function(){i();h.end=null},c);
})(window,document.documentElement,'async-hide','dataLayer',4000,{'GTM-NCHLPG':true});
</script>
<!-- END GOOGLE OPTIMIZE-->


  <div class="container-fluid">
		<div id="top-header">
			<div class="container">
				<?php get_search_form( true ); ?>
				<?php wp_nav_menu(array('menu' => 'Login Menu', 'menu_class' => 'top_nav' )); ?>
				<button id="btn-control" class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern bttn-orange m-l-sm requestDemoBtn">Request a Demo</button>
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
						<button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern bttn-orange m-l-sm requestDemoBtn">Request a Demo</button>

						<!-- Request a demo popup -->
						<div id="requestPopUp" style="display: none;">
							<div style="background-color: #fff; text-align: center;">
								<p><strong>Choose the option that best describes you:</strong></p>
								<p>
									<a href="/request-a-demo-broker" class="bttn-blue demo-button">Broker</a><br>
									<a href="/request-a-demo-company" class="bttn-blue demo-button">Employer</a><br>
									<a href="/request-a-demo-carrier" class="bttn-blue demo-button">Carrier</a>
								</p>
							</div>
						</div>

					</div>
	        <?php wp_nav_menu(array('menu' => 'Main Menu', 'menu_class' => 'header_nav' )); ?>
				</div>
    	</div>
    </div>
		<div class="site-content">
