<footer>


	
	<!-- BEGIN FOOTER CALLOUT SECTION
	================================================== -->
	<?php if (get_field('footer_callout_option') !== "none") { ?>
	<?php if (get_field('footer_callout_option') == "custom") { ?>
		<?php if (get_field('footer_callout_text')) { ?>
		<div class="quote-section">
			<div class="container">
				<div class="row-fluid">
					<div class="span8 offset2">
						<span><?php the_field('footer_callout_text'); ?></span>
						<?php if(get_field('footer_callout_button')) { ?>
							<?php while(has_sub_field('footer_callout_button')) { ?>
							<a style="background: <?php the_sub_field('callout_button_colour')?> !important;" href="<?php the_sub_field('callout_button_link')?>" class="button"><?php the_sub_field('callout_button_text')?></a>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
	<?php } else { ?>
		<?php if (get_field('footer_callout_text','option')) { ?>
		<div class="quote-section">
			<div class="container">
				<div class="row-fluid">
					<div class="span8 offset2">
						<span><?php the_field('footer_callout_text', 'option'); ?></span>
						<?php if(get_field('footer_callout_button', 'option')) { ?>
							<?php while(has_sub_field('footer_callout_button', 'option')) { ?>
							<a style="background: <?php the_sub_field('callout_button_colour')?> !important;" href="<?php the_sub_field('callout_button_link')?>" class="button"><?php the_sub_field('callout_button_text')?></a>
							<?php } ?>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
	<?php } ?>
	<?php } ?>
	
	
	<!-- BEGIN WIDGET FOOTER
	================================================== -->
	<?php if (!get_field('remove_widget_footer', 'option')) { ?>
		<?php if (!get_field('remove_widget_footer')) { ?>
	<div class="sub-footer">
		<div class="container">
			<div class="row">
						<?php dynamic_sidebar('Footer'); ?>
			</div>
		</div>
	</div>
	<?php } ?>
		<?php } ?>
	
	<!-- BEGIN FOOTER
	================================================== -->
	<div class="footer" id="as">
	    <div class="container">
	    	<div class="row">
		    	<div class="span6 copyright-text">
		    		<?php if (get_field('copyright_text', 'option')) { ?>
		    		<p><?php the_field('copyright_text', 'option')?></p>
		    		<?php } else { ?>
		    		<p>Add your footer text here through the options</p>
		    		<?php } ?>
		    		
		    		<!--<?php do_action('icl_language_selector'); ?>-->
		    	</div>
		    	
		    	<div class="span6 footer-icons">
		    	
					<ul>
					<?php if(get_field('footer_icons', 'option')) { ?>
						<?php while(has_sub_field('footer_icons', 'option')) { ?>
							
							<li class="social-button"><a href="<?php the_sub_field('footer_icon_link')?>" rel="alternate" data-original-title="<?php the_sub_field('footer_icon_title')?>"><i class="fa fa-<?php the_sub_field('footer_icon')?>"></i></a></li>
				
						<?php } ?>
					<?php } ?>
				 	</ul>
		    	
		    	</div>
	    	</div>
	    </div>
	    <a rel="alternate" title="Back to top" class="up"></a>
	</div>
</footer>


</div>
<?php

/*-----------------------------------------------------------------------------------*/
/*	Get jQuery scripts with PHP options (functions/jquery.php)
/*-----------------------------------------------------------------------------------*/

jquery_fw_portfolio();
jquery_sliderpos();
jquery_flexslider();
jquery_isotope();
jquery_tooltips();
jquery_fancybox();
jquery_dropdown();
jquery_backtotop();
jquery_custom();

?>	

<?php wp_footer(); ?>


  </body>
</html>