<?php
/*
Template Name: Blog
*/
?>
<?php get_header();?>

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
?>

<div class="layer-slider">
<?php if (get_field('layerslider_id')) { ?>
<?php $layerslider_id = get_field('layerslider_id'); ?>
<?php echo do_shortcode("[layerslider id='$layerslider_id']"); ?>
<?php } ?>
</div>

<!-- Breadcrumb -->
<?php if (get_field('breadcrumb')) { zt_the_breadcrumb(); } ?>



<!-- Begin content -->
<div class="content-container">
	<div class="container">
	
		<div class="row">
		
			<!-- Left sidebar -->
			<?php if ($sidebar == "left") { ?>
				<div class="span4 widget-area widget-left">
					<?php if (get_field('select_a_sidebar')) { ?>
						<?php dynamic_sidebar(get_field('select_a_sidebar')); ?>
					<?php } else { ?>
						<?php dynamic_sidebar('Page'); ?>
					<?php } ?>
				</div>
			<?php } ?>
			
			<!-- MAIN CONTENT -->
			<div class="<?php echo $span_size; ?> blog-posts">
				
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			query_posts(array('post_type'=>'post', 'paged' => $paged, 'posts_per_page' => get_option('posts_per_page')));
			?>
			
			<?php while ( have_posts() ) : the_post(); ?>
			
			<div class="row">
				
				<div class="<?php echo $span_size; ?>">
							
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
			
			</div>
			
			<!-- Right sidebar -->
			<?php if ($sidebar == "right") { ?>
				<div class="span4 widget-area widget-right">
					<?php if (get_field('select_a_sidebar')) { ?>
						<?php dynamic_sidebar(get_field('select_a_sidebar')); ?>
					<?php } else { ?>
						<?php dynamic_sidebar('Page'); ?>
					<?php } ?>
				</div>
			<?php } ?>
			
		</div>
		
	</div>
</div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>   