<?php
/**
 * Default page template
 *
 * @package Brain_Bytes
 * @subpackage Hodges Mace
 * @since Hodges Mace  1.0
 */

get_header(); ?>

<div id="primary">
    <main id="main" role="main">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container p-y-md">
          <div class="col-md-4">
            <?php if ( has_post_thumbnail() ): ?>
              <?php the_post_thumbnail(); ?>
            <?php else: ?>
              <div class="p-r-md" style="display: table; width: 100%;">
                <div style="background-color: #ddd;
                            width: 100%;
                            text-align: center;
                            display: table-cell;
                            vertical-align: middle;
                            height: 160px;">
                  No Image Added
                </div>
              </div>
            <?php endif; ?>
          </div>
          <div class="col-md-8">
            <p class="post-meta"><?php the_date(); ?> | BY <?php the_author(); ?></p>
            <h3><?php the_title(); ?></h3>
            <p class="post-content"><?php the_excerpt(); ?></p>
          </div>
        </div>
      <?php endwhile; else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
