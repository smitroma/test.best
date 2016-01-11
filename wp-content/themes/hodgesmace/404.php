<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Brain_Bytes
 * @subpackage Hodges Mace
 * @since Hodges Mace  1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found container p-y-lg">
				<header class="page-header ta-c">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'hodgesmace' ); ?></h1>
				</header>
				<div class="page-content">
					<p class="ta-c"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'hodgesmace' ); ?></p>
					<div class="aligncenter d-t p-y-md"><?php get_search_form(); ?></div>
				</div>
			</section>
			<div class="container blog-footer">
				<div class="col-md-6">
					<div class="blog-footer-content">
						<h2>6 Tips for Improving <br>Employee Communication</h2>
						<div><button class="vc_general vc_btn3 vc_btn3-size-md vc_btn3-shape-rounded vc_btn3-style-modern vc_btn3-color-green">Download Resource</button></div>
					</div>
				</div>
			</div>
		</main>
	</div>

<?php get_footer(); ?>
