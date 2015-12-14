<?php

/*-----------------------------------------------------------------------------------*/
/*	Tooltip
/*-----------------------------------------------------------------------------------*/

function tooltip( $atts, $content = null ) {  

	extract(shortcode_atts( array(
							'title' => '',
							), $atts));   
							
    return '<i class="zt-tooltip" title="'.$title.'">'.do_shortcode($content).'</i>';  
}
add_shortcode("tooltip", "tooltip");

/*-----------------------------------------------------------------------------------*/
/*	Timeline
/*-----------------------------------------------------------------------------------*/

function timeline( $atts, $content = null ) {  

	extract(shortcode_atts( array(
				'timeline_icon' => '',
				'icon_colour' => '',
				'circle_colour' => '',
				'css_animation' => '',
				), $atts));
				
	$css_class = "";
	$css_class .= zt_getCSSAnimation($css_animation);
	
    return "<div class='vc-timeline $css_class'>
    			<div class='vc-timeline-icon' style='background-color: $circle_colour'>
    				<i style='color: $icon_colour' class='fa fa-$timeline_icon'></i>
    			</div>
    			<div class='vc-timeline-line'></div>
    			<div class='vc-timeline-content'>".do_shortcode($content)."</div>
    		</div>";  
}
add_shortcode("timeline", "timeline");

/*-----------------------------------------------------------------------------------*/
/*	Logo Carousel
/*-----------------------------------------------------------------------------------*/

function logo_carousel( $atts, $content = null ) {

	extract(shortcode_atts( array(
		'images' => '',
	), $atts));   
							
	$link_to = wp_get_attachment_image_src( $image_src, 'large');
	
	$images = explode( ',', $images);
	$i = -1;
	foreach ( $images as $attach_id ) {
    $i++;
    if ($attach_id > 0) {
        $post_thumbnail = wpb_getImageBySize(array( 'attach_id' => $attach_id, 'thumb_size' => 'full' ));
    }

    $thumbnail = $post_thumbnail['thumbnail'];
    
    $gal_images .= '<li>'.$thumbnail.'</li>';
}

	
    return '<div id="viewport"><ul>'.$gal_images.'</ul></div><a id="next"></a>

';  
}

add_shortcode("logo_carousel", "logo_carousel");

/*-----------------------------------------------------------------------------------*/
/*	Counter
/*-----------------------------------------------------------------------------------*/

function counter( $atts, $content = null ) {  

	extract(shortcode_atts( array(
				'counter_number' => '',
				'counter_prepend' => '',
				'counter_append' => '',
				'counter_text' => '',
				'counter_subtext' => '',
				'css_animation' => '',
				), $atts));
				
	$css_class = "";
	$css_class .= zt_getCSSAnimation($css_animation);
	
    return "<div class='vc-counter $css_class'>
    			<span class='vc-counter-prepend'>$counter_prepend</span>
    			<span class='vc-counter-number' counter-number='$counter_number'>
    				0
    			</span>
    			<span class='vc-counter-append'>$counter_append</span>
    			<span class='vc-counter-text'>$counter_text</span>
    			<p>$counter_subtext</p>
    		</div>";  
}
add_shortcode("counter", "counter");

/*-----------------------------------------------------------------------------------*/
/*	Divider
/*-----------------------------------------------------------------------------------*/

function divider( $atts, $content = null ) {  

	extract(shortcode_atts( array(
							'style' => '',
							), $atts));   
							
    return "<div class='divider $style'></div>";  
}
add_shortcode("divider", "divider");

/*-----------------------------------------------------------------------------------*/
/*	Highlight
/*-----------------------------------------------------------------------------------*/

function highlight( $atts, $content = null ) {  

		extract(shortcode_atts( array(
							'colour' => '',
							'color' => ''
							), $atts));
							
		if ($color) {		
   			$button_colour = 'style="background: '.$color.' !important;"';
   			} else if ($colour) {		
	   		$button_colour = 'style="background: '.$colour.' !important;"';
	   		} else {
	   		$button_colour = "";
	   	}
							
    return '<i class="highlight" '.$button_colour.'>'.do_shortcode($content).'</i>';  
}
add_shortcode("highlight", "highlight");


/*-----------------------------------------------------------------------------------*/
/*	Boxed
/*-----------------------------------------------------------------------------------*/

function boxed( $atts, $content = null ) {  
    return '<div class="boxed">'.do_shortcode($content).'</div>';  
}
add_shortcode("boxed", "boxed");

/*-----------------------------------------------------------------------------------*/
/*	Empty Space
/*-----------------------------------------------------------------------------------*/

function empty_space( $atts, $content = null ) {  
    return '<div class="empty-space"></div>';  
}
add_shortcode("empty_space", "empty_space");

/*-----------------------------------------------------------------------------------*/
/*	Large Empty Space
/*-----------------------------------------------------------------------------------*/

function large_empty_space( $atts, $content = null ) {  
    return '<div class="large-empty-space"></div>';  
}
add_shortcode("large_empty_space", "large_empty_space");

/*-----------------------------------------------------------------------------------*/
/*	Testimonial
/*-----------------------------------------------------------------------------------*/

function testimonial( $atts, $content = null ) {  

	
							
    return "<div class='testimonial'>".do_shortcode($content)."<div class='testimonial-arrow'></div></div>";  
}
add_shortcode("testimonial", "testimonial");


/*-----------------------------------------------------------------------------------*/
/*	Team
/*-----------------------------------------------------------------------------------*/

function team_member( $atts, $content = null ) {

	extract(shortcode_atts( array(
		'image_src' => '',
		'image_link' => '',
		'name' => '',
		'position' => '',
		'description' => '',
		'social_buttons' => '',
		'css_animation' => ''
	), $atts));   
							
	$link_to = wp_get_attachment_image_src( $image_src, 'large');
	
	$graph_lines = explode(",", $social_buttons);
	
	$output = "";
	foreach ($graph_lines as $line) {
	
	    $single_val = explode("|", $line);
	    $output .= "<a href='$single_val[0]' class='fa fa-$single_val[1]'></a>";
	    
	}
	
	$css_class = "";
	$css_class .= zt_getCSSAnimation($css_animation);
	
    return "<div class='$css_class'><a href='$image_link' class='entry-image'><img src='$link_to[0]' alt='' /></a><div class='entry'><h1 class='heading'>$name</h1><div class='post-meta'>$position</div><div class='team-icons'>$output</div><p>$description</p></div></div>";  
}

add_shortcode("team_member", "team_member");

/*-----------------------------------------------------------------------------------*/
/*	Icons
/*-----------------------------------------------------------------------------------*/

function icon( $atts) {
	extract(shortcode_atts( array(
							'name' => '',
							'size' => '',
							'color' => '',
							'class' => '',
							), $atts));   
    return '<i class="fa fa-'.$name.' '. $class.'" style="font-size:'.$size.'; color: '.$color.'"></i>';  
}
add_shortcode("icon", "icon");


/*-----------------------------------------------------------------------------------*/
/*	Features Icon
/*-----------------------------------------------------------------------------------*/

function feature( $atts) {
	extract(shortcode_atts( array(
							'icon_name' => '',
							'title' => '',
							'description' => '',
							'css_animation' => '',
							'class' => ''
							), $atts));   
	
	$css_class = "";						
	$css_class .= zt_getCSSAnimation($css_animation);
	
    return '<div class="feature '.$css_class.'"><div class="feature-left"><div class="feature-icon"><i class=" fa fa-'.$icon_name.'"></i></div></div><div class="feature-right"><h3>'.$title.'</h3><p>'.$description.'</p></div></div>';  
}
add_shortcode("feature", "feature");


/*-----------------------------------------------------------------------------------*/
/*	Buttons
/*-----------------------------------------------------------------------------------*/

function button( $atts, $content = null ) {
	extract(shortcode_atts( array(
							'size' => '',
							'href' => '',
							'color' => '',
							'colour' => '',
							), $atts));
		
				
		if ($color) {		
   		$button_colour = 'style="background: '.$color.' !important;"';
   		} else if ($colour) {		
   		$button_colour = 'style="background: '.$colour.' !important;"';
   		} else {
	   		$button_colour = "";
   		}
   		
    return '<a href="'.$href.'" '.$button_colour.' class="button '.$size.'">'.do_shortcode($content).'</a>';  
}
add_shortcode("button", "button");

/*-----------------------------------------------------------------------------------*/
/*	Round Button
/*-----------------------------------------------------------------------------------*/

function round_button( $atts, $content = null ) {
	extract(shortcode_atts( array(
							'size' => '',
							'href' => '',
							'color' => '',
							), $atts));
		
				
		if ($color) {		
   		$button_color = 'style="background: '.$color.' !important;"';
   		} else {
	   		$button_color = "";
   		}
   		
    return '<a href="'.$href.'" '.$button_color.' class="round-button '.$size.'">'.do_shortcode($content).'</a>';  
}
add_shortcode("round_button", "round_button");

/*-----------------------------------------------------------------------------------*/
/*	Full width section
/*-----------------------------------------------------------------------------------*/

function fullwidth( $atts, $content = null ) {
	extract(shortcode_atts( array(
							'background_color' => '',
							), $atts));   
    return '<div style="background-color: '.$background_color.';" class="fullwidth-section">'.do_shortcode($content).'</div>';  
}
add_shortcode("fullwidth", "fullwidth");

/*-----------------------------------------------------------------------------------*/
/*	Buttons Mini
/*-----------------------------------------------------------------------------------*/

function btn_mini( $atts, $content = null ) {
	extract(shortcode_atts( array(
							'btn_color' => '',
							), $atts));   
    return '<div class="button-mini '.$btn_color.'">'.do_shortcode($content).'</div>';  
}
add_shortcode("btn_mini", "btn_mini");

/*-----------------------------------------------------------------------------------*/
/*	Buttons Mini
/*-----------------------------------------------------------------------------------*/

function hr() {
    return '<hr>';  
}
add_shortcode("hr", "hr");

/*-----------------------------------------------------------------------------------*/
/*	Contact form
/*-----------------------------------------------------------------------------------*/

function contact_form() {
	return '<div class="contact-alerts"></div>
					
				<!-- Contact Form  -->
				<form id="contact" action="contact.php">
					<div class="row-fluid">
						<div class="span6">
							<input id="name" type="text" value="" placeholder="Name" name="name">
						</div>	
						<div class="span6">
							<input id="email" type="text" value="" placeholder="Email" name="email">
						</div>	
					</div>			
					
					<div class="row-fluid">
						<div class="span12">
							<textarea id="message" required="" rows="6" placeholder="Message" name="message"></textarea>
						</div>
					</div>
					
					<a class="contact-submit" href="#">Submit</a>
				</form>';
}

add_shortcode("contact_form", "contact_form");

/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/

function tabgroup( $atts, $content ){
	$GLOBALS['tab_count'] = 0;

	do_shortcode( $content );

	if( is_array( $GLOBALS['tabs'] ) ){
		foreach( $GLOBALS['tabs'] as $tab ){
			$tabs[] = '<li class="'.$tab['state'].'"><a href="#'.$tab['title'].'" data-toggle="tab">'.$tab['title'].'</a></li>';
			$panes[] = '<div id="'.$tab['title'].'" class="'.$tab['state'].' tab-pane"><p>'.$tab['content'].'</p></div>';
			}
			$return = "\n".'<ul class="tabs" id="myTab">'.implode( "\n", $tabs ).'</ul>'."\n".'<div class="tab-content">'.implode( "\n", $panes ).'</div>'."\n";
		}
		return $return;
	}
add_shortcode( 'tabgroup', 'tabgroup' );
	
function tabs( $atts, $content ){
	extract(shortcode_atts(array(
	'title' => 'Tab %d',
	'state' => ''
), $atts));

$x = $GLOBALS['tab_count'];
$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'state' => sprintf( $state, $GLOBALS['tab_count'] ), 'content' =>  $content );

$GLOBALS['tab_count']++;
}
add_shortcode( 'tab', 'tabs' );

/*-----------------------------------------------------------------------------------*/
/*	Pricing Table
/*-----------------------------------------------------------------------------------*/


function pricing_table($atts) {
	
	extract(shortcode_atts(array(
		'price' => '',
		'cycle' => '',
		'package' => '',
		'package_tag' => '',
		'features' => '',
		'button_value' => '',
		'button_link' => '',
	), $atts));
	
	$features_line = explode(",", $features);
	
	$features_output = "";
	foreach ($features_line as $line) {

   		$features_output .= "<li><i class='fa fa-check'></i>".$line."</li>";
   	}
   	
   	$price_val = explode("|", $price);
   	
   	$package_tag_output = "";
   	if ($package_tag) {
   		$package_tag_output = '<span>'.$package_tag.'</span>';
   	}
   	
    return
    
		'<div class="package">
			
			<div class="price">
				<span class="currency">'.$price_val[0].'</span><span class="amount">'.$price_val[1].'</span><p>/ '.$cycle.'</p>
			</div>
			<div class="package-name">
				<h2>'.$package.$package_tag_output.'</h2>
			</div>
			<ul>
			'.$features_output.'
			</ul>
			<div class="buy-button">
				<a href="'.$button_link.'">'.$button_value.'</a>
			</div>
		
		</div>
		';
     
}
add_shortcode("pricing_table", "pricing_table");

/*-----------------------------------------------------------------------------------*/
/*	Features
/*-----------------------------------------------------------------------------------*/

function features($atts) {

	extract(shortcode_atts(array(
		'icon' => '',
		'title' => '',
		'description' => ''
		
	), $atts));
	
	return '<div class="features">
							<div class="features-icon"><i class="fa fa-'.$icon.'"></i></div>
							<span>'.$title.'</span>
							<p>'.$description.'</p>
						</div>';
}

add_shortcode("features", "features");

/*-----------------------------------------------------------------------------------*/
/*	Bordered Content
/*-----------------------------------------------------------------------------------*/

function bordered_content($atts, $content = null) {

	
	return '<div style="" class="bordered-content">'.$content.'</div>';
}

add_shortcode("bordered_content", "bordered_content");

/*-----------------------------------------------------------------------------------*/
/*	Parallax Section
/*-----------------------------------------------------------------------------------*/

function parallax_section($atts, $content = null) {

	extract(shortcode_atts(array(
		'background' => ''
		
	), $atts));


	$background_src = wp_get_attachment_image_src( $background, 'full');
	
	return '<div class="parallax-section" style="background-image: url('.$background_src[0].');">'.do_shortcode($content).'</div>';
}

add_shortcode("parallax_section", "parallax_section");


/*
function vc_theme_vc_row($atts, $content = null) {
   $output = $el_class = '';
extract(shortcode_atts(array(
    'el_class' => '',
    'tester' => ''
), $atts));

wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');

$thiz = new WPBakeryShortCode();
$el_class = $thiz->getExtraClass($el_class);

$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_row '.get_row_css_class().$el_class, $this->settings['base']);

$output .= '<div class="'.$css_class.$tester.'">';
$output .= wpb_js_remove_wpautop($content);
$output .= '</div>'.$this->endBlockComment('row');

return $output;
}
*/

/*-----------------------------------------------------------------------------------*/
/*	Client Logo
/*-----------------------------------------------------------------------------------*/

function client_logo($atts, $content = null) {

	extract(shortcode_atts(array(
		'image' => ''
		
	), $atts));


	$image_src = wp_get_attachment_image_src( $image, 'full');
	
	return '<img class="client-logo" src="'.$image_src[0].'" alt="" />';
}

add_shortcode("client_logo", "client_logo");

/*-----------------------------------------------------------------------------------*/
/*	Recent Work
/*-----------------------------------------------------------------------------------*/

function recent_work($atts) { 
	
		extract(shortcode_atts(array(
		'posts_per_page' => ''
		
	), $atts));
	
	
?>
		
	<?php $paged = (get_query_var('page')) ? get_query_var('page') : 1;
		query_posts(array('post_type'=>'portfolio', 'paged' => $paged, 'posts_per_page' => $posts_per_page));
				$output = '';
	?>
		
	<?php while ( have_posts() ) : the_post(); ?>

		<?php
		global $more;
		$more = 0;
		
		ob_start();  
		get_template_part('post/portfolio/'.get_post_format());

		$get_template_part = ob_get_clean();    
		
		
		$output .= '<div class="isotope-post span4 recent-work">'.$get_template_part.'</div>';
		?>
	<?php endwhile; // end of the loop. ?>
	
			
	<?php wp_reset_query(); ?>
			
	<?php return '<div class="isotope row">'.$output.'</div>'; ?>

<?php }

add_shortcode("recent_work", "recent_work");

/*-----------------------------------------------------------------------------------*/
/*	Recent Work (Full width)
/*-----------------------------------------------------------------------------------*/

function recent_work_full_width($atts) { 
	
		extract(shortcode_atts(array(
		'posts_per_page' => '',
		'image_width' => '',
		
	), $atts));
	
	
?>
		
	<?php $paged = (get_query_var('page')) ? get_query_var('page') : 1;
		query_posts(array('post_type'=>'portfolio', 'paged' => $paged, 'posts_per_page' => $posts_per_page));
				$output = '';
	?>
		
	<?php while ( have_posts() ) : the_post(); ?>

		<?php
		global $more;
		$more = 0;
		
		global $post;
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
		
		  
		
		
		$output .= '		
				<a class="image-fullwidth" href="'.get_permalink($post->ID).'" style="width: '.$image_width.'">
					<div class="image-fullwidth-overlay">
					
						<h3>'.get_the_title().'</h3>
					</div>
					<img src="'.$url.'" />
				</a>	
				
';
		?>
	<?php endwhile; // end of the loop. ?>
	
			
	<?php wp_reset_query(); ?>
			
	<?php return '<div class="full-width-portfolio">'.$output.'</div>'; ?>

<?php }

add_shortcode("recent_work_full_width", "recent_work_full_width");


/*-----------------------------------------------------------------------------------*/
/*	Recent Blog Posts
/*-----------------------------------------------------------------------------------*/

function recent_posts($atts) { 
	if(!function_exists("masonry_excerpt_length")) {
		function masonry_excerpt_length( $length ) {
		return 50;
	}
}
add_filter( 'excerpt_length', 'masonry_excerpt_length', 999 );
	
	extract(shortcode_atts(array(
		'posts_per_page' => ''
		
	), $atts));
	
	
?>
		
	<?php $paged = (get_query_var('page')) ? get_query_var('page') : 1;
		query_posts(array('post_type'=>'post', 'paged' => $paged, 'posts_per_page' => $posts_per_page));
				$output = '';
	?>
		
	<?php while ( have_posts() ) : the_post(); ?>

		<?php
		global $more;
		$more = 0;
		
		ob_start();  
		if(!get_post_format()) {
		   get_template_part('post/blog/'.'standard');
		} else {
		   get_template_part('post/blog/'.get_post_format());
		}

		$get_template_part = ob_get_clean();    
		
		
		$output .= '<div class="isotope-post span4">'.$get_template_part.'</div>';
		?>
	<?php endwhile; // end of the loop. ?>
	
			
	<?php wp_reset_query(); ?>
			
	<?php return '<div class="isotope row">'.$output.'</div>'; ?>

<?php }

add_shortcode("recent_posts", "recent_posts");


?>