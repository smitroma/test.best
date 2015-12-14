<?php
/*-----------------------------------------------------------------------------------*/
/*	Post type: Gallery
/*-----------------------------------------------------------------------------------*/
?>

	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<?php if( get_field('featured_stamp') ) { ?>
		<div class="featured-stamp">
			<p>FEATURED</p>
		</div>	
		<?php } ?>
				
		<div class="widget-slider">
			<div class="flexslider">
				<ul class="slides">
					
					<?php if (get_field('slider_images')) { ?>
					<?php while(has_sub_field('slider_images')) { ?>
		    		<li>
		    			<div class="entry-image">
		    				<a href="<?php zt_fancybox_url(get_field('image')); ?>" class="<?php zt_fancybox(); ?> entry-image">
		    					<img src="<?php the_sub_field('slider_image'); ?>" alt="" />
		    				</a>
		    			</div>
					</li>
					<?php } ?>
					<?php } else { ?>
					
					<li>
		    			<div class="entry-image">
		    				<a href="<?php zt_fancybox_url(get_field('image')); ?>" class="<?php zt_fancybox(); ?> entry-image">
		    					<img src="http://placehold.it/306x300">
		    		
		    				</a>
		    			</div>
					</li>
					
					<li>
		    			<div class="entry-image">
		    				<a href="<?php zt_fancybox_url(get_field('image')); ?>" class="<?php zt_fancybox(); ?> entry-image">
		    					<img src="http://placehold.it/306x300">
		    		
		    				</a>
		    			</div>
					</li>
					
					<li>
		    			<div class="entry-image">
		    				<a href="<?php zt_fancybox_url(get_field('image')); ?>" class="<?php zt_fancybox(); ?> entry-image">
		    					<img src="http://placehold.it/306x300">
		    		
		    				</a>
		    			</div>
					</li>
					<?php } ?>
		
				</ul>
			</div>
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