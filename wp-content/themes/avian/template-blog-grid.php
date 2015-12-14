<?php
/*
Template Name: Blog Grid
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
<?php if (get_field('breadcrumb') == true) { zt_the_breadcrumb(); } ?>

<?php
/*-----------------------------------------------------------------------------------*/
/* CONTENT WIDTH SIZE
/*
/* this content width size depends on if the user has selected to display the sidebar
/*-----------------------------------------------------------------------------------*/

$sidebar = get_field('sidebar');

if ($sidebar !== "none") {
	$span_size = "span8";
}
if ($sidebar == "none") {
	$span_size = "span12";
}
if ($sidebar == "") {
	$span_size = "span12";
}

// Set excerpt length for masonry layout
	
function masonry_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'masonry_excerpt_length', 999 );
?>

<!-- Begin content -->
<div class="content-container">
	<div class="container">
		<div class="isotope-preloader"></div>
		
		<div class="row">
		
			<!-- Left sidebar -->
			<?php if ($sidebar == "left") { ?>
				<div class="span4 widget-left">
					<?php dynamic_sidebar('Page'); ?>
				</div>
			<?php } ?>
			
			<!-- MAIN CONTENT -->
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts(array('post_type'=>'post', 'paged' => $paged, 'posts_per_page' => get_option('posts_per_page')));
			?>
			
			<div class="<?php echo $span_size; ?>">
				<div class="isotope isotope-blog row">
					<div class="<?php echo $span_size; ?>">
			
						<?php while ( have_posts() ) : the_post(); ?>
				
						<?php
						global $more;
						$more = 0;
						?>
										
						<div class="isotope-post <?php zt_get_category_slug(); ?> <?php zt_get_custom_category_slug($post->ID, 'portfolio_categories'); ?> span4">
							<?php  if(!get_post_format()) {
								get_template_part('post/blog/'.'standard');
							} else {
								get_template_part('post/blog/'.get_post_format());
							}
							?>
						</div>
						
						<?php endwhile; // end of the loop. ?>
					</div>
				</div>
			
			</div>
			
			<!-- Right sidebar -->
			<?php if ($sidebar == "right") { ?>
				<div class="span4 widget-right">
					<?php dynamic_sidebar('Page'); ?>
				</div>
			<?php } ?>
			
		</div>
		
	</div>
</div>

<div class="clearboth"></div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>    