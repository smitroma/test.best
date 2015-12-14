<?php
/*-----------------------------------------------------------------------------------*/
/*	Post type: Link
/*-----------------------------------------------------------------------------------*/
?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<!-- Link -->		
		<div class="entry-link">
			<i class="fa fa-external-link"></i>
			<?php if (get_field('link_title')) { ?>
			<a href="<?php the_field('link_url'); ?>"><?php the_field('link_title'); ?></a>
			<?php } else { ?>
			<a href="#">No Link Title</a>
			<?php } ?>
			
		</div>				
	   	
	   	<div class="entry">
	   	
	   		<!-- Title -->
	   		<?php if (get_the_title()) { ?>
	   		<h2 class="heading">
	   			<a href="<?php the_permalink(); ?>">
	   				<?php the_title(); ?>
	   			</a>
	   		</h2>
	   		<?php } ?>
	   		
		   	<div class="post-meta">
   				By <?php the_author_posts_link(); ?> <?php if (has_category()) { ?>in<?php } ?> <?php the_category(', ') ?> 
   			</div>
			
		   	<div class="isotope-post-meta">
   				<?php echo zt_themeblvd_time_ago2(); ?>  
   			</div>
	   		
	   		<div class="post-icons">
	   			<?php post_icons(); ?>
			</div>
	   		
	   		<!-- Content -->
	   		<?php if (!is_single()) { ?>
		   		<?php if (get_field('post_content') == "excerpt") { the_excerpt(''); } else if (get_field('post_content') == "full_post") { the_content(); } ?>
	   		<?php } ?>
	   		<?php if (is_single()) { ?>
		   		<?php the_content(); ?>
	   		<?php } ?>
	   		<div class="clearboth"></div>
   		 	
		</div>										
	</div>