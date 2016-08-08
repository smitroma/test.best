<?php
/**
 * Default posts template
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
          <h2 class="featured-resource-title"><?php echo do_shortcode('[featured_resource_title]');?></h2>
          <?php echo do_shortcode('[resource_link]<button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-green">Download Resource</button>[/resource_link]');?>
        </div>
      </div>
      <div class="container">
        <?php echo do_shortcode('[ess_grid alias="resources"]') ?>
      </div>
      <div class="container blog-footer">
        <div class="col-md-6 col-xs-12">
          <div class="blog-footer-content">
            <h2 class="featured-resource-title"><?php echo do_shortcode('[featured_resource_title]');?></h2>
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
