<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>  
    
    <meta name="keywords" content="<?php the_field('meta_keywords', 'option'); ?>">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    
    <!-- Apple Touch Icon -->
    <?php if (get_field('apple_touch_icon', 'option')) { ?>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php the_field('apple_touch_icon', 'option'); ?>">
    <?php } ?>
    
    <!--  Favicon -->
    <?php if (get_field('favicon', 'option')) { ?>
    <link rel="shortcut icon" href="<?php the_field('favicon', 'option'); ?>">
    <?php } ?>
    

    <?php 
    if ( is_singular() && get_option( 'thread_comments' ) ) 	wp_enqueue_script( 'comment-reply' );
    
    wp_head();
    ?>
       <script>/*<![CDATA[*/(function(w,a,b,d,s){w[a]=w[a]||{};w[a][b]=w[a][b]||{q:[],track:function(r,e,t){this.q.push({r:r,e:e,t:t||+new Date});}};var e=d.createElement(s);var f=d.getElementsByTagName(s)[0];e.async=1;e.src='//marketing.hodgesmace.com/cdnr/96/acton/bn/tracker/17907';f.parentNode.insertBefore(e,f);})(window,'ActOn','Beacon',document,'script');ActOn.Beacon.track();/*]]>*/</script>
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
		<div class="page-container <?php if (get_field('layout_mode', 'option') == "boxed") { echo "page-boxed"; } ?>">
		
		<div class="preloader"></div>
	
		<!-- Mobile Navigation
		================================================== -->
		
		<div class="mobile-nav-container">
			<div class="mobile-nav-bar">
			    <button type="button" class="btn-mobile-nav" data-toggle="collapse" data-target="#mobile-nav"><i class="fa fa-align-justify"></i></button>
		
				<!-- Mobile Logo -->
				<?php if (get_field('mobile_logo', 'option')) { ?>
				<div class="mobile-logo">
					<a href="<?php echo site_url(); ?>">
						<img src="<?php the_field('mobile_logo', 'option'); ?>" alt=""/>	
					</a>
				</div>
				<?php } else { ?>
				<div class="mobile-logo">
					<a href="<?php echo site_url(); ?>">
						<img src="<?php the_field('logo_image', 'option'); ?>" alt=""/>	
					</a>
				</div>
				<?php } ?>
				
			</div>
			
			<!-- Mobile Drop Down -->
			<div id="mobile-nav" class="collapse">
				<ul>
					<?php
					$defaults = array(
				   	'theme_location'  => 'header-menu',
				   	'container'       => 'ul',
				   	'menu_class'      => 'menu',
				   	'echo'            => true,
				   	'fallback_cb'     => 'wp_page_menu',
				   	'items_wrap'      => '%3$s',
				   	'depth'           => 0,
				   	'walker'          => new zt_custom_menu_walker()
				   );
				   ?>
				   <?php wp_nav_menu( $defaults ); ?>
				</ul>
			</div>
		</div>
		
		<!-- DESKTOP HEADER
		================================================== -->
					<?php 
			if (get_field('header_style')) { 
				header_style_page();	
			}
			?>
			
			<?php
			if (get_field('header_style') == "default") {
				header_style();	
			} else if (get_field('header_layout') == "") {
				header_style();
			}
			?>
		<div class="header">
	
			
			<?php 
			if (get_field('header_layout')) { 
				header_layout_page();	
			}
			?>
			
			<?php
			if (get_field('header_layout') == "default") {
				header_layout();	
			} else if (get_field('header_layout') == "") {
				header_layout();
			}
			?>
	
			
		</div>