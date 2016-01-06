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
          <h2>Lorem ipsum dolor sit amet, <br>consectetur adipisicing elit</h2>
          <button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-green">Download Resource</button>
        </div>
      </div>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="container p-y-lg blog-excerpt">
          <div class="col-md-12">
            <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
            <p class="post-meta"><?php the_date(); ?> | BY <?php the_author(); ?></p>    
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
        <div class="col-md-6">
          <div class="blog-footer-content">
            <h2 class="m-b-0">6 Tips for Improving <br>Employee Communication</h2>
          </div>
        </div>
        <div class="col-md-6 d-t">
          <div class="blog-footer-content p-l-0 w-xs-12">
            <div class="ta-c"><button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-green">Download Resource</button></div>
          </div>
        </div>
      </div>
    </main>
</div>

<?php get_footer(); ?>
