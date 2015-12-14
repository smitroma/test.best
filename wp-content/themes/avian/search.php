<?php get_header();?>
<!-- Slider -->
<div class="layer-slider"></div>
<?php  $post_count = $wp_query->found_posts; ?>
<!-- Breadcrumb -->
<div class="page-callout">
	<div class="container">
		<div class="row">
			<div class="span6">
				<div class="we-found">
					We found <?php echo $post_count ?> posts for "<?php the_search_query() ?>"
				</div>
			</div>
			<div class="span6">
				<div class="page-name">
					Search results for: <?php the_search_query() ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="content-container">
	<div class="container">
		<div class="row">
			<div class="span8">
				<div class="empty-space"></div>
				<?php if ($post_count == 0) { ?>
				<p>Sorry, we didn't find anything for <?php the_search_query() ?>. Try using another term:</p>
				<form id="searchform" action="?s=" method="get" role="search">
						<i class="icon-search"></i>
						<input id="s" type="text" name="s" value="" placeholder="Search">
						<input id="searchsubmit" type="submit" value="Search">
				</form>
				<?php } ?>
				<?php while ( have_posts() ) : the_post(); ?>
		
					<?php get_template_part('post/'.'search'); ?>
	
				<?php endwhile; // end of the loop. ?>
					
			</div>
				
			<div class="span4 widget-right">
				<?php dynamic_sidebar('Page'); ?>
			</div>
		</div>
	</div>
</div>
<div class="clearboth"></div>
<?php
//Reset Query
wp_reset_query();
?>
<?php get_footer(); ?>   