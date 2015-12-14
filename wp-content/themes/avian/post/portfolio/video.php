<?php
/*-----------------------------------------------------------------------------------*/
/*	Post type: Video
/*-----------------------------------------------------------------------------------*/
?>
	
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
		<div class="entry-video">
			<?php the_field('video_embed'); ?>
		</div>
							   			
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