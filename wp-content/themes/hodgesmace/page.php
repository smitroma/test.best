<?php
/**
 * Default page template
 *
 * @package Brain_Bytes
 * @subpackage Zaban_Couples
 * @since Zaban Couples 1.0
 */

get_header(); ?>

<div id="primary">
    <main id="main" role="main">
        <?php while (have_posts()) { ?>
            <?php the_post(); ?>
            <?php the_content(); ?>
        <?php } ?>
    </main>
</div>

<?php get_footer(); ?>
