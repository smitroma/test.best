<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package Brain_Bytes
 * @subpackage Hodges Mace
 * @since Hodges Mace  1.0
 */

get_header(); ?>

	<div id="primary">
		<main id="main" role="main">
			<div class="container">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="featured-img p-t-md">
						<?php if ( has_post_thumbnail() ): ?>
							<?php the_post_thumbnail(); ?>
						<?php else: ?>
							<div class="default-img">
								<div class="default-img-content">
									No Image Added
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="post-meta uppercase p-y-md">
						<span><?php the_date() ?></span> | <span>BY <?php the_author() ?></span>
					</div>
					<h1><?php the_title() ?></h1>
					<div class="post-content p-b-lg">
						<?php the_content(); ?>
					</div>

					<?php if ( comments_open() || get_comments_number() ) : ?>
						<?php // comments_template(); ?>
					<?php endif; ?>

					<!-- Related Posts -->


					<h3 style="text-align: center;">Related Posts</h3>


					<?php $inner_query = new WP_Query($args); ?>
					<?php if($inner_query->have_posts()): while ($inner_query->have_posts()) : the_post() ?>

					<?php endwhile; else: ?>

					<?php endif; ?>

				<?php endwhile;	?>
			</div>
		</main>
	</div>

<?php get_footer(); ?>
