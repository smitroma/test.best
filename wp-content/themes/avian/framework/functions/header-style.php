<?php

function header_style() {
	
	/*-----------------------------------------------------------------------------------*/
	/*	Rainbow Bar
	/*-----------------------------------------------------------------------------------*/
	
	if (get_field('header_style', 'option') == 'rainbow_bar' || get_field('header_style', 'option') == 'rainbow_contact') { ?>
	
	<div class="rainbow-bar">
		<div class="rainbow1"></div>
		<div class="rainbow2"></div>
		<div class="rainbow3"></div>
		<div class="rainbow4"></div>
		<div class="rainbow5"></div>
		<div class="rainbow6"></div>
		<div class="rainbow7"></div>
		<div class="rainbow8"></div>
	</div>
	<?php }
	
	/*-----------------------------------------------------------------------------------*/
	/*	Contact Bar
	/*-----------------------------------------------------------------------------------*/
	
	if (get_field('header_style', 'option') == 'contact_bar' || get_field('header_style', 'option') == 'rainbow_contact') { ?>
	<div class="header-contact-bar">
		<div class="container">
		
			<!-- Left -->
			<div class="left">					
				<ul>
					<?php if(get_field('contact_bar_icons', 'option')) { ?>
					<?php while(has_sub_field('contact_bar_icons', 'option')) { ?>
					<li><a href="<?php the_sub_field('icon_link', 'option'); ?>" class="fa fa-<?php the_sub_field('icon_name', 'option'); ?>"></a></li>
					<?php } ?>
					<?php } ?>
				</ul>
			</div>
			
			<!-- Right -->
			<div class="right">
				<?php while(has_sub_field('contact_bar_info', 'option')) { ?>
							
					<a href="<?php the_sub_field('link', 'option'); ?>"><i class="fa fa-<?php the_sub_field('icon', 'option'); ?>"></i><?php if (get_sub_field('icon', 'option') && get_sub_field('text', 'option')) { ?> &nbsp; <?php } ?><?php the_sub_field('text', 'option'); ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php }

}


?>
<?php

function header_style_page() {
	
	/*-----------------------------------------------------------------------------------*/
	/*	Rainbow Bar
	/*-----------------------------------------------------------------------------------*/
	
	if (get_field('header_style') == 'rainbow_bar') { ?>
	
	<div class="rainbow-bar">
		<div class="rainbow1"></div>
		<div class="rainbow2"></div>
		<div class="rainbow3"></div>
		<div class="rainbow4"></div>
		<div class="rainbow5"></div>
		<div class="rainbow6"></div>
		<div class="rainbow7"></div>
		<div class="rainbow8"></div>
	</div>
	<?php }
	
	/*-----------------------------------------------------------------------------------*/
	/*	Contact Bar
	/*-----------------------------------------------------------------------------------*/
	
	if (get_field('header_style') == 'contact_bar') { ?>
	<div class="header-contact-bar">
		<div class="container">
		
			<!-- Left -->
			<div class="left">					
				<ul>
					<?php if(get_field('contact_bar_icons')) { ?>
					<?php while(has_sub_field('contact_bar_icons')) { ?>
					<li><a href="<?php the_sub_field('icon_link'); ?>" class="fa fa-<?php the_sub_field('icon_name'); ?>"></a></li>
					<?php } ?>
					<?php } ?>
				</ul>
			</div>
			
			<!-- Right -->
			<div class="right">
				<?php while(has_sub_field('contact_bar_info')) { ?>
							
					<a href="<?php the_sub_field('link'); ?>"><i class="fa fa-<?php the_sub_field('icon'); ?>"></i><?php if (get_sub_field('icon') && get_sub_field('text')) { ?> &nbsp; <?php } ?><?php the_sub_field('text'); ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php }

}

?>