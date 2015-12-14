<?php

/*-----------------------------------------------------------------------------------*/
/*	This page contains the custom jQuery code with custom options
/*	Manually editing this file could break the theme.
/*	Edit the settings in the options panel instead.
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	Adjust slider position based on nav size.
/*-----------------------------------------------------------------------------------*/

function jquery_sliderpos() {
	?>
	<script>
	jQuery(document).ready(function() {

		//var height = jQuery('.header').height();
		
		//jQuery('.layer-slider').css('padding-top', height+'px');
		
	});
	</script>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Full width portfolio
/*-----------------------------------------------------------------------------------*/

function jquery_fw_portfolio() { ?>

	<script>

	// Adjust size for full width portfolio
	jQuery(document).ready(function() {
		var width = jQuery(document).width();
		var offset = jQuery( '.content-container .container' ).offset().left;
		
		jQuery( '.full-width-portfolio' ).css("width", width);
		jQuery( '.full-width-portfolio' ).css("margin-left", "-"+offset+"px");
		
		jQuery(window).resize(function() {
		var width = jQuery(document).width();
		var offset = jQuery( '.content-container .container' ).offset().left;
						jQuery( '.full-width-portfolio' ).css("width", width);
						jQuery( '.full-width-portfolio' ).css("margin-left", "-"+offset+"px");
		});
		
		jQuery(".styleswitch").click(function() {
		var width = jQuery(document).width();
		var offset = jQuery( '.content-container .container' ).offset().left;
						jQuery( '.full-width-portfolio' ).css("width", width);
						jQuery( '.full-width-portfolio' ).css("margin-left", "-"+offset+"px");
		});
		
	});
	
	jQuery(window).load(function() { 
		jQuery('.full-width-portfolio').css('opacity', '1');
	});
	
	</script>
	
	<?php
		
}

/*-----------------------------------------------------------------------------------*/
/*	Flexslider
/*-----------------------------------------------------------------------------------*/

function jquery_flexslider() {
	?>
	<script>
	jQuery(document).ready(function() {
	"use strict";
	jQuery('.widget-slider .flexslider').flexslider({
		animation: "slide",
		slideshow: "true", 
		slideshowSpeed: 5000,
		animationSpeed: 500, 
		easing: "swing", 
		directionNav: true 
		});
	});
	</script>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Isotope
/*-----------------------------------------------------------------------------------*/

function jquery_isotope() {
	?>
	<script>
	jQuery(document).ready(function() {
/*
	
	jQuery.Isotope.prototype._getCenteredMasonryColumns = function() {
    this.width = this.element.width();
    
    var parentWidth = this.element.parent().width();
    
                  // i.e. options.masonry && options.masonry.columnWidth
    var colW = this.options.masonry && this.options.masonry.columnWidth ||
                  // or use the size of the first item
                  this.$filteredAtoms.outerWidth(true) ||
                  // if there's no items, use size of container
                  parentWidth;
    
    var cols = Math.floor( parentWidth / colW );
    cols = Math.max( cols, 1 );

    // i.e. this.masonry.cols = ....
    this.masonry.cols = cols;
    // i.e. this.masonry.columnWidth = ...
    this.masonry.columnWidth = colW;
  };
  
  jQuery.Isotope.prototype._masonryReset = function() {
    // layout-specific props
    this.masonry = {};
    // FIXME shouldn't have to call this again
    this._getCenteredMasonryColumns();
    var i = this.masonry.cols;
    this.masonry.colYs = [];
    while (i--) {
      this.masonry.colYs.push( 0 );
    }
  };

  jQuery.Isotope.prototype._masonryResizeChanged = function() {
    var prevColCount = this.masonry.cols;
    // get updated colCount
    this._getCenteredMasonryColumns();
    return ( this.masonry.cols !== prevColCount );
  };
  
  jQuery.Isotope.prototype._masonryGetContainerSize = function() {
    var unusedCols = 0,
        i = this.masonry.cols;
    // count unused columns
    while ( --i ) {
      if ( this.masonry.colYs[i] !== 0 ) {
        break;
      }
      unusedCols++;
    }
    
    return {
          height : Math.max.apply( Math, this.masonry.colYs ),
          // fit container to columns that have been used;
          width : (this.masonry.cols - unusedCols) * this.masonry.columnWidth
        };
  };

	
*/
	    
	// Check if Mobile or Tablet device  
	function is_touch_device() {
		return !!('ontouchstart' in window) // works on most browsers 
		|| !!('onmsgesturechange' in window); // works on ie10
	};
    
	// If touch device, disable transforms.
	if (is_touch_device() && jQuery(window).width() < 800) { 
		var bubu = {
			animationEngine: 'best-available',
			filter: '',
			sortBy: 'original-order',
			sortAscending: true,
			transformsEnabled: false,
			layoutMode: 'masonry'
		};
		
     } else {
	     var bubu = {
		     animationEngine: 'best-available',
		     filter: '',
			sortBy: 'original-order',
			sortAscending: true,
			transformsEnabled: true,
			layoutMode: 'masonry',
			animationOptions: {
				queue: false,
				easing: 'linear',
				duration: <?php if (get_field('grid_animation_duration', 'option')) {the_field('grid_animation_duration', 'option');} else { echo '5000'; } ?>
			},
		};
	}
	
	// Settings for the grid
    jQuery(function(){
	    var $container = jQuery('.isotope'),
	    // object that will keep track of options
	    isotopeOptions = {},
	    // defaults, used if not explicitly set in hash
	    defaultOptions = bubu;
	    
	    var setupOptions = jQuery.extend( {}, defaultOptions, {
		    itemSelector : '.isotope-post',
		    masonry: {
			    gutterWidth: 50,
			    columnWidth: 1,
			   },
		});

    	$container.infinitescroll({
       		navSelector  : '.isotope-loadmore',    // selector for the paged navigation 
	       	nextSelector : '.isotope-loadmore a',  // selector for the NEXT link (to page 2)
		    itemSelector : '.isotope-post',     // selector for all items you'll retrieve
	        behavior : 'twitter',
        loading: {
            finishedMsg: '&nbsp;',
            img: ''
          }
        },
        // call Isotope as a callback
        function( newElements ) {
        
		var $newElems = jQuery(newElements);
		$newElems.css("opacity","0");
		$newElems.imagesLoaded(function(){
			$newElems.css("opacity","1");
			jQuery(".post").css("opacity","1");
			$container.isotope('appended', $newElems );
		});
		
		// LoadMore Callback scripts
		// =========================================
		jQuery('.isotope-loadmore a').text("Load more");
		
		// Post Like
  		jQuery.getScript("<?php echo get_template_directory_uri(); ?>/js/post-like.js");
  		
  		// Slider
  		
        jQuery('.widget-slider .flexslider').flexslider({
		animation: "<?php if (get_field('slider_animation', 'option')) { the_field('slider_animation', 'option'); } else { echo 'slide'; } ?>",
		slideshow: "<?php if (get_field('slider_slideshow', 'option')) { the_field('slider_slideshow', 'option'); } else { echo 'false';} ?>", 
		slideshowSpeed: <?php if (get_field('slideshow_speed', 'option')) {the_field('slideshow_speed', 'option'); } else { echo '800'; } ?>,
		animationSpeed: <?php if (get_field('slider_animation_speed', 'option')) {the_field('slider_animation_speed', 'option'); } else { echo '600'; } ?>, 
		easing: "swing", 
		directionNav: false 
		});
	    
	    // Video Player
		jQuery('div[data-video-id]').each(function(){
		   	var videoid = jQuery(this).attr('data-video-id');
		    var videoposter = jQuery(this).attr('data-video-poster');
		    var videourl = jQuery(this).attr('data-video-url');
		    var videoheight = jQuery(this).attr('data-video-height');
		 
			jQuery(this).jPlayer({
		     ready: function () {
		       jQuery(this).jPlayer("setMedia", {
		          m4v: ""+videourl+"",
		          poster: ""+videoposter+""
		       });
		     },
		     play: function() { // To avoid both jPlayers playing together.
		         jQuery(this).jPlayer("pauseOthers");
				},
		     cssSelectorAncestor: "#jp_container_"+videoid,
		     swfPath: "http://www.jplayer.org/latest/js/Jplayer.swf",
		     supplied: "m4v",
		     size: { width: "100%", height: ""+videoheight+""}
		     
		   }); 
		       
		});
		
		// Audio Player
		jQuery('div[data-audio-id]').each(function(){
			var audioid = jQuery(this).attr('data-audio-id');
			var audiourl = jQuery(this).attr('data-audio-url');
			
		       jQuery(this).jPlayer({
		         ready: function () {
		           jQuery(this).jPlayer("setMedia", {
		             m4a: ""+audiourl+"",
		           });
		         },
		         play: function() { // To avoid both jPlayers playing together.
			         jQuery(this).jPlayer("pauseOthers");
					},
		         cssSelectorAncestor: "#jp_container_"+audioid,
		         swfPath: "http://www.jplayer.org/latest/js/Jplayer.swf",
		         supplied: "m4a",
		       });
		 });
		     
		//
	        
        }
          
      );
      
	// set up Isotope
	$container.isotope( setupOptions );
	var $optionSets = jQuery('.category-filter').find('li'),
	isOptionLinkClicked = false;
	
  
	// switches selected class on buttons
	function changeSelectedLink( $elem ) {
		// remove selected class on previous item
		$elem.parents().find('.selected').removeClass('selected');
		// set selected class on new item
		$elem.addClass('selected');
	}
  
	$optionSets.find('a').click(function(){
		var $this = jQuery(this);
		// don't proceed if already selected
		if ( $this.hasClass('selected') ) {
			return;
		}
		changeSelectedLink( $this );
		// get href attr, remove leading #
		var href = $this.attr('href').replace( /^#/, '' ),
		// convert href into object
		// i.e. 'filter=.inner-transition' -> { filter: '.inner-transition' }
		option = jQuery.deparam( href, true );
		// apply new option to previous
		jQuery.extend( isotopeOptions, option );
		// set hash, triggers hashchange on window
		jQuery.bbq.pushState( isotopeOptions );
		isOptionLinkClicked = true;
      
		if (jQuery(window).width() <= 480) {  
			jQuery('#nav-collapse').removeClass('in');
			jQuery('#nav-collapse').css('height','0');
		}
        return false;
    });
    
    	$container.imagesLoaded( function(){
		  $container.isotope('reLayout');
		});

    var hashChanged = false;
    jQuery(window).bind( 'hashchange', function( event ){
	    // get options object from hash
	    var hashOptions = window.location.hash ? jQuery.deparam.fragment( window.location.hash, true ) : {},
	    // do not animate first call
	    aniEngine = hashChanged ? 'best-available' : 'none',
	    // apply defaults where no option was specified
	    options = jQuery.extend( {}, defaultOptions, hashOptions, { animationEngine: aniEngine } );
	    // apply options from hash
	    $container.isotope( options );
	    // save options
	    isotopeOptions = hashOptions;
	    
	    // if option link was not clicked
        // then we'll need to update selected links
        if ( !isOptionLinkClicked ) {
	        // iterate over options
	        var hrefObj, hrefValue, $selectedLink;
	        for ( var key in options ) {
		        hrefObj = {};
		        hrefObj[ key ] = options[ key ];
		        // convert object into parameter string
		        // i.e. { filter: '.inner-transition' } -> 'filter=.inner-transition'
		        hrefValue = jQuery.param( hrefObj );
		        // get matching link
		        $selectedLink = $optionSets.find('a[href="#' + hrefValue + '"]');
		        changeSelectedLink( $selectedLink );
		    }
		}
		
		isOptionLinkClicked = false;
		hashChanged = true;
	})
    // trigger hashchange to capture any hash data on init
    .trigger('hashchange');
    });
    });
    

	</script>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Tooltips
/*-----------------------------------------------------------------------------------*/

function jquery_tooltips() {
	?>
	<script>
	jQuery(document).ready(function() {
		jQuery("[rel=alternate]").tooltip();
		jQuery(".zt-tooltip").tooltip();
		jQuery(".tagcloud a").tooltip();
		jQuery(".isotope-loadmore-box").tooltip();
	});
	</script>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Fancybox
/*-----------------------------------------------------------------------------------*/

function jquery_fancybox() {
	?>
	<script>
	jQuery(document).ready(function() {
		jQuery(".fancybox").fancybox({
			helpers : {
				overlay : {
					locked : false
					}
			    },
			padding: ['5px', '5px', '5px', '5px']
		});
	});
	</script>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Dropdown Menu
/*-----------------------------------------------------------------------------------*/

function jquery_dropdown() {
	?>
	<script>
	jQuery('.mobile-nav-container .dropdown').click(function() {
    	jQuery('.sub-menu', this).slideToggle(300);
    });
    /*
    jQuery(function($) {
		jQuery(".dropdown").children("a").attr('href', "javascript:void(0)"); 
    });
    */
    
	</script>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Back to top
/*-----------------------------------------------------------------------------------*/

function jquery_backtotop() {
	?>
	<script>
	jQuery(document).ready(function() {
		jQuery().UItoTop({ easingType: 'easeOutQuart' });
	});
	</script>
	<?php
}

/*-----------------------------------------------------------------------------------*/
/*	Custom Jquery
/*-----------------------------------------------------------------------------------*/

function jquery_custom() {
	?>
	<script>
	
		jQuery(document).ready(function(){
    jQuery('#viewport').infinitecarousel('#previous', '#next');

function slide(){
  jQuery('#next').click();
}

//Launch the scroll every 2 seconds
var intervalId = window.setInterval(slide, 2000);


});
		
		jQuery(window).load(function() {
			jQuery('.parallax-bg').parallax("50%", -0.3);
		});
		

		// Parallax Slider
/*
		jQuery(window).load(function() {
			jQuery('.ls-wp-fullwidth-helper').scrollingParallax({ 
			
				staticSpeed : 0.4,
				enableVertical : true,
	
			});
		});
*/

		
		// Safari Disabler
/*
		jQuery.browser.safari = (jQuery.browser.webkit && !(/chrome/.test(navigator.userAgent.toLowerCase())));
		if (!jQuery.browser.safari) {

		}
*/
		
		// Remove Empty <p> tags
		jQuery(document).ready(function() {
			jQuery( 'p:empty' ).remove();
		});
		
		// Load More Button
		jQuery('.isotope-loadmore a').click(function() {
			jQuery('.isotope-loadmore a').text("Loading...");
			
		});
		
		// Append arrows to dropdowns
		jQuery( ".dropdown > a" ).prepend( "<i class='fa fa-angle-down'></i>");
		
		// Append arrows to dropdowns
		// jQuery( ".sub-menu" ).append( "<div class='sub-menu-arrow'></div>");
		
				// Animate rainbow bars
		jQuery('.dropdown').each(function(){ 
			var width = jQuery(this).width();
			
			jQuery('.sub-menu-arrow', this).css('margin-left', (width/2.6));
			
		});
		
		// Animate rainbow bars
		var delay = 0;
		jQuery('.rainbow-bar *').each(function(){ 
		    jQuery(this).delay(delay).animate({
		        opacity:1,
		        height: "100%",
		        margin: "0px 0px 0px 0px"
		    },200);
		    delay += 200;
		});
		
		
		// Make navigation smaller on scroll
		jQuery(document).scroll(function(){
		    if(jQuery(window).scrollTop() > 0)
		    {   
		        jQuery('.header').addClass("header-scrolled");
		    }

		});
		
		
		jQuery(document).scroll(function(){
		    if(jQuery(window).scrollTop() < 150)
		    {
		    	jQuery('.header').removeClass("header-scrolled");
		    }

		});

		// Get latest tweets
        jQuery(function($){
        	jQuery(".tweet").tweet({
            username: '<?php the_field('twitter_username', 'option'); ?>',
            modpath: '<?php echo get_template_directory_uri(); ?>/framework/twitter/',
            join_text: "auto",
            avatar_size: 32,
            count: <?php if (get_field('number_of_tweets', 'option')) { the_field('number_of_tweets', 'option'); } else { echo '3'; } ?>,
            auto_join_text_default: "",
            auto_join_text_ed: "",
            auto_join_text_ing: "",
            auto_join_text_reply: "",
            auto_join_text_url: "",
            loading_text: "loading tweets..."
            });
        });

        // Isotope preloader animation
    	jQuery(window).load(function(){
			 jQuery('.isotope-preloader').css("display", "none");
			 jQuery('.isotope').css("opacity", "1");
		});
		
		// Hide slider content on scroll
        var divs = jQuery('.ls-s-1');
		jQuery(window).on('scroll', function() {
		   var st = jQuery(this).scrollTop();
		   divs.css({ 'opacity' : (1 - st/280) });
		});
		

		jQuery('.vc-counter-number').each(function() {
				counter_number = jQuery(this).attr("counter-number")
				jQuery(this).numAnim({
				    endAt: counter_number,
				    duration: 2
				});
		});

		
		jQuery('.vc-counter-number').each(function() {

			jQuery(this).waypoint({
				offset: 'bottom-in-view',
			  handler: function() {
			    counter_number = jQuery(this).attr("counter-number")

				jQuery(this).numAnim({
				    endAt: counter_number,
				    duration: 2
				});
			  }
			});
		});
		
		jQuery('.header').waypoint('sticky');
		

		
	</script>
	
	
		
	<?php
}
?>