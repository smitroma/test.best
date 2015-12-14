<?php
/*-----------------------------------------------------------------------------------*/
/*	Post type: Standard
/*-----------------------------------------------------------------------------------*/
?>

	<?php
	
	$link_lightbox = get_field('image_overlay_link', 'option') == "link_lightbox";
	$link_post = get_field('image_overlay_link', 'option') == "link_post";
	$disable_lightbox = get_field('disable_lightbox', 'option');
	$disable_post_link = get_field('disable_post_link', 'option');
	$disable_overlay = get_field('disable_overlay', 'option');

	?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		<div class="entry-image" <?php if ($link_post) { ?> onclick="location.href='<?php the_permalink(); ?>'"<?php } ?>>

				<?php if (!$disable_overlay) { ?>
				<span class="entry-image-overlay"></span>
				<?php } ?>
				
				<div class="view">
				
					<?php if(!$disable_lightbox) { ?>
						<a href="<?php zt_fancybox_url($url); ?>" class="<?php zt_fancybox(); ?> fa fa-picture-o"></a> 
					<?php } ?>
					
					<?php if(!$disable_post_link) { ?>
						<a href="<?php the_permalink(); ?>" class="fa fa-external-link"></a>
					<?php } ?>
					
				</div>				
			<?php the_post_thumbnail('full');  ?>

		</div>

		<?php } ?>
							   			
	   	<div class="entry">
	   	
	   		<!-- Title -->
	   		<?php if(!is_single()) { ?>
	   		<h1 class="heading">
	   			<a href="<?php the_permalink(); ?>">
	   				<?php the_title(); ?>
	   			</a>
	   		</h1>
	   		<?php } ?>
			
			<?php if (!get_field('disable_time', 'option')) { ?>
			   	<div class="post-meta">
	   				<?php echo zt_themeblvd_time_ago2(); ?> 
	   			</div>
	   		<?php } ?>

	   		<div class="clearboth"></div>
	   		
	   		<?php if(!is_single()) { ?>
	   		<div class="post-icons">
	   			<?php post_icons(); ?>
			</div>
			<?php } ?>
			
		</div>
							
	</div>