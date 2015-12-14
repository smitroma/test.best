<?php
/*
Template Name: Portfolio
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


// Span size of each portfolio item
if (get_field('portfolio_columns') == "two_columns") {
	$portfolio_span_size = "span6";
}
if (get_field('portfolio_columns') == "three_columns") {
	$portfolio_span_size = "span4";
}
if (get_field('portfolio_columns') == "four_columns") {
	$portfolio_span_size = "span3";
} 
?>

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
			<?php
			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
			$args['paged'] = $paged;
			query_posts(array('post_type'=>'portfolio', 'paged' => $paged, 'posts_per_page' => '10000'));
			?>
			
			<div class="<?php echo $span_size; ?>">
			
				<!-- Category Filter -->
				<div class="row">
					<div class="span12">
						<div class="category-filter-button">
							<i class="fa fa-th"></i> &nbsp;Filter
							<ul class="category-filter">
							<?php  $MyWalker = new zt_MyWalker(); ?>
							<?php $args = array(
								'show_option_all'    => '',
								'orderby'            => 'name',
								'order'              => 'ASC',
								'style'              => 'list',
								'show_count'         => 0,
								'hide_empty'         => 1,
								'use_desc_for_title' => 1,
								'child_of'           => 0,
								'hierarchical'       => 1,
								'show_option_none'   => 'No categories',
								'number'             => null,
								'echo'               => 1,
								'title_li'           => '',
								'depth'              => 0,
								'current_category'   => 0,
								'pad_counts'         => 0,
								'taxonomy'           => 'portfolio_categories',
								'walker'             => $MyWalker
							); 
							?>
							<li><a href="#filter=" class="selected">All Posts</a></li>
							<?php wp_list_categories($args); ?>
						</ul>
						</div>
						<div class="clearboth"></div>
					
					</div>
				</div>
				<div class="isotope-preloader"></div>
				<div class="isotope row">
					<div class="<?php echo $span_size; ?>">
			
						<?php while ( have_posts() ) : the_post(); ?>
						
							<?php global $more; $more = 0; ?>
												
							<div class="isotope-post <?php zt_get_custom_category_slug($post->ID, 'portfolio_categories'); ?> <?php echo $portfolio_span_size; ?>">
					
								<?php  if(!get_post_format()) {
									get_template_part('post/portfolio/'.'standard');
								} else {
									get_template_part('post/portfolio/'.get_post_format());
								} ?>
							
							</div>
							
						<?php endwhile; // end of the loop. ?>
						
					</div>
				</div>
			
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

<div class="clearboth"></div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>    