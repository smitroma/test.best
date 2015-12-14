<?php

add_action( 'widgets_init', 'register_my_widget' ); // function to load my widget  
  
    function register_my_widget() {  
        register_widget( 'My_Widget' );  
    }                         // function to register my widget  
  
class My_Widget extends WP_Widget {
	
		function My_Widget() {   
        $widget_ops = array( 'classname' => 'twitter', 'description' => __('A widget that displays your latest tweets', 'avian') );  
        $control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'twitter-widget' );  
        $this->WP_Widget( 'twitter-widget', __('Twitter Feed', 'avian'), $widget_ops, $control_ops );     
        }     // The example widget class  
        
        function widget( $args, $instance ) {
        	extract( $args );
        	$title = apply_filters('widget_title', $instance['title'] );
        	
			
        	echo $before_widget;
        	// Display the widget title 
        	if ( $title ) { echo $before_title . $title . $after_title; }
	        echo '<div class="tweet"></div>';
	        echo $after_widget;
	    }
	    
	    
	    function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		//Strip tags from title and name to remove HTML 
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
		}
	
	
	    public function form( $instance ) { ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'avian'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>"/>
		</p>
		<?php
		
				}
}	


?>