<?php get_header();?>
<div class="layer-slider"></div>
<!-- Breadcrumb -->
<?php zt_the_breadcrumb(); ?>
<?php setPostViews(get_the_ID()); ?>
<div class="content-container">
	<div class="container">
		<div class="row">
			<div class="span8">
				<?php while ( have_posts() ) : the_post(); ?>
						
				<?php global $more; $more = 0; ?>
					
				<div class="classic">
					<?php if(!get_post_format()) {
						get_template_part('post/portfolio/'.'standard');
					} else {
						get_template_part('post/portfolio/'.get_post_format());
					}
					?>
				</div>
						
				<?php endwhile; // end of the loop. ?>
				
				<?php comments_template(); ?>

			</div>	
				
			<div class="span4">
				<div class="post-icons">
					<?php post_icons(); ?>
	   			</div>
	   			<h1 class="heading">
		   			<a href="<?php the_permalink(); ?>">
		   				<?php the_title(); ?>
		   			</a>
	   			</h1>
	   			<?php the_content(); ?>
	   								<!-- Next/prev -->
					<div class="post-pagi">
						<span title="Previous project"><?php previous_post_link('%link', '<i class="fa fa-angle-left"></i>'); ?> </span>
						<span title="Back to portfolio"><a href="<?php the_field('portfolio_page', 'option'); ?>"><i class="fa fa-picture-o"></i></a></span>
						<span title="Next project"><?php next_post_link('%link', '<i class="fa fa-angle-right"></i>'); ?> </span>
					</div>
			</div>
				
		</div>
	
	</div> <!--END .container --> 
	<div class="clearboth"></div>
</div>
<?php get_footer(); ?>