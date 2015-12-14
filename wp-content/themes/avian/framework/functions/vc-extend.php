<?php

function vc_theme_vc_row($atts, $content = null) {
	$output = $el_class = '';
	extract(shortcode_atts(array(
	'el_class' => '',
	'parallax_bg' => '',
	'background_bg' => '',
	'scrolling_bg' => '',
	'bg_colour' => '',
	'full_width' => '',
	'full_width_portfolio' => '',
	'row_dark' => '',
	'isotope' => '',
	'remove_bottom_margin' => '',
	'remove_top_margin' => '',
	'remove_bottom_padding' => '',
	'remove_top_padding' => '',
	'row_large' => ''
	), $atts));

	wp_enqueue_style( 'js_composer_front' );
	wp_enqueue_script( 'wpb_composer_front_js' );
	wp_enqueue_style('js_composer_custom_css');

	$full_width_light = "";
	$rowdark = "";
	$remove = "";
	$isotope_grid = "";
	$parallax_bg_class = "";
	$backgrund_bg_class = "";
	$scrolling_bg_class = "";
	$row_large_class = "";
	$full_width_portfolio_class = "";
	
    if ( $el_class != '' ) {
        $el_class_output = " " . str_replace(".", "", $el_class);
    }
			
	if ($full_width) { $full_width_light = "full-width"; };
	if ($row_dark) { $rowdark = "row-dark"; };
	if ($remove_bottom_margin) { $remove = "margin-bottom-0 "; };
	if ($remove_top_margin) { $remove .= "margin-top-0 "; };
	if ($remove_bottom_padding) { $remove .= "padding-bottom-0 "; };
	if ($remove_top_padding) { $remove .= "padding-top-0 "; };
	if ($isotope) { $isotope_grid = "isotope"; };
	if ($parallax_bg) { $parallax_bg_class = "parallax-bg"; };
	if ($background_bg) { $backgrund_bg_class = "background-bg"; };
	if ($scrolling_bg) { $scrolling_bg_class = "scrolling-bg"; };
	if ($row_large) { $row_large_class = "row-large"; };

	$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_row '.get_row_css_class().' '.$el_class_output.' '.$full_width_light.' '.$rowdark.' '.	$isotope_grid.' '.$remove.' '.$parallax_bg_class.' ' .$scrolling_bg_class.' '.$row_large_class);

	$background_bg_src = wp_get_attachment_image_src( $background_bg, 'full');

	$output .= '<div style="background-color: '.$bg_colour.'; background-image: url('.$background_bg_src[0].');" class="main-row '.$css_class.'">';
	$output .= wpb_js_remove_wpautop($content);
	$output .= '</div>';

	return $output;
}
?>