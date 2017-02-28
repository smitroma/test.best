<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package Brain_Bytes
 * @subpackage Hodges Mace
 * @since Hodges Mace  1.0
 */
?>
</div><!-- .site-content -->
<div id="footer">
  <div class="row container">
    <p class="left c-white">&copy; <?php echo date('Y') ?> <?php bloginfo('name')?></p>
    <p class="right c-white">
    <a class="c-white" href="https://twitter.com/hodgesmace"><?php echo do_shortcode('[icon class="fa-twitter  m-r-10-px"]'); ?></a>
    <a class="c-white" href="https://www.youtube.com/channel/UCZ-T8Q9hqtiP3Cs6i95RhZA"><?php echo do_shortcode('[icon class="fa-youtube-play  m-r-10-px"]'); ?></a>
    <a class="c-white" href="https://www.linkedin.com/company/1706000?trk=tyah&trkInfo=clickedVertical%3Acompany%2CclickedEntityId%3A1706000%2Cidx%3A2-1-9%2CtarId%3A1452720499093%2Ctas%3Ahodges"><?php echo do_shortcode('[icon class="fa-linkedin m-r-10-px"]') ?></a>
    <a class="c-white" href="<?php echo get_home_url()."/index.php/?page_id=1533" ?>"><?php echo do_shortcode('[icon class="fa-envelope"]')?></a>
    </p>
    <?php wp_nav_menu(array('menu' => 'Footer Menu', 'menu_class' => 'footer_nav' )); ?>
  </div>
</div>
</div><!-- .container-fluid -->
<script type="text/javascript">
jQuery(document).ready(function(){
  document.addEventListener('focus',function(e){
      e.preventDefault();
      console.log(e, e.target);
  }, true);
});
</script>
<?php wp_footer(); ?>
</body>
</html>
