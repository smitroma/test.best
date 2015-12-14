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

<!-- Slider -->
<div class="layer-slider">
	<?php if (get_field('layerslider_id')) { ?>
		<?php $layerslider_id = get_field('layerslider_id'); ?>
		<?php echo do_shortcode("[layerslider id='$layerslider_id']"); ?>
	<?php } ?>
</div>

<!-- Breadcrumb -->
<?php if (get_field('breadcrumb') == true) { zt_the_breadcrumb(); } ?>

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
			<div class="<?php echo $span_size; ?>">
				
			<?php while (have_posts()) : the_post(); ?>
				<?php $my_terms = get_the_terms( $post->ID, 'Skills' ); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php the_content(); ?>
											
				</div>
			<?php endwhile; ?>
			
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
<?php get_footer(); ?>   