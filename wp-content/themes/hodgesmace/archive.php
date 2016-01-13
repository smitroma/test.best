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
      <div class="blog-banner wrapper-container">
        <div class="banner-content-center">
          <h4 class="uppercase">Featured Resource</h4>
          <h2>6 Tips for Improving <br>Employee Communication</h2>
          <?php echo do_shortcode('[resource_link]<button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-green">Download Resource</button>[/resource_link]');?>
        </div>
      </div>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container p-y-lg blog-excerpt">
          <div class="col-md-4 p-b-md p-r-lg p-r-0-xs col-xs-12">
            <a href="<?php the_permalink() ?>" class="img-100">
              <?php if ( has_post_thumbnail() ): ?>
                <?php the_post_thumbnail(); ?>
              <?php else: ?>
                <div class="default-img col-xs-12">
                  <div class="default-img-content">
                    No Image Added
                  </div>
                </div>
              <?php endif; ?>
            </a>
          </div>
          <div class="col-md-8">
            <p class="post-meta"><?php the_date(); ?> | BY <?php the_author(); ?></p>
            <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
            <p class="post-content"><?php the_excerpt(); ?></p>
          </div>
        </div>
      <?php endwhile; ?>

      <?php
        global $paged; global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages) { $pages = 1; }
        if(!$paged) { $paged = 1; }
      ?>

      <?php if($pages > 1): ?>
        <div class="pagination">
          <?php if(($paged - 1) > 0): ?>
            <span class="nav-next"><a href="<?php echo get_pagenum_link($paged-1) ?>"><?php echo do_shortcode('[icon class="fa fa-angle-left"]') ?></a></span>
          <?php endif; ?>
          <?php for ($i=1; $i <= $pages; $i++): ?>
            <span class="<?php echo ($i == $paged) ? 'active' : ''?>"><a href="<?php echo get_pagenum_link($i) ?>"><?php echo $i ?></a></span>
          <?php endfor;?>
          <?php if($paged < $pages): ?>
            <span class="nav-next"><a href="<?php echo get_pagenum_link($paged+1) ?>"><?php echo do_shortcode('[icon class="fa fa-angle-right"]') ?></a></span>
          <?php endif; ?>
        </div>
      <?php endif; ?>

      <?php else : ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
      <div class="container blog-footer">
        <div class="col-md-6 col-xs-12">
          <div class="blog-footer-content">
            <h2>6 Tips for Improving <br>Employee Communication</h2>
            <div><?php echo do_shortcode('[resource_link]<button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-green">Download Resource</button>[/resource_link]');?></div>
          </div>
        </div>
        <div class="blog-footer-img">
          <img src="<?php echo get_stylesheet_directory_uri() ?>/images/blog/EmployeeCommunicationGraphic.png" width="100%" height="auto"/>
        </div>
      </div>
    </main>
</div>

<?php get_footer(); ?>
