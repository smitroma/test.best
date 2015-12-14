<?php get_header();?>

<div class="layer-slider"></div>

<!-- Breadcrumb -->
<div class="page-callout">
	<div class="container">
		<div class="row">
			<div class="span6">
				<?php zt_the_breadcrumb_data(); ?>
			</div>
			
			<div class="span6">
				<div class="page-name">
					<?php the_title(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="content-container">

<div class="container">
	<div class="row">
		
		<div class="span8">

			<?php while ( have_posts() ) : the_post(); ?>
			
			<div class="row">
				
				<div class="span8">
							
					<?php
					global $more;
					$more = 0;
					?>
					
					<div class="classic">
						<?php if(!get_post_format()) {
							get_template_part('post/blog/'.'standard');
						} else {
							get_template_part('post/blog/'.get_post_format());
						}
						?>
					</div>
				
				</div>
				
			</div>
			<?php endwhile; // end of the loop. ?>
			<div class="pagination"><p><?php posts_nav_link('&nbsp;','Previous page','Next page'); ?></p></div>
		</div>
						
		<div class="span4 widget-area widget-right">
			<?php dynamic_sidebar('Page'); ?>
		</div>	
		
	</div>
</div>



</div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>   