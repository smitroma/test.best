<?php
/*
Template Name: Archives
*/
get_header();
?>

<div class="content-container">
	<div class="container">
	
		<div class="row">
			<div class="span12">
		
				<h2>Archives by Month:</h2>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
				<br>
				<h2>Archives by Subject:</h2>
				<ul>
					 <?php wp_list_categories(); ?>
				</ul>
			
			</div>
		</div>
		
	</div>
</div>

<?php get_footer(); ?>