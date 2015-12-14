<?php

class zt_custom_menu {

	/*--------------------------------------------*
	 * Constructor
	 *--------------------------------------------*/


	function __construct() {

		// load the plugin translation files
		add_action( 'init', array( $this, 'textdomain' ) );
		
		// add custom menu fields to menu
		add_filter( 'wp_setup_nav_menu_item', array( $this, 'zt_add_custom_nav_fields' ) );

		// save menu custom fields
		add_action( 'wp_update_nav_menu_item', array( $this, 'zt_update_custom_nav_fields'), 10, 3 );
		

		// edit menu walker
		add_filter( 'wp_edit_nav_menu_walker', array( $this, 'zt_edit_walker'), 10, 2 );

	} // end constructor
	
	

	public function textdomain() {
		load_plugin_textdomain( 'rc_scm', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
	}
	
	function zt_add_custom_nav_fields( $menu_item ) {
	
	    $menu_item->icon = get_post_meta( $menu_item->ID, '_menu_item_icon', true );
	    $menu_item->megamenu = get_post_meta( $menu_item->ID, '_menu_item_megamenu', true );
	    $menu_item->megamenu_2col = get_post_meta( $menu_item->ID, '_menu_item_megamenu_2col', true );
	    return $menu_item;

	}
	
	function zt_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
	    if ( isset( $_REQUEST['menu-item-icon']) ) {
	        $icon_value = $_REQUEST['menu-item-icon'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_icon', $icon_value );
	    }
	   

        if( isset($_REQUEST['menu-item-megamenu'][$menu_item_db_id])) {
        	update_post_meta( $menu_item_db_id, '_menu_item_megamenu', true );
        } else {
	    	update_post_meta( $menu_item_db_id, '_menu_item_megamenu', false );
        }
        
        if( isset($_REQUEST['menu-item-megamenu-2col'][$menu_item_db_id])) {
        	update_post_meta( $menu_item_db_id, '_menu_item_megamenu_2col', true );
        } else {
	    	update_post_meta( $menu_item_db_id, '_menu_item_megamenu_2col', false );
        }
	    
	  
	}

	
	function zt_edit_walker($walker,$menu_id) {
	
	    return 'Walker_Nav_Menu_Edit_Custom';
	    
	}

}

$GLOBALS['sweet_custom_menu'] = new zt_custom_menu();


include_once( 'edit_custom_walker.php' );
include_once( 'custom_walker.php' );