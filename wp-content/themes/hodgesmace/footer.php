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
      <?php echo do_shortcode('[icon class="fa-linkedin"]') ?> <?php echo do_shortcode('[icon class="fa-envelope"]')?>
    </p>
    <?php wp_nav_menu(array('menu' => 'Footer Menu', 'menu_class' => 'footer_nav' )); ?>
  </div>
</div>
</div><!-- .container-fluid -->
<?php wp_footer(); ?>
</body>
</html>
