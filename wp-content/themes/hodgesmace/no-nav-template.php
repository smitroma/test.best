<?php
/**
 * No navigation page template
 *
 * Template Name: No Navigation
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

	<!-- Google Tag Manager -->
		<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NCHLPG"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-NCHLPG');</script>
	<!-- End Google Tag Manager -->

  <div class="container-fluid no-nav">
    <div id="header">
      <div class="container">
		<div class="logo">
    	    <img src="<?php header_image(); ?>" alt="<?php bloginfo('name') ?>"  width="260" height="86" title="Hodges-Mace Logo" />
		</div>
		<div id="main-menu">
			<div class="request-header">
				<a href="#contact">
					<button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern bttn-blue m-l-sm">Request a Demo</button>
				</a>

				<!-- Request a demo popup
				<div id="requestPopUp" style="display: none;">
					<div style="background-color: #fff; text-align: center;">
						<p><strong>Choose the option that best describes you:</strong></p>
						<p>
							<a href="/request-a-demo-broker" class="bttn-blue demo-button">Broker</a><br>
							<a href="/request-a-demo-company" class="bttn-blue demo-button">Employer</a><br>
							<a href="/request-a-demo-carrier" class="bttn-blue demo-button">Carrier</a>
						</p>
					</div>
				</div>-->
			</div>
		</div>
    </div>
	<div class="site-content">
        <div id="primary">
            <main id="main" role="main">
                <?php while (have_posts()) { ?>
                    <?php the_post(); ?>
                    <?php the_content(); ?>
                <?php } ?>
            </main>
        </div>
<?php get_footer(); ?>
