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
      <?php echo do_shortcode('[icon class="fa-linkedin m-r-10-px"]') ?> <?php echo do_shortcode('[icon class="fa-envelope"]')?>
    </p>
    <?php wp_nav_menu(array('menu' => 'Footer Menu', 'menu_class' => 'footer_nav' )); ?>
  </div>
</div>
</div><!-- .container-fluid -->
<?php wp_footer(); ?>

<!-- ActOn Tracking Code -->
<script>/*<![CDATA[*/(function(w,a,b,d,s){w[a]=w[a]||{};w[a][b]=w[a][b]||{q:[],track:function(r,e,t){this.q.push({r:r,e:e,t:t||+new Date});}};var e=d.createElement(s);var f=d.getElementsByTagName(s)[0];e.async=1;e.src='//marketing.hodgesmace.com/cdnr/96/acton/bn/tracker/17907';f.parentNode.insertBefore(e,f);})(window,'ActOn','Beacon',document,'script');ActOn.Beacon.track();/*]]>*/</script>

</body>
</html>
