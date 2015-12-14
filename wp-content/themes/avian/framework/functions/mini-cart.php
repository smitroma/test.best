<?php

function zt_mini_cart() {

	global $woocommerce;
	echo '<ul class="mini-cart-list">';

	if (sizeof($woocommerce->cart->cart_contents)>0) : 
		$i = 0;					
		foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) :
			
			$i++;
			if ( $i == 1 ) :				
				$rowclass = ' class="cart_oddrow"';			
			else :
				$rowclass = ' class="cart_evenrow"';
				$i = 0;
			endif;
	
			$_product = $cart_item['data'];
			
			if ($_product->exists() && $cart_item['quantity']>0) :
				echo '<li'.$rowclass.'>';
				
				echo '<div class="dropdowncartimage">';
				echo '<a href="'.get_permalink($cart_item['product_id']).'">';				
				if (has_post_thumbnail($cart_item['product_id'])) :					
					echo get_the_post_thumbnail($cart_item['product_id'], 'shop_thumbnail'); 
				else :					 
					echo '<img src="'.$woocommerce->plugin_url(). '/assets/images/placeholder.png" alt="Placeholder" width="'.$woocommerce->get_image_size('shop_thumbnail_image_width').'" height="'.$woocommerce->get_image_size('shop_thumbnail_image_height').'" />'; 				
				endif;				
				echo '</a>';
				echo '</div>';
				
				echo '<div class="dropdowncartproduct">';
				echo '<a href="'.get_permalink($cart_item['product_id']).'">';				
				echo apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product).'</a>';				
				if ($_product instanceof woocommerce_product_variation && is_array($cart_item['variation'])) :
        			echo woocommerce_get_formatted_variation( $cart_item['variation'] );
   				endif;
				echo '</a>';
				echo '</div>';
				
				echo '<div class="dropdowncartquantity">';				
				echo '<span class="quantity">' .$cart_item['quantity'].' &times; '.woocommerce_price($_product->get_price()).'</span>';
				echo '</div>';
				echo '<div class="clear"></div>';
				
				echo '</li>';
				
			endif;
		endforeach; 
	else: 
		echo '<li class="empty">'.__('No products in the cart.', 'woothemes').'</li>'; 
	endif;
	
	if (sizeof($woocommerce->cart->cart_contents)>0) :
		
/*
		echo '<p class="total"><i class="fa fa-shopping-cart"></i> <strong>';
			
		if (get_option('js_prices_include_tax')=='yes') :
			_e('Total', 'woothemes');
		else :
			_e('Subtotal', 'woothemes');
		endif;
	
		echo ':</strong> '.$woocommerce->cart->get_cart_total();
			
		echo '</p>';
*/
			
		do_action( 'woocommerce_widget_shopping_cart_before_buttons' );
			
		echo '<li class="buttons">
			  <a href="'.$woocommerce->cart->get_cart_url().'" class="dropdownbutton">'.__('View Cart &rarr;', 'woothemes').'</a> 
			  <a href="'.$woocommerce->cart->get_checkout_url().'" class="dropdownbutton checkout">'.__('Checkout &rarr;', 'woothemes').'</a>
			  </li>';
	endif;
		
	echo '</ul>';
	
	
}