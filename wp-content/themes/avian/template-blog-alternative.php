<?php
/*
Template Name: Blog Alternative
*/
?>
<?php get_header();?>

<div class="layer-slider">
<?php if (get_field('layerslider_id')) { ?>
<?php $layerslider_id = get_field('layerslider_id'); ?>
<?php echo do_shortcode("[layerslider id='$layerslider_id']"); ?>
<?php } ?>
</div>

<!-- Breadcrumb -->
<?php if (get_field('breadcrumb')) { zt_the_breadcrumb(); } ?>

<div class="content-container">

<div class="container">
	<div class="row">
		
		<div class="span10 offset1">
					
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts(array('post_type'=>'post', 'paged' => $paged, 'posts_per_page' => get_option('posts_per_page')));
			?>
			
			<?php while ( have_posts() ) : the_post(); ?>
			
							
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
				
			<?php endwhile; // end of the loop. ?>
			<div class="pagination"><p><?php posts_nav_link('&nbsp;','Previous page','Next page'); ?></p></div>
		</div>
		
	</div>
</div>



</div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>   