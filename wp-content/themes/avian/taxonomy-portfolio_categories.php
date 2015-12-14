<?php
/*
Template Name: Portfolio
*/
?>
<?php get_header();?>

<?php $span_size = "span4"; ?>

<?php global $post; $page_id = $post->ID; ?>

<div class="layer-slider"></div>

<!-- Breadcrumb -->
<div class="page-callout">
	<div class="container">
		<div class="row">
			<div class="span6">
				<div class="breadcrumbs">
					<ul>
						
						<li>
							<?php single_cat_title(); ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="content-container">
	<div class="container">
		
		<!-- Category Filter -->
		<div class="row">
			<div class="span12">
				<div class="category-filter-button">
					<i class="icon-th"></i> &nbsp;Categories
					<ul class="category-selector">
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
					); 
					?>
					<?php wp_list_categories($args); ?>
				</ul>
				</div>
				<div class="clearboth"></div>
			
			</div>
		</div>
		
		<div class="isotope-preloader"></div>
		<div class="isotope row">
			
			<?php while ( have_posts() ) : the_post(); ?>
			
				<?php global $more; $more = 0; ?>
									
				<div class="isotope-post <?php zt_get_custom_category_slug($post->ID, 'portfolio_categories'); ?> <?php echo $span_size; ?>">
		
					<?php  if(!get_post_format()) {
						get_template_part('post/portfolio/'.'standard');
					} else {
						get_template_part('post/portfolio/'.get_post_format());
					} ?>
				
				</div>
				
			<?php endwhile; // end of the loop. ?>
				
		</div>
		
		<?php if (get_next_posts_link()) { ?>
	<div class="isotope-loadmore"><?php next_posts_link('<i class="icon-plus"></i> &nbsp;Load more', ''); ?></div>
<?php } ?>
	
	</div>
</div>

<div class="clearboth"></div>

<?php wp_reset_query(); ?>
<?php get_footer(); ?>    