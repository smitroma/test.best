<?php

/*-----------------------------------------------------------------------------------*/
/*	This file is for custom styling options. Use the options panel to apply
/*  the settings. Editing this file could break the theme.
/*-----------------------------------------------------------------------------------*/

function my_styles_method() {


	wp_enqueue_style(
		'custom-style',
		get_template_directory_uri() . '/assets/css/custom.css'
	);

	
    $background_color = get_field('background_color', 'option'); // Background Color
    $background_image = get_field('upload_background', 'option'); // Background Color
    $heading_font = get_field('heading_font', 'option');
    $navigation_font = get_field('navigation_font', 'option');
    $body_font = get_field('body_font', 'option'); 
    $body_font_size = get_field('body_font_size', 'option');
    $navigation_font_size = get_field('navigation_font_size', 'option');
    $sub_menu_font_size = get_field('sub_menu_font_size', 'option');
    $line_height = (get_field('body_font_size', 'option') * 1.75)."px";
    $custom_css_code = get_field('custom_css', 'option');
    $rainbow_bar = get_field('rainbow_bar', 'option');
    $rainbow1 = get_field('rainbow_bar_1','option');
    $rainbow2 = get_field('rainbow_bar_2','option');
    $rainbow3 = get_field('rainbow_bar_3','option');
    $rainbow4 = get_field('rainbow_bar_4','option');
    $rainbow5 = get_field('rainbow_bar_5','option');
    $link_post = get_field('image_overlay_link', 'option') == "link_post";
    $overlay_colour = get_field('overlay_colour', 'option');
    $overlay_opacity = get_field('overlay_opacity', 'option');
    $sub_menu_bg = get_field('sub_menu_bg', 'option');
    $sub_menu_hover_bg = get_field('sub_menu_hover_bg', 'option');
    $sub_menu_hover_text = get_field('sub_menu_hover_text', 'option');
    $sub_menu_colour = get_field('sub_menu_colour', 'option');
    $sub_menu_border = get_field('sub_menu_border', 'option');
  
        // If custom color isn't set, use default color #ef6957
    
    if (get_field('theme_color', 'option')) {
   		$theme_color = get_field('theme_color', 'option');
   	} else {
	   	$theme_color = '#51BABE';
   	}
   	
   	$hex2rgb_image_overlay = hex2rgb($theme_color);
   	
    // CSS
    
    $custom_css = "";
    
    if ($background_color or $background_image) {
    	$custom_css .= "body { background: $background_color url($background_image) }";
    }
    
    if ($navigation_font) {
   		$custom_css .= ".navigation li a { font-family: $navigation_font !important; }";
    }  
    if ($heading_font) {
   		$custom_css .= "h1, h2, h3, h4, h5, h6 { font-family: $heading_font !important; }";
    }
    if ($body_font) {
   		$custom_css .= "p, p span { font-family: $body_font !important; }";
    }
    if ($navigation_font_size) {
   		$custom_css .= ".navigation li a { font-size: $navigation_font_size; }";
    }
    if ($sub_menu_font_size) {
   		$custom_css .= ".navigation .sub-menu li a { font-size: $sub_menu_font_size; }";
    }
    if ($body_font_size) {
   		$custom_css .= "p, ul li { font-size: $body_font_size; line-height: $line_height; }";
    }
    
    /*-----------------------------------------------------------------------------------*/
	/*	Header Styling Options
	/*-----------------------------------------------------------------------------------*/
    
    if ($sub_menu_bg) {
    $custom_css .= ".navigation .sub-menu, .navigation .sub-menu li a, .header-scrolled .dropdown .sub-menu li a, .header-scrolled .sub-menu .current-menu-item a { background: $sub_menu_bg !important; }";
    $custom_css .= ".sub-menu-arrow { border-bottom: 4px solid $sub_menu_bg !important; }";
    }
    
    if ($sub_menu_hover_bg) {
    $custom_css .= ".navigation .sub-menu li a:hover, .header-scrolled .navigation .sub-menu li a:hover { background: $sub_menu_hover_bg !important; }";
    }
    
    if ($sub_menu_hover_text) {
   $custom_css .= ".navigation .sub-menu li a:hover, .header-scrolled .navigation .sub-menu li a:hover { color: $sub_menu_hover_text !important; }";
    }
    
    if ($sub_menu_border) {
    $custom_css .= ".navigation .sub-menu li a, .mega-menu > .sub-menu > li a { border-bottom: 1px dashed $sub_menu_border !important; }";
    }
    
    if ($sub_menu_colour) {
    $custom_css .= ".navigation .sub-menu li a, .mega-menu .sub-menu .menu-item-has-children > a { color: $sub_menu_colour !important; }";
    }
    
    if ( is_user_logged_in() ) {
	    $custom_css .= ".stuck { top: 32px; }";
	}

    
    
    /*-----------------------------------------------------------------------------------*/
	/*	Header Options
	/*-----------------------------------------------------------------------------------*/
    
/*
    if (get_field('header_style', 'option') == 'rainbow_bar') {
    	$custom_css .= ".layer-slider { padding-top: 101px; }";
    }
    if (get_field('header_style', 'option') == 'contact_bar') {
    	$custom_css .= ".layer-slider { padding-top: 131px; }";
    }
    if (get_field('header_layout', 'option') == 'layout_3') {
    	$custom_css .= ".layer-slider { padding-top: 144px; }";
    }
    if (get_field('header_style', 'option') == 'rainbow_contact') {
    	$custom_css .= ".layer-slider { padding-top: 138px; }";
    }
    if (get_field('header_style', 'option') == 'contact_bar' && get_field('header_layout', 'option') == 'layout_3') {
    	$custom_css .= ".layer-slider { padding-top: 185px; }";
    }
    if (get_field('header_style', 'option') == 'rainbow_bar' && get_field('header_layout', 'option') == 'layout_3') {
    	$custom_css .= ".layer-slider { padding-top: 151px; }";
    }
*/
    
    /*-----------------------------------------------------------------------------------*/
	/*	Header Options // Per Page
	/*-----------------------------------------------------------------------------------*/
    
/*
	if (get_field('header_style') == 'simple') {
    	$custom_css .= ".layer-slider { padding-top: 90px; }";
    }
    if (get_field('header_style') == 'rainbow_bar') {
    	$custom_css .= ".layer-slider { padding-top: 101px; }";
    }
    if (get_field('header_style') == 'contact_bar') {
    	$custom_css .= ".layer-slider { padding-top: 131px; }";
    }
    if (get_field('header_layout') == 'layout_3') {
    	$custom_css .= ".layer-slider { padding-top: 144px; }";
    }
    if ( (get_field('header_style', 'option') == 'contact_bar' || get_field('header_style') == 'contact_bar') && (get_field('header_layout', 'option') == 'layout_3' || get_field('header_layout') == 'layout_3')) {
    	$custom_css .= ".layer-slider { padding-top: 185px; }";
    }
    
    if (get_field('header_style') == 'rainbow_bar' && get_field('header_layout') == 'layout_3') {
    	$custom_css .= ".layer-slider { padding-top: 165px; }";
    }
*/
   
   
    
    if ($link_post) {
	    $custom_css .= ".entry-image { cursor: pointer; }";
    }
    
    $custom_css .= ".rainbow1 { background: $rainbow1}";
    $custom_css .= ".rainbow2 { background: $rainbow2}";
    $custom_css .= ".rainbow3 { background: $rainbow3}";
    $custom_css .= ".rainbow4 { background: $rainbow4}";
    $custom_css .= ".rainbow5 { background: $rainbow5}";
    
    if ($overlay_colour) {
   		$custom_css .= ".entry-image-overlay { background-color: $overlay_colour; }";
   	} 
   	
   	if ($overlay_opacity) {
   		$custom_css .= ".entry-image:hover .entry-image-overlay { opacity: $overlay_opacity; }";
   	} 
    
    if ($theme_color) {
	    
	  	
		$dark_color = zt_colourBrightness($theme_color,-0.8);
		$slight_dark_color = zt_colourBrightness($theme_color,-0.9);
		$light_color = zt_colourBrightness($theme_color,0.65);	
		
		$custom_css .= ".image-fullwidth-overlay { background: rgba($hex2rgb_image_overlay, 0.95); } ";	
				
   		$custom_css .= ".button, .wpb_button, .wpcf7-submit, #submit { background: $theme_color !important;}";
   		
   		$custom_css .= ".header-contact-bar .left a:hover { color: $theme_color; }";
   		
   		$custom_css .= ".button:hover, .wpb_button:hover, .wpcf7-submit:hover, #submit:hover { background: $slight_dark_color !important; }";
   		
   		$custom_css .= ".content-heading a { color: $theme_color; }";
   		
   		$custom_css .= ".post-icons a:hover, .post-icons a:hover [class*='fa-'] { color: $theme_color !important; }";
   		
   		$custom_css .= ".header-scrolled .navigation .current-menu-item a {  }";
   		
   		$custom_css .= ".navigation .current-menu-item a {  }";

   		//$custom_css .= ".vc_bar { background: $theme_color !important; }";
   		
   		$custom_css .= ".team-icons [class*='icon-']:hover { color: $theme_color; }";
   		
   		$custom_css .= ".package-name span { background: $theme_color; }";
   		
   		$custom_css .= "#submit:hover, .contact-submit:hover { background: $theme_color }";
   		
   		$custom_css .= ".entry-quote, .entry-link { background: $theme_color; }";
   		
   		$custom_css .= ".view [class*='fa-'] { background: $theme_color; }";
   		
   		$custom_css .= ".feature-icon { color: $theme_color; }";
   		
   		$custom_css .= ".heading a { color: $theme_color; }";
   		
   		$custom_css .= ".tweet_text a { color: $theme_color; }";
   		
   		$custom_css .= ".isotope-loadmore a { background: $theme_color; }";
   		
   		$custom_css .= ".navigation .current-menu-item a { color: $theme_color }";
   		
   		$custom_css .= ".navigation li a:hover, .navigation .dropdown:hover a { color: $theme_color; }";
   		
   		$custom_css .= ".tagcloud a:hover { background: $theme_color !important; }";
   		
   		$custom_css .= ".wpb_tabs .ui-tabs-active .ui-tabs-anchor { background-color: $theme_color; }";
   		
   		$custom_css .= ".tweet_text a { color: $theme_color !important; }";
   		
   		$custom_css .= ".navigation-search:hover .fa-search { color: $theme_color }";
   		
   		$custom_css .= ".highlight { background: $theme_color !important; }";
   		
   		$custom_css .= ".products .price { color: $theme_color !important; }";
   		
   		$custom_css .= ".products .price ins { color: $theme_color !important; }";
   		
   		$custom_css .= ".onsale { color: $theme_color !important; }";
   		
   		$custom_css .= ".single-product .price { color: $theme_color !important; }";
   		
   		$custom_css .= ".product-remove a { background-color: $theme_color !important; }";
   		
   		$custom_css .= ".vc-counter-number { color: $theme_color !important }";
   		
   		$custom_css .= ".shipping-calculator-button { color: $theme_color !important; }";
   		
   		$custom_css .= ".mini-cart-list .buttons .checkout { background: $theme_color !important; }";
   		
   		$custom_css .= ".mini-cart a { color: $theme_color !important; }";
   		   		
   		$custom_css .= ".header-contact-bar .right a:hover { color: $theme_color !important; }";
   		
   		$custom_css .= ".post-icons .voted i, .post-icons .voted span { color: $theme_color !important; }";
   		
   		$custom_css .= $custom_css_code;
   		
    }
    

    wp_add_inline_style( 'custom-style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'my_styles_method' );

?>