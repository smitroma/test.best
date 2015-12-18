<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package Brain_Bytes
 * @subpackage Zaban_Couples
 * @since Zaban Couples 1.0
 */
?>
</div><!-- .site-content -->
<div id="footer">
  <div class="row container">
    <div class="footer-logo">
      <img src="<?php echo get_template_directory_uri()?>/images/footer-logo.png" />
    </div>
    <?php wp_nav_menu(array('menu' => 'Main Menu', 'menu_class' => 'footer_nav')); ?>
  </container>
</div>
</div><!-- .container-fluid -->
<?php wp_footer(); ?>
</body>
</html>
