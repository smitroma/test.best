<?php
/**
 * Custom Walker
 *
 * @access      public
 * @since       1.0 
 * @return      void
*/
class zt_custom_menu_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth = 0, $args = array(), $current_object_id = 0)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;
           
           if ($item->megamenu == 1) {
	           $megamenu = "mega-menu";
           } else {
	           $megamenu = "";
	          }

			if ($item->megamenu_2col == 1) {
			$megamenu_2col = "mega-menu-2col";
			} else {
			$megamenu_2col = "";
			}
			
           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. $megamenu .' '.$megamenu_2col .' '. esc_attr( $class_names ) . '"';
           
         //  $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';
           $output .= $indent . '<li' . $value . $class_names .'>';

           $attributes = ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '';
           $append = '';
           
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
	           $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            
            if ($item->attr_title) {
            	$item_output .= '<i class="fa fa-'.esc_attr( $item->attr_title ).'"></i>';
            }
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}