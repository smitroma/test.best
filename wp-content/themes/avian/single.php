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
						get_template_part('post/blog/'.'standard');
					} else {
						get_template_part('post/blog/'.get_post_format());
					}
					?>
				</div>
						
				<?php endwhile; // end of the loop. ?>
							
				<!-- Tags -->
				<!--
				<?php if (has_tag()) { ?>
				<div class="tag-cloud">
					 <?php  the_tags('', ' ', '<br />');  ?>
				</div>
				<?php } ?>
				-->
					
				<!-- Link Pages -->
				<div class="post-pages">
				<?php zt_custom_wp_link_pages(); ?>
				</div>

				<?php $comment_count = get_comment_count($post->ID); ?>
		 		<?php if ($comment_count['approved'] > 0) : ?>
		 		<?php if (comments_open()) { ?>

				<h3 class="comment-heading"><?php comments_number(); ?></h3>

				<?php } ?>
				<?php endif; ?>
					
				<?php comments_template(); ?>

			</div>	
				
			<div class="span4 widget-area widget-right">
				<?php dynamic_sidebar('Page'); ?>
			</div>
				
		</div>
	
	</div> <!--END .container --> 
	<div class="clearboth"></div>
</div>
<?php get_footer(); ?>