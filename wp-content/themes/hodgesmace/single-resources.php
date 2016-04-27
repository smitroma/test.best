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
			<div class="container blog-single-container">
				<?php while ( have_posts() ) : the_post(); ?>

					<div class="post-meta uppercase p-y-md">
						<span><?php the_date() ?></span>
					</div>
					<h1><?php the_title() ?></h1>
					<div class="post-content p-b-lg">
						<?php the_content(); ?>
					</div>

				</div>
				<!-- Related Posts -->
				<?php
					$tags = array();
					$cats = array();
				?>
				<?php if(is_array(get_the_tags())): ?>
					<?php
						foreach(get_the_tags() as $tag){
							array_push($tags, $tag->name) ;
						}
						$tags = implode(',',$tags);
					?>
				<?php endif; ?>
				<?php if(is_array(get_the_category())): ?>
					<?php
						foreach(get_the_category() as $cat){
							array_push($cats, $cat->term_id) ;
						}
						$cats = implode(',',$cats);
					?>
				<?php endif; ?>
				<?php if(!empty($tags) || !empty($cats)): ?>
					<?php $args = array(
						'tag' => $tags,
						'cat' => $cats,
						'post_type' => 'resources',
						'post__not_in' => array(get_the_ID()),
						'max_num_pages' => 1,
						'posts_per_page' => 3
					); ?>
					<?php $related_query = new WP_Query($args); ?>
					<?php if($related_query->have_posts()): ?>
						<div class="wrapper-container related-articles">
							<h3 style="text-align: center;" class="m-b-0">Related Resources</h3>
						</div>
						<div class="background-top-center blue-arrow related-articles-arrow"></div>
						<div class="container p-y-lg">
							<?php while ($related_query->have_posts()): $related_query->the_post()?>
								<div class="col-md-4 col-xs-12 p-x-md">
				          <div class="p-b-md">
				            <a href="<?php the_permalink() ?>">
				              <?php if ( has_post_thumbnail() ): ?>
				                <?php the_post_thumbnail(); ?>
				              <?php else: ?>
				                <div class="default-img">
				                  <div class="default-img-content">
				                    No Image Added
				                  </div>
				                </div>
				              <?php endif; ?>
				            </a>
				          </div>
				          <div>
				            <p class="post-date"><?php the_date(); ?></p>
				            <h4 style="font-size: 1em;"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
										<p><a href="<?php the_permalink() ?>" class="uppercase">Read Article <?php echo do_shortcode('[icon class="fa-caret-right"]')?></a></p>
				          </div>
				        </div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			<?php endwhile;	?>
		</main>
	</div>

<?php get_footer(); ?>
