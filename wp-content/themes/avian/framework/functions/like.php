<?php

/*-----------------------------------------------------------------------------------*/
/*	Custom Like Script
/*-----------------------------------------------------------------------------------*/

$timebeforerevote = 1;

add_action('wp_ajax_nopriv_post-like', 'post_like');
add_action('wp_ajax_post-like', 'post_like');

function loadMyScripts()
{
wp_localize_script('like_post', 'ajax_var', array(
	'url' => admin_url('admin-ajax.php'),
	'nonce' => wp_create_nonce('ajax-nonce')
));
}

add_action( 'wp_enqueue_scripts','loadMyScripts' );

function post_like()  
{  
    // Check for nonce security  
    $nonce = $_POST['nonce'];  
   
    if ( ! wp_verify_nonce( $nonce, 'ajax-nonce' ) )  
        die ( 'Busted!');  
      
    if(isset($_POST['post_like']))  
    {  
        // Retrieve user IP address  
        $ip = $_SERVER['REMOTE_ADDR'];  
        $post_id = $_POST['post_id'];  
          
        // Get voters'IPs for the current post  
        if (get_post_meta($post_id, "voted_IP")) {
        $meta_IP = get_post_meta($post_id, "voted_IP"); 
        } else {
            $meta_IP = 0;
        }  
        $voted_IP = $meta_IP[0];  
  
        if(!is_array($voted_IP))  
            $voted_IP = array();  
          
        // Get votes count for the current post  
        $meta_count = get_post_meta($post_id, "votes_count", true);  
  
        // Use has already voted ?  
        if(!hasAlreadyVoted($post_id))  
        {  
            $voted_IP[$ip] = time();  
  
            // Save IP and increase votes count  
            update_post_meta($post_id, "voted_IP", $voted_IP);  
            update_post_meta($post_id, "votes_count", ++$meta_count);  
              
            // Display count (ie jQuery return value)  
            echo $meta_count;  
        }  
        else  
            echo "already";  
    }  
    exit;  
}  

function hasAlreadyVoted($post_id)  
{  
    global $timebeforerevote;
  
    // Retrieve post votes IPs
    
    if (get_post_meta($post_id, "voted_IP")) {
    $meta_IP = get_post_meta($post_id, "voted_IP"); 
    } else {
        $meta_IP = 0;
    }
    
    $voted_IP = $meta_IP[0];

      
    if(!is_array($voted_IP))  
        $voted_IP = array();  
          
    // Retrieve current user IP  
    $ip = $_SERVER['REMOTE_ADDR'];  
      
    // If user has already voted  
    if(in_array($ip, array_keys($voted_IP)))  
    {  
        $time = $voted_IP[$ip];  
        $now = time();  
          
        // Compare between current time and vote time  
        if(round(($now - $time) / 60) > $timebeforerevote)  
            return false;  
              
        return true;  
    }  
      
    return false;  
}


function getPostLikeLink($post_id)
{

	$vote_count = get_post_meta($post_id, "votes_count", true);

	if(hasAlreadyVoted($post_id))
		$output = '<a class="voted" href=""><i class="fa fa-heart liked"></i> ';
	else
		$output = '<a href="" data-post_id="'.$post_id.'" class="post-like"><i class="fa fa-heart"></i> ';
				
	if ($vote_count == 0) { 
    	$output .= '<span class="count">0</span></a>';
	} else {	
	$output .= '<span class="count">'.$vote_count.'</span></a>';
	}
	
	return $output;
}
?>