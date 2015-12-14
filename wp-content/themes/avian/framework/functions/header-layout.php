<?php

function header_layout() {
	
	/*-----------------------------------------------------------------------------------*/
	/*	Header Layout 1 (Default layout)
	/*-----------------------------------------------------------------------------------*/

	if (get_field('header_layout', 'option') == 'layout_1' || get_field('header_layout', 'option') == '') { ?>
		
		<div class="navigation-container">
			<div class="container">
				<div class="row">
					<div class="span12">
	
						<div class="header-navigation">
							<ul class="navigation right">
								
								<!-- Logo -->
								<?php if (get_field('logo_image', 'option')) { ?>
								<li class="nav-logo float-left"><a href="<?php echo site_url(); ?>"><img src="<?php the_field('logo_image', 'option'); ?>" alt=""/></a></li>
								<?php } else { ?>
								<li class="nav-logo float-left"><a href="<?php echo site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/avian_logo.jpg" alt=""/></a></li>
								<?php } ?>
								
								<!-- Navigation Menu -->
								<?php
								if (has_nav_menu( 'header-menu' )) {
								   $the_menu = array(
								   	'theme_location'  => '',
								   	'container'       => 'ul',
								   	'menu_class'      => 'menu',
								   	'echo'            => true,
								   	'fallback_cb'     => 'wp_page_menu',
								   	'items_wrap'      => '%3$s',
								   	'depth'           => 0,
								   	'theme_location'  => 'header-menu',
								   	'walker'          => new zt_custom_menu_walker()
								   );
								   
								   wp_nav_menu( $the_menu );
								 }
								?>
								
								<!-- Navigation Search -->
								<?php if (get_field('search_field', 'option')) { ?>
								<li class="navigation-search">
									<form id="searchform" action="<?php echo site_url(); ?>/?s=" method="get" role="search">
										<input id="s" type="text" name="s" value="">
										<input id="searchsubmit" type="submit" value="Search">
									</form>
									<i class="fa fa-search"></i>
								</li>
								<?php } ?>
								
								<?php global $woocommerce; ?>
								
								<li class="dropdown mini-cart">
								
								</li>
				
								<!-- Navigation Buttons -->
								<!--<?php if(get_field('navigation_buttons', 'option')) { ?>
									<?php while(has_sub_field('navigation_buttons', 'option')) { ?>
							
										<li class="navigation-feature-button">
											<a class="button" style="background: <?php the_sub_field('button_colour'); ?>" href="<?php the_sub_field('button_link'); ?>"><?php echo do_shortcode(get_sub_field('button_text')); ?></a>
										</li>
				
									<?php } ?>
								<?php } ?>-->
					
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div>

		
		
	<?php	
	}
	/*-----------------------------------------------------------------------------------*/
	/*	Header Layout 2 (Default layout)
	/*-----------------------------------------------------------------------------------*/

	if (get_field('header_layout', 'option') == 'layout_2') { ?>
		
		<div class="navigation-container">
			<div class="container">
				<div class="row">
					<div class="span12">
	
						<div class="header-navigation">
							<ul class="navigation left">
							
								<?php global $woocommerce; ?>
								
								<li class="dropdown mini-cart">
								
								</li>
							
								<!-- Navigation Search -->
								<?php if (get_field('search_field', 'option')) { ?>
								<li class="navigation-search">
									<form id="searchform" action="<?php echo site_url(); ?>/?s=" method="get" role="search">
										<input id="s" type="text" name="s" value="">
										<input id="searchsubmit" type="submit" value="Search">
									</form>
									<i class="fa fa-search"></i>
								</li>
								<?php } ?>
							
								<!-- Navigation Menu -->
								<?php
								if (has_nav_menu( 'header-menu' )) {
								   $the_menu = array(
								   	'theme_location'  => '',
								   	'container'       => 'ul',
								   	'menu_class'      => 'menu',
								   	'echo'            => true,
								   	'fallback_cb'     => 'wp_page_menu',
								   	'items_wrap'      => '%3$s',
								   	'depth'           => 0,
								   	'theme_location'  => 'header-menu',
								   	'walker'          => new zt_custom_menu_walker()
								   );
								   
								   wp_nav_menu( $the_menu );
								 }
								?>
								
								<!-- Logo -->
								<?php if (get_field('logo_image', 'option')) { ?>
								<li class="nav-logo align-right"><a href="<?php echo site_url(); ?>"><img src="<?php the_field('logo_image', 'option'); ?>" alt=""/></a></li>
								<?php } else { ?>
								<li class="nav-logo align-right"><a href="<?php echo site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/avian_logo.jpg" alt=""/></a></li>
								<?php } ?>
								
								
					
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div>

		
		
	<?php	
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Header Layout 3
	/*-----------------------------------------------------------------------------------*/

	if (get_field('header_layout', 'option') == 'layout_3') { ?>
		
		<div class="navigation-container">
			<div class="container">
				<div class="row">
					<div class="span12">
	
						<div class="header-navigation">
							<ul class="navigation center">
							
								<!-- Logo -->
								<?php if (get_field('logo_image', 'option')) { ?>
								<li class="nav-logo nav-logo-center"><a href="<?php echo site_url(); ?>"><img src="<?php the_field('logo_image', 'option'); ?>" alt=""/></a></li>
								<?php } else { ?>
								<li class="nav-logo nav-logo-center"><a href="<?php echo site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/avian_logo.jpg" alt=""/></a></li>
								<?php } ?>
							
								<!-- Navigation Menu -->
								<?php
								if (has_nav_menu( 'header-menu' )) {
								   $the_menu = array(
								   	'theme_location'  => '',
								   	'container'       => 'ul',
								   	'menu_class'      => 'menu',
								   	'echo'            => true,
								   	'fallback_cb'     => 'wp_page_menu',
								   	'items_wrap'      => '%3$s',
								   	'depth'           => 0,
								   	'theme_location'  => 'header-menu',
								   	'walker'          => new zt_custom_menu_walker()
								   );
								   
								   wp_nav_menu( $the_menu );
								 }
								?>
							
								<!-- Navigation Search -->
								<?php if (get_field('search_field', 'option')) { ?>
								<li class="navigation-search">
									<form id="searchform" action="<?php echo site_url(); ?>/?s=" method="get" role="search">
										<input id="s" type="text" name="s" value="">
										<input id="searchsubmit" type="submit" value="Search">
									</form>
									<i class="fa fa-search"></i>
								</li>
								<?php } ?>
								
								<?php global $woocommerce; ?>
								
								<li class="dropdown mini-cart">
								
								</li>
								
					
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div>

		
		
	<?php	
	}


	
	
}


?>
<?php

function header_layout_page() {
	
	/*-----------------------------------------------------------------------------------*/
	/*	Header Layout 1 (Default layout)
	/*-----------------------------------------------------------------------------------*/

	if (get_field('header_layout') == 'layout_1') { ?>
		
		<div class="navigation-container">
			<div class="container">
				<div class="row">
					<div class="span12">
	
						<div class="header-navigation">
							<ul class="navigation right">
								
								<!-- Logo -->
								<?php if (get_field('logo_image', 'option')) { ?>
								<li class="nav-logo float-left"><a href="<?php echo site_url(); ?>"><img src="<?php the_field('logo_image', 'option'); ?>" alt=""/></a></li>
								<?php } else { ?>
								<li class="nav-logo float-left"><a href="<?php echo site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/avian_logo.jpg" alt=""/></a></li>
								<?php } ?>
								
								<!-- Navigation Menu -->
								<?php
								if (has_nav_menu( 'header-menu' )) {
								   $the_menu = array(
								   	'theme_location'  => '',
								   	'container'       => 'ul',
								   	'menu_class'      => 'menu',
								   	'echo'            => true,
								   	'fallback_cb'     => 'wp_page_menu',
								   	'items_wrap'      => '%3$s',
								   	'depth'           => 0,
								   	'theme_location'  => 'header-menu',
								   	'walker'          => new zt_custom_menu_walker()
								   );
								   
								   wp_nav_menu( $the_menu );
								 }
								?>
								
								<!-- Navigation Search -->
								<?php if (get_field('search_field', 'option')) { ?>
								<li class="navigation-search">
									<form id="searchform" action="<?php echo site_url(); ?>/?s=" method="get" role="search">
										<input id="s" type="text" name="s" value="">
										<input id="searchsubmit" type="submit" value="Search">
									</form>
									<i class="fa fa-search"></i>
								</li>
								<?php } ?>
								
								<?php global $woocommerce; ?>
								
								<li class="dropdown mini-cart">
								
								</li>
					
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div>

		
		
	<?php	
	}
	/*-----------------------------------------------------------------------------------*/
	/*	Header Layout 2 (Default layout)
	/*-----------------------------------------------------------------------------------*/

	if (get_field('header_layout') == 'layout_2') { ?>
		
		<div class="navigation-container">
			<div class="container">
				<div class="row">
					<div class="span12">
	
						<div class="header-navigation">
							<ul class="navigation left">
							
								<?php global $woocommerce; ?>
								
								<li class="dropdown mini-cart">
								
								</li>
							
								<!-- Navigation Search -->
								<?php if (get_field('search_field', 'option')) { ?>
								<li class="navigation-search">
									<form id="searchform" action="<?php echo site_url(); ?>/?s=" method="get" role="search">
										<input id="s" type="text" name="s" value="">
										<input id="searchsubmit" type="submit" value="Search">
									</form>
									<i class="fa fa-search"></i>
								</li>
								<?php } ?>
							
								<!-- Navigation Menu -->
								<?php
								if (has_nav_menu( 'header-menu' )) {
								   $the_menu = array(
								   	'theme_location'  => '',
								   	'container'       => 'ul',
								   	'menu_class'      => 'menu',
								   	'echo'            => true,
								   	'fallback_cb'     => 'wp_page_menu',
								   	'items_wrap'      => '%3$s',
								   	'depth'           => 0,
								   	'theme_location'  => 'header-menu',
								   	'walker'          => new zt_custom_menu_walker()
								   );
								   
								   wp_nav_menu( $the_menu );
								 }
								?>
								
								<!-- Logo -->
								<?php if (get_field('logo_image', 'option')) { ?>
								<li class="nav-logo align-right"><a href="<?php echo site_url(); ?>"><img src="<?php the_field('logo_image', 'option'); ?>" alt=""/></a></li>
								<?php } else { ?>
								<li class="nav-logo align-right"><a href="<?php echo site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/avian_logo.jpg" alt=""/></a></li>
								<?php } ?>
								
								
					
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div>

		
		
	<?php	
	}
	
	/*-----------------------------------------------------------------------------------*/
	/*	Header Layout 3
	/*-----------------------------------------------------------------------------------*/

	if (get_field('header_layout') == 'layout_3') { ?>
		
		<div class="navigation-container">
			<div class="container">
				<div class="row">
					<div class="span12">
	
						<div class="header-navigation">
							<ul class="navigation center">
							
								<!-- Logo -->
								<?php if (get_field('logo_image', 'option')) { ?>
								<li class="nav-logo nav-logo-center"><a href="<?php echo site_url(); ?>"><img src="<?php the_field('logo_image', 'option'); ?>" alt=""/></a></li>
								<?php } else { ?>
								<li class="nav-logo nav-logo-center"><a href="<?php echo site_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/avian_logo.jpg" alt=""/></a></li>
								<?php } ?>
							
								<!-- Navigation Menu -->
								<?php
								if (has_nav_menu( 'header-menu' )) {
								   $the_menu = array(
								   	'theme_location'  => '',
								   	'container'       => 'ul',
								   	'menu_class'      => 'menu',
								   	'echo'            => true,
								   	'fallback_cb'     => 'wp_page_menu',
								   	'items_wrap'      => '%3$s',
								   	'depth'           => 0,
								   	'theme_location'  => 'header-menu',
								   	'walker'          => new zt_custom_menu_walker()
								   );
								   
								   wp_nav_menu( $the_menu );
								 }
								?>
							
								<!-- Navigation Search -->
								<?php if (get_field('search_field', 'option')) { ?>
								<li class="navigation-search">
									<form id="searchform" action="<?php echo site_url(); ?>/?s=" method="get" role="search">
										<input id="s" type="text" name="s" value="">
										<input id="searchsubmit" type="submit" value="Search">
									</form>
									<i class="fa fa-search"></i>
								</li>
								<?php } ?>
								
								<?php global $woocommerce; ?>
								
								<li class="dropdown mini-cart">
								
								</li>
								
					
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div>

		
		
	<?php	
	}


	
	
}


?>